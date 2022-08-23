<?php

namespace App\Repository\Eloquent;

use App\Repository\QuestionRepositoryInterface;
use App\Models\Question;

class QuestionRepository extends BaseRepository implements QuestionRepositoryInterface
{
    public function __construct(Question $model)
    {
        $this->model = $model;
    }
}
