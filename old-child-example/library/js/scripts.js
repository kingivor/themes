/*----------------------------------
*							
*	Version: 1.0				  
*	Date: August 2013			  
*	Author: Dan Rowan		  
*	Mail: thedanrowan@gmail.com
*								  
*----------------------------------*/




/*-------------------
	Colorbox for modals
	-------------------*/

	$(document).ready(function(){
		$(".popup").colorbox({inline:true, width:"auto"});
		$(".print1").colorbox({rel:'print1', transition:"fade"});
		$(".print2").colorbox({rel:'print2', transition:"fade"});
		$(".print3").colorbox({rel:'print3', transition:"fade"});
		$(".band-photo").colorbox();					
		//$(".youtube").colorbox({iframe:true, innerWidth:640, innerHeight:390});	
	});
		
	
    /* Colorbox resize function */
	var resizeTimer;
	function resizeColorBox()
	{
		if (resizeTimer) clearTimeout(resizeTimer);
		resizeTimer = setTimeout(function() {
				if (jQuery('#cboxOverlay').is(':visible')) {
						jQuery.colorbox.load(true);
				}
		}, 300)
	}
	
	// Resize Colorbox when resizing window or changing mobile device orientation
	jQuery(window).resize(resizeColorBox);
	window.addEventListener("orientationchange", resizeColorBox, false);
	



/*-------------------
	Smooth scroll nav (that doesn't conflict with modals)
	-------------------*/

	$(document).ready(function(){
		$(".scroll").click(function(event){
				 event.preventDefault();
				 //calculate destination place
				 var dest=0;
				 if($(this.hash).offset().top > $(document).height()-$(window).height()){
					  dest=$(document).height()-$(window).height();
				 }else{
					  dest=$(this.hash).offset().top;
				 }
				 //go to destination
				 $('html,body').animate({scrollTop:dest}, 400,'swing');
		});
	});
	
	
	
	
/*-------------------
	Input handlers (clears contact form fields on focus, remembers entered data)
	-------------------*/
	$(document).ready(function(){	
		$('input, textarea').focus(function(){
			var elm = $(this),
				value = elm.val(),
				old = elm.data("placeholder");       
			if (typeof old === "undefined"){
				elm.data("placeholder", value);
				old = value;
			}
			if (old == value){
				elm.val("");
			}
		}).blur(function() {
			var elm = $(this);
			if(elm.val() == ""){
				elm.val(elm.data("placeholder"));
			}
		});
	});	
	