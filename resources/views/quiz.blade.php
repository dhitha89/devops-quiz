@extends('layouts.app')

@section('title', $quiz['title'])

@section('content')
    <button class="theme-toggle" onclick="toggleTheme()">
        <span id="theme-icon">🌙</span>
        <span id="theme-label">Dark</span>
    </button>

    <div class="quiz-wrap">

        <div id="quiz-screen">
            <div class="quiz-header">
                <div class="quiz-icon">🐧</div>
                <div>
                    <h1>{{ $quiz['title'] }}</h1>
                    <p>{{ $quiz['subtitle'] }}</p>
                </div>
            </div>

            <div class="progress-wrap">
                <div class="progress-top">
                    <span>Progress</span>
                    <span class="q-count" id="progress-label">1 of {{ count($quiz['questions']) }}</span>
                </div>
                <div class="progress-bar-wrap">
                    <div class="progress-bar" id="progress-bar" style="width: 0%"></div>
                </div>
            </div>

            <div class="question-text" id="question-text"></div>
            <div class="options" id="options"></div>
            <div class="explanation" id="explanation"></div>
            <button class="next-btn" id="next-btn">Next Question →</button>
        </div>

        <div class="score-screen" id="score-screen">
            <div class="score-circle">
                <span class="score-num" id="score-num"></span>
                <span class="score-pct" id="score-pct"></span>
            </div>
            <h2 id="score-title"></h2>
            <p id="score-msg"></p>
            <div class="score-stats">
                <div class="stat">
                    <div class="stat-num" id="stat-correct"></div>
                    <div class="stat-lbl">Correct</div>
                </div>
                <div class="stat">
                    <div class="stat-num" id="stat-wrong"></div>
                    <div class="stat-lbl">Wrong</div>
                </div>
                <div class="stat">
                    <div class="stat-num" id="stat-total"></div>
                    <div class="stat-lbl">Total</div>
                </div>
            </div>
            <button class="try-again-btn" onclick="restart()">↩ Try Again</button>
        </div>

    </div>
@endsection

@push('scripts')
    <script>
        const questions = @json($quiz['questions']);
        const total     = questions.length;
        let current     = 0;
        let score       = 0;
        const labels    = ['A', 'B', 'C', 'D'];

        function loadQuestion() {
            const q   = questions[current];
            const pct = Math.round((current / total) * 100);

            document.getElementById('progress-bar').style.width  = pct + '%';
            document.getElementById('progress-label').textContent = `${current + 1} of ${total}`;
            document.getElementById('question-text').textContent  = q.question;
            document.getElementById('explanation').style.display  = 'none';
            document.getElementById('next-btn').style.display     = 'none';

            const optionsEl = document.getElementById('options');
            optionsEl.innerHTML = '';

            q.options.forEach((opt, i) => {
                const btn = document.createElement('button');
                btn.className = 'option';
                btn.innerHTML = `<span class="label">${labels[i]}</span> ${opt}`;
                btn.onclick   = () => answer(i);
                optionsEl.appendChild(btn);
            });
        }

        function answer(selected) {
            const q       = questions[current];
            const correct = q.correct;
            const buttons = document.querySelectorAll('.option');

            buttons.forEach((btn, i) => {
                btn.disabled = true;
                if (i === correct) btn.classList.add('correct');
                if (i === selected && selected !== correct) btn.classList.add('wrong');
            });

            if (selected === correct) score++;

            const expEl = document.getElementById('explanation');
            expEl.innerHTML     = `<strong>💡 Explanation:</strong> ${q.explanation}`;
            expEl.style.display = 'block';

            const nextBtn = document.getElementById('next-btn');
            nextBtn.textContent   = current + 1 === total ? '🎯 See Results' : 'Next Question →';
            nextBtn.style.display = 'block';
        }

        document.getElementById('next-btn').onclick = function () {
            current++;
            current < total ? loadQuestion() : showScore();
        };

        function showScore() {
            document.getElementById('quiz-screen').style.display  = 'none';
            document.getElementById('score-screen').style.display = 'block';

            const pct   = Math.round((score / total) * 100);
            const wrong = total - score;

            document.getElementById('score-num').textContent    = `${score}/${total}`;
            document.getElementById('score-pct').textContent    = `${pct}%`;
            document.getElementById('stat-correct').textContent = score;
            document.getElementById('stat-wrong').textContent   = wrong;
            document.getElementById('stat-total').textContent   = total;

            const messages = [
                { min: 100, title: '🎉 Perfect Score!',        msg: 'Outstanding! You know Linux Basics inside out.' },
                { min: 80,  title: '🚀 Great Job!',            msg: 'Solid understanding. Just a few gaps to fill.' },
                { min: 60,  title: '👍 Good Effort!',          msg: 'You\'re getting there. Review and try again.' },
                { min: 40,  title: '📚 Keep Learning!',        msg: 'Go back to the post and give it another shot.' },
                { min: 0,   title: '💪 Just Getting Started!', msg: 'Linux takes time. Read the post and retry.' },
            ];

            const result = messages.find(m => pct >= m.min);
            document.getElementById('score-title').textContent = result.title;
            document.getElementById('score-msg').textContent   = result.msg;
        }

        function restart() {
            current = 0;
            score   = 0;
            document.getElementById('quiz-screen').style.display  = 'block';
            document.getElementById('score-screen').style.display = 'none';
            loadQuestion();
        }

        loadQuestion();
    </script>
@endpush
