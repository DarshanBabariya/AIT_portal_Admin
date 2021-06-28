
function add_gallary() {

    let galtitle = document.getElementById("galtitle").value;
    let galdetail = document.getElementById("galdetail").value;
    let galdate = document.getElementById("galdate").value;
    let customFile = document.getElementById("customFile").value;
    let error = document.getElementById("add_error");

    if (galtitle == '' &&  galdetail == '' && galdate == '') {
        error.innerHTML = "* Please fill <b>All</b> below details."
        error.style.display = "block";
        return false;
    }
    if (customFile == "") {
        error.innerHTML = "* Please select valid <b>Image</b>."
        error.style.display = "block";
        return false;
    }
    if (galtitle == "") {
        error.innerHTML = "* Please enter valid <b>Title</b>."
        error.style.display = "block";
        return false;
    }
    if (galdetail == "") {
        error.innerHTML = "* Please enter valid <b>Details</b>."
        error.style.display = "block";
        return false;
    }
    if (galdate == "") {
        error.innerHTML = "* Please select valid <b>Date</b>."
        error.style.display = "block";
        return false;
    }

}


function edit_gallary() {

    let galtitle = document.getElementById("galtitle").value;
    let galdetail = document.getElementById("galdetail").value;
    let galdate = document.getElementById("galdate").value;
    let customFile = document.getElementById("customFile").value;
    let error = document.getElementById("edit_error");
    console.log(galtitle);
    console.log(galdetail);

    if (galtitle == '' &&  galdetail == '' && galdate == '') {
        error.innerHTML = "* Please fill <b>All</b> below details."
        error.style.display = "block";
        return false;
    }
    if (galtitle == "") {
        error.innerHTML = "* Please enter valid <b>Title</b>."
        error.style.display = "block";
        return false;
    }
    if (galdetail == "") {
        error.innerHTML = "* Please enter valid <b>Details</b>."
        error.style.display = "block";
        return false;
    }
    if (galdate == "") {
        error.innerHTML = "* Please select valid <b>Date</b>."
        error.style.display = "block";
        return false;
    }

}

