@extends('layouts.app', ['title' => 'Perpus | Peminjaman'])

@section('content')
    <!-- General elements -->
    <h4
    class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
  >
    Edit Peminjaman
  </h4>
  <div
    class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
  >
  <form action="{{ route('admin.pinjam.update', $borrowing->id) }}" method="post">
    @csrf
    @method('PATCH')
    <label class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">Perpanjang sampai dengan tanggal</span>
        <input
          class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
          type="date" name="return_date" value="{{ $borrowing->return_date ?? old('return_date') }}" required
        />
        @error('return_date')
          <span>
              <strong style="color: red;">{{ $message }}</strong>
          </span>
        @enderror
    </label>

    <div class="flex mt-6 text-sm">
      <label class="flex items-center dark:text-gray-400">
        <a href="{{ route('admin.pinjam.index') }}" class="px-3 py-1 text-sm mr-2 font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-md active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
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
