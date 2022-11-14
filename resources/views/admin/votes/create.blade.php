<x-app-layout>
    <x-slot name="header">
        <div class="p-6 rounded overflow-hidden shadow-lg border">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Créer un vote') }}</h2>
            @if (session('voteCreateSuccess'))
            <div class="bg-green-100 text-green-700 py-2 px-4 rounded my-4" role="alert">
                <span class="block sm:inline">{{ session('voteCreateSuccess') }}</span>
            </div> @endif
            <form class="w-full" action="{{ route('admin.votes.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col md:flex-row -mx-3">
                    <div class="w-full md:w-1/2 px-3 md:mb-6">
                        <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="titleInput">
                            Titre
                        </label>
                        <input
                            class="@error('title') is-invalid @enderror appearance-none block w-full bg-gray-100 rounded py-3 px-4 mb-3 md:mb-0"
                            id="titleInput" type="text" name="title" value="{{ old('title') }}">
                        @error('title')
                        <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <div class="w-full md:w-1/2 px-3 md:mb-6">
                            <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="groupsInput">
                                Groupes
                            </label>
                            @foreach ($groups as $group)
                            <div class="form-check">
                                <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                id="groupInput" type="checkbox" name="group_id[]" value="{{ $group->id }}">
                                <label class="form-check-label inline-block text-gray-800" for="groupInput">
                                    {{ $group->label }}
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="flex flex-col md:flex-row -mx-3">
                    <div class="w-full md:w-1/2 px-3 md:mb-6">
                        <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="descriptionInput">
                            Description
                        </label>
                        <textarea
                            class="@error('description') is-invalid @enderror appearance-none block w-full bg-gray-100 rounded py-3 px-4 mb-3 md:mb-0"
                            id="descriptionInput" type="text" name="description">{{ old('description') }}</textarea>
                        @error('description')
                        <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-col md:flex-row -mx-3">
                    <div class="w-full md:w-1/3 px-3 md:mb-6">
                        <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="startDateInput">
                            Date de début
                        </label>
                        <input
                            class="@error('start_date') is-invalid @enderror appearance-none block w-full bg-gray-100 rounded py-3 px-4 mb-3 md:mb-0"
                            id="startDateInput" type="datetime-local" name="start_date" value="{{ old('start_date') }}">
                        @error('start_date')
                        <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/3 px-3">
                        <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="endDateInput">
                            Date de fin
                        </label>
                        <input
                            class="@error('end_date') is-invalid @enderror appearance-none block w-full bg-gray-100 rounded py-3 px-4 mb-3 md:mb-0"
                            id="endDateInput" type="datetime-local" name="end_date" value="{{ old('end_date') }}">
                        @error('end_date')
                        <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/4 px-3 md:mb-6">
                        <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="documentsInput">
                            Documents
                        </label>
                        <input class="@error('documents') is-invalid @enderror appearance-none block w-full bg-gray-100 rounded py-3 px-4 mb-3 md:mb-0"
                        id="documentsInput" type="file" name="documents[]" multiple="multiple"/>
                        @error('documents')
                        <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-2 space-x-2">
                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded">
                        Submit
                    </button>
                    <button type="button" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded"
                        onclick="window.location='{{ route('admin.votes.index') }}'">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </x-slot>
</x-app-layout>