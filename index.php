
<html>
  <head>
    <title>Sistema de OG</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
<style type="text/css">
  
.row{ margin-top: 10%; margin-left: 34%;}


</style>

  </head>
  <body class="hold-transition login-page ">
    <?php
  session_start();

      include 'application/conexao.php';

     //proses-cek-login
      if (isset($_POST['proses-login'])) {
        $login = trim($_POST['login']);
        $pwd_usuario = md5(trim($_POST['pwd_usuario']));

        if ($login=="" || $pwd_usuario=="") {
          $error="Nome ou senha necessarios";
        }
        else {
          $logi = $conexao->prepare("SELECT login, pwd_usuario, nivel, nom_usuario FROM usuarios WHERE login=:login");
          $logi->bindParam(':login',$login);
          $logi->execute();
          $data = $logi->fetch(PDO::FETCH_ASSOC);
          if (COUNT($data['login']) == 1 && $pwd_usuario == $data['pwd_usuario']) {
              $_SESSION['login'] = $data['login'];
              $_SESSION['nivel'] = $data['nivel'];
              $_SESSION['nom_usuario'] = $data['nom_usuario'];
             // header("location:alarme/index.php");
              header("location:application/customer/index.php");
          }
          else {
            $error="Usuario e Senha incorretos!!";
            $login = "";
            $pwd_usuario = "";
    
          }
        }
      }



     ?>



<div class="row">
          <div class="col-lg-6">
            <!--notification start-->
            <section class="panel">
              <header class="panel-heading">
               <center><h3> Sistema de OGs </h3></center>
              </header>
              <div class="panel-body">
  
          <?php
            if (isset($error)) {
              echo  '<div class="alert alert-danger alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>'.$error. '</strong>
                     </div>' ;
            }
           ?>     
          <form action="index.php" method="post">
            <div class="form-group has-feedback">
              <input type="text" class="form-control" name="login" placeholder="Usuario">
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input type="password" class="form-control" name="pwd_usuario" placeholder="Senha">
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <button type="submit" name="proses-login" class="btn btn-primary btn-block btn-flat"><span class="glyphicon glyphicon-log-in"></span><b> Entrar</b></button>
          </form>
      </div>
    </div>




    <!-- jQuery 2.2.3 -->
    <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js"></script>
  </body>
</html>
