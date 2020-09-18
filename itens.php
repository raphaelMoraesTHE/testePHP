<?php
// Verifica se existe a variável txtnome
if (isset($_GET["txtitens"])) {
    $nome = $_GET["txtitens"];
    // Conexao com o banco de dados
    $server = "localhost";
    $user = "root";
    $senha = "";
    $base = "dbvenda";
    $conexao = new mysqli($server, $user, $senha, $base) or die("Erro na conexão!");
    //mysql_select_db($base);

    // Verifica se a variável está vazia
    if (empty($nome)) {
        $sql = "SELECT clientes.idcliente, clientes.nomecli, clientes.fonecli, clientes.emailcli, vendas.valortotal FROM clientes, vendas WHERE clientes.idcliente = vendas.idcliente GROUP BY vendas.idvenda ORDER BY clientes.idcliente";
        //c.idclient, c.nomecli, c.fonecli, c.emailcli, v.valortotal
    } else {
        $nome .= "%";
        $sql = "SELECT clientes.idcliente, clientes.nomecli, clientes.fonecli, clientes.emailcli, vendas.valortotal FROM clientes, vendas WHERE clientes.idcliente = vendas.idcliente and clientes.nomecli like '$nome' GROUP BY vendas.idvenda ORDER BY clientes.idcliente";
    }

    sleep(1);
    $result = $conexao->query($sql);
    $cont = mysqli_affected_rows($conexao);


    // Verifica se a consulta retornou linhas
    if ($cont > 0) {
        // Atribui o código HTML para montar uma tabela
        $tabela = "<table border='1'>
                    <thead>
                        <tr>
                            <th>CODIGO</th>
                            <th>NOME</th>
                            <th>TELEFONE</th>                            
                            <th>EMAIL</th>
                            <th>VALOR COMPRA</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>";
        $return = "$tabela";
        // Captura os dados da consulta e inseri na tabela HTML
        while ($linha = $result->fetch_array(MYSQLI_ASSOC)) {
            $return.= "<td>" . utf8_encode($linha["idcliente"]) . "</td>";
            $return.= "<td>" . utf8_encode($linha["nomecli"]) . "</td>";
            $return.= "<td>" . utf8_encode($linha["fonecli"]) . "</td>";
            $return.= "<td>" . utf8_encode($linha["emailcli"]) . "</td>";
            $return.= "<td>" . utf8_encode($linha["valortotal"]) . "</td>";
            $return.= "<td><input type='button' name='btnItens' value='Ver Itens' onclick='getItens();'/></td>";
            $return.= "</tr>";
        }
        echo $return.="</tbody></table>";


    } else {
        // Se a consulta não retornar nenhum valor, exibi mensagem para o usuário
        echo "Não foram encontrados registros!";
    }
}
?>