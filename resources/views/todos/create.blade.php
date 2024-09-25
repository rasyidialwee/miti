<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            Create New Todo
        </h2>
        <a href="{{ route('todos.index') }}">Back</a>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('todos.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="py-2">
                            <label class="block mb-2 text-sm font-medium text-gray-700">Name</label>
                            <input type="text" name="name"
                                class="block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-200">
                        </div>

                        <div class="py-2">
                            <label class="block mb-2 text-sm font-medium text-gray-700">Description</label>
                            <input type="text" name="description"
                                class="block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-200">
                        </div>

                        <div class="py-2">
                            <label class="block mb-2 text-sm font-medium text-gray-700">Image</label>
                            <input type="file" name="image"
                                class="block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-200">
                        </div>


                        <button type="submit"
                            class="px-4 py-2 font-bold bg-blue-500 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300">
                            Add
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
