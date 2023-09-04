<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articles_model extends CI_Model {
        
		public function __construct()
        {
                $this->load->database();
        }

		public function listing() {
			$query = $this->db->get('articles');
			return $query->result();
		}

		public function listinglimit($limit) {
			$this->db->limit($limit);
			$this->db->order_by('id', 'DESC');
			$query = $this->db->get('articles');
			return $query->result();
		}

		public function detail($id_articles) {
                $this->db->select('*');
                $this->db->from('articles');
                $this->db->where('id',$id_articles);
                $query = $this->db->get();
			return $query->row();
		}

		public function add($data) {
			$this->db->insert('articles',$data);
		}

		public function edit($data) {
			$this->db->where('id',$data['id']);
			$this->db->update('articles',$data);
		}

		public function delete($data) {
			$this->db->where('id',$data['id']);
			$this->db->delete('articles',$data);
//			echo $this->db->last_query(); die;
		}

	function lihat($sampai,$dari,$catid){
		if($catid!=0) {
	        $this->db->select('*');
	        $this->db->from('articles');
	        $this->db->where('catid',$catid);
//			$this->db->order_by('id', 'DESC');
			$this->db->limit($sampai, $dari);
			$query = $this->db->get();
//			echo $this->db->last_query(); die;
		} else {
			$this->db->order_by('id', 'DESC');
			$query = $this->db->get('articles',$sampai,$dari);
		}
		return $query->result();
	}

	function jumlah($catid){
		if($catid!=0) {
		    $this->db->select('*');
	        $this->db->from('articles');
	        $this->db->where('catid',$catid);
			$query = $this->db->get();
//			echo $this->db->last_query(); die;
		} else {
		    $this->db->select('*');
	        $this->db->from('articles');
			$query = $this->db->get();
		}
		return $query->num_rows();
	}

}