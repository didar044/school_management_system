<!DOCTYPE html>
<html>

<head>
    <title>405 - Method Not Allowed</title>
    <style>
        /* Body Rotating Stripe Background */
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
            background: repeating-linear-gradient(45deg,
                    #f5f5f5,
                    #f5f5f5 10px,
                    #ffe6e6 10px,
                    #ffe6e6 20px);
            animation: rotateBG 10s linear infinite;
        }

        @keyframes rotateBG {
            0% {
                background-position: 0 0;
            }

            100% {
                background-position: 200px 200px;
            }
        }

        /* Error Container Zoom + Rotate */
        .error-container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            max-width: 600px;
            margin: 0 auto;
            box-shadow: 0 5px 15px rgba(244, 67, 54, 0.2);
            animation: zoomRotate 1s ease forwards;
        }

        @keyframes zoomRotate {
            0% {
                transform: scale(0.8) rotate(-5deg);
                opacity: 0;
            }

            100% {
                transform: scale(1) rotate(0deg);
                opacity: 1;
            }
        }

        /* H1 Wobble */
        h1 {
            color: #f44336;
            margin: 0;
            font-size: 80px;
            animation: wobble 2s ease-in-out infinite;
        }

        @keyframes wobble {

            0%,
            100% {
                transform: rotate(0deg);
            }

            25% {
                transform: rotate(5deg);
            }

            50% {
                transform: rotate(-5deg);
            }

            75% {
                transform: rotate(3deg);
            }
        }

        /* Type Bounce-in */
        .type {
            color: #666;
            font-size: 18px;
            margin-top: 15px;
            animation: bounceIn 1s ease forwards;
            opacity: 0;
        }

        @keyframes bounceIn {
            0% {
                transform: translateY(-50px);
                opacity: 0;
            }

            60% {
                transform: translateY(10px);
                opacity: 1;
            }

            80% {
                transform: translateY(-5px);
            }

            100% {
                transform: translateY(0);
            }
        }

        /* Message Fade Up */
        p {
            color: #333;
            margin: 10px 0;
            animation: fadeUp 1.2s ease forwards;
            opacity: 0;
        }

        @keyframes fadeUp {
            0% {
                transform: translateY(20px);
                opacity: 0;
            }

            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        /* Try Again Button Slide-in from bottom */
        .try-again {
            display: inline-block;
            margin-top: 25px;
            padding: 12px 25px;
            font-size: 16px;
            color: white;
            background-color: #f44336;
            border-radius: 5px;
            text-decoration: none;
            animation: slideUpButton 1.5s ease forwards;
            opacity: 0;
            transition: transform 0.3s;
        }

        .try-again:hover {
            transform: scale(1.05);
            background-color: #d32f2f;
        }

        @keyframes slideUpButton {
            0% {
                transform: translateY(50px);
                opacity: 0;
            }

            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
</head>

<body>
    <div class="error-container">
        <h1>405</h1>
        <p class="type">{{ $type ?? 'Method Not Allowed' }}</p>
        <p>{{ $message ?? 'This method is not allowed. Please try again.' }}</p>
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