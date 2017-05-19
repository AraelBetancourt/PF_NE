<?php
/**
 * Created by PhpStorm.
 * User: beta
 * Date: 11/05/17
 * Time: 05:23 PM
 */
require_once "imports.php";
require_once "Bar.php";
//require_once "BackEnd/Alumnas.php";
require_once "BackEnd/Grupos.php";
?>
<div class="row">
    <form id="uploadimage" method="post" class="col l10 offset-l1 m12 s12" enctype="multipart/form-data">
        <div class="input-field col s12">
            <select name="IdAlumna" id="IdAlumna">
                <option value="" disabled selected>Selecciona Alumna</option>

            </select>
            <label >Nombre de la Alumna</label>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input name="Grupo" id="Grupo" type="text" disabled>
                <label for="Grupo">Grupo</label>
            </div>
        </div>
        <div class="input-field col s12">
            <label >Nombre de la mama</label><br>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <input name="nom" id="nom" type="text" class="validate">
                <label for="nom">Nombre</label>
            </div>
            <div class="input-field col s6">
                <input name="Ape" id="Ape" type="text" class="validate">
                <label for="Ape">Apellido</label>
            </div>
            <div class="input-field col s12">
                <input name="FechaPago" id="FechaPago" type="date" class="datepicker">
                <label for="FechaPago">Fecha de pago</label>
            </div>
        </div>
        <div class="input-field col s12">
            <label >Comprobante De Pago</label>
            <br>
            <br>
        </div>
        <div class="row col s12">
            <div class="file-field input-field">
                <div class="btn">
                    <span>Añadir Archivo</span>
                    <input name="file" id="file" type="file">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" name="file" id="file"  disabled/>
                </div>
            </div>
        </div>
        <input type="submit" value="Aceptar" class="submit btn aves-effect waves-light right" />
    </form>
</div>
<script>
    $('#IdAlumna').on('change', function() {
        var id=$('#IdAlumna').val();
        $.ajax({
            url:"BackEnd/Controlador.php",
            type:'post',
            data:({
                Action:"Grupos",
                Metodo: "Alumnas ID",
                atributos: id
            }),
            success: function (data) {
                data=JSON.parse(data);
                $('#Grupo').val(data[0].grupo);
            }
        });
    });


    $(document).ready(function() {

        $.ajax({
            url:"BackEnd/Controlador.php",
            type:'post',
            data:({
                Action:"Alumnas",
                Metodo: "GetAlumnas2"
            }),
            success: function (data) {
                data=JSON.parse(data);
                console.log(data);
                for(var i=0;i<data.length;i++){
                    $("#IdAlumna").append("<option value=+"+data[i].id+">"+data[i].nombre+" "+data[i].apellido+"</option>");
                    $('#IdAlumna').material_select();
                }
            }
        });
        $('#Grupo').val(" ");
        $('select').material_select();
        $('.datepicker').pickadate({
            format: 'yyyy-mm-dd',
            selectMonths: true,
            selectYears: 17
        });
        $("#uploadimage").on('submit',(function(e) {
            e.preventDefault();
            console.log($('FechaPago').val());
            $.ajax({
                url: "BackEnd/Pagos_Subida.php",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(data)
                {
                    if(data=="ia")
                        Materialize.toast('Falta Seleccionar Alumna', 3000,"yellow");
                    else if(data=="2")
                        Materialize.toast('Falta Seleccionar Grupo', 3000,"yellow");
                    else if(data=="3")
                        Materialize.toast('Falta Seleccionar Nombre De la Mama', 3000,"yellow");
                    else if(data=="4")
                        Materialize.toast('Falta Seleccionar Apellido de la Mama', 3000,"yellow");
                    else if(data=="5")
                        Materialize.toast('Falta Seleccionar Fecha de Pago', 3000,"yellow");
                    else if(data=="6")
                        Materialize.toast('Falta Seleccionar Comprobante de Pago', 3000,"yellow");
                    else if(data=="Tipo"){
                        Materialize.toast('Formato Invalido Solo se admite PDF, JPG y PNG', 3000,"yellow");
                    }else if(data=="1"){
                        Materialize.toast('Guardado Correctamente', 3000,"green");
                        $("#uploadimage")[0].reset();
                    }else if(data=="Error")
                        Materialize.toast('Hay un Error en el sistema por favor intentalo mas tarde', 3000,"red");
                    console.log(data);
                }
            });
        }));
    });



</script>

