<?php
session_start();
require ("Classes/User.php");

if(isset($_POST["Adduser"]))
{
    $username = $_POST["username"];
    $password = $_POST["password"];
    $type="user";
    $user = new User;
    if($user->createNewUser($username,$password,$type))
    {
        echo "<script>alert(\"SUCCESS\");</script>";
    }
    else{
        echo "<script>alert(\"Account Creation Failed!\");</script>";
    }
}
else if(isset($_POST["UpdateUser"]))
{
    $username = $_POST["username"];
    $type=$_POST["type"];
    $user = new User;
    if($user->updateUser($username,$type))
    {
        echo "<script>alert(\"SUCCESS\");</script>";
    }
    else{
        echo "<script>alert(\"Account Updation Failed!\");</script>";
    }
}
else if(isset($_POST["DeleteUser"]))
{
    $username = $_POST["username"];
    $user = new User;
    if($user->deleteUser($username))
    {
        echo "<script>alert(\"SUCCESS\");</script>";
    }
    else{
        echo "<script>alert(\"Account Updation Failed!\");</script>";
    }
}
?>


<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>POS | Article</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">

    <link href="css/plugins/select2/select2.min.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">



</head>

<body>
<div id="wrapper">
    <?php
    include("sidebar.php");
    ?>

    <div id="page-wrapper" class="gray-bg">

        <?php
        require ("navbar.php");
        ?>

        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Users</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li class="active">
                        <strong>Manage Users</strong>
                    </li>
                </ol>
            </div>
        </div>
        <br>


        <div class="row">
            <div class="col-lg-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Add New User</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>

                        </div>
                    </div>
                    <div class="ibox-content">
                        <form role="form" action="" method="post">
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <input type="text" placeholder="Username" id="username" name="username"
                                           class="form-control"  required="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <input type="password" placeholder="Password" id="password" name="password"
                                           class="form-control"  required="">
                                </div>
                            </div>



                            <input class="btn btn-success center-block" type="submit" value="Add User" name="Adduser">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Update User</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>

                        </div>
                    </div>
                    <div class="ibox-content">
                        <form role="form" action="" method="post">
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <select class="select2_demo_3 form-group col-lg-12" name="username" required="">
                                        <option></option>
                                        <?php
                                        $user = new User();
                                        $res = $user->getUsers();
                                        if($res->rowCount()>0)
                                        {
                                            $res = $res->fetchAll();
                                            foreach ($res as $r)
                                            {
                                                echo "<option value=\"".$r["username"]."\">".$r["username"]."</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <select class="select2_demo_3 form-group col-lg-12" name="type" required="">
                                        <option></option>
                                        <option value="Admin">Admin</option>
                                        <option value="User">User</option>
                                    </select>
                                </div>
                            </div>




                            <input class="btn btn-success center-block" type="submit" value="Update User" name="UpdateUser">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Delete User</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>

                        </div>
                    </div>
                    <div class="ibox-content">
                        <form role="form" action="" method="post">
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <select class="select2_demo_3 form-group col-lg-12" name="username" required="">
                                        <option></option>
                                        <?php
                                        $user = new User();
                                        $res = $user->getUsers();
                                        if($res->rowCount()>0)
                                        {
                                            $res = $res->fetchAll();
                                            foreach ($res as $r)
                                            {
                                                echo "<option value=\"".$r["username"]."\">".$r["username"]."</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <input class="btn btn-success center-block" type="submit" value="Delete User" name="DeleteUser">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Users Table</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>

                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Type</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $user = new User();
                                    $res = $user->getUsers();
                                    if($res->rowCount()>0)
                                    {
                                        $res = $res->fetchAll();
                                        foreach ($res as $r)
                                        {
                                            echo "<tr class=\"gradeX\">";
                                            echo "<td>".$r["username"]."</td>";
                                            echo "<td>".$r["type"]."</td>";

                                            echo "</tr>";
                                        }
                                    }
                                ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Username</th>
                                    <th>Type</th>

                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <?php
        include ("footer.php");
        ?>



    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="js/plugins/dataTables/datatables.min.js"></script>


    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- Typehead -->
    <script src="js/plugins/typehead/bootstrap3-typeahead.min.js"></script>

    <!-- Select2 -->
    <script src="js/plugins/select2/select2.full.min.js"></script>


    <!-- Page-Level Scripts -->
    <script>


        $(document).ready(function () {
            $(".select2_demo_3").select2({
                placeholder: "Select User",
                allowClear: true
            });



            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                        customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        }
                    }
                ]

            });

        });

    </script>



</body>
</html>