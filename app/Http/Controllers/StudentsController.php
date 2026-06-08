<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index()
    {
        return view('students');
    }
}
use App\Http\Controllers\StudentsController;

Route::get('/students', [StudentsController::class, 'index'])->name('students');
class StudentsController extends Controller
{
    public function index()
    {
        return view('students');
    }
}
