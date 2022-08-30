document.getElementById("noOptions").style.display = "block";
function changeOptions() {
    var form = document.getElementById("form");
    var MISOptions = document.getElementById("MISOptions");
    var MISContainer = document.getElementById("MISContainer");
    var FEMOptions = document.getElementById("FEMOptions");
    var FEMContainer = document.getElementById("FEMContainer");
    var ComputerInput = document.getElementById("ComputerInput");
    var Facility = document.getElementById("Facility");
    var Utility = document.getElementById("Utility");
    var MRelayout = document.getElementById("RelayoutInputM");
    var FRelayout = document.getElementById("RelayoutInputF");

    document.getElementById("noOptions").style.display = "none";

    if (form.MISButton.checked) {
        FEMOptions.style.display = "none";
        MISOptions.style.display = "block";
        MISContainer.style.display = "block";
        FEMContainer.style.display = "none";
        MISOptions.addEventListener('change', function handleChange(event) {
            if (event.target.value === 'Computer') {
            console.log("alololo");
            ComputerInput.style.display = 'block';
                MRelayout.style.display = 'none';
            } else {
            console.log("wewwew");
            ComputerInput.style.display = 'none';
                MRelayout.style.display = 'block';
            }
        });
    }else if (form.FEMButton.checked) {
        MISOptions.style.display = "none";
        FEMOptions.style.display = "block";
        MISContainer.style.display = "none";
        FEMContainer.style.display = "block";
        FEMOptions.addEventListener('change', function handleChange(event) {
            if (event.target.value === 'Facility') {
                console.log("alololo");
                Facility.style.display = 'block';
                Utility.style.display = 'none';
                FRelayout.style.display = 'none';
            } else if (event.target.value === 'Utility') {
                console.log("alololo");
                Facility.style.display = 'none';
                Utility.style.display = 'block';
                FRelayout.style.display = 'none';
            } else {
                console.log("wewwew");
                Facility.style.display = 'none';
                Utility.style.display = 'none';
                FRelayout.style.display = 'block';
            }
        });
    }
}
document.getElementById("MISButton").onclick = changeOptions;
document.getElementById("FEMButton").onclick = changeOptions;