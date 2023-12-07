<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        body {
            background-color: #343a40;
            color: #fff;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            max-width: 400px;
            background-color: rgba(164, 163, 163, 0.7);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            color: #ced4da;
        }

        input.form-control {
            background-color: #ffff;
            color: #000;
            /* Adjusted text color for better visibility */
        }

        .button {
            width: 100%;
            background-color: #17a2b8;
            color: #fff;
            border: 1px solid #138496;
        }

        .button:hover {
            background-color: #138496;
        }

        .alert-danger {
            margin-top: 20px;
        }

        .signup-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #138496;
            text-decoration: none;
        }

        .signup-link:hover {
            text-decoration: underline;
            color: #ffff;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>User Login</h2>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form method="post" action="{{ route('logincheck') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <button type="submit" class="button btn btn-primary" name="submit">Login</button>

            <div class="d-flex "style="justify-content:space-around;">
                <a class="signup-link" href="{{ url('register') }}">New User? Sign Up</a>
                <p class="text-center pt-3">OR</p>
                <a class="signup-link" href="{{ url('admin/login') }}">Admin? Sign in Here</a>
            </div>

        </form>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>
