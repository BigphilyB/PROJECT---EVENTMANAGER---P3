var selectbox = document.getElementById("eventName");
var inputbox = document.getElementById("input_number");
var xhttp = new XMLHttpRequest();

selectbox.addEventListener('change', function(e){
    var currentValue = this.value;

    xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200){
            inputbox.innerHTML = this.responseText;
        }
    };


    xhttp.open("GET", "./xhr/new_html.php?id="+currentValue, true);
    xhttp.send();
});
