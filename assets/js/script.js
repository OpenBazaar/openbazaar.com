
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

	$('#v2-filter-option-mobile-shipsto').on('change', function(e) {
		location.reload();
	});

	$('#v2-filter-option-mobile-rating, #v2-filter-option-mobile-category').on('change', function(e) {
		// Category filter
		var category = $('#v2-filter-option-mobile-category').val().trim();

		// Rating filter
		var rating_level = $('#v2-filter-option-mobile-rating').val();

		$('div[rating]')
			.hide()
			.each( function(i) {
				if($(this).attr('rating') >= rating_level) {
					var listingCategories = $(this).attr('category').split(",");
					if(category == "All" || listingCategories.includes(category)) {
						$(this).show();
					}
				}
			});

	});
	
	$('.ratings-input-control').on('click', function(e) {
		alert('test');
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
		$('.carousel-thumb').removeClass('v2-thumbActive');
		$(this).addClass('v2-thumbActive');
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

	$('#v2-loader').on('inview', function(event, isInView) {
		if (isInView) {

			page = $('#v2-page').val();
			pageNumber = $('#v2-pageNumber').val();
			shippingTo = $('#v2-country').val();
			currency = $('#v2-acceptedCurrency').val();

			switch(page) {
				case "home":
					$.get('/home/listings?a0_shipping='+shippingTo+'&acceptedCurrencies='+currency, (data)=> {
						$('.v2-listingContainer').append(data);
					});
					break;
				case "trending":
					$.get('/home/trending_listings?a0_shipping='+shippingTo+'&acceptedCurrencies='+currency+'&page='+pageNumber, (data)=> {
						pageNumber++;
						$('#v2-pageNumber').val(pageNumber);
						$('.v2-listingContainer').append(data);
					});
					break;
				case "new":
					$.get('/home/new_listings?a0_shipping='+shippingTo+'&acceptedCurrencies='+currency+'&page='+pageNumber, (data)=> {
						pageNumber++;
						$('#v2-pageNumber').val(pageNumber);
						$('.v2-listingContainer').append(data);
					});
					break;
				case "search":
					let currentPage = parseInt($('#search_results_page').val());
					let query = $('#search_query').val();
					$('#search_results_page').val(currentPage+1);
					$.get('/discover/search_results?'+query+'&page='+currentPage, (data)=> {
						if(data != "") {
							$('.v2-listingContainer').append(data);
							if($('.v2-listingBox').length < 50) {
								$('#v2-loader').remove();
							}
						} else {
							$('#v2-loader').remove();
						}

					});
					break;
			}


		} else {

			// element has gone out of viewport

		}
	});

	$('#v2-country').change(()=> {
		$.get('/config/set_country/'+$('#v2-country').val());
		$('.v2-listingContainer').empty();
	});

	$('#v2-filterAccepts').change(()=> {
		$.get('/config/set_accepted_currency/'+$('#v2-acceptedCurrency').val());
		$('.v2-listingContainer').empty();
	});

	$('#v2-filterCurrency').change(()=> {
		$.get('/config/set_currency/'+$('#v2-currency').val());
		$('.v2-listingContainer').empty();
	});

	$('#v2-timePeriod').change(()=> {
		$.get('/config/set_time_period/'+$('#v2-timePeriod').val());
		$('.v2-listingContainer').empty();
	});

	$('#v2-cover-mobile').click(() => {
		$('#v2-cover-mobile').toggleClass('v2-visible');
		$('#v2-slider-home').toggleClass('v2-slider');
		$('#v2-buynowModal').toggleClass('mobile-hidden');
		$('.v2-listingContainer').empty();
	})

	$('.v2-chosenSelect').chosen();
	$('#v2-country').chosen({ width: "200" });
	$('#v2-acceptedCurrency').chosen({ width: "110" });
	
});

function showBuyNowModal() {
	$('#v2-cover-mobile').toggleClass('v2-visible');
	$('#v2-buynowModal').removeClass('mobile-hidden');
}

function toggleFilterSlideup() {
	$('#v2-slider-home').toggleClass('v2-slider');
	$('#v2-cover-mobile').toggleClass('v2-visible');

	$('.v2-chosenSelect').chosen();
	$('#v2-filter-option-mobile-shipsto').chosen({ width: "50" });

	$('#v2-filter-option-mobile-shipsto').change(()=> {
		$.get('/config/set_country/'+$('#v2-filter-option-mobile-shipsto').val());
	});

	$('#v2-filter-option-mobile-timePeriod').change(()=> {
		$.get('/config/set_time_period/'+$('#v2-filter-option-mobile-timePeriod').val());
	});

	$('#v2-filter-option-mobile-accepts').change(()=> {
		$.get('/config/set_accepted_currency/'+$('#v2-filter-option-mobile-accepts').val());
	});

	$('#v2-filter-option-mobile-currency').change(()=> {
		$.get('/config/set_currency/'+$('#v2-filter-option-mobile-currency').val());
	});
}

function toggleStoreFilterSlideup() {
	$('#v2-slider-home').toggleClass('v2-slider');
	$('#v2-cover-mobile').toggleClass('v2-visible');

	$('.v2-chosenSelect').chosen();
	$('#v2-filter-option-mobile-shipsto').chosen({ width: "50" });

	$('#v2-filter-option-mobile-shipsto').change(()=> {
		$.get('/config/set_country/'+$('#v2-filter-option-mobile-shipsto').val());
	});

	$('#v2-filter-option-mobile-timePeriod').change(()=> {
		$.get('/config/set_time_period/'+$('#v2-filter-option-mobile-timePeriod').val());
	});

	$('#v2-filter-option-mobile-accepts').change(()=> {
		$.get('/config/set_accepted_currency/'+$('#v2-filter-option-mobile-accepts').val());
	});

	$('#v2-filter-option-mobile-currency').change(()=> {
		$.get('/config/set_currency/'+$('#v2-filter-option-mobile-currency').val());
	});
}

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
	
	$('.v2-listingBox').each(function(i, v) {
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

	$('.v2-listingBox:visible').css('margin-right', 18);

	console.log($('.v2-store-listingsBody > div:visible'));

	$('.v2-store-listingsBody > div:visible').each((i, e) => {
		if(i%5==4) {
			$(e).css('margin-right', 0);
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

function submitSurvey(f) {
	const XHR = new XMLHttpRequest();

	// Bind the FormData object and the form element
	var FD = new FormData(f);

	// Define what happens in case of error
	XHR.addEventListener( "error", function( event ) {
		alert( 'Oops! Something went wrong.' );
	} );

	// Set up our request
	XHR.open( "POST", "https://search.ob1.io/survey" );

	// The data sent is what the user provided in the form
	XHR.send(FD);

	hideSurvey();
}

function hideSurvey() {
	var newRequest = new XMLHttpRequest();

	newRequest.addEventListener( "error", function( event ) {
		alert( 'Oops! Something went wrong.' );
	} );

	newRequest.open("GET", "/buy/survey");
	newRequest.send();
	document.getElementById('surveywidget-container').style.display='none';
}

function gotoListing(peerID, slug) {
	window.location.href = '/' + peerID + '/store/' + slug;
}

function clickTab(tab) {
	window.location.href = '/' + tab;
}