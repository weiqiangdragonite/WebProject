
function process() {
	var template, data, html;

	/* Extracts the template code stored in the #template textarea, and
	stores it in the variable template. */
	template = $('#template').val();

	/* Calls eval() on the contents of the #data textarea, which creates
	the data object. */
	eval( $('#data').val() );

	/* Calls Mustache.render(), passing in the Mustache template stored in
	template, as well as the data object stored in data. This generates the
	finished markup, which the code then stores in the html variable. */
	html = Mustache.render( template, data );

	/* Inserts the markup stored in html into the #html textarea, as well
	as the #result div, so that the markup can be both viewed by the user
	and rendered by the browser. */
	$('#html').text( html );
	$('#result').html( html );
}
