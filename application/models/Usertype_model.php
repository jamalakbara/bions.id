<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usertype_model extends CI_Model {
        
		public function __construct()
        {
                $this->load->database();
        }

		public function listing() {
			$query = $this->db->get('usertype');
			return $query->result();
		}

		public function detail($id) {
                $this->db->select('*');
                $this->db->from('usertype');
                $this->db->where('id',$id);
                $query = $this->db->get();
			return $query->row();
		}

		public function add($data) {
			$this->db->insert('usertype',$data);
		}

		public function edit($data) {
			$this->db->where('id',$data['id']);
			$this->db->update('usertype',$data);
		}

		public function delete($data) {
			$this->db->where('id',$data['id']);
			$this->db->delete('usertype',$data);
//			echo $this->db->last_query(); die;
		}

		function cek_login($table,$where){		
//			return $this->db->get_where($table,$where);
			$query = $this->db->get_where($table,$where);
			return $query->row();
		}
}