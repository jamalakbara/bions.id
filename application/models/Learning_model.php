<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Learning_model extends CI_Model {
        
		public function __construct()
        {
                $this->load->database();
                $this->load->helper("titlegenerator_helper");
        }

		public function listing() {
            $this->db->order_by('tanggal', 'DESC');
            $this->db->order_by('id', 'DESC');
			$query = $this->db->get('learning');
			return $query->result();
		}

		public function listingcat($catid) {
                $this->db->select('*');
                $this->db->from('learning');
                $this->db->where('catid',$catid);
                $this->db->order_by('tanggal', 'DESC');
                $this->db->order_by('id', 'DESC');
                $query = $this->db->get();
			return $query->result();
		}

		public function listinglimit($limit) {
			$this->db->limit($limit);
			$this->db->order_by('id', 'DESC');
			$query = $this->db->get('learning');
			return $query->result();
		}

		public function detail($id_learning) {
                $this->db->select('*');
                $this->db->from('learning');
                $this->db->where('id',$id_learning);
                $query = $this->db->get();
			return $query->row();
		}

		public function detailurl($url) {
                $this->db->select('*');
                $this->db->from('learning');
                $this->db->where('url',$url);
                $query = $this->db->get();
			return $query->row();
		}

		public function detailurlbycatid($catid, $url) {
			$array = array('url' => $url, 'catid' => $catid);

			$this->db->select('*');
			$this->db->from('learning');
			$this->db->where($array);
			$query = $this->db->get();
			return $query->row();
		}

		public function add($data) {
		    $baseurl = convertTitleToURL($data['meta_slug']);
		    $url = $baseurl;
		    
		    //check url available
		    // $counter = 1;
		    // do{
		    // 	if($counter > 1){
		    // 		$url = $baseurl . $counter;
		    // 	} 

			//     $this->db->select('*');
		    //     $this->db->from('learning');
		    //     $this->db->where('url',$url);
		    //     $query = $this->db->get();

		    //     $counter++;

		    // } while ($query->num_rows() > 0);

		    $data['url'] = $url;
			$this->db->insert('learning',$data);
		}

		public function edit($data) {
			$baseurl = convertTitleToURL($data['meta_slug']);
		    $url = $baseurl;
		    
		    //check url available
		    // $counter = 1;
		    // do{
		    // 	if($counter > 1){
		    // 		$url = $baseurl . $counter;
		    // 	} 

			//     $this->db->select('*');
		    //     $this->db->from('learning');
		    //     $this->db->where('url',$url);
		    //     $query = $this->db->get();

		    //     $counter++;

		    // } while ($query->num_rows() > 0);

		    $data['url'] = $url;
		    
			$this->db->where('id',$data['id']);
			$this->db->update('learning',$data);
		}

		public function delete($data) {
			$this->db->where('id',$data['id']);
			$this->db->delete('learning',$data);
//			echo $this->db->last_query(); die;
		}

	function lihat($sampai,$dari,$catid){
		if($catid!=0) {
	        $this->db->select('*');
	        $this->db->from('learning');
	        $this->db->where('catid',$catid);
            $this->db->order_by('tanggal', 'DESC');
			$this->db->order_by('id', 'DESC');
			$this->db->limit($sampai, $dari);
			$query = $this->db->get();
//			echo $this->db->last_query(); die;
		} else {
			$this->db->order_by('id', 'DESC');
			$query = $this->db->get('learning',$sampai,$dari);
		}
		return $query->result();
	}

	function jumlah($catid){
		if($catid!=0) {
		    $this->db->select('*');
	        $this->db->from('learning');
	        $this->db->where('catid',$catid);
			$query = $this->db->get();
//			echo $this->db->last_query(); die;
		} else {
		    $this->db->select('*');
	        $this->db->from('learning');
			$query = $this->db->get();
		}
		return $query->num_rows();
	}

	function lihatsearch($sampai,$dari,$search,$catid){
		if($catid!=0) {
	        $this->db->select('*');
	        $this->db->from('learning');
			$this->db->like('LOWER(text)',strtolower($search),'both');
	        $this->db->where('catid',$catid);
            $this->db->order_by('tanggal', 'DESC');
			$this->db->order_by('id', 'DESC');
			$this->db->limit($sampai, $dari);
			$query = $this->db->get();
//			echo $this->db->last_query(); die;
		} else {
			$this->db->order_by('id', 'DESC');
			$query = $this->db->get('learning',$sampai,$dari);
		}
		return $query->result();
	}

	function jumlahsearch($search,$catid){
		if($catid!=0) {
		    $this->db->select('*');
	        $this->db->from('learning');
			$this->db->like('LOWER(text)',strtolower($search),'both');
	        $this->db->where('catid',$catid);
			$query = $this->db->get();
//			echo $this->db->last_query(); die;
		} else {
		    $this->db->select('*');
	        $this->db->from('learning');
			$query = $this->db->get();
		}
		return $query->num_rows();
	}

	function synctitle(){
		$this->db->select('*');
        $this->db->from('learning');
		$query = $this->db->get();
		foreach ($query->result() as $row)
		{	
			$id = $row->id;
		    $baseurl = convertTitleToURL($row->title);
		    $url = $baseurl;
		    
		    //check url available
		    $counter = 1;
		    do{
		    	if($counter > 1){
		    		$url = $baseurl . $counter;
		    	} 

			    $this->db->select('*');
		        $this->db->from('learning');
		        $this->db->where('url',$url);
		        $query = $this->db->get();

		        $counter++;

		    } while ($query->num_rows() > 0);

		    //update database
		    $this->db->where('id', $id);
			$this->db->update('learning',array('url' => $url));
		}

		return true;
	}

	function get_LearningDatasByUrl($postData){
		$baseurl = convertTitleToURL($postData);
		$url = $baseurl;

		$this->db->select('*');
		$this->db->from('learning');
		$this->db->where('url',$url);
		$query = $this->db->get();

		return $query->result();
	}

}
