<?php
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	 * 
	 */
	class Lokasibarang extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model("lokasibarang_model");
			$this->load->library('form_validation');
			
		}

		public function index()
		{
			
			$data["lokasibarang_data"] = $this->lokasibarang_model->getAll();
			$this->load->view("admin/lokasibarang/list", $data);
		}


		public function add()
		{
			$lokasibarang = $this->lokasibarang_model;
			$validation = $this->form_validation;
			$validation->set_rules($lokasibarang->rules());

			if($validation->run()){
				$lokasibarang->save();
				$this->session->set_flashdata('success', 'Berhasil disimpan');
			}

			$this->load->view('admin/lokasibarang/new_form');
		}
		public function edit($id = null)
	    {
	        if (!isset($id)) redirect('admin/lokasibarang');
	       
	        $lokasibarang = $this->lokasibarang_model;
	        $validation = $this->form_validation;
	        $validation->set_rules($lokasibarang->rules());

	        if ($validation->run()) {
	            $lokasibarang->update();
	            $this->session->set_flashdata('success', 'Berhasil disimpan');
	        }

	        $data["lokasibarang"] = $lokasibarang->getByKode($id);
	        if (!$data["lokasibarang"]) show_404();
	        
	        $this->load->view("admin/lokasibarang/edit_form", $data);
	    }

	    public function delete($id=null)
	    {
	        if (!isset($id)) show_404();
	        
	        if ($this->lokasibarang_model->delete($id)) {
	            redirect(site_url('admin/lokasibarang'));
	        }
	    }
	}

?>