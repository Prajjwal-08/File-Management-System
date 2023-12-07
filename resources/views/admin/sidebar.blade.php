<!-- resources/views/sidebar.blade.php -->
{{-- <style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f8f9fa;
    }

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
        margin-left: 250px;
        padding: 20px;
        transition: all 0.3s;
    }

    #sidebar-bottom {
        position: absolute;
        bottom: 0;
        width: 250px;
        border-top: 1px solid #fff;
        padding-top: 10px;
    }

    #sidebar-bottom a {
        color: #fff;
        display: block;
        text-align: center;
        padding: 8px;
        text-decoration: none;
        transition: all 0.3s;
    }

    #sidebar-bottom a:hover {
        background-color: #454d55;
    }

    @media (max-width: 768px) {
        #sidebar {
            width: 100%;
            position: static;
        }

        #content {
            margin-left: 0;
        }
    }
</style> --}}
<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
@auth

    <div id="sidebar">
        <a href="/admin/dashboard" class="sidebar-link">Dashboard</a>
        <a href="/admin/users" class="sidebar-link">All Users</a>
        <a href="/admin/files" class="sidebar-link">All Files</a>
        {{-- <a href="#" class="sidebar-link">Contact</a> --}}
    </div>
    <div id="sidebar-bottom">

        <a href="/admin/logout" class="sidebar-link">Logout</a>
    </div>

@endauth
