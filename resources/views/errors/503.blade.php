<!DOCTYPE html>
<html>
    <head>
        <title>503 - Service Unavailable</title>
        <style>
            /* Body pulsing stripes background */
            body {
                font-family: Arial, sans-serif;
                text-align: center;
                padding: 50px;
                background: repeating-linear-gradient(
                    45deg,
                    #f5f5f5,
                    #f5f5f5 15px,
                    #ffe0b2 15px,
                    #ffe0b2 30px
                );
                background-size: 400% 400%;
                animation: pulseBG 8s ease infinite;
            }

            @keyframes pulseBG {
                0% {
                    background-position: 0 0;
                }
                50% {
                    background-position: 200px 200px;
                }
                100% {
                    background-position: 0 0;
                }
            }

            /* Error container bounce + shadow pulse */
            .error-container {
                background: white;
                padding: 40px;
                border-radius: 10px;
                max-width: 600px;
                margin: 0 auto;
                box-shadow: 0 5px 15px rgba(255, 111, 0, 0.3);
                animation: containerBounce 1s ease forwards,
                    shadowPulse 2s infinite alternate;
            }

            @keyframes containerBounce {
                0% {
                    transform: scale(0.8);
                    opacity: 0;
                }
                50% {
                    transform: scale(1.05);
                    opacity: 1;
                }
                100% {
                    transform: scale(1);
                }
            }

            @keyframes shadowPulse {
                0% {
                    box-shadow: 0 5px 15px rgba(255, 111, 0, 0.3);
                }
                100% {
                    box-shadow: 0 10px 30px rgba(255, 111, 0, 0.6);
                }
            }

            /* H1 float + color pulse */
            h1 {
                color: #ff6f00;
                margin: 0;
                font-size: 80px;
                animation: floatColor 2s ease-in-out infinite alternate;
            }

            @keyframes floatColor {
                0% {
                    color: #ff6f00;
                    transform: translateY(0);
                }
                50% {
                    color: #ffa000;
                    transform: translateY(-10px);
                }
                100% {
                    color: #ff6f00;
                    transform: translateY(0);
                }
            }

            /* Type slide-in from left */
            .type {
                color: #666;
                font-size: 18px;
                margin-top: 15px;
                opacity: 0;
                animation: slideFromLeft 1.2s ease forwards;
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

            /* Try Again button swing */
            .try-again {
                display: inline-block;
                margin-top: 25px;
                padding: 12px 25px;
                font-size: 16px;
                color: white;
                background-color: #ff6f00;
                border-radius: 5px;
                text-decoration: none;
                animation: swing 2s infinite;
                transition: transform 0.3s;
            }

            .try-again:hover {
                transform: scale(1.1);
                background-color: #e65100;
            }

            @keyframes swing {
                0% {
                    transform: rotate(0deg);
                }
                25% {
                    transform: rotate(3deg);
                }
                50% {
                    transform: rotate(0deg);
                }
                75% {
                    transform: rotate(-3deg);
                }
                100% {
                    transform: rotate(0deg);
                }
            }
        </style>
    </head>
    <body>
        <div class="error-container">
            <h1>503</h1>
            <p class="type">{{ $type ?? 'Service Unavailable' }}</p>
            <p>
                {{ $message ?? 'The server is temporarily unavailable. Please
                try again later.' }}
            </p>
            @php $prev = url()->previous(); $current = url()->current();
            $fallback = url('/'); $backUrl = ($prev && $prev !== $current) ?
            $prev : $fallback; @endphp

            <a href="{{ $backUrl }}" class="try-again">Try Again</a>
        </div>
    </body>
</html>
