function saveData() {
    var name = document.getElementById("name");
    var Id_iqama = document.getElementById("Id_iqama");
    var PhoneNum = document.getElementById("PhoneNum");
    var email = document.getElementById("email");
    var password = document.getElementById("password");
    var date = document.getElementById("Job_status");
    var status = document.getElementById("status");
    var msg = document.getElementById("success");
    var applicationNum = document.getElementById("applicationNum");
    var UID = document.getElementById("UID");
    var RDegree = document.getElementById("RDegree");
    var CDegree = document.getElementById("CDegree");
    var Rspe = document.getElementById("Rspe");


    var rejection_reason = document.getElementById("rejection_reason");
    var modification_reason = document.getElementById("modification_reason");



    if (name.value !== '' && email.value !== '' && password.value !== ''  && date.value !== '' && status.value !== '') {
        // All fields are filled out, display success message
        msg.style.display = 'block';

        // Hide the message after 3 seconds
        setTimeout(function() {
            msg.style.display = 'none';
        }, 3000);
    } else {
        // At least one field is empty, hide success message
        msg.style.display = 'none';
    }

}
