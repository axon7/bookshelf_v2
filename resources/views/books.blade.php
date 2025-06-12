<x-layout>
    <x-slot:heading>
        Books Listings
    </x-slot:heading>

    <ul>
        @foreach ($books as $book)
            <li>
                <a href="/books/{{ $book['id'] }}" class="text-blue-500 hover:underline">
                    <strong>{{ $book['title'] }}:</strong> {{ $book['title'] }}
                </a>
            </li>
        @endforeach
    </ul>
</x-layout>
