<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages_model extends CI_Model {
        
		public function __construct()
        {
                $this->load->database();
        }

		public function listing() {
			$query = $this->db->get('pages');
			return $query->result();
		}

		public function listinglimit($limit) {
			$this->db->limit($limit);
			$this->db->order_by('id', 'DESC');
			$query = $this->db->get('pages');
			return $query->result();
		}

		public function detail($id_pages) {
                $this->db->select('*');
                $this->db->from('pages');
                $this->db->where('id',$id_pages);
                $query = $this->db->get();
			return $query->row();
		}

		public function add($data) {
			$this->db->insert('pages',$data);
		}

		public function edit($data) {
			$this->db->where('id',$data['id']);
			$this->db->update('pages',$data);
		}

		public function delete($data) {
			$this->db->where('id',$data['id']);
			$this->db->delete('pages',$data);
//			echo $this->db->last_query(); die;
		}

	function lihat($sampai,$dari,$catid){
		if($catid!=0) {
	        $this->db->select('*');
	        $this->db->from('pages');
	        $this->db->where('catid',$catid);
//			$this->db->order_by('id', 'DESC');
			$this->db->limit($sampai, $dari);
			$query = $this->db->get();
//			echo $this->db->last_query(); die;
		} else {
			$this->db->order_by('id', 'DESC');
			$query = $this->db->get('pages',$sampai,$dari);
		}
		return $query->result();
	}

	function jumlah($catid){
		if($catid!=0) {
		    $this->db->select('*');
	        $this->db->from('pages');
	        $this->db->where('catid',$catid);
			$query = $this->db->get();
//			echo $this->db->last_query(); die;
		} else {
		    $this->db->select('*');
	        $this->db->from('pages');
			$query = $this->db->get();
		}
		return $query->num_rows();
	}

}