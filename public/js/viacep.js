const inputCep = document.querySelector("#inputCep");
const inputRua = document.querySelector("#inputRua");
const inputComplemento = document.querySelector("#inputComplemento");
const inputEstado = document.querySelector("#inputEstado");
const inputCidade = document.querySelector("#inputCidade");
const inputBairro = document.querySelector("#inputBairro");


inputCep.addEventListener("focusout", function() {
    if (inputCep.value.length === 8) {
        consultarCep();
        validarInputCep();
    } else {
        limparFormulario();
        validarInputCep(false);
    }
});

async function consultarCep () {
    const cep = inputCep.value;
    const url = `http://viacep.com.br/ws/${cep}/json/`;

    const response = await fetch(url);
    const dados = await response.json();

    if (dados.erro) {
        console.log("erro");
        validarInputCep(false);
        limparFormulario();
    } else {
        console.log(dados);
        preencherFormulario(dados);
    }
};

function preencherFormulario (dados) {
    inputRua.value = dados.logradouro;
    inputComplemento.value = dados.complemento;
    inputEstado.value = dados.uf;
    inputCidade.value = dados.localidade;
    inputBairro.value = dados.bairro;
};

function limparFormulario () {
    inputRua.value = "";
    inputComplemento.value = "";
    inputEstado.value = "";
    inputCidade.value = "";
    inputBairro.value = "";
};

function validarInputCep (estado = true) {
    inputCep.className = estado ? "form-control is-valid" : "form-control is-invalid";
};