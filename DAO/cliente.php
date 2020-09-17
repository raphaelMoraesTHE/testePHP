<?php

    class Cliente{

        private $idcli;
        private $nomecli;
        private $idadecli;
        private $cadastrocli;

        public function getIdCli(){
            return $this->idcli;
        }

        public function setIdCli($value){
            $this->idcli = $value;
        }

        public function getNomeCli(){
            return $this->nomecli;
        }

        public function setNomeCli($value){
            $this->nomecli = $value;
        }

        public function getIdadeCli(){
            return $this->idadecli;
        }

        public function setIdadeCli($value){
            $this->idadecli = $value;
        }

        public function getCadastroCli(){
            return $this->cadastrocli;
        }

        public function setCadastroCli($value){
            $this->cadastrocli = $value;
        }

        public function setData($data){
            
            $this->setIdCli($data['idcli']);
            $this->setNomeCli($data['nomecli']);
            $this->setIdadeCli($data['idadecli']);
            $this->setCadastroCli(new DateTime($data['cadastrocli']));  

        }

        public function __toString(){

            return json_encode(array(
                "idcli"=>$this->getIdCli(),
                "nomecli"=>$this->getNomeCli(),
                "idadecli"=>$this->getIdadeCli(),
                "cadastrocli"=>$this->getCadastroCli()->format("d/m/Y H:i:s")
            ));
        }

        public function __construct($nome = "", $idade = 0){

            $this->setNomeCli($nome);
            $this->setIdadeCli($idade);
        }

        public function loadById($id){

            $sql = new Sql();

            $results = $sql->select("SELECT * FROM cliente WHERE idcli = :ID", array(
                ":ID"=>$id
            ));

            if(count($results) > 0){
               
                $this->setData($results[0]);

            }
        }

        public static function getList(){

            $sql = new Sql();
            return $sql->select("SELECT * FROM cliente ORDER BY idcliente;");
        }

        public static function search($nome){

            $sql = new Sql();
            return $sql->select("SELECT * FROM cliente WHERE nomecli LIKE :SEARCH ORDER BY nomecli;", array(
                ':SEARCH'=>"%".$nome."%"
            ));

        }

        //public function login($login, $password){

          //  $sql = new Sql();

          //  $results = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :PASSWORD", array(
          //      ":LOGIN"=>$login,
          //      ":PASSWORD"=>$password
          //  ));

          //  if(count($results) > 0){
                
          //      $this->setData($results[0]); 
                              
          //  }
          //  else{
          //      throw new Exception("Login e/ou senha invalido!");
          //  }

        //}
        
        public function insert(){

            $sql = new Sql();
            $results = $sql->select("CALL sp_cliente_insert(:NOME, :IDADE)", array(
                ':NOME'=>$this->getNomeCli(),
                ':IDADE'=>$this->getIdadeCli()
                //':CADASTRO'=>$this->getCadastroCli()
            ));

            if (count($results) > 0){

                $this->setData($results[0]);

            }
        }

        public function update($nome, $idade){

            $this->setNomeCli($nome);
            $this->setIdadeCli($idade);

            $sql = new Sql();
            
            $sql->query("UPDATE cliente SET nomecli = :NOME, idade = :IDADE WHERE idcli = :ID", array(
                ':NOME'=>$this->getNomeCli(),
                ':IDADE'=>$this->getIdadeCli(),
                ':ID'=>$this->getIdCli()
            ));
        }
        
        public function delete(){

            $sql = new Sql();
            $sql->query("DELETE FROM cliente WHERE cliente = :ID", array(
                ':ID'=>$this->getIdCli()
            ));

            $this->setIdCli(0);
            $this->setNomeCli("");
            $this->setIdadeCli(0);
            $this->setCadastroCli(new DateTime());
        }
        
    }

?>