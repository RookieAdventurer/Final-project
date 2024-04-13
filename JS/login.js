// Wait for the DOM to load
document.addEventListener("DOMContentLoaded", function() {
    const emailInput = document.getElementById("exampleInputEmail1");
    const passwordInput = document.getElementById("exampleInputPassword1");

    // Event listener for form submission
    document.querySelector("form").addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent the default form submission
        const email = emailInput.value.trim();
        const password = passwordInput.value.trim();

        if (email === '' || password === '') {
            // If any field is empty, show a warning alert
            swal("Oops!", "Please fill all the fields", "warning");
        } else {
            // Simulate checking the password (replace this with your actual logic)
            if (password === 'correctpassword') {
                // If password is correct, submit the form
                this.submit();
                // Add SweetAlert for successful login
                swal({
                    title: "Success!",
                    text: "You have successfully logged in.",
                    icon: "success",
                    button: "OK"
                }).then(() => {
                    console.log("Redirecting to index.php"); // Add console log here
                    window.location.href = '../view/home.php'; // Redirect to index page
                });
            } else {
                // If password is incorrect, show an error alert
                swal("Oops!", "Incorrect password", "error");
            }
        }
    });
});
