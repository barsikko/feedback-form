<?php

namespace App\Services\Feedback;

use App\Services\Feedback\FeedbackFactory\DatabaseFeedbackSaver;
use App\Services\Feedback\FeedbackFactory\FeedbackSaver;
use App\Services\Feedback\FeedbackFactory\S3FeedbackSaver;
use Illuminate\Http\Resources\Json\JsonResource;

class FeedbackService
{
    public function handle(string $name, string $email, string $content, string $database): ?JsonResource
    {
        if ($database === 's3')
            $feedbackSaver = $this->chooseSaver(new S3FeedbackSaver());

        if ($database === 'default')
            $feedbackSaver = $this->chooseSaver(new DatabaseFeedbackSaver());

        return isset($feedbackSaver) ? $feedbackSaver->save($name, $email, $content) : null;
    }

    private function chooseSaver(FeedbackSaver $feedbackSaver): FeedbackSaver
    {
        return $feedbackSaver;
    }
}
