<div>
    <x-layouts.main>
        <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-6">Create Company</h2>
            <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Company Name (Required) -->
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-bold mb-2">Name <span class="text-red-500">*</span>:</label>
                    <input type="text" id="name" name="name" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Company Name">
                </div>

                <!-- Company Email -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-bold mb-2">Email:</label>
                    <input type="email" id="email" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Company Email">
                </div>

                <!-- Company Website -->
                <div class="mb-4">
                    <label for="website" class="block text-gray-700 font-bold mb-2">Website:</label>
                    <input type="url" id="website" name="website" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Company Website">
                </div>

                <!-- Company Logo (Required, Minimum Size 100x100) -->
                <div class="mb-4">
                    <label for="logo" class="block text-gray-700 font-bold mb-2">Logo (min. 100x100px) <span class="text-red-500">*</span>:</label>
                    <input type="file" id="logo" name="logo" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" accept="image/*">
                    <small class="text-gray-600">Accepted formats: JPEG, PNG. Minimum size: 100x100 pixels.</small>
                </div>

                <!-- Submit Button -->
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Create
                    </button>
                </div>
            </form>
        </div>
    </x-layouts.main>
</div>
