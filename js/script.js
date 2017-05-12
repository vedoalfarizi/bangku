/**
 * Created by MJI on 12/05/2017.
 */

var modal = document.getElementById('modal1');
var btn = document.getElementById("ambilbtn");
var span = document.getElementsByClassName("close")[0];
btn.onclick = function() {
    modal.style.display = "block";
}


span.onclick = function() {
    modal.style.display = "none";
}

window.onclick = function() {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
