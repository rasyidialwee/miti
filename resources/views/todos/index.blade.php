<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            Todo
        </h2>
        <a href="{{ route('todos.create') }}">Create New Todo</a>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 overflow-x-auto text-gray-900 dark:text-gray-100">
                    <table class="w-full bg-white border border-gray-300">
                        <thead>
                            <tr class="text-sm text-gray-600 uppercase bg-gray-200">
                                <th class="px-4 py-3 border-b">Name</th>
                                <th class="px-4 py-3 border-b">Description</th>
                                <th class="px-4 py-3 border-b">Image</th>
                                <th class="px-4 py-3 border-b">Status</th>
                                <th class="px-4 py-3 border-b">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm text-gray-600">
                            @foreach ($todos as $todo)
                                <tr class="hover:bg-gray-100">
                                    <td class="px-4 py-3 border-b">{{ $todo->name }}</td>
                                    <td class="px-4 py-3 border-b">{{ $todo->description }}</td>
                                    <td class="px-4 py-3 border-b"><img src="{{ $todo->image_path }}"
                                            alt="{{ $todo->name }}">
                                    </td>
                                    <td class="px-4 py-3 border-b">
                                        @if ($todo->is_completed)
                                            <span class="text-green-500">Completed at {{ $todo->completed_at }}</span>
                                        @else
                                            <span>Not Completed yet</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 border-b">

                                        <a href="{{ route('todos.edit', $todo) }}"
                                            class="text-blue-500 hover:underline">
                                            Edit
                                        </a>

                                        <form action="{{ route('todos.destroy', $todo) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-red-500 hover:underline" type="submit">Delete</button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>

                    {{ $todos->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
