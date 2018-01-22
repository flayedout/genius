<?php

class msearch extends CI_Model
{
    public function __construct(){
        $this->load->database();
    }
    public function search($criteria){
        $query = $this->db
            ->select('album.name as album_name,album.id as album_id')
            ->from('album')
            ->like('album.name', $criteria,'both')
            ->get();


        $query2 = $this->db
            ->select('ar.name as artist_name, al.name as album_name, ar.id as artist_id, al.id as album_id')
            ->from('artist ar')
            ->join('album al', 'ar.id = al.artist_id','left outer')
            ->like('ar.name',$criteria,'both')
            ->group_by('ar.name')
            ->group_by('al.name')
            ->order_by('ar.name','ASC')
            ->get();

        if ($query->result_id->num_rows > 0) {
             $query->result_array();
        }
        if ($query2->result_id->num_rows > 0) {
            $query2->result_array();
        }
        $data['album'] = $query->result_array();;
        $data['artist'] = $query2->result_array();;
        return $data;

    }
}