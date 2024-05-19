<x-tenancy-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <x-container class="py-12">
        <div class="flex justify-end mb-6">
            <a href="{{ route('tasks.create') }}" class="btn btn-blue">
                New task
            </a>
        </div>

        @if ($tasks->count())

            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Description
                            </th>
                            <th scope="col" class="px-6 py-3 flex justify-center">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($tasks as $task)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                                <td class="px-6 py-4">
                                    {{ $task->name }}
                                </td>
                                <td class="px-6 py-4">

                                    {{ $task->description }}

                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center">

                                        <a href="{{ route('tasks.show', $task) }}" class="btn btn-blue ml-2">Ver</a>
                                        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-green ml-2">Editar</a>

                                        <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-red ml-2">Eliminar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>

            {{ $tasks->links() }}
        @else

            <div class="card">
                <div class="card-body text-center">
                    <h1 class="text-white">No tasks yet</h1>
                </div>
            </div>

        @endif

    </x-container>

</x-tenancy-layout>
