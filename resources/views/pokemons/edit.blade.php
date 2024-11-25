@extends('layouts.base')

@section('content')


    <form class="max-w-sm mx-auto" action="{{ url('pokemons/'.$pokemon->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method ('PUT')
    <div class="mb-5">
        <label for="name" class="block text-center mb-2 text-sm font-medium text-slate-300 dark:text-white">Name</label>
        <input type="text" name="name" id="name" value="{{ $pokemon->name}}" class="bg-gray-50 text-center border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
    </div>
    <div class="mb-5">
        <label for="type" class="block text-center mb-2 text-sm font-medium text-slate-300 dark:text-white">Type</label>
        <input type="text" name="type" id="type" value="{{ $pokemon->type}}" class="bg-gray-50 text-center border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
    </div>
    <div class="mb-5">
        <label for="power" class="block text-center mb-2 text-sm font-medium text-slate-300 dark:text-white">Power</label>
        <input type="number" name="power" id="power" value="{{ $pokemon->power}}" class="bg-gray-50 text-center border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
    </div>
    <div class="mb-5" >
        <img src="{{ asset($pokemon->image) }}" alt="" class="mx-auto block" >
        <label for="image" class="block text-center mb-2 text-sm font-medium text-slate-300 dark:text-white">Image</label>
        <input type="file" name="image" id="image" class="bg-gray-50 text-center border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>
    <div class="mb-5" >
    <label for="coach_id" class="block text-center mb-2 text-sm font-medium text-slate-300 dark:text-white">Coach</label>
    <select name="coach_id" id="coach_id" class="mx-auto block bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option value="">Select a coach</option>
        @foreach ($coaches as $coach)
            @if($coach->id === $pokemon->coach->id)
            <option value="{{ $coach->id }}" selected>{{ $coach->name }}</option>
            @else
            <option value="{{ $coach->id }}">{{ $coach->name }}</option>
            @endif
        @endforeach
    </select>
    </div>
    <div>
    <div class="flex justify-center items-center">
        <button type="submit" class="text-gray-900 bg-red-200 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Update Pokemon </button>
    </div>
</form>
@endsection