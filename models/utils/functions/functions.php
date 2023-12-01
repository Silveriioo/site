<?php
class Database
{
    private $hostname;
    private $username;
    private $password;
    private $database;
    private $conn;

    public function __construct($hostname, $username, $password, $database)
    {
        $this->hostname = $hostname;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
        $this->conn = mysqli_connect($hostname, $username, $password, $database);

        if (!$this->conn) {
            die("Falha na conexão: " . mysqli_connect_error());
        }
    }



    public function create($nome, $tag, $email, $senha)
    {
        $query = "SELECT * FROM usuarios WHERE nome = ?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, 's', $nome);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($result) > 0) {
            echo "Já existe um usuário cadastrado com esse nome.";
            return false;
        }

        $query = "SELECT * FROM usuarios WHERE tag = ?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, 'i', $tag);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($result) > 0) {
            echo "Já existe um usuário cadastrado com essa tag.";
            return false;
        }

        $query = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, 's', $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($result) > 0) {
            echo "Já existe um usuário cadastrado com esse email.";
            return false;
        }

        $query = "INSERT INTO usuarios (nome, tag, email, senha) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, 'siss', $nome, $tag, $email, $senha);

        return mysqli_stmt_execute($stmt);
    }

    public function read($id)
    {
        $query = "SELECT * FROM usuarios WHERE id = ?";

        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        return mysqli_fetch_assoc($result);
    }


    public function update($id, $nome, $tag, $email, $senha)
    {
        $query = "UPDATE usuarios SET nome=?, tag=?, email=?, senha=? WHERE id=?";

        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, 'sissi', $nome, $tag, $email, $senha, $id);

        return mysqli_stmt_execute($stmt);
    }


    public function delete($id)
    {
        $query = "DELETE FROM usuarios WHERE id = ?";

        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, 'i', $id);

        return mysqli_stmt_execute($stmt);
    }
}
