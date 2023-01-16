@php
$active="text-white bg-blue-700 md:text-blue-700";
@endphp
<nav class="bg-white border-gray-200 px-2 sm:px-4 py-3 shadow rounded ">
    <div class="container flex flex-wrap items-center justify-between mx-auto">
        <a href="{{url('/')}}" class="flex items-center">
            <img src="/images/logo2.png" class="h-8 mr-3 sm:h-9" alt="Ucc" />
            <span
                class="self-center text-md lg:text-2xl font-semibold  whitespace-nowrap dark:text-white">Bibliotheque-App</span>

        </a>
        <div class="flex items-center md:order-2">

            @auth
            <span class="hidden md:block ml-2 mx-3">{{Auth::user()->name}}</span>
            <button type="button"
                class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                data-dropdown-placement="bottom">
                <span class="sr-only">Open user menu</span>
                @if (!empty(Auth::user()->profile_photo_path))
                <img class="w-8 h-8 rounded-full" src="/storage/{{ Auth::user()->profile_photo_path }}" alt="">
                @else
                <img class="w-8 h-8 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="">
                @endif

            </button>

            <!-- Dropdown menu -->
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
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
                        <a href="{{route('student.signUp')}}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">inscription
                            Etudiant</a>
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
            @else
            <a href="{{route('login')}}" id="navAction"
                class="mx-auto gradient lg:mx-0 hover:underline text-white bg-white font-bold rounded-full  lg:mt-0 py-2 px-4 md:py-3 md:px-6 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                Connexion
            </a>
            @endauth
            <button data-collapse-toggle="mobile-menu-2" type="button"
                class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="mobile-menu-2" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="mobile-menu-2">
            <ul
                class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="{{url('/')}}"
                        class="block py-2 pl-3 pr-4 text-lg   @if(request()->routeIs('home')) {{$active}} @else text-gray-700 @endif rounded md:bg-transparent md:p-0"
                        aria-current="page">Home</a>
                </li>

                <li>
                    <a href="{{route('consultation')}}"
                        class="block py-2 pl-3 pr-4 text-lg text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 ">Travaux</a>
                </li>
                <li>
                    <a href="{{route('consultation')}}"
                        class="block py-2 pl-3 pr-4 text-lg @if(request()->routeIs('consultation')) {{$active}} @else text-gray-700 @endif rounded hover:bg-gray-100 md:bg-transparent md:hover:bg-transparent md:hover:text-blue-700 md:p-0 ">Consultation</a>
                </li>
                <li>
                    <a href="{{route('publication')}}"
                        class="block py-2 pl-3 pr-4 text-lg @if(request()->routeIs('publication')) {{$active}} @else text-gray-700 @endif rounded hover:bg-gray-100 md:bg-transparent md:hover:bg-transparent md:hover:text-blue-700 md:p-0 ">Publication</a>
                </li>
            </ul>
        </div>
    </div>
</nav>