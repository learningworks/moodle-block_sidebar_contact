/*
 * Moodle Plugin
 *
 * scripts.js
 *
 * @package    block
 * @subpackage sidebar_contact
 * @copyright  2014 Thomas Threadgold, LearningWorks Ltd
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


/*
*	Initialise on load
*/
jQuery(document).ready(function($) {

	function loadForm() {
		var ajaxURL = window.location.origin + '/blocks/sidebar_contact/content.php';

		jQuery.ajax({
			'url': ajaxURL,
			'dataType' : 'html'
		}).done(function(res){
			// ADD THE FORM TO THE HTML
			$('body').append(res);

			// ATTACH EVENT HANDLERS TO FORM
			$('.block__sidebar-contact--toggle').on('click', function(event) {
				event.preventDefault();
				$('.block__sidebar-contact').toggleClass('active');
			});

			$('.block__sidebar-contact .toggle').on('click', function(event) {
				event.preventDefault();
				$('.block__sidebar-contact').toggleClass('active');
			});

			$('.block__sidebar-contact .form__anon').on('click', function(event) {
				$('.block__sidebar-contact .form__name').toggleClass('anon');
				$('.block__sidebar-contact .form__email').toggleClass('anon');
			});

			$('.block__sidebar-contact .form__submit').on('click', function(event) {
				event.preventDefault();

				var valid = true;

				// RESET ERROR STATUS OF FORM INPUTS
				$('.block__sidebar-contact .form__input').removeClass('error');

				// GET THE DATA
				var ajaxURL = $('.block__sidebar-contact .form__url').val();
				var name = $('.block__sidebar-contact .form__name').val();
				var email = $('.block__sidebar-contact .form__email').val();
				var message = $('.block__sidebar-contact .form__message').val();
				var anon = $('.block__sidebar-contact .form__anon').is(':checked');

				// VALIDATE THE DATA
				if(!anon){
					if( 0 === name.length ) {
						valid = false;
						$('.block__sidebar-contact .form__name').addClass('error');
					}

					if(!isEmail(email)) {
						valid = false;
						$('.block__sidebar-contact .form__email').addClass('error');
					}
				}

				if( 0 === message.length ) {
					valid = false;
					$('.block__sidebar-contact .form__message').addClass('error');
				}

				if(valid) {

					if(anon){
						var ajaxdata = {
						 	'action': 'sendmail',
						 	'anon': true,
						 	'message': message
						};
					}else{
						var ajaxdata = {
						 	'action': 'sendmail',
						 	'name': name,
						 	'email': email,
						 	'message': message
						};
					}

					jQuery.post( ajaxURL, ajaxdata, function(res){

						if( res == 'true') {
							$('.block__sidebar-contact .form__feedback--success').fadeIn('slow').delay(2000).fadeOut('slow');

							$('.block__sidebar-contact .form__name').val('');
							$('.block__sidebar-contact .form__email').val('');
							$('.block__sidebar-contact .form__message').val('');

							setTimeout(function(){
								$('.block__sidebar-contact').removeClass('active');
							}, 3200);
						} else {
							$('.block__sidebar-contact .form__feedback--error').fadeIn('slow').delay(3000).fadeOut('slow');
						}
					});
				}

				// PREVENT DEFAULT FORM ACTION
				return false;
			});
		});
	}

	loadForm();
});

//VALIDATES INPUT IS FORMATTED AS EMAIL
function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}