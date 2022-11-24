var x = 0;
var getId = document.getElementById;

function Burjer() {
  if (x == 1) {
    getId("main_content").className = "main_content_wsb";
    getId("mySidebar").style.display = "flex";
    x = 0;
  } else {
    getId("main_content").className = "main_content_wosb";
    getId("mySidebar").style.display = "flex";
    x = 1;
  }
}