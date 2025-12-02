function inputCheck() {
    let nom = document.querySelector('#nom');
    let prenom = document.querySelector('#prenom');
    let email = document.querySelector('#email');
    let pwd = document.querySelector('#pwd');
    let input = document.getElementsByTagName('input');
    console.log(input);

    let errormsg = document.querySelectorAll("#nomError, #prenomError, #pseudoError, #emailError, #pwdError");

    for (let i = 0; i < input.length; i++) {
        console.log(input[i]);
        input[i].addEventListener('keyup', function(e) {
            e.preventDefault();
            let nomValue = nom.value.trim();
            let prenomValue = prenom.value.trim();
            let emailValue = email.value.trim();
            let pwdValue = pwd.value.trim();

            switch(false) {
                case (nomValue === "" || isNom(nomValue)):
                    document.querySelector('#nomError').innerHTML = "Attention, le nom doit contenir entre 3 et 15 caractères (lettres, aucun chiffre ni caractère spécial autorisé)";
                    nom.style.border = "1px solid red";
                    break;

                case (prenomValue === "" || isPrenom(prenomValue)):
                    document.querySelector('#prenomError').innerHTML = "Le prénom doit contenir entre 3 et 15 caractères (lettres, aucun chiffre ni caractère spécial autorisé)";
                    prenom.style.border = "1px solid red";
                    break;

                case (emailValue === "" || isEmail(emailValue)):
                    document.querySelector('#emailError').innerHTML = "L'email n'est pas valide";
                    email.style.border = "1px solid red";
                    break;
                    
                case (pwdValue === "" || isMdp(pwdValue)):
                    document.querySelector('#pwdError').innerHTML = "Le mot de passe incorrect";
                    pwd.style.border = "1px solid red";
                    break;

                default:
                    errormsg.forEach(err => {
                        if (err.innerHTML !== "") {
                            err.innerHTML = "C'estya bon !";
                            err.style.border = "1px solid green";
                        }
                    });

                    // document.querySelector('#nomError').innerHTML = "C'estya bon !";
                    // document.querySelector('#prenomError').innerHTML = "C'estya bon !";
                    // nom.style.border = "1px solid green";
                    // prenom.style.border = "1px solid green";
                    // email.style.border = "1px solid green";
                    // pwd.style.border = "1px solid green";
                    break;
            };
        console.log(nomValue);        
    });
    }
}

window.addEventListener("load", () => {
    inputCheck();
});