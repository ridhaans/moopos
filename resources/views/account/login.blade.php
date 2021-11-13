@extends('common.layout')

@push('style')
<style>
    html {
        min-height: 100%;
        background: url("{{asset('transaction.jpg')}}") rgba(0, 0, 0, 0.6);
        background-size: cover;
        background-blend-mode: multiply;
    }

    body {
        background: none;
    }

    .form-group {
        margin: 15px 0px;
    }

    .form-group .btn-primary.btn-block {

        width: 100%
    }
</style>
@endpush

@section('content')
<div class="login-box">




    <div class="card">
        <div class="card-body p-0">
            <div class="container-fluid mx-0">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 sm-hide p-0">
                        <img class="img-fluid" src="{{asset('moopos_logo4.jpg')}}" alt="Card image cap">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 sm-full col-sm-6 col-xs-12 p-0 ">
                        <nav>
                            <div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">
                                <button class="nav-link {{session()->get('tab-login')}}" id="nav-login-tab" data-bs-toggle="tab" data-bs-target="#nav-login" type="button" role="tab" aria-controls="nav-login" aria-selected="true">Masuk</button>
                                <button class="nav-link {{session()->get('tab-reg')}}" id="nav-register-tab" data-bs-toggle="tab" data-bs-target="#nav-register" type="button" role="tab" aria-controls="nav-register" aria-selected="false">Daftar</button>

                            </div>
                        </nav>
                        <div class="logo-container">
                            <img class="logo" src="{{asset('moopos_mini.png')}}" alt="Card image cap">
                        </div>

                        <div class="tab-content align-middle vertical-center-container" id="nav-tabContent">
                            <div class="tab-pane fade show {{session()->get('tab-login')}}" id="nav-login" role="tabpanel" aria-labelledby="nav-login-tab">
                                @if ($errors->first('login'))
                                <span id="login_message" class="message">
                                    <p class="text-danger text-center pt-4">{{$errors->first('login')}}</p>
                                </span>
                                @endif
                                <form method="POST" action="/">
                                    @csrf
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text theme-bg">
                                                    <i class="fa fa-user text-theme-yellow"></i> </span>
                                            </div>
                                            <input name="login_email" class="form-control" placeholder="pedagang@gmail.com" type="email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text theme-bg" width="60px"> <i class="fa fa-lock text-theme-yellow"></i>
                                                </span>
                                            </div>
                                            <input name="login_password" class="form-control" placeholder="******" type="password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block"> Masuk
                                        </button>
                                    </div>
                                    <!-- <p class="text-center"><a href="#" class="btn">Forgot password?</a></p> -->
                                </form>
                            </div>
                            <div class="tab-pane fade show {{session()->get('tab-reg')}}" id="nav-register" role="tabpanel" aria-labelledby="nav-register-tab">
                                @if ($errors->register)
                                <span id="regist_message" class="message">
                                    <p class="text-danger  text-center pt-4 message">{{$errors->register->first()}}
                                    </p>
                                </span>
                                @endif
                                <form method="POST" action="register">
                                    @csrf
                                    <!-- Name  -->
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text theme-bg" style="padding-left: 9px;">
                                                    <i class="fa fa-address-card-o text-theme-yellow"></i>
                                                </span>
                                            </div>
                                            <input name="name" value="{{old('name')}}" class="form-control" placeholder="Masukkan nama anda" type="text">
                                        </div>
                                    </div>
                                    <!-- Store Name -->
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text theme-bg" style="padding-left: 10px;">
                                                    <i class="fa fa-shopping-bag text-theme-yellow"></i> </span>
                                            </div>
                                            <input name="store" value="{{old('store')}}" class="form-control" placeholder="Masukkan nama toko anda" type="text">
                                        </div>
                                    </div>
                                    <!-- Email  -->
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text theme-bg">
                                                    <i class="fa fa-user text-theme-yellow"></i> </span>
                                            </div>
                                            <input name="email" value="{{old('email')}}" class="form-control" placeholder="Masukkan email anda" type="email">
                                        </div>
                                    </div>
                                    <!-- Password  -->


                                    <div class="form-group">
                                        <div class="input-group" id="show_hide_password">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text theme-bg" width="60px"> <i class="fa fa-lock text-theme-yellow"></i>
                                                </span>
                                            </div>
                                            <input name="password" class="form-control" placeholder="Password" type="password">
                                            <span class="input-group-addon">
                                                <a href="" class="icon-right"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block"> Daftar
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>

    <!-- card.// -->
    <!--                     
        <div class="card" >
            <img class="card-img-top"
                src="https://cdn0-production-images-kly.akamaized.net/tkhvPD4wU7y3pyTzuUNd6ODdMz0=/640x640/smart/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/medias/1141241/original/001968500_1455438595-chi-success-kid-meme-dad-kidney.jpg"
                alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                    the
                    card's content.</p>
                <a href="#" class="col-sm btn btn-primary">Go somewhere</a>
            </div>
        </div> -->
</div>
@endsection



@push('scripts')
<script>
    $(document).ready(function() {
        $("#show_hide_password a").on('click', function(event) {
            event.preventDefault();
            if ($('#show_hide_password input').attr("type") == "text") {
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password .input-group-addon a i').removeClass("fa-eye");
                $('#show_hide_password .input-group-addon a i').addClass("fa-eye-slash");

            } else if ($('#show_hide_password input').attr("type") == "password") {
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password .input-group-addon a i').removeClass("fa-eye-slash");
                $('#show_hide_password .input-group-addon a i').addClass("fa-eye");
            }

        });
    });
</script>
@endpush