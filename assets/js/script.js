
// console.log($('.verified-mod-badge').children());

$(document).ready(() => {
	$('.verified-mod-badge').hover( function() {		
		$(this).children().removeClass('hidden');
	}, function() {		
		$(this).children().addClass('hidden');
	})
	
	
	$(".Search-OB1, .header-search-input").on('focus', function() { $(this).select(); });
	
	
	$('.copy-btn').on("click", function(){

        value = $('#obLink').attr('href'); //Upto this I am getting value
        var $temp = $("<input>");
          $("body").append($temp);
          $temp.val(value).select();
          document.execCommand("copy");
          $temp.remove();
    });
    
    // Create xhr pool so you can cancel all xhr requests when moving around
    $(function() {
	    $.xhrPool = [];
	    $.xhrPool.abortAll = function() {
	        $(this).each(function(i, jqXHR) {   //  cycle through list of recorded connection
	            jqXHR.abort();  //  aborts connection
	            $.xhrPool.splice(i, 1); //  removes from list by index
	        });
	    }
	    $.ajaxSetup({
	        beforeSend: function(jqXHR) { $.xhrPool.push(jqXHR); }, //  annd connection to list
	        complete: function(jqXHR) {
	            var i = $.xhrPool.indexOf(jqXHR);   //  get index for current connection completed
	            if (i > -1) $.xhrPool.splice(i, 1); //  removes from list by index
	        }
	    });
	});
    
    $('.listing-lazy').Lazy({
	    beforeLoad: function(element) {
	    },
	    appendScroll: ".More-Listings-Mobile"
    });
    
    $(".lazy").Lazy({
	    enableThrottle: true,
	    throttle: 500,
	    // callback
	    beforeLoad: function(element) {
	        console.log("start loading " + element.prop("tagName"));
	    },
	 
	    // custom loaders
	    followcard: function(element) {
		    console.log(element);
	        element.load('/follow/card/'+element.attr('id'));
	    },
	    asyncLoader: function(element, response) {
	        setTimeout(function() {
	            element.html("element handled by async loader");
	            response(true);
	        }, 1000);
	    }
	});

    
	
	$('.ratings-input-control').on('click', function(e) {
		
		// Category filter
		var category = $('.category-row.active').text().trim();
		
		// Rating filter		
		var rating_level = $(this).val();
		
		$('div[rating]')
			.hide()
			.each( function(i) { 
				
				if($(this).attr('rating') >= rating_level) { 
					console.log(category, $(this).attr('class'), $(this).hasClass(('category-'+category)));
					if(category == "All" || $(this).hasClass(('category-'+category))) {
						$(this).show(); 
					}
				} 
			});

	});
	
	$('.carousel-thumb').on('click', function(e) {
		var hash = $(this).attr('data-hash');
		$('.carousel-photo-stage').css('background-image', 'url(https://gateway.ob1.io/ob/images/'+hash+')');		
	})
	
	
	
});

function processHeaderSearch() {
	location.href='/discover/results/'+$('.header-search-input').val();
	return false;
}
