<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['fname'])) {

    include 'db_conn.php';
    include 'php/User.php';

    $user = getUserById($_SESSION['id'], $conn);
    ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">



    <title>bs5 edit profile account details - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<?php if ($user) { ?>
    <div class="container-xl px-4 mt-4">

    <nav class="navbar navbar-expand-lg navbar-dark" id="mainNav">
                <div class="container">
                <a class="navbar-brand" href="#page-top"><img style="width: 50px;height: 50px; display:block" src="assets/img/navbar-logo.svg" alt="..." /></a>
                <button class="navbar-toggler" type="button" style="" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="home.php">Edit Profile</i></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <br>
        <hr class="mt-0 mb-4">
        <div class="row">
            <div class="col-xl-4">

                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Profile Picture</div>
                    <div class="card-body text-center">
                        <?php $gender =  $user['gender'];?>
                        <?php if ( $gender == 'female' ) { ?> 
                            <img class="img-account-profile rounded-circle mb-2" src="upload/female.png" alt="">
                        <?php } ?>
                        <?php if ( $gender == 'male' ) { ?> 
                            <img class="img-account-profile rounded-circle mb-2" src="upload/male.png" alt="">
                        <?php } ?>
                        <?php if ( $gender == 'LGBT+' ) { ?> 
                            <img class="img-account-profile rounded-circle mb-2" src="upload/jasser.png" alt="">
                        <?php } ?>
                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>

                        <button class="btn" style="background-color:#ffc800" type="button">Upload new image</button>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">

                <div class="card mb-4">
                    <div class="card-header">Account Details</div>
                    <div class="card-body">
                        <form action="php/edit.php" method="post" enctype="multipart/form-data">
                            <!-- error -->
            <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger" role="alert">
              <?php echo $_GET['error']; ?>
            </div>
            <?php } ?>
            
            <!-- success -->
            <?php if (isset($_GET['success'])) { ?>
            <div class="alert alert-success" role="alert">
              <?php echo $_GET['success']; ?>
            </div>
            <?php } ?>

                            <div class="mb-3">
                                <label class="small mb-1" for="inputUsername">Username (how your name will appear to
                                    other users on the site)</label>
                                <input class="form-control" id="inputUsername" name="fname" type="text"
                                    placeholder="Enter your username" value="<?php echo $user[
                                        'fname'
                                    ]; ?>">
                            </div>

                            <div class="row gx-3 mb-3">

                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputFirstName">First name</label>
                                    <input class="form-control" id="inputFirstName" name="uname" type="text"
                                        placeholder="Enter your first name" value="<?php echo $user[
                                            'uname'
                                        ]; ?>">
                                </div>

                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLocation">Location</label>
                                    <input class="form-control" id="inputLocation" name="location" type="text"
                                        placeholder="Enter your location" value="<?php echo $user[
                                        'location'
                                    ]; ?>">
                                </div>
                            </div>

                            <div class="row gx-3 mb-3">
                            </div>

                            <div class="mb-3">
                                <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                <input class="form-control" id="inputEmailAddress" name="email" type="email"
                                    placeholder="Enter your email address" value="<?php echo $user[
                                        'email'
                                    ]; ?>"disabled>
                            </div>

                            <div class="row gx-3 mb-3">

                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputPhone">Phone number</label>
                                    <input class="form-control" id="inputPhone" type="tel" pattern="[0-9]{8}" type="tel" name="phone"
                                        placeholder="Enter your phone number" value="<?php echo $user[
                                            'phone'
                                        ]; ?>">
                                </div>

                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputBirthday">Birthday</label>
                                    <input class="form-control" id="inputBirthday" type="date" name="birthday"
                                        placeholder="Enter your birthday" value="<?php echo $user[
                                            'birth'
                                        ]; ?>">
                                </div>
                            </div>

                            <button type="submit" class="btn" style="background-color:#ffc800">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } else {header('Location: home.php');
    exit();} ?>
    <style type="text/css">
        body {
            margin-top: 20px;
            background-color: #000;
            color: #000;
        }

        .img-account-profile {
            height: 10rem;
        }

        .rounded-circle {
            border-radius: 50% !important;
        }

        .card {
            box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
        }

        .card .card-header {
            font-weight: 500;
        }

        .card-header:first-child {
            border-radius: 0.35rem 0.35rem 0 0;
        }

        .card-header {
            padding: 1rem 1.35rem;
            margin-bottom: 0;
            background-color: rgba(33, 40, 50, 0.03);
            border-bottom: 1px solid rgba(33, 40, 50, 0.125);
        }

        .form-control,
        .dataTable-input {
            display: block;
            width: 100%;
            padding: 0.875rem 1.125rem;
            font-size: 0.875rem;
            font-weight: 400;
            line-height: 1;
            color: #69707a;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #c5ccd6;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border-radius: 0.35rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .nav-borders .nav-link.active {
            color: #ffc800;
            border-bottom-color: #ffc800;
        }

        .nav-borders .nav-link {
            color: #69707a;
            border-bottom-width: 0.125rem;
            border-bottom-style: solid;
            border-bottom-color: transparent;
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
            padding-left: 0;
            padding-right: 0;
            margin-left: 1rem;
            margin-right: 1rem;
        }
    </style>
    <script type="text/javascript">

    </script>
</body>

</html>
<?php
} else {
    header('Location: login.php');
    exit();
} ?>
