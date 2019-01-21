<?php
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	 * 
	 */
	class Ruang extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model("ruang_model");
			$this->load->library('form_validation');
		}

		public function index()
		{
			$data["ruang_data"] = $this->ruang_model->getAll();
			$this->load->view("admin/ruang/list", $data);
		}

		public function select_subsubkelompok()
		{
			$data["nama_data"] = $this->ruang_model->subsubkelompok();
			$this->load->view('admin/ruang/new_form', $data);
		}

		public function add()
		{
			$ruang = $this->ruang_model;
			$validation = $this->form_validation;
			$validation->set_rules($ruang->rules());

			if($validation->run()){
				$ruang->save();
				$this->session->set_flashdata('success', 'Berhasil disimpan');
			}

			$this->load->view('admin/ruang/new_form');
		}
		public function edit($id = null)
	    {
	        if (!isset($id)) redirect('admin/ruang');
	       
	        $ruang = $this->ruang_model;
	        $validation = $this->form_validation;
	        $validation->set_rules($ruang->rules());

	        if ($validation->run()) {
	            $ruang->update();
	            $this->session->set_flashdata('success', 'Berhasil disimpan');
	        }

	        $data["ruang"] = $ruang->getById($id);
	        if (!$data["ruang"]) show_404();
	        
	        $this->load->view("admin/ruang/edit_form", $data);
	    }

	    public function delete($id=null)
	    {
	        if (!isset($id)) show_404();
	        
	        if ($this->ruang_model->delete($id)) {
	            redirect(site_url('admin/ruang'));
	        }
	    }
	}

?>