<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner_model extends CI_Model {
        
		public function __construct()
        {
                $this->load->database();
        }

		public function listing() {
			$query = $this->db->get('banner');
			return $query->result();
		}

		public function listinglimit($limit) {
			$this->db->limit($limit);
			$this->db->order_by('id', 'DESC');
			$query = $this->db->get('banner');
			return $query->result();
		}

		public function detail($id_banner) {
                $this->db->select('*');
                $this->db->from('banner');
                $this->db->where('id',$id_banner);
                $query = $this->db->get();
			return $query->row();
		}

		public function add($data) {
			$this->db->insert('banner',$data);
		}

		public function edit($data) {
			$this->db->where('id',$data['id']);
			$this->db->update('banner',$data);
		}

		public function delete($data) {
			$this->db->where('id',$data['id']);
			$this->db->delete('banner',$data);
//			echo $this->db->last_query(); die;
		}

	function lihat($sampai,$dari,$catid){
		if($catid!=0) {
	        $this->db->select('*');
	        $this->db->from('banner');
	        $this->db->where('catid',$catid);
//			$this->db->order_by('id', 'DESC');
			$this->db->limit($sampai, $dari);
			$query = $this->db->get();
//			echo $this->db->last_query(); die;
		} else {
			$this->db->order_by('id', 'DESC');
			$query = $this->db->get('banner',$sampai,$dari);
		}
		return $query->result();
	}

	function jumlah($catid){
		if($catid!=0) {
		    $this->db->select('*');
	        $this->db->from('banner');
	        $this->db->where('catid',$catid);
			$query = $this->db->get();
//			echo $this->db->last_query(); die;
		} else {
		    $this->db->select('*');
	        $this->db->from('banner');
			$query = $this->db->get();
		}
		return $query->num_rows();
	}

}