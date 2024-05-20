<?php  
 session_start();  
 if(isset($_SESSION["user"]))  
 {  
      header("location:home.php");  
 }  
 
 ?>
  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="UTF-8">
    <title>MOONLIGHT ADMIN</title>
    <link rel="stylesheet" href="css/login.css">

  </head>

  <body>
    <div class="container" id="container">
      <div class="form-container sign-in">
        <form method="post">
          <h1 class="titulo1">Iniciar Sesion</h1>
          <input type="text" placeholder="Nombre de Usuario" , name="user" value="Username"
            onBlur="if(this.value == '') this.value = 'Username'" onFocus="if(this.value == 'Username') this.value = ''"
            required>
          <input type="password" placeholder="Contraseña" name="pass" value="Password"
            onBlur="if(this.value == '') this.value = 'Password'" onFocus="if(this.value == 'Password') this.value = ''"
            required>
          <a href="#">Olvidaste tu contraseña? </a>
          <p><input class="button" type="submit" name="sub" value="Iniciar Sesión"></p>
        </form>
      </div>

      <div class="toogle-container">
        <div class="toogle">
          <div class="toogle-panel toggle-left">
            <h1>Bienvenido de nuevo</h1>
            <p>Para poder aprovechar todo lo que ofrece
              la pagina Incia Secion!</p>
          </div>
          <div class="toogle-panel toggle-right color-letra">
            <h1>Hola, amigo!</h1>
            <p>Gracias por preferirnos, espero que hoy tengas un excelente día, recuerda agradecer siempre a Dios. </p>
          </div>
        </div>
      </div>
    </div>
  
  </body>

  </html>

  <?php
  include ('db.php');


  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form 
  
    $myusername = mysqli_real_escape_string($con, $_POST['user']);
    $mypassword = mysqli_real_escape_string($con, $_POST['pass']);

    $sql = "SELECT id FROM login WHERE usname = '$myusername' and pass = '$mypassword'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $active = $row['active'];

    $count = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row
  
    if ($count == 1) {

      $_SESSION['user'] = $myusername;

      header("location: home.php");
    } else {
      echo '<script>alert("Your Login Name or Password is invalid") </script>';
    }
  }
  ?>