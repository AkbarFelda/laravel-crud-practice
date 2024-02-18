@extends('layouts.main')
@section('container')
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <main class="form-registration w-100 m-auto">
                <h1 class="h3 mb-3 fw-normal text-center">Form Registration</h1>
                <form action="/register/store" method="post">
                    @csrf
                    <div class="form-floating">
                        <input type="text" name="name"
                            class="form-control rounded-top mt-2 @error('name') is-invalid @enderror" id="name"
                            placeholder="name" required value="{{ old('name') }}">
                        <label for="floatingInput">Name</label>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="email" name="email" class="form-control mt-2 @error('email') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" required value="{{ old('email') }}">
                        <label for="floatingInput">Email address</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password"<input type="password" name="password"
                            class="form-control rounded-bottom mt-2 @error('password') is-invalid @enderror"
                            id="floatingPassword" placeholder="Password">
                            <label for="floatingInput">Password</label>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button class="btn btn-primary w-100 py-2 mt-3" type="submit">Register</button>
                </form>
                <small class="d-block text-center mt-2">Have an Account? <a href="/login/index">Login</a></small>
            </main>
        </div>
    </div>
@endsection
