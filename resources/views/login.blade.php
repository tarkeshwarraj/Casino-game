
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css">
    <style>
         * {
            font-family: "Roboto", sans-serif;
        }

        body {
            user-select: none;
            overflow-y: hidden;
            display: flex;
            justify-content: center; /* Center content horizontally */
            align-items: center; /* Center content vertically */
            background: hsl(218deg 50% 91%);
            height: 100vh;
            margin: 0; /* Remove default margin */
        }

        .logo {
            width: 200px;
            height: 200px;
            display: block; /* Ensures block-level display for centering */
            margin: 0 auto; /* Centers the SVG horizontally */
        }

        .screen-1 {
            background: hsl(213deg 85% 97%);
            padding: 1em 2em 2em 2em;
            display: flex;
            flex-direction: column;
            align-items: center; /* Center content vertically */
            border-radius: 30px;
            box-shadow: 0 0 2em hsl(231deg 62% 94%);
            gap: 1em;
            max-width: 500px; /* Limit width to maintain design integrity */
            width: 80%;
        }

        .screen-1 .email {
            background: hsl(0deg 0% 100%);
            box-shadow: 0 0 2em hsl(231deg 62% 94%);
            padding: 0.5em;
            margin: 0.5em;
            display: flex;
            flex-direction: column;
            gap: 1em; /* Adjust the gap between email and password sections */
            border-radius: 20px;
            color: hsl(0deg 0% 30%);
            width: 80%; /* Make the email input field full width */
            max-width: 400px; /* Limit maximum width */
        }

        .screen-1 .email input {
            outline: none;
            border: none;
        }

        .screen-1 .email input::placeholder {
            color: hsl(0deg 0% 0%);
            font-size: 0.9em;
        }

        .screen-1 .password {
            background: hsl(0deg 0% 100%);
            box-shadow: 0 0 2em hsl(231deg 62% 94%);
            padding: 0.5em;
            margin: 0.5em;
            display: flex;
            flex-direction: column;
            gap: 0.5em; /* Adjust the gap between email and password sections */
            border-radius: 20px;
            color: hsl(0deg 0% 30%);
            width: 80%; /* Make the password input field full width */
            max-width: 400px; /* Limit maximum width */
        }

        .screen-1 .password input {
            outline: none;
            border: none;
        }

        .screen-1 .password input::placeholder {
            color: hsl(0deg 0% 0%);
            font-size: 0.9em;
        }

        .screen-1 ion-icon {
            color: hsl(0deg 0% 30%);
            margin-bottom: -0.2em;
        }

        .screen-1 .password .show-hide {
            margin-right: -5em;
        }

        .screen-1 .login {
            padding: 1em;
            background: linear-gradient(-5deg, #79b52c, #94d63d);
            color: hsl(0 0 100);
            border: none;
            border-radius: 30px;
            font-weight: 600;
            width: 50%; /* Full width button */
            max-width: 400px; /* Limit maximum width */
        }

        .screen-1 .footer {
            display: flex;
            justify-content: space-between; /* Equal space between elements */
            font-size: 0.7em;
            color: hsl(0deg 0% 37%);
            padding-bottom: 0.5em;
            width: 100%; /* Full width */
        }

        .screen-1 .footer span {
            cursor: pointer;
        }

        button {
            cursor: pointer;
        }

        .social-buttons {
            display: flex;
            justify-content: center;
            gap: 0px 10px 10px 10px;
            margin-top: 0.5em;
            width: 100%; /* Full width */
        }

        .btn-facebook {
            background-color: #3b5897;
            display: inline-block;
            padding: 0.5em 1em;
            color: white;
            border: 1px solid #ccc;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            text-decoration: none; /* Remove default link styling */
        }

        .btn-google {
            background-color: #de4e3b;
            display: inline-block;
            padding: 0.5em 1em;
            color: white;
            border: 1px solid #ccc;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            text-decoration: none; /* Remove default link styling */
        }

        .btn-google:hover,
        .btn-facebook:hover {
            background-color: #f1f1f1; /* Adjust hover state */
        }

        a {
            text-decoration: none; /* Remove default link underline */
        }

        form{
            width: 100%;
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            margin: 1em;

        }
    </style>
</head>
<body>
    
    <div class="screen-1">
        <svg class="logo" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="100" height="100" viewBox="0 0 640 480" xml:space="preserve">
            <g transform="matrix(3.31 0 0 3.31 320.4 240.4)">
                <circle style="stroke: rgb(0,0,0); stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(61,71,133); fill-rule: nonzero; opacity: 1;" cx="0" cy="0" r="40"></circle>
            </g>
            <g transform="matrix(0.98 0 0 0.98 268.7 213.7)">
                <circle style="stroke: rgb(0,0,0); stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" cx="0" cy="0" r="40"></circle>
            </g>
            <g transform="matrix(1.01 0 0 1.01 362.9 210.9)">
                <circle style="stroke: rgb(0,0,0); stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" cx="0" cy="0" r="40"></circle>
            </g>
            <g transform="matrix(0.92 0 0 0.92 318.5 286.5)">
                <circle style="stroke: rgb(0,0,0); stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" cx="0" cy="0" r="40"></circle>
            </g>
            <g transform="matrix(0.16 -0.12 0.49 0.66 290.57 243.57)">
                <polygon style="stroke: rgb(0,0,0); stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" points="-50,-50 -50,50 50,50 50,-50 "></polygon>
            </g>
            <g transform="matrix(0.16 0.1 -0.44 0.69 342.03 248.34)">
                <polygon style="stroke: rgb(0,0,0); stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" vector-effect="non-scaling-stroke" points="-50,-50 -50,50 50,50 50,-50 "></polygon>
            </g>
        </svg>
        <form method="POST" action="{{ route('login') }}">
            @csrf
        <div class="email">
            <input type="email" name="email" placeholder="Email">
        </div>
        <div class="password">
            <input type="password" name="password" placeholder="Password">
        </div>
        <button type="submit" class="login">Login</button>

         </form>

        <div class="footer">
            <span>Forgot password?</span>
            <span><a href="{{route('userregister')}}">Create an account</a></span>
        </div>

        <div class="social-buttons">
            <a href="{{ route('googleLogin') }}" class="btn-google"><i class="ri ri-google-fill"></i> Sign in with Google</a>
            <a href="{{ route('googleLogin') }}" class="btn-facebook"><i class="ri ri-facebook-fill"></i> Sign in with Facebook</a>
        </div>
    </div>

</body>
</html>
