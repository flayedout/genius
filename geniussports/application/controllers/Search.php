<?php
 
class Search extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('msearch');
    }
    public function search($criteria){
        var_dump($criteria);
    }

    public function index(){
        $data = [];
       $criteria = $this->input->get('search');
       $data['search'] = $this->msearch->search($criteria);

        $data['criteria'] = $criteria;
        $this->load->template('search/index',$data);
    }
}