/**
 * Script para validar formulario de cadastro
 */
((form) => {
  if (form == null) {
    return false;
  }

  form.addEventListener("submit", (event) => {
    const email = form.querySelector('input[name="email"]').value;
    const senha = form.querySelector('input[name="password"]').value;
    console.log("Email é:" + email);
    console.log("Senha é:" + senha);
    if (email == "" || senha == "") {
      event.preventDefault();
      alert("preencha todos os campos");
    }
  });
})(document.querySelector("#signup-form"));
