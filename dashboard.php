<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> PHP CRUD with Bootstrap Modal </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
</head>
<nav class="navbar navbar-expand-lg navbar-dark" id="mainNav">
                <div class="container">
                <a class="navbar-brand" href="#page-top"><img style="width: 50px;height: 50px; display:block" src="assets/img/navbar-logo.svg" alt="..." /></a>
                <button class="navbar-toggler" type="button" style="" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="home.php" style="margin-left:800%;" >Admin Panel</a></li>
                    </ul>
                </div>
            </div>
        </nav>
<body style="background-color:#000">
    <!-- Modal -->
    <div class="modal fade" id="studentaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Student Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="insertcode.php" method="POST">

                    <div class="modal-body">
                        <div class="form-group">
                            <label> First Name </label>
                            <input type="text" name="fname" class="form-control" placeholder="Enter First Name"required>
                        </div>

                        <div class="form-group">
                            <label> Last Name </label>
                            <input type="text" name="uname" class="form-control" placeholder="Enter Last Name"required>
                        </div>

                        <div class="form-group">
                            <label> Email </label>
                            <input type="text" name="email" class="form-control" placeholder="Enter Email"required>
                        </div>

                        <div class="form-group">
                            <label> Phone Number </label>
                            <input name="phone" type="tel" pattern="[0-9]{8}" class="form-control" placeholder="Enter Phone Number"required>
                        </div>
                        <div class="form-group">
                            <label> Location </label>
                            <input type="text" name="location" class="form-control" placeholder="Enter Location"required>
                        </div>
                        <div class="form-group">
                            <label> Password </label>
                            <input type="text" name="password" class="form-control" placeholder="Enter Password"required>
                        </div>
                        <div class="form-group">
                            <label> Statut </label>
                            <input type="text" name="statut" class="form-control" placeholder="Enter Status"required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="color:black">Close</button>
                        <button type="submit" name="insertdata" class="btn" style="background-color:#ffc800">Save Data</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- EDIT POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Edit Student Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="updatecode.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="update_id" id="update_id">

                        <div class="form-group">
                            <label> First Name </label>
                            <input type="text" name="fname" id="fname" class="form-control"placeholder="Enter First Name">
                        </div>

                        <div class="form-group">
                            <label> Last Name </label>
                            <input type="text" name="uname" id="uname" class="form-control"placeholder="Enter Last Name">
                        </div>

                        <div class="form-group">
                            <label> Email </label>
                            <input type="text" name="email" id="email" class="form-control"placeholder="Enter Email">
                        </div>

                        <div class="form-group">
                            <label> Phone Number </label>
                            <input name="phone" id="phone" type="tel" pattern="[0-9]{8}" class="form-control"placeholder="Enter Phone Number">
                        </div>
                        <div class="form-group">
                            <label> Location </label>
                            <input type="text" name="location" id="location" class="form-control"placeholder="Enter Location">
                        </div>
                        <div class="form-group">
                            <label> Password </label>
                            <input type="text" name="password" id="password" class="form-control"placeholder="Enter Password"disabled>
                        </div>
                        <div class="form-group">
                            <label> Gender </label>
                            <input type="text" name="gender" id="gender" class="form-control"placeholder="Enter Gender">
                        </div>
                        <div class="form-group">
                            <label> Statut </label>
                            <input type="text" name="statut" id="statut" class="form-control"placeholder="Enter Statut">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="updatedata" class="btn btn-primary">Update Data</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- DELETE POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Delete Student Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="deletecode.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="delete_id" id="delete_id">

                        <h4> Do you want to Delete this Data ??</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> NO </button>
                        <button type="submit" name="deletedata" class="btn btn-primary"> Yes !! Delete it. </button>
                    </div>
                </form>

            </div>
        </div>
    </div>


    <!-- VIEW POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="viewmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> View Student Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="deletecode.php" method="POST">

                    <div class="modal-body">

                        <input type="text" name="view_id" id="view_id">

                        <!-- <p id="fname"> </p> -->
                        <h4 id="fname"> <?php echo ''; ?> </h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> CLOSE </button>
                        <!-- <button type="submit" name="deletedata" class="btn btn-primary"> Yes !! Delete it. </button> -->
                    </div>
                </form>

            </div>
        </div>
    </div>


    <div class="container" >
        <div class="jumbotron" style="background-color:#000">
            <div class="card" style="background-color:#000">
                <h2></h2>
            </div>
            <div class="card" style="background-color:#000">
                <div class="card-body" style="background-color:#dcdee1">
                    <button type="button" class="btn" style="background-color:#ffc800" data-toggle="modal" data-target="#studentaddmodal">
                        ADD DATA
                    </button>
                </div>
            </div>

            <div class="card" style="background-color:white">
                <div class="card-body" style="background-color:white">

                    <?php
                $connection = mysqli_connect("localhost","root","");
                $db = mysqli_select_db($connection, 'auth_db');

                $query = "SELECT * FROM users";
                $query_run = mysqli_query($connection, $query);
            ?>
                    <table id="datatableid" class="table table-bordered table-dark" style="background-color:#000">
                        <thead>
                            <tr>
                                <th scope="col"> ID</th>
                                <th scope="col">First Name</th>
                                <th scope="col">User Name </th>
                                <th scope="col"> Email </th>
                                <th scope="col"> Phone </th>
                                <th scope="col"> Location </th>
                                <th scope="col"> Password </th>
                                <th scope="col"> Gender </th>
                                <th scope="col"> Statut </th>
                                <th scope="col"> EDIT </th>
                                <th scope="col"> DELETE </th>
                            </tr>
                        </thead>
                        <?php
                if($query_run)
                {
                    foreach($query_run as $row)
                    {
            ?>
                        <tbody style="background-color:#000">
                            <tr>
                                <td><?php echo $row['id'];?></td>
                                <td><?php echo $row['fname'];?></td>
                                <td><?php echo $row['uname'];?></td>
                                <td><?php echo $row['email'];?></td>
                                <td><?php echo $row['phone'];?></td>
                                <td><?php echo $row['location'];?></td>
                                <td><?php echo "Access Denied";?></td>
                                <td><?php echo $row['gender'];?></td>
                                <td><?php echo $row['statut'];?></td>
                                <td>
                                    <button type="button" class="btn editbtn" style="background-color:#ffc800"> EDIT </button>
                                </td>
                                <td>
                                    <button type="button" class="btn deletebtn" style="background-color:#ffc800"> DELETE </button>
                                </td>
                                <td></td>
                            </tr>
                        </tbody>
                        <?php           
                    }
                }
                else 
                {
                    echo "No Record Found";
                }
            ?>
                    </table>
                </div>
            </div>


        </div>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function () {

            $('.viewbtn').on('click', function () {
                $('#viewmodal').modal('show');
                $.ajax({ //create an ajax request to display.php
                    type: "GET",
                    url: "display.php",
                    dataType: "html", //expect html to be returned                
                    success: function (response) {
                        $("#responsecontainer").html(response);
                        //alert(response);
                    }
                });
            });

        });
    </script>


    <script>
        $(document).ready(function () {

            $('#datatableid').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search Your Data",
                }
            });

        });
    </script>

    <script>
        $(document).ready(function () {

            $('.deletebtn').on('click', function () {

                $('#deletemodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_id').val(data[0]);

            });
        });
    </script>

    <script>
        $(document).ready(function () {

            $('.editbtn').on('click', function () {

                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#update_id').val(data[0]);
                $('#fname').val(data[1]);
                $('#uname').val(data[2]);
                $('#email').val(data[3]);
                $('#phone').val(data[4]);
                $('#location').val(data[5]);
                $('#password').val(data[6]);
                $('#gender').val(data[7]);
                $('#statut').val(data[8]);
            });
        });
    </script>


</body>
</html>