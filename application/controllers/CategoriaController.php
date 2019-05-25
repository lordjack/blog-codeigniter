<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CategoriaController extends CI_Controller
{
	public $categoria;

	/**
	 * Get All Data from this method.
	 *
	 * @return Response
	 */

	public function __construct()
	{

		parent::__construct();

		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('CategoriaModel');

		$this->categoria = new CategoriaModel;

	}


	public function index()
	{
		$nome = $this->input->post('nome');

		if ($nome) {
			$data['categoria'] = $this->categoria->get_search($nome);

		} else {
			$data['categoria'] = $this->categoria->get_search();

		}

		$this->load->view('theme/header');
		$this->load->view('categoria/list', $data);
		$this->load->view('theme/footer');
	}

	/**
	 * Create from display on this method.
	 *
	 * @return Response
	 */

	public function create()
	{
		$this->load->view('theme/header');
		$this->load->view('categoria/create');
		$this->load->view('theme/footer');
	}

	public function store()
	{
		$this->load->library('form_validation');

		$regras = array(
			array(
				'field' => 'nome',
				'label' => 'Nome',
				'rules' => 'required'
			),
			/*
			array(
				'field' => 'email',
				'label' => 'E-mail',
				'rules' => 'required|valid_email'
			),
			*/
			array(
				'field' => 'descricao',
				'label' => 'Descrição',
				'rules' => 'required'
			)
		);

		$this->form_validation->set_rules($regras);

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('errors', validation_errors());
			redirect(base_url('categoria/create'));
		} else {

			$id = $this->input->post('id');

			$dados = array(

				"nome" => $this->input->post('nome'),
				"descricao" => $this->input->post('descricao')

			);
			if ($this->categoria->store($dados, $id)) {
				$this->session->set_flashdata('msg', 'success');
				redirect(base_url('categoria'));
			} else {
				$variaveis['mensagem'] = "Ocorreu um erro. Por favor, tente novamente.";
				$this->load->view('categoria/create', $variaveis);
			}

		}
	}

	/**
	 * Edit Data from this method.
	 *
	 * @return Response
	 */

	public function edit($id)
	{
		$data = $this->categoria->get($id);

		$this->load->view('theme/header');
		$this->load->view('categoria/edit', array('categoria' => $data));
		$this->load->view('theme/footer');

	}

	/**
	 * Delete Data from this method.
	 *
	 * @return Response
	 */

	public function delete($id)
	{
		$this->categoria->delete($id);
		$this->session->set_flashdata('msg', 'delete');
		redirect(base_url('categoria'));

	}
}
