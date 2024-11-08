<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Import Playfair Display font -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            overflow: hidden;
        }

        body {
            background-image: url('{{ asset('images/background.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            font-family: Arial, sans-serif;
            color: white;
        }

        .container {
            display: flex;
            justify-content: flex-start;
            align-items: center; 
            height: 100%;
            margin-left: 90px;
            opacity: 0.9;
            margin-top: -50px%;
        }

        .card-header {
            color: #07143B;
            font-family: 'Playfair Display', serif; /* Applying Playfair Display */
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            padding: 15px;
            text-align: center;
            margin-top: 1px;
        }

        label {
            color: #959895;
            font-size: 10px;
            display: block; 
            margin-bottom: 5px;
        }

        .form-control {
            border-radius: 24px;
            padding: 10px; 
            border: 1px solid #EA6A12; 
            transition: border-color 0.3s;
            width: 300px; 
            height: 10px; 
        }

        .form-control:focus {
            border-color: #007bff;
            outline: none;
        }

        .btn-primary {
            background-color: #EA6A12;
            border: none;
            border-radius: 24px;
            padding: 10px;
            width: 100%;
            cursor: pointer;
            transition: background-color 0.3s;
            color: white; 
            font-weight: bold; 
        }

        .btn-primary:hover {
            background-color: #d55a12; 
        }

        .alert {
            border-radius: 5px;
            margin-bottom: 15px; 
        }

        p {
            color: #959895; 
            font-size: 15px;
            margin-top: -20px;
            text-align: center; 
        }

        .form-check {
            margin-bottom: 15px;
            display: flex;
            align-items: center; /* Aligns items vertically */
        }

        .form-group {
            margin-bottom: 20px; 
        }

        .forgot-password {
            color: #EA6A12; 
            text-decoration: none; 
            margin-left: auto; /* Push to the right */
            font-size: 14px;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        .register-link {
            display: block; 
            text-align: center; 
            margin-top: 30px; 
            font-size: 14px;
        }

        .register-text {
            color: #07143B; /* Color for "Don't have an account?" */
        }

        .register-link a {
            color: #EA6A12; /* Color for "Register" */
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header text-center">
                <h1>Sign In</h1>
            </div>
            <p>Sign in to stay connected</p>
            <div class="card-body">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login.custom') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="remember" class="form-check-input" id="remember">
                        <label class="form-check-label" for="remember">Remember Me</label>
                        <a href="{{ route('password.reset.name') }}" class="forgot-password">Forgot Password?</a>
                        
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
                <p class="register-link">
                    <span class="register-text">Don't have an account?</span> 
                    <a href="{{ route('register') }}">Register</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
