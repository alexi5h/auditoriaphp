<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Auditoría</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-3.3.4-dist/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-3.3.4-dist/css/bootstrap-theme.min.css" />
        <link rel="stylesheet" type="text/css" href="assets/plugins/loginbatmanfiles/css/reset.css" />
        <link rel="stylesheet" type="text/css" href="assets/plugins/loginbatmanfiles/css/style.css" />

    </head>
    <body id="login">
        <img id="bg" src="assets/img/Download-Free-Website-Abstract-Wallpaper.jpg" alt="Fondo" />
        <form class="form" id="logon-form" action="/auditoriaphp/index.php" method="post">
            <h1>Iniciar Sesión</h1>
            <div class="inset">
                <div class="form-group">
                    <label for="username" class="required">Nombre de Usuario<span class="required">*</span></label>
                    <input name="Login[username]" id="username" type="text" maxlength="45">
                </div>
                <div class="form-group">
                    <label for="password" class="required">Contraseña<span class="required">*</span></label> 
                    <input name="Login[password]" id="password" type="password" maxlength="20">   
                </div>
                <div class="form-group">
                    <input id="ytCrugeLogon_rememberMe" type="hidden" value="0" name="Login[rememberMe]"><input name="Login[rememberMe]" id="rememberMe" value="1" type="checkbox">
                    <label for="CrugeLogon_rememberMe">Recordarme más tarde</label>                    </div>
            </div>
            <p class="p-container">
                <!--<span></span>-->
                <button class="btn btn-primary btn-flat btnlogin"><i class="glyphicon glyphicon-ok"></i> Ingresar</button>
                <span><a href="/csa-express/cruge/ui/registration">Registrarse</a></span>    </p>
        </form>
        <!--        <div class="row">
                    <form class="form-inline">
                        <label class="control-label" for="Usuario">Usuario</label>
                        <input maxlength="20" class="span6" placeholder="Username" name="Login[user]" id="Usuario" type="text">
                                            
                        <label class="control-label" for="Pass">Contraseña</label>
                        <input maxlength="20" class="span6" placeholder="Password" name="Login[pass]" id="Pass" type="text">
                    </form>
                </div>-->
        <span class="author">Designed by Alexis Hidalgo</span>

        <!--scripts-->
        <script src="assets/js/jquery-2.1.3.js"></script>
        <script src="assets/plugins/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
        <script src="assets/plugins/loginbatmanfiles/js/prefixfree.min.js"></script>
        <script src="assets/plugins/loginbatmanfiles/js/modernizr.js"></script>
        <script src="assets/js/login.js"></script>
    </body>
</html>