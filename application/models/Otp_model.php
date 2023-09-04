<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Otp_model extends CI_Model {
        
		public function __construct()
        {
                $this->load->database();
        }

		public function listing() {
			$query = $this->db->get('otp');
			return $query->result();
		}

		public function listingcat($catid) {
                $this->db->select('*');
                $this->db->from('otp');
                $this->db->where('catid',$catid);
                $query = $this->db->get();
			return $query->result();
		}

		public function listinglimit($limit) {
			$this->db->limit($limit);
			$this->db->order_by('id', 'DESC');
			$query = $this->db->get('otp');
			return $query->result();
		}

		public function detail($id_otp) {
                $this->db->select('*');
                $this->db->from('otp');
                $this->db->where('id',$id_otp);
                $query = $this->db->get();
			return $query->row();
		}

		public function getotp($email) {
                $this->db->select('*');
                $this->db->from('otp');
                $this->db->where('email',$email);
                $query = $this->db->get();
			return $query->row();
		}

		public function editotp($data) {
			$this->db->where('email',$data['email']);
			$this->db->update('otp',$data);
		}

		public function add($data) {
			$this->db->insert('otp',$data);
		}

		public function edit($data) {
			$this->db->where('id',$data['id']);
			$this->db->update('otp',$data);
		}

		public function emaildelete($data) {
			$this->db->where('email',$data['email']);
			$this->db->delete('otp',$data);
//			echo $this->db->last_query(); die;
		}

		public function delete($data) {
			$this->db->where('id',$data['id']);
			$this->db->delete('otp',$data);
//			echo $this->db->last_query(); die;
		}

	function lihat($sampai,$dari,$catid){
		if($catid!=0) {
	        $this->db->select('*');
	        $this->db->from('otp');
	        $this->db->where('catid',$catid);
//			$this->db->order_by('id', 'DESC');
			$this->db->limit($sampai, $dari);
			$query = $this->db->get();
//			echo $this->db->last_query(); die;
		} else {
			$this->db->order_by('id', 'DESC');
			$query = $this->db->get('otp',$sampai,$dari);
		}
		return $query->result();
	}

	function jumlah($catid){
		if($catid!=0) {
		    $this->db->select('*');
	        $this->db->from('otp');
	        $this->db->where('catid',$catid);
			$query = $this->db->get();
//			echo $this->db->last_query(); die;
		} else {
		    $this->db->select('*');
	        $this->db->from('otp');
			$query = $this->db->get();
		}
		return $query->num_rows();
	}

}