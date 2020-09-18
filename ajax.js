/**
  * Função para criar um objeto XMLHTTPRequest
  */
 function CriaRequest() {
     try{
         request = new XMLHttpRequest();
     }catch (IEAtual){

         try{
             request = new ActiveXObject("Msxml2.XMLHTTP");
         }catch(IEAntigo){

             try{
                 request = new ActiveXObject("Microsoft.XMLHTTP");
             }catch(falha){
                 request = false;
             }
         }
     }

     if (!request)
         alert("Seu Navegador não suporta Ajax!");
     else
         return request;
 }

 /**
  * Função para enviar os dados
  */
 function getDados() {

     // Declaração de Variáveis
     var nome   = document.getElementById("txtnome").value;
     var result = document.getElementById("Resultado");     
     var xmlreq = CriaRequest();

     // Exibi a imagem de progresso
     result.innerHTML = '<h5> <strong>EXECUTANDO PESQUISA </strong> </h5>';

     // Iniciar uma requisição
     xmlreq.open("GET", "cliente.php?txtnome=" + nome, true);

     // Atribui uma função para ser executada sempre que houver uma mudança de ado
     xmlreq.onreadystatechange = function(){

         // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
         if (xmlreq.readyState == 4) {

             // Verifica se o arquivo foi encontrado com sucesso
             if (xmlreq.status == 200) {
                 result.innerHTML = xmlreq.responseText;
             }else{
                 result.innerHTML = "Erro: " + xmlreq.statusText;
             }
         }
     };
     xmlreq.send(null);
 }

 function getItens() {

     // Declaração de Variáveis
     var nome   = document.getElementById("txtitens").value;
     var itens  = document.getElementById("Itens");//itens
     var xmlreq = CriaRequest();

     // Exibi a imagem de progresso
     itens.innerHTML = '<h5> <strong>EXECUTANDO PESQUISA </strong> </h5>';//itens

     // Iniciar uma requisição
     xmlreq.open("GET", "itens.php?txtitens=" + nome, true);

     // Atribui uma função para ser executada sempre que houver uma mudança de ado
     xmlreq.onreadystatechange = function(){

         // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
         if (xmlreq.readyState == 4) {

             // Verifica se o arquivo foi encontrado com sucesso
             if (xmlreq.status == 200) {
                 itens.innerHTML = xmlreq.responseText;
             }else{
                 itens.innerHTML = "Erro: " + xmlreq.statusText;
             }
         }
     };
     xmlreq.send(null);
 }