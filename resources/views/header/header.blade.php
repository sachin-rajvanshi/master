<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <title>Welcome to RCP India</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="stylesheet" href="{{ asset('public/css/bootstrap-4.css') }}"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">  
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"> 
    <link rel="stylesheet" href="{{ asset('public/css/style.css') }}">
    </head>
    <body>
    <header>
        <div class="top-bar">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-top">
                    <a class="navbar-brand" href="index.php"><img src="{{ asset('public') }}/images/logo.png" class="img-fluid"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span>
                                        @if(\Auth::user()->profile_pic)
                                            <img src="{{ \Auth::user()->profile_pic }}" class="img-fliud">
                                        @else
                                            <img src="{{ asset('public') }}/images/usr.png" class="img-fliud">
                                        @endif
                                    </span> Admin
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('admin/profile') }}">My Profile</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ url('logout') }}">Logout</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <div class="middle-bar">
            <div class="container">
                <nav class="navbar navbar-expand-lg">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-middle" aria-controls="navbar-middle" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <div class="collapse navbar-collapse" id="navbar-middle">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ url('admin/dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                            </li>
							<li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   <i class="fas fa-bars"></i> Master
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="manage-sessions.php">Manage Session</a>
                                    <a class="dropdown-item" href="manage-course-type.php">Manage Course Type</a>
                                    <a class="dropdown-item" href="manage-course-level.php">Manage Course Level</a>
                                    <a class="dropdown-item" href="manage-courses.php">Manage Courses</a>
                                    <a class="dropdown-item" href="manage-university.php">Manage University</a>
                                    <a class="dropdown-item" href="manage-discount-coupon.php">Manage Discount Coupon</a>
								</div>
                            </li>
							<li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   <i class="fas fa-university"></i> Branches
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="manage-branch.php">Manage Branches</a>
                                    <a class="dropdown-item" href="manage-branch.php">Branch Permission</a>
								</div>
                            </li>
							<li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   <i class="fas fa-pencil-alt"></i> Admissions
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="offline-admission.php">Offline Admission</a>
                                    <a class="dropdown-item" href="manage-admission.php">Manage Admission</a>
								</div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    @yield('content')
    @extends('footer.footer')