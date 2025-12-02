function inputCheck() {
    let nom = document.querySelector('#nom');
    console.log(nom);
    let prenom = document.querySelector('#prenom');
    let pseudo = document.querySelector('#pseudo');
    let email = document.querySelector('#email');
    let mdp = document.querySelector('#mdp');
    
    if (!isNom(nom)) {
        nom.addEventListener('keyup', () => {
            document.querySelector('#nomError').innerHTML = "Le nom doit contenir entre 3 et 15 caractères (lettres, aucun chiffre ni caractère spécial autorisé)";
            nom.style.border = "1px solid red";
        });
    } else {
        document.querySelector('#nomError').innerHTML = "";
        nom.style.border = "";
    }
}

console.log(inputCheck());