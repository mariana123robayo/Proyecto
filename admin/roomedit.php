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

                            <?php
                            include('db.php');

                            if (isset($_GET['id'])) {
                                $id = $_GET['id'];
                                $sql = "SELECT * FROM room WHERE id = $id";
                                $result = mysqli_query($con, $sql);
                                if ($result) {
                                    $room = mysqli_fetch_assoc($result);
                                } else {
                                    echo "Error al obtener los datos de la habitación.";
                                    exit;
                                }
                            }
                        ?>

                        <div class="panel-body">
                                <form name="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                    <input type="hidden" name="id_hab" value="<?php echo $room['id']; ?>">

                                    <div class="form-group">
                                        <label> Tipo de habitación *</label>
                                        <select name="troom" class="form-control" required>
                                            <option value=""></option>
                                            <option value="Superior Room" <?php echo $room['type'] == 'Superior Room' ? 'selected' : ''; ?>>HABITACIÓN SUPERIOR</option>
                                            <option value="Deluxe Room" <?php echo $room['type'] == 'Deluxe Room' ? 'selected' : ''; ?>>HABITACIÓN DE LUJO</option>
                                            <option value="Guest House" <?php echo $room['type'] == 'Guest House' ? 'selected' : ''; ?>>CASA DE HUESPEDES</option>
                                            <option value="Single Room" <?php echo $room['type'] == 'Single Room' ? 'selected' : ''; ?>>HABITACIÓN INDIVIDUAL</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Tipo de cama</label>
                                        <select name="bed" class="form-control" required>
                                            <option value=""></option>
                                            <option value="Single" <?php echo $room['bedding'] == 'Single' ? 'selected' : ''; ?>>Simple</option>
                                            <option value="Double" <?php echo $room['bedding'] == 'Double' ? 'selected' : ''; ?>>Double</option>
                                            <option value="Triple" <?php echo $room['bedding'] == 'Triple' ? 'selected' : ''; ?>>Triple</option>
                                            <option value="Quad" <?php echo $room['bedding'] == 'Quad' ? 'selected' : ''; ?>>Cuadruple</option>
                                            <option value="Triple" <?php echo $room['bedding'] == 'Triple' ? 'selected' : ''; ?>>Ninguna</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Precio</label>
                                        <input type="number" name="precio" class="form-control" value="<?php echo $room['precio']; ?>" required>
                                    </div>

                                    <input type="submit" name="update" value="Actualizar" class="btn btn-primary">
                                </form>

                                <?php
                                    include('db.php');

                                    if (isset($_POST['update'])) {
                                        $id = $_POST['id_hab'];
                                        $room = $_POST['troom'];
                                        $bed = $_POST['bed'];
                                        $place = $_POST['$place']; 
                                        $precio = $_POST['precio'];

                                        // Consulta SQL para actualizar el registro
                                        $sql = "UPDATE `room` SET `type` = '$room', `bedding` = '$bed', `place` = '$place', `cusid` = NULL, `precio` = '$precio' WHERE `id` = $id";

                                        if (mysqli_query($con, $sql)) {
                                            echo '<script>alert("Habitación actualizada correctamente"); window.location.href = "room.php";</script>';
                                        } else {
                                            echo '<script>alert("Lo siento, algo ha fallado :("); window.location.href = "roomedit.php?id=' . $id . '";</script>';
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