<?php

require_once('usuario.php');
require_once('conexao.php');

class DaoUsuario
{

	public static $instance;

	public static function getInstance()
	{
		if (!isset(self::$instance)) {
			self::$instance = new DaoUsuario();
		}

		return self::$instance;
	}

	public function Inserir(Usuario $usuario)
	{

		try {

			$sql = "INSERT INTO usuario (
					nome, cpf, telefone, email 
					) VALUES (
					:nome, :cpf, :telefone, :email
					)";

			$p_sql = Conexao::getConexao()->prepare($sql);

			$p_sql->bindValue(":nome", $usuario->getNome());
			$p_sql->bindValue(":cpf", $usuario->getCpf());
			$p_sql->bindValue(":telefone", $usuario->getTelefone());
			$p_sql->bindValue(":email", $usuario->getEmail());

			return $p_sql->execute();
		} catch (Exception $e) {
			echo "Falha de execução: " . $e->getMessage();
		}
	}

	public function Editar(Usuario $usuario)
	{
		try {
			$sql = "UPDATE usuario SET
            nome = :nome,
            cpf = :cpf,
            telefone = :telefone,
            email = :email
            WHERE id = :id";

			$p_sql = Conexao::getConexao()->prepare($sql);

			$p_sql->bindValue(":id", $usuario->getId());
			$p_sql->bindValue(":nome", $usuario->getNome());
			$p_sql->bindValue(":cpf", $usuario->getCpf());
			$p_sql->bindValue(":telefone", $usuario->getTelefone());
			$p_sql->bindValue(":email", $usuario->getEmail());

			return $p_sql->execute();
		} catch (Exception $e) {
			echo "Falha de execução: " . $e->getMessage();
		}
	}

	public function Deletar($id)
	{
		try {
			$sql = "DELETE FROM usuario WHERE id = :id";
			$p_sql = Conexao::getConexao()->prepare($sql);
			$p_sql->bindValue(":id", $id);

			return $p_sql->execute();
		} catch (Exception $e) {
			echo "Falha de execução: " . $e->getMessage();
		}
	}

	public function Buscar()
	{
		try {
			$sql = "SELECT * FROM usuario order by id";
			$result = Conexao::getConexao()->query($sql);
			$lista = $result->fetchAll(PDO::FETCH_ASSOC);
			$f_lista = array();

			foreach ($lista as $l)
				$f_lista[] = $this->populaUsuario($l);

			return $f_lista;
		} catch (Exception $e) {
			echo "Falha de execução: " . $e->getMessage();
		}
	}

	private function populaUsuario($row)
	{
		$usu = new Usuario;
		$usu->setId($row['id']);
		$usu->setCpf($row['cpf']);
		$usu->setNome($row['nome']);
		$usu->setTelefone($row['telefone']);
		$usu->setEmail($row['email']);
		return $usu;
	}

	public function BuscarPorId($id)
	{
		try {
			$sql = "SELECT * FROM usuario WHERE id = :id";
			$p_sql = Conexao::getConexao()->prepare($sql);
			$p_sql->bindValue(":id", $id);
			$p_sql->execute();
			return $this->populaUsuario($p_sql->fetch(PDO::FETCH_ASSOC));
		} catch (Exception $e) {
			echo "Falha de execução: " . $e->getMessage();
		}
	}
}
