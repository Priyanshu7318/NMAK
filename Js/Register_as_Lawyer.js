const signInForm = document.getElementById('signInForm');
const errorMessage = document.getElementById('errorMessage');
const mobileOtpInput = document.getElementById('mobileOtp');
const passwordInput = document.getElementById('password');
const confirmPasswordInput = document.getElementById('confirmPassword');
const sendMobileOtpButton = document.getElementById('sendMobileOtp');

// Simulated OTP sending
sendMobileOtpButton.addEventListener('click', () => {
    alert("Mobile OTP sent successfully");
    sendMobileOtpButton.disabled = true;
});

// Form Submission
signInForm.addEventListener('submit', (event) => {
    event.preventDefault();

    // Check OTP
    if (mobileOtpInput.value !== "1234") {
        errorMessage.textContent = "Incorrect OTP. Please try again.";
        return;
    }

    // Check if passwords match
    if (passwordInput.value !== confirmPasswordInput.value) {
        errorMessage.textContent = "Passwords do not match!";
        return;
    }

    // Check required fields
    const requiredFields = signInForm.querySelectorAll('input[required], select[required], textarea[required]');
    for (let field of requiredFields) {
        if (!field.value.trim()) {
            errorMessage.textContent = "All fields are required.";
            return;
        }
    }

    alert("Registration successful!");
    window.location.href = "Legal Specializations.html"; // Redirect to Legal Specializations page
});
