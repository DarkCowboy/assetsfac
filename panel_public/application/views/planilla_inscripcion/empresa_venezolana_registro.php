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
    <div class="span3">Oficina de Registro:</div>                 
    <div class="span9">
        <input type="text" placeholder="Ejemplo: Registro Mercantil IV" name="of_reg_pj" id="of_reg_pj" data-required="true" value="<?= @$planilla['of_reg_pj'] ?>" />  
    </div>
    <div class="clear"></div>
</div>
<div class="row-form">
    <div class="span3">Numero de Registro de la empresa:</div>                 
    <div class="span9">
        <input type="text" name="num_reg_pj" id="num_reg_pj" data-required="true" value="<?= @$planilla['num_reg_pj'] ?>" />  
    </div>
    <div class="clear"></div>
</div>
<div class="row-form">
    <div class="span3">Tomo de Registro de la empresa:</div>                 
    <div class="span9">
        <input type="text" name="tomo_reg_pj" id="tomo_reg_pj" data-required="true" value="<?= @$planilla['tomo_reg_pj'] ?>" />  
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
<div class="row-form">
    <div class="span3">Ciudad donde fue registrada:</div>                 
    <div class="span9">
        <input type="text" name="ciudad_reg_pj" id="ciudad_reg_pj" data-required="true" value="<?= @$planilla['ciudad_reg_pj'] ?>" onkeypress="return permite(event, 'soloLetras')"/>  
    </div>
    <div class="clear"></div>
</div>
<div class="row-form">
    <div class="span3">Estado donde fue registrada:</div>                 
    <div class="span9">
        <input type="text" name="estado_reg_pj" id="estado_reg_pj" data-required="true" value="<?= @$planilla['estado_reg_pj'] ?>" onkeypress="return permite(event, 'soloLetras')"/>  
    </div>
    <div class="clear"></div>
</div>
<div class="row-form">
    <div class="span3">Duracion en a&ntilde;os de la Empresa:</div>                 
    <div class="span9">
        <input type="text" name="dura_reg_pj" id="dura_reg_pj" data-required="true" value="<?= @$planilla['dura_reg_pj'] ?>" onkeypress="return permite(event, 'num')"/>  
    </div>
    <div class="clear"></div>
</div>
<div class="row-form">
    <div class="span3">Numeros de empleados:</div>                 
    <div class="span9">
        <input type="text" name="num_emp_reg_pj" id="num_emp_reg_pj" data-required="true" value="<?= @$planilla['num_emp_reg_pj'] ?>" onkeypress="return permite(event, 'num')"/>  
    </div>
    <div class="clear"></div>
</div>