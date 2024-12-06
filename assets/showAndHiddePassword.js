const pathName = window.location.pathname;

if (pathName === "/login") {
    const eyeOn = document.querySelector('.eye-on');
    const eyeOff = document.querySelector('.eye-off');
    const inputPassword = document.querySelector('#inputPassword');
    const displayEye = document.querySelector('.displayEye');
    const noDisplay = document.querySelector('.noDisplay');

    eyeOff.style.display = "none";
    noDisplay.style.display = "none";

    if (eyeOn && eyeOff && inputPassword && displayEye && noDisplay) {
        eyeOn.addEventListener('click', () => {
            eyeOn.style.display = "none";
            eyeOff.style.display = "block";
            inputPassword.type = "text";
            displayEye.style.display = "none";
            noDisplay.style.display = "block";
        });

        eyeOff.addEventListener('click', () => {
            eyeOn.style.display = "block";
            eyeOff.style.display = "none";
            inputPassword.type = "password";
            displayEye.style.display = "block";
            noDisplay.style.display = "none";
        });
    }
} else if (pathName === "/register" || pathName === "/reset-password/reset") {
    const eyeOn = document.querySelector('.eye-on');
    const eyeOff = document.querySelector('.eye-off');
    const inputPasswords = document.querySelectorAll('.inputPassword');
    const displayEye = document.querySelector('.displayEye');
    const noDisplay = document.querySelector('.noDisplay');
    const eye = document.querySelector('#eye');

    eyeOff.style.display = "none";
    eye.style.display = "flex";
    noDisplay.style.display = "none";

    eyeOn.addEventListener('click', () => {
        eyeOn.style.display = "none";
        eyeOff.style.display = "block";
        displayEye.style.display = "none";
        noDisplay.style.display = "block";

        inputPasswords.forEach(input => {
            input.type = "text";
        });
    });

    eyeOff.addEventListener('click', () => {
        eyeOn.style.display = "block";
        eyeOff.style.display = "none";
        displayEye.style.display = "block";
        noDisplay.style.display = "none";

        inputPasswords.forEach(input => {
            input.type = "password";
        });
    });
}