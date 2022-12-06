@extends('auth')
@section('content')
<div class="mt-4">
    <form action="{{route('auth.register.post')}}" method="POST">
        @csrf
        <div class="form-outline mb-2">
            <label class="form-label" for="form3Example3">Email address</label>
            <input type="email" id="form3Example3" name="email" class="form-control form-control-lg "
                placeholder="Enter a valid email address" value="{{old('email')}}" />
            @error('email') {{$message}} @enderror
        </div>
        <div class="form-outline mb-2">
            <label class="form-label" for="form3Example4">User Name</label>
            <input type="text" id="form3Example4" name="username" value="{{old('username')}}"
                class=" form-control form-control-lg @error('username') is-invalid @enderror"
                placeholder="Enter username" />
            @error('username') {{$message}} @enderror

        </div>
        <div class="form-outline mb-2">
            <label class="form-label" for="form3Example5">Password</label>
            <input type="password" id="form3Example5" name="password" class="form-control form-control-lg"
                placeholder="Enter password" />
            @error('password') {{$message}} @enderror

        </div>
        <div class="form-outline mb-2">
            <label class="form-label" for="form3Example7">Confirm Password</label>
            <input type="password" id="form3Example7" name="password_confirmation" class="form-control form-control-lg"
                placeholder="Enter confirm password" />
            @error('password_confirmation') {{$message}} @enderror
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <div class="form-check mb-0">
                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                <label class="form-check-label" for="form2Example3">
                    Remember me
                </label>
            </div>
            <a href="#!" class="text-body">Forgot password?</a>
        </div>
        <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg"
                style="padding-left: 2.5rem; padding-right: 2.5rem;">Register</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="{{route('auth.login')}}"
                    class="link-danger">Login</a></p>
        </div>

    </form>
</div>
@endsection