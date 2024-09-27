let nom = document.getElementById("nom");
let prenom = document.getElementById("prenom");
let checBbox = document.getElementById("mon-cb");
let erreur = document.getElementById("erreur");
let adresse = document.getElementById("mail");
let mp = document.getElementById("mp");
let mpConfirm = document.getElementById("mp-confirm");
let conteneurLogin = document.getElementById(".login");
document
  .getElementById("form-inscription")
  .addEventListener("submit", function (e) {
    // j'accespte comme nom les lettres majus minisc et espace
    let expressionNom = /^[a-zA-Z\s]*$/;
    //vérifier la présence d'au moins une lettre minuscule dans la chaîne, de meme miniscule , de meme un chiffre et longueur 8 caracteres
    let expressionMp =
      /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}$/;

    let expressionMail = /^[a-zA-Z0-9._-]{2,}@[a-zA-Z0-9]{1,}\.[a-zA-Z]{2,3}$/;
    /*
  


    (?=.*[A-Z]) est une assertion positive pour vérifier la présence d'au moins une lettre majuscule.
    (?=.*[a-z]) est une assertion positive pour vérifier la présence d'au moins une lettre minuscule.
    (?=.*\d) est une assertion positive pour vérifier la présence d'au moins un chiffre.
    (?=.*[$@$!%*?&]) est une assertion positive pour vérifier la présence d'au moins un caractère spécial (n'importe quel caractère de la liste).
    [A-Za-z\d$@$!%*?&]{8,} correspond à une chaîne d'au moins 8 caractères contenant des lettres (majuscules et minuscules), des chiffres et des caractères spéciaux.
    $ correspond à la fin de la chaîne.
    */

    if (
      expressionNom.test(nom.value) == false ||
      expressionNom.test(prenom.value) == false
    ) {
      erreur.innerHTML =
        "le nom utilisateur doit comporter des lettres seulement";
      e.preventDefault();
    } else if (expressionMail.test(mail.value) == false) {
      e.preventDefault();
      erreur.innerHTML = "L'adresse mail est invalide";
    } else if (expressionMp.test(mp.value) == false) {
      erreur.innerHTML =
        "Le mot de passe doit contenir au moins une lettre majuscule, une miniscule ,un chiffre et de 8 caractères ou plus .";
      e.preventDefault();
    } else if (mp.value != mpConfirm.value) {
      e.preventDefault();
      erreur.innerHTML =
        "Ces mots de passe ne correspondaient pas. Essayer à nouveau.";
    } else if (!checBbox.checked) {
      e.preventDefault();
      erreur.innerHTML = "Veuillez lire les mentions légales";
    } else {
      document.getElementById("form-inscription").submit();
    }
  });
