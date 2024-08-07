<x-layouts.main>
<section class="bg-white py-10">
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold mb-4">Dashboard</h1>
        <p class="text-lg mb-6">Overview of your admin panel activities</p>

        <!-- Stats Section -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
            <div class="bg-blue-100 p-6 rounded-lg shadow-md text-center">
                <h2 class="text-2xl font-bold mb-2">Total Companies</h2>
                <p class="text-xl">{{ $companies->count() }}</p> <!-- Replace with dynamic data -->
            </div>
            <div class="bg-green-100 p-6 rounded-lg shadow-md text-center">
                <h2 class="text-2xl font-bold mb-2">Total Employees</h2>
                <p class="text-xl">{{ $employees->count() }}</p> <!-- Replace with dynamic data -->
            </div>
            <div class="bg-yellow-100 p-6 rounded-lg shadow-md text-center">
                <h2 class="text-2xl font-bold mb-2">Recent Activity</h2>
                <p class="text-xl">5 New Registrations</p> <!-- Replace with dynamic data -->
            </div>
        </div>

        <!-- Quick Access Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-bold mb-4">Manage Companies</h3>
                <a href="{{route('companies.index')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    View Companies
                </a>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-bold mb-4">Manage Employees</h3>
                <a href="{{route('employees.index')}}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    View Employees
                </a>
            </div>
        </div>
    </div>
</section>
</x-layouts.main>
