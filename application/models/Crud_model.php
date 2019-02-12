<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Crud_model extends MY_Model
{

    protected $table = 'crud';

    public function __construct()
    {
        parent::__construct();
    }

    public function grid()
    {
        $this->datatables->setSelect("name, email, telephone, id");
        $this->datatables->setFrom("crud");
        return $this->datatables->getData();
    }

}
