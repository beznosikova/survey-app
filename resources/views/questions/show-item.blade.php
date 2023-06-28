<div class="shadow py-3 px-4">
    <div>
        <div class="flex items-center">
            <div class="text-gray-900 dark:text-gray-100">{{$loop->iteration}}
                . {!! $question->content !!}@if($survey->inTesting)
                    [{{$question->id}}]
                @endif</div>
        </div>
        <div class="flex flex-col items-center pt-5">
            @foreach($question->options as $option)
                <div class="w-full px-3 mb-6">
                    <div class="md:w-1/3"></div>
                    <label class="md:w-2/3 block text-gray-500 font-bold">
                        <input class="mr-2 leading-tight"
                               type="{{$question->isSingle ? 'radio' : 'checkbox'}}"
                               value="{{$option->value}}"
                               name="votes[{{$question->id}}][{{$option->id}}][]">
                        <span class="text-sm">{{$option->content}}
                            @if($survey->inTesting)
                                [{{$option->id}}]
                            @endif</span>
                    </label>
                </div>
            @endforeach
        </div>
    </div>
</div>

