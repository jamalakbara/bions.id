<?phpdefined('BASEPATH') OR exit('No direct script access allowed');
class Tabel_model extends CI_Model {
		public function __construct()
        {
                $this->load->database();
        }
		public function listing($table) {
			$query = $this->db->get($table);
			return $query->result();
		}

		public function listdata($table,$field,$id) {            $this->db->where($field,$id);
			$query = $this->db->get($table);
//			echo $this->db->last_query(); die;
			return $query->result();
		}		public function listwhere($table,$where) {            $this->db->where($where);			$query = $this->db->get($table);//			echo $this->db->last_query(); die;			return $query->result();		}

		public function listdatawhere($table,$field1,$id1,$field2,$id2) {
            $this->db->where($field1,$id1);
            $this->db->where($field2,$id2);
			 $query = $this->db->get($table);
//			echo $this->db->last_query(); die;
			return $query->result();
		}

		public function listbetweendate($table,$field,$date1,$date2) {            $this->db->where(' '.$field.' BETWEEN "'.$date1.'" AND "'.$date2.'"', '',false);
			$query = $this->db->get($table);
			//echo $this->db->last_query(); die;
			return $query->result();
		}    function searchtgl($table1,$start_date,$end_date)    {		if($start_date == $end_date) {			$this->db->where('`tanggal` BETWEEN "'. date('Y-m-d H:i:s', strtotime($start_date)). '" and "'. date('Y-m-d H:i:s', strtotime($end_date)+ 86400).'"');		} else {			$this->db->where('`tanggal` BETWEEN "'. date('Y-m-d H:i:s', strtotime($start_date)). '" and "'. date('Y-m-d H:i:s', strtotime($end_date)).'"');//            $this->db->where(' tanggal BETWEEN "'.$start_date.'" AND "'.$end_date.'"', '',true);//			$this->db->where('tanggal >=',$start_date);//			$this->db->where('tanggal <=',$start_date);//			$this->db->where('`tanggal` BETWEEN "'.$start_date.'" and "'.$end_date.'"');		}        $query  =   $this->db->get($table1);//		echo $this->db->last_query(); die;        return $query->result();    }    public function listbytgl($table1,$fieldtgl,$start_date,$end_date,$where=null)    {		$this->db->where($fieldtgl.' BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"'.$where);        $query  =   $this->db->get($table1);        return $query->result();    }

		public function listbetweendateandwhere($table,$field,$date1,$date2,$field2=null,$where=null) {
            $this->db->where(' '.$field.' BETWEEN "'.$date1.'" AND "'.$date2.'"', '',false);
			if($field2) {
				$this->db->where($field2,$where);
			}
			$query = $this->db->get($table);
			//echo $this->db->last_query(); die;
			return $query->result();
		}

		public function listdatawherejoin($table1,$field1=null,$id1=null,$field2=null,$id2=null) {
			$this->db->select($table1.'.*'); // Select field
			$this->db->from($table1); // from Table1
			$this->db->join('users',$table1.'.userid = users.id','INNER'); // Join table1 with table2 based on the foreign key
			if($field1) {
				$this->db->where($field1,$id1);
			}
			if($field2) {
				$this->db->where($field2,$id2);
			}
			$query = $this->db->get();
//			echo $this->db->last_query(); die;
			return $query->result();
		}		public function listbytgldatawherejoin($table1,$fieldtgl,$start_date,$end_date,$field1=null,$id1=null,$field2=null,$id2=null) {			$this->db->select($table1.'.*'); // Select field			$this->db->from($table1); // from Table1			$this->db->join('users',$table1.'.userid = users.id','INNER'); // Join table1 with table2 based on the foreign key			if($field1) {				$this->db->where($field1,$id1);			}			if($field2) {				$this->db->where($field2,$id2);			}			$this->db->where($table1.'.'.$fieldtgl.' BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');			$query = $this->db->get();//			echo $this->db->last_query(); die;			return $query->result();		}

    public function get_master(){

        $this->db->select('*');
        $this->db->from('ak_master_akun');
        $this->db->where('parentid', 0);
        $parent = $this->db->get();       
        $categories = $parent->result();
        return $categories;
    }

    public function get_lastchilds(){

        $this->db->select('c1.*');
        $this->db->from('ak_master_akun c1');
		$this->db->join('ak_master_akun c2','c1.id = c2.parentid','Left');
        $this->db->where('c1.parentid >', 0);
        $this->db->where('c2.id',null);
        $this->db->order_by('c2.kode_account','ASC');
        $parent = $this->db->get();       
//        $query = $this->db->query('SELECT * FROM st_ak_master_akun as c1 left join st_ak_master_akun as c2 on c1.id = c2.parentid where c1.parentid > 0 AND c2.id is null');       
//echo $this->db->last_query(); die;
		return $parent->result();
    }

    public function get_categories(){

        $this->db->select('*');
        $this->db->from('ak_master_akun');
        $this->db->where('parentid', 0);

        $parent = $this->db->get();
        
        $categories = $parent->result();
        $i=0;
        foreach($categories as $p_cat){

            $categories[$i]->sub = $this->sub_categories($p_cat->id);
//            $categories[$i] = $this->sub_categories($p_cat->id);
            $i++;
        }
        return $categories;
    }

    public function sub_categories($id){

        $this->db->select('*');
        $this->db->from('ak_master_akun');
        $this->db->where('parentid', $id);

        $child = $this->db->get();
        $categories = $child->result();
        $i=0;
        foreach($categories as $p_cat){

            $categories[$i]->sub = $this->sub_categories($p_cat->id);
//            $categories[$i] = $this->sub_categories($p_cat->id);
            $i++;
        }
        return $categories;       
    }

		public function getchild($table,$parentid) {
            $this->db->select('*');
            $this->db->from($table);
            $this->db->where('parentid',$parentid);
			$query = $this->db->get();
			return $query->result();
		}

		public function detail($table,$id) {
                $this->db->select('*');
                $this->db->from($table);if($table == 'country') {
                $this->db->where('country_id',$id);} else {                $this->db->where('id',$id);}
                $query = $this->db->get();
			return $query->row();
		}

		public function detaildata($table,$id) {
                $this->db->select('*');
                $this->db->from($table);
                $this->db->where('id',$id);
                $query = $this->db->get();
//				echo $this->db->last_query(); die;
			return $query->row();
		}		public function detailwhere($table,$where) {                $this->db->select('*');                $this->db->from($table);                $this->db->where($where);                $query = $this->db->get();//				echo $this->db->last_query(); die;			return $query->row();		}

		public function marshadata($table,$marsha) {
                $this->db->select('*');
                $this->db->from($table);
                $this->db->where('marsha',$marsha);
                $query = $this->db->get();
			return $query->row();
		}

		public function cekfield($table,$field,$id) {
                $this->db->select('*');
                $this->db->from($table);
                $this->db->where($field,$id);
                $query = $this->db->get();
//				echo $this->db->last_query(); die;
			return $query->row();
		}
		public function cekfield2($table,$field,$id,$field2,$id2) {                $this->db->select('*');                $this->db->from($table);                $this->db->where($field,$id);                $this->db->where($field2,$id2);				$query = $this->db->get();//				echo $this->db->last_query(); die;			return $query->row();		}		public function cekfield3($table,$field,$id,$field2,$id2,$field3,$id3) {                $this->db->select('*');                $this->db->from($table);                $this->db->where($field,$id);                $this->db->where($field2,$id2);                $this->db->where($field3,$id3);				$query = $this->db->get();//				echo $this->db->last_query(); die;			return $query->row();		}
		public function cekfieldtower($table,$field1,$id1,$field2,$id2) {
                $this->db->select('*');
                $this->db->from($table);
                $this->db->where($field1,$id1);
                $this->db->where($field2,$id2);
                $query = $this->db->get();
//				echo $this->db->last_query(); die;
			return $query->row();
		}

		public function cekfieldlantai($table,$field1,$id1,$field2,$id2,$field3,$id3) {
                $this->db->select('*');
                $this->db->from($table);
                $this->db->where($field1,$id1);
                $this->db->where($field2,$id2);
                $this->db->where($field3,$id3);
                $query = $this->db->get();
//				echo $this->db->last_query(); die;
			return $query->row();
		}

		public function cekfieldunit($table,$field1,$id1,$field2,$id2,$field3,$id3,$field4,$id4) {
                $this->db->select('*');
                $this->db->from($table);
                $this->db->where($field1,$id1);
                $this->db->where($field2,$id2);
                $this->db->where($field3,$id3);
                $this->db->where($field4,$id4);
                $query = $this->db->get();
//				echo $this->db->last_query(); die;
			return $query->row();
		}

		public function add($table,$data) {
			$this->db->insert($table,$data);
		}

		public function edit($table,$data) {
			$this->db->where('id',$data['id']);
			$this->db->update($table,$data);
//			echo $this->db->last_query(); die;
		}

		public function edit2($table,$ifwhere,$ifwhere2,$data) {
			$this->db->where($ifwhere,$ifwhere2);
			$this->db->update($table,$data);
//			echo $this->db->last_query(); die;
		}
		
		
		public function delete($table,$data) {
			$this->db->where('id',$data['id']);
			$this->db->delete($table,$data);
//			echo $this->db->last_query(); die;
		}

		public function getlastinsert() {
					return $this->db->insert_id();
		}

		public function lastid($table) {
            $this->db->select('*');
            $this->db->from($table);
			$this->db->order_by('id', 'DESC');
			$this->db->limit(1); 
			$query = $this->db->get();
			return $query->row();
		}		public function lastidwhere($table,$ifwhere,$where) {            $this->db->select('*');            $this->db->from($table);			$this->db->order_by('id', 'DESC');			$this->db->limit(1);			$this->db->where($ifwhere,$where);			$query = $this->db->get();//			echo $this->db->last_query(); die;			return $query->row();		}

		public function lastnourut($table) {
            $this->db->select('*');
            $this->db->from($table);
			$this->db->order_by('nourut', 'DESC');
			$this->db->limit(1); 
			$query = $this->db->get();
			return $query->result();
		}

		public function export_data($table,$where=null){
			if($where) {
				$query = $this->db->query("SELECT * from ".$table." WHERE ".$where);
			} else {
				$query = $this->db->query("SELECT * from ".$table);
			}
			if($query->num_rows() > 0){
				foreach($query->result() as $data){
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
		public function emptytable($table) {
			$this->db->empty_table($table);
//			$this->db->query("TRUNCATE " . $table);
//			$this->db->query("ALTER TABLE ".$table." AUTO_INCREMENT = 1");
		}

		public function deletewhere($table,$field,$cond) {
			$this->db->where($field,$cond);
			$this->db->delete($table);
			$this->db->select_max('id');
			$number = $this->db->get($table)->row();
//			$number = $this->db->query("SELECT MAX( `id` ) FROM st_" . $table);
			$this->db->query("ALTER TABLE st_".$table." AUTO_INCREMENT = ".$number->id);
		}
		public function detailcountry($table,$id) {                $this->db->select('*');                $this->db->from($table);                $this->db->where('iso',$id);                $query = $this->db->get();//				echo $this->db->last_query(); die;			return $query->row();		}
}