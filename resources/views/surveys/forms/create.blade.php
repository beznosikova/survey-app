@extends('layouts.app')

@section('content')
    <div class="divide-y divide-gray-200 dark:divide-gray-700">
        <div class="space-y-2 pt-6 pb-8 md:space-y-5">
            <h1
                class="text-3xl leading-9 tracking-tight text-gray-900 dark:text-gray-100 sm:text-4xl sm:leading-10 ">
                Tworzenie badania
            </h1>

            <div class="text-lg leading-7 text-gray-500 dark:text-gray-400">
                <form method="POST"
                      class="w-full max-w-lg">
                    @csrf
                    @method('POST')
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                   for="survey-name">
                                Nazwa badania
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('name') border-red-500 @else border-gray-200  focus:border-gray-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="survey-name" type="text" placeholder="Nazwa" name="name" value="{{ old('name') }}">
                            @error('name')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <button
                        class="shadow bg-cyan-500 hover:bg-cyan-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                        type="submit">
                        Utwórz
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
