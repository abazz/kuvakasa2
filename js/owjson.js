$(document).ready(function(){
	var weather = {};
	$.getJSON( "http://jsonplaceholder.typicode.com/photos", function( data ) {
		alert('done getjson');
		$('#cs').text("First photo's title: "+(data[0].title));
	});
	$.getJSON( "http://jsonplaceholder.typicode.com/photos", function( data ) {
		$('#cs3').text("third photos title: "+(data[2].title));
	});
	$.getJSON( "http://jsonplaceholder.typicode.com/photos", function( data ) {
		$('#cs2').text("Second photos url: "+(data[1].url));
	});
	$.getJSON( "tekstidokumentti.txt", function( data ) {
    	$('#cs4').text("Sun comment: "+(data[0].sun));
	});
	$.getJSON( "tekstidokumentti.txt", function( data ) {
    	$('#cs6').text("mountain2 comment: "+(data[0].mountain2));
	});
	$.getJSON( "tekstidokumentti.txt", function( data ) {
    	$('#cs7').text("field comment: "+(data[0].field));
	});
	$.getJSON( "tekstidokumentti.txt", function( data ) {
    	$('#cs8').text("Small comment: "+(data[1].small));
	});
	$.getJSON( "tekstidokumentti.txt", function( data ) {
    	$('#cs9').text("view comment: "+(data[2].view));
	});
	$.getJSON( "http://jsonplaceholder.typicode.com/photos", function( data ) {
		$('#cs5').text("fifth photos url: "+(data[4].url));
	});
});