<? $this->load->view('templates/header'); ?>
<link type="text/css" href="js/scripts/lib.validator/css.validator.css" rel="stylesheet" media="all" />
<script type="text/javascript" src="js/scripts/lib.validator/lib.validator.js"></script>
<script src="js/calendario/dhtmlxcalendar.js"></script>
<!--<script type='text/javascript' src='js/actions.js'></script>-->

<style>
    .flechaimg {
        -moz-transform: scaleX(-1);
        -o-transform: scaleX(-1);
        -webkit-transform: scaleX(-1);
        transform: scaleX(-1);
        filter: FlipH;
        -ms-filter: "FlipH";
    }

</style>
<body>
    <? $this->load->view('templates/menu'); ?>

    <div class="content">

        <div class="workplace">

            <div class="row-fluid">

                <div class="panel_ficha_pj_content" style="width: 100%;">
                    <? //debug($planilla); ?>
                    <div class="span6" style="width: 72%; margin: 0 auto;">                    
                        <div class="head">
                            <div class="isw-users"></div>
                            <h1>Por favor llene las Planillas de persona Natural para cada uno de los miembros de la junta directiva de la compa&ntilde;ia</h1>      
                            <div class="clear"></div>
                        </div>
                        <div class="block-fluid">
                            <table width="100%" cellspacing="0" cellpadding="0" class="table listUsers">
                                <tbody> 
                                    <? // debug($directivos); ?>
                                    <? foreach ($directivos as $row) { ?>
                                        <tr>                                    
                                            <td width="40" style="text-align: center;">


                                                <? if (count($row['ficha_pn_pj']) > 0) { ?>  
                                                    <img src="images/general/ic_ok.png">   
                                                <? } else { ?>
                                                    <img class="flechaimg" style="width: 34px;" src="images/general/flecha.gif">
                                                <? } ?>
                                            </td>
                                            <td>
                                                <a class="user" href="./panel_clientes/ficha_persona_natural/<?= $row['id_jun_directiva']; ?>" style="display: block;float: left;">
                                                    <p class="about">
                                                        <span> Nombre:</span> 
                                                        <? if ($row['ficha_pn_pj']['nom_apell_pn'] != '') { ?>
                                                            <?= ucwords($row['ficha_pn_pj']['nom_apell_pn']); ?> <br>
                                                        <? } else { ?>
                                                            <?= ucwords($row['nombres_dir'] . ' ' . $row['apellidos_dir']); ?> <br>
                                                        <? } ?>
                                                        <span> N&deg; ID:</span>
                                                        <? if ($row['ficha_pn_pj']['cedula_pn'] != '') { ?>
                                                            <?
                                                            if (strstr(strtolower($row['ficha_pn_pj']['nacionalidad_pn']), 'paname') || $row['ficha_pn_pj']['nacionalidad_pn'] == 'PA') {
                                                                echo 'CED.-';
                                                            } else {
                                                                echo 'PASS.-';
                                                            }
                                                            ?><?= $row['ficha_pn_pj']['cedula_pn']; ?>
                                                        <? } else { ?>
                                                            <?
                                                            if (strstr(strtolower($row['nacionalidad_dir']), 'paname') || $row['nacionalidad_dir'] == 'PA') {
                                                                echo 'CED.-';
                                                            } else {
                                                                echo 'PASS.-';
                                                            }
                                                            ?><?= $row['cedula_dir']; ?>
                                                        <? } ?>
                                                    </p>
                                                </a>

                                                <? if (count($row['ficha_pn_pj']) > 0) { ?>
                                                    <div style="margin-left: 28px;float: left;width: 170px;">
                                                        <a href="./panel_clientes/descarga_ficha_pn_pj/<?= $row['id_jun_directiva']; ?>">
                                                            <img src="images/general/descarga_fpn.png" title="Descarga Ficha de Persona Natural" alt="Descarga Ficha de Persona Natural" /> 
                                                        </a>    
                                                    </div>
                                                <? } ?>
                                            </td>
                                            <td width="160" style="text-align: center;">
                                                <p class="about">
                                                    <a href="./panel_clientes/ficha_persona_natural/<?= $row['id_jun_directiva']; ?>">
                                                        <? if (count($row['ficha_pn_pj']) > 0) { ?>  
                                                            Editar Datos de la Planilla 
                                                        <? } else { ?>
                                                            Llenar planilla 
                                                        <? } ?>

                                                    </a>                                      
                                                </p>
                                            </td>
                                        </tr>
                                    <? } ?>
                                </tbody>
                            </table>


                        </div>
                    </div>                  
                </div>
            </div>

        </div>
    </div>   
</body>
<? $this->load->view('templates/footer'); ?>


</html>
