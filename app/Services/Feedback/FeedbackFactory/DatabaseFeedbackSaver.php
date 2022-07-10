<?php

namespace App\Services\Feedback\FeedbackFactory;

use App\Http\Resources\FeedbackResource;
use App\Models\Feedback;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class DatabaseFeedbackSaver implements FeedbackSaver
{
    public function save(string $name, string $content, string $email): JsonResource
    {
        $feedback = Feedback::create([
            'name' => $name,
            'content' => $content,
            'email' => $email,
        ]);

        $feedback = FeedbackResource::make($feedback);

        Storage::disk('feedback')->append('feedbacks.txt', $feedback->toJson() . ',');

        return $feedback;
    }
}
