<?php
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	 * 
	 */
	class Detail extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model("detail_model");
			$this->load->library('form_validation');
		}

		public function index()
		{
			$data["detail_data"] = $this->detail_model->getAll();
			$this->load->view("admin/detail/list", $data);
		}

		public function add()
		{
			$detail = $this->detail_model;
			$validation = $this->form_validation;
			$validation->set_rules($detail->rules());

			if($validation->run()){
				$detail->save();
				$this->session->set_flashdata('success', 'Berhasil disimpan');
			}

			$this->load->view('admin/detail/new_form');
		}
		public function edit($id = null)
	    {
	        if (!isset($id)) redirect('admin/detail');
	       
	        $detail = $this->detail_model;
	        $validation = $this->form_validation;
	        $validation->set_rules($detail->rules());

	        if ($validation->run()) {
	            $detail->update();
	            $this->session->set_flashdata('success', 'Berhasil disimpan');
	        }

	        $data["detail"] = $detail->getById($id);
	        if (!$data["detail"]) show_404();
	        
	        $this->load->view("admin/detail/edit_form", $data);
	    }

	    public function delete($id=null)
	    {
	        if (!isset($id)) show_404();
	        
	        if ($this->detail_model->delete($id)) {
	            redirect(site_url('admin/detail'));
	        }
	    }
	}

?>