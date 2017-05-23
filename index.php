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
                <input name="Grupo" id="Grupo" type="text" class="validate" >
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
                    <input class="file-path validate" type="text" name="file" id="file" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input name="Folio" id="Folio" type="number" min="1" max="9999999999" class="validate">
                <label for="Folio">Folio</label>
            </div>
        </div>
        <div class="col s10 offset-s1 center-align">
            <input id="enviar" name="enviar" type="submit" value="Aceptar" class="center-align submit btn aves-effect waves-light media-middle" />
        </div>

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
            selectYears:false,
            //selectYears: 1
        });
        $("#uploadimage").on('submit',(function(e) {
            e.preventDefault();
            $('#enviar').attr('disabled', true);
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
                    data=JSON.parse(data);
                    if(data[0].res=="Duplicado"){
                        Materialize.toast('El Folio ya se encuentra en la Base de datos', 3000,"red");
                    }else if(data=="ia")
                        Materialize.toast('Falta Seleccionar Alumna', 3000,"red");
                    else if(data=="2")
                        Materialize.toast('Falta Seleccionar Grupo', 3000,"red");
                    else if(data=="3")
                        Materialize.toast('Falta Seleccionar Nombre De la Mama', 3000,"red");
                    else if(data=="4")
                        Materialize.toast('Falta Seleccionar Apellido de la Mama', 3000,"red");
                    else if(data=="5")
                        Materialize.toast('Falta Seleccionar Fecha de Pago', 3000,"red");
                    else if(data=="6")
                        Materialize.toast('Falta Seleccionar Comprobante de Pago', 3000,"red");
                    else if(data=="Tipo"){
                        Materialize.toast('Formato Invalido Solo se admite PDF, JPG y PNG', 3000,"red");
                    }else if(data=="fo"){
                        Materialize.toast('Formato Invalido Solo se admite PDF, JPG y PNG', 3000,"red");
                    }else if(data=="1" || data[0].res=="add"){
                        $('#enviar').attr('disabled', true);
                        Materialize.toast('Envio Exitoso', 3000,"green");
                        setTimeout(
                            function()
                            {
                                window.location.href = "Lugares.php";
                            }, 3000);


                    }else if(data=="Error")
                        Materialize.toast('Hay un Error en el sistema por favor intentalo mas tarde', 3000,"red");
                    //console.log(data);
                    $('#enviar').attr('disabled', false);
                }
            });
        }));
    });



</script>

