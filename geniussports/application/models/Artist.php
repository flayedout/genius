<?php


class Artist extends CI_Model
{
    public function __construct(){
        $this->load->database();
    }
    
    public function getAllArtists(){
        $query = $this->db
            ->select('ar.name, ar.id')
            ->from('artist ar')
            ->order_by('ar.name','ASC')
            ->get();
        if ($query->result_id->num_rows > 0) {
            return $query->result_array();
        }
        return false;
    }

    public function getArtistById($artist_id){
        $query = $this->db

            ->select('ar.name, ar.id')
            ->from('artist ar')

            ->where('ar.id',$artist_id)


            ->get();
        if ($query->result_id->num_rows > 0) {
            return $query->row();
        }
        return false;
    }

    public function getAlbumsForArtist($artistID){
        $query = $this->db
            ->select('al.name')
            ->from('album al')
            ->join('artist ar', 'ar.id = al.artist_id')
            ->where('ar.id',$artistID)
            ->group_by('al.name')
            ->get();
        if ($query->result_id->num_rows > 0) {
            return $query->result_array();
        }
        return false;
    }

    public function updateArtist($albumID,$artistName){
        $data = array(
            'name' => $artistName,
        );
        $this->db->where('id', $albumID);
        $this->db->update('artist', $data);
        return ['message' => 'Artist updated successfully','class'=> 'text-success'];
    }

    public function createArtist($artist){
        $query = $this->db
            ->select('ar.name')
            ->from('artist ar')
            ->where('ar.name',$artist)
            ->get();
        if ($query->result_id->num_rows > 0) {
            return ['message'=> 'Artist already exists','class'=> 'text-danger'];
        }
        $data = array(
            'name' => $artist,

        );

        $this->db->insert('artist', $data);
        return ['message' => 'Artist created successfully','class'=> 'text-success'];
    }

    public function deleteArtist($artistID){
        $result = $this->db->where('id', $artistID)
            ->delete('artist');
        if($result){
            return ['message' => 'Artist deleted successfully','class'=> 'text-success'];
        }
    }

    public function getArtistsWithAlbumsAscending(){
        $query = $this->db
            ->select('ar.name,COUNT(al.name) as total_albums')
            ->from('artist ar')
            ->join('album al', 'ar.id = al.artist_id')
            ->group_by('ar.name')
            ->order_by('ar.name','ASC')
            ->get();
        if ($query->result_id->num_rows > 0) {
            return $query->result();
        }
        return false;
    }

    public function getArtistsWithoutAlbums(){
        $query = $this->db
            ->select('ar.name as artist, COUNT(al.name) as total_albums')
            ->from('artist ar')
            ->join('album al', 'ar.id = al.artist_id','left outer')
            ->group_by('ar.name')
            ->where('al.name IS NULL')

            ->get();
        if ($query->result_id->num_rows > 0) {
            return $query->result();
        }
        return false;
    }
//SELECT ar.name, COUNT(al.name) as total_albums FROM
//
//artist as ar  INNER JOIN album as al
//
//on ar.id = al.artist_id
//
//GROUP BY ar.name
//ORDER BY ar.name ASC

}