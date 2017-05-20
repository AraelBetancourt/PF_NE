<?php
/**
 * Created by PhpStorm.
 * User: beta
 * Date: 11/05/17
 * Time: 05:16 PM
 */
//require_once "Bar.php";
require_once "Bar2.php";
require_once "imports.php";
?>

<head>
    <title>Login</title>
    <meta charset="utf-8" />
</head>
<br>
<br>
<br>
<div class="row">
    <div class="col l10 offset-l1 m126 s12">
        <form action="login.php" method="post" id="login">
            <div class="row">
                <div class="input-field offset-m4 col s12 m4">
                    <input placeholder="Usuario" name="username" id="username" type="text" class="validate center" required>
                    <label for="first_name">Usuario</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col offset-m4 s12 m4">
                    <input placeholder="Contraseña"name="password" id="password" type="password" class="center validate" required>
                    <label for="password">Contraseña</label>
                </div>
            </div>
            <div class="row">
                <div class="col s12 center-align">

                    <a onclick="Login()" class="btn waves-effect waves-light" >Aceptar</a>
                    <a class="btn red" type="submit" name="action">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    function Login() {
        $.ajax({
            url:"../BackEnd/Controlador.php",
            type:'post',
            data:({
                Action:"Login",
                username:$('#username').val(),
                password:$('#password').val()
            }),
            success: function(data) {
                console.log(data);
                data=JSON.parse(data);
                console.log(data);
                if(data[0].esta=="1"){
                    window.location.href = "login.php";
                }else{
                    Materialize.toast("Error en el Usuario o Contraseña", 4000,"red");
                }
            }
        });
    }
</script>