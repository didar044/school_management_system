<!DOCTYPE html>
<html>

<head>
    <title>500 - Server Error</title>
    <style>
        /* Body Gradient Background Animation */
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
            background: linear-gradient(-45deg, #f5f5f5, #ffcccc, #f5f5f5, #ffe6e6);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite, fadeInBody 1s ease-in;
        }

        @keyframes gradientBG {
            0% {
                background-position: 0% 50%
            }

            50% {
                background-position: 100% 50%
            }

            100% {
                background-position: 0% 50%
            }
        }

        @keyframes fadeInBody {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        /* Error Container Slide and Glow */
        .error-container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            max-width: 600px;
            margin: 0 auto;
            box-shadow: 0 0 10px rgba(211, 47, 47, 0.2);
            animation: slideUp 0.8s ease-out, glow 2s ease-in-out infinite alternate;
        }

        @keyframes slideUp {
            0% {
                transform: translateY(50px);
                opacity: 0;
            }

            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes glow {
            0% {
                box-shadow: 0 0 10px rgba(211, 47, 47, 0.2);
            }

            100% {
                box-shadow: 0 0 25px rgba(211, 47, 47, 0.5);
            }
        }

        /* H1 Bounce + Pulse */
        h1 {
            color: #d32f2f;
            margin: 0;
            font-size: 80px;
            animation: bounce 1s ease infinite, pulse 2s infinite;
        }

        @keyframes bounce {

            0%,
            20%,
            50%,
            80%,
            100% {
                transform: translateY(0);
            }

            40% {
                transform: translateY(-20px);
            }

            60% {
                transform: translateY(-10px);
            }
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.1);
            }

            100% {
                transform: scale(1);
            }
        }

        /* Type & Message Slide-in */
        .type {
            color: #666;
            font-size: 18px;
            margin-top: 15px;
            animation: slideFromLeft 1.2s ease forwards;
            opacity: 0;
        }

        p {
            color: #333;
            margin: 10px 0;
            animation: slideFromRight 1.5s ease forwards;
            opacity: 0;
        }

        @keyframes slideFromLeft {
            0% {
                transform: translateX(-50px);
                opacity: 0;
            }

            100% {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes slideFromRight {
            0% {
                transform: translateX(50px);
                opacity: 0;
            }

            100% {
                transform: translateX(0);
                opacity: 1;
            }
        }

        /* Try Again Button */
        .try-again {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 25px;
            font-size: 16px;
            color: white;
            background-color: #d32f2f;
            border-radius: 5px;
            text-decoration: none;
            transition: all 0.3s ease;
            animation: fadeInText 2s ease forwards;
            opacity: 0;
        }

        .try-again:hover {
            background-color: #b71c1c;
            transform: scale(1.05);
        }

        @keyframes fadeInText {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }
    </style>
</head>

<body>
    <div class="error-container">
        <h1>500</h1>
        <p class="type">{{ $type ?? 'Server Error' }}</p>
        <p>{{ $message ?? 'Something went wrong. Please try again.' }}</p>
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