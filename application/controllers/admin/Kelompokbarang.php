<?php
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	 * 
	 */
	class Kelompokbarang extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model("kelompokbarang_model");
			$this->load->library('form_validation');
		}

		public function index()
		{
			
			
			$data["kelompokbarang_data"] = $this->kelompokbarang_model->getAll();
			$this->load->view("admin/kelompokbarang/list", $data);
		}

		public function add()
		{
			$kelompokbarang = $this->kelompokbarang_model;
			$validation = $this->form_validation;
			$validation->set_rules($kelompokbarang->rules());

			if($validation->run()){
				$kelompokbarang->save();
				$this->session->set_flashdata('success', 'Berhasil disimpan');
			}

			$this->load->view('admin/kelompokbarang/new_form');
		}
		public function edit($id = null)
	    {
	        if (!isset($id)) redirect('admin/kelompokbarang');
	       
	        $kelompokbarang = $this->kelompokbarang_model;
	        $validation = $this->form_validation;
	        $validation->set_rules($kelompokbarang->rules());

	        if ($validation->run()) {
	            $kelompokbarang->update();
	            $this->session->set_flashdata('success', 'Berhasil disimpan');
	        }

	        $data["kelompokbarang"] = $kelompokbarang->getByKode($id);
	        if (!$data["kelompokbarang"]) show_404();
	        
	        $this->load->view("admin/kelompokbarang/edit_form", $data);
	    }

	    public function delete($id=null)
	    {
	        if (!isset($id)) show_404();
	        
	        if ($this->kelompokbarang_model->delete($id)) {
	            redirect(site_url('admin/kelompokbarang'));
	        }
	    }
	}

?>