<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="Orbitor,business,company,agency,modern,bootstrap4,tech,software">
    <meta name="author" content="themefisher.com">

    <title>Novena- Health & Care Medical template</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/images/favicon.ico') }}" />
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="{{ asset('frontend/plugins/bootstrap/css/bootstrap.min.css') }}">
    {{--  --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Icon Font Css -->
    <link rel="stylesheet" href="{{ asset('frontend/plugins/icofont/icofont.min.css') }}">
    <!-- Slick Slider  CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/plugins/slick-carousel/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/plugins/slick-carousel/slick/slick-theme.css') }}">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">

</head>

<body id="top">

    <header>
        <div class="header-top-bar">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <ul class="top-bar-info list-inline-item pl-0 mb-0">
                            <li class="list-inline-item"><a href="mailto:support@gmail.com"><i
                                        class="icofont-support-faq mr-2"></i>support@novena.com</a></li>
                            <li class="list-inline-item"><i class="icofont-location-pin mr-2"></i>Address Ta-134/A, New
                                York, USA </li>
                        </ul>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-around ">
                        <div class="text-lg-right top-right-bar mt-2 mt-lg-0">
                            <a href="tel:+23-345-67890">
                                <span>Call Now : </span>
                                <span class="h4">823-4565-13456</span>
                            </a>
                        </div>
                        @php
                            $language = app()->getLocale();
                        @endphp
                        <form method="POST" id="languageForm">
                            @csrf
                            <div class="form-check form-switch ps-4 ms-4">
                                <input type="checkbox" class="form-check-input" role="switch"
                                    id="flexSwitchCheckChecked" {{ $language === 'np' ? 'checked' : '' }}
                                    onchange = "updateLanguage(this)">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navigation" id="navbar">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                    <img src="frontend/images/logo.png" alt="" class="img-fluid">
                </a>

                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmain"
                    aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icofont-navigation-menu"></span>
                </button>


                <div class="collapse navbar-collapse" id="navbarmain">
                    <ul class="navbar-nav ml-auto">


                        @foreach ($menus as $menu)
						<li class="nav-item active">
							<a class="nav-link" 
							   href="{{ 
								   $menu->menu_type_id == 1 
								   ? $menu->module->module_link 
								   : ($menu->menu_type_id == 2 
									   ? '/' . $menu->page->slug 
									   : $menu->external_link) 
							   }}">
							   {{ $menu->menu_name[$language] }}
							</a>
						</li>
                        @endforeach
                    </ul>

                </div>
            </div>
        </nav>
    </header>
    <script>
        function updateLanguage(checkbox) {
            var language = checkbox.checked ? 'np' : 'en';
            var form = document.getElementById('languageForm');
            form.action = '/translateLanguage/' + language;
            form.submit();
        }
    </script>
