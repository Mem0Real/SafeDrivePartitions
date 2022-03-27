
    const togglePassword = document.getElementById('togglePassword');


    const password = document.getElementById('password');


    togglePassword.addEventListener('click', function () 
    {
    // toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
                    this.classList.toggle('fa-eye');
    });

