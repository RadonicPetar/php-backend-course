<x-app-layout>
    <x-slot name="header">
        <h2>
            Greška
        </h2>
    </x-slot>

    <div class="error">
        <h3>
            {{ $code }}
        </h3>

        <p>
            {{ $message }}
        </p>
    </div>
</x-app-layout>