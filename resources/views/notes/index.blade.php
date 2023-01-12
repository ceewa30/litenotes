<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @forelse ($notes as $note)
            <div class="bg-white border-b border-gray-200 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ welcome }}
                   {{ $note->title }}
                </div>
                <div class="p-6 text-gray-900">
                    {{ hello }}
                    {{ Str::limit($note->text, 200) }}
                </div>
                <span class="block mt-4 text-sm opacity-70">{{ $note->updated_at->diffForHumans() }}</span>
            @empty
                <div class="p-6 text-gray-900">
                    <p>You have no notes yet.</p>
                </div>
            </div>
            @endforelse

            {{  $notes->links() }}
        </div>
    </div>
</x-app-layout>