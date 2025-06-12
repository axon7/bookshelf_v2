<x-layout>
    <x-slot:heading>
        Book Details
    </x-slot:heading>

   

    <p>
       {{ $book['title']}} by {{ $book['author'] }}.
    </p>
</x-layout>
