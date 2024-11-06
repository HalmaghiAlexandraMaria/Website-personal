const slider = document.querySelector('.form-slider');
const goRegisterLink = document.getElementById('go-register');
const goLoginLink = document.getElementById('go-login');

// Evenimente pentru click pe Register și Login
goRegisterLink.addEventListener('click', () => {
    slider.style.transform = 'translateX(-50%)'; // Mergi la Register
});

goLoginLink.addEventListener('click', () => {
    slider.style.transform = 'translateX(0)'; // Mergi la Login
});
