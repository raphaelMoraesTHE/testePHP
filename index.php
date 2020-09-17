<?php

    require_once("config.php");

    //----------------------------------------------------------------------
    //Exibe todos os registros da tabela tb_usuarios
    //$sql = new Sql();
    //$cliente = $sql->select("SELECT * FROM cliente");

    //echo json_encode($cliente);

    //----------------------------------------------------------------------
    //Carrega um usuario
    //$root = new Usuario();
    //$root->loadById(4);
    
    //echo $root;

    //----------------------------------------------------------------------
    //Carrega uma lista de usuarios
    //$lista = Usuario::getList();
    
    //echo json_encode($lista);

    //----------------------------------------------------------------------
    //Carrega uma lista de usuarios buscando pelo login
    //$search = Usuario::search("raph");
    
    //echo json_encode($search);

    //----------------------------------------------------------------------
    //Carrega um usuario buscando pelo login e senha
    //$cliente = new Cliente();
    //$cliente->login("raphael", "1234");

    //echo $usuario;

    //----------------------------------------------------------------------
    //Criando um novo cliente
    $cliente = new Cliente("Raphael Edney", 34);
    $cliente->insert();

    echo $cliente;

    //----------------------------------------------------------------------
    //Alterar um usuario
    //$usuario = new Usuario();
    //$usuario->loadById(7);
    //$usuario->update("professor", "123456");

    //echo $usuario;

    //----------------------------------------------------------------------
    //Deletar um usuario
    //$usuario = new Usuario();
    //$usuario->loadById(6);
    //$usuario->delete();

    //echo $usuario;

?>