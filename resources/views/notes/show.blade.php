<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ !$note->trashed() ? __('Notes') : __('Trash') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>
            <div class="flex py-4">
                @if(!$note->trashed())
                    <p class="opacity-70 pr-4">
                        <strong>Created at: </strong>{{ $note->created_at->diffForHumans() }}
                    </p>
                    <p class="opacity-70">
                        <strong>Updated: </strong>{{ $note->updated_at->diffForHumans() }}
                    </p>
                    <a href="{{ route('notes.edit', $note) }}" class="btn-link ml-auto">Edit Note</a>
                    <form action="{{ route('notes.destroy', $note) }}" method="post">
                        @method('delete')
                        @csrf
                        <x-danger-button type="submit" class="btn btn-danger ml-4" onclick="return confirm('Are you sure you wish to move this to trash?')">Note move to Trash</x-danger-button>
                    </form>
                @else
                    <p class="opacity-70 pr-4">
                        <strong>Deleted: </strong>{{ $note->deleted_at->diffForHumans() }}
                    </p>
                    <form action="{{ route('trashed.update', $note) }}" method="post" class="ml-auto">
                        @method('put')
                        @csrf
                        <x-success-button type="submit" class="btn btn-success">Restore Note</x-success-button>
                    </form>
                    
                   <form action="{{ route('trashed.destroy', $note) }}" method="post">
                        @method('delete')
                        @csrf
                        <x-danger-button type="submit" class="btn btn-danger ml-4" onclick="return confirm('Are you sure you wish to delete this note forever?')">Delete Forever</x-danger-button>
                    </form>
                @endif
            </div>
            <div class="bg-white border-b border-gray-200 overflow-hidden shadow-sm sm:rounded-lg">
                <h2 class="p-6 text-gray-900 text-4xl">
                   {{ $note->title }}
                </h2>
                <p class="p-6 white-space-wrap text-gray-900">{{ $note->text }}</p>
            </div>
        </div>
    </div>
</x-app-layout>