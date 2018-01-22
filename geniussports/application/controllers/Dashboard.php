<?php


class Dashboard extends CI_Controller
{

    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('album');
        $this->load->model('artist');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
    }
    public function index(){
        $data['artists_albums'] = $this->artist->getArtistsWithAlbumsAscending();

        $data['artists_without_albums'] = $this->artist->getArtistsWithoutAlbums();


        $this->load->template('overview/index',$data);

    }
}