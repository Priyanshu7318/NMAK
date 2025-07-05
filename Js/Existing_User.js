document.getElementById('loginForm').addEventListener('submit', function (event) {
    event.preventDefault();

    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    const errorMessage = document.getElementById('errorMessage');

    // Check if fields are empty
    if (!username || !password) {
        errorMessage.textContent = "Mobile number and password are required.";
        return;
    }

    // Dummy login credentials (replace with actual API)
    if (username === "9651954404" && password === "12345678") {
        alert("Login successful!");
        window.location.href = "Legal Specializations.html"; // Redirect to the next page
    } else {
        errorMessage.textContent = "Invalid mobile number or password.";
    }
});
