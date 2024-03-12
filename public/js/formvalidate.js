document.getElementById("myForm").onsubmit = function(event) {
    const name = document.getElementById("name").value;
    const username = document.getElementById("username").value;
    const email = document.getElementById("email").value;
    const contact = document.getElementById("contact").value;
    const image = document.getElementById("image");
    document.getElementById("nameErr").innerHTML = "";
    document.getElementById("usernameErr").innerHTML = "";
    document.getElementById("contactErr").innerHTML = "";
    document.getElementById("emailErr").innerHTML = "";
    document.getElementById("imageErr").innerHTML = "";

    let success = true
    const name_regex = /^[A-Za-z\s]*$/;
    const num_regex = /^\d+$/;
    const email_regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;;
    const uname_regex = /^[a-zA-Z0-9_-]+$/;

   

    if (name.trim() == "") {
        success = false;
        document.getElementById("nameErr").innerHTML = "Customer's Name is required"
    }
    if (username.trim() == "") {
        success = false;
        document.getElementById("usernameErr").innerHTML = "Customer's UserName is required"
    }
    if (contact.trim() == "") {
        success = false;
        document.getElementById("contactErr").innerHTML = "Contact Number is required"
    }
    if (email.trim() == "") {
        success = false;
        document.getElementById("emailErr").innerHTML = "Customer's Email Address is required"
    }

    if (!name_regex.test(name)) {
        success = false;
        document.getElementById("nameErr").innerHTML = "Invalid Customer's Name"
    }
    if (!uname_regex.test(username)) {
        success = false;
        document.getElementById("usernameErr").innerHTML = "Invalid Customer's UserName "
    }
    if (!num_regex.test(contact)) {
        success = false;
        document.getElementById("contactErr").innerHTML = "Invalid Customer's Contact Number"

    }
    if (!email_regex.test(email)) {
        success = false;
        document.getElementById("emailErr").innerHTML = "Invalid Customer's Email Address"
    }

    
    const file = image.files[0];
   
    if (!file) {
        success = false;
        document.getElementById("imageErr").innerHTML = "Customer's Image is required";
    }


    if (!success) {
        event.preventDefault();
    }
}