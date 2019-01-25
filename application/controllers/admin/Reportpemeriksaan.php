<?php
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	 * 
	 */
	class Reportpemeriksaan extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model("reportpemeriksaan_model");
			$this->load->library('form_validation');
		}

		public function index()
		{
			
			$data["reportpemeriksaan_data"] = $this->reportpemeriksaan_model->getAll();
			$this->load->view("admin/reportpemeriksaan/list", $data);
		}

		public function add()
		{
			$reportpemeriksaan = $this->reportpemeriksaan_model;
			$validation = $this->form_validation;
			$validation->set_rules($reportpemeriksaan->rules());

			if($validation->run()){
				$reportpemeriksaan->save();
				$this->session->set_flashdata('success', 'Berhasil disimpan');
			}

			$this->load->view('admin/reportpemeriksaan/new_form');
		}
		public function edit($id = null)
	    {
	        if (!isset($id)) redirect('admin/reportpemeriksaan');
	       
	        $reportpemeriksaan = $this->reportpemeriksaan_model;
	        $validation = $this->form_validation;
	        $validation->set_rules($reportpemeriksaan->rules());

	        if ($validation->run()) {
	            $reportpemeriksaan->update();
	            $this->session->set_flashdata('success', 'Berhasil disimpan');
	        }

	        $data["reportpemeriksaan"] = $reportpemeriksaan->getById($id);
	        if (!$data["reportpemeriksaan"]) show_404();
	        
	        $this->load->view("admin/reportpemeriksaan/edit_form", $data);
	    }

	    public function delete($id=null)
	    {
	        if (!isset($id)) show_404();
	        
	        if ($this->reportpemeriksaan_model->delete($id)) {
	            redirect(site_url('admin/reportpemeriksaan'));
	        }
	    }
	}

?>