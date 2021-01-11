<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title id="title-page">AMR | SSO Login</title>
    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="/css/app.css">
    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <script src="/js/app.js " defer></script>
    <link rel="stylesheet" media="screen, print" href="/admin/assets/vendors/css/vendor.bundle.css">
    <link rel="stylesheet" media="screen, print" href="/admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" media="screen, print" href="/admin/assets/css/style.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://www.google.com/recaptcha/api.js?onload=vueRecaptchaApiLoaded&render=explicit" async defer>
    </script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <style>
        .bs-1{
           box-shadow: 0px 2px 9px 1px #eac4f1;
        },
        .als{
            align-self: center;
        }
        .cp{
            cursor: pointer;
            user-select:none;
        }
        .nav-link.router-link-exact-active.router-link-active>.menu-title{
            color:#b66dff !important;
        }
        .router-link-exact-active.router-link-active{
            color:#b66dff !important;
        }

        .animate__faster{
              --animate-duration:300ms;
        }
    </style>
</head>

<body>
    <div id="app">
        <div class="container-scroller">
            @include('inc.navbar')
            <div class="container-fluid page-body-wrapper">
                @include('inc.sidebar')
                <div class="main-panel">
                    <div class="content-wrapper">
                        <router-view></router-view>
                        <vue-progress-bar></vue-progress-bar>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        @auth
            window.user = @json(auth()->user())
        @endauth
    </script>

</body>

</html>
