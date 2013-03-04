$(function(){

	// Checking for CSS 3D transformation support
	$.support.css3d = supportsCSS3D();

	var formContainer = $('.loginWrapper');

	// Listening for clicks on the ribbon links
	$('.flip').click(function(e){

		// Flipping the forms
		formContainer.toggleClass('flipped');

		// If there is no CSS3 3D support, simply
		// hide the login form (exposing the recover one)
		if(!$.support.css3d){
			$('#login').toggle();
		}
		e.preventDefault();
	});

	formContainer.find('form').submit(function(e){
		// Preventing form submissions. If you implement
		// a backend, you might want to remove this code
		//e.preventDefault();
	});


	// A helper function that checks for the
	// support of the 3D CSS3 transformations.
	function supportsCSS3D() {
		var props = [
			'perspectiveProperty', 'WebkitPerspective', 'MozPerspective'
		], testDom = document.createElement('a');

		for(var i=0; i<props.length; i++){
			if(props[i] in testDom.style){
				return true;
			}
		}

		return false;
	}

	$(".loginPic").hover(
		function() {

		$('.logleft, .logback').animate({left:10, opacity:1},200);
		$('.logright').animate({right:10, opacity:1},200); },

		function() {
		$('.logleft, .logback').animate({left:0, opacity:0},200);
		$('.logright').animate({right:0, opacity:0},200); }
	);

	$(".styled, input:radio, input:checkbox, .dataTables_length select").uniform();

	/**
	 * Login Ajax
	 */
	$('#login').on('submit', function() {
		var self = $(this),
			loading = $('<img src="/public/images/elements/loaders/4.gif" id="loginLoading" title="Carregando..." class="loadingLogin" />')

		$.ajax({
			'url': self.attr('action'),
			'type': self.attr('method'),
			'dataType': 'json',
			'data': self.serialize(),
			'beforeSend': function() {
				if ( !$('#loginLoading').length )
					$('#avatarUser').append(loading);
			},
			'success': function(d) {
				if ( d.code == 300 ) {
					$('#welcomeToPanel').html(d.message);
					loading.remove();
				}
				else if ( d.code == 200 ) {
					loading.remove();
					$('#avatarUser').find('img').attr('src', d.avatar);
					$('#welcomeToPanel').html(d.message);

					window.setTimeout(function() {
						window.location = '/painel';
					}, 5000);
				}
			}
		})

		return false;
	});
});
