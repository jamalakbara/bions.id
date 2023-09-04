<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_model extends CI_Model {
        
		public function __construct()
        {
                $this->load->database();
        }

		public function listing() {
			$query = $this->db->get('contact');
			return $query->result();
		}

		public function listinglimit($limit) {
			$this->db->limit($limit);
			$query = $this->db->get('contact');
			return $query->result();
		}

		public function detail($id_contact) {
                $this->db->select('*');
                $this->db->from('contact');
                $this->db->where('id',$id_contact);
                $query = $this->db->get();
			return $query->row();
		}

		public function add($data) {
			$this->db->insert('contact',$data);
		}

		public function edit($data) {
			$this->db->where('id',$data['id']);
			$this->db->update('contact',$data);
		}

		public function delete($data) {
			$this->db->where('id',$data['id']);
			$this->db->delete('contact',$data);
//			echo $this->db->last_query(); die;
		}

}