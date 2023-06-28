@extends('layouts.app')

@section('content')
    <div class="">

        <div class="space-y-2 pt-6 pb-8 md:space-y-5">
            <div class="flex gap-8">
                <h1
                    class="text-3xl leading-9 tracking-tight text-gray-900 dark:text-gray-100 sm:text-4xl sm:leading-10 ">
                    {!! $survey->name !!}
                </h1>
                <div class="text-gray-500">
                    {!! $survey->status->text() !!}
                </div>
            </div>
        </div>

        @if (session('status'))
            <div class="bg-blue-100 text-cyan-700 px-4 py-3" role="alert">
                <p class="font-bold">{{ session('status') }}</p>
            </div>
        @endif
        @if($survey->questions->isNotEmpty())
            <form method="POST"
                  class="w-full pb-8">
                @csrf
                @method('POST')
                <div class="flex flex-col gap-8">
                    @foreach($survey->questions as $question)
                        @include('questions.show-item')
                    @endforeach
                    <button
                        class="shadow uppercase bg-cyan-500 hover:bg-cyan-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                        type="submit">
                        test
                    </button>
                </div>
            </form>
        @endif
    </div>
@endsection
