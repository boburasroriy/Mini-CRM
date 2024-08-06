<div>
    <x-layouts.main>
        <div class="max-w-7xl mx-auto bg-white p-8 rounded-lg shadow-lg">
            <div class="flex justify-between">
                <h2 class="text-2xl font-bold mb-6">All Employees</h2>
                <a href="{{ route('employees.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2 mt-5">Create Employee</a>
            </div>

            <table class="min-w-full bg-white">
                <thead>
                <tr>
                    <th class="py-2 px-4 border-b border-gray-300 text-left text-gray-700">First Name</th>
                    <th class="py-2 px-4 border-b border-gray-300 text-left text-gray-700">Last Name</th>
                    <th class="py-2 px-4 border-b border-gray-300 text-left text-gray-700">Company</th>
                    <th class="py-2 px-4 border-b border-gray-300 text-left text-gray-700">Email</th>
                    <th class="py-2 px-4 border-b border-gray-300 text-right text-gray-700">Phone</th>
                    <th class="py-2 px-4 border-b border-gray-300 text-right text-gray-700">Actions</th>
                </tr>
                </thead>
                <tbody>

                    @foreach ($employees as $employee)
                        <tr>
                            <td class="py-2 px-4 border-b border-gray-300">{{ $employee->first_name }}</td>
                            <td class="py-2 px-4 border-b border-gray-300">{{ $employee->last_name }}</td>
                            <td class="py-2 px-4 border-b border-gray-300">{{ $employee->company->name }}</td>
                            <td class="py-2 px-4 border-b border-gray-300">{{ $employee->email }}</td>
                            <td class="py-2 px-4 border-b border-gray-300">{{ $employee->phone }}</td>
                            <td class="py-2 px-4 border-b border-gray-300 text-right">
                            <a href="{{ route('employees.show', $employee->id) }}" class="text-blue-500 hover:underline">View</a>
                            <a href="{{ route('employees.edit', $employee->id) }}" class="text-blue-500 hover:underline ml-2">Edit</a>
                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="inline-block ml-2" onsubmit="return confirm('Are you sure you want to delete this employee?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline" aria-label="Delete Employee">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>


        </div>
    </x-layouts.main>
</div>
