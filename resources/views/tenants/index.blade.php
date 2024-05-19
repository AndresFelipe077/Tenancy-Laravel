<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Inquilinos') }}
        </h2>
    </x-slot>

    <x-container class="py-12">

        <div class="flex justify-end mb-6">
            <a href="{{ route('tenants.create') }}" class="btn btn-blue">
                Nuevo inquilino
            </a>
        </div>

        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Id
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Dominio
                        </th>
                        <th scope="col" class="px-6 py-3 flex justify-center">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($tenants as $tenant)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                            <td class="px-6 py-4">
                                {{ $tenant->id }}
                            </td>
                            <td class="px-6 py-4">
                                
                                <a href="http://{{ $tenant->domains->first()->domain ?? '' }}" target="_blank" class="text-blue-500">{{ $tenant->domains->first()->domain ?? '' }}</a>
                                
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex justify-center">

                                    <a href="{{ route('tenants.edit', $tenant) }}" class="btn btn-green">Editar</a>

                                    <form action="{{ route('tenants.destroy', $tenant) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button  class="btn btn-red ml-2">Eliminar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>

    </x-container>

</x-app-layout>
