@extends('layouts.base')

@section('content')

@can('create', App\Models\Pokemon::class)
    <div class="m-5" >
        <a href="{{url('pokemons/create') }}" class="text-white bg-red-950 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Create Pokemon</a>
    </div>
@endcan
        <div class="flex flex-wrap justify-center mt-10">
         @foreach($pokemons as $pokemon)
        <div class="p-4 max-w-sm">
                <div class="flex rounded-lg h-full dark:bg-gray-800 bg-red-950 p-8 flex-col">
                <img class="w-24 h-24 mb-3 mx-auto rounded-full shadow-lg" src="{{ asset($pokemon->image) }}" alt={{$pokemon->name}}/>
                <h5 class="mb-1 text-xl font-medium text-cyan-200 dark:text-white text-center">{{$pokemon->name}}</h5>
                <span class="text-sm text-cyan-200 dark:text-gray-400 text-center">{{$pokemon->type}}</span>
                <span class="text-sm text-cyan-200 dark:text-gray-400 text-center">{{$pokemon->power}}</span>
                @if(isset($pokemon->coach))
                    <span class="text-sm text-cyan-200 dark:text-gray-400 text-center">{{$pokemon->coach->name}}</span>
                @else
                    <span class="text-sm text-cyan-200 dark:text-gray-400 text-center">Sem treinador</span>
                @endif
                    <div class="flex mt-4 md:mt-6">
                        <a href="{{ url('pokemons/'.$pokemon->id.'/edit') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-gray-900 bg-red-200 rounded-lg hover:bg-red-400 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-slate-950 dark:hover:bg-slate-950 dark:focus:ring-blue-800">Edit</a>
                        <form action="{{ url('pokemons/'.$pokemon->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="py-2 px-4 ms-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" >Delete</button>
                        </form>
            </div>
        </div>
    </div>
    @endforeach
    </div>
@endsection