<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>foodpedia - Numero Sada</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('FrontEnd/img/59-removebg-preview.png') }}">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="Free HTML Templates" name="keywords" />
    <meta content="Free HTML Templates" name="description" />

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Nunito&display=swap" rel="stylesheet" />

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />

    <!-- Flaticon Font -->
    <link href="{{ asset('/FrontEnd/lib/flaticon/font/flaticon.css') }}" rel="stylesheet" />

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('/FrontEnd/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/FrontEnd/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('/FrontEnd/css/style.css') }}" rel="stylesheet" />

</head>

<body>
    <!-- Navbar Start -->
    <div class="container-fluid bg-light position-relative shadow">
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5">
            <a href="/" class="navbar-brand font-weight-bold text-secondary" style="font-size: 45px">
                <span class="text-primary">foodpedia
                    <br><span style="color:black">Numero Sada</span>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav font-weight-bold mx-auto py-0">
                    <a href="/" class="nav-item nav-link">Home</a>
                    <a href="/pesanan" class="nav-item nav-link">Daftar Pesanan</a>
                    <a href="/reservasi" class="nav-item nav-link">Pesan Tempat</a>
                    <a href="{{ route('user.feedback') }}" class="nav-item nav-link">Testimoni</a>
                    <div class="nav-item dropdown">
                        <a href="/" class="nav-link dropdown-toggle" data-toggle="dropdown">Menu</a>
                        <div class="dropdown-menu">
                            @foreach ($kategori as $item)
                                <a href="/menu/{{ $item->slug }}" class="dropdown-item">{{ $item->nama }}</a>
                            @endforeach
                        </div>
                    </div>
                    <a href="/aboutus" class="nav-item nav-link">Tentang</a>
                </div>
                <div class="navbar-nav ml-auto">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="dropdown">
                                @if (Auth::check())
                                    @if (request()->route()->getName() === 'dashboard')
                                        <button class="btn btn-primary px-3 dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <i class="fa fa-bell"></i>
                                            {{ Auth::user()->name }}
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#notifications">
                                                Notifications <i class="fa fa-bell"></i>
                                            </a>
                                            @if ($notifications && count($notifications) > 0)
                                                <div id="notifications" class="dropdown-content">
                                                    @foreach ($notifications as $notification)
                                                        <a class="dropdown-item"
                                                            href="{{ route('home.markAsReadPelanggan', ['notificationId' => $notification->id]) }}">{{ $notification->pesan }}</a>
                                                    @endforeach
                                                    <div class="dropdown-divider"></div>
                                                </div>
                                            @endif
                                            <a class="dropdown-item" href="{{ route('logout') }}">
                                                Logout <i class="fa fa-sign-out"></i>
                                            </a>

                                    @endif
                            </div>
                        @else
                            <a href="/login" class="btn btn-primary px-3">Login</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

    </div>
    </nav>
    </div>
    <!-- Navbar End -->

    <!-- Header Start -->
    <div class="container-fluid bg- px-0 px-md-5 mb-5 py-4">
        <div class="row align-items-center px-3">
            <div class="col-lg-6 text-center text-lg-left">
                <h1 class="display-3 font-weight-bold text-white">
                    Kalo Mahal Jangan Balik Lagi
                </h1>
                <p class="text-white mb-4">
                    ganteng/cantik sih, tapi sayang udah makan belum?
                    <br> kalau belum mending singgah di Foodpedia.
                </p>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <img class="img-fluid mt-5" src="img/header.png" alt="" />
            </div>
        </div>
    </div>
