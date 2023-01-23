<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['fname'])) {

include "db_conn.php";
include 'php/User.php';
$user = getUserById($_SESSION['id'], $conn);
?>
<?php
include "db.php"; 
$message_alert=false;
if (isset($_POST['send'])) {
//  echo '<pre>';
//  print_r($_POST);
$name= $_POST['name'];
$email= $_POST['email'];
$phone= $_POST['phone'];
$message= $_POST['message'];
$sql="INSERT INTO `contact`(`name`, `email`, `contact_no`, `message`) VALUES ('$name','$email','$phone','$message')";
$query=mysqli_query($conn, $sql);
if ($query) {
  $message_alert = '<div class="app-alert text-success">Your contact info has been received.</div>';
}else{
  $message_alert = '<div class="app-alert text-error">Server is busy - try again later.</div>';
}
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Assyl's Portofolio</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />


        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <?php if ($user) { ?>
            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
                <div class="container">
                <a class="navbar-brand" href="#page-top"><img style="width: 50px;height: 50px; display:block" src="assets/img/navbar-logo.svg" alt="..." /></a>
                <button class="navbar-toggler" type="button" style="" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item" ><a class="nav-link" href="#services">Services</a></li>
                        <li class="nav-item" ><a class="nav-link" href="#portfolio">Portfolio</a></li>
                        <li class="nav-item" ><a class="nav-link" href="#about">About</a></li>
                        <li class="nav-item" ><a class="nav-link" href="#team">Team</a></li>
                        <li class="nav-item" ><a class="nav-link" href="#contact">Contact</a></li>
                        <li class="nav-item">
                            <div class="dropdown open">
                                <button class="far fa-user-circle nav-link"  style="font-size:25px;" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                </button>
                                <div class="dropdown-menu" aria-labelledby="triggerId">
                                    <a class="dropdown-item" href="edit.php" class="nav-link">Settings</a>
                                    <?php $statut =  $user['statut'];?>
                                    <?php if ( $statut == 'admin' ) { ?> 
                                        <a class="dropdown-item" href="dashboard.php" class="nav-link">Dashboard</a>
                                    <?php } ?>
                                    <a class="dropdown-item" href="logout.php" style="color:red;" class="nav-link">Log Out</a>
                                </div>
                            </div>
                        </li>                                          
                    </ul>
                </div>
            </div>
        </nav>

            <!-- Masthead-->
            <header class="masthead">
                <div class="container">
                    <div class="masthead-subheading">Welcome <a style="color:#ffc800;"><?=$user['fname']?></a> To My Studio!</div>
                    <div class="masthead-heading text-uppercase">It's Nice To Meet You</div>
                    <div><a class="btn btn-primary text-uppercase btn-lg" href="#services">Let's Begin</a></div>
                </div>
            </header>
            <!-- Services-->
            <section class="page-section" id="services">
                <div class="container">
                    <div class="text-center">
                        <h2 class="section-heading text-uppercase">Services</h2>
                        <h3 class="section-subheading text-muted">###ss.</h3>
                    </div>
                    <div class="row text-center">
                        <div class="col-md-4">
                            <span class="fa-stack fa-4x">
                                <i class="fas fa-circle fa-stack-2x text-primary"></i>
                                <i class="fas fa-code fa-stack-1x fa-inverse"></i>
                            </span>
                            <h4 class="my-3">JavaScript Developer</h4>
                            <p class="text-muted">#####</p>
                        </div>
                        <div class="col-md-4">
                            <span class="fa-stack fa-4x">
                                <i class="fas fa-circle fa-stack-2x text-primary"></i>
                                <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
                            </span>
                            <h4 class="my-3">Responsive Web Designer</h4>
                            <p class="text-muted">#####</p>
                        </div>
                        <div class="col-md-4">
                            <span class="fa-stack fa-4x">
                                <i class="fas fa-circle fa-stack-2x text-primary"></i>
                                <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
                            </span>
                            <h4 class="my-3">Web Security</h4>
                            <p class="text-muted">#####</p>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Portfolio Grid-->
            <section class="page-section bg-light" id="portfolio">
                <div class="container">
                    <div class="text-center">
                        <h2 class="section-heading text-uppercase">Portfolio</h2>
                        <h3 class="section-subheading text-muted">Some Projects.</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-6 mb-4">
                            <!-- Portfolio item 1-->
                            <div class="portfolio-item">
                                <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1">
                                    <div class="portfolio-hover">
                                        <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                    </div>
                                    <img class="img-fluid" src="assets/img/portfolio/1.jpg" alt="..." />
                                </a>
                                <div class="portfolio-caption">
                                    <div class="portfolio-caption-heading">JavaScript Algorithms and Data Structures</div>
                                    <div class="portfolio-caption-subheading text-muted">Freecodecamp</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 mb-4">
                            <!-- Portfolio item 2-->
                            <div class="portfolio-item">
                                <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal2">
                                    <div class="portfolio-hover">
                                        <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                    </div>
                                    <img class="img-fluid" src="assets/img/portfolio/2.jpg" alt="..." />
                                </a>
                                <div class="portfolio-caption">
                                    <div class="portfolio-caption-heading">Scientific Computing with Python</div>
                                    <div class="portfolio-caption-subheading text-muted">Freecodecamp</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 mb-4">
                            <!-- Portfolio item 3-->
                            <div class="portfolio-item">
                                <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal3">
                                    <div class="portfolio-hover">
                                        <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                    </div>
                                    <img class="img-fluid" src="assets/img/portfolio/3.jpg" alt="..." />
                                </a>
                                <div class="portfolio-caption">
                                    <div class="portfolio-caption-heading">Responsive Web Design</div>
                                    <div class="portfolio-caption-subheading text-muted">Freecodecamp</div>
                                    <br>
                                    <br>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                            <!-- Portfolio item 4-->
                            <div class="portfolio-item">
                                <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal4">
                                    <div class="portfolio-hover">
                                        <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                    </div>
                                    <img class="img-fluid" src="assets/img/portfolio/4.jpg" alt="..." />
                                </a>
                                <div class="portfolio-caption">
                                    <div class="portfolio-caption-heading">Front End Development Libraries</div>
                                    <div class="portfolio-caption-subheading text-muted">Freecodecamp</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- About-->
            <section class="page-section" id="about">
                <div class="container">
                    <div class="text-center">
                        <h2 class="section-heading text-uppercase">About</h2>
                        <h3 class="section-subheading text-muted">My Carrer.</h3>
                    </div>
                    <ul class="timeline">
                        <li>
                            <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/1.jpg" alt="..." /></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>2022-2025</h4>
                                    <h4 class="subheading">Study Computer Science</h4>
                                </div>
                                <div class="timeline-body"><p class="text-muted">lezem nekteb parag 3al 9raya...</p></div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image"><img class="rounded-circle img-fluid" src="#" alt="..." /></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>Date1</h4>
                                    <h4 class="subheading">post1</h4>
                                </div>
                                <div class="timeline-body"><p class="text-muted">####</p></div>
                            </div>
                        </li>
                        <li>
                            <div class="timeline-image"><img class="rounded-circle img-fluid" src="#" alt="..." /></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>Date2</h4>
                                    <h4 class="subheading">post2</h4>
                                </div>
                                <div class="timeline-body"><p class="text-muted">###</p></div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image"><img class="rounded-circle img-fluid" src="#" alt="..." /></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>Date3</h4>
                                    <h4 class="subheading">post3</h4>
                                </div>
                                <div class="timeline-body"><p class="text-muted">###</p></div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <h4>
                                    Be Part
                                    <br />
                                    Of My
                                    <br />
                                    Story!
                                </h4>
                            </div>
                        </li>
                    </ul>
                </div>
            </section>
            <!-- Team-->
            <section class="page-section bg-light" id="team">
                <div class="container">
                    <div class="text-center">
                        <h2 class="section-heading text-uppercase">My Amazing Team</h2>
                        <h3 class="section-subheading text-muted">Some Supporters.</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="team-member">
                                <img class="mx-auto rounded-circle" src="assets/img/team/1.jpg" alt="..." />
                                <h4>HTML</h4>
                                <p class="text-muted">##</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="team-member">
                                <img class="mx-auto rounded-circle" src="assets/img/team/2.jpg" alt="..." />
                                <h4>CSS</h4>
                                <p class="text-muted">##</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="team-member">
                                <img class="mx-auto rounded-circle" src="assets/img/team/3.jpg" alt="..." />
                                <h4>JavaScript</h4>
                                <p class="text-muted">##</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="team-member">
                                <img class="mx-auto rounded-circle" src="assets/img/team/4.jpg" alt="..." />
                                <h4>Python</h4>
                                <p class="text-muted">##</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="team-member">
                                <img class="mx-auto rounded-circle" src="assets/img/team/6.jpg" alt="..." />
                                <h4>Bootstrap</h4>
                                <p class="text-muted">##</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="team-member">
                                <img class="mx-auto rounded-circle" src="assets/img/team/5.jpg" alt="..." />
                                <h4>C</h4>
                                <p class="text-muted">##</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 mx-auto text-center"><p class="large text-muted"></p></div>
                    </div>
                </div>
            </section>
            <!-- Clients-->
            <!--<div class="py-5">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-3 col-sm-6 my-3">
                            <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/microsoft.svg" alt="..." aria-label="Microsoft Logo" /></a>
                        </div>
                        <div class="col-md-3 col-sm-6 my-3">
                            <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/google.svg" alt="..." aria-label="Google Logo" /></a>
                        </div>
                        <div class="col-md-3 col-sm-6 my-3">
                            <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/facebook.svg" alt="..." aria-label="Facebook Logo" /></a>
                        </div>
                        <div class="col-md-3 col-sm-6 my-3">
                            <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/ibm.svg" alt="..." aria-label="IBM Logo" /></a>
                        </div>
                    </div>
                </div>
            </div>-->
            <!-- Contact-->
            <section class="page-section" id="contact">
                <div class="container">
                    <div class="text-center">
                        <h2 class="section-heading text-uppercase">Contact Us</h2>
                        
                        <h3 class="section-subheading text-muted"><?=$message_alert?></h3>
                    </div>
                    <!-- * * * * * * * * * * * * * * *-->
                    <!-- * * SB Forms Contact Form * *-->
                    <!-- * * * * * * * * * * * * * * *-->
                    <!-- This form is pre-integrated with SB Forms.-->
                    <!-- To make this form functional, sign up at-->
                    <!-- https://startbootstrap.com/solution/contact-forms-->
                    <!-- to get an API token!-->
                    <form id="contactForm" action="#contact" method="post" data-sb-form-api-token="">
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- Name input-->
                                <input class="form-control" id="name" name="name" type="text" placeholder="Your Name" data-sb-validations="required" required/>
                                <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                            </div>
                            <div class="form-group">
                                <!-- Email address input-->
                                <input class="form-control" id="email" name="email" type="email" placeholder="Your Email" data-sb-validations="required,email" required/>
                                <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                            </div>
                            <div class="form-group mb-md-0">
                                <!-- Phone number input-->
                                <input class="form-control" id="phone" name="phone" type="tel" pattern="[0-9]{8}" placeholder="Your Phone  exp: 12345678" data-sb-validations="required" required/>
                                <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-textarea mb-md-0">
                                <!-- Message input-->
                                <textarea class="form-control" id="message" name="message" placeholder="Your Message" data-sb-validations="required" required></textarea>
                                <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                            </div>
                        </div>
                    </div>
                    <!-- Submit success message-->
                    <!---->
                    <!-- This is what your users will see when the form-->
                    <!-- has successfully submitted-->

                    <!-- Submit error message-->
                    <!---->
                    <!-- This is what your users will see when there is-->
                    <!-- an error submitting the form-->
                    <!-- Submit Button-->
                    <div class="text-center">
                        <button type="submit" name="send" class="btn btn-primary btn-xl text-uppercase">SEND</button>
                    </div>
                </form>
                </div>
            </section>
            <!-- Footer-->
            <footer class="footer py-4">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-4 text-lg-start">Copyright &copy; Your Website 2022</div>
                        <div class="col-lg-4 my-3 my-lg-0">
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="https://www.facebook.com/assyl.chouikh/" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="https://www.linkedin.com/in/assyl-chouikh-b56988243/" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                        <div class="col-lg-4 text-lg-end">
                            <!-- Button trigger modal -->
                            <a class="link-dark text-decoration-none me-3" data-bs-toggle="modal" data-bs-target="#modalId" href="#!">Privacy Policy</a>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- Portfolio Modals-->
            <!-- Portfolio item 1 modal popup-->
            <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="modal-body">
                                        <!-- Project details-->
                                        <h2 class="text-uppercase">JavaScript Algorithms and Data Structures</h2>
                                        <p class="item-intro text-muted">##</p>
                                        <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/1.jpg" alt="..." />
                                        <ul class="list-inline">
                                            <li>
                                                <strong>Type :</strong>
                                                JavaScript Algorithms and Data Structures
                                            </li>
                                            <li>
                                                <strong>Info:</strong>
                                                <a href="https://freecodecamp.org/certification/Assyl-Chouikh/javascript-algorithms-and-data-structures">Certification Link</a>
                                            </li>
                                        </ul>
                                        <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                            <i class="fas fa-xmark me-1"></i>
                                            Close Project
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Portfolio item 2 modal popup-->
            <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="modal-body">
                                        <!-- Project details-->
                                        <h2 class="text-uppercase">Scientific Computing with Python</h2>
                                        <p class="item-intro text-muted">##</p>
                                        <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/2.jpg" alt="..." />
                                        <ul class="list-inline">
                                            <li>
                                                <strong>Type :</strong>
                                                Scientific Computing with Python
                                            </li>
                                            <li>
                                                <strong>Info:</strong>
                                                <a href="https://freecodecamp.org/certification/Assyl-Chouikh/scientific-computing-with-python-v7">Certification Link</a>
                                            </li>
                                        </ul>
                                        <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                            <i class="fas fa-xmark me-1"></i>
                                            Close Project
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Portfolio item 3 modal popup-->
            <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="modal-body">
                                        <!-- Project details-->
                                        <h2 class="text-uppercase">Responsive Web Design</h2>
                                        <p class="item-intro text-muted">##</p>
                                        <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/3.jpg" alt="..." />
                                        <ul class="list-inline">
                                            <li>
                                                <strong>Type :</strong>
                                                Responsive Web Design
                                            </li>
                                            <li>
                                                <strong>Info:</strong>
                                                <a href="https://freecodecamp.org/certification/Assyl-Chouikh/responsive-web-design">Certification Link</a>

                                            </li>
                                        </ul>
                                        <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                            <i class="fas fa-xmark me-1"></i>
                                            Close Project
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Portfolio item 4 modal popup-->
            <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="modal-body">
                                        <!-- Project details-->
                                        <h2 class="text-uppercase">Front End Development Libraries</h2>
                                        <p class="item-intro text-muted">##</p>
                                        <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/4.jpg" alt="..." />
                                        <ul class="list-inline">
                                            <li>
                                                <strong>Tyoe :</strong>
                                                Front End Development Libraries
                                            </li>
                                            <li>
                                                <strong>Info:</strong>
                                                <a href="https://freecodecamp.org/certification/Assyl-Chouikh/front-end-development-libraries">Certification Link</a>
                                            </li>
                                        </ul>
                                        <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                            <i class="fas fa-xmark me-1"></i>
                                            Close Project
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Bootstrap core JS-->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
            <!-- Core theme JS-->
            <script src="js/scripts.js"></script>
            <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
            <!-- * *                               SB Forms JS                               * *-->
            <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
            <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
            <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
            <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel" style="font-size: 30px;position: relative;left: 40%; color:#202429;">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="" >
                        <div class="modal-body mx-3">
                        <div class="md-form mb-5">
                            <input type="email" id="defaultForm-email" class="form-control validate">
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Your email</label>
                        </div>
                
                        <div class="md-form mb-4">
                            <input type="password" id="defaultForm-pass" class="form-control validate">
                            <label data-error="wrong" data-success="right" for="defaultForm-pass">Your password</label>
                        </div>
                
                        </div>
                        <div class="modal-footer d-flex">
                        <button class="btn btn-default" style="background-color: #ffc800; width: 100%;color: #fafafa;  ">Login</button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <span style="color: #202429;">You Don't Have an Account ?<a data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" href="#" style="color: black;">  register</a></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel2" style="font-size: 30px;position: relative;left: 40%; color:#202429">Register</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="">
                    <div class="">
                    </div>
                    <div class="modal-body mx-3">
                        <div class="md-form mb-5">
                        <input type="text" id="orangeForm-name" class="form-control validate">
                        <label data-error="wrong" data-success="right" for="orangeForm-name">Your name</label>
                        </div>
                        <div class="md-form mb-5">
                        <input type="email" id="orangeForm-email" class="form-control validate">
                        <label data-error="wrong" data-success="right" for="orangeForm-email">Your email</label>
                        </div>
                
                        <div class="md-form mb-5">
                        <input type="password" id="orangeForm-pass" class="form-control validate">
                        <label data-error="wrong" data-success="right" for="orangeForm-pass">Your password</label>
                        </div>
                        <div class="">
                        <input type="password" id="orangeForm-pass" class="form-control validate">
                        <label data-error="wrong" data-success="right" for="orangeForm-pass">Confirme password</label>
                        </div>
                
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-deep-orange" style="background-color:#ffc800;width: 100%;color:#ffffff;">Sign up</button>
                    </div>
                </div>
                <div class="modal-footer">
                    <span style="color: #202429;">You Have Already an Account ?<a data-bs-target="#exampleModalToggle" data-bs-toggle="modal" href="#" style="color: black;">  login</a></span>
                </div>
            </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="modalId" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                                <h5 class="modal-title" id="modalTitleId">Privacy</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <h2 style="text-align: center;"><b>DISCLAIMER</b></h2>
                            <p>Last updated: 2023-01-10</p>
                            <p><b>WEBSITE DISCLAIMER</b></p>
                            <p>The information provided by <b>Assyl</b> (“Company”, “we”, “our”, “us”) on <b>####</b> (the “Site”) is for general informational purposes only. All information on the Site is provided in good faith, however we make no representation or warranty of any kind, express or implied, regarding the accuracy, adequacy, validity, reliability, availability, or completeness of any information on the Site.</p>
                            <p>UNDER NO CIRCUMSTANCE SHALL WE HAVE ANY LIABILITY TO YOU FOR ANY LOSS OR DAMAGE OF ANY KIND INCURRED AS A RESULT OF THE USE OF THE SITE OR RELIANCE ON ANY INFORMATION PROVIDED ON THE SITE. YOUR USE OF THE SITE AND YOUR RELIANCE ON ANY INFORMATION ON THE SITE IS SOLELY AT YOUR OWN RISK.</p>
                            <p><b>EXTERNAL LINKS DISCLAIMER</b></p>
                            <p>The Site may contain (or you may be sent through the Site) links to other websites or content belonging to or originating from third parties or links to websites and features. Such external links are not investigated, monitored, or checked for accuracy, adequacy, validity, reliability, availability or completeness by us.</p>
                            <p>For example, the outlined <a href="https://policymaker.io/disclaimer/">Disclaimer</a> has been created using <a href="https://policymaker.io/">PolicyMaker.io</a>, a free web application for generating high-quality legal documents. PolicyMaker’s <a href="https://policymaker.io/disclaimer/">disclaimer generator</a> is an easy-to-use tool for creating an excellent sample Disclaimer template for a website, blog, eCommerce store or app.</p>
                            <p>WE DO NOT WARRANT, ENDORSE, GUARANTEE, OR ASSUME RESPONSIBILITY FOR THE ACCURACY OR RELIABILITY OF ANY INFORMATION OFFERED BY THIRD-PARTY WEBSITES LINKED THROUGH THE SITE OR ANY WEBSITE OR FEATURE LINKED IN ANY BANNER OR OTHER ADVERTISING. WE WILL NOT BE A PARTY TO OR IN ANY WAY BE RESPONSIBLE FOR MONITORING ANY TRANSACTION BETWEEN YOU AND THIRD-PARTY PROVIDERS OF PRODUCTS OR SERVICES.</p>
                            <p><b>PROFESSIONAL DISCLAIMER</b></p><p>The Site can not and does not contain legal advice. The information is provided for general informational and educational purposes only and is not a substitute for professional legal advice. Accordingly, before taking any actions based upon such information, we encourage you to consult with the appropriate professionals. We do not provide any kind of legal advice.</p> <p>Content published on http://127.0.0.1:5500/index%202.html#! is intended to be used and must be used for informational purposes only. It is very important to do your own analysis before making any decision based on your own personal circumstances. You should take independent legal advice from a professional or independently research and verify any information that you find on our Website and wish to rely upon. </p><p>THE USE OR RELIANCE OF ANY INFORMATION CONTAINED ON THIS SITE IS SOLELY AT YOUR OWN RISK.</p>
                            <p><b>AFFILIATES DISCLAIMER</b></p><p>The Site may contain links to affiliate websites, and we may receive an affiliate commission for any purchases or actions made by you on the affiliate websites using such links.</p>

                            <p><b>ERRORS AND OMISSIONS DISCLAIMER</b></p>
                            <p>While we have made every attempt to ensure that the information contained in this site has been obtained from reliable sources, Assyl is not responsible for any errors or omissions or for the results obtained from the use of this information. All information in this site is provided “as is”, with no guarantee of completeness, accuracy, timeliness or of the results obtained from the use of this information, and without warranty of any kind, express or implied, including, but not limited to warranties of performance, merchantability, and fitness for a particular purpose.</p> <p>In no event will Assyl, its related partnerships or corporations, or the partners, agents or employees thereof be liable to you or anyone else for any decision made or action taken in reliance on the information in this Site or for any consequential, special or similar damages, even if advised of the possibility of such damages.</p>
                            <p><b>GUEST CONTRIBUTORS DISCLAIMER</b></p><p>This Site may include content from guest contributors and any views or opinions expressed in such posts are personal and do not represent those of Assyl or any of its staff or affiliates unless explicitly stated.</p>
                            <p><b>LOGOS AND TRADEMARKS DISCLAIMER</b></p>
                            <p>All logos and trademarks of third parties referenced on Assyl's Domain are the trademarks and logos of their respective owners. Any inclusion of such trademarks or logos does not imply or constitute any approval, endorsement or sponsorship of Assyl by such owners.</p>
                            <p><b>CONTACT US</b></p>
                            <p>Should you have any feedback, comments, requests for technical support or other inquiries, please contact us by email: <b>assylchk@gmail.com</b>.</p>
                            <p style="margin-top: 5em; font-size: 0.7em;">This <a>Disclaimer</a> was created by <a>Assyl</a> on 2023-01-10.</p> 
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="privacy" minchecked="1" data-validation-minchecked-message="Choose One">
                        <label class="form-check-label" for="privacy" required>
                            Yes , I read all the privacy !
                        </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="privacy" >Close</button>
                    </div>
                </div>
            </div>
        </div>
        
        <script>
            var modalId = document.getElementById('modalId');
        
            modalId.addEventListener('show.bs.modal', function (event) {
                // Button that triggered the modal
                let button = event.relatedTarget;
                // Extract info from data-bs-* attributes
                let recipient = button.getAttribute('data-bs-whatever');
        
                // Use above variables to manipulate the DOM
            });
        </script>
        
        <?php }else { 
        header("Location: login.php");
        exit;
        }?>
        
        </body>
</html>
<?php }else {
	header("Location: login.php");
	exit;
} ?>