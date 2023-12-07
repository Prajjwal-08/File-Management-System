<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Management App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        #sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #343a40;
            padding-top: 20px;
            color: #fff;
            transition: all 0.3s;
        }

        .sidebar-link {
            padding: 8px;
            text-decoration: none;
            color: #fff;
            display: block;
            transition: all 0.3s;
        }

        .sidebar-link:hover {
            background-color: #454d55;
        }

        #content {
            padding: 20px;
            transition: all 0.3s;
        }

        @media (max-width: 768px) {
            #sidebar {
                width: 100%;
                position: static;
            }
        }

        /* Add responsive styles for the main content area */
        .main-content {
            width: 100%;
            /* max-width: 1200px;
            margin: 0 auto; */ 
        }

        .table-responsive {
            overflow-x: auto;
            display: block;
            width: 100%;
            margin-bottom: 1rem;
        }

        .table {
            width: 100%;
            margin-bottom: 0;
            border-collapse: collapse;
        }

        .table-bordered {
            border: 1px solid #dee2e6;
        }

        .table-bordered td,
        .table-bordered th {
            border: 1px solid #dee2e6;
        }

        .table-bordered th {
            background-color: #f9f9f9;
        }

        .btn {
            padding: 0.5rem 1rem;
            border: 1px solid #ddd;
            border-radius: 0.25rem;
            transition: all 0.2s ease-in-out;
        }

        .btn:hover {
            background-color: #eee;
        }
    </style>
</head>
@include('file/sidebar')

<body class="antialiased container-fluid">
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 main-content ">
        <div class="my-2">
            <svg viewBox="" fill="none" xmlns="http://www.w3.org/2000/svg" class="">
                <!-- Your SVG Path Here -->
            </svg>
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="mb-4">Welcome {{ Auth::user()->name }}</h1>
                <div class="d-flex">
                    <a href="{{ route('upload') }}" type="button" class="btn btn-secondary mr-2">Add File</a>
                    <a href="{{ url('logout') }}" type="button" class="btn btn-secondary mr-2">Log Out</a>
                    <a href="{{ url('DeleteUser/' . Auth::id()) }}" class="btn btn-danger"
                        onclick="return confirm('Are you sure you Want to Delete Your Account?')">
                        Delete My Account
                    </a>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered border-primary">
                <thead>
                    <tr>
                        <th>File ID </th>
                        <th>User ID</th>
                        <th>Category Name</th>
                        <th>File Name</th>
                        <th>Description</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $prod)
                        @if ($prod->user_id == Auth::id())
                            <tr>
                                <td>{{ $prod->id }}</td>
                                <td>{{ $prod->user_id }}</td>
                                <td>{{ $prod->category_id }}</td>
                                <td>{{ $prod->filename }}</td>
                                <td>{{ $prod->description }}</td>
                                <td>
                                    <a href={{ url('delete/' . $prod->id) }} class="btn btn-danger"
                                        onclick="return confirm('Are you sure you Want to Delete this Product? This will Result in Deleting all files associated with this account')">Delete</a>
                                </td>
                            </tr>
                        @endif
                        @empty
                        <tr>
                            <td colspan="6" style="text-align: center">You have not uploaded any file yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>
{{-- @auth
@if (Auth::user()->Is_Admin == 1)
<body>
    @include('admin/sidebar')
    <div id="content">
        <div class="my-2">
            <svg viewBox="" fill="none" xmlns="http://www.w3.org/2000/svg" class="">

                <!-- Your SVG Path Here -->

            </svg>

            <div class="alert-danger">
                @if (session()->has('success'))
                    <h3 class="">{{ session('success') }} </h3>
                @endif

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            <div class="d-flex justify-content-between align-items-center">
                <h1>Welcome Admin</h1>
                <div class="">
                    <a href="{{ url('logout') }}" type="button" class="btn btn-secondary">Log Out</a>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered border-primary">
                <thead>
                    <tr>
                        <th>File ID</th>
                        <th>User ID</th>
                        <th>User Name</th>
                        <th>User Email</th>
                        <th>Description</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $prod)
                        <tr>
                            <td>{{ $prod->id }}</td>
                            <td>{{ $prod->user_id }}</td>
                            <td>{{ $prod->category_id }}</td>
                            <td>{{ $prod->filename }}</td>
                            <td>{{ $prod->description }}</td>
                            <td><a href="{{ url('/admin/delete/' . $prod->id) }}" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you Want to Delete this Product?')">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

@else
{
 @include('file/404notfound')
}
@endif
@endauth --}}

</html>
