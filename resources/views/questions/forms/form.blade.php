<h3
    class="mr-3 text-sm font-medium uppercase text-cyan-500 hover:text-cyan-600 dark:hover:text-cyan-400 mb-4">
    badanie <a href="{{route('surveys.questions', compact('survey'))}}">"{!! $survey->name !!}"</a>
</h3>
<form method="POST"
      class="w-full max-w-lg">
    @csrf
    @method($method)
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                   for="order">
                Pozycję pytania
            </label>
            <input
                class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('order') border-red-500 @else border-gray-200  focus:border-gray-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                id="order" type="text" placeholder="Pozycję pytania" name="order"
                value="{{ old('order', $question?->order) }}">
            @error('order')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                   for="content">
                Treść pytania
            </label>
            <input
                class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('content') border-red-500 @else border-gray-200  focus:border-gray-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                id="content" type="text" placeholder="Treść pytania" name="content"
                value="{{ old('content', $question?->content) }}">
            @error('content')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3 mb-6">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                   for="survey-name">
                Typ pytania
            </label>
            <select
                class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 mb-3 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                id="grid-state"
                name="type"
            >
                @foreach ($types as $type)
                    <option
                        value="{{ $type->value }}" @selected(old('status', $question?->type->value) == $type->value)>
                        {{ $type->text() }}
                    </option>
                @endforeach
            </select>
            @error('type')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <button
        class="shadow bg-cyan-500 hover:bg-cyan-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
        type="submit">
        {{ $question ? 'Edytuj' : 'Utwórz' }}
    </button>
</form>
