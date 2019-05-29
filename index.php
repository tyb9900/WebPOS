<?php
require_once("Classes/Sale.php");
session_start();
if(isset($_SESSION["username"]))
{
    $username = $_SESSION["username"];
    $type =  $_SESSION["type"];
    $img =  $_SESSION["userimg"];
    setcookie("username",$username,time()+60*60*24*7,"/");
    setcookie("type",$type,time()+60*60*24*7,"/");
    setcookie("userimg",$img,time()+60*60*24*7,"/");
}
else if(isset($_COOKIE["username"]))
{
    $username = $_COOKIE["username"];
    $type = $_COOKIE["type"];
    $_SESSION["username"] = $username;
    $_SESSION["type"] = $type;
    $_SESSION["userimg"] = $_COOKIE["userimg"];;

}
else
{
   header('Location: '."login.php");
}
?>

<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>POS | Dashboard</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">


</head>

<body>
<div id="wrapper">
<?php
include "sidebar.php";
?>

    <div id="page-wrapper" class="gray-bg">

        <?php
require ("navbar.php");
?>

        <div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-lg-3">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <span class="label label-success pull-right">Today</span>
                            <h5>Sale</h5>
                        </div>
                        <div class="ibox-content">
                            <h1 class="no-margins"><?php
                                $totalAmount=0;
                                $sale = new Sale();
                                //$date = DateTime::createFromFormat('d/m/Y', "24/04/2012");
                                $date = date('Y-m-d');
                                $sale->setDate($date);
                                $res = $sale->retriveToday();
                                if($res->rowCount()>0)
                                {
                                    $res = $res->fetchAll();
                                    foreach ($res as $r)
                                    {
                                        $totalAmount+=$r["Amount"];
                                    }
                                }
                                echo $totalAmount;
                                ?></h1>

                            <small>Total Sale</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <span class="label label-info pull-right">Current</span>
                            <h5>Stock</h5>
                        </div>
                        <div class="ibox-content">
                            <h1 class="no-margins"><?php
                                require_once ("Classes/Stock.php");
                                $stock = new Stock();
                                $res = $stock->retriveAll();
                                $amount=0;
                                if($res->rowCount()>0)
                                {
                                    $res = $res->fetchAll();
                                    foreach ($res as $r)
                                    {

                                        $amount+=$r["Amount"];

                                    }
                                }
                                echo $amount;
                                ?></h1>
                            <small>Current Stock</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <span class="label label-primary pull-right">Current</span>
                            <h5>Articles</h5>
                        </div>
                        <div class="ibox-content">
                            <h1 class="no-margins"><?php
                                require_once ("Classes/Article.php");
                                $art = new Article();
                                $res = $art->retriveAll();
                                echo $res->rowCount();

                                ?></h1>
                            <small>Total Articles</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <span class="label label-danger pull-right">Registered</span>
                            <h5>Users</h5>
                        </div>
                        <div class="ibox-content">
                            <h1 class="no-margins"><?php
                                require_once ("Classes/User.php");
                                $user = new User();
                                echo $user->getUserCount();

                                ?></h1>
                            <small>Registered Users</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Sale</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>

                            </div>
                        </div>

                        <div class="ibox-content">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables-example" id="cart">
                                    <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Bill</th>
                                        <th>Pairs</th>
                                        <th>Amount</th>

                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    $totalPairs = 0;
                                    $totalAmount = 0;
                                    $sale = new Sale();
                                    $res = $sale->retriveAll();
                                    if($res->rowCount()>0)
                                    {
                                        $res = $res->fetchAll();
                                        foreach ($res as $r)
                                        {
                                            echo "<tr class=\"gradeX\">";
                                            echo "<td>".$r["Date"]."</td>";
                                            echo "<td>".$r["BillNo"]."</td>";
                                            echo "<td>".$r["Pairs"]."</td>";
                                            echo "<td>".$r["Amount"]."</td>";
                                            echo "</tr>";
                                            $totalPairs+=$r["Pairs"];
                                            $totalAmount+=$r["Amount"];
                                        }
                                    }
                                    echo "</tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Date</th>
                                        <th>Bill</th>
                                        <th>Pairs</th>
                                        <th>Amount</th>

                                    </tr>
                                    </tfoot>

                                </table>
                            </div>
                            <div class=\"row\">
                                <div class=\"col-lg-6\">
                                    <div class=\"form-group\">
                                        <label>Total Pairs</label>
                                        <input type=\"text\" placeholder=\"Total Pairs\" id=\"totalPairs\" name=\"totalpairs\" value=\"$totalPairs\"
                                               class=\"form-control\" readonly required=\"\">
                                    </div>
                                </div>
                                <div class=\"col-lg-6\">
                                    <div class=\"form-group\">
                                        <label>Total Amount</label>
                                        <input type=\"text\" placeholder=\"Total Amount\" id=\"totalAmount\" name=\"totalAmount\" value=\"$totalAmount\"
                                               class=\"form-control\"  readonly required=\"\">"
                                    ?>


                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <?php
        include ("footer.php");
        ?>


    </div>

</div>

<!-- Mainly scripts -->
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>


<!-- Peity -->
<script src="js/plugins/peity/jquery.peity.min.js"></script>
<script src="js/demo/peity-demo.js"></script>

<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>

<!-- jQuery UI -->
<script src="js/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="js/pages.js"></script>


</body>
</html>
