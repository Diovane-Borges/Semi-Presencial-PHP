@extends('layouts.base')

@section('content')


    <form class="max-w-sm mx-auto" action="{{ url('coaches/'.$coach->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method ('PUT')
    <div class="mb-5">
        <label for="name" class="block text-center mb-2 text-sm font-medium text-slate-300 dark:text-white">Name</label>
        <input type="text" name="name" id="name" value="{{ $coach->name}}" class="bg-gray-50 text-center border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
    </div>
    <div class="mb-5" >
        <img src="{{ asset($coach->image) }}" alt="">
        <label for="image" class="block text-center mb-2 text-sm font-medium text-slate-300 dark:text-white">Image</label>
        <input type="file" name="image" id="image" class="bg-gray-50 text-center border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>
    <div class="flex justify-center items-center">
        <button type="submit" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Update Coach </button>
    </div>
</form>
@endsection