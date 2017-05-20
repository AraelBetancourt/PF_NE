<?php
/**
 * Created by PhpStorm.
 * User: beta
 * Date: 16/05/17
 * Time: 11:41 AM
 */
session_start();
if(!isset($_SESSION["Validado"])) {
    header("location:index.php");
}
else {
if($_SESSION['Validado']=="aceptado"){
require_once "Bar.php";
require_once "imports.php";
?>

<head>
    <title>Gestion de Alumnas</title>
    <meta charset="utf-8" />
</head>
<div class="row">
    <div class="col l10 offset-l1 m12 s12">
        <br>
        <h5 class="center">Gestion de Grupos</h5>
        <br><hr><br>
        <a href="#alta" class="btn-floating btn-large waves-effect waves-light green white-text modal-trigger1 right"><i class="material-icons">add</i></a>
    </div>
</div>

<div class="row">
    <div class="col l10 offset-l1 m12 s12">
        <div id="Tabla">
        </div>
    </div>
</div>

<div id="alta" class="modal">
    <div class="modal-content">
        <form id="AltaProveedor">
            <h4 id="CoA">Grupo</h4>
            <div>
                <input id="idGrupo" type="text" value="-1" hidden>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input placeholder="Nombre" id="Nombre_label" type="text" class="validate" required>
                    <label for="Nombre_label">Nombre</label>
                </div>
            </div>

            <div class="modal-footer center">
                <a onclick="limpiarFormulario()" class="modal-action modal-close waves-effect red white-text btn-flat ">Cancelar</a>
                <a  id="Alta" onclick="alta()" class="modal-action modal-close waves-effect green white-text btn-flat">Aceptar</a>
            </div>
        </form>
    </div>
</div>


<div id="baja" class="modal">
    <div class="modal-content">
        <form>
            <h4>Baja Clientes</h4>
            <div>
                <input id="idEliminar" type="text" value="" hidden>
            </div>
            <p class="center">¿Desea eliminar el registro?</p>
            <div class="modal-footer center">
                <a class="modal-action modal-close waves-effect red white-text btn-flat " >Cancelar</a>
                <a onclick="baja()" class="modal-action modal-close waves-effect green white-text btn-flat">Aceptar</a>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.modal').modal({
            dismissible: false
        });
    });
    function baja(){
        var idEliminar=$('#idEliminar').val();
        $.ajax({
            url:"../BackEnd/Controlador.php",
            type:'post',
            data:({
                Action:"Grupos2",
                Metodo: "DeleteG",
                atributos: idEliminar
            }),
            success: function(data) {
                //console.log(data);
                data=JSON.parse(data);
                //console.log(data);
                if(data[0].res=="Elimino"){
                    Materialize.toast('Se Elimino con Exito', 4000,"green");
                }
                else
                    Materialize.toast('Error Al Eliminar', 4000,"red");
                limpiarFormulario();
                Cargar();
            }
        });
    }

    function alta(){
        event.preventDefault();
        $.ajax({
            url:"../BackEnd/Controlador.php",
            type:'post',
            data:({
                Action:"Grupos",
                Metodo: "addUpdateGrupo",
                atributos:{
                    id:$('#idGrupo').val(),
                    n:$('#Nombre_label').val()
                }
            }),
            success: function(data) {
                //console.log(data);
                data=JSON.parse(data);
                //console.log(data);
                if(data[0].res=="add"){
                    Materialize.toast('Se Inserto con Exito', 4000,"green");
                }
                if(data[0].res=="update"){
                    Materialize.toast('Se Actualizo con Exito', 4000,"green");
                }
                limpiarFormulario();
                Cargar();
            }
        });
    }

    function limpiarFormulario(){
        console.log("Limpio");
        $('#idGrupo').val("-1");
        $('#idGrupo').attr("value","-1");
        $('#Nombre_label').val("");
    }
    $(document).ready(Cargar);
    function Cargar(){
        $.ajax({
            url:"../BackEnd/Controlador.php",
            type:'post',
            data:({
                Action: "Grupos",
                Metodo: "GetGrupos"
            }),
            success: function (data) {
                data=JSON.parse(data);
                if(data.length!=0){
                    $('#Tabla').empty();
                    var table = $('<table class="responsive-table"> <thead> <tr> <th>Id</th> <th>Nombre</th> <th>Acciones</th> </tr></thead></table>');
                    for(i=0; i<data.length; i++){
                        table.append('<tr><td>'+data[i].id+'</td><td>'+data[i].nombre+'</td><td width="200"><a onclick="elementos(this.id)" id="'+data[i].id+'" class="small material-icons btn red">delete</a><a id="'+data[i].id+'" onclick="elementos2(this.id)" class="small material-icons btn green">mode_edit</a></td></tr>');
                    }
                    $('#Tabla').append(table);
                }
                else{
                    $('#Tabla').empty();
                    var table = $('<table class="responsive-table"> <thead> <tr> <th>Id</th> <th>Nombre</th> <th>Acciones</th> </tr></thead></table>');
                    $('#Tabla').append(table);
                }
            }
        });
    }
    function elementos(clicked_id) {
        $('#baja').modal('open');
        $('#idEliminar').attr("value",clicked_id);
    }
    function elementos2(clicked_id) {
        //$('#CoA').attr("value","Cambio Alumno");
        $('#alta').modal('open');
        $('#idGrupo').attr("value",clicked_id);
        $('#idGrupo').val(clicked_id);
        //console.log(clicked_id);
        $.ajax({
            url:"../BackEnd/Controlador.php",
            type:'post',
            data:({
                Action:"Grupos",
                Metodo: "GetGruposById",
                id: clicked_id
            }),
            success: function (data) {
                data=JSON.parse(data);
                console.log(data);
                $('#Nombre_label').val(data[0].nombre);
            }
        });
    }
</script>

<?php } } ?>