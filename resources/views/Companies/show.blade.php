<div>
    <x-layouts.main>
        <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-6">Company Details</h2>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Name:</label>
                <p class="text-gray-900">{{ $companies->name }}</p>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Email:</label>
                <p class="text-gray-900">{{ $companies->email }}</p>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Website:</label>
                <a href="{{ $companies->website }}" class="text-blue-500 hover:underline" target="_blank">{{ $companies->website }}</a>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Logo:</label>
                @if ($companies->logo)
                        <img src="{{ asset('storage/' . $companies->logo) }}" alt="Company Logo" class="h-32 w-auto">
                @else
                    <p class="text-gray-600">No logo available.</p>
                @endif
            </div>

            <div class="flex items-center mt-6">
                <a href="{{ route('companies.edit', $companies->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mr-2">Edit</a>
                <form action="{{ route('companies.destroy', $companies->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this company?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                </form>
                <a href="{{ route('companies.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2">Back to List</a>
            </div>
        </div>

    </x-layouts.main>
</div>
