<?php
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	 * 
	 */
	class Detailpemeriksaan extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model("detailpemeriksaan_model");
			$this->load->library('form_validation');
		}

		public function index()
		{
			$data["detailpemeriksaan_data"] = $this->detailpemeriksaan_model->getAll();
			$this->load->view("admin/detailpemeriksaan/list", $data);
		}

		public function select_ruang()
		{
			$data["ruang_data"] = $this->detailpemeriksaan_model->ruang();
			$this->load->view('admin/detailpemeriksaan/new_form', $data);
		}

		public function select_detail()
		{
			$data["detail_data"] = $this->detailpemeriksaan_model->detail();
			$this->load->view('admin/detailpemeriksaan/new_form', $data);
		}

		public function add()
		{
			$detailpemeriksaan = $this->detailpemeriksaan_model;
			$validation = $this->form_validation;
			$validation->set_rules('id_pemeriksaan','id_pemeriksaan','required');

			if($validation->run()){
				$detailpemeriksaan->save();
				$this->session->set_flashdata('success', 'Berhasil disimpan');
			}

			$this->load->view('admin/detailpemeriksaan/new_form');
		}
		public function edit($id = null)
	    {
	        if (!isset($id)) redirect('admin/detailpemeriksaan');
	       
	        $detailpemeriksaan = $this->detailpemeriksaan_model;
	        $validation = $this->form_validation;
	        $validation->set_rules($detailpemeriksaan->rules());

	        if ($validation->run()) {
	            $detailpemeriksaan->update();
	            $this->session->set_flashdata('success', 'Berhasil disimpan');
	        }

	        $data["detailpemeriksaan"] = $detailpemeriksaan->getById($id);
	        if (!$data["detailpemeriksaan"]) show_404();
	        
	        $this->load->view("admin/detailpemeriksaan/edit_form", $data);
	    }

	    public function delete($id=null)
	    {
	        if (!isset($id)) show_404();
	        
	        if ($this->detailpemeriksaan_model->delete($id)) {
	            redirect(site_url('admin/detailpemeriksaan'));
	        }
	    }
	}

?>