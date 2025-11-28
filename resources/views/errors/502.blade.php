<!DOCTYPE html>
<html>
<head>
    <title>502 - Bad Gateway</title>
    <style>
        /* Body flickering gradient */
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
            background: linear-gradient(120deg, #f5f5f5, #ffe6f0, #f5f5f5, #ffccd9);
            background-size: 400% 400%;
            animation: flickerBG 6s ease infinite;
        }

        @keyframes flickerBG {
            0% { background-position: 0% 50%; }
            25% { background-position: 100% 50%; }
            50% { background-position: 50% 100%; }
            75% { background-position: 100% 0%; }
            100% { background-position: 0% 50%; }
        }

        /* Error container shake effect */
        .error-container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            max-width: 600px;
            margin: 0 auto;
            box-shadow: 0 5px 15px rgba(233, 30, 99, 0.2);
            animation: shake 0.5s ease-in-out infinite alternate;
        }

        @keyframes shake {
            0% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            50% { transform: translateX(5px); }
            75% { transform: translateX(-5px); }
            100% { transform: translateX(5px); }
        }

        /* H1 glitch effect */
        h1 {
            color: #e91e63;
            margin: 0;
            font-size: 80px;
            position: relative;
            animation: glitch 1.5s infinite;
        }

        @keyframes glitch {
            0% { text-shadow: 2px 0 #ff4081, -2px 2px #f50057; }
            20% { text-shadow: -2px -2px #f50057, 2px 2px #ff4081; }
            40% { text-shadow: 2px -2px #ff4081, -2px 2px #f50057; }
            60% { text-shadow: -2px 2px #f50057, 2px -2px #ff4081; }
            80% { text-shadow: 2px 0 #ff4081, -2px 0 #f50057; }
            100% { text-shadow: 0 0 #e91e63; }
        }

        /* Type fade + jitter */
        .type {
            color: #666;
            font-size: 18px;
            margin-top: 15px;
            animation: typeJitter 1.2s ease forwards;
            opacity: 0;
        }

        @keyframes typeJitter {
            0% { transform: translateY(20px); opacity: 0; }
            50% { transform: translateY(-5px) rotate(-1deg); opacity: 1; }
            100% { transform: translateY(0) rotate(0deg); opacity: 1; }
        }

        /* Message fade + jitter */
        p {
            color: #333;
            margin: 10px 0;
            animation: messageJitter 1.5s ease forwards;
            opacity: 0;
        }

        @keyframes messageJitter {
            0% { transform: translateY(20px); opacity: 0; }
            50% { transform: translateY(-3px) rotate(0.5deg); opacity: 1; }
            100% { transform: translateY(0) rotate(0deg); opacity: 1; }
        }

        /* Try Again button pulse */
        .try-again {
            display: inline-block;
            margin-top: 25px;
            padding: 12px 25px;
            font-size: 16px;
            color: white;
            background-color: #e91e63;
            border-radius: 5px;
            text-decoration: none;
            animation: pulseButton 2s infinite;
            transition: transform 0.3s;
        }

        .try-again:hover {
            transform: scale(1.1);
            background-color: #c2185b;
        }

        @keyframes pulseButton {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

    </style>
</head>
<body>
    <div class="error-container">
        <h1>502</h1>
        <p class="type">{{ $type ?? 'Bad Gateway' }}</p>
        <p>{{ $message ?? 'The server received an invalid response. Please try again.' }}</p>
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
