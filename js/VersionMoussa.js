// let tel = document.getElementById('tel');
let tel =  document.querySelector('#tel');

tel.addEventListener('keyup',function (e) {
    if (isNaN(tel.value)) {
        document.getElementById('error').innerText = "Veuillez entrer un numéro valide";
        e.preventDefault
    } else {
        document.getElementById('error').innerText = "";
    }
})

// console.log(document.formul.pseudo.value);

// function verif() {
//     if (document.formul.pseudo.value ==  "") {
//         alert("Veuillez remplir le champ pseudo");
//         document.formul.pseudo.style.border = "2px solid red";
//         return false;
//     }
// }

document.getElementById('submit').onclick = function (e) {
console.log('dans submit');

    e.preventDefault();
    result();
}

let allInputs = document.querySelectorAll('input[type="text"], input[type="email"], input[type="password"]');

function result(e) {
    allInputs.forEach(element => {
        if (element.value == "" ) {
            document.querySelector('#'+element.name+'Error').innerHTML = " Le champ "+ element.name + " est obligatoire";
            document.querySelector('#'+element.name).style.border = "2px solid red";
            // document.getElementById('pseudo').s = "2px solid red";
            
        } else {
            document.querySelector('#'+element.name+'Error').innerHTML = "";
            document.querySelector('#'+element.name+'Error').style.border = "";
            
        }
    });
}

/*********************************** */
allInputs.forEach(element => {
    element.addEventListener('keyup', function (e) {
        result();

})
});

/*********************************** */