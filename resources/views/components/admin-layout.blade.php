<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
    lang="en"
    class="light-style layout-menu-fixed"
>
<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />
    <script src="https://kit.fontawesome.com/e0462e4fee.js" crossorigin="anonymous"></script>
    <title>Jeroen Wirken</title>

    <meta name="description" content="" />

    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet"
    />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('css/admin/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('css/admin/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('css/admin/demo.css')}}" />
    <link rel="stylesheet" href="{{asset('css/admin/style.css')}}" />
{{--    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">--}}

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('css/admin/perfect-scrollbar.css')}}" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{asset('js/admin/helpers.js')}}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('js/admin/config.js')}}"></script>
</head>

<body>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
            <div class="app-brand demo">
                <a href="{{route('admin.dashboard')}}" class="app-brand-link">
                  <span class="app-brand-logo demo">
                    <img class="headerLogo" src="{{asset('images/logo2.png')}}" alt="">
                  </span>
                </a>

                <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                    <i class="bx bx-chevron-left bx-sm align-middle"></i>
                </a>
            </div>

            <div class="menu-inner-shadow"></div>

            <ul class="menu-inner py-1">
                <!-- Dashboard -->
                <li class="menu-item">
                    <a href="{{route('admin.carousel.index')}}" class="menu-link gap-2">
                        <i class="fa-solid fa-image text-info"></i>
                        <div data-i18n="Analytics">Carousel foto's</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('admin.workouts.index')}}" class="menu-link gap-2">
                        <i class="fa-solid fa-dumbbell text-info"></i>
                        <div>Wirken workouts</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link gap-2 position-relative">
                        <i class="fa-solid fa-envelope text-info"></i>
                        <div class="position-relative">
                            Contact berichten <span class="badge rounded-pill bg-danger">9+</span>
                        </div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('admin.logout')}}" class="menu-link gap-2">
                        <i class="fa-solid fa-right-from-bracket text-info"></i>
                        <div>Loguit</div>
                    </a>
                </li>
            </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none p-2">
                <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                    <i class="fa-solid fa-bars fs-3 text-info"></i>
                </a>
            </div>
            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->

                <div class="container-fluid flex-grow-1 container-p-y">
                    <!-- Layout Demo -->
                    {{$slot}}
                    <!--/ Layout Demo -->
                </div>
                <!-- / Content -->

                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
</div>

<script src="{{asset('js/admin/jquery.js')}}"></script>
<script src="{{asset('js/admin/popper.js')}}"></script>
<script src="{{asset('js/admin/bootstrap.js')}}"></script>
<script src="{{asset('js/admin/perfect-scrollbar.js')}}"></script>
<script src="{{asset('js/admin/menu.js')}}"></script>
<script src="{{asset('js/admin/main.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('js/admin/script.js')}}"></script>
</body>
</html>
