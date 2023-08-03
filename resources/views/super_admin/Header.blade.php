<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="/adminStyle.css">
    <!-- BootStrap Js -->
    <script src="/bootstrap.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.js"></script>
    <title>Super Admin</title>
</head>

<body id="dash_body">
    <nav class="navbar navbar-expand-lg bg-body-tertiary p-2 fixed-top" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('sAdmin_dash') }}">Feel Free to Read</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('sAdmin_dash') }}">Dash Board</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('adminManage') }}">Manage Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('sadmin_managepost') }}">Manage Posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('sadmin_manageCategory') }}">Manage Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('sadmin_manageUser') }}">Manage Users</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
