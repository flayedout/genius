<?php
/**
 * Created by PhpStorm.
 * User: Feebo
 * Date: 1/17/2018
 * Time: 20:21
 */

class Album extends CI_Model
{
    public function __construct(){
        $this->load->database();
    }

    public function getAllAlbums(){
        $query = $this->db
            ->select('al.name, al.id')
            ->from('album al')
            ->order_by('al.name','ASC')
            ->get();
        if ($query->result_id->num_rows > 0) {
            return $query->result_array();
        }
        return false;
    }

    public function countAlbums(){
        $query = $this->db
            ->select('COUNT(name) as count')
            ->from('album al')
            ->get();
        if ($query->result_id->num_rows > 0) {
            return $query->row();
        }
        return false;
    }

    public function getAllAlbumsByArtist($artist_name = null){
        $query = $this->db
            ->distinct()
            ->select('al.name')
            ->from('album al')
            ->join('artist ar', 'ar.id = al.artist_id')
            ->where('ar.name',$artist_name)
            ->get();
        if ($query->result_id->num_rows > 0) {
            return $query->result_array();
        }
        return false;
    }

    public function getAlbumById($id){
        $query = $this->db

            ->select('al.name as album_name, ar.name as artist_name, al.id as id')
            ->from('album al')
            ->join('artist ar', 'ar.id = al.artist_id')
            ->where('al.id',$id)
            ->get();
        if ($query->result_id->num_rows > 0) {
            return $query->row();
        }
        return false;
    }

    public function createAlbum($artist_id,$album){

        $query = $this->db
            ->select('al.name as album_name')
            ->from('album al')
            ->where('al.name',$album)
            ->get();
        if ($query->result_id->num_rows > 0) {
            return ['message'=> 'Album already exists','class'=> 'text-danger'];
        }
        $data = array(
            'name' => $album,
            'artist_id'   => $artist_id
        );

        $this->db->insert('album', $data);
        return ['message' => 'Album created successfully','class'=> 'text-success'];
    }

    public function updateAlbum($albumID,$albumName){
        $data = array(
            'name' => $albumName,
        );
        $this->db->where('id', $albumID);
        $this->db->update('album', $data);
        return ['message' => 'Album updated successfully','class'=> 'text-success'];
    }

    public function deleteAlbum($albumID){
        $result = $this->db->where('id', $albumID)
              ->delete('album');
        if($result){
            return ['message' => 'Album deleted successfully','class'=> 'text-success'];
        }
    }
}