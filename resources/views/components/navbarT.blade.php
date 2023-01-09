@php
if (request()->routeIs('home')) {
# code...
$bg="";
$textDark="";
$shadow="";
$gradient="";
}else{
$bg="bg-white";
$textDark="text-gray-800";
$gradient="gradient";
$shadow="shadow";
}

$active="text-gray-200 text-xl"

@endphp

<nav id="header" class="fixed w-full z-30  top-0 {{$bg}} {{$shadow}} text-white">
  <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2">
    <div class="pl-4 flex items-center">
      <div class="mr-5 flex">
        <img src="{{url('images/logo2.png')}}" width="90" alt="">
        <a id="toogle"
          class="px-auto toggleColour py-auto my-auto {{$textDark}} no-underline hover:no-underline font-bold text-xl lg:text-2xl"
          href="#">
          BIBLIOTHEQUE-UCC
        </a>
      </div>


    </div>
    @auth
    <div class="flex items-center md:order-2">
      <button type="button"
        class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
        id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
        data-dropdown-placement="bottom">
        <span class="sr-only">Open user menu</span>
        <img class="w-8 h-8 rounded-full" src="/images/user.png" alt="">
      </button>
      <!-- Dropdown menu -->
      <div
        class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
        id="user-dropdown">
        <div class="px-4 py-3">
          <span class="block text-sm text-gray-900 dark:text-white">{{Auth::user()->name}}</span>
          <span
            class="block text-sm font-medium text-gray-500 truncate dark:text-gray-400">{{Auth::user()->email}}</span>
        </div>
        <ul class="py-1" aria-labelledby="user-menu-button">
          <li>
            <a href="{{ route('profile.show') }}"
              class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Profile</a>
          </li>
          <li>
            <a href="#"
              class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</a>
          </li>
          <li>
            <a href="#"
              class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Earnings</a>
          </li>
          <li>
            <form method="POST" action="{{ route('logout') }}" x-data>
              @csrf

              <x-jet-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                {{ __('Log Out') }}
              </x-jet-dropdown-link>
            </form>
          </li>
        </ul>
      </div>

    </div>
    @endauth

    <div class="block lg:hidden pr-4">
      <button id="nav-toggle"
        class="flex items-center p-1 text-pink-800 hover:text-gray-900 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
        <svg class="fill-current h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <title>Menu</title>
          <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
        </svg>
      </button>
    </div>
    <div
      class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden mt-2 lg:mt-0 bg-white lg:bg-transparent  p-4 lg:p-0 z-20"
      id="nav-content">
      <ul class="list-reset lg:flex justify-end flex-1 items-center">
        <li class="mr-3">
          <a class="inline-block py-2 px-4 {{$textDark}} toggleColour  hover:text-gray-400 font-bold no-underline active:bg-violet-600"
            href="{{route('home')}}">Accueil</a>
        </li>
        <li class="mr-3">
          <a class="inline-block {{$textDark}} toggleColour hover:text-gray-400 hover:text-underline py-2 px-4"
            href="#">Recherche</a>
        </li>
        <li class="mr-3">
          <a class="inline-block {{$textDark}} toggleColour no-underline hover:text-gray-400 hover:text-underline py-2 px-4"
            href="#">Travaux</a>
        </li>
        <li class="mr-3">
          <a class="inline-block {{$textDark}} toggleColour no-underline hover:text-gray-400 hover:text-underline py-2 px-4"
            href="{{route('consultation')}}">Consulter</a>
        </li>
        <li class="mr-3">
          <a class="inline-block {{$textDark}} toggleColour no-underline hover:text-gray-400 hover:text-underline py-2 px-4"
            href="{{route('publication')}}">Publication</a>
        </li>
      </ul>
      @auth
      @else
      <a href="{{route('login')}}" id="navAction"
        class="mx-auto {{$gradient}} lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
        Connexion
      </a>
      @endauth





    </div>
  </div>
  <hr class="border-b border-gray-100 opacity-25 my-0 py-0" />
</nav>