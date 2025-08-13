@extends('UI.master')

@push('css')
<style>
    .map-container iframe {
        border-radius: 12px;
    }
    @media (max-width: 768px) {
        .map-container iframe {
            height: 300px;
        }
    }
</style>
@endpush

@section('content')
<div class="container my-5">
    <div class="row g-4 align-items-start">

        <!-- Map Section -->
        <div class="col-lg-6 col-md-12" data-aos="fade-up" data-aos-delay="200">
            <div class="map-container rounded shadow-sm overflow-hidden">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3801.8876929468115!2d95.4553865735922!3d17.6554773950298!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c0c112588a0061%3A0xf5c6f212a9320ba7!2sUniversity%20of%20Computer%20Studies%2C%20Hinthada!5e0!3m2!1sen!2smm!4v1719460424160!5m2!1sen!2smm"
                    width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>

        <!-- Contact Card -->
        <div class="col-lg-6 col-md-12">
            <div class="card border-0 shadow-lg rounded overflow-hidden h-100">
                <img src="{{ asset('user/images/contact1.jpg') }}" class="card-img-top" alt="Contact" style="height: 250px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title text-primary fw-bold">ကျောင်းသားရေးရာ</h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong>ဖုန်းနံပါတ်</strong> 
                        <span>+959 254 896 191</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong>Email</strong>
                        <span>studentairfair@gmail.com</span>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</div>

@endsection

