
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
    
    $('.Discover-Body-Listing-Box')
    	.on('mouseover', function(evt) {
	   		if(window.innerWidth > 768){
		   		$(this).find(".reportBtnShell").show();
		   	}
    	})
    	.on('mouseout', function(evt) {
	    	if(window.innerWidth > 768){
		    	$(this).find(".reportBtnShell").hide();
		    }
    	});
    
    $('.reportBtnShell').on('click', function(evt){ 
	   event.stopPropagation();
	   $('#Config-Modal').show();	  
	   var peerID = $(this).attr('data-peerID');
	   var slug = $(this).attr('data-slug');
	   $('#Config-Modal').load('/report', function() {		   
		   $('#Config-Form input[name=peerID]').val(peerID);
		   $('#Config-Form input[name=slug]').val(slug);	 
	   });
    });
    
    $(".lazy").Lazy({
	    enableThrottle: true,
	    throttle: 500,
	    // callback
	    beforeLoad: function(element) {
	        
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

	$('div.category-button').click(function() {
        $('div.lazy').lazy({
            bind: "event"
        });
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
	
	$('.category-button').on('click', function() {
		$('.category-row').removeClass('active');
		$(this).parent().addClass('active');
		var sanicat = $(this).attr('category');
		$('#sani-category').val(sanicat);
		applyListingsFilter();
	});
	
	// AJAX load inventory for listing
	$('#crypto-inventory').each(function(index) {
		
		var peerID = $(this).data('slug');
		var slug = $(this).data('slug');
		var divisibility = $(this).data('divisibility');
		
		$.getJSON("http://gateway.ob1.io/ob/inventory/"+peerID+"/" + slug + "?usecache=true", function(data) {
			$('#crypto-inventory').html(data.inventory/divisibility);
		});		  
		
	});
	
	$('.promotion-checkbox').change(function () {
		var code = $(this).data().id;
		$.ajax({
		  url: "/discover/togglecode",
		  data: { code: code, claimed: this.checked }
		})
	});


	
});

function processHeaderSearch() {
	var searchterm = encodeURIComponent($('.header-search-input').val());
	location.href='/discover/results?q='+searchterm;
	return false;
}

function dismissBanner() {
	
	$('body').addClass('no-promotion');
	
	// Set session var to hide it
	$.ajax({
	  url: "/discover/hidebanner"
	})
}

function applyListingsFilter() {
	
	var shipto = $('#filter_country').val();
	var freeshipping = $('#filter_freeshipping').is(':checked');
	var category = $('#sani-category').val();
	var rating = $("input:radio[name=rating]:checked").val();
	
	$('.Store-Body-Listing-Box').each(function(i, v) {
		if(category == "All") {
			$(v).show();
		}
		
		// Check for free shipping
		if(freeshipping) {
			if($(v).attr('freeshipping') != "") {
				$(v).show();			
			} else {
				$(v).hide();
			}
		} else {
			$(v).show();
		}
		
		// Check for shipping to your location
		
		// Check for category
		var categories = $(v).attr('category').split(',');
		console.log(category, categories);
		if($(v).is(':visible') && (!categories.includes(category) && category != 'All')) {
			$(v).hide();
		}
		
		// Check for rating
		if($(v).is(':visible') && (!$(v).attr('rating') < rating)) {
			$(v).hide();
		}

		
	});
	

	
}

var decodeHTML = function (html) {
  var txt = document.createElement('textarea');
  txt.innerHTML = html;
  return txt.value;
};

function copyToClipboard(text) {

  if (window.clipboardData && window.clipboardData.setData) {
    // IE specific code path to prevent textarea being shown while dialog is visible.
    return clipboardData.setData("Text", text);

  } else if (document.queryCommandSupported && document.queryCommandSupported("copy")) {
    var textarea = document.createElement("textarea");
    textarea.textContent = text;
    textarea.style.position = "fixed";  // Prevent scrolling to bottom of page in MS Edge.
    document.body.appendChild(textarea);
    textarea.select();
    try {
      return document.execCommand("copy");  // Security exception may be thrown by some browsers.
    } catch (ex) {
      console.warn("Copy to clipboard failed.", ex);
      return false;
    } finally {
      document.body.removeChild(textarea);
    }
  }
}

function filterListings(sanicat) {
	$('.Store-Body-Listing-Box').not('.category-'+sanicat).hide();
	$('.category-'+sanicat).show();
	$('#sani-category').val(sanicat.replace(" ","/"));
}

function toggleFreeShippingItems(box) {
	if(box.checked) {
		$('.Store-Body-Listing-Box').each(function(i, v) {
			
			if($(v).is(':visible') && $(v).attr('freeshipping') != "") {
				$(v).show();
			} else {
				$(v).hide();
			}
		});
	} else {
		$('.Store-Body-Listing-Box').show();
	}
	
}
