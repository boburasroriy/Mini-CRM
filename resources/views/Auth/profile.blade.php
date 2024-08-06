<x-layouts.main>
    <section id="profile" class="bg-gray-200 py-20">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold mb-8">Profile</h2>
            <form class="max-w-md mx-auto" action="{{ route('update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <input type="text"  name="name" class="w-full p-2 border border-gray-300 rounded" placeholder="Name" value="{{ auth()->user()->name }}">
                </div>
                <div class="mb-4">
                    <input type="email" name="email" class="w-full p-2 border border-gray-300 rounded" placeholder="Email" value="{{ auth()->user()->email }}">
                </div>
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Update Profile
                </button>
            </form>

            <!-- Logout Button -->
            <div class="mt-8">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </section>
</x-layouts.main>
