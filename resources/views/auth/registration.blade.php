@extends('app')

@section('content')
<main class="signup-form">
    <!-- Container untuk halaman registrasi -->
    <div class="container">
        <!-- Notifikasi pesan sukses atau error -->
        <div class="row justify-content-center mt-5">
            <div class="col-lg-6">
                @if(session()->has('success'))
                    <div class="alert alert-success text-center">
                        {{ session()->get('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger text-center">
                            {{$error}}
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

        <!-- Form Register -->
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow-lg rounded">
                    <h3 class="card-header text-center text-white bg-dark py-4">Register User</h3>
                    <div class="card-body">
                        <form action="{{ route('register.custom') }}" method="POST">
                            @csrf

                            <!-- Input Name -->
                            <div class="form-group mb-4">
                                <input type="text" placeholder="Name" id="name" class="form-control form-control-lg" name="name" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>

                            <!-- Input Email -->
                            <div class="form-group mb-4">
                                <input type="email" placeholder="Email" id="email_address" class="form-control form-control-lg" name="email" required>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <!-- Input Password -->
                            <div class="form-group mb-4">
                                <input type="password" placeholder="Password" id="password" class="form-control form-control-lg" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>

                            <!-- Remember Me Checkbox -->
                            <div class="form-group form-check mb-4">
                                <input type="checkbox" class="form-check-input" name="remember_me" id="remember_me">
                                <label class="form-check-label" for="remember_me">Remember Me</label>
                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-dark btn-lg">Sign Up</button>
                            </div>

                            <!-- Login Link -->
                            <div class="d-grid gap-2 mt-3">
                                <p class="text-center mb-0">Already registered? <a href="/login" class="text-dark font-weight-bold">Login</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
