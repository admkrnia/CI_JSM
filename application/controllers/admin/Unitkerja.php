<?php
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	 * 
	 */
	class Unitkerja extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model("unitkerja_model");
			$this->load->library('form_validation');
		}

		public function index()
		{
			$data["unitkerja_data"] = $this->unitkerja_model->getAll();
			$this->load->view("admin/unitkerja/list", $data);
		}

		public function add()
		{
			$unitkerja = $this->unitkerja_model;
			$validation = $this->form_validation;
			$validation->set_rules($unitkerja->rules());

			if($validation->run()){
				$unitkerja->save();
				$this->session->set_flashdata('success', 'Berhasil disimpan');
			}

			$this->load->view('admin/unitkerja/new_form');
		}
		public function edit($id = null)
	    {
	        if (!isset($id)) redirect('admin/unitkerja');
	       
	        $unitkerja = $this->unitkerja_model;
	        $validation = $this->form_validation;
	        $validation->set_rules($unitkerja->rules());

	        if ($validation->run()) {
	            $unitkerja->update();
	            $this->session->set_flashdata('success', 'Berhasil disimpan');
	        }

	        $data["unitkerja"] = $unitkerja->getByKode($id);
	        if (!$data["unitkerja"]) show_404();
	        
	        $this->load->view("admin/unitkerja/edit_form", $data);
	    }

	    public function delete($id=null)
	    {
	        if (!isset($id)) show_404();
	        
	        if ($this->unitkerja_model->delete($id)) {
	            redirect(site_url('admin/unitkerja'));
	        }
	    }
	}

?>