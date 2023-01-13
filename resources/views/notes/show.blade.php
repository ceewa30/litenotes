<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex">
                <p class="opacity-70 pr-4">
                    <strong>Created:</strong>{{ $note->created_at->diffForHumans() }}
                </p>
                <p class="opacity-70">
                    <strong>Updated:</strong>{{ $note->updated_at->diffForHumans() }}
                </p>
            </div>
            <div class="bg-white border-b border-gray-200 overflow-hidden shadow-sm sm:rounded-lg">
                <h2 class="p-6 text-gray-900 text-4xl">
                   {{ $note->title }}
                </h2>
                <p class="p-6 white-space-wrap text-gray-900">{{ $note->text }}</p>
                {{-- <span class="block pl-6 my-4 text-sm opacity-70">{{ $note->updated_at->diffForHumans() }}</span> --}}
            </div>
        </div>
    </div>
</x-app-layout>