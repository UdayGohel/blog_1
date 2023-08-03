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
    <title>S-Admin</title>
</head>

<body id="dash_body">
    <nav class="navbar navbar-expand-lg bg-body-tertiary p-2 fixed-top" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Feel Free to Read</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Manage Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Manage Posts</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container text-center" id="dash_container">
        <div class="row justify-content-around">
            <div class="col-xl-3 p-5" id="total_Count">
                <h3><i class="bi bi-people-fill"></i> Total User </h3>
                <div>
                    <h4>{{ $userCount }}</h4>
                </div>
            </div>
            <div class="col-xl-3 p-5" id="total_Count">
                <h3><i class="bi bi-file-post-fill"></i> Total Posts</h3>
                <div>
                    <h4>{{ $postCount }}</h4>
                </div>
            </div>
        </div>
        <div class="row pt-5 justify-content-around">
            <div class="col-xl-3 p-5" id="total_Count">
                <h3><i class="bi bi-list-task"></i> Total Category</h3>
                <div>
                    <h4>{{ $categoryCount }}</h4>
                </div>
            </div>
            <div class="col-xl-3 p-5" id="total_Count">
                <h3><i class="bi bi-person-check-fill"></i> Total Admin</h3>
                <div>
                    <h4>{{ $adminCount }}</h4>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
