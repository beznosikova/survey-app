<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\RedirectResponse;
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
        dd('create');
        return view('surveys.index');
    }

    public function store(): View
    {
        dd('store');
        return view('surveys.index');
    }

    public function edit(Survey $survey): View
    {
        dd('edit', $survey);
        return view('surveys.index');
    }

    public function update(Survey $survey): View
    {
        dd('edit', $survey);
        return view('surveys.index');
    }

    public function destroy(Survey $survey): RedirectResponse
    {
        $survey->delete();

        return back()->with('status', 'Badanie zostało usunięte.');
    }
}
