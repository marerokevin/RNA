<form name="form" action="create2.php" method="post" class=createForm id="form">
    <div class="formInputCont">
        <label for="id_number" class=formInputLabel>Section:</label>
        <label for="MISButton" class="formRadioButton">MIS</label>
        <input type="radio" class="formRadioButton" id="MISButton" name="radioButton" value="MIS" />
        <label for="FEMButton" class="formRadioButton">FEM</label>
        <input type="radio" class="formRadioButton" id="FEMButton" name="radioButton" value="FEM" />
        <label for="Relayout" class="formRadioButton">Relayout</label>
        <input type="radio" class="formRadioButton" id="Relayout" name="radioButton" value="Relayout" />
    <select name="noOptions" id="noOptions" class="formSelectCont"> 
        <option value="ChooseOption" selected="selected">Choose a section</option>
    </select>
    </div>
    <div class="MIS" id="MISContainer">
        <select name="icOptions" id="MISOptions" class="formSelectCont"> 
            <option value="ChooseOption">Choose a request for MIS</option>
            <option id="ComputerSel" value="Computer">Computer</option>
            <option id="MRelayout" value="MRelayout">Relayout</option>
        </select>

    <select name="icOptions" id="ComputerInput" class="inp8t"> 
        <option value="ChooseOption">Computer Shits</option>
        <option id="ComputerSel" value="Computer">A</option>
        <option id="MRelayout" value="MRelayout">B</option>
    </select>

    <select name="icOptions" id="RelayoutInputM" class="Relay"> 
        <option value="ChooseOption">RelayoutInputM</option>
        <option id="ComputerSel" value="Computer">A</option>
        <option id="MRelayout" value="MRelayout">B</option>
    </select>
    </div>

    <div class="FEM" id="FEMContainer">
    <select name="ocOptions" id="FEMOptions" class="formSelectCont" > 
        <option value="Choose an Option" selected="selected">Choose a request for FEM</option>
        <option value="Relayout">Relayout</option>
        <option value="Facility">Facility</option>
        <option value="Utility">Utility</option>
    </select>

    <select name="icOptions" id="Utility" class="inp8t"> 
        <option value="ChooseOption">Utility</option>
        <option id="ComputerSel" value="Computer">A</option>
        <option id="MRelayout" value="MRelayout">B</option>
    </select>

    <select name="icOptions" id="Facility" class="Relay"> 
        <option value="ChooseOption">Facility</option>
        <option id="ComputerSel" value="Computer">A</option>
        <option id="MRelayout" value="MRelayout">B</option>
    </select>

    <select name="icOptions" id="RelayoutInputF" class="Relay"> 
        <option value="ChooseOption">RelayoutInputF</option>
        <option id="ComputerSel" value="Computer">A</option>
        <option id="MRelayout" value="MRelayout">B</option>
    </select>
    </div>

</form>
<script src="/DNA/resources/scripts/radiovar.js"></script>