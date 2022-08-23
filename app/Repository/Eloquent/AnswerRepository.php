<?php

namespace App\Repository\Eloquent;

use App\Models\Answer;
use App\Repository\AnswerRepositoryInterface;

class AnswerRepository extends BaseRepository implements AnswerRepositoryInterface
{
    public function __construct(Answer $model)
    {
        $this->model = $model;
    }
}
