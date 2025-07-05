let storedOtp = null; 

function generateOtp() {
    return Math.floor(1000 + Math.random() * 9000); 
}

document.getElementById('sendMobileOtp').addEventListener('click', function () {
    const mobile = document.getElementById('mobile').value;
    if (/^\d{10}$/.test(mobile)) {
        storedOtp = generateOtp(); // Store OTP
        this.disabled = true;
        document.getElementById('mobile').disabled = true;
        document.getElementById('mobileOtp').disabled = false;
        alert("Mobile OTP sent successfully: Your OTP is " + storedOtp);
    } else {
        alert("Please enter a valid 10-digit mobile number.");
    }
});

const signInForm = document.getElementById('signInForm');
const errorMessage = document.getElementById('errorMessage');

signInForm.addEventListener('submit', () => { // No event.preventDefault()
    const mobileOtpInput = document.getElementById('mobileOtp').value;
    const passwordInput = document.getElementById('password').value;
    const confirmPasswordInput = document.getElementById('confirmPassword').value;

    if (mobileOtpInput != storedOtp) {
        errorMessage.textContent = "Incorrect OTP. Please try again.";
        return false;
    }

    if (passwordInput !== confirmPasswordInput) {
        errorMessage.textContent = "Passwords do not match!";
        return false;
    }

    const requiredFields = signInForm.querySelectorAll('input[required], select[required], textarea[required]');
    for (let field of requiredFields) {
        if (!field.value.trim()) {
            errorMessage.textContent = "All fields are required.";
            return false;
        }
    }

    alert("Registration successful!");
    window.location.href = "NMAK.hmtl";
});
