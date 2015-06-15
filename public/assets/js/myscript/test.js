$(function() {
	$('.img-responsive').click(function(){
		alert("hello Nam");
	});
	$('.img-responsive').lazyload({
        effect: "fadeIn"
     });
});