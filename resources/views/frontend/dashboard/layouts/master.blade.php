<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" class="light" data-header-styles="light" data-menu-styles="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Synto - Tailwind Admin Template </title>
    <meta name="description" content="A Tailwind CSS admin template is a pre-designed web page for an admin dashboard. Optimizing it for SEO includes using meta descriptions and ensuring it's responsive and fast-loading.">
    <meta name="keywords" content="analytics dashboard,jobs dashboard,crm dashboard examples,personal dashboard,sales dashboard sample,best crm dashboard,crypto dashboard template,sales analytics dashboard,stocks dashboard,hrm dashboard,ecommerce admin panel template,sales admin dashboard,admin panel for ecommerce website,website template ecommerce,template dashboard,course dashboard,template ecommerce website">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('back/dist/assets/img/brand-logos/favicon.ico') }}">

    <!-- Main JS -->
    <script src="{{ asset('back/dist/assets/js/main.js') }}"></script>

    <!-- Style Css -->
    <link rel="stylesheet" href="{{ asset('back/dist/assets/css/style.css') }}">

    <!-- Simplebar Css -->
    <link rel="stylesheet" href="{{ asset('back/dist/assets/libs/simplebar/simplebar.min.css') }}">

    <!-- Color Picker Css -->
    <link rel="stylesheet" href="{{ asset('back/dist/assets/libs/@simonwep/pickr/themes/nano.min.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    
    @stack('css')

</head>

<body class="">

    <!-- ========== Switcher  ========== -->
    <div id="hs-overlay-switcher" class="hs-overlay hidden ti-offcanvas ti-offcanvas-right" tabindex="-1">
      <div class="ti-offcanvas-header z-10 relative">
        <h3 class="ti-offcanvas-title">
          Switcher
        </h3>
        <button type="button"
          class="ti-btn flex-shrink-0 p-0 transition-none text-gray-500 hover:text-gray-700 focus:ring-gray-400 focus:ring-offset-white"
          data-hs-overlay="#hs-overlay-switcher">
          <span class="sr-only">Close modal</span>
          <i class="ri-close-circle-line leading-none text-lg"></i>
        </button>
      </div>
      <div class="ti-offcanvas-body pt-0 border-b z-10 relative">
        <div class="flex space-x-2 rtl:space-x-reverse" aria-label="Tabs" role="tablist">
          <button type="button"
            class="hs-tab-active:bg-secondary/10 w-full hs-tab-active:border-b-transparent hs-tab-active:text-secondary -mb-px py-2 px-3 bg-white text-xs font-medium text-center border text-gray-500 rounded-sm hover:text-gray-700 active"
            id="switcher-item-1" data-hs-tab="#switcher-1" aria-controls="switcher-1" role="tab">
            Theme Style
          </button>
          <button type="button"
            class="hs-tab-active:bg-secondary/10 w-full hs-tab-active:border-b-transparent hs-tab-active:text-secondary -mb-px py-2 px-3 bg-white text-xs font-medium text-center border text-gray-500 rounded-sm hover:text-gray-700"
            id="switcher-item-2" data-hs-tab="#switcher-2" aria-controls="switcher-2" role="tab">
            Theme Colors
          </button>
        </div>
      </div>
      <div class="ti-offcanvas-body" id="switcher-body">
        <div id="switcher-1" role="tabpanel" aria-labelledby="switcher-item-1" class="space-y-6">
          <div class="space-y-6">
            <p class="switcher-style-head">Theme Color Mode:</p>
            <div class="grid grid-cols-3 gap-6 switcher-style">
              <div class="flex">
                <input type="radio" name="theme-style" class="ti-form-radio" id="switcher-light-theme" checked>
                <label for="switcher-light-theme"
                  class="text-xs text-gray-500 ltr:ml-2 rtl:mr-2">Light</label>
              </div>
              <div class="flex">
                <input type="radio" name="theme-style" class="ti-form-radio" id="switcher-dark-theme">
                <label for="switcher-dark-theme"
                  class="text-xs text-gray-500 ltr:ml-2 rtl:mr-2">Dark</label>
              </div>
            </div>
          </div>
          <div class="space-y-6">
            <p class="switcher-style-head">Directions:</p>
            <div class="grid grid-cols-3 gap-6 switcher-style">
              <div class="flex">
                <input type="radio" name="direction" class="ti-form-radio" id="switcher-ltr" checked>
                <label for="switcher-ltr" class="text-xs text-gray-500 ltr:ml-2 rtl:mr-2">LTR</label>
              </div>
              <div class="flex">
                <input type="radio" name="direction" class="ti-form-radio" id="switcher-rtl">
                <label for="switcher-rtl" class="text-xs text-gray-500 ltr:ml-2 rtl:mr-2">RTL</label>
              </div>
            </div>
          </div>
          <div class="space-y-6">
            <p class="switcher-style-head">Navigation Styles:</p>
            <div class="grid grid-cols-3 gap-6 switcher-style">
              <div class="flex">
                <input type="radio" name="navigation-style" class="ti-form-radio" id="switcher-vertical" checked>
                <label for="switcher-vertical"
                  class="text-xs text-gray-500 ltr:ml-2 rtl:mr-2">Vertical</label>
              </div>
              <div class="flex">
                <input type="radio" name="navigation-style" class="ti-form-radio" id="switcher-horizontal">
                <label for="switcher-horizontal"
                  class="text-xs text-gray-500 ltr:ml-2 rtl:mr-2">Horizontal</label>
              </div>
            </div>
          </div>
          <div class="space-y-6">
            <p class="switcher-style-head">Navigation Menu Style:</p>
            <div class="grid grid-cols-2 gap-6 switcher-style">
              <div class="flex">
                <input type="radio" name="navigation-data-menu-styles" class="ti-form-radio" id="switcher-menu-click"
                  checked>
                <label for="switcher-menu-click" class="text-xs text-gray-500 ltr:ml-2 rtl:mr-2">Menu
                  Click</label>
              </div>
              <div class="flex">
                <input type="radio" name="navigation-data-menu-styles" class="ti-form-radio" id="switcher-menu-hover">
                <label for="switcher-menu-hover" class="text-xs text-gray-500 ltr:ml-2 rtl:mr-2">Menu
                  Hover</label>
              </div>
              <div class="flex">
                <input type="radio" name="navigation-data-menu-styles" class="ti-form-radio" id="switcher-icon-click">
                <label for="switcher-icon-click" class="text-xs text-gray-500 ltr:ml-2 rtl:mr-2">Icon
                  Click</label>
              </div>
              <div class="flex">
                <input type="radio" name="navigation-data-menu-styles" class="ti-form-radio" id="switcher-icon-hover">
                <label for="switcher-icon-hover" class="text-xs text-gray-500 ltr:ml-2 rtl:mr-2">Icon
                  Hover</label>
              </div>
            </div>
            <div class="px-4 text-secondary text-xs"><b class="lt:mr-2 rtl:ml-2">Note:</b>Works same for both Vertical and
              Horizontal
            </div>
          </div>
          <div class="space-y-6">
            <p class="switcher-style-head">Page Styles:</p>
            <div class="grid grid-cols-3 gap-6 switcher-style">
              <div class="flex">
                <input type="radio" name="data-page-styles" class="ti-form-radio" id="switcher-regular" checked>
                <label for="switcher-regular"
                  class="text-xs text-gray-500 ltr:ml-2 rtl:mr-2">Regular</label>
              </div>
              <div class="flex">
                <input type="radio" name="data-page-styles" class="ti-form-radio" id="switcher-classic">
                <label for="switcher-classic"
                  class="text-xs text-gray-500 ltr:ml-2 rtl:mr-2">Classic</label>
              </div>
            </div>
          </div>
          <div class="space-y-6">
            <p class="switcher-style-head">Layout Width Styles:</p>
            <div class="grid grid-cols-3 gap-6 switcher-style">
              <div class="flex">
                <input type="radio" name="layout-width" class="ti-form-radio" id="switcher-full-width" checked>
                <label for="switcher-full-width"
                  class="text-xs text-gray-500 ltr:ml-2 rtl:mr-2">FullWidth</label>
              </div>
              <div class="flex">
                <input type="radio" name="layout-width" class="ti-form-radio" id="switcher-boxed">
                <label for="switcher-boxed" class="text-xs text-gray-500 ltr:ml-2 rtl:mr-2">Boxed</label>
              </div>
            </div>
          </div>
          <div class="space-y-6">
            <p class="switcher-style-head">Menu Positions:</p>
            <div class="grid grid-cols-3 gap-6 switcher-style">
              <div class="flex">
                <input type="radio" name="data-menu-positions" class="ti-form-radio" id="switcher-menu-fixed" checked>
                <label for="switcher-menu-fixed"
                  class="text-xs text-gray-500 ltr:ml-2 rtl:mr-2">Fixed</label>
              </div>
              <div class="flex">
                <input type="radio" name="data-menu-positions" class="ti-form-radio" id="switcher-menu-scroll">
                <label for="switcher-menu-scroll"
                  class="text-xs text-gray-500 ltr:ml-2 rtl:mr-2">Scrollable </label>
              </div>
            </div>
          </div>
          <div class="space-y-6">
            <p class="switcher-style-head">Header Positions:</p>
            <div class="grid grid-cols-3 gap-6 switcher-style">
              <div class="flex">
                <input type="radio" name="data-header-positions" class="ti-form-radio" id="switcher-header-fixed" checked>
                <label for="switcher-header-fixed" class="text-xs text-gray-500 ltr:ml-2 rtl:mr-2">
                  Fixed</label>
              </div>
              <div class="flex">
                <input type="radio" name="data-header-positions" class="ti-form-radio" id="switcher-header-scroll">
                <label for="switcher-header-scroll"
                  class="text-xs text-gray-500 ltr:ml-2 rtl:mr-2">Scrollable
                </label>
              </div>
            </div>
          </div>
          <div class="space-y-6 sidemenu-layout-styles">
            <p class="switcher-style-head">Sidemenu Layout Syles:</p>
            <div class="grid grid-cols-2 gap-6 switcher-style">
              <div class="flex">
                <input type="radio" name="sidemenu-layout-styles" class="ti-form-radio" id="switcher-default-menu" checked>
                <label for="switcher-default-menu"
                  class="text-xs text-gray-500 ltr:ml-2 rtl:mr-2 ">Default
                  Menu</label>
              </div>
              <div class="flex">
                <input type="radio" name="sidemenu-layout-styles" class="ti-form-radio" id="switcher-closed-menu">
                <label for="switcher-closed-menu" class="text-xs text-gray-500 ltr:ml-2 rtl:mr-2 ">
                  Closed
                  Menu</label>
              </div>
              <div class="flex">
                <input type="radio" name="sidemenu-layout-styles" class="ti-form-radio" id="switcher-icontext-menu">
                <label for="switcher-icontext-menu" class="text-xs text-gray-500 ltr:ml-2 rtl:mr-2 ">Icon
                  Text</label>
              </div>
              <div class="flex">
                <input type="radio" name="sidemenu-layout-styles" class="ti-form-radio" id="switcher-icon-overlay">
                <label for="switcher-icon-overlay" class="text-xs text-gray-500 ltr:ml-2 rtl:mr-2 ">Icon
                  Overlay</label>
              </div>
              <div class="flex">
                <input type="radio" name="sidemenu-layout-styles" class="ti-form-radio" id="switcher-detached">
                <label for="switcher-detached"
                  class="text-xs text-gray-500 ltr:ml-2 rtl:mr-2 ">Detached</label>
              </div>
              <div class="flex">
                <input type="radio" name="sidemenu-layout-styles" class="ti-form-radio" id="switcher-double-menu">
                <label for="switcher-double-menu" class="text-xs text-gray-500 ltr:ml-2 rtl:mr-2">Double
                  Menu</label>
              </div>
            </div>
            <div class="px-4 text-secondary text-xs"><b class="ltr:mr-2 rtl:ml-2">Note:</b>Navigation menu styles won't work
              here.</div>
          </div>
        </div>
        <div id="switcher-2" class="hidden space-y-6" role="tabpanel" aria-labelledby="switcher-item-2">
          <div class="theme-colors">
            <p class="switcher-style-head">Menu Colors:</p>
            <div class="flex switcher-style space-x-3 rtl:space-x-reverse">
              <div class="hs-tooltip ti-main-tooltip ti-form-radio switch-select ">
                <input class="hs-tooltip-toggle ti-form-radio color-input color-white" type="radio" name="menu-colors"
                  id="switcher-menu-light" checked>
                <span
                  class="hs-tooltip-content ti-main-tooltip-content py-1 px-2 bg-gray-900 text-xs font-medium text-white shadow-sm"
                  role="tooltip">
                  Light Menu
                </span>
              </div>
              <div class="hs-tooltip ti-main-tooltip ti-form-radio switch-select ">
                <input class="hs-tooltip-toggle ti-form-radio color-input color-dark" type="radio" name="menu-colors"
                  id="switcher-menu-dark" checked>
                <span
                  class="hs-tooltip-content ti-main-tooltip-content py-1 px-2 bg-gray-900 text-xs font-medium text-white shadow-sm"
                  role="tooltip">
                  Dark Menu
                </span>
              </div>
              <div class="hs-tooltip ti-main-tooltip ti-form-radio switch-select ">
                <input class="hs-tooltip-toggle ti-form-radio color-input color-primary" type="radio" name="menu-colors"
                  id="switcher-menu-primary">
                <span
                  class="hs-tooltip-content ti-main-tooltip-content py-1 px-2 bg-gray-900 text-xs font-medium text-white shadow-sm"
                  role="tooltip">
                  Color Menu
                </span>
              </div>
              <div class="hs-tooltip ti-main-tooltip ti-form-radio switch-select ">
                <input class="hs-tooltip-toggle ti-form-radio color-input color-gradient" type="radio" name="menu-colors"
                  id="switcher-menu-gradient">
                <span
                  class="hs-tooltip-content ti-main-tooltip-content py-1 px-2 bg-gray-900 text-xs font-medium text-white shadow-sm"
                  role="tooltip">
                  Gradient Menu
                </span>
              </div>
              <div class="hs-tooltip ti-main-tooltip ti-form-radio switch-select ">
                <input class="hs-tooltip-toggle ti-form-radio color-input color-transparent" type="radio" name="menu-colors"
                  id="switcher-menu-transparent">
                <span
                  class="hs-tooltip-content ti-main-tooltip-content py-1 px-2 bg-gray-900 text-xs font-medium text-white shadow-sm"
                  role="tooltip">
                  Transparent Menu
                </span>
              </div>
            </div>
            <div class="px-4 text-secondary text-xs"><b class="ltr:mr-2 rtl:ml-2">Note:</b>If you want to change color Menu
              dynamically
              change from below Theme Primary color picker.</div>
          </div>
          <div class="theme-colors">
            <p class="switcher-style-head">Header Colors:</p>
            <div class="flex switcher-style space-x-3 rtl:space-x-reverse">
              <div class="hs-tooltip ti-main-tooltip ti-form-radio switch-select ">
                <input class="hs-tooltip-toggle ti-form-radio color-input color-white" type="radio" name="header-colors"
                  id="switcher-header-light" checked>
                <span
                  class="hs-tooltip-content ti-main-tooltip-content py-1 px-2 bg-gray-900 text-xs font-medium text-white shadow-sm"
                  role="tooltip">
                  Light Header
                </span>
              </div>
              <div class="hs-tooltip ti-main-tooltip ti-form-radio switch-select ">
                <input class="hs-tooltip-toggle ti-form-radio color-input color-dark" type="radio" name="header-colors"
                  id="switcher-header-dark">
                <span
                  class="hs-tooltip-content ti-main-tooltip-content py-1 px-2 bg-gray-900 text-xs font-medium text-white shadow-sm"
                  role="tooltip">
                  Dark Header
                </span>
              </div>
              <div class="hs-tooltip ti-main-tooltip ti-form-radio switch-select ">
                <input class="hs-tooltip-toggle ti-form-radio color-input color-primary" type="radio" name="header-colors"
                  id="switcher-header-primary">
                <span
                  class="hs-tooltip-content ti-main-tooltip-content py-1 px-2 bg-gray-900 text-xs font-medium text-white shadow-sm"
                  role="tooltip">
                  Color Header
                </span>
              </div>
              <div class="hs-tooltip ti-main-tooltip ti-form-radio switch-select ">
                <input class="hs-tooltip-toggle ti-form-radio color-input color-gradient" type="radio" name="header-colors"
                  id="switcher-header-gradient">
                <span
                  class="hs-tooltip-content ti-main-tooltip-content py-1 px-2 bg-gray-900 text-xs font-medium text-white shadow-sm"
                  role="tooltip">
                  Gradient Header
                </span>
              </div>
              <div class="hs-tooltip ti-main-tooltip ti-form-radio switch-select ">
                <input class="hs-tooltip-toggle ti-form-radio color-input color-transparent" type="radio"
                  name="header-colors" id="switcher-header-transparent">
                <span
                  class="hs-tooltip-content ti-main-tooltip-content py-1 px-2 bg-gray-900 text-xs font-medium text-white shadow-sm"
                  role="tooltip">
                  Transparent Header
                </span>
              </div>
            </div>
            <div class="px-4 text-secondary text-xs"><b class="ltr:mr-2 rtl:ml-2">Note:</b>If you want to change color
              Header dynamically
              change from below Theme Primary color picker.</div>
          </div>
          <div class="theme-colors">
            <p class="switcher-style-head">Theme Primary:</p>
            <div class="flex switcher-style space-x-3 rtl:space-x-reverse">
              <div class="ti-form-radio switch-select">
                <input class="ti-form-radio color-input color-primary-1" type="radio" name="theme-primary"
                  id="switcher-primary" checked>
              </div>
              <div class="ti-form-radio switch-select">
                <input class="ti-form-radio color-input color-primary-2" type="radio" name="theme-primary"
                  id="switcher-primary1">
              </div>
              <div class="ti-form-radio switch-select">
                <input class="ti-form-radio color-input color-primary-3" type="radio" name="theme-primary"
                  id="switcher-primary2">
              </div>
              <div class="ti-form-radio switch-select">
                <input class="ti-form-radio color-input color-primary-4" type="radio" name="theme-primary"
                  id="switcher-primary3">
              </div>
              <div class="ti-form-radio switch-select">
                <input class="ti-form-radio color-input color-primary-5" type="radio" name="theme-primary"
                  id="switcher-primary4">
              </div>
              <div class="ti-form-radio switch-select ltr:pl-0 rtl:pr-0 mt-1 color-primary-light">
                <div class="theme-container-primary"></div>
                <div class="pickr-container-primary"></div>
              </div>
            </div>
          </div>
          <div class="theme-colors">
            <p class="switcher-style-head">Theme Background:</p>
            <div class="flex switcher-style space-x-3 rtl:space-x-reverse">
              <div class="ti-form-radio switch-select">
                <input class="ti-form-radio color-input color-bg-1" type="radio" name="theme-background"
                  id="switcher-background" checked>
              </div>
              <div class="ti-form-radio switch-select">
                <input class="ti-form-radio color-input color-bg-2" type="radio" name="theme-background"
                  id="switcher-background1">
              </div>
              <div class="ti-form-radio switch-select">
                <input class="ti-form-radio color-input color-bg-3" type="radio" name="theme-background"
                  id="switcher-background2">
              </div>
              <div class="ti-form-radio switch-select">
                <input class="ti-form-radio color-input color-bg-4" type="radio" name="theme-background"
                  id="switcher-background3">
              </div>
              <div class="ti-form-radio switch-select">
                <input class="ti-form-radio color-input color-bg-5" type="radio" name="theme-background"
                  id="switcher-background4">
              </div>
              <div class="ti-form-radio switch-select ltr:pl-0 rtl:pr-0 mt-1 color-bg-transparent">
                <div class="theme-container-background"></div>
                <div class="pickr-container-background"></div>
              </div>
            </div>
          </div>
          <div class="menu-image theme-colors">
            <p class="switcher-style-head">Menu With Background Image:</p>
            <div class="flex switcher-style space-x-3 rtl:space-x-reverse">
              <div class="ti-form-radio switch-select">
                <input class="ti-form-radio bgimage-input bg-img1" type="radio" name="theme-images" id="switcher-bg-img">
              </div>
              <div class="ti-form-radio switch-select">
                <input class="ti-form-radio bgimage-input bg-img2" type="radio" name="theme-images" id="switcher-bg-img1">
              </div>
              <div class="ti-form-radio switch-select">
                <input class="ti-form-radio bgimage-input bg-img3" type="radio" name="theme-images" id="switcher-bg-img2">
              </div>
              <div class="ti-form-radio switch-select">
                <input class="ti-form-radio bgimage-input bg-img4" type="radio" name="theme-images" id="switcher-bg-img3">
              </div>
              <div class="ti-form-radio switch-select">
                <input class="ti-form-radio bgimage-input bg-img5" type="radio" name="theme-images" id="switcher-bg-img4">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="ti-offcanvas-footer !justify-center">
        <a id="reset-all" class="ti-btn ti-btn-danger" href="javascript:void(0);">Reset</a>
      </div>
    </div>
    <!-- ========== END Switcher  ========== -->

    <div class="page">

        <!-- Start::app-sidebar -->
        @include('frontend.dashboard.layouts.sidebar')
        <!-- End::app-sidebar -->

        <!-- Start::Header -->
        @include('frontend.dashboard.layouts.navbar')
        <!-- End::Header -->

        <div class="content">

            <!-- Start::main-content -->
            <div class="main-content">

                @yield('content')

            </div>
            <!-- Start::main-content -->

        </div>

        <!-- ========== Search Modal ========== -->
        <div id="search-modal" class="hs-overlay ti-modal hidden">
          <div class="ti-modal-box">
            <div class="ti-modal-content">
              <div class="ti-modal-body">
                <div class="header-search">
                  <label for="icon" class="sr-only">Search</label>
                  <div class="relative">
                    <div class="search-btn">
                      <i class="ri ri-search-2-line search-btn-icon"></i>
                    </div>
                    <input type="text" id="icon" name="icon" class="py-2 ltr:pl-11 rtl:pr-11 ti-form-input focus:z-10"
                      placeholder="Search">
                    <div class="voice-search">
                      <i class="ri ri-mic-2-line voice-btn-icon"></i>
                    </div>
                    <div class="search-dropdown">
                      <i class="ri ri-more-2-line search-dropdown-btn-icon"></i>
                    </div>
                  </div>
                </div>
                <div class="mt-5">
                  <p class="font-semibold text-[13px] text-gray-400 mb-2">Are You Looking For...</p>
                  <div class="badge rounded-sm bg-secondary/20 text-secondary relative header-box">
                    <a href="team.html" class="w-full my-auto items-center flex space-x-2 rtl:space-x-reverse">
                      <span class="inline-block text-secondary ltr:mr-1 rtl:ml-1"><i class="ri ri-user-line text-sm"></i></span>
                      Team
                    </a>
                    <a href="javascript:void(0);"
                      class="header-remove-btn flex-shrink-0 h-4 w-4 inline-flex items-center justify-center rounded-full text-secondary hover:bg-secondary hover:text-secondary focus:outline-none focus:bg-secondary focus:text-white">
                      <span class="sr-only">Remove badge</span>
                      <svg class="h-4 w-4 hover:fill-white" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" viewBox="0 0 16 16">
                        <path
                          d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z">
                        </path>
                      </svg>
                    </a>
                  </div>
                  <div class="badge rounded-sm bg-secondary/20 text-secondary relative header-box">
                    <a href="form-elements.html" class="w-full my-auto items-center flex space-x-2 rtl:space-x-reverse">
                      <span class="inline-block text-secondary ltr:mr-1 rtl:ml-1"><i class="ri ri-file-text-line text-sm"></i></span>
                      Forms
                    </a>
                    <a href="javascript:void(0);"
                      class="header-remove-btn flex-shrink-0 h-4 w-4 inline-flex items-center justify-center rounded-full text-secondary hover:bg-secondary hover:text-secondary focus:outline-none focus:bg-secondary focus:text-white">
                      <span class="sr-only">Remove badge</span>
                      <svg class="h-4 w-4 hover:fill-white" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" viewBox="0 0 16 16">
                        <path
                          d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z">
                        </path>
                      </svg>
                    </a>
                  </div>
                  <div class="badge rounded-sm bg-secondary/20 text-secondary relative header-box">
                    <a href="vector-maps.html" class="w-full my-auto items-center flex space-x-2 rtl:space-x-reverse">
                      <span class="inline-block text-secondary ltr:mr-1 rtl:ml-1"><i class="ri ri-map-pin-line text-sm"></i></span>
                      Maps
                    </a>
                    <a href="javascript:void(0);"
                      class="header-remove-btn flex-shrink-0 h-4 w-4 inline-flex items-center justify-center rounded-full text-secondary hover:bg-secondary hover:text-secondary focus:outline-none focus:bg-secondary focus:text-white">
                      <span class="sr-only">Remove badge</span>
                      <svg class="h-4 w-4 hover:fill-white" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" viewBox="0 0 16 16">
                        <path
                          d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z">
                        </path>
                      </svg>
                    </a>
                  </div>
                  <div class="badge rounded-sm bg-secondary/20 text-secondary relative header-box">
                    <a href="widgets.html" class="w-full my-auto items-center flex space-x-2 rtl:space-x-reverse">
                      <span class="inline-block text-secondary ltr:mr-1 rtl:ml-1"><i class="ri ri-server-line text-sm"></i></span>
                      Widgets
                    </a>
                    <a href="javascript:void(0);"
                      class="header-remove-btn flex-shrink-0 h-4 w-4 inline-flex items-center justify-center rounded-full text-secondary hover:bg-secondary hover:text-secondary focus:outline-none focus:bg-secondary focus:text-white">
                      <span class="sr-only">Remove badge</span>
                      <svg class="h-4 w-4 hover:fill-white" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" viewBox="0 0 16 16">
                        <path
                          d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z">
                        </path>
                      </svg>
                    </a>
                  </div>
                </div>
                <div class="mt-5">
                  <p class="font-semibold text-sm text-gray-500 mb-2">Recent Search :</p>
                  <div class="p-2 border rounded-sm flex items-center text-gray-500 mb-1 relative header-box">
                    <a href="notifications.html" class="w-full my-auto items-center flex">
                      <span class="text-sm">Notifications</span>
                    </a>
                    <a aria-label="anchor" href="javascript:void(0);"
                      class="ltr:ml-auto rtl:mr-auto flex-shrink-0 h-4 w-4 inline-flex items-center justify-center rounded-full text-gray-500 focus:outline-none header-remove-btn">
                      <i class="ri-close-line"></i>
                    </a>
                  </div>
                  <div class="p-2 border rounded-sm flex items-center text-gray-500 mb-1 relative header-box">
                    <a href="alerts.html" class="w-full my-auto items-center flex">
                      <span class="text-sm">Alerts</span>
                    </a>
                    <a aria-label="anchor" href="javascript:void(0);"
                      class="ltr:ml-auto rtl:mr-auto flex-shrink-0 h-4 w-4 inline-flex items-center justify-center rounded-full text-gray-500 focus:outline-none header-remove-btn">
                      <i class="ri-close-line"></i>
                    </a>
                  </div>
                  <div class="p-2 border rounded-sm flex items-center text-gray-500 relative header-box">
                    <a href="tables.html" class="w-full my-auto items-center flex">
                      <span class="text-sm">Tables</span>
                    </a>
                    <a aria-label="anchor" href="javascript:void(0);"
                      class="ltr:ml-auto rtl:mr-auto flex-shrink-0 h-4 w-4 inline-flex items-center justify-center rounded-full text-gray-500 focus:outline-none header-remove-btn">
                      <i class="ri-close-line"></i>
                    </a>
                  </div>
                </div>
              </div>
              <div class="ti-modal-footer">
                <div class="inline-flex rounded-md shadow-sm">
                  <button type="button" class="ti-btn-group py-1 ti-btn-soft-primary">
                    Search
                  </button>
                  <button type="button" class="ti-btn-group py-1 ti-btn-primary">
                    Clear Recents
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- ========== END Search Modal ========== -->

        <footer class="mt-auto py-3 border-t bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <p class="text-center">Copyright © <span id="year"></span> <a href="javascript:void(0)" class="text-primary">Synto</a>. Designed with <span class="ri ri-heart-fill text-red-500"></span> by <a class="text-primary" href="javascript:void(0)"> Spruko </a> All rights reserved </p>
            </div>
        </footer>


    </div>

    <!-- Apex Charts JS -->
    <script src="{{ asset('back/dist/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- Index JS -->
    <script src="{{ asset('back/dist/assets/js/index-2.js') }}"></script>

    <!-- Back To Top -->
    <div class="scrollToTop">
        <span class="arrow"><i class="ri-arrow-up-s-fill text-xl"></i></span>
    </div>

    <div id="responsive-overlay"></div>

    <!-- popperjs -->
    <script src="{{ asset('back/dist/assets/libs/@popperjs/core/umd/popper.min.js') }}"></script>

    <!-- Color Picker JS -->
    <script src="{{ asset('back/dist/assets/libs/@simonwep/pickr/pickr.es5.min.js') }}"></script>

    <!-- sidebar JS -->
    <script src="{{ asset('back/dist/assets/js/defaultmenu.js') }}"></script>

    <!-- sticky JS -->
    <script src="{{ asset('back/dist/assets/js/sticky.js') }}"></script>

    <!-- Switch JS -->
    <script src="{{ asset('back/dist/assets/js/switch.js') }}"></script>

    <!-- Preline JS -->
    <script src="{{ asset('back/dist/assets/libs/preline/preline.js') }}"></script>

    <!-- Simplebar JS -->
    <script src="{{ asset('back/dist/assets/libs/simplebar/simplebar.min.js') }}"></script>

    <!-- Custom JS -->
    <script src="{{ asset('back/dist/assets/js/custom.js') }}"></script>

    
    <!-- Custom-Switcher JS -->
    <script src="{{ asset('back/dist/assets/js/custom-switcher.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    @stack('js')

    <script>
      @if ($errors->any())
        @foreach ($errors->all() as $error)
          // toastr.error("{{ $error }}")
          @php
            toastr()->error($error)
          @endphp
        @endforeach
      @endif
    </script>

</body>

</html>