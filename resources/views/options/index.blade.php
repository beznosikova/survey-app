@extends('layouts.app')

@section('content')
    <div class="divide-y divide-gray-200 dark:divide-gray-700">
        <div class="space-y-2 pt-6 pb-8 md:space-y-5">
            <h1
                class="text-3xl leading-9 tracking-tight text-gray-900 dark:text-gray-100 sm:text-4xl sm:leading-10 ">
                Lista dostępnych opcji odpowiedzi na pytanie "{!! $question->content !!}"
            </h1>
            <div class="flex ">

                <a
                    class="mr-3 text-sm uppercase font-medium uppercase text-cyan-500 hover:text-cyan-600 dark:hover:text-cyan-400 mb-4"
                    href="{{route('surveys.questions', ['survey' => $question->survey])}}">lista pytań</a>

                <a class="mr-3 text-sm font-medium uppercase text-cyan-500 hover:text-cyan-600 dark:hover:text-cyan-400"
                   href="{{route('surveys.questions.options.create', ['survey'=>$question->survey, 'question'=>$question])}}">
                    nowa opcja</a>
            </div>
            <div class="text-gray-500">
                Typ pytania: {!! $question->type->text() !!}
            </div>
            @if($question->options->isEmpty())
                <p class="text-lg leading-7 text-gray-500 dark:text-gray-400">
                    Lista utworzonych opcji jest pusta
                </p>
            @endif
        </div>
        @if (session('status'))
            <div class="bg-blue-100 text-cyan-700 px-4 py-3" role="alert">
                <p class="font-bold">{{ session('status') }}</p>
            </div>
        @endif
        @if($question->options->isNotEmpty())
            <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                @foreach($question->options as $option)
                    @include('options.item')
                @endforeach
            </ul>
        @endif
    </div>
@endsection
