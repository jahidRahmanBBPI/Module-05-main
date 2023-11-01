<?php

ob_start();
session_start();

// Base URL
define("BASE_URL", "http://localhost:3000/public");

// Define the file path as a constant
define("DB_FILE_PATH",  $_SERVER['DOCUMENT_ROOT'] . "/database/db.json");

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD - Create</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ti-icons@0.1.2/css/themify-icons.css">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link rel="stylesheet" href="http://localhost:3000/public/header/css/admin.css" />
    <style>
        .text-justify {
            text-align: justify;
        }

        .cascading-right {
            margin-right: -50px;
        }

        @media (max-width: 991.98px) {
            .cascading-right {
                margin-right: 0;
            }
        }

        .parallaxss {
            background-image: url("../img/banner.jpg");

            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;


            min-height: 454px;
            max-width: 100%;
            /* margin-top: 5px; */
            /* margin-left: 205px; */
        }


        /* .gradient-custom-2 { */
        /* fallback for old browsers */
        /* background: #fccb90; */

        /* Chrome 10-25, Safari 5.1-6 */
        /* background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593); */

        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        /* background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593); */
        /* } */

        .gradient-custom-2 {
            /* fallback for old browsers */
            background: #fccb90;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, #3a5f0b, #de6c07);

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, #3a5f0b, #de6c07);
        }
        

        .my-custom-element {
            background-color: #87CEFA;
        }


        @media (min-width: 768px) {
            .gradient-form {
                height: 90vh !important;
            }
        }

        @media (min-width: 769px) {
            .gradient-custom-2 {
                border-top-right-radius: .3rem;
                border-bottom-right-radius: .3rem;
            }
        }
    </style>
</head>

<body>



    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <!-- Container wrapper -->
        <div class="container">

            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Navbar brand -->
                <a class="navbar-brand mt-2 mt-lg-0" href="<?php echo BASE_URL; ?>">
                    <img src="<?php echo BASE_URL; ?>/img/ostad-app-logo-vector.png" style="height: 45px;" alt="MDB Logo" loading="lazy" />
                </a>
                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <?php
                    if (isset($_SESSION['role']) && isset($_SESSION['loggedin'])) :
                        if ('admin' == $_SESSION['role']) : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo BASE_URL; ?>/dashboard/index.php">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Contact</a>
                            </li>
                    <?php
                        endif;
                    endif;
                    ?>

                    <?php if (!isset($_SESSION['loggedin'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo BASE_URL; ?>/login/index.php">Sign in</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo BASE_URL; ?>/registration/create.php">Sign up</a>
                        </li>
                    <?php endif; ?>

                </ul>
                <!-- Left links -->
            </div>
            <!-- Collapsible wrapper -->

            <!-- Right elements -->
            <?php if (isset($_SESSION['loggedin'])) : ?>
                <div class="d-flex align-items-center">
                    <!-- Avatar -->
                    <div class="dropdown">
                        <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                            <img src="https://as1.ftcdn.net/v2/jpg/02/30/60/82/1000_F_230608264_fhoqBuEyiCPwT0h9RtnsuNAId3hWungP.jpg" class="rounded-circle" height="45" alt="Black and White Portrait of a Man" loading="lazy" />
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                            <li>
                                <a class="dropdown-item" href="#">My profile</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Settings</a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="<?php echo BASE_URL; ?>/logout/index.php">Logout</a>
                            </li>

                        </ul>
                    </div>
                </div>
            <?php endif; ?>
            <!-- Right elements -->
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->