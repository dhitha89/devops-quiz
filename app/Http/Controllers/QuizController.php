<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuizController extends Controller
{
    private array $quizzes = [
        'linux-basics' => [
            'title'    => 'Linux Basics Quiz',
            'subtitle' => 'Test your knowledge from the post',
            'questions' => [
                [
                    'question'    => 'Who created the Linux kernel?',
                    'options'     => ['Bill Gates', 'Linus Torvalds', 'Richard Stallman', 'Dennis Ritchie'],
                    'correct'     => 1,
                    'explanation' => 'Linus Torvalds created the Linux kernel in 1991 as a personal project.',
                ],
                [
                    'question'    => 'What is the kernel?',
                    'options'     => ['A text editor', 'A type of shell', 'The core of the OS that talks to hardware', 'A package manager'],
                    'correct'     => 2,
                    'explanation' => 'The kernel is the core component that manages communication between software and hardware.',
                ],
                [
                    'question'    => 'What does / represent in Linux?',
                    'options'     => ['The home directory', 'The root of the entire filesystem', 'The current directory', 'The trash folder'],
                    'correct'     => 1,
                    'explanation' => '/ is the root directory — the top of the entire Linux filesystem tree.',
                ],
                [
                    'question'    => 'Where do configuration files live in Linux?',
                    'options'     => ['/bin', '/var', '/etc', '/home'],
                    'correct'     => 2,
                    'explanation' => '/etc contains system-wide configuration files for the OS and installed software.',
                ],
                [
                    'question'    => 'Where do log files live in Linux?',
                    'options'     => ['/logs', '/etc/logs', '/home/logs', '/var/log'],
                    'correct'     => 3,
                    'explanation' => '/var/log is where the system and application log files are stored.',
                ],
                [
                    'question'    => 'Which directory contains basic commands like ls, cd and pwd?',
                    'options'     => ['/usr', '/opt', '/bin', '/sbin'],
                    'correct'     => 2,
                    'explanation' => '/bin contains essential user commands like ls, cd, pwd, cp and mv. These are the basic commands available to all users.',
                ],
                [
                    'question'    => 'Which layer sits between the Shell and the Hardware?',
                    'options'     => ['User Space', 'The Kernel', 'The Bootloader', 'The File System'],
                    'correct'     => 1,
                    'explanation' => 'The kernel sits between the shell (user space) and the hardware, managing resources.',
                ],
                [
                    'question'    => 'What is /tmp used for?',
                    'options'     => ['Permanent storage', 'Storing user files', 'Temporary files cleared on reboot', 'System binaries'],
                    'correct'     => 2,
                    'explanation' => '/tmp stores temporary files that are usually cleared when the system reboots.',
                ],
                [
                    'question'    => 'Which of these is NOT a Linux distribution?',
                    'options'     => ['Ubuntu', 'Fedora', 'macOS', 'Debian'],
                    'correct'     => 2,
                    'explanation' => 'macOS is based on BSD Unix, not Linux. Ubuntu, Fedora and Debian are all Linux distros.',
                ],
                [
                    'question'    => 'What is User Space?',
                    'options'     => ['The physical RAM on the machine', 'Where the kernel runs its core processes', 'The environment where normal applications run', 'The /home directory'],
                    'correct'     => 2,
                    'explanation' => 'User space is where normal applications and user processes run, separate from the kernel.',
                ],
            ],
        ],
    ];

    public function show(string $slug)
    {
        if (!isset($this->quizzes[$slug])) {
            abort(404);
        }

        $quiz = $this->quizzes[$slug];

        return view('quiz', compact('quiz', 'slug'));
    }

    // QuizController - add index method
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
                        'available'   => false,
                    ],
                    [
                        'title'       => 'Linux Power Tools',
                        'description' => 'grep, awk, sed, find and process management.',
                        'slug'        => 'linux-power-tools',
                        'available'   => false,
                    ],
                ],
            ]

        ];

        return view('index', compact('quizzes'));
    }
}
