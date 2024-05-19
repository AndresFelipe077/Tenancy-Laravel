<x-tenancy-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <x-container class="py-12">

        <div class="card">

            <div class="card-body">

                <h1 class="text-white text-2xl font-semibold mb-4">{{ $task->name }}</h1>

                <p class="text-white">{{ $task->description }}</p>

            </div>

        </div>



    </x-container>

</x-tenancy-layout>
