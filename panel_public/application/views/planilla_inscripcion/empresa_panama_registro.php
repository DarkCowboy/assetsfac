
<script type="text/javascript" >
    $(function() {

        myCalendar = new dhtmlXCalendarObject(["fecha_reg_pj", "fecha_vcto"]);

        myCalendar.setSkin('dhx_terrace');
        myCalendar.hideTime();
        dhtmlXCalendarObject.prototype.langData["es"] = {
            dateformat: '%d.%m.%Y',
            monthesFNames: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
            monthesSNames: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
            daysFNames: ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"],
            daysSNames: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
            weekstart: 1
        }
        myCalendar.loadUserLanguage('es');
    });
</script>
<div class="row-form">
    <div class="span3">Numero de Ficha:</div>                 
    <div class="span9">
        <input type="text" name="num_ficha_pj" id="num_ficha_pj" data-required="true" value="<?= @$planilla['num_ficha_pj'] ?>" />  
    </div>
    <div class="clear"></div>
</div>
<div class="row-form">
    <div class="span3">Numero de Documento:</div>                 
    <div class="span9">
        <input type="text" name="num_doc_pj" id="num_doc_pj" data-required="true" value="<?= @$planilla['num_doc_pj'] ?>" />  
    </div>
    <div class="clear"></div>
</div>
<div class="row-form">
    <div class="span3">Fecha de Registo de la empresa:</div>                 
    <div class="span9">
        <input type="text" name="fecha_reg_pj" id="fecha_reg_pj" data-required="true" readonly="readonly" value="<?= @$planilla['fecha_reg_pj'] ?>" />  
    </div>
    <div class="clear"></div>
</div>