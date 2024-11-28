
document.getElementById("contact-form").addEventListener("submit", function(e) {
    e.preventDefault(); // Prevent the form from submitting the traditional way
    
    var form = this;
    var formData = new FormData(form); // Collect form data

    // Create a new XMLHttpRequest object
    var xhr = new XMLHttpRequest();
    
    // Open a POST request to submit the form data
    xhr.open("POST", form.action, true);
    
    // Set up a function to handle the response
    xhr.onload = function() {
        if (xhr.status === 200) {
            // If the request was successful, show the success message
            var responseMessage = document.getElementById("response-message");
            responseMessage.style.display = "block";
            responseMessage.textContent = "Your message has been sent successfully!";
            
            // Optionally, clear the form inputs after submission
            form.reset();
        } else {
            // If there was an error, show an error message
            var responseMessage = document.getElementById("response-message");
            responseMessage.style.display = "block";
            responseMessage.style.color = "red";
            responseMessage.textContent = "There was an error sending your message. Please try again.";
        }
    };
    
    // Send the form data to the server
    xhr.send(formData);
});

