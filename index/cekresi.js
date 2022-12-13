var noresi = document.getElementById("noresi");
var form = document.getElementById("form-cek-resi");
var buttonutama = document.getElementById("cekresibtn");
var tableresi = document.getElementById("table-resi");

function cekText(){
    if (noresi.value != ""){
        buttonutama.style.backgroundColor = "#BAF2FE";
        buttonutama.style.color = "#009EFF";
    }

};

form.onsubmit = function(){
    if (noresi.value == ""){
        alert("Anda belum memasukkan nomor resi.");
    }
    else{

    }
}