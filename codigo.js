function inserir(valor) {
    var valor1 = document.getElementById("campo1").value;
    var valor2 = document.getElementById("campo2").value;

    if (valor1 == "") {
        document.getElementById("campo1").value = valor;
    } else if (valor2 == "") {
        document.getElementById("campo2").value = valor;
    }
}

function corrige() {
    document.getElementById("campo1").value = "";
    document.getElementById("campo2").value = "";
}

function votar() {
    var valor1 = parseInt(document.getElementById("campo1").value);
    var valor2 = parseInt(document.getElementById("campo2").value);

    if (isNaN(valor1) || isNaN(valor2)) {
        alert("Por favor, insira um número válido antes de confirmar.");
        return;
    }

    var candidato = (valor1 * 10) + valor2;

    // Enviar voto para o backend (PHP)
    fetch("salvar_voto.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "numero=" + candidato
    })
    .then(response => response.text())
    .then(data => {
        alert(data); // Mensagem de confirmação do PHP
        corrige(); // Limpa os campos após votar
    })
    .catch(error => console.error("Erro ao registrar voto:", error));
}

function resultados() {
    fetch("resultado.php")
    .then(response => response.text())
    .then(data => {
        document.getElementById("resultado").innerHTML = data;
    })
    .catch(error => console.error("Erro ao buscar resultados:", error));
}
