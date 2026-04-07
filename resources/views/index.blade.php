@extends('layouts.app')

@section('title', 'DevOps Quiz Hub')

@section('content')

    <button class="theme-toggle" onclick="toggleTheme()">
        <span id="theme-icon">🌙</span>
        <span id="theme-label">Dark</span>
    </button>

    <div class="quiz-wrap" style="max-width: 1080px;">

        <div class="quiz-header">
            <div class="quiz-icon">📚</div>
            <div>
                <h1>DevOps Quiz Hub</h1>
                <p>Test your knowledge — one post at a time</p>
            </div>
        </div>

        @foreach($quizzes as $section)
            <div style="margin-bottom: 2rem;">

                <div style="font-size: 12px; font-weight: 700; color: var(--green); text-transform: uppercase; letter-spacing: 0.08em; margin-bottom: 1rem; padding-bottom: 8px; border-bottom: 1px solid var(--border);">
                    {{ $section['series'] }}
                </div>

                <div style="display: flex; flex-direction: column; gap: 10px;">
                    @foreach($section['quizzes'] as $quiz)
                        <div style="background: var(--opt-bg); border: 2px solid var(--border); border-radius: 12px; padding: 1rem 1.25rem; display: flex; align-items: center; justify-content: space-between; gap: 1rem;">
                            <div>
                                <div style="font-size: 15px; font-weight: 600; color: var(--text); margin-bottom: 4px;">{{ $quiz['title'] }}</div>
                                <div style="font-size: 13px; color: var(--sub);">{{ $quiz['description'] }}</div>
                            </div>
                            @if($quiz['available'])
                                <a href="/{{ $quiz['slug'] }}" style="font-size: 12px; font-weight: 600; padding: 6px 16px; border-radius: 99px; background:linear-gradient(135deg, #8fffb8, #195a31); color: #fff; text-decoration: none; white-space: nowrap; box-shadow: 0 4px 12px rgba(74,222,128,0.3); transition: opacity 0.15s; flex-shrink: 0;">Take quiz →</a>
                            @else
                                <span style="font-size: 12px; font-weight: 500; padding: 6px 16px; border-radius: 99px; background: var(--label-bg); color: var(--sub); border: 1px solid var(--border); white-space: nowrap; flex-shrink: 0;">Coming soon</span>
                            @endif
                        </div>
                    @endforeach
                </div>

            </div>
        @endforeach

        <div style="text-align: center; margin-top: 2rem; padding-top: 1.5rem; border-top: 1px solid var(--border); font-size: 12px; color: var(--sub);">
            Part of <a href="https://devops-playbook.hashnode.dev" target="_blank" style="color: var(--green); text-decoration: none;">The DevOps Playbook</a> by @sharmilasait
        </div>

    </div>

@endsection
