function send(current) {
    var search =document.getElementById("search").value;
    var xhr = new XMLHttpRequest();
    var text = "ajax.php?currentpage="+current+"&search="+search;
    xhr.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("demo").innerHTML = this.responseText;
          }
    };
    xhr.open('GET',text,true);
    xhr.send();
}
