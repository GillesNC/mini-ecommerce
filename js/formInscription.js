function inputCheck() {
  let nom = document.querySelector("#nom");
  let prenom = document.querySelector("#prenom");
  let email = document.querySelector("#email");
  let pwd = document.querySelector("#pwd");
  let input = document.getElementsByTagName("input");
  let pseudo = document.querySelector("#pseudo");
  console.log(input);

  let errormsg = document.querySelectorAll(
    "#nomError, #prenomError, #pseudoError, #emailError, #pwdError"
  );
  console.log(errormsg);

  let border = document.querySelectorAll(
    "#nom, #prenom, #email, #pwd, #pseudo"
  );

  for (let i = 0; i < input.length; i++) {
    console.log(input[i]);

    input[i].addEventListener("keyup", function () {
      let nomValue = nom.value.trim();
      let prenomValue = prenom.value.trim();
      let emailValue = email.value.trim();
      let pwdValue = pwd.value.trim();
      let pseudoValue = pseudo.value.trim();

      switch (false) {
        case nomValue === "" || isNom(nomValue):
          document.querySelector("#nomError").innerHTML =
            "Attention, le nom doit contenir entre 3 et 15 caractères (lettres, aucun chiffre ni caractère spécial autorisé)";
          nom.style.border = "2px solid red";
          document.querySelector("#nomError").style.color = "red";
          break;

        case prenomValue === "" || isPrenom(prenomValue):
          document.querySelector("#prenomError").innerHTML =
            "Le prénom doit contenir entre 3 et 15 caractères (lettres, aucun chiffre ni caractère spécial autorisé)";
          prenom.style.border = "2px solid red";
          document.querySelector("#prenomError").style.color = "red";
          break;

        case pseudoValue == "" || pseudoValue.length >= 3:
          document.querySelector("#pseudoError").innerHTML =
            "Le pseudo est obligatoire";
          pseudo.style.border = "2px solid red";
          document.querySelector("#pseudoError").style.color = "red";
          break;

        case emailValue === "" || isEmail(emailValue):
          document.querySelector("#emailError").innerHTML =
            "L'email n'est pas valide";
          email.style.border = "2px solid red";
          document.querySelector("#emailError").style.color = "red";
          break;

        case pwdValue === "" || isMdp(pwdValue):
          document.querySelector("#pwdError").innerHTML =
            "Le mot de passe incorrect";
          pwd.style.border = "2px solid red";
          document.querySelector("#pwdError").style.color = "red";
          break;

        default:
          errormsg.forEach((err) => {
            if (err.innerHTML !== "") {
              err.innerHTML = "C'est bon !";
              err.style.color = "green";
            }
          });
          border.forEach((element) => {
            if (element.value !== "") {
              element.style.border = "2px solid green";
            }
          });
          return true;
          break;
      }
    });
  }

  displayPwd.addEventListener("click", () => {
    let valueCheckbox = displayPwd.checked;
    switch (true) {
      case valueCheckbox:
        pwd.type = "text";
        break;

      default:
        pwd.type = "password";
        break;
    }
  });
}

// Fonction pour vérifier que tous les champs sont valides avant l'envoi
function isValid() {
  let nom = document.querySelector("#nom").value.trim();
  let prenom = document.querySelector("#prenom").value.trim();
  let email = document.querySelector("#email").value.trim();
  let pwd = document.querySelector("#pwd").value.trim();
  let pseudo = document.querySelector("#pseudo").value.trim();

  // Vérifier que tous les champs sont remplis et valides
  if (!nom || !isNom(nom)) return false;
  if (!prenom || !isPrenom(prenom)) return false;
  if (!pseudo || pseudo.length < 3) return false;
  if (!email || !isEmail(email)) return false;
  if (!pwd || !isMdp(pwd)) return false;

  return true;
}

//fonction pour envoyer le formulaire si tout est ok
function sendForm() {
  let submit = document.querySelector("#submit");
  submit.addEventListener("click", function (e) {
    e.preventDefault();
    
    if (isValid()) {
      // Si tous les champs sont valides, on envoie le formulaire
      document.querySelector("form").submit();
    } else {
      alert("Veuillez remplir correctement tous les champs du formulaire");
    }
  });
}

window.addEventListener("load", () => {
  inputCheck();
  sendForm();
});