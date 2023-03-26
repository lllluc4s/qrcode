<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;

class UniqueLinkedInOrGithub implements ValidationRule
{
    protected $linkedin;
    protected $github;

    public function __construct($linkedin, $github)
    {
        $this->linkedin = $linkedin;
        $this->github = $github;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($value == $this->linkedin && $value == $this->github) {
            $fail('LinkedIn and GitHub URLs must be different.');
        }

        $count = DB::table('qr_codes')
            ->where('linkedin', $this->linkedin)
            ->orWhere('github', $this->github)
            ->count();

        if ($count > 0) {
            $fail('LinkedIn and GitHub URLs must be different, and the URL should be unique.');
        }
    }
}
