
// console.log($('.verified-mod-badge').children());

$(document).ready(() => {
	$('.verified-mod-badge').hover( function() {		
		$(this).children().removeClass('hidden');
	}, function() {		
		$(this).children().addClass('hidden');
	})
	
	
	$('.copy-btn').on("click", function(){

        value = $('#obLink').attr('href'); //Upto this I am getting value
        var $temp = $("<input>");
          $("body").append($temp);
          $temp.val(value).select();
          document.execCommand("copy");
          $temp.remove();
    })
	
});
