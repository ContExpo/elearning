<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>
<head>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Dashboard</title>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php include "sidebar.php" ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
      <?php include_once "libraries.php";
        include_once "navbar.php"; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">


				  <b><h1> Clicca sul pulsante qua sotto per vedere il tuo profilo!</h1><br>
              <a href="profilo.php">
               <strong>VISUALIZZA PROFILO </strong>
              </a>
          </div>

          <b><h1>Eseguoi il login o registrati per poter iniziare un test!!</h1><br>
              <a href="test.php">
               <strong> INIZIA TEST </strong>
              </a>
          </div>

          <b><h1> Clicca sul pulsante qua sotto per vedere le tue statistiche!</h1><br>
              <a href="statistiche.php">
               <strong>VISUALIZZA STATISTICHE </strong>
              </a>
          </div>


        </div>

      </div>
      <!-- End of Main Content -->

      <?php include "footer.php" ?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  
  <div id="scriptDiv">
    
</div>

</body>

</html>
