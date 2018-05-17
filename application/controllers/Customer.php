<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Customer extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Customer_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'customer/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'customer/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'customer/index.html';
            $config['first_url'] = base_url() . 'customer/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Customer_model->total_rows($q);
        $customer = $this->Customer_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'customer_data' => $customer,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('customer/customer_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Customer_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'admin_id' => $row->admin_id,
		'name' => $row->name,
		'address' => $row->address,
		'jenis_kelamin' => $row->jenis_kelamin,
		'phone' => $row->phone,
		'birthday' => $row->birthday,
		'created_at' => $row->created_at,
		'created_by' => $row->created_by,
		'updated_at' => $row->updated_at,
		'updated_by' => $row->updated_by,
	    );
            $this->load->view('customer/customer_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('customer'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('customer/create_action'),
	    'id' => set_value('id'),
	    'admin_id' => set_value('admin_id'),
	    'name' => set_value('name'),
	    'address' => set_value('address'),
	    'jenis_kelamin' => set_value('jenis_kelamin'),
	    'phone' => set_value('phone'),
	    'birthday' => set_value('birthday'),
	    'created_at' => set_value('created_at'),
	    'created_by' => set_value('created_by'),
	    'updated_at' => set_value('updated_at'),
	    'updated_by' => set_value('updated_by'),
	);
        $this->load->view('customer/customer_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'admin_id' => $this->input->post('admin_id',TRUE),
		'name' => $this->input->post('name',TRUE),
		'address' => $this->input->post('address',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'phone' => $this->input->post('phone',TRUE),
		'birthday' => $this->input->post('birthday',TRUE),
		'created_at' => $this->input->post('created_at',TRUE),
		'created_by' => $this->input->post('created_by',TRUE),
		'updated_at' => $this->input->post('updated_at',TRUE),
		'updated_by' => $this->input->post('updated_by',TRUE),
	    );

            $this->Customer_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('customer'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Customer_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('customer/update_action'),
		'id' => set_value('id', $row->id),
		'admin_id' => set_value('admin_id', $row->admin_id),
		'name' => set_value('name', $row->name),
		'address' => set_value('address', $row->address),
		'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
		'phone' => set_value('phone', $row->phone),
		'birthday' => set_value('birthday', $row->birthday),
		'created_at' => set_value('created_at', $row->created_at),
		'created_by' => set_value('created_by', $row->created_by),
		'updated_at' => set_value('updated_at', $row->updated_at),
		'updated_by' => set_value('updated_by', $row->updated_by),
	    );
            $this->load->view('customer/customer_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('customer'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'admin_id' => $this->input->post('admin_id',TRUE),
		'name' => $this->input->post('name',TRUE),
		'address' => $this->input->post('address',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'phone' => $this->input->post('phone',TRUE),
		'birthday' => $this->input->post('birthday',TRUE),
		'created_at' => $this->input->post('created_at',TRUE),
		'created_by' => $this->input->post('created_by',TRUE),
		'updated_at' => $this->input->post('updated_at',TRUE),
		'updated_by' => $this->input->post('updated_by',TRUE),
	    );

            $this->Customer_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('customer'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Customer_model->get_by_id($id);

        if ($row) {
            $this->Customer_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('customer'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('customer'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('admin_id', 'admin id', 'trim|required');
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('address', 'address', 'trim|required');
	$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
	$this->form_validation->set_rules('phone', 'phone', 'trim|required');
	$this->form_validation->set_rules('birthday', 'birthday', 'trim|required');
	$this->form_validation->set_rules('created_at', 'created at', 'trim|required');
	$this->form_validation->set_rules('created_by', 'created by', 'trim|required');
	$this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');
	$this->form_validation->set_rules('updated_by', 'updated by', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Customer.php */
/* Location: ./application/controllers/Customer.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-14 14:50:11 */
/* http://harviacode.com */