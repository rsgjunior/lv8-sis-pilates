const inputCep = document.querySelector('#inputCep')

inputCep.addEventListener('focusout', () => {
    if(inputCep.value.length === 8) {
        consultarCep()
        validarInputCep()
    }else {
        limparFormulario()
        invalidarInputCep()
    }
});

const consultarCep = async() => {
    const cep = inputCep.value
    const url = `http://viacep.com.br/ws/${cep}/json/`

    const response = await fetch(url)
    const dados = await response.json()

    if(dados.erro) {
        console.log("erro")
        invalidarInputCep()
        limparFormulario()
    }else {
        console.log(dados)
        preencherFormulario(dados)
    }

}

const preencherFormulario = (dados) => {
    const inputRua = document.querySelector('#inputRua')
    const inputComplemento = document.querySelector('#inputComplemento')
    const inputEstado = document.querySelector('#inputEstado')
    const inputCidade = document.querySelector('#inputCidade')
    const inputBairro = document.querySelector('#inputBairro')

    inputRua.value = dados.logradouro
    inputComplemento.value = dados.complemento
    inputEstado.value = dados.uf
    inputCidade.value = dados.localidade
    inputBairro.value = dados.bairro
}

const limparFormulario = () => {
    const inputRua = document.querySelector('#inputRua')
    const inputComplemento = document.querySelector('#inputComplemento')
    const inputEstado = document.querySelector('#inputEstado')
    const inputCidade = document.querySelector('#inputCidade')
    const inputBairro = document.querySelector('#inputBairro')

    inputRua.value = ''
    inputComplemento.value = ''
    inputEstado.value = ''
    inputCidade.value = ''
    inputBairro.value = ''
}

const invalidarInputCep = () => {
    inputCep.className = 'form-control is-invalid'
}

const validarInputCep = () => {
    inputCep.className = 'form-control is-valid'
}