function add_gallary(error) {
    let myerror = document.getElementById(error);
    let galtitle = document.getElementById("galtitle").value;
    let galdetail = document.getElementById("galdetail").value;
    let galdate = document.getElementById("galdate").value;
    let customFile = document.getElementById("customFile").value;

    if (galtitle == '' &&  galdetail == '' && galdate == '') {
        myerror.innerHTML = "* Please fill <b>All</b> below details."
        myerror.style.display = "block";
        return false;
    }
    if (customFile == "") {
        myerror.innerHTML = "* Please select valid <b>Image</b>."
        myerror.style.display = "block";
        return false;
    }
    if (galtitle == "") {
        myerror.innerHTML = "* Please enter valid <b>Title</b>."
        myerror.style.display = "block";
        return false;
    }
    if (galdetail == "") {
        myerror.innerHTML = "* Please enter valid <b>Details</b>."
        myerror.style.display = "block";
        return false;
    }
    if (galdate == "") {
        myerror.innerHTML = "* Please select valid <b>Date</b>."
        myerror.style.display = "block";
        return false;
    }
    
}


function add_workshop() {

    

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

function add_event() {

    let galtitle = document.getElementById("galtitle").value;
    let galdetail = document.getElementById("galdetail").value;
    let galdate = document.getElementById("galdate").value;
    let customFile = document.getElementById("customFile").value;
    let error = document.getElementById("event_error");

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
