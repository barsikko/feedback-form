<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackRequest;
use App\Http\Resources\FeedbackResource;
use App\Models\Feedback;
use App\Services\Feedback\FeedbackService;
use Illuminate\Support\Facades\Storage;

class FeedbacksController extends Controller
{
    private FeedbackService $feedbackService;

    public function __construct(FeedbackService $feedbackService)
    {
        $this->feedbackService = $feedbackService;
    }

    public function __invoke(FeedbackRequest $request)
    {
        try {
            return $this->feedbackService->handle(
                $request->name,
                $request->email,
                $request->content,
                $request->database
            );
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json('error happened, contact admin please', 500);
        }
    }
}
