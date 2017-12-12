




var xhr = new XMLHttpRequest();

var showImages = function(){
    if(xhr.readyState === 4 && xhr.status === 200){
        var json = JSON.parse(xhr.responseText);
        var output = '';
        for(var i in json){
            output += '<li>' +
                '<figure>' +
                '<a href="img/' + json[i].mediaUrl +'"><img src="img/' +
                json[i].mediaUrl + '"></a>' +
                '<figcaption>' +
                '<h3>' + json[i].mediaTitle + '</h3>' +
                '</figcaption>' +
                '</figure>' +
                '</li>';
        }
        document.querySelector('ul id="kuvat"').innerHTML = output;

    }

}

xhr.open('GET', 'jsonKuvat.php');
xhr.onreadystatechange = showImages;
xhr.send();



