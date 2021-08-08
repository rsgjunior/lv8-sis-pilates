const inputExames = document.querySelector("#inputExames");
const divAppendExames = document.querySelector("#appendExames");

inputExames.onchange = () => {
  limparBlocos();
  console.log(inputExames.files);

  for(let i=0; i < inputExames.files.length; i++) {
    addBlocoExame(i, inputExames.files[i]);
  }


}

// Limpa os blocos de comentário dos exames caso exista
function limparBlocos() {
  let blocosExame = document.querySelectorAll(".callout");

  for(let bloco of blocosExame){
    bloco.remove();
  }
}

// Adiciona o bloco de comentário de um exame no HTML
function addBlocoExame(id, arquivo) {
  let divCallout = document.createElement("div");
  divCallout.className = "callout callout-info";

  let h5 = document.createElement("h5");
  h5.innerText = "Arquivo " + arquivo.name;

  let textarea = document.createElement("textarea");
  textarea.className = "form-control";
  textarea.placeholder = "Insira uma descrição para o arquivo";
  textarea.name = "comentarios[" + id + "]";

  divCallout.appendChild(h5);
  divCallout.appendChild(textarea);

  divAppendExames.appendChild(divCallout);
}
