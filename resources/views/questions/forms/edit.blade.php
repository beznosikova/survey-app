@extends('layouts.app')

@section('content')
    <div class="divide-y divide-gray-200 dark:divide-gray-700">
        <div class="space-y-2 pt-6 pb-8 md:space-y-5">
            <h1
                class="text-3xl font-extrabold leading-9 tracking-tight text-gray-900 dark:text-gray-100 sm:text-4xl sm:leading-10">
                Edycja pytania
            </h1>
            <div class="text-lg leading-7 text-gray-500 dark:text-gray-400">
                @include('questions.forms.form', ['method' => 'PUT', 'question' =>$question])
            </div>
        </div>
    </div>
@endsection
