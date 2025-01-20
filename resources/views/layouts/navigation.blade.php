<nav x-data="{ open: false, sidebar_open: false }" class="bg-indigo-600 border-b border-gray-100 z-10">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">

                <!-- Sidebar Button -->
                <div class="me-2 sm:flex items-center hidden">
                    <button @click="sidebar_open = ! sidebar_open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-200 hover:text-gray-300 hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500 focus:text-gray-300 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{ 'hidden': sidebar_open, 'inline-flex': !sidebar_open }" class="inline-flex"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />

                            <path :class="{ 'hidden': !sidebar_open, 'inline-flex': sidebar_open }" class="hidden"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-auto w-auto fill-current text-white" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <!--
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
                -->
            </div>

            <!-- Search Bar -->
            <div class="w-full mx-4 max-w-sm sm:flex justify-between items-center hidden">
                <form class="flex w-full justify-between items-center flex-row gap-6">
                    <input
                        class="w-full h-8 rounded-lg bg-grey-200 border-s-primary-300 shadow border-grey-300 hover:bg-grey-100 focus:bg-grey-100 focus:outline-none transition ease-in-out duration-150"
                        type="text" name="search_input" placeholder="Search ..." />
                    <button
                        class="inline-flex items-center px-1 py-1 border border-transparent shadow text-sm leading-4 font-medium rounded-md text-grey-900 bg-grey-200 hover:text-grey-800 hover:bg-grey-100 focus:outline-none transition ease-in-out duration-150">
                        <div>
                            <svg class="fill-current h-6 w-6" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" transform="matrix(-1, 0, 0, 1, 0, 0)">
                                <g id="SVGRepo_iconCarrier">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M10 5C7.23858 5 5 7.23858 5 10C5 12.7614 7.23858 15 10 15C11.381 15 12.6296 14.4415 13.5355 13.5355C14.4415 12.6296 15 11.381 15 10C15 7.23858 12.7614 5 10 5ZM3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10C17 11.5719 16.481 13.0239 15.6063 14.1921L20.7071 19.2929C21.0976 19.6834 21.0976 20.3166 20.7071 20.7071C20.3166 21.0976 19.6834 21.0976 19.2929 20.7071L14.1921 15.6063C13.0239 16.481 11.5719 17 10 17C6.13401 17 3 13.866 3 10Z"
                                        fill="#000000"></path>
                                </g>
                            </svg>
                        </div>
                    </button>
                </form>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-indigo-500 hover:text-grey-200 focus:outline-none transition ease-in-out duration-150">
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
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>

                <!-- Shopping Cart Icon -->
                <div class="flex items-center ml-2">
                    <a href="#"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-200 hover:text-gray-300 hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500 focus:text-gray-300 transition duration-150 ease-in-out">
                        <x-shopping-cart-logo fill="#e5e7eb" />
                    </a>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-200 hover:text-gray-300 hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500 focus:text-gray-300 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        {{-- <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" /> --}}

                        <g :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke="none"
                            stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-140.000000, -2159.000000)" fill="#e5e7eb">
                                <g transform="translate(56.000000, 160.000000)">
                                    <path
                                        d="M100.562548,2016.99998 L87.4381713,2016.99998 C86.7317804,2016.99998 86.2101535,2016.30298 86.4765813,2015.66198 C87.7127655,2012.69798 90.6169306,2010.99998 93.9998492,2010.99998 C97.3837885,2010.99998 100.287954,2012.69798 101.524138,2015.66198 C101.790566,2016.30298 101.268939,2016.99998 100.562548,2016.99998 M89.9166645,2004.99998 C89.9166645,2002.79398 91.7489936,2000.99998 93.9998492,2000.99998 C96.2517256,2000.99998 98.0830339,2002.79398 98.0830339,2004.99998 C98.0830339,2007.20598 96.2517256,2008.99998 93.9998492,2008.99998 C91.7489936,2008.99998 89.9166645,2007.20598 89.9166645,2004.99998 M103.955674,2016.63598 C103.213556,2013.27698 100.892265,2010.79798 97.837022,2009.67298 C99.4560048,2008.39598 100.400241,2006.33098 100.053171,2004.06998 C99.6509769,2001.44698 97.4235996,1999.34798 94.7348224,1999.04198 C91.0232075,1998.61898 87.8750721,2001.44898 87.8750721,2004.99998 C87.8750721,2006.88998 88.7692896,2008.57398 90.1636971,2009.67298 C87.1074334,2010.79798 84.7871636,2013.27698 84.044024,2016.63598 C83.7745338,2017.85698 84.7789973,2018.99998 86.0539717,2018.99998 L101.945727,2018.99998 C103.221722,2018.99998 104.226185,2017.85698 103.955674,2016.63598">
                                    </path>
                                </g>
                            </g>
                        </g>

                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <!-- Shopping Cart Icon -->
                <div class="flex items-center ml-2">
                    <a href="#"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-200 hover:text-gray-300 hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500 focus:text-gray-300 transition duration-150 ease-in-out">
                        <x-shopping-cart-logo fill="#e5e7eb" />
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Bar -->
    <div class="sm:hidden max-w-7xl mx-auto pb-1.5 px-2 flex">
        <!-- Sidebar Button -->
        <div class="me-2 flex items-center sm:hidden">
            <button @click="sidebar_open = ! sidebar_open"
                class="inline-flex items-center justify-center p-2 rounded-md text-gray-200 hover:text-gray-300 hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500 focus:text-gray-300 transition duration-150 ease-in-out">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{ 'hidden': sidebar_open, 'inline-flex': !sidebar_open }" class="inline-flex"
                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />

                    <path :class="{ 'hidden': !sidebar_open, 'inline-flex': sidebar_open }" class="hidden"
                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Search Bar -->
        <div class="w-full mx-4 flex justify-between items-center">
            <form class="flex w-full justify-between items-center flex-row gap-6">
                <input
                    class="w-full h-8 rounded-lg bg-grey-200 border-s-primary-300 shadow border-grey-300 hover:bg-grey-100 focus:bg-grey-100 focus:outline-none transition ease-in-out duration-150"
                    type="text" name="search_input" placeholder="Search ..." />
                <button
                    class="inline-flex items-center px-1 py-1 border border-transparent shadow text-sm leading-4 font-medium rounded-md text-grey-900 bg-grey-200 hover:text-grey-800 hover:bg-grey-100 focus:outline-none transition ease-in-out duration-150">
                    <div>
                        <svg class="fill-current h-6 w-6" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg" transform="matrix(-1, 0, 0, 1, 0, 0)">
                            <g id="SVGRepo_iconCarrier">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M10 5C7.23858 5 5 7.23858 5 10C5 12.7614 7.23858 15 10 15C11.381 15 12.6296 14.4415 13.5355 13.5355C14.4415 12.6296 15 11.381 15 10C15 7.23858 12.7614 5 10 5ZM3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10C17 11.5719 16.481 13.0239 15.6063 14.1921L20.7071 19.2929C21.0976 19.6834 21.0976 20.3166 20.7071 20.7071C20.3166 21.0976 19.6834 21.0976 19.2929 20.7071L14.1921 15.6063C13.0239 16.481 11.5719 17 10 17C6.13401 17 3 13.866 3 10Z"
                                    fill="#000000"></path>
                            </g>
                        </svg>
                    </div>
                </button>
            </form>
        </div>
    </div>

    <!-- Responsive Settings Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden ">
        <!--
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>
        -->

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-100">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-400">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>

    <!-- SideBar -->
    <div :class="{ 'hidden': !sidebar_open, 'flex': sidebar_open }" class="absolute w-full overflow-hidden">
        <div class="bg-gray-50 left-0 w-64 h-auto z-10 overflow-auto shadow shadow-grey-200">
            <p class="flex text-center w-full p-3 text-bold text-2xl">
                Book Types
            </p>
            <x-sidebar-link>
                Hard Books
            </x-sidebar-link>
            <x-sidebar-link>
                eBooks
            </x-sidebar-link>
        </div>
        <div class="absolute z-0 left-0 right-0 top-0 bottom-0" @click="sidebar_open = false"></div>
    </div>
</nav>
