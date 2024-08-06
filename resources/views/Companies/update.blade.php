<div>
    <x-layouts.main>

        <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-6">Edit Company</h2>


            <form action="{{ route('companies.update', $companies->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-bold mb-2">Name <span class="text-red-500">*</span>:</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $companies->name) }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Company Name">
                    @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-bold mb-2">Email:</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $companies->email) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Company Email">
                    @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="website" class="block text-gray-700 font-bold mb-2">Website:</label>
                    <input type="url" id="website" name="website" value="{{ old('website', $companies->website) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Company Website">
                    @error('website')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="logo" class="block text-gray-700 font-bold mb-2">Logo:</label>
                    @if ($companies->logo)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $companies->logo) }}" alt="Current Logo" class="h-20 w-auto">
                            <p class="text-gray-600 text-sm">Current logo</p>
                        </div>
                    @endif
                    <input type="file" id="logo" name="logo" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" accept="image/*">
                    <small class="text-gray-600">Accepted formats: JPEG, PNG. Minimum size: 100x100 pixels.</small>
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Update
                    </button>
                </div>
            </form>


        </div>
    </x-layouts.main>
</div>
