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

function satu() {
    var a1 = document.getElementById('a1');
    var b1 = document.getElementById('a2');
    var c1 = document.getElementById('a3');

    a1.style.display = 'block';
    b1.style.display = 'none';
    c1.style.display = 'none';
    // console.log("berhasil1");
    // b1 = document.getElementById('b1');
    // b1.style.backgroundColor= 'red';
    // b12 = document.getElementById('b2');
    // b12.style.backgroundColor= '';
    // b13 = document.getElementById('b3');
    // b13.style.backgroundColor= '';
}
window.onload() = function () {
    var qq = document.getElementById('a1');
    var qw = document.getElementById('a2');
    var qe = document.getElementById('a3');

    qq.style.display = 'block';
    qw.style.display = 'none';
    qe.style.display = 'none';
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
