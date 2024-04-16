<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MOONLIGHT ADMIN</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Navegación de palanca</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php">ADMIN </a>
            </div>

            <ul class="nav navbar-top-links navbar-right">

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="usersetting.php"><i class="fa fa-user fa-fw"></i> Perfil del usuario</a>
                        </li>
                        <li><a href="settings.php"><i class="fa fa-gear fa-fw"></i> Configuraciones</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Cerrar sesión</a>
                        </li>
                    </ul>

                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a href="home.php"><i class="fa fa-dashboard"></i> Estado</a>
                    </li>
                    <li>
                        <a href="messages.php"><i class="fa fa-desktop"></i> Mensajes Masivos</a>
                    </li>
                    <li>
                        <a href="roombook.php"><i class="fa fa-bar-chart-o"></i>Reserva de habitacion</a>
                    </li>
                    <li>
                        <a class="payment-menu" href="payment.php"><i class="fa fa-qrcode"></i> Pagos</a>
                    </li>
                    <li>
                        <a href="profit.php"><i class="fa fa-qrcode"></i> Lucro</a>
                    </li>

                    <li>
                        <a class="home-menu" href="settings.php"><i class="fa fa-dashboard"></i>Estado de la
                            habitación</a>
                    </li>
                    <li>
                        <a class="active-menu" href="room.php"><i class="fa fa-plus-circle"></i>Agregar habitación</a>
                    </li>



            </div>

        </nav>
        <!-- /. NAV SIDE  -->



        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            ACTUALIZAR HABITACIÓN <small></small>
                        </h1>
                    </div>
                </div>


                <div class="row">

                    <div class="col-md-5 col-sm-5">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                EDITAR NUEVA SALA

                            </div>
                            <div class="panel-body">
                                <form name="form" method="post">
                                    <div class="form-group">
                                        <label> Tipo de habitación
                                            *</label>
                                        <select name="troom" class="form-control" required>
                                            <option value selected></option>
                                            <option value="Superior Room">HABITACIÓN SUPERIOR</option>
                                            <option value="Deluxe Room">HABITACIÓN DE LUJO</option>
                                            <option value="Guest House">CASA DE HUESPEDES</option>
                                            <option value="Single Room">HABITACIÓN INDIVIDUAL</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Tipo de cama</label>
                                        <select name="bed" class="form-control" required>
                                            <option value selected></option>
                                            <option value="Single">Simple</option>
                                            <option value="Double">Double</option>
                                            <option value="Triple">Triple</option>
                                            <option value="Quad">Cuadruple</option>
                                            <option value="Triple">Ninguna</option>

                                        </select>

                                    </div>

                                    <div class="form-group">
                                        <label>Precio</label>
                                        <input type="number" name="precio" class="form-control" required>
                                    </div>
                                    <input type="submit" name="add" value="Agregar" class="btn btn-primary">
                                </form>
                                <?php
                                include ('db.php');
                                if (isset($_POST['add'])) {
                                    $room = $_POST['troom'];
                                    $bed = $_POST['bed'];
                                    $place = 'Free';
                                    $precio = $_POST['precio'];

                                    $check = "SELECT * FROM room WHERE type = '$room' AND bedding = '$bed' AND precio = '$precio'";
                                    $rs = mysqli_query($con, $check);

                                    if ($rs && mysqli_num_rows($rs) > 0) {
                                        echo "<script type='text/javascript'> alert('La habitacion ya existe!!')</script>";
                                    } else {
                                        $sql = "INSERT INTO `room` (`type`, `bedding`, `place`, `cusid`, `precio`) VALUES ('$room', '$bed', '$place', NULL, '$precio')";
                                        if (mysqli_query($con, $sql)) {
                                            echo '<script>alert("Nueva habitacion agregada") </script>';
                                        } else {
                                            echo '<script>alert("Lo sineto, algo ha fallado :(") </script>';
                                        }
                                    }
                                }
                                ?>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- /. PAGE INNER  -->
            </div>
            <!-- /. PAGE WRAPPER  -->
        </div>
        <!-- /. WRAPPER  -->
        <!-- JS Scripts-->
        <!-- jQuery Js -->
        <script src="assets/js/jquery-1.10.2.js"></script>
        <!-- Bootstrap Js -->
        <script src="assets/js/bootstrap.min.js"></script>
        <!-- Metis Menu Js -->
        <script src="assets/js/jquery.metisMenu.js"></script>
        <!-- Custom Js -->
        <script src="assets/js/custom-scripts.js"></script>
        <!-- Capture ID-->
        <script src="assets/js/capture-id.js"></script>



</body>

</html>