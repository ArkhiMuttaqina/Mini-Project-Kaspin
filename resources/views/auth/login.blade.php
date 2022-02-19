@include('sweetalert::alert')
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login &mdash; Portal</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">
    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('bisa/') }}/bower_components/bootstrap-social/bootstrap-social.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('bisa/') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('bisa/') }}/css/components.css">

    <link rel="stylesheet" href="{{ asset('assets/') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('assets/') }}/css/components.css">
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="d-flex flex-wrap align-items-stretch">
                <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
                    <div class="p-4 m-3">
                        <img src="{{ asset('bisa/') }}/img/winnerlgo.png" alt="logo" width="180"
                            class="mb-10 mt-4">
                        <h4 class="text-dark font-weight-normal">Selamat datang di <span class="font-weight-bold">Mini
                                Project </span></h4>
                        <p class="text-muted">Program ini untuk memenuhi tuntutan seleksi penugasan untuk Kasir
                            Pintar</p>
                        @if (\Session::has('alert'))
                            <div class="alert alert-danger">
                                <div>{{ Session::get('alert') }}</div>
                            </div>
                        @endif
                        <form method="post" action="{{ url('') }}/menjaditamu" id="sign_in_as_guest">
                                    {{ csrf_field() }}
                        </form>
                        <form action="{{ route('postlogin') }}" enctype="multipart/form-data" id="sign_in_as_user"
                            method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input required="" id="username" name="username" type="username" class="form-control"
                                    name="username" tabindex="1" required autofocus>
                                <div class="invalid-feedback">
                                    Silahkan masukan Username anda :
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="d-block">
                                    <label for="password" class="control-label">Password</label>
                                </div>
                                <input required="" id="xpassword" type="password" class="form-control"
                                    name="xpassword" tabindex="2" required>
                                <div class="invalid-feedback">
                                    Silahkan masukan Password anda :
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="remember" class="custom-control-input" tabindex="3"
                                        id="showuwu" onclick="jebret()">

                                    <label style="margin-top:10px;" class="custom-control-label" for="showuwu">Tampilkan
                                        Password</label>
                                </div>
                            </div>

                            <div class="form-group text-right">

                                <button type="submit" form="sign_in_as_guest" class="btn btn-warning" tabindex="4">Masuk
                                    Sebagai Tamu</button>

                                <button type="submit" form="sign_in_as_user" class="btn btn-primary"
                                    tabindex="4">Masuk</button>
                            </div>
                        </form>



                        <div class="text-center mt-5 text-small">
                            Copyright &copy; oke aja.
                            <div class="mt-2">
                                {{-- <a href="#">Hubungi Admin</a>
                                <div class="bullet"></div>
                                <a href="#">Hubungi Dev</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom"
                    data-background="{{ asset('bisa/') }}/img/login-bgx.jpg">
                    <div class="absolute-bottom-left index-2">
                        <div class="text-light p-5 pb-2">
                            <div class="mb-5 pb-3">
                                <h1 class="mb-2 display-4 font-weight-bold">Mini Project</h1>
                                <h5 class="font-weight-normal text-muted-transparent">Seleksi Penugasan Kasir Pintar
                                </h5>
                            </div>
                        </div>
                    </div>
        </section>
    </div>




    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="{{ asset('bisa/') }}/js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Template JS File -->
    <script src="{{ asset('bisa/') }}/js/scripts.js"></script>
    <script src="{{ asset('bisa/') }}/js/custom.js"></script>

    <script type="text/javascript">
        function jebret() {
            var x = document.getElementById("xpassword");
            if (x.type == "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
    <!-- Page Specific JS File -->
</body>

</html>
