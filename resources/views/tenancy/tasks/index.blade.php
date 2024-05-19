<x-tenancy-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <x-container class="py-12">
        <div class="flex justify-end">
            <a href="{{ route('tasks.create') }}" class="btn btn-blue">
                New task
            </a>
        </div>
    </x-container>

</x-tenancy-layout>
