/* login form */

const loginForm = document.getElementById('login-form');
if(loginForm){
    const loginEmailErr = document.getElementById('login-email-err');
    const loginPasswordErr = document.getElementById('login-password-err');

    loginForm.addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this); 
        fetch(URLROOT + '/users/login', {
            method: 'POST',
            body: formData
        })
            .then(res => res.json())
            .then(data => {
                loginEmailErr.textContent = '';
                loginPasswordErr.textContent = '';
                if(data[0] == '' && data[1] == ''){
                    location.href = URLROOT + '/home/index';
                }
                if(data[0] != ''){
                    loginEmailErr.textContent = data[0];
                }
                if(data[1] != ''){
                    loginPasswordErr.textContent = data[1];
                }
            })
    })
}

/* register form */
const registerForm = document.getElementById('register-form'); 
if(registerForm){
    const nameErr = document.getElementById('name_err'); 
    const emailErr = document.getElementById('email_err'); 
    const passwordErr = document.getElementById('password_err'); 
    const confirmPasswordErr = document.getElementById('confirm_password_err');
    console.log(nameErr);
    console.log(emailErr); 
    console.log(passwordErr); 
    console.log(confirmPasswordErr);

    registerForm.addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this); 
        fetch(URLROOT + '/users/register', {
            method: 'POST',
            body: formData
        })
            .then(res => res.json())
            .then(data => {
                nameErr.textContent = '';
                emailErr.textContent = '';
                passwordErr.textContent = ''; 
                confirmPasswordErr.textContent = '';

                if(data[0] == '' && data[1] == '' && data[2] == '' && data[3] == ''){
                    location.href = URLROOT + '/users/login';
                }
                if(data[0] != ''){
                    nameErr.textContent = data[0];
                }
                if(data[1] != ''){
                    emailErr.textContent = data[1];
                }
                if(data[2] != ''){
                    passwordErr.textContent = data[2];
                }
                if(data[3] != ''){
                    confirmPasswordErr.textContent = data[3];
                }
                console.log(data);
            })
    })
}