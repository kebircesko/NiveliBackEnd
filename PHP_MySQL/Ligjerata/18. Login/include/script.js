document.addEventListener('DOMContentLoaded', function(){
    const toggleBtn = document.querySelector('.toggle-password');
    const pass = document.getElementById('password');

    toggleBtn.addEventListener('click', function(){
        const icon = this.querySelector('i');
        if(pass.type === "password"){
            pass.type = "text";
            icon.classList.replace("fa-eye","fa-eye-slash");
        } else {
            pass.type = "password";
            icon.classList.replace("fa-eye-slash","fa-eye");
        }
    });
});

function showLoading(){
    const loading = document.getElementById('loading');
    if(loading) loading.style.display = "block";
}
