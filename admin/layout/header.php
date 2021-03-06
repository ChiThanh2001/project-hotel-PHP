<?php
session_start();
if (!isset($_SESSION['isAdmin']) || !isset($_SESSION['admin'])) {
    header('location: login.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Admin</title>
    <!-- Favicon icon -->
    <!-- <link rel="stylesheet" href="./vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="./vendor/owl-carousel/css/owl.theme.default.min.css"> -->
    <link href="./vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="./css/style.css" rel="stylesheet">
    <link href="./css/profile.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- <link rel="shortcut icon" href="../../client/images/favicon.png" >
    <link rel="icon" href="../../client/images/favicon.png" > -->


</head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.php" class="brand-logo">
                <img src="../uploads/logo.png" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="search_bar dropdown">
                                <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                                    <i class="mdi mdi-magnify"></i>
                                </span>
                                <div class="dropdown-menu p-0 m-0">
                                    <form>
                                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                                    </form>
                                </div>
                            </div>
                        </div>

                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <img class="avatar" src="<?php echo $_SESSION['admin']['avatarUser']; ?>" alt="" style="object-fit: cover;">
                                    <span><?php echo $_SESSION['admin']['fullName']; ?></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" style="margin-top: -11px;">
                                    <a href="../admin/app-profile.php?route=editProfile" class="dropdown-item">
                                        <span class="ml-2">Qu???n tr??? vi??n</span>
                                    </a>
                                    <a href="./logout.php" class="dropdown-item">
                                        <span class="ml-2">????ng xu???t</span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">B???ng ??i???u ki???n ch??nh</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="fas fa-tachometer-alt"></i><span class="nav-text">B???ng ??i???u ki???n</span></a>
                        <ul aria-expanded="false">
                            <li><a href="./index.php">B???ng ??i???u ki???n</a></li>
                        </ul>
                    </li>
                    <li class="nav-label">Q???n l?? qu???n tr??? vi??n</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="fas fa-user-friends"></i><span class="nav-text">Qu???n tr??? vi??n</span></a>
                        <ul aria-expanded="false">
                            <li><a href="../admin/admin-table.php">Danh s??ch qu???n tr???</a></li>
                            <li><a href="../admin/addAdmin.php">Th??m qu???n tr???</a></li>
                        </ul>
                    </li>
                    <li class="nav-label">Qu???n l?? ng?????i d??ng</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="fas fa-user"></i><span class="nav-text">Ng?????i d??ng</span></a>
                        <ul aria-expanded="false">
                            <li><a href="./user-table.php">Danh s??ch ng?????i d??ng</a></li>
                        </ul>
                    </li>
                    <li class="nav-label">C??c th??nh ph???n</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="fas fa-align-justify"></i><span class="nav-text">Danh m???c</span></a>
                        <ul aria-expanded="false">
                            <li><a href="./categories-table.php">Danh s??ch danh m???c</a></li>
                            <li><a href="./addCategories.php">Th??m danh m???c</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="fas fa-hotel"></i><span class="nav-text">S???n ph???m</span></a>
                        <ul aria-expanded="false">
                            <li><a href="./room-table.php">Danh s??ch ph??ng</a></li>
                            <li><a href="./event-table.php">Danh s??ch s??? ki???n</a></li>
                            <li><a href="./service-table.php">Danh s??ch d???ch v???</a></li>
                            <li><a href="./addProduct.php">Th??m s???n ph???m</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="fas fa-shopping-cart"></i><span class="nav-text">????n h??ng</span></a>
                        <ul aria-expanded="false">
                            <li><a href="./order-table.php">Danh s??ch ????n h??ng</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="fas fa-comment-alt"></i><span class="nav-text">????nh gi??</span></a>
                        <ul aria-expanded="false">
                            <li><a href="./comment-table.php">????nh gi??</a></li>
                        </ul>
                    </li>
                    <li class="nav-label">Kh??c</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="bi bi-door-open"></i><span class="nav-text">????ng xu???t</span></a>
                        <ul aria-expanded="false">
                            <li><a href="./logout.php">????ng xu???t</a></li>
                        </ul>
                    </li>
                </ul>
            </div>


        </div>


        <!--**********************************
            Sidebar end
        ***********************************-->