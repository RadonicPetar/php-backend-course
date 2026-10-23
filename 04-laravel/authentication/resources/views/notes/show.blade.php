<x-app-layout>
    <x-slot name="header">
        <h2>Bilješka</h2>
    </x-slot>

    <div class="note">
        <h3>
            {{ $note->title }}
        </h3>
        <p>
            {{ $note->content }}
        </p>
    </div>
</x-app-layout>