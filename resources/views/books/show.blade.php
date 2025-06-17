<x-layout>
    <x-slot:heading>
        Book Details
    </x-slot:heading>

   

    <p>
       {{ $book['title']}} by {{ $book['author'] }}.
       <a href="/books/{{ $book->id }}/edit" class="text-blue-500 hover:underline">Edit</a>
    </p>
</x-layout>
