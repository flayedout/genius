<?php

class Albums extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('album');
        $this->load->model('artist');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index(){

        $data['albums'] = $this->album->getAllAlbums();
        $data['total_albums'] = $this->album->countAlbums();
        $this->load->template('albums/index',$data);

    }
    
    public function createAlbum(){
        $data['artists'] = $this->artist->getAllArtists();
        $this->form_validation->set_rules('album', 'Album', 'required');
        $this->form_validation->set_rules('artist', 'Artist', 'required');
        if($this->form_validation->run() == FALSE){
            $this->load->template('albums/create',$data);
        }else{
            $artist_id = $this->input->post('artist');
            $album_name = $this->input->post('album');
            $result = $this->album->createAlbum($artist_id,$album_name);
            $this->session->set_flashdata('message', $result);
            redirect('/albums/create');
        }
    }
    
    public function editAlbum($album_id){
        $data = [];
        $data['artists'] = $this->artist->getAllArtists();

        $data['current_album'] = $this->album->getAlbumById($album_id);

        $this->load->template('albums/update',$data);
    }

    public function updateAlbum(){
        $albumID = $this->input->post('album_id');
        $albumName = $this->input->post('album');
        $result = $this->album->updateAlbum($albumID,$albumName);
        $this->session->set_flashdata('message', $result);
        redirect('/album/update/'.$albumID);
    }

    public function deleteAlbum($albumID){
        $result = $this->album->deleteAlbum($albumID);
        $this->session->set_flashdata('message', $result);
        redirect('/albums');
    }

    public function removeAlbum(){
        
    }

    public function previewAlbum($album_id){
        $data['id'] = $album_id;
        $data['album_info'] = $this->album->getAlbumById($album_id);

        $this->load->template('albums/preview',$data);
    }

    public function showAlbumByArtist(){
        var_dump($this->album->getAllAlbums('The Rolling Stones'));
    }
}