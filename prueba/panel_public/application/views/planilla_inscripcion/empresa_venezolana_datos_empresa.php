<div class="row-form">
    <div class="span3">Numero de R.I.F.:</div>                 
    <div class="span9">
        <input type="text" name="rif_pj" placeholder="Formato: J-00000000-0" id="inputrif_pj" data-required="true" value="<?= @$planilla['rif_pj'] ?>" />  
    </div>
    <div class="clear"></div>
    <span id="result"></span>
</div>

<script>
    $(function() {

        $('#inputrif_pj').blur(function() {
            $('#inputnom_rz_pj').val('');
            $('.loading_image').css('display', 'block');
            var $url = "./clientes/consulta_rif/";
            var $rif = $(this).val();
            if($rif != ''){
            $.get($url + $rif, function(data) {
                if (data == '') {
                    $('#inputrif_pj').css('border', '1px solid red');
                    $('.loading_image').css('display', 'none');
                } else {
                    $('.loading_image').css('display', 'none');
                    $('#inputrif_pj').css('border', '1px solid #D7D7D7');
                }
                $('#inputnom_rz_pj').val(data);

            });
        }else{
            $('#inputrif_pj').css('border', '1px solid red');
            $('.loading_image').css('display', 'none');
            $('#inputnom_rz_pj').val('');
        }

        });

    });

</script>

<div class="row-form">
    <div class="span3">Razon Social:</div>                 
    <div class="span9">
        <input type="text" name="nom_rz_pj" id="inputnom_rz_pj" data-required="true" readonly="readonly" value="<?= @$planilla['nom_rz_pj'] ?>" />  
        <img src="images/general/al_loading.gif" class="loading_image" style="display: none;">
    </div>
    <div class="clear"></div>
</div>