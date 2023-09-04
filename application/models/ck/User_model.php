<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
        
		public function __construct()
        {
                $this->load->database();
        }

		public function listing() {
			$query = $this->db->get('users');
			return $query->result();
		}

		public function detail($id) {
                $this->db->select('*');
                $this->db->from('users');
                $this->db->where('id',$id);
                $query = $this->db->get();
			return $query->row();
		}

		public function add($data) {
			$this->db->insert('users',$data);
		}

		public function edit($data) {
			$this->db->where('id',$data['id']);
			$this->db->update('users',$data);
		}

		public function delete($data) {
			$this->db->where('id',$data['id']);
			$this->db->delete('users',$data);
//			echo $this->db->last_query(); die;
		}

		function cek_login($table,$where){		
//			return $this->db->get_where($table,$where);
			$query = $this->db->get_where($table,$where);
			return $query->row();
		}

		function ambilcs(){		
                $this->db->select('*');
                $this->db->from('users');
                $this->db->where('id != ',$this->session->userdata('userid'));
                $this->db->where('usertype','63');
                $query = $this->db->get();
			return $query->result();
		}

		function ambilpelanggan(){		
                $this->db->select('*');
                $this->db->from('users');
                $this->db->where('id != ',$this->session->userdata('userid'));
                $this->db->where('usertype','0');
                $query = $this->db->get();
//				echo $this->db->last_query(); die;
			return $query->result();
		}

}