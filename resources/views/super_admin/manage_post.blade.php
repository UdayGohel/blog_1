<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <!-- BootStrap Js -->
    <script src="bootstrap.js"></script>
    <title>S-Admin</title>
</head>

<body id="admin_table_body">
    <nav class="navbar navbar-expand-lg bg-body-tertiary p-2 fixed-top" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Feel Free to Read</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse align-items-end" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll " style="--bs-scroll-height: 100px;">
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
    <div class="container text-center" id="admin_table">
        <h2 class="p-3">Admin Name</h2>
        <table class="table table-striped table-hover table-light">
            <thead class="table-dark">
                <th scope="col">Id</th>
                <th scope="col">post title</th>
                <th scope="col"> Posts description</th>
                <th scope="col">Category</th>
                <th scope="col">Creation Date</th>
                <th scope="col">Manage</th>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>nature</td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                    <td>Nature and Arts </td>
                    <td>25/10/2023</td>
                    <td>
                        <div class="row">
                            <div class="col-6">
                                <i class="bi bi-trash-fill" style="font-size: 1.2rem;"></i>
                            </div>
                            <div class="col-6">
                                <i class="bi bi-pencil-square" style="font-size: 1.2rem;"></i>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>


</body>