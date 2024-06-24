<?php
session_start();
if (!isset($_SESSION["user"])) {
	header("location:index.php");
}
?>

<?php
if (!isset($_GET["rid"])) {

	header("location:index.php");
} else {
	$curdate = date("Y/m/d");
	include ('db.php');
	$id = $_GET['rid'];


	$sql = "Select * from roombook where id = '$id'";
	$re = mysqli_query($con, $sql);
	while ($row = mysqli_fetch_array($re)) {
		$title = $row['Title'];
		$fname = $row['FName'];
		$lname = $row['LName'];
		$email = $row['Email'];
		$nat = $row['National'];
		$country = $row['Country'];
		$Phone = $row['Phone'];
		$troom = $row['TRoom'];
		$nroom = $row['NRoom'];
		$bed = $row['Bed'];
		$non = $row['NRoom'];
		$meal = $row['Meal'];
		$cin = $row['cin'];
		$cout = $row['cout'];
		$sta = $row['stat'];
		$days = $row['nodays'];



	}




}



?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Administrador </title>
	<!-- Bootstrap Styles-->
	<link href="assets/css/bootstrap.css" rel="stylesheet" />
	<!-- FontAwesome Styles-->
	<link href="assets/css/font-awesome.css" rel="stylesheet" />
	<!-- Morris Chart Styles-->
	<link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
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
					<span class="sr-only">Navegación de palanca
					</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="home.php"> <?php echo $_SESSION["user"]; ?> </a>
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
						<a class="active-menu" href="roombook.php"><i class="fa fa-bar-chart-o"></i> Reserva de
							habitacion</a>
					</li>
					<li>
						<a href="payment.php"><i class="fa fa-qrcode"></i> Pagos</a>
					</li>
					<li>
						<a href="profit.php"><i class="fa fa-qrcode"></i> Lucro</a>
					</li>

					<li>
						<a class="home-menu" href="settings.php"><i class="fa fa-dashboard"></i>Estado de la
							habitación</a>
					</li>
					<li>
						<a href="room.php"><i class="fa fa-plus-circle"></i>Agregar habitación</a>
					</li>
					<li>
						<a href="roomdel.php"><i class="fa fa-pencil-square-o"></i> Eliminar habitación</a>
					</li>




				</ul>

			</div>

		</nav>
		<!-- /. NAV SIDE  -->




		<div id="page-wrapper">
			<div id="page-inner">


				<div class="row">
					<div class="col-md-12">
						<h1 class="page-header">
							Reserva de habitacion<small> <?php echo $curdate; ?> </small>
						</h1>
					</div>


					<div class="col-md-8 col-sm-8">
						<div class="panel panel-info">
							<div class="panel-heading">
								Confirmación de reserva
							</div>
							<div class="panel-body">

								<div class="table-responsive">
									<table class="table">
										<tr>
											<th>DESCRIPCION</th>
											<th>INFORMATION</th>

										</tr>
										<tr>
											<th>nombre</th>
											<th><?php echo $title . $fname . $lname; ?> </th>

										</tr>
										<tr>
											<th>Email</th>
											<th><?php echo $email; ?> </th>

										</tr>
										<tr>
											<th>Nacionalidad </th>
											<th><?php echo $nat; ?></th>

										</tr>
										<tr>
											<th>Pais </th>
											<th><?php echo $country; ?></th>

										</tr>
										<tr>
											<th> No Telefono</th>
											<th><?php echo $Phone; ?></th>

										</tr>
										<tr>
											<th>Tipo de la habitación</th>
											<th><?php echo $troom; ?></th>

										</tr>
										<tr>
											<th>No De la habitación </th>
											<th><?php echo $nroom; ?></th>

										</tr>
										<tr>
											<th>Régimen de comidas </th>
											<th><?php echo $meal; ?></th>

										</tr>
										<tr>
											<th>Lecho </th>
											<th><?php echo $bed; ?></th>

										</tr>
										<tr>
											<th>Fecha de entrada</th>
											<th><?php echo $cin; ?></th>

										</tr>
										<tr>
											<th>Fecha de salida</th>
											<th><?php echo $cout; ?></th>

										</tr>
										<tr>
											<th>No de dias</th>
											<th><?php echo $days; ?></th>

										</tr>
										<tr>
											<th>Nivel de estado</th>
											<th><?php echo $sta; ?></th>

										</tr>





									</table>
								</div>



							</div>
							<div class="panel-footer">
								<form method="post">
									<div class="form-group">
										<label>Seleccione la Conformación</label>
										<select name="conf" class="form-control">
											<option value selected> </option>
											<option value="Conform">Conform</option>


										</select>
									</div>
									<input type="submit" name="co" value="Conform" class="btn btn-success">

								</form>
							</div>
						</div>
					</div>

					<?php
					$rsql = "select * from room";
					$rre = mysqli_query($con, $rsql);
					$r = 0;
					$sc = 0;
					$gh = 0;
					$sr = 0;
					$dr = 0;
					while ($rrow = mysqli_fetch_array($rre)) {
						$r = $r + 1;
						$s = $rrow['type'];
						$p = $rrow['place'];
						if ($s == "Superior Room") {
							$sc = $sc + 1;
						}

						if ($s == "Guest House") {
							$gh = $gh + 1;
						}
						if ($s == "Single Room") {
							$sr = $sr + 1;
						}
						if ($s == "Deluxe Room") {
							$dr = $dr + 1;
						}


					}
					?>

					<?php
					$csql = "select * from payment";
					$cre = mysqli_query($con, $csql);
					$cr = 0;
					$csc = 0;
					$cgh = 0;
					$csr = 0;
					$cdr = 0;
					while ($crow = mysqli_fetch_array($cre)) {
						$cr = $cr + 1;
						$cs = $crow['troom'];

						if ($cs == "Superior Room") {
							$csc = $csc + 1;
						}

						if ($cs == "Guest House") {
							$cgh = $cgh + 1;
						}
						if ($cs == "Single Room") {
							$csr = $csr + 1;
						}
						if ($cs == "Deluxe Room") {
							$cdr = $cdr + 1;
						}


					}

					?>
					<div class="col-md-4 col-sm-4">
						<div class="panel panel-default">
							<div class="panel-heading">
								Detalles de habitaciones disponibles
							</div>
							<div class="panel-body">
								<table width="200px">
									<?php
									// Consultas para obtener la cantidad de habitaciones disponibles por tipo
									$sql_superior = "SELECT COUNT(*) AS count FROM room WHERE type = 'Superior Room' AND place = 'Free'";
									$sql_guest_house = "SELECT COUNT(*) AS count FROM room WHERE type = 'Guest House' AND place = 'Free'";
									$sql_single_room = "SELECT COUNT(*) AS count FROM room WHERE type = 'Single Room' AND place = 'Free'";
									$sql_deluxe_room = "SELECT COUNT(*) AS count FROM room WHERE type = 'Deluxe Room' AND place = 'Free'";
									$sql_total_rooms = "SELECT COUNT(*) AS count FROM room WHERE place = 'Free'";

									// Ejecutar las consultas
									$result_superior = mysqli_query($con, $sql_superior);
									$result_guest_house = mysqli_query($con, $sql_guest_house);
									$result_single_room = mysqli_query($con, $sql_single_room);
									$result_deluxe_room = mysqli_query($con, $sql_deluxe_room);
									$result_total_rooms = mysqli_query($con, $sql_total_rooms);

									// Obtener el número de habitaciones disponibles
									$count_superior = mysqli_fetch_assoc($result_superior)['count'];
									$count_guest_house = mysqli_fetch_assoc($result_guest_house)['count'];
									$count_single_room = mysqli_fetch_assoc($result_single_room)['count'];
									$count_deluxe_room = mysqli_fetch_assoc($result_deluxe_room)['count'];
									$count_total_rooms = mysqli_fetch_assoc($result_total_rooms)['count'];

									// Mostrar los resultados en la tabla
									?>
									<tr>
										<td><b>Habitación superior</b></td>
										<td><button type="button"
												class="btn btn-primary btn-circle"><?php echo ($count_superior <= 0) ? "NO" : $count_superior; ?></button>
										</td>
									</tr>
									<tr>
										<td><b>Casa de huéspedes</b></td>
										<td><button type="button"
												class="btn btn-primary btn-circle"><?php echo ($count_guest_house <= 0) ? "NO" : $count_guest_house; ?></button>
										</td>
									</tr>
									<tr>
										<td><b>Habitación individual</b></td>
										<td><button type="button"
												class="btn btn-primary btn-circle"><?php echo ($count_single_room <= 0) ? "NO" : $count_single_room; ?></button>
										</td>
									</tr>
									<tr>
										<td><b>Habitación de lujo</b></td>
										<td><button type="button"
												class="btn btn-primary btn-circle"><?php echo ($count_deluxe_room <= 0) ? "NO" : $count_deluxe_room; ?></button>
										</td>
									</tr>
									<tr>
										<td><b>Total de habitaciones</b></td>
										<td><button type="button"
												class="btn btn-danger btn-circle"><?php echo ($count_total_rooms <= 0) ? "NO" : $count_total_rooms; ?></button>
										</td>
									</tr>
								</table>
							</div>
							<div class="panel-footer">
							</div>
						</div>
					</div>

				</div>
				<!-- /. ROW  -->

			</div>
			<!-- /. ROW  -->




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
	<!-- Morris Chart Js -->
	<script src="assets/js/morris/raphael-2.1.0.min.js"></script>
	<script src="assets/js/morris/morris.js"></script>
	<!-- Custom Js -->
	<script src="assets/js/custom-scripts.js"></script>


</body>

</html>
<?php
if (isset($_POST['co'])) {
    $st = $_POST['conf'];

    // Verificar si la habitación está disponible
    $check_room_sql = "SELECT * FROM room WHERE type = '$troom' AND bedding = '$bed' AND place = 'Free' LIMIT 1";
    $check_room_result = mysqli_query($con, $check_room_sql);

    if (mysqli_num_rows($check_room_result) > 0) {
        // La habitación está disponible, proceder con la reserva
        $urb = "UPDATE `roombook` SET `stat`='$st' WHERE id = '$id'";

        if (mysqli_query($con, $urb)) {
            // Habitación marcada como reservada correctamente

            // Cálculos relacionados con el precio
            $type_of_room = 0;
            if ($troom == "Superior Room") {
                $type_of_room = 250000;
            } else if ($troom == "Deluxe Room") {
                $type_of_room = 600000;
            } else if ($troom == "Guest House") {
                $type_of_room = 1000000;
            } else if ($troom == "Single Room") {
                $type_of_room = 195000;
            }

            $type_of_bed = 0;
            if ($bed == "Single") {
                $type_of_bed = $type_of_room * 1 / 100;
            } else if ($bed == "Double") {
                $type_of_bed = $type_of_room * 2 / 100;
            } else if ($bed == "Triple") {
                $type_of_bed = $type_of_room * 3 / 100;
            } else if ($bed == "Quad") {
                $type_of_bed = $type_of_room * 4 / 100;
            } 

            $type_of_meal = 0;
            if ($meal == "Room only") {
                $type_of_meal = $type_of_bed * 0;
            } else if ($meal == "Breakfast") {
                $type_of_meal = $type_of_bed * 2;
            } else if ($meal == "Lunch") {
                $type_of_meal = $type_of_bed * 3;
            } else if ($meal == "Dinner") {
                $type_of_meal = $type_of_bed * 4;
            } else if ($meal == "Full Board") {
                $type_of_meal = $type_of_bed * 5;
            }

            $ttot = $type_of_room * $days;
            $mepr = $type_of_meal * $days;
            $btot = $type_of_bed * $days;
            $fintot = $ttot + $mepr + $btot;

            // Insertar detalles de pago en la base de datos
            $psql = "INSERT INTO `payment`(`id`, `title`, `fname`, `lname`, `troom`, `tbed`, `nroom`, `cin`, `cout`, `ttot`, `meal`, `mepr`, `btot`, `fintot`, `noofdays`) VALUES ('$id','$title','$fname','$lname','$troom','$bed','$nroom','$cin','$cout','$ttot','$meal','$mepr','$btot','$fintot','$days')";

            if (mysqli_query($con, $psql)) {
                // Actualizar la disponibilidad de la habitación
                $notfree = "NotFree";
                $room = mysqli_fetch_assoc($check_room_result);
                $room_id = $room['id'];

                $rpsql = "UPDATE `room` SET `place`='$notfree', `cusid`='$id' WHERE id='$room_id'";
                if (mysqli_query($con, $rpsql)) {
                    echo "<script type='text/javascript'> alert('Reserva confirmada')</script>";
                    echo "<script type='text/javascript'> window.location='roombook.php'</script>";
                }
            } else {
                echo "<script type='text/javascript'> alert('Error al insertar detalles de pago')</script>";
            }
        } else {
            echo "<script type='text/javascript'> alert('Error al marcar la reserva como confirmada')</script>";
        }
    } else {
        echo "<script type='text/javascript'> alert('La habitación seleccionada ya está reservada')</script>";
    }
}

?>