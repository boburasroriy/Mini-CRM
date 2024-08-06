
    <section class="bg-white py-20">
        <div class="container mx-auto text-center">
            <h1 class="text-4xl font-bold mb-4">Welcome to the Admin Panel</h1>
            <p class="text-lg mb-6">Efficiently manage your company's employees and operations.</p>

            @guest
                <a href="{{route('loginView')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Get Started
                </a>
            @else
                <a href="{{route('admin.dashboard')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Dashboard
                </a>
            @endguest

        </div>
    </section>

    <!-- Overview Section -->
    <section class="bg-gray-200 py-10">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold mb-8">Admin Panel Features</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-bold mb-2">Secure Login</h3>
                    <p>Access the admin panel with secure authentication.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-bold mb-2">Manage Companies</h3>
                    <p>Create, read, update, and delete company records.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-bold mb-2">Manage Employees</h3>
                    <p>Create, read, update, and delete employee records.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-bold mb-2">File Management</h3>
                    <p>Upload and manage company logos with ease.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-bold mb-2">Pagination</h3>
                    <p>Navigate through records efficiently with pagination.</p>
                </div>
            </div>
        </div>
    </section>

