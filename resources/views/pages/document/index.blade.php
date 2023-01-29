<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Document') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (session('success'))
                        <div class="bg-blue-100 rounded-lg py-5 px-6 mb-4 text-base text-blue-700 mb-3" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="flex items-center justify-between pb-4 bg-white dark:bg-gray-900">
                        <div></div>
                        {{-- <label for="table-search" class="sr-only">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input type="text" id="table-search-users"
                                class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Search for users">
                        </div> --}}
                        <div>
                            <a href="{{ route('document.create') }}"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add
                                Document</a>
                        </div>
                    </div>

                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Title
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Uploader
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Signig
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Signed Status
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($documents as $document)
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="px-6 py-4">
                                        <a href="{{ $document->picture_url }}" target="_blank" class="text-orange-600">
                                            {{ $document->title ?? '-' }} (click to view)
                                        </a>
                                    </td>
                                    <td scope="row">
                                        <div
                                            class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">

                                            @if ($document->uploader_id->profile->has_media)
                                                <img class="w-10 h-10 rounded-full"
                                                    src="{{ $document->uploader_id->profile->picture_url }}"
                                                    alt="Jese image">
                                            @else
                                                <span
                                                    class="inline-block h-12 w-12 overflow-hidden rounded-full bg-gray-100">
                                                    <svg class="h-full w-full text-gray-300" fill="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path
                                                            d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                                    </svg>
                                                </span>
                                            @endif
                                            <div class="pl-3">
                                                <div class="text-base font-semibold">{{ $document->uploader_id->name }}
                                                </div>
                                                <div class="font-normal text-gray-500">
                                                    {{ $document->uploader_id->email }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td scope="row">
                                        <div
                                            class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                            @if ($document->signing_id->profile->has_media)
                                                <img class="w-10 h-10 rounded-full"
                                                    src="{{ $document->signing_id->profile->picture_url }}"
                                                    alt="Jese image">
                                            @else
                                                <span
                                                    class="inline-block h-12 w-12 overflow-hidden rounded-full bg-gray-100">
                                                    <svg class="h-full w-full text-gray-300" fill="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path
                                                            d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                                    </svg>
                                                </span>
                                            @endif
                                            <div class="pl-3">
                                                <div class="text-base font-semibold">{{ $document->signing_id->name }}
                                                </div>
                                                <div class="font-normal text-gray-500">
                                                    {{ $document->signing_id->email }}
                                                </div>
                                            </div>

                                        </div>
                                    </td>

                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            @if ($document->signed_at)
                                                <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div>
                                                Done
                                            @else
                                                <div class="h-2.5 w-2.5 rounded-full bg-yellow-500 mr-2"></div>
                                                Waiting
                                            @endif

                                        </div>
                                    </td>
                                    <td class="px-6 py-4">

                                        <a href="{{ route('document.edit', $document->id) }}"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</a>
                                        <form action="{{ route('document.destroy', $document->id) }}" method="post"
                                            class="inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit"
                                                class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Delete</button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
