function home(){
window.location.href = "index.html";
}

var x = document.getElementById("login");
var y = document.getElementById("register");
var z = document.getElementById("btn");
var xf = document.getElementById("login2");
var yf = document.getElementById("register2");

function login() {
  x.style.left = "50px";
  y.style.left = "450px";
  z.style.left = "0";
  yf.style.left = "450px";
  xf.style.left = "70px";
}
function register() {
  x.style.left = "-400px";
  xf.style.left = "-400px";
  y.style.left = "50px";
  z.style.left = "100px";
  yf.style.left = "50px";
}