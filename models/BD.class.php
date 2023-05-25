 <?php
class BD
{
    private $host = "localhost";
    private $dbname = "db_aula";
    private $port = 3306;
    private $usuario = "root";
    private $senha = "";
    private $db_charset = "utf8";


    public function conn()
    {
        $conn = "mysql:host=$this->host;dbname=$this->dbname;port=$this->port";

        return new PDO(
            $conn,
            $this->usuario,
            $this->senha,
            [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES " . $this->db_charset]
        );
    }
    public function inserir($dados)
    {
        $conn = $this->conn();
        $sql = "INSERT INTO usuario (nome, email, telefone) VALUES (?, ?, ?);";
        $st = $conn->prepare($sql);
        $st->execute([$dados['nome'], $dados['email'], $dados['telefone']]);
    }
    public function inserirProduto($produto)
    {
        $conn = $this->conn();
        $sql = "INSERT INTO produto (nome, quantidade, preco, descricao) VALUES(?,?,?,?);";
        $st = $conn->prepare($sql);
        $st->execute([$produto['nome'], $produto['quantidade'], $produto['preco'], $produto['descricao']]);
    }

    public function atualizar($dados)
    {

        $id = $dados['id'];
        $conn = $this->conn();
        $sql = "UPDATE usuario SET nome=?, email=?, telefone=? WHERE id = $id ";
        $st = $conn->prepare($sql);
        $st->execute([$dados['nome'], $dados['email'], $dados['telefone']]);
    }
    public function atualizarProduto($produto)
    {
        $id = $produto['id'];
        $conn = $this->conn();
        $sql = "UPDATE produto SET nome=?, quantidade=? preco=?, descricao=? WHERE id= $id";
        $st = $conn->prepare($sql);
        $st->execute([$produto['nome'], $produto['quantidade'], $produto['preco'], $produto['descricao']]);
    }

    public function select()
    {
        $conn = $this->conn();
        $sql = "SELECT * FROM usuario;";
        $st = $conn->prepare($sql);
        $st->execute();

        return $st->fetchAll(PDO::FETCH_CLASS);
    }
    public function selectProduto()
    {
        $conn = $this->conn();
        $sql = "SELECT * FROM produto";
        $st = $conn->prepare($sql);
        $st->execute();

        return $st->fetchAll(PDO::FETCH_CLASS);
    }

    public function buscar($id)
    {
        $conn = $this->conn();
        $sql = "SELECT * FROM usuario WHERE id=?;";
        $st = $conn->prepare($sql);
        $st->execute([$id]);

        return $st->fetchObject();
    }
    public function buscarProduto($id)
    {
        $conn = $this->conn();
        $sql = "SELECT * FROM produto WHERE id=? ";
        $st = $conn->prepare($sql);
        $st->execute([$id]);

        return $st->fetchObject();
    }

    public function deletar($id)
    {
        $conn = $this->conn();
        $sql = "DELETE FROM usuario WHERE id = ?";
        $st = $conn->prepare($sql);
        $st->execute([$id]);
    }
    public function deletarProduto($id)
    {
        $conn = $this->conn();
        $sql = "DELETE FROM produtos WHERE id=? ";
        $st = $conn->prepare($sql);
        $st->execute([$id]);
    }
    public function pesquisar($dados)
    {

        //var_dump($dados);
        //exit;
        $campo = $dados['campo'];
        $valor = $dados['valor'];

        $conn = $this->conn();
        $sql = "SELECT * FROM usuario WHERE $campo LIKE ?;";
        $st = $conn->prepare($sql);
        //pesquisa o campo com % para usar o like do SQL 
        $st->execute(["%" . $valor . "%"]);

        //retorna um vetor de objetos do tipo classe
        return $st->fetchAll(PDO::FETCH_CLASS);
    }
    public function pesquisarProduto($dados)
    {
        $campo = $dados['campo'];
        $valor = $dados['valor'];

        $conn = $this->conn();
        $sql = "SELECT * FROM produto WHERE $campo LIKE ?;";
        $st = $conn->prepare($sql);
        // pesquisa o campo com % para usar o like do SQL
        $st->execute(["%" . $valor . "%"]);

        // retorna um vetor de objetos do tipo Produto
        return $st->fetchAll(PDO::FETCH_CLASS);
    }

    public function login($dados)
    {
        $conn = $this->conn();
        $sql = "SELECT * FROM usuario WHERE login=? AND senha=? ;";
        $st = $conn->prepare($sql);
        $st->execute([$dados['login'], $dados['senha']]);

        return $st->fetchObject();
    }
}