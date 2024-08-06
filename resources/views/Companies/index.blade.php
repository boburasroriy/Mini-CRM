<div>
    <x-layouts.main>
        <div class="max-w-7xl mx-auto bg-white p-8 rounded-lg shadow-lg">
            <div class="flex justify-between">
            <h2 class="text-2xl font-bold mb-6">All Companies</h2>
            <a href="{{ route('companies.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2 mt-5">Create Company</a>
            </div>




            <table class="min-w-full bg-white">

                    <thead>
                    <tr>
                        <th class="py-2 px-4 border-b border-gray-300 text-left text-gray-700">Name</th>
                        <th class="py-2 px-4 border-b border-gray-300 text-left text-gray-700">Email</th>
                        <th class="py-2 px-4 border-b border-gray-300 text-left text-gray-700">Website</th>
                        <th class="py-2 px-4 border-b border-gray-300 text-left text-gray-700">Logo</th>
                        <th class="py-2 px-4 border-b border-gray-300 text-right text-gray-700">Actions</th>
                    </tr>


                    </thead>
                    <tbody>
                    @foreach ($companies as $company)
                        <tr>
                            <td class="py-2 px-4 border-b border-gray-300">{{ $company->name }}</td>
                            <td class="py-2 px-4 border-b border-gray-300">{{ $company->email }}</td>
                            <td class="py-2 px-4 border-b border-gray-300">
                                <a href="{{ $company->website }}" class="text-blue-500 hover:underline">{{ $company->website }}</a>
                            </td>
                            <td class="py-2 px-4 border-b border-gray-300">
                                <img src="{{ asset('storage/' . $company->logo) }}" alt="Company Logo" class="h-10">
                            </td>
                            <td class="py-2 px-4 border-b border-gray-300 text-right">
                                <a href="{{ route('companies.show', $company->id) }}" class="text-blue-500 hover:underline">View</a>
                                <a href="{{ route('companies.edit', $company->id) }}" class="text-blue-500 hover:underline ml-2">Edit</a>
                                <form action="{{ route('companies.destroy', $company->id) }}" method="POST" class="inline-block ml-2" onsubmit="return confirm('Are you sure you want to delete this company?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline" aria-label="Delete Company">Delete</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <!-- Pagination -->
{{--                <div class="mt-4">--}}
{{--                    {{ $companies->links() }}--}}
{{--                </div>--}}

        </div>
    </x-layouts.main>
</div>
