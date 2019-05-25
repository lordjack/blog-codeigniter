<?php


class CategoriaModel extends CI_Model
{

	public function __construct()
	{
		$this->load->database();
	}

	public function get_search($data = null)
	{
		if (!empty($data)) {
			$this->db->like('nome', $data);
		}
		$query = $this->db->get("tb_categoria");

		return $query->result();

	}

	/**
	 * Grava os dados na tabela.
	 * @param $dados . Array que contém os campos a serem inseridos
	 * @param Se for passado o $id via parâmetro, então atualizo o registro em vez de inseri-lo.
	 * @return boolean
	 */
	public function store($dados = null, $id = null)
	{
		if ($dados) {

			if ($id) {
				$this->db->where('id', $id);
				if ($this->db->update("tb_categoria", $dados)) {
					return true;
				} else {
					return false;
				}
			} else {
				if ($this->db->insert("tb_categoria", $dados)) {
					return true;
				} else {
					return false;
				}
			}
		}

	}

	/**
	 * Recupera o registro do banco de dados
	 * @param $id - Se indicado, retorna somente um registro, caso contrário, todos os registros.
	 * @return objeto da banco de dados da tabela cadastros
	 */
	public function get($id = null)
	{
		return $this->db->get_where('tb_categoria', array('id' => $id))->row();
	}

	/**
	 * Deleta um registro.
	 * @param $id do registro a ser deletado
	 * @return boolean;
	 */
	public function delete($id = null)
	{
		if ($id) {
			return $this->db->where('id', $id)->delete('tb_categoria');
		}
	}
}
