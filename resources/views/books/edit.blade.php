<x-layout>
    <x-slot:heading>
        Book Edit
    </x-slot:heading>

    

<form method="POST" action="/books/{{ $book->id }}" class="space-y-8 divide-y divide-gray-900/10">
    @csrf
   @method('PATCH')
  <div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
      <h2 class="text-base/7 font-semibold text-gray-900">Create a book</h2>
      {{-- <p class="mt-1 text-sm/6 text-gray-600">This information will be displayed publicly so be careful what you share.</p> --}}
        <div class="sm:col-span-3">
          <label for="title" class="block text-sm/6 font-medium text-gray-900">Title</label>
          <div class="mt-2">
            <input type="text"
              name="title" id="title"
               value="{{ $book->title ?? '' }}"
                   autocomplete=""
                   class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
          </div>
      </div>
      <div class="sm:col-span-3">
          <label for="description" class="block text-sm/6 font-medium text-gray-900">Description</label>
          <div class="mt-2">
            <textarea name="description" 
              value="{{ $book->description ?? '' }}"
            id="description"  rows="3" class="mt-2 block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"></textarea>
          </div>
      </div>
      
      @if($errors->any())
          <div class="mt-4">
              <div class="text-red-600 text-sm">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          </div>
      @endif
    </div>    
  </div>

  <div class="mt-6 flex items-center justify-end gap-x-6">
    <a href="/books/{{ $book->id }}" type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
  </div>
</form>


<form method="POST" action="/books/{{ $book->id }}">
    @csrf
    @method('DELETE')
    <div class="mt-6 flex items-center justify-end gap-x-6">
        <button type="submit" class="text-sm/6 font-semibold text-red-600 hover:text-red-500">Delete</button>
    </div>
</form>
</x-layout>
