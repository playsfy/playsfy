@extends('layouts.default')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card" style="margin-top: 100px;">
                    <div class="text-center">
                        <div class="mt-2 mb-2">
                            <a href="/" class="text-success">
                                <span><img src="{{ asset('assets/images/playsfy_black.svg') }}" alt="" height="80"></span>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input class="form-control  @if ($errors->any()) parsley-error @endif" id="email" type="email" name="email"
                                :value="old('email')" required>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input class="form-control  @if ($errors->any()) parsley-error @endif" id="password" type="password" name="password"
                                required
                                autocomplete="current-password">
                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-checkbox checkbox-info">
                                    <input type="checkbox" class="custom-control-input" id="remember_me" name="remember">
                                    <label class="custom-control-label" for="remember_me">Remember me</label>
                                </div>
                            </div>

                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <small class="text-danger" style="margin-top: 0px;">{{ $error }}</small>
                                @endforeach
                            @endif

                            <div class="form-group text-center mt-4 pt-2">
                                <div class="col-sm-12">
                                    <a href="{{ route('password.request') }}" class="text-muted"><i
                                            class="fa fa-lock mr-1"></i>
                                        Forgot your password?</a>
                                </div>
                            </div>
                            @if (session('status'))
                                <div class="text-muted">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <div class="form-group account-btn text-center mt-2">
                                <div class="col-12">
                                    <button class="btn width-md btn-bordered btn-dark waves-effect waves-light"
                                        type="submit">Log In</button>
                                </div>
                            </div>
                        </form>

                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card -->

                <div class="row mt-5">
                    <div class="col-sm-12 text-center">
                        <p class="text-muted">Don't have an account? <a href="/register" class="text-primary ml-1"><b>Sign
                                    Up</b></a></p>
                    </div>
                </div>

            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
@stop
