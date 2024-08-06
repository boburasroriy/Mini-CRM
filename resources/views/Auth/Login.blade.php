<x-layouts.main>
    <section id="login" class="bg-white py-20">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold mb-8">Login</h2>
            <form class="max-w-md mx-auto" method="POST" action="{{route('login')}}">
                @csrf
                <div class="mb-4">
                    <input name="email" type="email" class="w-full p-2 border border-gray-300 rounded" placeholder="Email">
                </div>
                <div class="mb-4">
                    <input  name="password" type="password" class="w-full p-2 border border-gray-300 rounded" placeholder="Password">
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Login
                </button>
            </form>
        </div>
    </section>
</x-layouts.main>
