<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config_model extends CI_Model {
        
		public function __construct()
        {
                $this->load->database();
        }

		public function listing() {
			$query = $this->db->get('config');
			return $query->result();
		}

		public function detail($id) {
                $this->db->select('*');
                $this->db->from('config');
                $this->db->where('id',$id);
                $query = $this->db->get();
			return $query->row();
		}

		public function add($data) {
			$this->db->insert('config',$data);
		}

		public function edit($data) {
			$this->db->where('id',$data['id']);
			$this->db->update('config',$data);
		}

		public function delete($data) {
			$this->db->where('id',$data['id']);
			$this->db->delete('config',$data);
//			echo $this->db->last_query(); die;
		}

		function cek_config($table,$where){		
//			return $this->db->get_where($table,$where);
			$query = $this->db->get_where($table,$where);
			return $query->row();
		}
}