<?php

namespace App\Http\Controllers;

class QuizController extends Controller
{
    public function show(string $slug)
    {
        $path = resource_path("quizzes/{$slug}.php");

        if (!file_exists($path)) {
            abort(404);
        }

        $quiz = require $path;

        return view('quiz', compact('quiz', 'slug'));
    }

    public function index()
    {
        $quizzes = [
            [
                'series'  => 'DevOps Fundamentals',
                'quizzes' => [
                    [
                        'title'       => 'Linux Basics',
                        'description' => 'Kernel, architecture, file system and history.',
                        'slug'        => 'linux-basics',
                        'available'   => true,
                    ],
                    [
                        'title'       => 'Linux in Practice',
                        'description' => 'SSH, permissions, users and package management.',
                        'slug'        => 'linux-in-practice',
                        'available'   => true,
                    ],
                    [
                        'title'       => 'Linux Power Tools',
                        'description' => 'grep, awk, sed, find and process management.',
                        'slug'        => 'linux-power-tools',
                        'available'   => false,
                    ],
                ],
            ],
        ];

        return view('index', compact('quizzes'));
    }
}
