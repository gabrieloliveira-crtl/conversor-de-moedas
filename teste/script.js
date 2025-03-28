const input = document.getElementById("taskInput");
const ul = document.getElementById("taskList");

//aqui estamos criando uma função para ser atribuida dentro do botao adicionar tarefas
function addTask() {
    if(input.value !== "")//aqui informamos que se(if) o input for diferente de vazio (!== ""), ele irá criar um elemento (creatElement) de 'li'. o texto que ela possui é igual o input value, ou seja do input que sera digitado
    {
        const li = document.createElement("li");
        li.textContent = input.value;//Traduzindo esta linha estamos criando um texto para lista, e este texto será o valor preenchido pelo usuario dentro do input
        
        //aqui estamos criando um botao(button) para remover esses itens da (li)
        const removerBotao = document.createElement("button");
        
        //chamamos nosssa const removerBotao e inserindo um texto chamado "remover"
        removerBotao.textContent = "remover";

        //criamos aqui uma funçao que ao clicar neste botao ele irá executar um funçao de Remover o filho da nossa ul ou seja a "li"
        removerBotao.onclick = function() {
            ul.removeChild(li)//a funçao é para o elemento filho da ul, que no caso é a nossa "li" e remove-la.

        };
    
        ul.appendChild(li);//Estamos adicionando um filho para nossa (ul)
        li.appendChild(removerBotao);//aqui, chamamos nossa const "li" e estamos adicionando a ela um filho

        input.value = "";//usado para limpar o campo de input apos ter adicionado o item de lista
        
    }
    else{//caso o campo input estiver vazio, ele ira aparecer esta imagem de alerta
        alert("Por Favor, insira uma tarefa")
    }
}