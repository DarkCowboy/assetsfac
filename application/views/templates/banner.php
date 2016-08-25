
<div class="baner_sesion">
    <div class="banner_big">
        <ul id="slider2">
            <li>
                <div class="container"> 
                    <div class="imagen_banner">
                        <img src="images/banner/image_4.png" />
                    </div>				
                    <div class="texto_banner">
                        <br/><br/> <span>Assets Factoring INC<br/> Panam&aacute;</span>
                    </div>
                </div>
            </li>
            <li onclick="window.open('panel_public/clientes/registrarse');" style="cursor: pointer;">
                <div class="container">
                    <div class="imagen_banner">
                        <img src="images/banner/image_0.png" />
                    </div>				
                    <div class="texto_banner">
                       <br/> <span>Ahora m&aacute;s cerca de Usted...<br/> Assets Factoring Online ingrese aqui para Registrarse...</span>
                    </div>
                </div>
            </li>	

            <li>
                <div class="container">
                    <div class="imagen_banner">
                        <img src="images/banner/image_2.png" />
                    </div>				
                    <div class="texto_banner">
                        <br/><br/><br/><span>Su mejor socio Comercial.</span>
                    </div>
                </div>
            </li>
            <li>
                <div class="container">
                    <div class="imagen_banner">
                        <img src="images/banner/image_3.png" />
                    </div>				
                    <div class="texto_banner">
                        <br/><br/><br/><span>Assets Factoring INC Te ayuda a Crecer.</span>
                    </div>
                </div>
            </li>
        </ul>
    </div>

    <div class="inicio_sesion">
        <form action="panel_public/welcome/" method="post" target="_blank" id="validate-form" onsubmit="return validator(this);" on>

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
<div class="shadown_banner"></div>
</div>

<script>
    // Set up Sliders
    // **************
    $(function(){

        $('#slider2').anythingSlider({
            //            mode                : 'f',   // fade mode - new in v1.8!
            expand       : true,
            autoPlay     : true,
            infiniteSlides      : true,
            theme : 'metallic',
            pauseOnHover: false,
            delay : 9000,
            resumeDelay         : 9000,
            hashTags            : false,
            animationTime: 600,
            enableStartStop     : false,
            autoPlayLocked      : true, 
            autoPlayDelayed     : true, 
            resizeContents      : false, // If true, solitary images/objects in the panel will expand to fit the viewport
            navigationSize      : 3,     // Set this to the maximum number of visible navigation tabs; false to disable
            navigationFormatter : function(index, panel){ // Format navigation labels with text
                return ['Recipe', 'Quote', 'Image', 'Quote #2', 'Image #2'][index - 1];
            },
            onSlideBegin: function(e,slider) {
                // keep the current navigation tab in view
                slider.navWindow( slider.targetPage );
            }
        });

        // tooltips for first demo
        $.jatt();

    });
    



    
</script>

