@extends('template.base')

@section('content')
<!-- Error 404 Page Content -->
<section class="py-3 py-md-5 min-vh-100 d-flex justify-content-center align-items-center bg-light">
    <div class="container text-center">
        <div class="row">
            <div class="col-md-8 col-lg-6 mx-auto">
                <h1 class="display-1 fw-bold text-danger">404</h1>
                <h2 class="display-4 mb-4">Oops! Page not found</h2>
                <p class="lead mb-4">The page you are looking for might have been moved or deleted.</p>
                <a href="{{ url('/') }}" class="btn btn-primary btn-lg">Back to Home</a>
            </div>
        </div>
    </div>
</section>
@endsection