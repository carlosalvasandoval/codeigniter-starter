<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model
{

    protected $table;

    public function __construct()
    {
        parent::__construct();
    }

    public function create($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function create_batch($data)
    {
        $this->db->insert_batch($this->table, $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id)
            ->delete($this->table);
    }

    public function getBy($where)
    {
        return $this->db
                ->where($where)
                ->get($this->table)
                ->row();
    }

    public function getAllBy($where)
    {
        return $this->db
                ->where($where)
                ->get($this->table)
                ->resutl();
    }

}
