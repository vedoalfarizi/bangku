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
    var d1 = document.getElementById('a4');

    a1.style.display = 'block';
    b1.style.display = 'none';
    c1.style.display = 'none';
    d1.style.display = 'none';

    var bt1 = document.getElementById('b1');
    bt1.style.backgroundColor = '#63c9f0';
    bt1.style.color = 'white';
    bt1.style.borderColor = '#63c9f0';
    var bt2 = document.getElementById('b2');
    bt2.style.backgroundColor = 'white';
    bt2.style.color = '#63c9f0';
    bt2.style.borderColor = '#63c9f0';
    var bt3 = document.getElementById('b3');
    bt3.style.backgroundColor = 'white';
    bt3.style.color = '#63c9f0';
    bt3.style.borderColor = '#63c9f0';
    var bt4 = document.getElementById('b4');
    bt4.style.backgroundColor = 'white';
    bt4.style.color = '#63c9f0';
    bt4.style.borderColor = '#63c9f0';
}
function dua() {
    var a2 = document.getElementById('a1');
    var b2 = document.getElementById('a2');
    var c2 = document.getElementById('a3');
    var d2 = document.getElementById('a3');

    a2.style.display = 'none';
    b2.style.display = 'block';
    c2.style.display = 'none';
    d2.style.display = 'none';

    var bt12 = document.getElementById('b2');
    bt12.style.backgroundColor = '#63c9f0';
    bt12.style.color = 'white';
    bt12.style.borderColor = '#63c9f0';
    var bt22 = document.getElementById('b1');
    bt22.style.backgroundColor = 'white';
    bt22.style.color = '#63c9f0';
    bt22.style.borderColor = '#63c9f0';
    var bt32 = document.getElementById('b3');
    bt32.style.backgroundColor = 'white';
    bt32.style.color = '#63c9f0';
    bt32.style.borderColor = '#63c9f0';
    var bt42 = document.getElementById('b4');
    bt42.style.backgroundColor = 'white';
    bt42.style.color = '#63c9f0';
    bt42.style.borderColor = '#63c9f0';

}
function tiga() {
    var a3 = document.getElementById('a1');
    var b3 = document.getElementById('a2');
    var c3 = document.getElementById('a3');
    var d3 = document.getElementById('a4');

    a3.style.display = 'none';
    b3.style.display = 'none';
    c3.style.display = 'block';
    d3.style.display = 'none';

    var bt13 = document.getElementById('b3');
    bt13.style.backgroundColor = '#63c9f0';
    bt13.style.color = 'white';
    bt13.style.borderColor = '#63c9f0';
    var bt23 = document.getElementById('b2');
    bt23.style.backgroundColor = 'white';
    bt23.style.color = '#63c9f0';
    bt23.style.borderColor = '#63c9f0';
    var bt33 = document.getElementById('b1');
    bt33.style.backgroundColor = 'white';
    bt33.style.color = '#63c9f0';
    bt33.style.borderColor = '#63c9f0';
    var bt43 = document.getElementById('b4');
    bt43.style.backgroundColor = 'white';
    bt43.style.color = '#63c9f0';
    bt43.style.borderColor = '#63c9f0';
}

function empat() {
    var a3 = document.getElementById('a1');
    var b3 = document.getElementById('a2');
    var c3 = document.getElementById('a3');
    var d3 = document.getElementById('a4');

    a3.style.display = 'none';
    b3.style.display = 'none';
    c3.style.display = 'none';
    d3.style.display = 'block';

    var bt13 = document.getElementById('b4');
    bt13.style.backgroundColor = '#63c9f0';
    bt13.style.color = 'white';
    bt13.style.borderColor = '#63c9f0';
    var bt23 = document.getElementById('b2');
    bt23.style.backgroundColor = 'white';
    bt23.style.color = '#63c9f0';
    bt23.style.borderColor = '#63c9f0';
    var bt33 = document.getElementById('b1');
    bt33.style.backgroundColor = 'white';
    bt33.style.color = '#63c9f0';
    bt33.style.borderColor = '#63c9f0';
    var bt43 = document.getElementById('b3');
    bt43.style.backgroundColor = 'white';
    bt43.style.color = '#63c9f0';
    bt43.style.borderColor = '#63c9f0';
}

//------------------------------------------------------
function cpas() {
    var cpas = document.getElementById('cpass');
    var dpas = document.getElementById('dpass');
    if(cpas.value != dpas.value){
        cpas.style.borderColor = 'red';
        cpas.style.backgroundColor = '#f0cad1';
    }else{
        cpas.style.borderColor = '#15ff28';
        cpas.style.backgroundColor = '#b2f0ab';
    }

}