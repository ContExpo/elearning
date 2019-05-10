<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>

<head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include "sidebar.php"?>

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

        $("body").on("click", ".pageLink", function() {
            var link = this.getAttribute("data-page");
            if (!link) {
                return false;
            }
            //$("#loadingModal").modal("show");
            doAjaxCall(link);
        });

        $.urlParam = function(name) {
            var results = new RegExp('[\?&]' + name + '=([^&#]*)')
                .exec(window.location.search);

            return (results !== null) ? results[1] || 0 : false;
        }

        function doAjaxCall(link) {
            if (link[0] != "/" && link[0] != "\\") {
                link = "/" + link;
            }
            $.ajax({
                method: "POST",
                url: link,
                dataType: "html",
                success: function(response) {
                    if (response == "not logged") {
                        $("#loginModal").modal('show');
                    }

                    //SE STO CREANDO UN NUOVO ESERCIZIO
                    else if (trimChar(link, "/") == "new_exercise.php") {
                        $.ajax({
                            method: "GET",
                            url: "/exercise.php",
                            dataType: "html",
                            data: {
                                'id': response
                            },
                            success: function(response) {
                                //$("#loadingModal").modal("hide");
                                $("#contentDiv").html(response);
                            }
                        });
                    } else {
                        //$("#loadingModal").modal("hide");
                        $("#contentDiv").html(response);
                    }
                }
            })
        }

        function showErrorPage() {
            $.ajax({
                method: "POST",
                url: '404.php',
                dataType: "html",
                success: function(response) {
                    $("#contentDiv").html(response);
                }
            });
        }

        function trimChar(string, charToRemove) {
            while (string.charAt(0) == charToRemove) {
                string = string.substring(1);
            }
            while (string.charAt(string.length - 1) == charToRemove) {
                string = string.substring(0, string.length - 1);
            }
            return string;
        }

        $(document).ready(function() {
            var redirect = $.urlParam('page');
            if (redirect) {
            doAjaxCall(redirect);
        }});
        </script>
    </div>

</body>

</html>