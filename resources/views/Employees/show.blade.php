<x-layouts.main>
<div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-lg">
    <h2 class="text-2xl font-bold mb-6">{{ $employee->first_name }} {{ $employee->last_name }}</h2>

    <p><strong>Email:</strong> {{ $employee->email }}</p>
    <p><strong>Company:</strong> {{ $employee->company->name }}</p> <!-- Assuming company relationship -->
    <p><strong>Phone:</strong> {{ $employee->phone }}</p>

    <div class="mt-4">
        <a href="{{ route('employees.edit', $employee->id) }}" class="text-blue-500 hover:underline">Edit</a>
    </div>
</div>
</x-layouts.main>
