<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model([ 'Crud_model' ]);
    }

    public function index()
    {
        $this->load->template('crud/index');
    }

    public function create()
    {
        $this->validation_rules();
        if ($this->form_validation->run() == FALSE) {
            $data = $this->load_data();
            $this->load->template('crud/create_edit', $data);
        } else {
            $data = post_mapping();
            $this->Crud_model->create($data);
            create_flash_message("Operación exitosa");
            redirect(base_url('crud/index'));
        }
    }

    public function edit($crudId)
    {
        $this->validation_rules();
        if ($this->form_validation->run() == FALSE) {
            $data = $this->load_data($crudId);
            $this->load->template('crud/create_edit', $data);
        } else {
            $data = post_mapping();
            $this->Crud_model->update($crudId, $data);
            create_flash_message("Operación exitosa");
            redirect(base_url('crud/index'));
        }
    }

    public function delete($crudId = 0)
    {
        $MetroCubicoObj = $this->Crud_model->getBy([ 'id' => $crudId ]);
        if (empty($MetroCubicoObj)) {
            create_flash_message(lang('app_msg_no_row'), 'warning');
        } else {
            $this->Crud_model->delete($crudId);
            create_flash_message(lang('app_msg_after_delete'));
        }
        redirect(base_url('crud/index'));
    }

    public function grid()
    {
        echo $this->Crud_model->grid();
    }

    private function validation_rules()
    {
        $this->form_validation->set_rules('name', 'Nombres', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('telephone', 'Teléfono', 'required|numeric');
    }

    private function load_data($crudId = 0)
    {
        $data = [
            'name'        => null,
            'email'       => null,
            'telephone'   => null,
            'description' => null,
            'img_profile' => null,
            'title'       => 'Registro de crud',
        ];

        if ($crudId != 0) {
            $crudObj = $this->Crud_model->getBy([ 'id' => $crudId ]);
            if (empty($crudObj)) {
                redirect(base_url('crud/index'));
            }
            $data['name']        = $crudObj->name;
            $data['email']       = $crudObj->email;
            $data['telephone']   = $crudObj->telephone;
            $data['description'] = $crudObj->description;
            $data['img_profile'] = $crudObj->img_profile;
            $data['title']       = 'Editar crud';
        }

        return $data;
    }

}
