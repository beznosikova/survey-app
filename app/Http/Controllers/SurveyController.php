<?php

namespace App\Http\Controllers;

use App\Enums\SurveyStatus;
use App\Http\Requests\SurveyCreateRequest;
use App\Http\Requests\SurveyUpdateRequest;
use App\Models\Survey;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SurveyController extends Controller
{
    public function index(): View
    {
        $surveys = Survey::all();

        return view('surveys.index', compact('surveys'));
    }

    public function create(): View
    {
        return view('surveys.forms.create');
    }

    public function store(SurveyCreateRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $survey = Survey::create($validated);

        return redirect(route('surveys.questions', compact('survey')));
    }

    public function edit(Survey $survey): View
    {
        $statuses = SurveyStatus::cases();

        return view('surveys.forms.edit', compact('survey', 'statuses'));
    }

    public function update(Survey $survey, SurveyUpdateRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        if ($survey->questions->isEmpty() && $request->status === SurveyStatus::READY->value) {
            return back()->withInput()->withErrors(
                ['status' => 'Statusu “Gotowe” nie można ustawić, badanie nie zawiera pytań']
            );
        }

        $survey->fill($validated);
        $survey->save();

        return redirect(route('surveys.questions', compact('survey')));
    }

    public function destroy(Survey $survey): RedirectResponse
    {
        $survey->delete();

        return back()->with('status', 'Badanie zostało usunięte.');
    }

    public function show(Survey $survey): View
    {
        if ($survey->in_edition) {
            abort(404);
        }

        return view('surveys.show', compact('survey'));
    }

    public function test(Survey $survey, Request $request): RedirectResponse
    {
        /* TODO: check result */

        return redirect(route('surveys.index'));
    }
}
