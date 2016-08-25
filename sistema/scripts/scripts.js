	$(function() {
				
		$('html,body').animate({scrollTop:0}, 500);
		
		
		//-- Caja de buscador
		$(this).find('#btn_srch').stop();
		$(this).find('#btn_srch').click(function(){
			$('.cls_buscar').stop();
			$('.cls_buscar').fadeToggle();
		});		
		
		//-- INDICADOR DE SECCION ACTIVA -->
		var dstoy = $('#dstoy').attr('class');
		switch (dstoy){
			case 'nosotros':
				$('.cont_mn .nosotros').addClass('mn_act');
			break;
			case 'portafolio':
				$('.cont_mn .portafolio').addClass('mn_act');
			break;
			case 'servicios':
				$('.cont_mn .servicios').addClass('mn_act');
			break;
			case 'presupuesto':
				$('.cont_mn .presupuesto').addClass('mn_act');
			break;
			case 'contacto':
				$('.cont_mn .contacto').addClass('mn_act');
			break;
		}
		
		//	Fuild layout, centering the items
		$('#sld_clientes').carouFredSel({
			width: '100%',
			scroll: 2,
			mousewheel: true,
			swipe: {
				onMouse: true,
				onTouch: true
			}
		});
	
		// -- > Script Cajas Bottom -->
		$(this).find('.ftr_qacc li a').stop();
		$(this).find('.ftr_qacc li a').hover(function(){
			$(this).find('.cls_infoxtra').stop();
			$(this).find('.cls_infoxtra').css({
				'display' : 'block'
			});
			$(this).find('.cls_infoxtra').animate({
				'opacity' : '1'
			});
			$(this).find('.ico_id').stop();
			$(this).find('.ico_id').animate({
				'opacity' : '0.5'
			});
		}, function(){
			$(this).find('.cls_infoxtra').stop();
			$(this).find('.cls_infoxtra').animate({
				'opacity' : '0'
			}, function(){
				$(this).find('.cls_infoxtra').css({
					'display' : 'none'
				});
			});
			$(this).find('.ico_id').stop();
			$(this).find('.ico_id').animate({
				'opacity' : '1'
			});
		});
		
		
	});	
	
	
	
	// -- > SCRIPT VALIDACION FORMULARIO FOOTER	
	//ventas@wiboomedia.es  /*== Direccion de envio del formulario ==*/
	$(document).ready(function(){
		
		var data_num = 1;
		$('.iconList > span > img').click(function(){
			$('.shadow').css({'box-shadow': '0 0 5px 1px #A5CA3C'});
			var data_id = $(this).attr('data-id');
			data_num = parseInt($(this).attr('data-num'));
			var text = $(this).attr('title');
			
			$('.containerTooltip').css('display','none');
			$('.Inputs > input').hide();
			$('.containerTooltip > .tooltip').html(text);
			$('div[data-id="'+data_id+'"]').css('display','inline-block');
			$('input[id="'+data_id+'"]').show().focus();
		});
		
		function mostrar(data_num){
			$('.Inputs > input').hide();
			$('input[data-num="'+(data_num)+'"]').show().focus();
			$('.containerTooltip').css('display','none');
			
			var id = $($('input[data-num="'+(data_num)+'"]')).attr('id');
			var text = $($('.iconList > span > img[data-id="'+ id +'"]')).attr('title');
			
			$('.containerTooltip').css('display','none');
			$('.containerTooltip > .tooltip').html(text);
			$('div[data-id="'+id+'"]').css('display','inline-block');
		}
		
		$('#siguiente').click(function(){
			$('.error_mobile').css({'display':'none'});
			$('.envio_mobile').css({'display':'none'});
			$('.content').css({'border':'none'});
			$('.shadow').css({'box-shadow': '0 0 5px 1px #A5CA3C'});
			if (data_num < 3)
			{
				data_num = data_num + 1;
				mostrar(data_num);
			}else if(data_num == 3){
				$('.Inputs > input:not(input[type="hidden"])').each(function() {
					if($(this).val()=="")
					{
						data_num = parseInt($(this).attr('data-num'));
						mostrar(data_num);
						$('.shadow').css({'box-shadow': '0 0 5px 1px red'});
						$('.validar').addClass('unchecked');
						
						if (window.innerWidth > 730)
						{
							$('#fancyError,.capaError').css({'display':'block'});
						} else {
							$('.error_mobile').css({'display':'block'});
							$('.content').css({'border':'1px solid transparent'});
						}
						
						return false;
					}else{
						data_num = 200;
						var quien = parseInt($(this).attr('data-num'));
						$('img[data-num="'+quien+'"]').next('.validar').removeClass('unchecked');
						$('img[data-num="'+quien+'"]').next('.validar').addClass('checked');
					}
				});
				if(data_num == 200){
				  
					var str = $("#frmContacto").serialize();
					$.ajax({
						type: "get",
						url: "envio.php?"+str,
						}).done(function( msg ) {
							   if (msg == 0)
								{
									$('#frmContacto').each (function(){
									  this.reset();
									});
									$('.validar').removeClass('checked');
									data_num = 1;
									
									if (window.innerWidth > 730)
									  {
										$('#fancy_envio,.capa_envio').css({'display':'block'});
									  } else {
										$('.envio_mobile').css({'display':'block'});
										$('.content').css({'border':'1px solid transparent'});
									  }
								}else{
								  if (window.innerWidth > 730)
									{
										$('#fancyError,.capaError').css({'display':'block'});
									} else {
										$('.error_mobile').css({'display':'block'});
										$('.content').css({'border':'1px solid transparent'});
									}  
								}
							});
				}
			}
		});
	
		$('#ver').click(function(){
				$('.toggle').slideToggle('slow');
		});
		
		$('#fancyError,#fancy_envio,.capa_envio').click(function(){
				$(this).css({'display':'none'});
		});
	});