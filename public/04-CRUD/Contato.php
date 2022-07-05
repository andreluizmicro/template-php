<?php

class Contato {
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO("mysql:dbname=crudoo;host=curso-php-db", "root", "root");
    }

    public function adicionar($email, $nome) :bool
    {
        if(!$this->existeEmail($email)) {
            $sql = "INSERT INTO contatos (nome, email) VALUES (:nome, :email)";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":email", $email);
            $sql->execute();

            return true;
        }
        return false;
    }

    public function getInfo(int $id): array
    {
        $sql = "SELECT * FROM contatos WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0) {
            return $sql->fetch();
        }
        return [];
    }

    public function getContato($email): string
    {   
        $sql = "SELECT nome FROM contatos WHERE email = :email";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":email", $email);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $info = $sql->fetch();

            return $info['nome'];
        }

        return '';
    }

    public function getAll(): array
    {
        $sql = "SELECT * FROM contatos";
        $sql = $this->pdo->query($sql);

        if($sql->rowCount() > 0) {
            return $sql->fetchAll();
        }
        return [];
    }

    public function editar(string $nome, string $email, int $id): bool
    {
        if($this->existeEmail($email) === false) {
            $sql = "UPDATE contatos SET nome = :nome, email = :email WHERE id = :id";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":id", $id);
            $sql->execute();

            return true;
        }
        return false;
    }

    public function excluir($id)
    {
        $sql = "DELETE FROM contatos WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();
    }

    private function existeEmail($email): bool
    {
        $sql = "SELECT * FROM contatos WHERE email = :email";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":email", $email);
        $sql->execute();

        if($sql->rowCount() > 0) {
            return true;
        }

        return false;
    }
}