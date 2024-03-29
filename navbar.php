<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
			<i class="fa fa-bars"></i>
		  </button>

    <!-- Topbar Search -->
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" id="searchInput" class="form-control bg-light border-0 small" placeholder="Cerca" aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
					<i class="fas fa-search fa-sm"></i>
				</button>
            </div>
        </div>
    </form>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <?php

if (isset($_SESSION["username"])): ?>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Cerca" aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn topMargin" type="button">
						<i class="fas fa-search fa-sm"></i>
					  </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Nav Item - Alerts -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle pointer" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <!--<span class="badge badge-danger badge-counter">3+</span>-->
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
            </div>
        </li>

        <!-- Nav Item - Messages -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle pointer" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <!--<span class="badge badge-danger badge-counter">7</span> -->
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
            </div>
        </li>
        <?php
endif; ?>
        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 biggerText pointer">
					<?php

if (isset($_SESSION["username"])) echo $_SESSION["username"];
else echo "Guest";
?>
				</span>
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <?php

if (isset($_SESSION["username"])): ?>
                <a class="dropdown-item pageLink" data-page="/profile.php">
                    <i class="fas fa-user fa-sm fa-fw mr-2"></i> Profilo
                </a>
                <a class="dropdown-item pageLink" data-page="/settings.php">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2"></i> Impostazioni
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item pointer" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i> Logout
                </a>
                <?php
else:
?>
                    <a class="dropdown-item pointer" data-toggle="modal" data-target="#loginModal">
                        <i class="fas fa-list fa-sm fa-fw mr-2"></i> Login
                    </a>
                    <?php
endif; ?>
            </div>
        </li>

    </ul>

</nav>
<!-- End of Topbar -->
<!-- Modals -->

<div id="loadingModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
            </div>
            <div class="modal-body text-center">
                <p class="align-middle"> Caricamento</p>
                <div class="spinner-border" role="status">
                    <span class="sr-only"></span>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>


<?php

if (isset($_SESSION["username"])): ?>
<!--MODALS FOR LOGGED USERS -->

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">×</span>
		  </button>
            </div>
            <div class="modal-body">Vuoi davvero eseguire il logout?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancella</button>
                <a class="btn btn-primary" href="logout.php">Logout</a>
            </div>
        </div>
    </div>
</div>
				<?php
else: ?>

<!-- MODALS FOR GUEST USERS -->

<!-- LOGIN/REGISTER MODAL-->
<div id="loginModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">AdaLearning</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div id="divLogin" class="col-md-6 rightLine">
                            <form id="frmLogin" method="POST">
                                <p class="text-center">Login</p>
                                <label for="username">Username</label>
                                <input type="text" name="username" id="usernameLgn" class="form-control" required>
                                <label for="password">Password</label>
                                <input type="password" name="password" id="passwordLgn" class="form-control" required>
                                <input type="submit" value="Login" id="btnLogin" class="btn btn-primary topMargin">
                            </form>
                        </div>
                        <div id="divRegister" class="col-md-6">
                            <form id="frmRegister" method="POST">
                                <p class="text-center">Registrati</p>
                                <label for="nome">Nome</label>
                                <input type="text" name="nome" id="nameRgs" class="form-control" required>
                                <label for="Cognome">Cognome</label>
                                <input type="text" name="cognome" id="surnameRgs" class="form-control" required>
                                <label for="email">Email</label>
                                <input type="email" name="email" id="emailRgs" class="form-control" required>
                                <label for="username">Username</label>
                                <input type="text" name="username" id="usernameRgs" class="form-control" required>
                                <label for="password">Password</label>
                                <input type="password" name="password" id="passwordRgs" class="form-control" required>
                                <input type="submit" value="Registrati" id="btnRegister" class="btn btn-primary topMargin">
                            </form>
                        </div>
                        <div id="divResult" class="text-center col-md-12 bigTopMargin">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>

$("#frmLogin").submit(function(event) 
{
    event.preventDefault();
    $.ajax({
            method: "POST",
            url: "/login.php",
            data: 
            {
                username: $("#usernameLgn").val(),
                password: $("#passwordLgn").val()
            },
            dataType: "text",
            success: function(response) 
            {
                if (response == "success") 
                {
                    window.location.reload(true);
                } 
                else 
                {
                    $("#divResult").html(response);
                }
            },
    });
    $("#divResult").html('<div class="spinner-grow" role="status"><span class="sr-only"></span></div>Login...');
});

$("#frmRegister").submit(function(event){
    event.preventDefault();
    $.ajax({
            method: "POST",
            url: "/register.php",
            data: 
            {
                name: $("#nameRgs").val(),
				surname: $("#surnameRgs").val(),
				email: $("#emailRgs").val(),
				username: $("#usernameRgs").val(),
				password: $("#passwordRgs").val(),
            },
            dataType: "text",
            success: function(response) 
            {
                if (response == "success") 
                {
                    window.location.reload(true);
                } 
                else 
                {
                    $("#divResult").html(response);
                }
            },
    });
    $("#divResult").html('<div class="spinner-grow" role="status"><span class="sr-only">Registrazione in corso...</span></div>');
});
</script>

<?php endif; ?>