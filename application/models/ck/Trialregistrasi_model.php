<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trialregistrasi_model extends CI_Model {
        
		public function __construct()
        {
                $this->load->database();
        }

		public function listing() {
			$query = $this->db->get('trialregistrasi');
			return $query->result();
		}

		public function listingcat($catid) {
                $this->db->select('*');
                $this->db->from('trialregistrasi');
                $this->db->where('catid',$catid);
                $query = $this->db->get();
			return $query->result();
		}

		public function listinglimit($limit) {
			$this->db->limit($limit);
			$this->db->order_by('id', 'DESC');
			$query = $this->db->get('trialregistrasi');
			return $query->result();
		}

		public function detail($id_trialregistrasi) {
                $this->db->select('*');
                $this->db->from('trialregistrasi');
                $this->db->where('id',$id_trialregistrasi);
                $query = $this->db->get();
			return $query->row();
		}

		public function gettrialregistrasi($email) {
                $this->db->select('*');
                $this->db->from('trialregistrasi');
                $this->db->where('email',$email);
                $query = $this->db->get();
			return $query->row();
		}

		public function edittrialregistrasi($data) {
			$this->db->where('email',$data['email']);
			$this->db->update('trialregistrasi',$data);
		}

		public function add($data) {
			$this->db->insert('trialregistrasi',$data);
		}

		public function edit($data) {
			$this->db->where('id',$data['id']);
			$this->db->update('trialregistrasi',$data);
		}

		public function delete($data) {
			$this->db->where('id',$data['id']);
			$this->db->delete('trialregistrasi',$data);
//			echo $this->db->last_query(); die;
		}

	function lihat($sampai,$dari,$catid){
		if($catid!=0) {
	        $this->db->select('*');
	        $this->db->from('trialregistrasi');
	        $this->db->where('catid',$catid);
//			$this->db->order_by('id', 'DESC');
			$this->db->limit($sampai, $dari);
			$query = $this->db->get();
//			echo $this->db->last_query(); die;
		} else {
			$this->db->order_by('id', 'DESC');
			$query = $this->db->get('trialregistrasi',$sampai,$dari);
		}
		return $query->result();
	}

	function jumlah($catid){
		if($catid!=0) {
		    $this->db->select('*');
	        $this->db->from('trialregistrasi');
	        $this->db->where('catid',$catid);
			$query = $this->db->get();
//			echo $this->db->last_query(); die;
		} else {
		    $this->db->select('*');
	        $this->db->from('trialregistrasi');
			$query = $this->db->get();
		}
		return $query->num_rows();
	}

}