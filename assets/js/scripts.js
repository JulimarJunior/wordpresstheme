$('.btn-menu').click(function(){
	if($('.navbar-itens').hasClass('actived')) {
		$('.navbar-itens').removeClass('actived');
		$('.hamburguer').removeClass('actived');
	} else {
		$('.navbar-itens').addClass('actived');
		$('.hamburguer').addClass('actived');
	}
})