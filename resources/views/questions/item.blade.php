<li class="py-12">
    <article>
        <div class="space-y-2 xl:grid xl:grid-cols-4 xl:items-baseline xl:space-y-0">
            <div class="text-base font-medium leading-6 text-gray-500 dark:text-gray-400">
                <time>{!! $question->created_at->format("d-m-Y H:i") !!} </time>
            </div>
            <div class="space-y-5 xl:col-span-3">
                <div class="space-y-6">
                    <div>
                        <div class="flex items-center gap-8 pt-5">
                            <h2 class="text-2xl font-bold leading-8 tracking-tight"><a
                                    class="text-gray-900 dark:text-gray-100">{!! $question->content !!}</a></h2>

                        </div>
                        <div class="flex items-center gap-8 pt-5">
                            <div class="text-gray-500">
                                {!! $question->type->text() !!}
                            </div>
                        </div>
                        <div class="flex flex-wrap pt-5 items-center ">
                            <a class="mr-3 text-sm font-medium uppercase text-cyan-500 hover:text-cyan-600 dark:hover:text-cyan-400"
                               href="{{route('surveys.questions.edit', [$survey, $question])}}">edycja</a>
                            <form
                                class="mr-3 text-sm font-medium text-cyan-500 hover:text-cyan-600 dark:hover:text-cyan-400"
                                action="{{route('surveys.questions.delete', [$survey, $question])}}"
                                method="POST"
                            >
                                @csrf
                                @method('DELETE')
                                <button class="uppercase">usunięcie</button>
                            </form>
                            <a
                                class="mr-3 text-sm font-medium uppercase text-cyan-500 hover:text-cyan-600 dark:hover:text-cyan-400"
                                href="{{route('surveys.questions.options', [$survey, $question])}}">lista opcii</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </article>
</li>
