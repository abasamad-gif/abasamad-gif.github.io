@extends('master.layout')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="text-center mb-5">
                <h1 class="fw-bold display-4" style="color: #1c3c2d;">Contact Us</h1>
                <p class="text-muted">We’re here to help you with your coffee and floral needs.</p>
            </div>

            <div class="card border-0 shadow-lg overflow-hidden" style="border-radius: 30px;">
                <div class="row g-0">
                    <div class="col-md-6 p-5 text-white d-flex flex-column justify-content-center" style="background-color: #1c3c2d;">
                        <div class="mb-5">
                            <h3 class="fw-bold mb-3">Reach Out</h3>
                            <p class="opacity-75">Connect with the founder directly for inquiries or special orders.</p>
                        </div>

                        <div class="space-y-4">
                            <div class="d-flex align-items-center mb-4">
                                <div class="bg-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                    <i class="bi bi-person-fill fs-4" style="color: #1c3c2d;"></i>
                                </div>
                                <div>
                                    <p class="small mb-0 opacity-75 text-uppercase fw-bold">Founder</p>
                                    <h5 class="mb-0">Fareez Zakwan</h5>
                                </div>
                            </div>

                            <div class="d-flex align-items-center mb-4">
                                <div class="bg-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                    <i class="bi bi-telephone-fill fs-4" style="color: #1c3c2d;"></i>
                                </div>
                                <div>
                                    <p class="small mb-0 opacity-75 text-uppercase fw-bold">Phone</p>
                                    <h5 class="mb-0">+60 11-1234 5678</h5>
                                </div>
                            </div>

                            <div class="d-flex align-items-center">
                                <div class="bg-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                    <i class="bi bi-geo-alt-fill fs-4" style="color: #1c3c2d;"></i>
                                </div>
                                <div>
                                    <p class="small mb-0 opacity-75 text-uppercase fw-bold">Address</p>
                                    <h5 class="mb-0">IIUM Gombak, Kuala Lumpur</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 bg-light d-flex align-items-center justify-content-center p-0" style="min-height: 400px;">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.535876272583!2d101.7335645758546!3d3.241517052735759!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc38c0373809cb%3A0x633190f845a706!2sInternational%20Islamic%20University%20Malaysia!5e0!3m2!1sen!2smy!4v1700000000000!5m2!1sen!2smy" 
                            width="100%" 
                            height="100%" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-5">
                <a href="{{ route('shop') }}" class="btn btn-outline-dark rounded-pill px-5 py-2 fw-bold" style="border-color: #1c3c2d; color: #1c3c2d;">
                    Return to Shop
                </a>
            </div>
        </div>
    </div>
</div>
@endsection