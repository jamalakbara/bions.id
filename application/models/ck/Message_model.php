<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message_model extends CI_Model {
        
		public function __construct()
        {
                $this->load->database();
        }

		public function listing() {
			$query = $this->db->get('message');
			return $query->result();
		}

		public function listbotid($botid) {
//			$query = $this->db->get('message');
//            $this->db->where('botid',$botid);
              $this->db->select('*');
                $this->db->from('message');
                $this->db->where('botid',$botid);
                $query = $this->db->get();
			return $query->result();
		}

		public function listinglimit($limit) {
			$this->db->limit($limit);
			$this->db->order_by('id', 'DESC');
			$query = $this->db->get('message');
			return $query->result();
		}

		public function detail($id_message) {
                $this->db->select('*');
                $this->db->from('message');
                $this->db->where('id',$id_message);
                $query = $this->db->get();
			return $query->row();
		}

		public function add($data) {
			$this->db->insert('message',$data);
		}

		public function edit($data) {
			$this->db->where('id',$data['id']);
			$this->db->update('message',$data);
		}

		public function delete($data) {
			$this->db->where('id',$data['id']);
			$this->db->delete('message',$data);
//			echo $this->db->last_query(); die;
		}

		public function deletebotid($data) {
			$this->db->where('botid',$data['botid']);
			$this->db->delete('message',$data);
//			echo $this->db->last_query(); die;
		}

	function lihat($sampai,$dari,$catid){
		if($catid!=0) {
	        $this->db->select('*');
	        $this->db->from('message');
	        $this->db->where('catid',$catid);
//			$this->db->order_by('id', 'DESC');
			$this->db->limit($sampai, $dari);
			$query = $this->db->get();
//			echo $this->db->last_query(); die;
		} else {
			$this->db->order_by('id', 'DESC');
			$query = $this->db->get('message',$sampai,$dari);
		}
		return $query->result();
	}

	function jumlah($catid){
		if($catid!=0) {
		    $this->db->select('*');
	        $this->db->from('message');
	        $this->db->where('catid',$catid);
			$query = $this->db->get();
//			echo $this->db->last_query(); die;
		} else {
		    $this->db->select('*');
	        $this->db->from('message');
			$query = $this->db->get();
		}
		return $query->num_rows();
	}

}