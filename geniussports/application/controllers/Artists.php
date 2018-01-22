<?php



class Artists extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('album');
        $this->load->model('artist');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index(){

        $data['artists'] = $this->artist->getAllArtists();
        $this->load->template('artists/index',$data);

    }

    public function previewArtist($artistID){
        $data['id'] = $artistID;
        $data['artist_info'] = $this->artist->getArtistById($artistID);
        $data['albums_for_artist'] = $this->artist->getAlbumsForArtist($artistID);

        $this->load->template('artists/preview',$data);
    }

    public function editArtist($album_id){
        $data = [];


        $data['artist'] = $this->artist->getArtistById($album_id);

        $this->load->template('artists/update',$data);
    }
    
    public function updateArtist(){
        $albumID = $this->input->post('artist_id');
        $artistName = $this->input->post('artist');
        $result = $this->artist->updateArtist($albumID,$artistName);
        $this->session->set_flashdata('message', $result);
        redirect('/artist/update/'.$albumID);
    }

    public function createArtist(){


        $this->form_validation->set_rules('artist', 'Artist', 'required');
        if($this->form_validation->run() == FALSE){
            $this->load->template('artists/create');
        }else{
            $artist = $this->input->post('artist');
            $result = $this->artist->createArtist($artist);
            $this->session->set_flashdata('message', $result);
            redirect('/artists');
        }
    }
    public function deleteArtist($artistID){
        $result = $this->artist->deleteArtist($artistID);
        $this->session->set_flashdata('message', $result);
        redirect('/artists');
    }
    

}