<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

@Auth
@if (Auth::user()->Is_Admin == 0)

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
                        <th>User ID</th>
                        <th>User Name</th>
                        <th>User Email</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $prod)
                        <tr>
                            <td>{{ $prod->id }}</td>
                            <td>{{ $prod->name }}</td>
                            <td>{{ $prod->email }}</td>
                            {{-- <td>{{ $prod->filename }}</td>
                <td>{{ $prod->description }}</td> --}}
                            <td><a href={{ url('delete/' . $prod->id) }} class="btn btn-danger"
                                    onclick="return confirm('Are you sure you Want to Delete this Product?')">Delete
                                    User</a>
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
 @include('admin/compo/404notfound')
}
@endif

@endauth

</html>
