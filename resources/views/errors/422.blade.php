<!DOCTYPE html>
<html>

<head>
    <title>422 - Validation Error</title>
    <style>
        /* Body animated gradient */
        body {
            font-family: Arial, sans-serif;
            padding: 50px;
            background: linear-gradient(-45deg, #f5f5f5, #e1bee7, #f5f5f5, #ce93d8);
            background-size: 400% 400%;
            animation: gradientBG 12s ease infinite;
        }

        @keyframes gradientBG {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        /* Error container rotating card */
        .error-container {
            background: white;
            padding: 40px;
            border-radius: 15px;
            max-width: 600px;
            margin: 0 auto;
            box-shadow: 0 8px 20px rgba(156, 39, 176, 0.3);
            animation: rotateCard 1s ease forwards;
            transform-origin: center;
        }

        @keyframes rotateCard {
            0% {
                transform: rotateY(-90deg) scale(0.8);
                opacity: 0;
            }

            100% {
                transform: rotateY(0deg) scale(1);
                opacity: 1;
            }
        }

        /* H1 floating glow */
        h1 {
            color: #9c27b0;
            margin: 0;
            font-size: 80px;
            animation: floatGlow 2s ease-in-out infinite alternate;
        }

        @keyframes floatGlow {
            0% {
                text-shadow: 0 0 5px #d500f9;
                transform: translateY(0);
            }

            50% {
                text-shadow: 0 0 20px #e040fb;
                transform: translateY(-10px);
            }

            100% {
                text-shadow: 0 0 5px #d500f9;
                transform: translateY(0);
            }
        }

        /* Type text slide from bottom + rotate */
        .type {
            color: #666;
            font-size: 18px;
            margin-top: 15px;
            opacity: 0;
            animation: typeSlide 1.2s ease forwards;
        }

        @keyframes typeSlide {
            0% {
                transform: translateY(50px) rotate(-10deg);
                opacity: 0;
            }

            100% {
                transform: translateY(0) rotate(0deg);
                opacity: 1;
            }
        }

        /* Message zoom + fade */
        p {
            color: #333;
            margin: 10px 0;
            opacity: 0;
            animation: messageZoom 1.5s ease forwards;
        }

        @keyframes messageZoom {
            0% {
                transform: scale(0.8);
                opacity: 0;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        /* Validation errors list staggered fade-in */
        ul {
            text-align: left;
            color: #d32f2f;
            list-style-type: disc;
            margin-left: 20px;
        }

        ul li {
            opacity: 0;
            animation: fadeList 0.8s ease forwards;
        }

        @keyframes fadeList {
            0% {
                transform: translateX(-30px);
                opacity: 0;
            }

            100% {
                transform: translateX(0);
                opacity: 1;
            }
        }

        /* Staggered animation delay for list items */
        ul li:nth-child(1) {
            animation-delay: 0.3s;
        }

        ul li:nth-child(2) {
            animation-delay: 0.6s;
        }

        ul li:nth-child(3) {
            animation-delay: 0.9s;
        }

        ul li:nth-child(4) {
            animation-delay: 1.2s;
        }

        ul li:nth-child(5) {
            animation-delay: 1.5s;
        }

        /* Try Again button floating bounce */
        .try-again {
            display: inline-block;
            margin-top: 25px;
            padding: 12px 25px;
            font-size: 16px;
            color: white;
            background-color: #9c27b0;
            border-radius: 5px;
            text-decoration: none;
            animation: bounceButton 2s infinite;
            transition: transform 0.3s;
        }

        .try-again:hover {
            transform: scale(1.1);
            background-color: #7b1fa2;
        }

        @keyframes bounceButton {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }
    </style>
</head>

<body>
    <div class="error-container">
        <h1>422</h1>
        <p class="type">{{ $type ?? 'Validation Error' }}</p>
        <p>{{ $message ?? 'Please correct the following errors:' }}</p>
        @if(isset($errors) && count($errors))
            <ul>
                @foreach($errors as $key => $messages)
                    @foreach($messages as $msg)
                        <li>{{ $key }}: {{ $msg }}</li>
                    @endforeach
                @endforeach
            </ul>
        @endif
        @php
            $prev = url()->previous();
            $current = url()->current();
            $fallback = url('/');
            $backUrl = ($prev && $prev !== $current) ? $prev : $fallback;
        @endphp

        <a href="{{ $backUrl }}" class="try-again">Try Again</a>
    </div>
</body>

</html>