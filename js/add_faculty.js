let fcid = document.getElementById("fcid").value;
let fcimage = document.getElementById("fcimage").value;
let fcname = document.getElementById("fcname").value;
let fcdesignation = document.getElementById("fcdesignation").value;
let fcexperiance = document.getElementById("fcexperiance").value;
let fcqualification = document.getElementById("fcqualification").value;
let fcexpertise = document.getElementById("fcexpertise").value;
let fcemail = document.getElementById("fcemail").value;
let error = document.getElementById("add_error");
let edit_error = document.getElementById("edit_error");

function add_faculty() {

    if (fcid == '' &&  fcname == '' && fcdesignation == '' && fcexperiance == '' &&  fcqualification == '' &&  fcexpertise == '' &&  fcemail == '') {
        error.innerHTML = "* Please fill <b>All</b> below details."
        error.style.display = "block";
        return false;
    }
    if (!fcid.match(/^[0-9]+$/)) {
        error.innerHTML = "* Please enter valid <b>Faculty ID</b>."
        error.style.display = "block";
        return false;
    }
    if (fcimage == "") {
        error.innerHTML = "* Please select <b>Faculty Image.</b>."
        error.style.display = "block";
        return false;
    }
    if (!fcname.match(/^[A-Za-z. ]+$/)) {
        error.innerHTML = "* Please enter valid  <b>Faculty Name</b>."
        error.style.display = "block";
        return false;
    }
    if (!fcdesignation.match(/^[A-Za-z0-9@&%().,;:'" ]+$/)) {
        error.innerHTML = "* Please enter valid  <b>Faculty Designation</b>."
        error.style.display = "block";
        return false;
    }
    if (!fcexperiance.match(/^[0-9 ]+$/)) {
        error.innerHTML = "* Please enter valid  <b>Faculty Experience</b>."
        error.style.display = "block";
        return false;
    }
    if (!fcqualification.match(/^[A-Za-z0-9,. ]+$/)) {
        error.innerHTML = "* Please enter valid  <b>Faculty Qualification</b>."
        error.style.display = "block";
        return false;
    }
    if (!fcexpertise.match(/^[A-Za-z0-9,.() ]+$/)) {
        error.innerHTML = "* Please enter valid  <b>Faculty Expertise</b>."
        error.style.display = "block";
        return false;
    }
    if (!fcemail.match(/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/)) {
        error.innerHTML = "* Please enter valid  <b>Faculty Email</b>."
        error.style.display = "block";
        return false;
    }
    
}

function edit_faculty() {

    if (fcid == '' &&  fcname == '' && fcdesignation == '' && fcexperiance == '' &&  fcqualification == '' &&  fcexpertise == '' &&  fcemail == '') {
        edit_error.innerHTML = "* Please fill <b>All</b> below details."
        edit_error.style.display = "block";
        return false;
    }
    if (!fcid.match(/^[0-9]+$/)) {
        edit_error.innerHTML = "* Please enter valid <b>Faculty ID</b>."
        edit_error.style.display = "block";
        return false;
    }
    if (fcimage == "") {
        edit_error.innerHTML = "* Please select <b>Faculty Image.</b>."
        edit_error.style.display = "block";
        return false;
    }
    if (!fcname.match(/^[A-Za-z. ]+$/)) {
        edit_error.innerHTML = "* Please enter valid  <b>Faculty Name</b>."
        edit_error.style.display = "block";
        return false;
    }
    if (!fcdesignation.match(/^[A-Za-z0-9@&%().,;:'" ]+$/)) {
        edit_error.innerHTML = "* Please enter valid  <b>Faculty Designation</b>."
        edit_error.style.display = "block";
        return false;
    }
    if (!fcexperiance.match(/^[0-9 ]+$/)) {
        edit_error.innerHTML = "* Please enter valid  <b>Faculty Experience</b>."
        edit_error.style.display = "block";
        return false;
    }
    if (!fcqualification.match(/^[A-Za-z0-9,. ]+$/)) {
        edit_error.innerHTML = "* Please enter valid  <b>Faculty Qualification</b>."
        edit_error.style.display = "block";
        return false;
    }
    if (!fcexpertise.match(/^[A-Za-z0-9,.() ]+$/)) {
        edit_error.innerHTML = "* Please enter valid  <b>Faculty Expertise</b>."
        edit_error.style.display = "block";
        return false;
    }
    if (!fcemail.match(/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/)) {
        edit_error.innerHTML = "* Please enter valid  <b>Faculty Email</b>."
        edit_error.style.display = "block";
        return false;
    }
    
}