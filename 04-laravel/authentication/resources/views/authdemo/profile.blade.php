@php
use Carbon\Carbon;
@endphp
<x-app-layout>
    <x-slot name="header">
        <h2>Moj profil</h2>
    </x-slot>

    <div class="profil">

    <h3>Podaci korisnika</h3>

    <p>
        <strong>ID:</strong>
        {{ $user->id }}
    </p>
    <p>
        <strong>Ime:</strong>
        {{ $user->name }}
    </p>
    <p>
        <strong>Email:</strong>
        {{ $user->email }}
    </p>
    <p>
        <strong>Registriran:</strong>
        {{ Carbon::parse($user->created_at)->format('d.m.Y H:i:s') }}
    </p>
    <p>
        <strong>Administrator:</strong>
        {{ $user->is_admin ? 'DA' : 'NE' }}
    </p>
    </div>
</x-app-layout>