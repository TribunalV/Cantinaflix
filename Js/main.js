function validateForm() {
    let x = document.forms["Formulario"]["passoword"].value;
    if (x == "") {
      alert("As senhas não coincidem");
      return false;
    }
}