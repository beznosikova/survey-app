<?php

namespace App\Enums;

enum SurveyStatus: string
{
    case EDIT = 'edit';
    case TEST = 'test';
    case READY = 'ready';
}
