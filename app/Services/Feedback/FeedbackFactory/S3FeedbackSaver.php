<?php

namespace App\Services\Feedback\FeedbackFactory;

use App\Http\Resources\FeedbackResource;
use App\Models\Feedback;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class S3FeedbackSaver implements FeedbackSaver
{
    public function save(string $name, string $content, string $email): JsonResource
    {

        $feedback = Feedback::make([
            'name' => $name,
            'content' => $content,
            'email' => $email,
        ]);

        $feedback = FeedbackResource::make($feedback);
        Storage::disk('s3')->append('feedbacks.txt', $feedback->toJson() . ',');

        return $feedback;

    }
}
