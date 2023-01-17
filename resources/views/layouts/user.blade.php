<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Bibliotheque') }}</title>

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

  <link rel="shortcut icon" href="images/logo2.png" type="image/x-icon">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/css/splide.min.css">
  <link rel="stylesheet" href="\build\assets\app-f943cffd.css">

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <link rel="stylesheet" href="/css/navStyle.css">
  <link rel="stylesheet" href="/css/loader.css">
  <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/js/splide.min.js"></script>

  <!-- Scripts -->
  @yield('style')


  <style>
    .gradient {
      background: linear-gradient(90deg, #21afeb 0%, #1c7870 100%);
    }
  </style>

  <!-- Styles -->
  @livewireStyles
</head>
@php
if (request()->routeIs('home')) {
# code...
$gradient="gradient";

}else{

$gradient="bg-gray-100";
}


@endphp

<body id="content" class="leading-normal tracking-normal  {{$gradient}}"
  style="font-family: 'Source Sans Pro', sans-serif;">

  <x-navbarF />





  @yield('content')



  <x-footerT />

  @stack('modals')

  @livewireScripts
  @livewire('livewire-ui-modal')
  @include('livewire-cookie-consent::cookieconsent')
  <script src="/js/bootstrap.bundle.min.js"></script>
  <script src="/js/flowbite.js"></script>
  <script src="\build\assets\app-6855967d.js"></script>


  @stack('script')

  <script>
    var header= document.getElementById('header');
        
        /*Toggle dropdown list*/
          /*https://gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8*/
    
          var navMenuDiv = document.getElementById("nav-content");
          var navMenu = document.getElementById("nav-toggle");
    
          document.onclick = check;
          function check(e) {
            var target = (e && e.target) || (event && event.srcElement);
    
            //Nav Menu
            if (!checkParent(target, navMenuDiv)) {
              // click NOT on the menu
              if (checkParent(target, navMenu)) {
                // click on the link
                if (navMenuDiv.classList.contains("hidden")) {
                  navMenuDiv.classList.remove("hidden");
                } else {
                  navMenuDiv.classList.add("hidden");
                }
              } else {
                // click both outside link and outside menu, hide menu
                navMenuDiv.classList.add("hidden");
              }
            }
          }
          function checkParent(t, elm) {
            while (t.parentNode) {
              if (t == elm) {
                return true;
              }
              t = t.parentNode;
            }
            return false;
          }
  </script>
  <script>
    $(document).ready(function() {
    $('#loading').fadeOut(3000);
});
  </script>

</body>

</html>