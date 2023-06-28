<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OptionResource;
use App\Http\Resources\QuestionResource;
use App\Http\Resources\SurveyResource;
use App\Models\Question;
use App\Models\Survey;

class SurveyController extends Controller
{
    private function verifySurveyStatus(Survey $survey)
    {
        if ($survey->isNotReady) {
            abort(404);
        }
    }

    public function showSurvey(Survey $survey)
    {
        $this->verifySurveyStatus($survey);

        return response()->json(new SurveyResource($survey));
    }

    public function showQuestions(Survey $survey)
    {
        $this->verifySurveyStatus($survey);

        return response()->json(QuestionResource::collection($survey->questions));
    }

    public function showOptions(Survey $survey, Question $question)
    {
        $this->verifySurveyStatus($survey);

        return response()->json(OptionResource::collection($question->options));
    }
}
