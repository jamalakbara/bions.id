<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Province_model extends CI_Model {
        
		public function __construct()
        {
                $this->load->database();
        }

		public function listing() {
			$query = $this->db->get('province');
			return $query->result();
		}

		public function detail($id) {
                $this->db->select('*');
                $this->db->from('province');
                $this->db->where('id',$id);
                $query = $this->db->get();
			return $query->row();
		}

		public function detailname($id) {
                $this->db->select('province');
                $this->db->from('province');
                $this->db->where('provinceid',$id);
                $query = $this->db->get();
			return $query->row('province');
		}

		public function add($data) {
			$this->db->insert('province',$data);
		}

		public function edit($data) {
			$this->db->where('id',$data['id']);
			$this->db->update('province',$data);
		}

		public function delete($data) {
			$this->db->where('id',$data['id']);
			$this->db->delete('province',$data);
//			echo $this->db->last_query(); die;
		}

		function cek_province($table,$where){		
//			return $this->db->get_where($table,$where);
			$query = $this->db->get_where($table,$where);
			return $query->row();
		}
}