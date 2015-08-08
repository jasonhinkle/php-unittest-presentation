

$(document).ready(function(){

$('#convertButton').on('click',function(e){

    e.preventDefault();

    $.ajax({
    	url: 'server.php',
    	method: 'POST',
    	data: {number: $('#numberInput').val() },
    	// data: JSON.stringify({var:'val'}), // send data in the request body
    	// contentType: "application/json; charset=utf-8",  // if sending in the request body
    	dataType: 'json'
    }).done(function(data, textStatus, jqXHR) {


        $('#resultContainer').html(data.text);
    	$('#resultModal').modal('show');

    }).fail(function(jqXHR, textStatus, errorThrown) {

    	alert('An error occured');

    });

});




});
