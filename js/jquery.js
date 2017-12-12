$(document).ready(function() {
	$('#popUp').click(function() {
		alert('Sivun alaosassa');
	});
    $('#popUp2').click(function() {
        alert('Sivun alaosassa');
    });
	
	$('#login').hide();
	
	$('#loggaus').click(function() {
	$('#kuvat, #kuvat2, #kuvat3').hide();
	$('#login').show();
	});

	
});