<div class="movil" style="display: none;">    
    <div class="inicio_sesion_movil">
        <form action="panel_public/welcome/" method="post" target="_blank" id="validate-form2" onsubmit="return validator(this);" on>

            <p style="color: white; text-align: center; font-size: 12px;">&Aacute;rea de Clientes</p>

            <p style="color: white; text-align: center; font-size: 12px;">
                <input type="text" name="email" id="email" placeholder="Email" data-required="true" style="width: 78%; text-align: center;"/>
            </p>
            <p style="color: white; text-align: center; font-size: 12px;">
                <input type="password" id="pass"  name="pass" placeholder="Password" data-required="true" onblur="setTimeout(function(){$('#pass').val('');}, 20000);" style="width: 78%; text-align: center;"/>
            </p>
            <p style="color: white; text-align: center; font-size: 12px;">
                <input type="submit" value="Entrar" style="width: 80%;"/>
            </p>
            <p style="color: white; text-align: center; font-size: 12px;line-height: 0px;"><a href="panel_public/clientes/olvide_pass" target="_blank">Olvido Contrase&ntilde;a?</a></p>

        </form>
    </div>
</div>