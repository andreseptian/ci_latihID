<?php

defined('BASEPATH') or exit('No direct script access allowed');

class UserController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');

        //====Allowing CORS
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Method: GET, PUT, POST, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');
    }

    public function response($data, $status = 200)
    {
        $this->output
            ->set_content_type('application/json')
            ->set_status_header($status)
            ->set_output(json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
            ->_display();

        exit;
    }

    public function save()
    {
        return $this->response($this->UserModel->save());
    }

    public function get_all()
    {
        return $this->response($this->UserModel->get());
    }

    public function get($id)
    {
        return $this->response($this->UserModel->get('id', $id));
    }

    public function delete($id)
    {
        return $this->response($this->UserModel->delete($id));
    }

    public function update($id)
    {
        $data = $this->get_input();
        return $this->response($this->UserModel->update($id, $data));
    }

    public function get_input()
    {
        return json_decode(file_get_contents('php://input'));
    }
}
