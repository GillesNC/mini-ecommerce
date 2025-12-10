//REGEX EMAIL
function isEmail(email) {
  const er = new RegExp("^[0-9a-z._-]+@[0-9a-z._-]{2,}[.][a-z]{2,5}$", "i");
  return er.test(email);
}

//REGEX PWD
function isMdp(mdp) {
  const er = new RegExp(
    "^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$"
  );
  return er.test(mdp);
}

//REGEX NOM & PRENOM
function isNom(nom) {
  const er = new RegExp("^[A-Za-z]{3,15}$");
  return er.test(nom);
}

function isPrenom(prenom) {
  const er = new RegExp("^[A-Za-z]{3,15}$");
  return er.test(prenom);
}