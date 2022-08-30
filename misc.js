//nav
let navstatus = "closed"; 


function openclose() {
    if (navstatus == "closed") {
        document.getElementById("sidenav").style.width = "250px";
        navstatus = "open"; 
    }
    else if (navstatus == "open") {
        document.getElementById("sidenav").style.width = "50px";
        navstatus = "closed";
    }

}

//slideshow
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("slides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 8500);    
}
