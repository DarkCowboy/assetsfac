	$(function() {		
				
		//-- INDICADOR DE SECCION ACTIVA -->
		var dstoy = $('#dstoy').attr('class');
		switch (dstoy){
			case 'organizacion':
				$('.cls_menutop .organizacion').addClass('mn_act');
			break;
			case 'mensaje':
				$('.cls_menutop .mensaje').addClass('mn_act');
			break;
			case 'mision':
				$('.cls_menutop .mision').addClass('mn_act');
			break;
			case 'calendario':
				$('.cls_menutop .calendario').addClass('mn_act');
			break;
			case 'descargas':
				$('.cls_menutop .descargas').addClass('mn_act');
			break;
			case 'galeria':
				$('.cls_menutop .galeria').addClass('mn_act');
			break;
			case 'noticias':
				$('.cls_menutop .noticias').addClass('mn_act');
			break;
		}
		
	});	