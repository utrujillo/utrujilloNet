
	/*$('.fancybox').fancybox({});
	
	$('.fancybox img').captify();
	
	$('.gallery-list').hover(
		function() {},
		function()
		{
			$(this).find('li img').animate({opacity:1},250);
		}	
	);
	
	$('.gallery-list li').hover(
		function() 
		{
			$(this).siblings('li').find('img').css('opacity',0.5);
			$(this).find('img').animate({opacity:1},250);
		},
		function()
		{
			$(this).find('img').css('opacity',1);	
		}
	);*/

	$(".showPicture").colorbox({ rel:'view', slideshow:true, transition:"fade" });
	$('.coments').colorbox({ iframe: true, width:"700px", height:"530px",
								onClosed: function(){ window.location.reload(); } });

	
	$('#slider').nivoSlider({directionNav:false});


	
	var coordinate=new google.maps.LatLng(16.857428,-99.895701);
	var mapOptions= 
	{
		zoom:15,
		center:coordinate,
		mapTypeId:google.maps.MapTypeId.ROADMAP
	};
									
	map=new google.maps.Map(document.getElementById('map'),mapOptions);