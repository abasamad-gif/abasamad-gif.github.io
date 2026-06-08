<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\BnbUser;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

/* --- AUTHENTICATION --- */
Route::get('/', function () { return redirect()->route('login'); });
Route::get('/login', function () { return view('login'); })->name('login');
Route::get('/register', function () { return view('register'); })->name('register');

Route::post('/login', function (Request $request) {
    $user = BnbUser::where('email', $request->email)->first();
    if ($user && Hash::check($request->password, $user->password)) {
        Session::put('user_id', $user->id);
        Session::put('user_name', $user->name);
        return in_array($user->name, ['abas', 'awey']) ? redirect()->route('admin.home') : redirect()->route('home');
    }
    return back()->with('error', 'Invalid credentials');
})->name('login.submit');

Route::post('/register', function (Request $request) {
    BnbUser::create([
        'name' => $request->name, 'email' => $request->email, 'password' => Hash::make($request->password),
    ]);
    return redirect()->route('login')->with('success', 'Registration successful!');
})->name('register.submit');

Route::get('/logout', function () { Session::flush(); return redirect()->route('login'); })->name('logout');

/* --- SHOP & PRODUCT --- */
Route::get('/home', function () { return view('home'); })->name('home');
Route::get('/shop/{category?}', function ($category = null) {
    $products = $category ? Product::where('category', $category)->get() : Product::all();
    return view('shop', ['products' => $products, 'categoryTitle' => $category ? ucfirst($category) : "Our Full Collection"]);
})->name('shop');

Route::get('/product/{id}', function ($id) {
    $product = Product::find($id);
    return $product ? view('product-detail', compact('product')) : redirect()->route('shop');
})->name('product.show');

/* --- CART MANAGEMENT (Updated with Missing Routes) --- */
Route::get('/cart', function () { 
    return view('cart', ['cart' => Session::get('cart', [])]); 
})->name('cart.index');

Route::get('/cart/clear', function () {
    Session::forget('cart');
    return back()->with('success', 'Cart cleared!');
})->name('cart.clear');

Route::post('/cart/add/{id}', function ($id) {
    $product = Product::find($id);
    if (!$product || !$product->is_available) return back();
    $cart = Session::get('cart', []);
    if (isset($cart[$id])) { $cart[$id]['quantity']++; } 
    else { $cart[$id] = ["name" => $product->name, "quantity" => 1, "price" => $product->price, "image" => $product->image]; }
    Session::put('cart', $cart);
    return back();
})->name('cart.add');

// NEW: Update Quantity
Route::post('/cart/update/{id}', function (Request $request, $id) {
    $cart = Session::get('cart', []);
    if (isset($cart[$id])) {
        $cart[$id]['quantity'] = $request->quantity;
        Session::put('cart', $cart);
    }
    return back();
})->name('cart.update');

// NEW: Remove Single Item
Route::post('/cart/remove/{id}', function ($id) {
    $cart = Session::get('cart', []);
    if (isset($cart[$id])) {
        unset($cart[$id]);
        Session::put('cart', $cart);
    }
    return back();
})->name('cart.remove');

/* --- CHECKOUT --- */
Route::post('/checkout', function () {
    $cart = Session::get('cart', []);
    if (empty($cart)) return back();
    $total = array_sum(array_map(fn($i) => $i['price'] * $i['quantity'], $cart));
    $order = Order::create(['user_id' => Session::get('user_id'), 'total_amount' => $total]);
    foreach ($cart as $d) {
        OrderItem::create(['order_id' => $order->id, 'product_name' => $d['name'], 'quantity' => $d['quantity'], 'price' => $d['price']]);
    }
    Session::forget('cart');
    return redirect()->route('shop')->with('success', 'Order placed successfully!');
})->name('checkout');

/* --- ADMIN --- */
Route::group(['middleware' => function ($request, $next) {
    if (!in_array(Session::get('user_name'), ['abas', 'awey'])) return redirect()->route('home');
    return $next($request);
}], function () {
    Route::get('/adminhome', function () { 
    // You MUST fetch products here so the table can display them
    $products = Product::all(); 
    return view('master.adminhome', compact('products')); 
})->name('admin.home');
    Route::get('/admin/purchases', function () {
        $orders = Order::latest()->get();
        return view('master.admin_purchases', compact('orders'));
    })->name('admin.purchases');
    Route::post('/admin/products/add', function (Request $request) {
    // 1. Validate (Optional but good)
    $request->validate([
        'name' => 'required',
        'image' => 'required|image'
    ]);

    // 2. Handle Image
    $imgName = time().'.'.$request->image->extension();
    $request->image->move(public_path('images'), $imgName);

    // 3. Save to DB
    Product::create([
        'name' => $request->name,
        'price' => $request->price,
        'category' => $request->category,
        'description' => $request->description,
        'image' => $imgName,
    ]);

    // 4. Redirect back to show the updated list
    return redirect()->route('admin.home')->with('success', 'Item Added!');
})->name('admin.products.store');
    Route::post('/admin/products/toggle/{id}', function ($id) {
        $p = Product::find($id); if($p){ $p->is_available = !$p->is_available; $p->save(); }
        return back();
    })->name('admin.products.toggle');
    Route::post('/admin/products/delete/{id}', function ($id) {
        $p = Product::find($id); if($p){ if(file_exists(public_path('images/'.$p->image))) unlink(public_path('images/'.$p->image)); $p->delete(); }
        return back();
    })->name('admin.products.delete');
});