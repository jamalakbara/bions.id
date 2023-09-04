<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class City_model extends CI_Model {
        
		public function __construct()
        {
                $this->load->database();
        }

		public function listing($id) {
                $this->db->select('*');
                $this->db->from('city');
			if($id) {
                $this->db->where('provinceid',$id);
			}
                $query = $this->db->get();
			return $query->result();
		}

		public function detail($id) {
                $this->db->select('*');
                $this->db->from('city');
                $this->db->where('cityid',$id);
                $query = $this->db->get();
			return $query->row();
		}

		public function detailname($id) {
                $this->db->select('city');
                $this->db->from('city');
                $this->db->where('id',$id);
                $query = $this->db->get();
			return $query->row('city');
		}

		public function detailtype($id) {
                $this->db->select('type');
                $this->db->from('city');
                $this->db->where('id',$id);
                $query = $this->db->get();
			return $query->row('city');
		}

		public function detailprov($id) {
                $this->db->select('province');
                $this->db->from('city');
                $this->db->where('id',$id);
                $query = $this->db->get();
			return $query->row('city');
		}

		public function add($data) {
			$this->db->insert('city',$data);
		}

		public function edit($data) {
			$this->db->where('id',$data['id']);
			$this->db->update('city',$data);
		}

		public function delete($data) {
			$this->db->where('id',$data['id']);
			$this->db->delete('city',$data);
//			echo $this->db->last_query(); die;
		}

		function cek_city($table,$where){		
//			return $this->db->get_where($table,$where);
			$query = $this->db->get_where($table,$where);
			return $query->row();
		}
}