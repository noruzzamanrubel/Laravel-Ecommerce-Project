@extends('layouts.app')

@section('content')

    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_responsive.css') }}">

    <div class="contact_form">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1" style="border: 1px solid grey; padding:20px; Border-radius:10px">
                    <div class="contact_form_container">
                        <div class="contact_form_title text-center">Forget Password</div>

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group">
                                <label for="email">Email Adress</label>
                                <input id="email" type="email" name="email" class="form-control"
                                    aria-describedby="emailHelp" required=" ">
                            </div>
                            <div class="contact_form_button">
                                <button type="submit" class="btn btn-info">Email Password Reset Link</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel"></div>
    </div>
@endsection
