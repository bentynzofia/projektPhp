
var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); 
var yyyy = today.getFullYear();

today = mm + '-' + dd + '-' + yyyy;
document.getElementById("d").innerHTML = "It's " + today + " and learninig o'clock";

function showMenu(){
document.getElementById("m").classList.toggle("noli");
}
