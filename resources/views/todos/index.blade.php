<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Todo
        </h2>
        <a href="{{ route('todos.create') }}">Create New Todo</a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 overflow-x-auto">
                    <table class="w-full bg-white border border-gray-300">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm">
                                <th class="py-3 px-4 border-b">Name</th>
                                <th class="py-3 px-4 border-b">Description</th>
                                <th class="py-3 px-4 border-b">Image</th>
                                <th class="py-3 px-4 border-b">Status</th>
                                <th class="py-3 px-4 border-b">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm">
                            @foreach ($todos as $todo)
                                <tr class="hover:bg-gray-100">
                                    <td class="py-3 px-4 border-b">{{ $todo->name }}</td>
                                    <td class="py-3 px-4 border-b">{{ $todo->description }}</td>
                                    <td class="py-3 px-4 border-b"><img src="{{ $todo->image_path }}"
                                            alt="{{ $todo->name }}">
                                    </td>
                                    <td class="py-3 px-4 border-b">
                                        @if ($todo->is_completed)
                                            <span class="text-green-500">Completed at {{ $todo->completed_at }}</span>
                                        @else
                                            <span>Not Completed yet</span>
                                        @endif
                                    </td>
                                    <td class="py-3 px-4 border-b">
                                        <button class="text-blue-500 hover:underline">Edit</button>
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
