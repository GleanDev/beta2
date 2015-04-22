/**
 * Project			:		Scoot
 * Date				:		09-Apr-2015
 * Developer		:		Glean Team
 */

$( function() {
	var Scoot = {
		init: function() {
			this.loadBg();
			this.navbarBgChange();
		},
		loadBg: function() {
			var that = this;
			if ( $('.grid-content').size() > 0 ) {
				$('.grid-content').each( function() {
					var bg = $( this ).attr('data-bgcolor');
					var r = that.hex2rgb( bg ).r;
					var g = that.hex2rgb( bg ).g;
					var b = that.hex2rgb( bg ).b;
					var opacity = $( this ).attr('data-opacity');

					$( this ).css({
						'background': 'rgba( ' + r + ', ' + g + ', ' + b + ', ' + opacity + ')',
					});
				});
			}
		},
		checkScrollHeight: function() {
			var that = this;
			var height = $( window ).scrollTop();
			var heroHeight = $('.hero').height() - 258;

			if ( ( height > heroHeight ) ) {
				$('.navbar').addClass('has-background');
				$('a.navbar-brand').removeClass('white-logo');

				if ( $('.navbar-collapse').hasClass('in') ) {
					$('.navbar').addClass('has-background');
				}
			} else {
				if ( ! $('.navbar-collapse').hasClass('in') ) {
					$('.navbar').removeClass('has-background');
					$('a.navbar-brand').addClass('white-logo');
				}
			}
		},
		navbarBgChange: function() {
			var that = this;

			that.checkScrollHeight();

			$( window ).scroll( function( event ) {
				that.checkScrollHeight();
			});

			$('.navbar-toggle').click( function() {
				if ( ! $('.navbar-collapse').hasClass('in') ) {
					$('.navbar').addClass('has-background');
					$('a.navbar-brand').removeClass('white-logo');
				}
			});
		},

		// Convert Hexadecimal value to RGB
		hex2rgb: function( hex ) {
			// Expand shorthand form (e.g. "03F") to full form (e.g. "0033FF")
			var shorthandRegex = /^#?([a-f\d])([a-f\d])([a-f\d])$/i;
			hex = hex.replace( shorthandRegex, function( m, r, g, b ) {
				return r + r + g + g + b + b;
			});

			var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec( hex );
			return result ? {
				r: parseInt(result[1], 16),
				g: parseInt(result[2], 16),
				b: parseInt(result[3], 16)
			} : null;
		}
	}

	$( document ).ready( function() {
		Scoot.init();
	});
});
