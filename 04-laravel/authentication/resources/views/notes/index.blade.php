<x-app-layout>
    <x-slot name="header">
        <h2>Moje bilješke</h2>
    </x-slot>

    <div class="notes-container">
        <h2 class="notes-heading">
            Popis mojih bilješki
        </h2>

        <p class="notes-count">
            Ukupno bilješki: {{ $notes->count() }}
        </p>

        @forelse($notes as $note)

        <div class="note-card">
            <h3 class="note-title">
                #{{ $note->id }} - {{ $note->title }}
            </h3>

            <div class="note-date">
                Kreirano: {{ $note->created_at->format('d.m.Y H:i:s') }}
            </div>

            <p class="note-content">
                {{ $note->content }}
            </p>

            <a href="{{ route('notes.show',$note) }}" class="note-button">Prikaži detalje</a>
        </div>

        @empty
        <div class="notes-empty">
            Nemate nijednu bilješku
        </div>
        @endforelse
    </div>
</x-app-layout>