<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<title>Contáctenos, nuestros ejecutivos de cuenta estarán encantados de atenderte</title>

<!-- Add jQuery library -->
<script type="text/javascript" src="jquery.min.js"></script>

<!-- lib.validator -->
<link type="text/css" href="css.validator.css" rel="stylesheet" media="all" />
<script type="text/javascript" src="lib.validator.js"></script>

    
</head>
<body class="contactenos">
<div class="msgErrorValidator">
</div>

                <div id="formularios" class="clearfix DroidSans"> <!--formularios-->
                    <form enctype="multipart/form-data" action="include/Enviar_InfContacto.php" method="post" id="frmContacto" onSubmit="return validator(this);">

                        <label>soloLetras:*</label><br />
                        <input type="text" id="nombre" name="nombre" placeholder="hola" onkeypress="return permite(event, 'soloLetras')" data-required="true" /><br />
                        <label>Correo:*</label><br />
                        <input type="text" id="correo" name="correo" onkeypress="return permite(event, 'dir_mail')" data-required="true,mail" /><br />
                        <label>Teléfono:*</label><br />
                        <input type="text" id="telefono" name="telefono" onkeypress="return permite(event, 'telefono')" data-required="true" /><br />
                        <label>data-required="true":*</label><br />
                        <textarea name="comentario" data-required="true" ></textarea><br />
                        <input type="reset" value="Borrar">
                        <input type="submit" value="Enviar">
                        <br><br>
                        password
                        <br>
                        Declarar con id="password1"<br/>
                        <input type="password" id="password1" name="password1" placeholder="password1" data-required="true" /><br />
                        <input type="password" id="password2" name="password2" data-required="true,password,password1" /><br />
                    
                    
                    
                    </form>


                </div> <!--/formularios-->
</body>
</html>