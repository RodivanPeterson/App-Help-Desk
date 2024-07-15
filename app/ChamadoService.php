<?php
    class ChamadoService
    {
        private $conexao;
        private $chamado;

        public function __construct( Conexao $conexao, Chamado $chamado)
        {
            $this->conexao = $conexao->conectar();
            $this->chamado = $chamado;
        }

        public function inserir(): void {
            $query = "
                INSERT INTO tb_chamados (titulo, categoria, descricao, id_usuario)
                VALUES(:titulo, :categoria, :descricao, :id_usuario)
            ";

            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':titulo', $this->chamado->__get('titulo'));
            $stmt->bindValue(':categoria', $this->chamado->__get('categoria'));
            $stmt->bindValue(':descricao', $this->chamado->__get('descricao'));
            $stmt->bindValue(':id_usuario', $this->chamado->__get('id_usuario'));
            $stmt->execute();
        }

        public function recuperar(int $id_usuario, bool $notAdm): Array {
            
            if($notAdm) {
                $query = "
                SELECT 
                    ch.id, ch.titulo, ch.categoria, ch.descricao, ch.data_criacao, user.email
                FROM
                    tb_chamados AS ch
                LEFT JOIN
                    tb_usuarios AS user ON (ch.id_usuario = user.id)
                WHERE
                    id_usuario = :id
                ORDER BY 
                    data_criacao DESC
                ";
                
                $stmt = $this->conexao->prepare($query);
                $stmt->bindValue(":id", $id_usuario, PDO::PARAM_INT);
                $stmt->execute();
            } else {
                $query = "
                SELECT 
                    ch.id, ch.titulo, ch.categoria, ch.descricao, ch.data_criacao, user.email
                FROM
                    tb_chamados AS ch
                LEFT JOIN
                    tb_usuarios AS user ON (ch.id_usuario = user.id)
                ORDER BY 
                    data_criacao DESC
                ";
                
                $stmt = $this->conexao->query($query);
            }
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>