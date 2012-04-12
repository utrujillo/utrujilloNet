				
	$(document).ready(function() 
	{
		$('.cascade').casadeLanding();
		
		//datos del formulario
		$("form").live('submit',function() {
			//alert($("#sendForm").attr('action'));
			//var form = $("#sendForm");
			
	  		// Enviamos el formulario usando AJAX
	        $.ajax({
	            type: 'POST',
	            url: $(this).attr('action'),
	            data: $(this).serialize(),
	            // Mostramos un mensaje con la respuesta de PHP
	            success: function(data) {
					//alert(data);
	                $('.layout-50-right:last').html(data);
	            }
	        })        
	        return false;
	    });
		
		//Eliminando Alertas Manualmente
		$('.close').live('click',function(){
				$(this.parentNode).fadeOut(function(){
					$(this).remove();
				});
		});
				
		$.getJSON('http://twitter.com/statuses/user_timeline.json?screen_name=uzieltrujillo&count=10&callback=?', function(data) 
		{
			if(data.length)
			{
				var list=$('<ul>');
				$(data).each(function(index,value)
				{
					list.append($('<li>').append($('<p>').html(value.text)));
				});
						
				$('#latest-tweets').append(list);
					
				list.bxSlider(
				{
					auto: true,
					mode:'vertical',
					nextText:null,
					prevText:null,
					displaySlideQty:1,
				   pause:5000
				});  
			}
		});
	});