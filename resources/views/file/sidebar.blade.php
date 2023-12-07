<!-- resources/views/sidebar.blade.php -->
<style>
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

    a:hover {
        text-decoration: none;
        color: white
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

    #sidebar-bottom {
        position: absolute;
        bottom: 0;
        width: 100%;
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

    /* Responsive adjustments for screens less than 768px wide */
    @media (max-width: 768px) {
        #sidebar {
            width: 100%;
            position: static;
            background-color: transparent;
        }

        .sidebar-link {
            display: inline-block;
            padding: 8px 15px;
        }

        #sidebar-bottom {
            position: relative;
            border-top: none;
        }
    }
</style>

<div id="sidebar">
    <a href="/index" class="sidebar-link">All Files</a>
    <a href="/upload" class="sidebar-link">Upload File</a>
    {{-- <a href="admin/files" class="sidebar-link"></a>
    <a href="#" class="sidebar-link">Contact</a> --}}

    <!-- Logout and Delete Account Links -->
    <div id="sidebar-bottom">
        <a href="{{ url('logout') }}" class="sidebar-link">Logout</a>
        <a href="{{ url('delete/' . Auth::id()) }}" class="sidebar-link"
            onclick="return confirm('Are you sure you want to delete your account?')">Delete Account</a>
    </div>
</div>
