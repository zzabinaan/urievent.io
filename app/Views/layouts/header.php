<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UriEvent</title>
    <link rel="shortcut icon" type="image/png" href="/favicon.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>

<body>
    <nav class="navbar navbar-expand-md">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">UriEvent</a>
            <!-- buat togle menu bar -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- end of buat togle menu bar -->

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Advertise With Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Program</a>
                    </li>
                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li> -->
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" input type="hidden" placeholder="Search" aria-label="Search">
                        <!-- logic : if 'button = submit' set input type="search" bisa pake js-->
                        <!-- bahan belajar : https://mdbootstrap.com/docs/standard/forms/search/ -->
                        <button class="btn btn-outline" type="submit">Search <img src="\searchIcon.svg" alt="searchIcon"></button>
                    </form>
                </ul>

                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">chat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">pofile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">upload</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>