@extends('layouts.app')

@section('content')
    <div class="divide-y divide-gray-200 dark:divide-gray-700">
        <div class="space-y-2 pt-6 pb-8 md:space-y-5">
            <h1
                class="text-3xl font-extrabold leading-9 tracking-tight text-gray-900 dark:text-gray-100 sm:text-4xl sm:leading-10 md:text-6xl md:leading-14">
                Edycja badania
            </h1>

            <div class="text-lg leading-7 text-gray-500 dark:text-gray-400">
                <form method="POST"
                      class="w-full max-w-lg">
                    @csrf
                    @method('PUT')
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3 mb-6">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                   for="survey-name">
                                Nazwa badania
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('name') border-red-500 @else border-gray-200  focus:border-gray-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="survey-name" type="text" placeholder="Nazwa" name="name"
                                value="{{ old('name', $survey->name) }}">
                            @error('name')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="w-full px-3 mb-6">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                   for="survey-name">
                                Status badania
                            </label>
                            <select
                                class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 mb-3 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-state"
                                name="status"
                            >
                                @foreach ($statuses as $status)
                                    <option
                                        value="{{ $status->value }}" @selected(old('status', $survey->status->value) == $status->value)>
                                        {{ $status->text() }}
                                    </option>
                                @endforeach
                            </select>
                            @error('status')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <button
                            class="shadow bg-cyan-500 hover:bg-cyan-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                            type="submit">
                            Edytuj
                        </button>
                        <a class="mr-3 text-sm font-medium uppercase text-cyan-500 hover:text-cyan-600 dark:hover:text-cyan-400"
                           href="{{route('surveys.questions', [$survey])}}">lista pytań</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
