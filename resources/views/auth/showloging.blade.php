<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			font-family: 'Poppins', sans-serif;
		}

		body {
			display: flex;
			justify-content: center;
			align-items: center;
			min-height: 100vh;
			flex-direction: column;
			/* background: #23242a; */

			background: url('./image/3.jpg') no-repeat center center fixed;
			background-size: cover;
		}

		.box {
			position: relative;
			width: 380px;
			height: 500px;
			background: #1c1c1c;
			border-radius: 8px;
			overflow: hidden;
		}

		.box::before {
			content: '';
			z-index: 1;
			position: absolute;
			top: -50%;
			left: -50%;
			width: 380px;
			height: 420px;
			transform-origin: bottom right;
			background: linear-gradient(0deg, transparent, #45f3ff, #45f3ff);
			animation: animate 6s linear infinite;
		}

		.box::after {
			content: '';
			z-index: 1;
			position: absolute;
			top: -50%;
			left: -50%;
			width: 380px;
			height: 420px;
			transform-origin: bottom right;
			background: linear-gradient(0deg, transparent, #45f3ff, #45f3ff);
			animation: animate 6s linear infinite;
			animation-delay: -3s;
		}

		@keyframes animate {
			0% {
				transform: rotate(0deg);
			}

			100% {
				transform: rotate(360deg);
			}
		}

		form {
			position: absolute;
			inset: 2px;
			background: #28292d;
			padding: 50px 40px;
			border-radius: 8px;
			z-index: 2;
			display: flex;
			flex-direction: column;
		}

		h2 {
			color: #45f3ff;
			font-weight: 500;
			text-align: center;
			letter-spacing: 0.1em;
		}

		.inputBox {
			position: relative;
			width: 300px;
			margin-top: 35px;
		}

		.inputBox input {
			position: relative;
			width: 100%;
			padding: 20px 10px 10px;
			background: transparent;
			outline: none;
			box-shadow: none;
			border: none;
			color: #23242a;
			font-size: 1em;
			letter-spacing: 0.05em;
			transition: 0.5s;
			z-index: 10;
		}

		.inputBox span {
			position: absolute;
			left: 0;
			padding: 20px 0px 10px;
			pointer-events: none;
			font-size: 1em;
			color: #8f8f8f;
			letter-spacing: 0.05em;
			transition: 0.5s;
		}

		.inputBox input:valid~span,
		.inputBox input:focus~span {
			color: #45f3ff;
			transform: translateX(0px) translateY(-34px);
			font-size: 0.75em;
		}

		.inputBox i {
			position: absolute;
			left: 0;
			bottom: 0;
			width: 100%;
			height: 2px;
			background: #45f3ff;
			border-radius: 4px;
			overflow: hidden;
			transition: 0.5s;
			pointer-events: none;
			z-index: 9;
		}

		.inputBox input:valid~i,
		.inputBox input:focus~i {
			height: 44px;
		}

		.links {
			display: flex;
			justify-content: space-between;
		}

		.links a {
			margin: 10px 0;
			font-size: 0.75em;
			color: #8f8f8f;
			text-decoration: beige;
		}

		.links a:hover,
		.links a:nth-child(2) {
			color: #45f3ff;
		}

		input[type="submit"] {
			border: none;
			outline: none;
			padding: 11px 25px;
			background: #45f3ff;
			cursor: pointer;
			border-radius: 4px;
			font-weight: 600;
			width: 100px;
			margin-top: 10px;
		}

		input[type="submit"]:active {
			opacity: 0.8;
		}

		.social-login {
			margin-top: 20px;
			width: 100%;
			text-align: center;
		}

		.social-login p {
			color: #ccc;
			margin-bottom: 10px;
		}

		.social-buttons {
			display: flex;
			justify-content: space-between;
			gap: 10px;
		}

		.social-buttons a {
			flex: 1;
			padding: 10px;
			border-radius: 5px;
			text-decoration: none;
			color: #fff;
			font-weight: 600;
			font-size: 14px;
			transition: 0.3s;
		}

		.github {
			background: #333;
			display: inline-flex;
			align-items: center;
			justify-content: center;
			gap: 10px;
			background: linear-gradient(90deg, #333 50%, #1c1c1c 50%);
			background-size: 200% 100%;
			/* double width for sliding effect */
			background-position: left center;
			transition: background-position 0.7s;
		}

		.github:hover {
			background: #1c1c1c;
			background-position: right center;
			
		}

		.github svg {
			transition: transform .7s;

		}

		.github:hover svg {
			transform: rotate(360deg);

		}

		.google {
			background: #db4437;
		}

		.google:hover {
			background: #e85b4f;
		}

		.facebook {
			background: #3b5998;
		}

		.facebook:hover {
			background: #4a69ad;
		}
	</style>
</head>

<body>
	</head>

	<body>
		<div class="box">
			<form action="{{url('/login') }}" method="POST">
				@csrf
				<h2>Sign in</h2>
				<div class="inputBox">
					<input type="text" name="email" required="required" value="info@fatehabad.com">
					<span>Userame</span>
					<i></i>
				</div>
				<div class="inputBox">
					<input type="password" name="password" required="required" value="111111">
					<span>Password</span>
					<i></i>
				</div>
				<div class="links">
					<a href="#">Forgot Password ?</a>
					<a href="{{url('/showregister') }}">Register </a>
				</div>
				<input type="submit" value="Login">
				<!-- <div class="social-login">
					<p>Or sign in with</p>
					<div class="social-buttons">
						<a href="/auth/github/redirect" class="github">GitHub</a>

					</div>
				</div> -->
				<div class="social-login">
					<p>Or sign in with</p>
					<div class="social-buttons">
						<a href="{{ url('/auth/github/redirect') }}" class="github" style=" ">
							<svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
								<path
									d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
							</svg>
							<span>GitHub</span>

						</a>
					</div>
				</div>
				<!-- <a  class="google">Google</a>
			           <a  href="/auth/facebook/redirect" class="facebook">Facebook</a> -->

			</form>
		</div>
	</body>

</html>
</body>

</html>