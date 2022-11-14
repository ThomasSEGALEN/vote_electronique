<x-app-layout>
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Consulter les votes') }}</h2>
            <div class="flex flex-col justify-between md:flex-row-reverse my-4">
                @can('votes_create')
                <div class="space-x-2">
                    <button class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded"
                        onclick="window.location='{{ route('admin.votes.create') }}'">
                        Créer un vote
                    </button>
                </div>
                @endcan
                @if (session('voteUpdateSuccess'))
                {{-- <div class="bg-blue-100 text-blue-700 py-2 px-4 rounded" role="alert">
                    <span class="block sm:inline">{{ session('voteUpdateSuccess') }}</span>
                </div> --}}
                @elseif (session('voteDeleteSuccess'))
                <div class="bg-red-100 text-red-700 py-2 px-4 rounded" role="alert">
                    <span class="block sm:inline">{{ session('voteDeleteSuccess') }}</span>
                </div>
                @endif
            </div>
            <table class="min-w-full text-center">
                <thead class="border-b bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-4">ID</th>
                        <th scope="col" class="px-6 py-4">Titre</th>
                        <th scope="col" class="px-6 py-4">Documents</th>
                        {{-- <th scope="col" class="px-6 py-4">Description</th> --}}
                        <th scope="col" class="px-6 py-4">Date de début</th>
                        <th scope="col" class="px-6 py-4">Date de fin</th>
                        <th scope="col" class="px-6 py-4">Groupes</th>
                        {{-- <th scope="col" class="px-6 py-4">Date de création</th> --}}
                        {{-- <th scope="col" class="px-6 py-4">Date de modification</th> --}}
                        <th scope="col">Actions</th>
                    </tr>
                </thead class="border-b">
                @foreach ($votes as $vote)
                <tbody>
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 whitespace-nowrap">{{ $vote->id }}</th>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $vote->title }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">@foreach ($vote->documents as $document) <li class="list-none"><a href="{{ asset("storage/" . $document->title) }}" target="_blank">{{ $document->title }}</a></li> @endforeach</td>
                        {{-- <td class="px-6 py-4 whitespace-nowrap">{{ $vote->description }}</td> --}}
                        <td class="px-6 py-4 whitespace-nowrap">{{ $vote->start_date }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $vote->end_date }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">@foreach ($vote->groups as $group) {{ $group->label }} @endforeach</td>
                        {{-- <td class="px-6 py-4 whitespace-nowrap">{{ $vote->created_at }}</td> --}}
                        {{-- <td class="px-6 py-4 whitespace-nowrap">{{ $vote->updated_at }}</td> --}}
                        <td class="px-6 py-4 whitespace-nowrap flex justify-center">
                            <div class="flex space-x-2">
                                {{-- <a href="{{ route('admin.votes.show', $vote) }}"
                                    class="bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded">
                                    Show
                                </a> --}}
                                <a href="{{ route('admin.votes.edit', $vote) }}"
                                    class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">
                                    <svg class="fill-current w-4 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.8 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg>
                                </a>
                                <form id="form-{{ $vote->id }}" action="{{ route('admin.votes.destroy', $vote) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded">
                                        <svg class="fill-current w-4 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
            {{-- <div class="my-4">{{ $votes->onEachSide(0)->links() }}</div> --}}
    </x-slot>
</x-app-layout>