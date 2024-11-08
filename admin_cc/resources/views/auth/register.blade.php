<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            overflow: hidden;
        }

        body {
            background-image: url('{{ asset('images/Sign up.png') }}');
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
            margin-top: 1px;
        }

        .card-header {
            color: #07143B;
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
            width: 200px; 
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
    padding: 8px; /* Adjust the padding to make it smaller */
    width: 160px; /* Set a fixed width to make it smaller */
    cursor: pointer;
    transition: background-color 0.3s;
    color: white; 
    font-weight: bold; 
    font-size: 14px; /* Decrease font size if needed */
    margin-left: 150px;

}


        .btn-primary:hover {
            background-color: #d55a12; 
        }

        .alert {
            border-radius: 5px;
            margin-bottom: 15px; 
            color: #EA6A12;
        }

        p {
            color: #959895; 
            font-size: 15px;
            margin-top: -20px;
            text-align: center; 
        }

        .form-check {
            margin-bottom: 15px;
        }

        .form-group {
            margin-bottom: 20px; 
        }

        .forgot-password {
            display: block; 
            text-align: center; 
            margin-top: 10px;
        }

        .already-have-account {
            color: #07143B; /* Color for "Already have an account?" */
        }

        .login-link {
            color: #EA6A12; /* Color for "Login" */
            text-decoration: none; /* No underline for the login link */
        }

        .login-link:hover {
            text-decoration: underline; /* Underline on hover */
        }

        /* Grid layout for the form */
        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr); /* Two columns */
            grid-column-gap: 20px; /* Horizontal gap */
            grid-row-gap: 3px; /* Vertical gap */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header text-center">
                <h1>Register</h1>
            </div>
            <p>Create your account to get started</p>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" name="first_name" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="middle_name">Middle Name</label>
                            <input type="text" name="middle_name" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" name="last_name" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </form>
                <div class="forgot-password">
                    <span class="already-have-account">Already have an account? </span>
                    <a href="{{ route('login') }}" class="login-link">Login</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
