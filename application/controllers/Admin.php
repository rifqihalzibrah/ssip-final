<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function index()
    {
        $data['cars'] = $this->db->get('cars')->result_array();
        $data['types'] = $this->db->get('types')->result_array();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar');
        $this->load->view('dashboard', $data);
        $this->load->view('templates/footer');
    }

    public function users()
    {
        $data['users'] = $this->db->get('users')->result_array();
        $data['types'] = $this->db->get('types')->result_array();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar');
        $this->load->view('users', $data);
        $this->load->view('templates/footer');
    }

    public function cars()
    {
        $data['cars'] = $this->db->get('cars')->result_array();
        $data['types'] = $this->db->get('types')->result_array();

        $this->form_validation->set_rules('name', 'Car Name', 'required');
        $this->form_validation->set_rules('type', 'Type', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar');
            $this->load->view('cars', $data);
            $this->load->view('templates/footer');
        } else {

            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2048';
                $config['upload_path']   = './assets/img';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $data = [
                        'name' => $this->input->post('name'),
                        'type' => $this->input->post('type'),
                        'price' => $this->input->post('price'),
                        'image' => $new_image
                    ];
                }
            }

            $this->db->insert('cars', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Car Added!</div>');
            redirect('admin/cars');
        }
    }

    public function editCar($id)
    {
        $data['cars'] = $this->db->get('cars')->result_array();
        $data['types'] = $this->db->get('types')->result_array();

        $data['car'] = $this->db->get_where('cars', ['id' => $id])->row_array();

        $this->form_validation->set_rules('name', 'Car Name', 'required');
        $this->form_validation->set_rules('type', 'Type', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar');
            $this->load->view('cars', $data);
            $this->load->view('templates/footer');
        } else {

            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2048';
                $config['upload_path']   = './assets/img';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['car']['image'];
                    if ($old_image) {
                        unlink(FCPATH . 'assets/img/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $data = [
                        'name' => $this->input->post('name'),
                        'type' => $this->input->post('type'),
                        'price' => $this->input->post('price'),
                        'image' => $new_image
                    ];
                }
            }

            $this->db->where('id', $id);
            $this->db->update('cars', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Car Successfully Edited!</div>');
            redirect('admin/cars');
        }
    }

    public function deleteCar($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('cars');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Car deleted successfully!</div>');
        redirect('admin/cars');
    }

    public function editUser($id)
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('number', 'Number', 'required|trim|min_length[10]', ['min_length' => 'Number too short']);

        if ($this->form_validation->run() == false) {
            redirect('admin/users');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'number' => htmlspecialchars($this->input->post('number', true))
            ];

            $this->db->where('id', $id);
            $this->db->update('users', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User Successfully Edited!</div>');
            redirect('admin/users');
        }
    }

    public function deleteUser($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('users');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User deleted successfully!</div>');
        redirect('admin/users');
    }

    public function order()
    {
        $data['types'] = $this->db->get('types')->result_array();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar');
        $this->load->view('order');
        $this->load->view('templates/footer');
    }
}
