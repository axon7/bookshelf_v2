<x-layout>
    <x-slot:heading>
        Books Listings
    </x-slot:heading>

    <ul>
        @foreach ($books as $book)
            <li>
                <a href="/books/{{ $book['id'] }}" class="text-blue-500 hover:underline block px-4 py-2 border-gray-200 border m-2 rounded">
                    <strong>{{ $book['title'] }}:</strong> {{ $book['author']->first_name }} {{ $book['author']->last_name }}
                </a>
            </li>
        @endforeach
        <div>
            {{  $books->links()  }}
        </div>
    </ul>
</x-layout>
