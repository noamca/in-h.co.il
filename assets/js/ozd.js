
$(".lang_switcher").each(function(){
	$(this).val(location.href);
});

$(function(){
	var parts = window.location.search.substr(1).split("&");
	var $_GET = {};
	for (var i = 0; i < parts.length; i++) {
		var temp = parts[i].split("=");
		$_GET[decodeURIComponent(temp[0])] = decodeURIComponent(temp[1]);
	}	
	
	$("#searchform").find("select").each(function(){		
		$(this).val($_GET[$(this).attr("name")]);
	});
});
/*
chrome contact form 7 date fix
*/ 	

$('input[type="date"], input[type="datetime"], input[type="datetime-local"], input[type="month"], input[type="time"], input[type="week"]').each(function() {
    var el = this, type = $(el).attr('type');
    if ($(el).val() === ''){
		$(el).attr('type', 'text');
	}
    $(el).focus(function() {
        $(el).attr('type', type);
        el.click();
    });
    $(el).blur(function() {
        if ($(el).val() === ''){ $(el).attr('type', 'text');}
    });

});


/*
Smooth Scroll
*/

$(function() {
  $('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') && location.hostname === this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});

function initContactForm() {
    jQuery( 'div.wpcf7 > form' ).each( function() {
        var $form = $( this );
	wpcf7.initForm( $form );
        if ( wpcf7.cached ) {
            wpcf7.refill( $form );
	}
    } );
}	

jQuery(document).ready(function($){
	/*
	add pull-down class support
	*/ 	
	$('.pull-down').each(function() {
		var $this = $(this);
		$this.css('margin-top', $this.parent().height() - $this.height());
	});	
	/*
	add bootstrap tooltip support
	*/ 	
	$('[data-toggle="tooltip"]').tooltip(); 	

		
	$('.spinner').hide();
	$('.asset').css('opacity',1);			
	
	$('.lang_switcher').on('change', function() {
	  location.href = this.value;
	});	
	
});