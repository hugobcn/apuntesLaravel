/public/js


var url = 'http://twitter-laravel.com';
window.addEventListener("load", function () {
    
    // BUSCADOR
    //cambiar atributo action del elemento
	$('#buscador').submit(function(e){
		$(this).attr('action',url+'/gente/'+$('#buscador #search').val());
	});

});
