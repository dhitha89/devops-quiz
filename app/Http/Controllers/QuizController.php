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
                    'question'    => 'What percentage of servers run Linux?',
                    'options'     => ['60%', '75%', '88%', '96%'],
                    'correct'     => 3,
                    'explanation' => 'Around 96% of the world\'s servers run Linux, making it the dominant server OS.',
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
}
