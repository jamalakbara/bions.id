<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider_model extends CI_Model {
        
		public function __construct()
        {
                $this->load->database();
        }

		public function listing() {
			$this->db->where('nonaktif','0');
			$query = $this->db->get('slider');
			return $query->result();
		}

		public function detail($id_slider) {
                $this->db->select('*');
                $this->db->from('slider');
                $this->db->where('id',$id_slider);
                $query = $this->db->get();
			return $query->row();
		}

		public function add($data) {
			$this->db->insert('slider',$data);
		}

		public function edit($data) {
			$this->db->where('id',$data['id']);
			$this->db->update('slider',$data);
		}

		public function delete($data) {
			$this->db->where('id',$data['id']);
			$this->db->delete('slider',$data);
//			echo $this->db->last_query(); die;
		}

}