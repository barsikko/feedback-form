<?php

namespace App\Services\Feedback\FeedbackFactory;

interface FeedbackSaver
{
        public function save(string $name, string $content, string $email);
}
