(function($){
	$.fn.helloWorld = function(){
		//alert("Hi Hello for test implement for jQuery plugin.");
		
		return this.each(function() {
            $(this).val("Hi Hello for test implement for jQuery plugin.");
        });
	}
	
}(jQuery));