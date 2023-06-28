<?php

namespace App\Http\Controllers;

use App\Enums\QuestionType;
use App\Http\Requests\QuestionRequest;
use App\Models\Question;
use App\Models\Survey;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class QuestionController extends Controller
{
    public function index(Survey $survey): View
    {
        return view('questions.index', compact('survey'));
    }

    public function create(Survey $survey): View
    {
        $types = QuestionType::cases();
        return view('questions.forms.create', compact('survey', 'types'));
    }

    public function store(Survey $survey, QuestionRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $question = $survey->questions()->create($validated);

        return redirect(route('surveys.questions.options', compact('survey', 'question')));
    }

    public function edit(Survey $survey, Question $question): View
    {
        $types = QuestionType::cases();
        return view('questions.forms.edit', compact('survey', 'question', 'types'));
    }

    public function update(Survey $survey, Question $question, QuestionRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $question->fill($validated);
        $question->save();

        return redirect(route('surveys.questions.options', compact('survey', 'question')));
    }

    public function destroy(Survey $survey, Question $question): RedirectResponse
    {
        $question->delete();

        return back()->with('status', 'Pytanie zostało usunięte.');
    }
}
