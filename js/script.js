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

window.onclick = function(modal) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

//--------------------------------------------------------------------------------------------------------------

function satu() {
    var a1 = document.getElementById('a1');
    var b1 = document.getElementById('a2');
    var c1 = document.getElementById('a3');

    a1.style.display = 'block';
    b1.style.display = 'none';
    c1.style.display = 'none';

    var bt1 = document.getElementById('b1');
    bt1.style.backgroundColor = 'white';
    bt1.style.color = '#63c9f0';
}
function dua() {
    var a2 = document.getElementById('a1');
    var b2 = document.getElementById('a2');
    var c2 = document.getElementById('a3');

    a2.style.display = 'none';
    b2.style.display = 'block';
    c2.style.display = 'none';

}
function tiga() {
    var a3 = document.getElementById('a1');
    var b3 = document.getElementById('a2');
    var c3 = document.getElementById('a3');

    a3.style.display = 'none';
    b3.style.display = 'none';
    c3.style.display = 'block';
}

//------------------------------------------------------
