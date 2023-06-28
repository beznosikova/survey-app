@extends('layouts.app')

@section('content')
    <div class="divide-y divide-gray-200 dark:divide-gray-700">


        <div class="space-y-2 pt-6 pb-8 md:space-y-5">
            <h1
                class="text-3xl leading-9 tracking-tight text-gray-900 dark:text-gray-100 sm:text-4xl sm:leading-10 ">
                Lista badań
            </h1>
            <p class="text-lg leading-7 text-gray-500 dark:text-gray-400">
                @if(isset($surveys) && $surveys->isNotEmpty())
                    Lista utworzonych badań
                @else
                    Lista utworzonych badań jest pusta
                @endif
            </p>
        </div>
        @if (session('status'))
            <div class="bg-blue-100 text-cyan-700 px-4 py-3" role="alert">
                <p class="font-bold">{{ session('status') }}</p>
            </div>
        @endif
        @if(isset($surveys) && $surveys->isNotEmpty())
            <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                @foreach($surveys as $survey)
                    @include('surveys.item')
                @endforeach
            </ul>
        @endif
    </div>
@endsection
