@extends('master.layout')

@section('content')
<div class="vh-100 d-flex align-items-center justify-content-center" style="background-color: #1c3c2d;">
    <div class="col-md-4 px-4">
        <div class="text-center mb-4">
            <img src="{{ asset('images/bnb.png') }}" alt="Brew & Blossom Logo" 
                 style="max-width: 180px; height: auto; filter: drop-shadow(0px 4px 10px rgba(0,0,0,0.3));">
        </div>

        <div class="card border-0 shadow-lg p-4" style="border-radius: 25px;">
            <div class="card-body">
                <div class="text-center mb-4">
                    <h2 class="fw-bold mb-1" style="color: #1c3c2d;">Join Us</h2>
                    <p class="text-muted small">Create your account to start shopping</p>
                </div>

                <form action="{{ route('register.submit') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label small fw-bold ms-2">Full Name</label>
                        <input type="text" name="name" class="form-control rounded-pill border-0 bg-light py-2 px-3" 
                               placeholder="John Doe" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold ms-2">Email Address</label>
                        <input type="email" name="email" class="form-control rounded-pill border-0 bg-light py-2 px-3" 
                               placeholder="john@example.com" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label small fw-bold ms-2">Password</label>
                        <input type="password" name="password" class="form-control rounded-pill border-0 bg-light py-2 px-3" 
                               placeholder="Minimum 8 characters" required>
                    </div>
                    
                    <button type="submit" class="btn w-100 rounded-pill py-2 fw-bold shadow-sm mb-3" 
                            style="background-color: #1c3c2d; color: white; transition: 0.3s;">
                        Register Now
                    </button>
                </form>

                <div class="text-center mt-3 pt-3 border-top">
                    <p class="small text-muted mb-0">Already a member?</p>
                    <a href="{{ route('login') }}" class="fw-bold text-decoration-none" style="color: #1c3c2d;">Sign In Instead</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection