document.addEventListener("DOMContentLoaded", function() {
    const passwordInput = document.getElementById("pass");
    const requirementList = document.querySelectorAll(".requirement-list li");

    // An array of password requirements with corresponding 
    // regular expressions and index of the requirement list item
    const requirements = [
        { regex: /^.{8}$/, message: "Exactly 8 characters", index: 0 }, // Exactly 8 characters
        { regex: /\d/, message: "At least one number (0-9)", index: 1 }, // At least one number
        { regex: /[a-z]/, message: "At least one lowercase letter (a-z)", index: 2 }, // At least one lowercase letter
        { regex: /[^A-Za-z0-9]/, message: "At least one special character", index: 3 }, // At least one special character
        { regex: /[A-Z]/, message: "At least one uppercase letter (A-Z)", index: 4 } // At least one uppercase letter
    ];

    // Event listener for password input
    passwordInput.addEventListener("keyup", function(e) {
        const password = e.target.value;
        requirements.forEach(item => {
            // Check if the password matches the requirement regex
            const isValid = item.regex.test(password);
            const requirementItem = requirementList[item.index];

            // Updating class and icon of requirement item if requirement matched or not
            if (isValid) {
                requirementItem.classList.add("valid");
                requirementItem.querySelector("i").className = "fa-solid fa-check"; // Update icon class
            } else {
                requirementItem.classList.remove("valid");
                requirementItem.querySelector("i").className = "fa-solid fa-circle"; // Update icon class
            }
        });
    });
});

// Add form submission event listener
document.querySelector("form").addEventListener("submit", function(event) {
    // Validate the form fields
    if (!validateForm()) {
        event.preventDefault(); // Prevent form submission if validation fails
    }
});

// Function to validate the registration form
function validateForm() {
    const firstName = document.getElementById("fname").value.trim();
    const lastName = document.getElementById("lname").value.trim();
    const email = document.getElementById("email").value.trim();
    const password = document.getElementById("pass").value.trim();
    const gender = document.getElementById("gender").value.trim();
    const pp = document.getElementById("pp").value.trim();

    // Check if any field is empty
    if (!firstName || !lastName || !email || !password || !gender || !pp) {
        swal("Error", "All fields are required.", "error");
        return false;
    }

    // Check if the email is valid
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        swal("Error", "Please enter a valid email address.", "error");
        return false;
    }

    // Validate password length
    if (password.length !== 8) {
        swal("Error", "Password must be exactly 8 characters long.", "error");
        return false;
    }

    // Perform additional password validation
    const requirements = [
        { regex: /\d/, message: "Password must contain at least one number." },
        { regex: /[a-z]/, message: "Password must contain at least one lowercase letter." },
        { regex: /[^A-Za-z0-9]/, message: "Password must contain at least one special character." },
        { regex: /[A-Z]/, message: "Password must contain at least one uppercase letter." }
    ];

    for (const requirement of requirements) {
        if (!requirement.regex.test(password)) {
            swal("Error", requirement.message, "error");
            return false;
        }
    }

    // Validation passed
    return true;
}
