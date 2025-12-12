// TAILLE DE LA POLICE - RGAA 4.1 - 2024
document.getElementById("main").style.fontSize = "1em";

function changerTaille(sens) {
  let unite = "em";
  let taille = document.getElementById("main").style.fontSize;
  taille = taille.substring(0, taille.length - 2); // Pour enlever l'unité (px, em, ...)
  taille = parseFloat(taille); // On convertit en nombre la taille qu'on a en string
  console.log("Taille actuelle : " + taille + unite);

  //Si sens = agrandir, on ajoute 0.1, sinon on enlève 0.1 et sinon on enlève 0.1em
  if (sens === "agrandir") {
    taille += 0.1;
  } else {
    taille -= 0.1;
  }

  // on cible l’élément main et on modifie la taille de la police
  document.getElementById("main").style.fontSize = taille + unite;
  console.log("Nouvelle taille : " + taille + unite);
}

// Gestion des touches du clavier (+ et - du pavé numérique)
document.addEventListener("keyup", function (event) {
  // Touche + du pavé numérique ou +
  if (event.key === "+") {
    event.preventDefault();
    changerTaille("agrandir");
  }
  // Touche - du pavé numérique ou -
  else if (event.key === "-") {
    event.preventDefault();
    changerTaille("reduire");
  }
});

// CONTRASTE DES COULEURS - RGAA 4.1 - 2024
function changerStyle(style) {
  document.getElementById("lienCSS").href = "./css/" + style + ".css";
}

    document.getElementById("btContrastes").addEventListener("click", () => {
    changerStyle("contrastes");
    });
    document.getElementById("btContrastesNo").addEventListener("click", () => {
    changerStyle("contrastesNo");
});