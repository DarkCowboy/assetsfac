<base href="<?php echo base_url() ?>"/>
<!-- jQuery -->
        <!-- <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
        <script type="text/javascript">window.jQuery || document.write('<script type="text/javascript" src="./scripts/jquery-1.8.0.min.js"><'+'/script>')</script>-->
<script type="text/javascript" src="./scripts/jquery.min.js"></script>
<!-- lib.validator -->
<link type="text/css" href="./scripts/lib.validator/css.validator.css" rel="stylesheet" media="all" />
<script type="text/javascript" src="./scripts/lib.validator/lib.validator.js"></script>  
<div>
    <form action="./cheque/impresion_correcta/<?= $id_instruccion; ?>" method="post" class="form" id="validate-form" onSubmit="return validator(this);">
        <table style='margin: 0 auto; width: 300px;'>
            <tr style='text-align: center;'>
                <td>Numero de Cheque:</td>
            </tr>
            <tr style='text-align: center;'>
                <td><input name='n_cheque' id="n_cheque" class="text imput_form1" type="text" onkeypress="return permite(event, 'numpunto')" data-required="true" /></td>
            </tr>
            <tr style='text-align: center;'>
                <td><input type='submit' value='Se Imprimio Correctamente' /></td>
            </tr>
            <tr style='text-align: center;'>
                <td><input type="button" value='Cerrar sin Imprimir' onclick="parent.closeFancy();" /></td>
            </tr>
        </table>
    </form>



</div>

<iframe src="./cheque/cheques/<?= $id_instruccion; ?>" style="display: block;  margin: 0 auto; overflow: hidden; height: 298px; width: 99%;"></iframe>