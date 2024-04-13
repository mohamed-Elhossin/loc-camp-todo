let showPasswordIcon = document.getElementById("showPassword");
let passwordCreation = document.getElementById('passwordCreation');


showPasswordIcon.addEventListener("click", function () {
    if (passwordCreation.type == 'text') {
        this.classList = "mt-2 float-end fa-solid fa-eye";
        passwordCreation.type = 'password';
    } else {
        this.classList = "mt-2 float-end fa-solid fa-eye-slash";
        passwordCreation.type = 'text';
    }

})


// <i class="fa-solid fa-eye"></i>
// <i class="fa-solid fa-eye-slash"></i>
