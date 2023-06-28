<?php

namespace App\Http\Controllers;

use App\Http\Requests\OptionRequest;
use App\Models\Option;
use App\Models\Question;
use App\Models\Survey;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class OptionController extends Controller
{
    public function index(Survey $survey, Question $question): View
    {
        return view('options.index', compact('question'));
    }

    public function create(Survey $survey, Question $question): View
    {
        return view('options.forms.create', compact('question'));
    }

    public function store(Survey $survey, Question $question, OptionRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $question->options()->create($validated);


        return redirect(route('surveys.questions.options', compact('survey', 'question')));
    }

    public function edit(Survey $survey, Question $question, Option $option): View
    {
        return view('options.forms.edit', compact('question', 'option'));
    }

    public function update(Survey $survey, Question $question, Option $option, OptionRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $option->fill($validated);
        $option->save();

        return redirect(route('surveys.questions.options', compact('survey', 'question')));
    }

    public function destroy(Survey $survey, Question $question, Option $option): RedirectResponse
    {
        $option->delete();

        return back()->with('status', 'Opcja została usunięta.');
    }
}
