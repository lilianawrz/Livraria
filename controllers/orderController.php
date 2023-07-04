<?php
include "../../models/BD.class.php";

class OrderController
{
    private $model;
    private $table = "pedido";
    public function __construct()
    {
        $this->model = new BD();
    }

    public function inserir($dados)
    {
        try {

            if (!preg_match("/^[a-zA-Z-' ]*$/", $dados['nome'])) {
                throw new Exception(" Somente letras e espaços em branco são permitidos. ");
            }

            $this->model->inserir($this->table, $dados);

            $_SESSION['url'] = "orderList.php";
            $_SESSION['msg'] = "Registro salvo com sucesso";

        } catch (Exception $e) {
            $_SESSION['dados'] = $dados;
            $_SESSION['url'] = 'orderForm.php';
            $_SESSION['msg'] = $e->getMessage();
        }
    }
    public function atualizar($dados)
    {
        try {

            if (!preg_match("/^[a-zA-Z-' ]*$/", $dados['nome'])) {
                throw new Exception(" Somente letras e espaços em branco são permitidos. ");
            }

            $this->model->atualizar($this->table, $dados);

            $_SESSION['url'] = "orderList.php";
            $_SESSION['msg'] = "Registro atualizado com sucesso";

        } catch (Exception $e) {
            $_SESSION['dados'] = $dados;
            $_SESSION['url'] = 'orderForm.php?id=' . $dados['id'];
            $_SESSION['msg'] = $e->getMessage();
        }
    }
    public function select()
    {
        return $this->model->select($this->table);
    }
    public function pesquisar($dados)
    {
        return $this->model->pesquisar($this->table, $dados);
    }
    public function deletar($id)
    {
        $this->model->deletar($this->table, $id);
    }
    public function buscar($id)
    {
        return $this->model->buscar($this->table, $id);
    }

}
?>