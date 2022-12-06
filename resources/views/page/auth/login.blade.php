@extends('auth')

@section('content')
@if (session('message'))
<div class="alert alert-success mt-2" role="alert">
    <h4 class="alert-heading">{{session('message')}}</h4>
</div>
@endif
<form action="{{route('auth.login.post')}}" method="POST">
    @csrf
    <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
        <p class="lead fw-normal mb-0 me-3">Sign in with</p>
        <button type="button" class="btn btn-primary btn-floating mx-1">
            <i class="fab fa-facebook-f"></i>
        </button>
        <button type="button" class="btn btn-primary btn-floating mx-1">
            <i class="fab fa-twitter"></i>
        </button>

        <button type="button" class="btn btn-primary btn-floating mx-1">
            <i class="fab fa-linkedin-in"></i>
        </button>
    </div>

    <div class="divider d-flex align-items-center my-4">
        <p class="text-center fw-bold mx-3 mb-0">Or</p>
    </div>

    <!-- Email input -->
    <div class="form-outline mb-4">
        <label class="form-label" for="form3Example3">Email address</label>
        <input type="email" id="form3Example3" name="email"
            class="form-control form-control-lg @error('email') is-invalid @enderror"
            placeholder="Enter a valid email address" value="{{old('email')}}" />
        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Password input -->
    <div class="form-outline mb-2">
        <label class="form-label" for="form3Example4">Password</label>
        <input type="password" id="form3Example4" name="password"
            class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="Enter password" />
    </div>

    <div class="d-flex justify-content-between align-items-center">
        <!-- Checkbox -->
        <div class="form-check mb-0">
            <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
            <label class="form-check-label" for="form2Example3">
                Remember me
            </label>
        </div>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Forgot
            password?</button>
    </div>

    <div class="text-center text-lg-start mt-4 pt-2">
        <button type="submit" class="btn btn-primary btn-lg"
            style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="{{route('auth.register')}}"
                class="link-danger">Register</a></p>
    </div>

</form>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Forgot Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form_forgot" action="{{route('auth.forgot')}}" method="POST">
                    @csrf
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example77">Email address</label>
                        <input type="email" id="form3Example77" name="email"
                            class="form-control form-control-lg email_forgot" placeholder="Enter a valid email address"
                            value="{{old('email')}}" />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Send code</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="/js/formForgot.js"></script>

@endsection