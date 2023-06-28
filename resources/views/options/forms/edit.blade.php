@extends('layouts.app')

@section('content')
    <div class="divide-y divide-gray-200 dark:divide-gray-700">
        <div class="space-y-2 pt-6 pb-8 md:space-y-5">
            <h1
                class="text-3xl font-extrabold leading-9 tracking-tight text-gray-900 dark:text-gray-100 sm:text-4xl sm:leading-10">
                Edycja opcji dla badania <span class="mr-3 font-medium uppercase text-cyan-500">"{!! $question->survey->name !!}"</span>
            </h1>
            <h3
                class="text-2xl font-extrabold leading-8 tracking-tight text-gray-900 dark:text-gray-100 sm:text-3xl sm:leading-9">
                Pytanie <span class="mr-3 font-medium uppercase text-cyan-500">"{!! $question->content !!}"</span>
            </h3>
            <div class="text-lg leading-7 text-gray-500 dark:text-gray-400">
                @include('options.forms.form', ['method' => 'PUT', 'question' =>$question])
            </div>
        </div>
    </div>
@endsection
