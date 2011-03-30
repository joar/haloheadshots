if ('undefined' == typeof console ) {
	var console = {
		log: function () {
			// Do le nothing
		}
	};
}
var HHS = {
	searchGamertagEmQuery: '.navigation-searchGamertag #gt',
	searchGamertagEmText: 'Search Gamertag…',
	searchGamertagInactiveStyle: {
		color: '#aaa'
	},
	searchGamertagActiveStyle: {
		color: '#000'
	},
	updateAutocompleteTimeoutId: 0,
	updateAutocomplete: function () {
		$em = $( HHS.searchGamertagEmQuery );
		if ( $em.val().length > 2 ) {
			$.get('/?p=ajax&op=gamertagAutocomplete', {
				str: $em.val()
			}, function ( data ) {
				console.log(data);
			}, 'json');
		} else {
			console.log( $(this).val().length );
		}
	},
};
$(document).ready(function () {
	/* Tracking */
	$('form.navigation-searchGamertag').submit( function () {
		if ( ! $(this).hasClass('mpTracked') ) {
			mpq.push(['track', 'searchGamertag',{
				gamertag: $('.input-gt').val()
			}, function () {
				$('form.navigation-searchGamertag').addClass('mpTracked').submit();
			}]);
		//	return false;
		} else {
			//return true;
		}
	});
	/* End Tracking */
	$('.switch-logViewer-hide').click(function () {
		console.log( $('.logViewer-content').height() );
		$('.logViewer').slideToggle();
	});
	if ( ! ( $( HHS.searchGamertagEmQuery ).val().length ) ) {
		$( HHS.searchGamertagEmQuery ).focus( function () {
			if ( '' == $(this).val() || HHS.searchGamertagEmText == $(this).val() ) {
				$(this).blur(function () {
					if ( '' == $(this).val() ) {
						$(this).css( HHS.searchGamertagInactiveStyle ).val( HHS.searchGamertagEmText );
					}
				}).css( HHS.searchGamertagActiveStyle ).val('');
			}
		}).css( HHS.searchGamertagInactiveStyle ).val( HHS.searchGamertagEmText );
	}
	$( HHS.searchGamertagEmQuery ).keyup(function () {
		clearTimeout( HHS.updateAutocompleteTimeoutId );
		HHS.updateAutocompleteTimeoutId = setTimeout(HHS.updateAutocomplete, 300 );
	});
});