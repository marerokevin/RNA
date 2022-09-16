var x = 0;
var getId = document.getElementById;

function steppy() {
  if (x == 1) {
    getId("add").style.display = "flex";
    x = 0;
  } else {
    getId("main_content").className = "main_content_wosb";
    getId("mySidebar").style.display = "flex";
    x = 1;
  }
}