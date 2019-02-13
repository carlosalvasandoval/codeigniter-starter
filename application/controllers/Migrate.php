<?php

class Migrate extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('migration');
    }

    public function index()
    {
        if ($this->migration->current() === FALSE) {
            show_error($this->migration->error_string());
        } else {
            echo 'Se actualizó la ultima versión';
        }
    }

    public function drop()
    {
        if ($this->migration->version(0) === FALSE) {
            show_error($this->migration->error_string());
        }
    }
}