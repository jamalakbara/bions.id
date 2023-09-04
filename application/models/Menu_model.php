<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model {
        
		public function __construct()
        {
                $this->load->database();
        }

		public function listing() {
			$query = $this->db->get('menu');
			return $query->result();
		}

		public function getchild($parentid) {
            $this->db->select('*');
            $this->db->from('menu');
            $this->db->where('parentid',$parentid);
			$query = $this->db->get();
			return $query->result();
		}

		public function countchild($match) {
			$this->db->like('parentid', $match);
			$this->db->from('menu');
			return $this->db->count_all_results();
		}

		public function detail($id) {
                $this->db->select('*');
                $this->db->from('menu');
                $this->db->where('id',$id);
                $query = $this->db->get();
			return $query->row();
		}

		public function detailwheretitle($str) {
                $this->db->select('*');
                $this->db->from('menu');
                $this->db->like('title',$str);
                $query = $this->db->get();
			return $query->row();
		}

		public function listingmenutype($type) {
                $this->db->select('*');
                $this->db->from('menu');
                $this->db->where('menutype',$type);
                $query = $this->db->get();
//				echo $this->db->last_query(); die;
			return $query->result();
		}

		public function listingmenutypein($type) {
                $this->db->select('*');
                $this->db->from('menu');
                $this->db->where_in('menutype',$type);
                $query = $this->db->get();
//				echo $this->db->last_query(); die;
			return $query->result();
		}

		public function add($data) {
			$this->db->insert('menu',$data);
		}

		public function edit($data) {
			$this->db->where('id',$data['id']);
			$this->db->update('menu',$data);
		}

		public function delete($data) {
			$this->db->where('id',$data['id']);
			$this->db->delete('menu',$data);
//			echo $this->db->last_query(); die;
		}

		function cek_login($table,$where){		
//			return $this->db->get_where($table,$where);
			$query = $this->db->get_where($table,$where);
			return $query->row();
		}

		function get_data($table,$where){		
//			return $this->db->get_where($table,$where);
			$query = $this->db->get_where($table,$where);
			return $query->row();
		}

		function get_data_all($table,$where){		
//			return $this->db->get_where($table,$where);
			$query = $this->db->get_where($table,$where);
			return $query->result();
//			echo $this->db->last_query(); die;
		}

		function count_data($table,$wherefield,$wherevalue){		
//			return $this->db->get_where($table,$where);
//			$query = $this->db->get_where($table,$where);
			$this->db->where($wherefield,$wherevalue);
			$this->db->from($table);
			return $this->db->count_all_results();
		}

		function count_data_all($table,$where){		
//			return $this->db->get_where($table,$where);
			$query = $this->db->get_where($table,$where);
//			$this->db->from($table);
//			echo $this->db->last_query();
			return $query->num_rows();
//			return $this->db->count_all_results();
		}
		
		function count_data_query($table,$where){
			return $this->db->query('SELECT COUNT( * ) AS total FROM st_'.$table.' WHERE '.$where);
		}
		function ambilcs(){		
                $this->db->select('*');
                $this->db->from('menu');
                $this->db->where('id != ',$this->session->menudata('menuid'));
                $this->db->where('menutype','63');
                $query = $this->db->get();
			return $query->result();
		}

		function ambilpelanggan(){		
                $this->db->select('*');
                $this->db->from('menu');
                $this->db->where('id != ',$this->session->menudata('menuid'));
                $this->db->where('menutype','0');
                $query = $this->db->get();
//				echo $this->db->last_query(); die;
			return $query->result();
		}

}