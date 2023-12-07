<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Update Password</title>
    <style>
        .container {
            max-width: 400px;
        }

        .mt-5 {
            margin-top: 3rem !important;
        }

        .alert {
            margin-top: 1rem;
        }
        body {
        background-color: #20232a; /* Dark background color */
        color: #61dafb; /* Text color */
    }

    .container {
        background-color: #282c34; /* Container background color */
        color: #fff; /* Container text color */
        padding: 20px;
        border-radius: 8px; /* Optional: Rounded corners for the container */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); /* Optional: Box shadow for the container */
        margin-top: 50px; /* Optional: Adjust margin-top */
    }

    .form-control {
        background-color: #343a40; /* Input background color */
        color: #fff; /* Input text color */
    }

    .form-control[readonly] {
        background-color: #495057; /* Readonly input background color */
        color: #fff; /* Readonly input text color */
    }

    .btn-primary {
        background-color: #61dafb; /* Button background color */
        color: #fff; /* Button text color */
        border: 1px solid #61dafb; /* Button border color */
    }

    .btn-primary:hover {
        background-color: #0d6efd; /* Button hover background color */
        border-color: #0d6efd; /* Button hover border color */
    }
    </style>
</head>
@auth

@if (Auth::user()->Is_Admin == 0)

{<body>
    <div class="container mt-5">
        <h2 class="mb-4">Update Password</h2>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form method="post" action="{{ route('adminpassupdate') }}">
            @csrf

            <div class="mb-3">
                <label for="staticEmail" class="form-label">Email</label>
                <input type="text" readonly class="form-control-plaintext border rounded  bg-body-secondary text-secondary" id="staticEmail" value="{{ Auth::user()->email }}">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">New Password:</label>
                <input type="password" class="form-control" id="new_password" name="password" required>
            </div>

            <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirm Password:</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Update Password</button>
        </form>
    </div>



    <!-- Include Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>}
@else
{
 @include('admin/compo/404notfound')
}
@endif
@endauth

</html>
