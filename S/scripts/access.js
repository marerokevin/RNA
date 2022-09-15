var access = 0;
function access() {
  if (x == 1) {
    document.getElementById("main_content").className = "main_content_wsb";
    document.getElementById("mySidebar").style.display = "flex";
    x = 0;
  } else {
    document.getElementById("main_content").className = "main_content_wosb";
    document.getElementById("mySidebar").style.display = "flex";
    x = 1;
  }
}