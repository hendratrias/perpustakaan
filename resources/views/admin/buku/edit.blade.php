@extends('layouts.app', ['title' => 'Perpus | Buku'])

@section('content')
    <!-- General elements -->
    <h4
    class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
  >
    Edit Buku
  </h4>
  <div
    class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
  >
  <form action="{{ route('admin.buku.update', $book->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <label class="block mt-4 text-sm">
        <img src="{{ $book->BookImg }}" width="100px" alt="" srcset="">
        <span class="text-gray-700 dark:text-gray-400">Update Foto</span>
        <input
          class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
          type="file" name="thumbnail"
        />
        @error('thumbnail')
          <span>
              <strong style="color: red;">{{ $message }}</strong>
          </span>
        @enderror
    </label>

    <label class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">Kode Buku</span>
        <input
          class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
          placeholder="BK-XXXX" name="book_code" value="{{ $book->book_code ?? old('book_code') }}" required autofocus
        />
        @error('book_code')
          <span>
              <strong style="color: red;">{{ $message }}</strong>
          </span>
        @enderror
    </label>

    <label class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">Nama Buku</span>
        <input
          class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
          placeholder="nama buku..." name="name" value="{{ $book->name ?? old('name') }}" required
        />
        @error('name')
          <span>
              <strong style="color: red;">{{ $message }}</strong>
          </span>
        @enderror
      </label>

      <label class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">Deskripsi Buku</span>
        <textarea
          class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
          placeholder="deskripsi buku..." name="description" rows="4" required
        />{{ $book->description ?? old('description') }}</textarea>
        @error('description')
          <span>
              <strong style="color: red;">{{ $message }}</strong>
          </span>
        @enderror
      </label>

    <label class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">
          Kategori
        </span>
        <select
          class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
          name="category_id" required
        >
          @foreach ($categories as $category)
            <option {{ $category->id == $book->category_id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
          @endforeach
        </select>
        @error('category_id')
          <span>
              <strong style="color: red;">{{ $message }}</strong>
          </span>
        @enderror
    </label>

    <label class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">
          Pengarang
        </span>
        <select
          class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
          name="author_id" required
        >
          @foreach ($authors as $author)
            <option {{ $author->id == $book->author_id ? 'selected' : '' }} value="{{ $author->id }}">{{ $author->name }}</option>
          @endforeach
        </select>
        @error('author_id')
          <span>
              <strong style="color: red;">{{ $message }}</strong>
          </span>
        @enderror
    </label>

    <label class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">
          Penerbit
        </span>
        <select
          class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
          name="publisher_id" required
        >
         @foreach ($publishers as $publisher)
          <option {{ $publisher->id == $book->publisher_id ? 'selected' : '' }} value="{{ $publisher->id }}">{{ $publisher->name }}</option>
         @endforeach
        </select>
        @error('publisher_id')
          <span>
              <strong style="color: red;">{{ $message }}</strong>
          </span>
        @enderror
    </label>

    <label class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">Tahun Terbit</span>
        <input
          class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
          type="year" name="publication_year" placeholder="2000" value="{{ $book->publication_year ?? old('publication_year') }}" maxlength="4" required
        />
        @error('publication_year')
          <span>
              <strong style="color: red;">{{ $message }}</strong>
          </span>
        @enderror
    </label>

    <label class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">ISBN</span>
        <input
          class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
          type="text" name="isbn" value="{{ $book->isbn ?? old('isbn') }}" placeholder="ISBN XXX-XXX-XXXX-XX-X" maxlength="22" required
        />
        @error('isbn')
          <span>
              <strong style="color: red;">{{ $message }}</strong>
          </span>
        @enderror
    </label>

    <label class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">Stok Buku</span>
        <input
          class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
          type="number" name="stock" placeholder="stok buku..." value="{{ $book->stock ?? old('stock') }}" required
        />
        @error('stock')
          <span>
              <strong style="color: red;">{{ $message }}</strong>
          </span>
        @enderror
    </label>

    <div class="flex mt-6 text-sm">
      <label class="flex items-center dark:text-gray-400">
        <a href="{{ route('admin.buku.index') }}" class="px-3 py-1 text-sm mr-2 font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-md active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
            Kembali
        </a>
        <button class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            Update
        </button>
      </label>
    </form>
    </div>
  </div>
@endsection
