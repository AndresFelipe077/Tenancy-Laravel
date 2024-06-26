<x-tenancy-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <x-container class="py-12">

        <form action="{{ route('tasks.update', $task) }}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="card">

                <div class="card-body">

                    <div class="mb-4">
                        <x-input-label>
                            Name
                        </x-input-label>

                        <x-text-input type="text" name="name" value="{{ old('name', $task->name) }}" class="w-full mt-2"
                            placeholder="Write name" />
                        <x-input-error :messages="$errors->first('name')" />
                    </div>

                    <div class="mb-4">
                        <x-input-label>
                            Description
                        </x-input-label>

                        <textarea name="description" class="form-control w-full mt-2" placeholder="Write description">{{ old('description', $task->description) }}</textarea>
                        <x-input-error :messages="$errors->first('description')" />
                    </div>

                    <div class="mb-4">
                        <x-input-label>
                            Image
                        </x-input-label>

                        <input type="file" name="image_url" class="w-full mt-2" />
                        <x-input-error :messages="$errors->first('image_url')" />
                    </div>

                    <div>
                        <div class="flex justify-end">
                            <button class="btn btn-blue">
                                Update
                            </button>
                        </div>
                    </div>

                </div>

            </div>

        </form>

    </x-container>

</x-tenancy-layout>
