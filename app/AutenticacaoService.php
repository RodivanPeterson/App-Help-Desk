<?php
    class AutenticacaoService
    {
        private $conexao;
        private $autenticacao;

        public function __construct(Conexao $conexao, Autenticacao $autenticacao)
        {
            $this->conexao = $conexao->conectar();
            $this->autenticacao = $autenticacao;
        }

        public function validarUsuario()
        {
            $query = "
                SELECT
                    id, email, perfil_adm
                FROM
                    tb_usuarios
                WHERE
                    email = :email AND senha = :senha
            ";
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(":email", $this->autenticacao->__get('email'), PDO::PARAM_STR);
            $stmt->bindValue(":senha", $this->autenticacao->__get('senha'), PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }
?>