<?php
/**
 * Created by PhpStorm.
 * User: Feebo
 * Date: 1/17/2018
 * Time: 22:52
 */


class Error extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    function _404(){
        $this->load->view("errors/404");
    }
}
?>
