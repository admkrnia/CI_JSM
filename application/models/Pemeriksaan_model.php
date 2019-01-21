<?php 

	defined('BASEPATH') OR exit('No direct script access');

	/**
	 * 
	 */
	class Pemeriksaan_model extends CI_Model
	{
		private $_table = "tb_pemeriksaan";

		public $id;
		public $id_ruang;
		public $id_detail;
		public $pic;
		public $jumlahbarang;
		public $status;
		public $tanggalcek;
		
		public function rules()
		{
			return [

				['field' => 'id_ruang',
				'label' => 'id_ruang',
				'rules' => 'required'],

				['field' => 'id_detail',
				'label' => 'id_detail',
				'rules' => 'required'],

				['field'=>  'pic',
				'label' => 'pic',
				'rules' => 'required'],

				['field' => 'jumlahbarang',
				'label' => 'jumlahbarang',
				'rules' => 'required'],

				['field' => 'status',
				'label' => 'status',
				'rules' => 'required'],

				['field'=> 'tanggalcek',
				'label' => 'tanggalcek',
				'rules' => 'date']

			];
		}

		public function getAll()
		{
			return $this->db->get($this->_table)->result();
		}

		public function getById($id)
		{
			return $this->db->get_where($this->_table, ["id" => $id])->row();
		}

		public function save()
		{
			$post = $this->input->post();
			$this->id = uniqid();
			$this->id_ruang = $post["id_ruang"];
			$this->id_detail = $post["id_detail"];
			$this->pic=$post["pic"];
			$this->jumlahbarang = $post["jumlahbarang"];
			$this->status = $post["status"];
			$this->tanggalcek=$post["tanggalcek"];
			$this->db->insert($this->_table, $this);
		}

		public function update()
		{
			$post = $this->input->post();
			$this->id= $post["id"];
			$this->id_ruang = $post["id_ruang"];
			$this->id_detail = $post["id_detail"];
			$this->pic=$post["pic"];
			$this->jumlahbarang = $post["jumlahbarang"];
			$this->status = $post["status"];
			$this->tanggalcek=$post["tanggalcek"];
			$this->db->update($this->_table, $this, array('id' => $post['id']));
		}

		public function delete($id)
	    {
	        return $this->db->delete($this->_table, array("id" => $id));
	    }
	}

?>