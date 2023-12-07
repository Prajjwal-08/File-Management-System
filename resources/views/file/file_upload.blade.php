<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Upload File</title>
    <style>
        /* Add your custom styles here */
        body {
            background-color: #f8f9fa;
            /* Background color for the entire page */
        }

        .container-fluid {
            padding-left: 0;
            padding-right: 0;
        }

        .sidebar {
            background-color: #343a40;
            /* Sidebar background color */
            color: #fff;
            height: 90vh;
            padding-top: 30px;
        }

        .main-content {
            padding: 0px;
        }
    </style>
</head>

@if (Auth::user()->Is_Admin == 1)

    <body>
        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar -->
                <nav class="col-md-3 col-lg-2 d-md-block sidebar">
                    @include('file.sidebar')
                </nav>

                <!-- Main Content -->
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 main-content">
                    <!-- Your main content goes here -->
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            Please Check your Login credentials
                            New User? <a href="{{ route('register') }}"></a>
                        </div>
                    @endif
                    <p class="mb-5"></p>
                    <h1>Please Select a File to be uploaded</h1>
                    <form method="post" action="{{ route('uploaded') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="formFile" class="form-label">Default file input example</label>
                            <input class="form-control" type="file" id="formFile" name="fileupload">
                        </div>
                        <div class="form-group mb-3">
                            <label for="formFile" class="form-label">File category </label>
                            <select class="form-select" aria-label="Default select example" name="file_Category">
                                <option selected>Sleect File category</option>
                                <option value="Pdf" name="Pdf">Pdf</option>
                                <option value="Word Document" name="Word Document">Word Document</option>
                                <option value="image" name="image">Image</option>
                                <option value="video" name="video">Video</option>
                                <option value="apk file" name="apk file">Apk file</option>
                                <option value="json file" name="json file">Json file</option>
                                <option value="workbook" name="workbook">workbook</option>
                            </select>
                        </div>
                        <div class="">
                            <div class="form-group mb-3">
                                <label for="description">Description:</label>
                                <textarea class="form-control" id="description" name="file_description" rows="5" maxlength="500"
                                    placeholder="PLease neter a short file description"></textarea>
                                <p class="text-sm-end text-body-secondary"><span id="char-count">0</span> / 500
                                    characters</p>
                            </div>
                        </div>
                        <button type="submit" value="" class="btn btn-primary">Submit</button>
                    </form>
                </main>
            </div>
        </div>

        <!-- Include Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
        </script>
        <script>
            // Track and display character count
            $('#description').on('input', function() {
                var charCount = $(this).val().length;
                $('#char-count').text(charCount);
            });
        </script>
    </body>
@else
    {
    @include('file/404notfound')
    }
@endif

</html>
