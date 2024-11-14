@extends('app')

@section('content')
<main class="login-form">
    <!-- Notifikasi pesan sukses atau error -->
    <div class="container">
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

        <!-- Form Login -->
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow-lg rounded">
                    <h3 class="card-header text-center text-white bg-dark py-4">Login</h3>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login.custom') }}">
                            @csrf

                            <!-- Input Email -->
                            <div class="form-group mb-4">
                                <input type="text" placeholder="Email" id="email" class="form-control form-control-lg" name="email" required autofocus>
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
                                <button type="submit" class="btn btn-dark btn-lg">Signin</button>
                            </div>

                            <!-- Register Link -->
                            <div class="d-grid gap-2 mt-3">
                                <p class="text-center mb-0">New User? <a href="/registration" class="text-dark font-weight-bold">Register</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
