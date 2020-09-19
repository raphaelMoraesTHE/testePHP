<?php
// Verifica se existe a variável txtitens
if (isset($_GET["txtitens"]) && !empty($_GET["txtitens"])) {
    $itens = $_GET["txtitens"];

    // Conexao com o banco de dados
    $server = "localhost";
    $user = "root";
    $senha = "";
    $base = "dbvenda";
    $conexao = new mysqli($server, $user, $senha, $base) or die("Erro na conexão!");
        
        $sql = "SELECT itemvenda, quantidade, valorunid, valortotal FROM produtos WHERE idvenda = '$itens'";
        
    sleep(1);
    $result = $conexao->query($sql);
    $cont = mysqli_affected_rows($conexao);


    // Verifica se a consulta retornou linhas
    if ($cont > 0) {
        // Atribui o código HTML para montar uma tabela
        $tabela = "<table border='1'>
                    <thead>
                        <tr>
                            <th>ITEM</th>
                            <th>QUANTIDADE</th>
                            <th>VALOR UNIT.</th>                            
                            <th>VALOR TOTAL</th>                            
                        </tr>
                    </thead>
                    <tbody>
                    <tr>";
        $return = "$tabela";

        // Captura os dados da consulta e insere na tabela HTML
        while ($linha = $result->fetch_array(MYSQLI_ASSOC)) {
            $return.= "<td>" . utf8_encode($linha["itemvenda"]) . "</td>";
            $return.= "<td>" . utf8_encode($linha["quantidade"]) . "</td>";
            $return.= "<td>" . utf8_encode($linha["valorunid"]) . "</td>";
            $return.= "<td>" . utf8_encode($linha["valortotal"]) . "</td>";            
            $return.= "</tr>";            
        }
        echo $return.="</tbody></table>";        


    } else {
        // Se a consulta não retornar nenhum valor, exibi mensagem para o usuário
        echo "Não foram encontrados registros!";        
    }
}
?>
