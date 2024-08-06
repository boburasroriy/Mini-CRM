<x-layouts.main>
    <!-- Navbar -->
    <nav class="bg-gray-800 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="text-white text-lg font-semibold">
                Admin Panel
            </div>
            <div>
                @guest()
                <a href="{{route('loginView')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2">
                    Login
                </a>
                @else
                    <a href="{{route('profile')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2">
                        {{ auth()->user()->name }}
                    </a>
                @endguest
            </div>
        </div>
    </nav>
</x-layouts.main>
