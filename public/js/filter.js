
$(document).ready(function(){
	$('.nav-link').click(function(){
		const value = $(this).attr('data-filter');
		if(value=='all'){
			$('.card').show('1000');
		}else{
			$('.card').not('.'+value).hide('1000');
			$('.card').filter('.'+value).show('1000');
		}
	})
	
	
	$('.card').click(function(){
		$this.addClass('active').siblings().removeClass('active');
	});
})
