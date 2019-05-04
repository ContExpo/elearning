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
        <div id="contentDiv" class="container-fluid">
          <?php include_once "dashboard.php" ?>
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
    <script>
      $(".pageLink").click(function(){
        var link = this.getAttribute("data-page");
        if (!link)
        {
          return false;
        }
        if (link[0]!="/" && link[0]!="\\")
        {
          link= "/" + link;
        }
          $.ajax({
            method: "POST",
            url: link,
            dataType: "html",
            success: function(response) 
            {
              if (response=="not logged")
              {
                $("#loginModal").modal('show');
              }
              else if (trimChar(link, "/")=="new_exercise.php")
              {
                $.ajax({
                  method: "GET",
                  url: "/exercise.php",
                  dataType: "html",
                  data: {
                    'id': response
                  },
                  success: function(response) 
                  {
                    $("#contentDiv").html(response);
                  }
              }
              else
              {
                $("#contentDiv").html(response);
              }
            }
          });
    });
  function trimChar(string, charToRemove) 
  {
    while(string.charAt(0)==charToRemove) {
        string = string.substring(1);
    }
    while(string.charAt(string.length-1)==charToRemove) {
        string = string.substring(0,string.length-1);
    }
    return string;
  }
    
    </script>
  </div>

</body>

</html>
