<a class="mr-3 text-sm font-medium uppercase text-cyan-500 hover:text-cyan-600 dark:hover:text-cyan-400 mb-4"
   href="{{route('surveys.questions', ['survey' => $question->survey])}}">lista pytań</a>
<a class="mr-3 text-sm font-medium uppercase text-cyan-500 hover:text-cyan-600 dark:hover:text-cyan-400 mb-4"
   href="{{route('surveys.questions.options', ['survey' => $question->survey, 'question' => $question])}}">lista
    opcji"</a>
<form method="POST" class="w-full max-w-lg mt-4">
    @csrf
    @method($method)
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                   for="value">
                Wartość opcji
            </label>
            <input
                class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('value') border-red-500 @else border-gray-200  focus:border-gray-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                id="value" type="text" placeholder="Wartość opcji" name="value"
                value="{{ old('value', $option?->value) }}">
            @error('value')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                   for="content">
                Treść opcji
            </label>
            <input
                class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('content') border-red-500 @else border-gray-200  focus:border-gray-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                id="content" type="text" placeholder="Treść opcji" name="content"
                value="{{ old('content', $option?->content) }}">
            @error('content')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3 mb-6">
            <div class="md:w-1/3"></div>
            <label class="md:w-2/3 block text-gray-500 font-bold">
                <input class="mr-2 leading-tight" type="checkbox" value="1"
                       name="is_valid" @checked(old('is_valid', $option?->is_valid)) >
                <span class="text-sm">Czy opcja jest poprawna?</span>
            </label>
        </div>
    </div>
    <button
        class="shadow bg-cyan-500 hover:bg-cyan-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
        type="submit">
        {{ $option ? 'Edytuj' : 'Utwórz' }}
    </button>
</form>
