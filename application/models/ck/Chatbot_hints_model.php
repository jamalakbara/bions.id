<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chatbot_hints_model extends CI_Model {
        
		public function __construct()
        {
                $this->load->database();
        }

		public function listing() {
			$query = $this->db->get('chatbot_hints');
			return $query->result();
		}

		public function listingcat($catid) {
                $this->db->select('*');
                $this->db->from('chatbot_hints');
                $this->db->where('catid',$catid);
                $query = $this->db->get();
			return $query->result();
		}

		public function listinglimit($limit) {
			$this->db->limit($limit);
			$this->db->order_by('id', 'DESC');
			$query = $this->db->get('chatbot_hints');
			return $query->result();
		}

		public function detail($id_chatbot_hints) {
                $this->db->select('*');
                $this->db->from('chatbot_hints');
                $this->db->where('id',$id_chatbot_hints);
                $query = $this->db->get();
			return $query->row();
		}

		public function getchatbot_hints($email) {
                $this->db->select('*');
                $this->db->from('chatbot_hints');
                $this->db->where('email',$email);
                $query = $this->db->get();
			return $query->row();
		}

		public function editchatbot_hints($data) {
			$this->db->where('email',$data['email']);
			$this->db->update('chatbot_hints',$data);
		}

		public function add($data) {
			$this->db->insert('chatbot_hints',$data);
		}

		public function edit($data) {
			$this->db->where('id',$data['id']);
			$this->db->update('chatbot_hints',$data);
		}

		public function delete($data) {
			$this->db->where('id',$data['id']);
			$this->db->delete('chatbot_hints',$data);
//			echo $this->db->last_query(); die;
		}

	function lihat($sampai,$dari,$catid){
		if($catid!=0) {
	        $this->db->select('*');
	        $this->db->from('chatbot_hints');
	        $this->db->where('catid',$catid);
//			$this->db->order_by('id', 'DESC');
			$this->db->limit($sampai, $dari);
			$query = $this->db->get();
//			echo $this->db->last_query(); die;
		} else {
			$this->db->order_by('id', 'DESC');
			$query = $this->db->get('chatbot_hints',$sampai,$dari);
		}
		return $query->result();
	}

	function jumlah($catid){
		if($catid!=0) {
		    $this->db->select('*');
	        $this->db->from('chatbot_hints');
	        $this->db->where('catid',$catid);
			$query = $this->db->get();
//			echo $this->db->last_query(); die;
		} else {
		    $this->db->select('*');
	        $this->db->from('chatbot_hints');
			$query = $this->db->get();
		}
		return $query->num_rows();
	}

}