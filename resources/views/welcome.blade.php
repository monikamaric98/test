<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>OnPoint</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>

        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:400px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
    </style>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body class="antialiased">
<nav class="navbar" style="height: 80px; background-color: white; margin-bottom: 80px" id="pocetak">
    <div class="container">
        <a class="navbar-brand"  href="{{ url('/') }}" style="color: hotpink">
            OnPoint
        </a>
        @if (Route::has('login'))
            <div class="hidden ms-auto top-0 right-0 py-4 sm:block">
                @auth
                    <a href="{{ url('/home') }}" class="text-sm">Home</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm">Prijava</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm">Registracija</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
</nav>

<div class="container" id="sve">

    <div class="row">


        <div class="col-md-3">


            <div class="info-box mb-3">
                            <span class="info-box-icon">
                                 <a href ="https://docs.google.com/document/d/1H-Rg6ekX3dOFwW0tQx1AB1BKHNSjxpdn/edit?usp=sharing&ouid=100319752376696142724&rtpof=true&sd=true"
                                    target="_blank">
                                    <i class="fa-solid fa-eye"></i>
                                 </a>
                            </span>
                <div class="info-box-content">
                    <a href ="https://docs.google.com/document/d/1H-Rg6ekX3dOFwW0tQx1AB1BKHNSjxpdn/edit?usp=sharing&ouid=100319752376696142724&rtpof=true&sd=true"
                       target="_blank">
                        <span class="info-box-text">Vizija</span>
                    </a>

                </div>

            </div>

            <div class="info-box mb-3">
                            <span class="info-box-icon">
                                <a href="/kontakt" target="_blank">
                                    <i class="fa-solid fa-users"></i>
                                </a>
                            </span>
                <div class="info-box-content">
                    <a href="/kontakt" target="_blank">
                        <span class="info-box-text">O nama</span>
                    </a>
                </div>

            </div>

            <div class="info-box mb-3">
                            <span class="info-box-icon">
                                <a href="https://github.com/monikamaric98/test" target="_blank">
                                    <i class="fa-brands fa-github"></i>
                                </a>
                            </span>
                <div class="info-box-content">
                    <a href="https://github.com/monikamaric98/test" target="_blank">
                        <span class="info-box-text">Github</span>
                    </a>
                </div>

            </div>

        </div>

    </div>

    <br><br>
    <br><br>

    <div class="row">

        <div class="col-lg-3 col-6">
            <a href="/saloni">
            <div class="small-box">
                <div class="inner">
                    <h3>{{ $salons }}</h3>
                    <p>Salona</p>
                </div>


            </div>
            </a>
        </div>

        <div class="col-lg-3 col-6">
            <a href="/termini">

            <div class="small-box ">
                <div class="inner">
                    <h3>{{ $termins }}</h3>
                    <p>Termina</p>
                </div>

            </div>
            </a>
        </div>

        <div class="col-lg-3 col-6">

            <div class="small-box ">
                <div class="inner">
                    <h3>{{ $users }}</h3>
                    <p>Registriranih Korisnika</p>
                </div>

            </div>
        </div>

    </div>

    <br><br><br>

    <div class="row">
        <div class="col-md-6">
            <div class="card" style="background-color: rgba(248, 199, 224, 1); border-radius: 15px">
                <div class="card-header">
                    <h3 class="card-title">Novi saloni</h3>
                </div>

                <div class="card-body p-0">
                    <ul class="products-list product-list-in-card pl-2 pr-2">
                        @foreach($showsalons as $d)
                            <li class="item" style="background-color: white">
                                <div class="product-img">
                                    <a href="/saloni{{ $d->id }}">
                                        <img src="/storage/{{ $d->image }}" alt="Device image" class="img-size-50">
                                    </a>
                                </div>
                                <div class="product-info">
                                    <a href="/saloni{{ $d->id }}" class="product-title" id="text">
                                        {{ $d->naziv }}
                                    </a> <br>
                                    <small class="text-muted">{{ $d->lokacija }}</small>

                                </div>

                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="card-footer text-center" style="color: black">
                    <a href="/saloni" class="uppercase">Pogledaj sve salone</a>
                </div>

            </div>

        </div>
        <div class="col-md-6">
            <!--<div class="card" style="background-color: rgba(248, 199, 224, 1); border-radius: 15px">
                <div class="card-header">
                    <h3 class="card-title">Novi termini</h3>
                </div>

                <div class="card-body p-0" style="background-color: white">
                    <ul class="users-list clearfix">
                        @foreach($showtermins as $u)
                            <li>
                                <a class="users-list-name" id="text" href="/profile{{ $u->id }}">
                                    {{ $u->datum_termina }}
                                </a>
                                <a class="users-list-name" id="text" href="/profile{{ $u->id }}">
                                    {{ $u->vrijeme_termina }}
                                </a>
                            </li>
                        @endforeach
                    </ul>

                </div>

                <div class="card-footer text-center" style="color: black">
                    <a href="/termini">Pogledaj sve termine</a>
                </div>

            </div>-->
        </div>
    </div>

    <br><br>



    <br><br><br> <br>
    <h4 class="text" id="tehnologije">&nbsp;Tehnologije koje smo koristili u ovome projektu su:</h4>

    <br>

    <div class="info-box">
        <div class="info-box-content">
            <ul style="font-size: 30px; font-family: 'Times New Roman', Times, serif; color: black">
                <li>
                    HTML <i class="fa-brands fa-html5"></i>
                </li>
                <li>
                    CSS <i class="fa-brands fa-css3-alt"></i>
                </li>
                <li>
                    JavaScript <i class="fa-brands fa-js"></i>
                </li>
                <li>
                    Bootstrap <i class="fa-brands fa-bootstrap"></i>
                </li>
                <li>
                    Laravel <i class="fa-brands fa-laravel"></i>
                </li>
                <li>
                    Font Awesome <i class="fa-solid fa-font-awesome"></i>
                </li>
            </ul>

            <br>
            <!--<a href="#naslov" style="height: 30px; width: 30px;
            border-radius: 15px; background-color: #7e57c2; color: white;margin-left: auto">
                <i class="fa-solid fa-arrow-up"></i>
            </a>-->

        </div>
    </div>

    <br><br><br>
    <div id="pozzy">
        <div class="text-center">
            <h3 class="text" id="o_projektu"><br>O našem projektu:</h3>
            <p id="text">

                Ovaj sustav će nuditi vlasnicima frizerskih i kozmetičkih salona da naprave profile , te izlistaju svoju ponudu .
                <br>Kao što su vrste tretmana koje nude, cijene , kratki opis , slobodne termine te lokaciju.
                <br>Dok gosti koji posjećuju sustav će moći u vrlo kratkom vremenskom roku pronaći odgovarajući termin za uslugu koju traže , s odgovarajućom cijenom i lokacijom.
                Prednost je što će moći odjednom više usluga rezervirati što znatno štedi vrijeme i omogućava iz topline vlastitog doma obaviti potrebne stvari.
            </p>


            <br>
            <h3 class="text" id="motivacija">Motivacija:</h3>
            <p id="text">
                Želimo olakšati i uljepšati svakodnevni život svim korisnicima koji uvijek žele biti "on point".
                <br><br><br>
        </div>
    </div>
</div>
<br>

</body>
</html>
<style>

    html {
        scroll-behavior: smooth;
    }


    @media only screen and (max-width: 600px) {
        #pozzy {
            background-color: rgba(248, 199, 224, 1);
            border-radius: 150px;
        }
        #text {
            color: white;
        }
    }


    @media only screen and (min-width: 600px) {
        #pozzy {
            background-color: rgba(248, 199, 224, 1);

        }

        #text{
            color: black;
        }

    }

    .footer{
        background-color: white;
        height: 45px;
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
    }

    #footer2{
        background-image: linear-gradient(to right, #15041f, #370252);
    }

    .info-box {
        border-radius: 20px;
    }

    .small-box {
        background-color: rgba(248, 199, 224, 0.95);
        border-radius: 15px;
        color: black;
    }

    #ikona{
        color: rgba(0, 0, 0, 0.2);
    }

    #informacije{
        color: rgba(0, 0, 0, 0.5);

    }
    @media only screen and (min-width: 765px) {
        #informacije{
            padding-left: 5px;
        }
    }

    .info-box {
        background-color: rgba(248, 199, 224, 0.5);
        color: black;
    }

    body {
        padding-bottom: 45px;

        background-image: url("pozadina.jpg");
        min-height: 100%;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
        background-size: cover;
    }

    #gore{
        height: 25px;
        width: 25px;
        border-radius: 10px;
        background-color: transparent;
        border: thin solid white;
        color: white;
    }

</style>

<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
