<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About_model extends CI_Model {
        
		public function __construct()
        {
                $this->load->database();
        }

		public function listing() {
			$query = $this->db->get('about');
			return $query->result();
		}

		public function listinglimit($limit) {
			$this->db->limit($limit);
			$query = $this->db->get('about');
			return $query->result();
		}

		public function detail($id_about) {
                $this->db->select('*');
                $this->db->from('about');
                $this->db->where('id',$id_about);
                $query = $this->db->get();
			return $query->row();
		}

		public function add($data) {
			$this->db->insert('about',$data);
		}

		public function edit($data) {
			$this->db->where('id',$data['id']);
			$this->db->update('about',$data);
		}

		public function delete($data) {
			$this->db->where('id',$data['id']);
			$this->db->delete('about',$data);
//			echo $this->db->last_query(); die;
		}

}