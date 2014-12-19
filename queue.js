$( document ).ready(function() {
	function addtoqueue() {
		console.log("adding to queue")
	}
    
    $('#queueadd').submit(function( event ) {
	  // alert( "Handler for .submit() called." );
	  event.preventDefault();

	  if ($('#toadd').val() != ''){
	  	$('#queue').append('<li>' + $('#toadd').val() + '</li>');
	  }

	  $('#toadd').val('');
	});
});