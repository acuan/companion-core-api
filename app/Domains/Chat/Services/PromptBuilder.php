<?php

namespace App\Domains\Chat\Services;

class PromptBuilder
{
    public function build(
        array $context,
        string $question
    ): string {

        return "
        Current Content:

        ".json_encode($context)."

        User Question:

        {$question}

        Answer briefly and clearly.
        ";
    }
}