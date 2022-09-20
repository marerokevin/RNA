var currentTab = 0;
showTab(currentTab);
function showTab(stepNo) {
   var pageEle = document.getElementsByClassName("page");
   pageEle[stepNo].style.display = "block";
   if (stepNo == 0) {
      document.getElementById("prevBtn").style.display = "none";
   }
   else {
      document.getElementById("prevBtn").style.display = "inline";
   }
   if (stepNo == (pageEle.length - 1)) {
      document.getElementById("nextBtn").innerHTML = "Submit";
   }
   else {
      document.getElementById("nextBtn").innerHTML = "Next >";
   }
   changeStepIndicator(stepNo)
}
function nextPrev(stepNo) {
   var pageEle = document.getElementsByClassName("page");
   if (stepNo == 1 && !checkForm()) return false;
   pageEle[currentTab].style.display = "none";
   currentTab = currentTab + stepNo;
   if (currentTab >= pageEle.length) {
      document.getElementById("regForm").submit();
      return false;
   }
   showTab(currentTab);
}
function checkForm() {
   var pageEle, inputEle, i, valid = true;
   pageEle = document.getElementsByClassName("page");
   inputEle = pageEle[currentTab].getElementsByTagName("input");
   for (i = 0; i < inputEle.length; i++) {
      if (inputEle[i].value == "") {
         inputEle[i].className += " invalid";
         valid = false;
      }
   }
   if (valid) {
      document.getElementsByClassName("step")[currentTab].className += " finish";
   }
   return valid;
}
function changeStepIndicator(stepNo) {
   var i, pageEle = document.getElementsByClassName("step");
   for (i = 0; i < pageEle.length; i++) {
      pageEle[i].className = pageEle[i].className.replace(" active", "");
   }
   pageEle[stepNo].className += " active";
}