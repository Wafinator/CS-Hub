document.getElementById('contactForm').onsubmit = function(event) {
    event.preventDefault(); // Prevent the default form submission

    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var message = document.getElementById('message').value;
    var feedback = document.getElementById('formFeedback');

    if (name && email && message) {
        // Prepare form data
        var formData = new FormData();
        formData.append('name', name);
        formData.append('email', email);
        formData.append('message', message);

        fetch('contact.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            feedback.innerHTML = "Thank you for your message. We'll be in touch soon!";
            feedback.style.color = 'green';
            document.getElementById('contactForm').reset(); // Clear the form fields
        })
        .catch((error) => {
            feedback.innerHTML = "There was a problem with your submission, please try again.";
            feedback.style.color = 'red';
        });
    } else {
        feedback.innerHTML = "Please fill out all fields.";
        feedback.style.color = 'red';
    }
};
