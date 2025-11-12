<!-- 🚨 DEBUG: NAVIGATION LOADED - {{ now() }} 🚨 -->
<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            
            <!-- DEBUG: User Status -->
            <div class="absolute top-0 left-0 bg-red-500 text-white p-1 text-xs">
                @auth
                    LOGGED IN: {{ Auth::user()->name }} | Admin: {{ Auth::user()->is_admin ? 'Yes' : 'No' }}
                @else
                    NOT LOGGED IN
                @endauth
            </div>

            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="text-xl font-bold text-indigo-600">
                        🚀 Portfolio
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <a href="{{ route('home') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                        Home
                    </a>
                    <a href="#about" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                        Tentang
                    </a>
                    <a href="#experience" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                        Pengalaman
                    </a>
                    <a href="#projects" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                        Proyek
                    </a>
                    <a href="#contact" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                        Kontak
                    </a>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @auth
                    <!-- DEBUG: Admin Check -->
                    @if(Auth::user()->is_admin)
                        <div class="bg-green-500 text-white px-2 py-1 rounded text-xs mr-4">
                            ADMIN USER
                        </div>
                        
                        <!-- Admin Panel Link -->
                        <a href="{{ route('admin.dashboard') }}" class="text-gray-600 hover:text-gray-900 mr-4">
                            <i class="fas fa-cog mr-1"></i> Admin Panel
                        </a>
                    @endif

                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center text-sm text-gray-700 hover:text-gray-900 focus:outline-none">
                            <!-- User Photo/Icon -->
                            @if(Auth::user()->photo)
                                <img class="h-8 w-8 rounded-full mr-2" src="{{ asset('storage/' . Auth::user()->photo) }}" alt="{{ Auth::user()->name }}">
                            @else
                                <div class="h-8 w-8 rounded-full bg-indigo-100 flex items-center justify-center mr-2">
                                    <i class="fas fa-user text-indigo-600 text-sm"></i>
                                </div>
                            @endif
                            
                            <span class="font-medium">{{ Auth::user()->name }}</span>
                            <i class="fas fa-chevron-down ml-1 text-xs"></i>
                        </button>

                        <!-- Dropdown Menu -->
                        <div x-show="open" @click.away="open = false" 
                             class="absolute right-0 mt-2 w-56 bg-white rounded-md shadow-lg py-1 z-50 border border-gray-200">
                            
                            <!-- User Info -->
                            <div class="px-4 py-2 border-b border-gray-100 bg-gray-50">
                                <p class="text-sm font-medium text-gray-900">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
                                @if(Auth::user()->professional_title)
                                    <p class="text-xs text-indigo-600 mt-1">{{ Auth::user()->professional_title }}</p>
                                @endif
                                <p class="text-xs {{ Auth::user()->is_admin ? 'text-green-600' : 'text-blue-600' }} mt-1">
                                    {{ Auth::user()->is_admin ? 'Administrator' : 'User' }}
                                </p>
                            </div>

                            <!-- EDIT PROFIL - UNTUK SEMUA USER YANG LOGIN -->
                            <a href="{{ route('profile.edit') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 border-b border-gray-100">
                                <i class="fas fa-user-edit mr-3 text-indigo-500 w-4"></i>
                                <span class="font-medium">Edit Profil</span>
                            </a>

                            <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-tachometer-alt mr-3 text-gray-400 w-4"></i>
                                Dashboard
                            </a>

                            @if(Auth::user()->is_admin)
                                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-cog mr-3 text-gray-400 w-4"></i>
                                    Admin Panel
                                </a>
                            @endif

                            <div class="border-t border-gray-100"></div>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="flex items-center w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-sign-out-alt mr-3 text-gray-400 w-4"></i>
                                    Log Out
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <!-- Guest Links -->
                    <div class="flex space-x-4">
                        <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-900">Login</a>
                        @if(Route::has('register'))
                            <a href="{{ route('register') }}" class="text-gray-600 hover:text-gray-900">Register</a>
                        @endif
                    </div>
                @endauth
            </div>
        </div>
    </div>
</nav>

<!-- DEBUG Script -->
<script>
    console.log('🚨 Navigation blade loaded successfully!');
    console.log('User logged in:', @json(auth()->check()));
    @auth
    console.log('User name:', @json(auth()->user()->name));
    console.log('Is admin:', @json(auth()->user()->is_admin));
    console.log('Edit Profile URL:', @json(route('profile.edit')));
    @endauth
</script>