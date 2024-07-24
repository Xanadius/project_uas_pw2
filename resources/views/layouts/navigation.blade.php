<header class="bg-white" id="navbar">
    @if (Route::has('login'))
        <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8 ">
            <div class="flex h-16 items-center justify-between">
                <div class="flex-1 md:flex md:items-center md:gap-12">
                    <a href="{{ url('/') }}" class="block">
                        <img class="h-6" src="{{ asset('resources/img/logo.png') }}" alt="Logo">
                    </a>
                </div>

                <div class="md:flex md:items-center md:gap-12">
                    <nav aria-label="Global" class="hidden md:block">
                        <ul class="flex items-center gap-6 text-sm">
                            <li>
                                <a class="text-gray-500 transition hover:text-gray-200/75" href="#products">
                                    Products
                                </a>
                            </li>

                            <li>
                                <a class="text-gray-500 transition hover:text-gray-200/75" href="#reviews">
                                    Reviews </a>
                            </li>

                            <li>
                                <a class="text-gray-500 transition hover:text-gray-200/75" href="#about">
                                    About </a>

                            </li>
                        </ul>
                    </nav>

                    @auth

                        <a href="{{ url('/my_cart') }}">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            {{-- [{{ $count }}] --}}
                        </a>

                        <div class="flex items-center gap-2">
                            <div class="sm:flex sm:gap-2">

                                <x-dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        <button
                                            class="inline-flex items-center px-1 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                            <div>{{ Auth::user()->name }}</div>

                                            <div class="ms-1">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                        </button>
                                    </x-slot>

                                    <x-slot name="content">

                                        <!-- Authentication -->
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <x-dropdown-link :href="route('logout')"
                                                onclick="event.preventDefault();this.closest('form').submit();">
                                                {{ __('Log Out') }}
                                            </x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                            @else
                                <a class="rounded-md bg-teal-600 px-5 py-2.5 text-sm font-medium text-white transition hover:bg-green-100"
                                    href="{{ route('login') }}">
                                    Login
                                </a>
                                @if (Route::has('register'))
                                    <div class="hidden sm:flex">
                                        <a class="rounded-md bg-gray-300 px-5 py-2.5 text-sm font-medium text-teal-600 transition hover:bg-white"
                                            href="{{ route('register') }}">
                                            Register
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    @endif
</header>
