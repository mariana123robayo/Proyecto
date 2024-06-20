<link href='fullcalendar-scheduler/main.css' rel='stylesheet' />
<script src='fullcalendar-scheduler/main.js'></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<?php
include ('db.php')
    ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MOONLIGHT RESERVACIÓN</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
            <script>
            document.addEventListener('DOMContentLoaded', function () {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    timeZone: 'UTC',
                    height: "auto",
                    aspectRatio: 1.5,
                    initialView: 'resourceTimelineWeek',
                    headerToolbar: {
                        left: 'prev,next,today',
                        center: 'title',
                        right: 'resourceTimelineWeek,dayGridMonth'
                    },
                    slotDuration: '24:00:00',
                    resourceAreaWidth: '20%',
                    resourceAreaHeaderContent: 'Camas',
                    resources: [],
                    events: []
                });

                calendar.render();
                $(".fc-license-message").hide();
                

                
                document.getElementById('tipoHabitacion').addEventListener('change', function() {
                var tipoHabitacion = this.value;  

                 // Fetch new events based on the selected room type
                fetch('getEvents.php?tipoHabitacion=' + encodeURIComponent(tipoHabitacion))
                    .then(function(response) {
                        return response.json();  
                    })
                    .then(function(events) {
                        // Clear any existing events
                        calendar.removeAllEvents();

                        // Add new events
                        events.forEach(function(event) {
                            calendar.addEvent(event);
                        });
                    })
                    .catch(function(error) {
                        console.error('Error while fetching events:', error);
                    });

                fetch('getRoomData.php?tipoHabitacion=' + encodeURIComponent(tipoHabitacion))
                    .then(function(response) {
                        return response.json();  
                    })
                    .then(function(data) {
                        
                        calendar.setOption('resources', data);
                    })
                    .catch(function(error) {
                        console.error('Error al cargar los recursos:', error);
                    });
            });
                });
            </script>
<body>

    <div id="wrapper">
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a href="../index.php"><i class="fa fa-home"></i> Página principal</a>
                    </li>

                </ul>

            </div>

        </nav>

        <div id="page-wrapper">
        <div class="calendar-container">
                <div id="calendar"></div>
            </div>
          

            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            RESERVACIÓN <small></small>
                        </h1>
                    </div>
                </div>


                <div class="row">

                    <div class="col-md-5 col-sm-5">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                INFORMACIÓN PERSONAL
                            </div>
                            <div class="panel-body">
                                <form name="form" method="post">
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input name="fname" class="form-control" required>

                                    </div>
                                    <div class="form-group">
                                        <label>Apellido</label>
                                        <input name="lname" class="form-control" required>

                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input name="email" type="email" class="form-control" required>

                                    </div>

                                    <?php

                                    $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");

                                    ?>

                                    <div class="form-group">
                                        <label>Passport Country*</label>
                                        <select name="country" class="form-control" required>
                                            <option value selected></option>
                                            <?php
                                            foreach ($countries as $key => $value):
                                                echo '<option value="' . $value . '">' . $value . '</option>'; //close your tags!!
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input name="phone" type="text" class="form-control" required>

                                    </div>

                            </div>

                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    INFORMACIÓN DE RESERVA

                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label>Tipo de habitación*</label>
                                        <select id='tipoHabitacion' name='troom' class='form-control capture-type'
                                            title='Seleccione el tipo de habitación'>
                                            <option value="" selected></option>
                                            <?php
                                            $sql_type = "SELECT DISTINCT type FROM room";
                                            $result_type = $con->query($sql_type);
                                            if ($result_type->num_rows > 0) {
                                                while ($row_type = $result_type->fetch_assoc()) {
                                                    $type = $row_type['type'];
                                                    echo "<option value='$type' data-type='$type'>$type</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                    <label>Tipo de cama</label>
                                    <select id="tipoCama" name="bed" class="form-control" required>
                                        <option value selected> Seleccione una habitación primero</option>
                                    </select>
                                </div>

                                
                                <script>
                                    $(document).ready(function() {
                                        $('#tipoHabitacion').change(function() {
                                            var tipoHabitacion = $(this).val();
                                            $.ajax({
                                                url: 'getCamas.php',
                                                method: 'POST',
                                                data: { tipoHabitacion: tipoHabitacion },
                                                success: function(response) {
                                                    $('#tipoCama').html(response);
                                                }
                                            });
                                        });
                                    });
                                </script>

                                    <div class="form-group">
                                        <label>Régimen de comidas</label>
                                        <select name="meal" class="form-control" required>
                                            <option value selected></option>
                                            <option value="Room only">Sólo habitación</option>
                                            <option value="Breakfast">Desayuno</option>
                                            <option value="Lunch">Almuerzo</option>
                                            <option value="Dinner">Cena</option>
                                            <option value="Full Board">Alimentación Completa</option>



                                        </select>
                                    </div>
                                    <div class="form-group">
                                    <label>Entrada</label>
                                    <input name="cin" type="date" class="form-control" id="fechaEntrada">
                                </div>
                                <div class="form-group">
                                    <label>Salida</label>
                                    <input name="cout" type="date" class="form-control" id="fechaSalida">
                                </div>

                                <script>
                                    // Función para verificar la fecha de salida
                                    function verificarFechaSalida() {
                                        var fechaEntrada = document.getElementById("fechaEntrada").value;
                                        var fechaSalida = document.getElementById("fechaSalida").value;

                                        if (fechaSalida < fechaEntrada) {
                                            alert("La fecha de salida debe ser posterior a la fecha de entrada");
                                            document.getElementById("fechaSalida").value = "";
                                        }
                                    }

                                    // Obtener la fecha actual
                                    var fechaActual = new Date();
                                    var dd = String(fechaActual.getDate()).padStart(2, '0');
                                    var mm = String(fechaActual.getMonth() + 1).padStart(2, '0'); 
                                    var yyyy = fechaActual.getFullYear();
                                    var fechaHoy = yyyy + '-' + mm + '-' + dd;

                                    document.getElementById("fechaEntrada").setAttribute("min", fechaHoy);
                                    

                                    document.getElementById("fechaSalida").addEventListener("change", verificarFechaSalida);
                                </script>
                                </div>

                            </div>
                            
                        </div>


                        <div class="col-md-12 col-sm-12">
                            <div class="well">
                                <h4>VERIFICACIÓN HUMANA</h4>
                                <p>Escriba debajo de este código
                                    <?php $Random_code = rand();
                                    echo $Random_code; ?>
                                </p><br />
                                <p>Ingrese el código aleatorio
                                    <br />
                                </p>
                                <input type="text" name="code1" title="random code" />
                                <input type="hidden" name="code" value="<?php echo $Random_code; ?>" />
                                <input type="submit" name="submit" class="btn btn-primary">
                                <?php
                                if (isset($_POST['submit'])) {
                                    $code1 = $_POST['code1'];
                                    $code = $_POST['code'];
                                    if ($code1 != "$code") {
                                        $msg = "Invalide code";
                                    } else {

                                        $con = mysqli_connect("localhost", "root", "", "hotel");
                                        $check = "SELECT * FROM roombook WHERE email = '$_POST[email]'";
                                        $rs = mysqli_query($con, $check);
                                        $data = mysqli_fetch_array($rs, MYSQLI_NUM);
                                        if ($data[0] > 1) {
                                             echo "<script type='text/javascript'> alert('El usuario ya existe')</script>";

                                        } else {
                                            $new = "Not Conform";
                                            $newUser = "INSERT INTO `roombook`(`FName`, `LName`, `Email`,  `Country`, `Phone`, `TRoom`, `Bed`, `Meal`, `cin`, `cout`,`stat`,`nodays`) VALUES ('$_POST[fname]','$_POST[lname]','$_POST[email]','$_POST[country]','$_POST[phone]','$_POST[troom]','$_POST[bed]','$_POST[meal]','$_POST[cin]','$_POST[cout]','$new',datediff('$_POST[cout]','$_POST[cin]'))";
                                            if (mysqli_query($con, $newUser)) {
                                                echo "<script type='text/javascript'> alert('Su solicitud de reserva ha sido enviadat')</script>";

                                            } else {
                                                echo "<script type='text/javascript'> alert('Error al agregar usuario en la base de datos')</script>";

                                            }
                                        }

                                        $msg = "Tu código es correcto
";
                                    }
                                }
                                ?>
                                </form>

                            </div>
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
    <!-- Incluye jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Capture Room -->
    <script src="assets/js/capture-type.js"></script>


</body>

</html>