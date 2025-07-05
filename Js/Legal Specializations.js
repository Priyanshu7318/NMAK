// Magic Button Spark Animation
const btn = document.getElementById('magicButton');

btn.addEventListener('click', (e) => {
    for(let i = 0; i < 10; i++) {
        const spark = document.createElement('div');
        spark.className = 'spark';
        spark.style.left = `${Math.random() * 100}%`;
        spark.style.top = `${Math.random() * 100}%`;
        spark.style.width = `${Math.random() * 10 + 5}px`;
        spark.style.height = spark.style.width;
        spark.style.animationDelay = `${i * 0.05}s`;
        btn.appendChild(spark);
        setTimeout(() => spark.remove(), 600);
    }
});

// OTP and Auth Overlay Logic
let currentStep = 1;
let generatedOTP;

function sendOTP() {
    generatedOTP = Math.floor(100000 + Math.random() * 900000);
    document.getElementById('step1').style.display = 'none';
    document.getElementById('step2').style.display = 'block';
}

function verifyOTP() {
    const enteredOTP = document.querySelector('.otp-input').value;
    if(enteredOTP == generatedOTP) {
        document.getElementById('step2').style.display = 'none';
        document.getElementById('step3').style.display = 'block';
    } else {
        alert('Invalid OTP!');
    }
}

function showAuth(type) {
    document.getElementById('authOverlay').style.display = 'flex';
    switchAuth(type);
}

function closeAuth() {
    document.getElementById('authOverlay').style.display = 'none';
    document.getElementById('step1').style.display = 'block';
    document.getElementById('step2').style.display = 'none';
    document.getElementById('step3').style.display = 'none';
}

function switchAuth(type) {
    document.querySelectorAll('.auth-tab').forEach(tab => tab.classList.remove('active'));
    document.querySelectorAll('.auth-form').forEach(form => form.style.display = 'none');
    if(type === 'login') {
        document.querySelector('[onclick="switchAuth(\'login\')"]').classList.add('active');
        document.getElementById('loginForm').style.display = 'block';
    } else {
        document.querySelector('[onclick="switchAuth(\'signup\')"]').classList.add('active');
        document.getElementById('signupForm').style.display = 'block';
    }
}

document.getElementById('authOverlay').addEventListener('click', function(e) {
    if(e.target === this) closeAuth();
});

// Emergency Shake Animation (CSS keyframes injection)
const shakeKeyframes = [
    { transform: 'translateX(0)' },
    { transform: 'translateX(-5px) rotate(-2deg)' },
    { transform: 'translateX(5px) rotate(2deg)' },
    { transform: 'translateX(0)' }
];
const shakeTiming = {
    duration: 100,
    iterations: 4
};

// Add keyframes for emergencyShake if not present
(function addEmergencyShakeKeyframes() {
    const styleSheet = document.createElement('style');
    styleSheet.type = 'text/css';
    styleSheet.innerText = `@keyframes emergencyShake {
        0% { transform: translateX(0) rotate(0); }
        25% { transform: translateX(-5px) rotate(-2deg); }
        50% { transform: translateX(5px) rotate(2deg); }
        75% { transform: translateX(-3px) rotate(-1deg); }
        100% { transform: translateX(0) rotate(0); }
    }`;
    document.head.appendChild(styleSheet);
})();

CSSStyleSheet.prototype.insertRule(`@keyframes emergencyShake {
    0% { transform: translateX(0) rotate(0); }
    25% { transform: translateX(-5px) rotate(-2deg); }
    50% { transform: translateX(5px) rotate(2deg); }
    75% { transform: translateX(-3px) rotate(-1deg); }
    100% { transform: translateX(0) rotate(0); }
}`, 0);
