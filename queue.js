function WriteFile(text) 
{
   var fso  = new ActiveXObject("Scripting.FileSystemObject"); 
   var fh = fso.CreateTextFile("c:\\Test.txt", true); 
   fh.WriteLine(text); 
   fh.Close(); 
}
$( document ).ready(function() {
	function addtoqueue() {
		console.log("adding to queue")
	}
    
    $('#queueadd').submit(function( event ) {
	  // alert( "Handler for .submit() called." );
	  event.preventDefault();

	  if ($('#toadd').val() != ''){
	  	$('#queue').append('<li>' + $('#toadd').val() + '</li>');
	  	WriteFile("test")
	  }

	  $('#toadd').val('');
	});
});