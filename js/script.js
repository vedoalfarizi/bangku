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

//untuk tab
var i = 10;

function satu() {
    var a = document.getElementById('a1');
    a.style.zIndex = i;
    // a.style.backgroundColor= 'red';
    i++;
    console.log("berhasil1");
    b1 = document.getElementById('b1');
    b1.style.backgroundColor= 'red';
    b12 = document.getElementById('b2');
    b12.style.backgroundColor= '';
    b13 = document.getElementById('b3');
    b13.style.backgroundColor= '';
}
function dua() {
    var b = document.getElementById('a2');
    b.style.zIndex = i;
    i++;
    console.log("berhasil2");
    var b2 = document.getElementById('b2');
    b2.style.backgroundColor= 'blue';
    b22 = document.getElementById('b1');
    b22.style.backgroundColor= '';
    b23 = document.getElementById('b3');
    b23.style.backgroundColor= '';
}
function tiga() {
    var c = document.getElementById('a3');
    c.style.zIndex = i;
    i++;
    console.log("berhasil3");
    var b3 = document.getElementById('b3');
    b3.style.backgroundColor= 'green';
    b32 = document.getElementById('b1');
    b32.style.backgroundColor= '';
    b33 = document.getElementById('b2');
    b33.style.backgroundColor= '';
}
//------------------------------------------------------
