//document.ready --- quando o documento estiver pronto
$(document).ready(function(){

	$(".BurguerMobile").on("click", function(){
		
		$(".mobileLogin form").removeClass("open");
		$(".mobileSearch form").removeClass("open");
		$(".menuMobile ul").toggleClass("open");
		
	});

	$(".searchMobile").on("click", function(){
		
		$(".menuMobile ul").removeClass("open");
		$(".mobileLogin form").removeClass("open");
		$(".mobileSearch form").toggleClass("open");
		
	});

	$(".loginMobile").on("click", function(){
		
		$(".menuMobile ul").removeClass("open");
		$(".mobileSearch form").removeClass("open");
		$(".mobileLogin form").toggleClass("open");

	});

	
});