
function add_subject() {

    var checkedValue = ""; 
        var inputElements = document.querySelectorAll('.branchCheckbox');
        for(var i=0; i < inputElements.length; i++){
            if (inputElements[i].checked) {
                checkedValue += inputElements[i].value + " ";
            }
        }

    let subcode = document.getElementById("subcode").value;
    let subname = document.getElementById("subname").value;
    let subcredit = document.getElementById("subcredit").value;
    let subthmark = document.getElementById("subthmark").value;
    let subpremark = document.getElementById("subpremark").value;
    let error = document.getElementById("add_error");

    if (subcode == '' &&  subname == '' && subcredit == '' && subthmark == '' &&  subpremark == '' && checkedValue == '') {
        error.innerHTML = "* Please fill <b>All</b> below details."
        error.style.display = "block";
        return false;
    }
    if (!subcode.match(/^[0-9]+$/)) {
        error.innerHTML = "* Please enter valid <b>GTU Code</b> for subject."
        error.style.display = "block";
        return false;
    }
    if (subname == "") {
        error.innerHTML = "* Please enter valid <b>Subject Name</b>."
        error.style.display = "block";
        return false;
    }
    if (!subcredit.match(/^[0-9]+$/)) {
        error.innerHTML = "* Please enter valid <b>Credit</b> for subject."
        error.style.display = "block";
        return false;
    }
    if (!subthmark.match(/^[0-9]+$/)) {
        error.innerHTML = "* Please enter valid <b>Theory Marks</b> for subject."
        error.style.display = "block";
        return false;
    }
    if (!subpremark.match(/^[0-9]+$/)) {
        error.innerHTML = "* Please enter valid <b>Prectical Marks</b> for subject."
        error.style.display = "block";
        return false;
    }


}
