<?php
/**
 * Created by PhpStorm.
 * User: beta
 * Date: 16/05/17
 * Time: 11:27 AM
 */
session_start();
if(!isset($_SESSION["Validado"])) {
    header("location:index.php");
}
else {
if($_SESSION['Validado']=="aceptado"){
require_once "Bar.php";
require_once "imports.php";
require_once "../BackEnd/Grupos.php";
$g=new Grupos();
$res=$g->getGrupos();
?>

<head>
    <title>Gestion de Alumnas</title>
    <meta charset="utf-8" />
</head>
<div class="row">
    <div class="col l10 offset-l1 m12 s12">
        <br>
        <h5 class="center">Gestion de Alumnas</h5>
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

<div id="alta" class="modal { width: 75% !important  }  ">
    <div class="modal-content">
        <form id="AltaProveedor">
            <h4 id="CoA">Alumna</h4>
            <div>
                <input id="idAlumna" type="text" value="-1" hidden>
            </div>
            <div class="row">
                <div class="input-field col s12 m12">
                    <input placeholder="Nombre" id="Nombre_label" type="text" class="validate" required>
                    <label for="Nombre_label">Nombre</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input placeholder="Apellidos" id="ApellidoP_label" type="text" class="validate" required>
                    <label for="ApellidoP_label">Apellidos</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input name="FechaNacimiento" id="FechaNacimiento" type="date" value="" class="datepicker">
                    <label for="FechaNacimiento">Fecha de Nacimiento</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <select required id="Grupo">
                        <option value=null disabled selected>Seleccione Grupo</option>
                        <?php
                        foreach ($res as $row){
                            echo '<option value="'.$row['id'].'">'.$row['nombre'].'</option>';
                        }
                        ?>
                    </select>
                    <label>Grupo</label>
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
        $('#fechanacimiento').text("");
        $('.datepicker').pickadate({
            format: 'yyyy-mm-dd',
            selectMonths: true,
            selectYears: 200,
            formatSubmit: 'yyyy-mm-dd',
            min: new Date(1980,1,1),
            max: new Date(2017,12,31)
        });
        $('select').material_select();
        $('.modal').modal({
            dismissible: false
        });
    });

    //function que carga la Tabla cuando se abre la pagina y cuando se hace una modificacion a las alumasn
    $(document).ready(Cargar);
    function Cargar(){
        $.ajax({
            url:"../BackEnd/Controlador.php",
            type:'post',
            data:({
                Action: "Alumnas",
                Metodo: "GetAlumnas"
            }),
            success: function (data) {
                data=JSON.parse(data);
                if(data.length!=0){
                    $('#Tabla').empty();
                    var table = $('<table class="responsive-table"> <thead> <tr> <th>Id</th> <th>Nombre</th> <th>Apellidos</th> <th>Edad</th> <th>Fecha De Nacimiento</th> <th>Grupo</th><th>Acciones</th> </tr></thead></table>');
                    for(i=0; i<data.length; i++){
                        table.append('<tr><td>'+data[i].id+'</td><td>'+data[i].nombre+'</td><td>'+data[i].apellido+'</td><td>'+data[i].edad+'</td><td>'+data[i].fechaNacimiento+'</td><td>'+data[i].idgrupo+'</td><td width="200"><a onclick="elementos(this.id)" id="'+data[i].id+'" class="small material-icons btn red">delete</a><a id="'+data[i].id+'" onclick="elementos2(this.id)" class="small material-icons btn green">mode_edit</a></td></tr>');
                    }
                    $('#Tabla').append(table);
                }
                else{
                    $('#Tabla').empty();
                    var table = $('<table class="responsive-table"> <thead> <tr> <th>Id</th> <th>Nombre</th> <th>Apellidos</th> <th>Edad</th> <th>Fecha De Nacimiento</th> <th>Grupo</th><th>Acciones</th> </tr></thead></table>');
                    $('#Tabla').append(table);
                }
            }
        });
    }

    function elementos(clicked_id) {
        $('#baja').modal('open');
        $('#idEliminar').attr("value",clicked_id);
    }

    function limpiarFormulario(){
        console.log("Limpio");
        $('#idAlumna').val("-1");
        $('#idAlumna').attr("value","-1");
        console.log($('#idAlumna').val());
        $('#Nombre_label').val("");
        $('#ApellidoP_label').val("");
        $('#FechaNacimiento').val("");
        $('#Grupo').val(null);
        $('#Grupo').material_select();
    }
    function baja(){
        var idEliminar=$('#idEliminar').val();
        $.ajax({
            url:"../BackEnd/Controlador.php",
            type:'post',
            data:({
                Action:"Alumnas",
                Metodo: "deleteAlumna",
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

    function alta() {
        //alert("Dio de Alta");
        event.preventDefault();
        $.ajax({
            url:"../BackEnd/Controlador.php",
            type:'post',
            data:({
                Action:"Alumnas",
                Metodo: "Alta_Update",
                atributos:{
                    id:$('#idAlumna').val(),
                    n:$('#Nombre_label').val(),
                    ape:$('#ApellidoP_label').val(),
                    fn:$('#FechaNacimiento').val(),
                    grupo:$('#Grupo').val()
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
    function elementos2(clicked_id) {
        $('#CoA').attr("value","Cambio Alumno");
        $('#alta').modal('open');
        $('#idAlumna').attr("value",clicked_id);
        $('#idAlumna').val(clicked_id);
        //console.log(clicked_id);
        $.ajax({
            url:"../BackEnd/Controlador.php",
            type:'post',
            data:({
                Action:"Alumnas",
                Metodo: "GetAlumnasById",
                id: clicked_id
            }),
            success: function (data) {
                data=JSON.parse(data);
                //console.log(data);
                $('#Nombre_label').val(data[0].nombre);
                 $('#ApellidoP_label').val(data[0].apellido);
                 $('#Edad').val(data[0].edad);
                 $('#FechaNacimiento').val(data[0].fechaNacimiento);
                 $('#Grupo').val(data[0].idgrupo);
                $('#Grupo').material_select();
            }
        });
    }

</script>

<?php } } ?>