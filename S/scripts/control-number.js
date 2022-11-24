        function GetFirstChar(supplier, requestAmt) {
            return (supplier[0] + requestAmt[0]).toUpperCase()
        }

        function getYear() {
            return (new Date).getFullYear() % 100
        }

        function paddedNumber(number) {
            var result = ""
            for(var i = 4 - number.toString().length; i > 0; i--) {
            result += "0"
            }
            return result + number
        }

        function makeStudentID(supplier, requestAmt, requestNumber) {
            return GetFirstChar(supplier, requestAmt) + paddedNumber(requestNumber) + getYear()
        }

        var sequenceNumber = 1
        function gatherDataAndOutput() {
            var supplier = document.getElementById("supplier").value
            var requestAmt = document.getElementById("required_amt").value
            var outputElement = document.getElementById("request_id")

            outputElement.value = makeStudentID(supplier, requestAmt, sequenceNumber)

            sequenceNumber++; // make a different ID for the next student.
        }