@extends('layout.html')

@section('page_content')
     <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <div class="d-flex success-checkout align-items-center justify-content-center">
        <div class="col col-lg-4 text-center">
            <h3 class="mt-4">
                Sukses Terbayar!
            </h3>
            <p class="mt-2">
                Silakan tunggu update terbaru dari kami via email yang sudah Anda daftarkan sebelumnya.
            </p>
            <a href="{{ route('index') }}" class="primary-btn pd-cart mt-3">Back to Home</a>
        </div>
    </div>
@endsection