import jQuery from "jquery"

/**
 * Import JQuery
 */
window.jQuery = window.$ = jQuery;

$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});

/**
 * Loader example
 */
require('../components/Example.jsx');