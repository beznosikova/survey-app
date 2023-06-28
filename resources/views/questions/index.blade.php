@extends('layouts.app')

@section('content')
    <div class="divide-y divide-gray-200 dark:divide-gray-700">


        <div class="space-y-2 pt-6 pb-8 md:space-y-5">
            <div class="flex gap-8">
                <h1
                    class="text-3xl leading-9 tracking-tight text-gray-900 dark:text-gray-100 sm:text-4xl sm:leading-10 ">
                    Lista pytań do badania "{!! $survey->name !!}"
                </h1>
                <div class="text-gray-500">
                    {!! $survey->status->text() !!}
                </div>
            </div>
            <a class="mr-3 text-sm font-medium uppercase text-cyan-500 hover:text-cyan-600 dark:hover:text-cyan-400"
               href="{{route('surveys.questions.create', [$survey])}}">nowe pytanie</a>
            <p class="text-lg leading-7 text-gray-500 dark:text-gray-400">
                @if($survey->questions->isNotEmpty())
                    Lista utworzonych pytań
                @else
                    Lista utworzonych pytań jest pusta
                @endif
            </p>
        </div>

        @if (session('status'))
            <div class="bg-blue-100 text-cyan-700 px-4 py-3" role="alert">
                <p class="font-bold">{{ session('status') }}</p>
            </div>
        @endif
        @if($survey->questions->isNotEmpty())
            <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                @foreach($survey->questions as $question)
                    @include('questions.item')
                @endforeach
            </ul>
        @endif
    </div>
@endsection
