<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Create New Todo
        </h2>
        <a href="{{ route('todos.index') }}">Back</a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('todos.store') }}" method="post">
                        @csrf
                        <div class="py-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                            <input type="text" name="name"
                                class="block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-200">
                        </div>

                        <div class="py-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                            <input type="text" name="description"
                                class="block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-200">
                        </div>

                        <button type="submit"
                            class="bg-blue-500  font-bold py-2 px-4 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300">
                            Add
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
