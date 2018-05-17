<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Agent extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Agent_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'agent/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'agent/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'agent/index.html';
            $config['first_url'] = base_url() . 'agent/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Agent_model->total_rows($q);
        $agent = $this->Agent_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'agent_data' => $agent,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('agent/agent_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Agent_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'agent' => $row->agent,
		'kota' => $row->kota,
		'created_at' => $row->created_at,
		'created_by' => $row->created_by,
		'updated_at' => $row->updated_at,
		'updated_by' => $row->updated_by,
	    );
            $this->load->view('agent/agent_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('agent'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('agent/create_action'),
	    'id' => set_value('id'),
	    'agent' => set_value('agent'),
	    'kota' => set_value('kota'),
	    'created_at' => set_value('created_at'),
	    'created_by' => set_value('created_by'),
	    'updated_at' => set_value('updated_at'),
	    'updated_by' => set_value('updated_by'),
	);
        $this->load->view('agent/agent_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'agent' => $this->input->post('agent',TRUE),
		'kota' => $this->input->post('kota',TRUE),
		'created_at' => $this->input->post('created_at',TRUE),
		'created_by' => $this->input->post('created_by',TRUE),
		'updated_at' => $this->input->post('updated_at',TRUE),
		'updated_by' => $this->input->post('updated_by',TRUE),
	    );

            $this->Agent_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('agent'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Agent_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('agent/update_action'),
		'id' => set_value('id', $row->id),
		'agent' => set_value('agent', $row->agent),
		'kota' => set_value('kota', $row->kota),
		'created_at' => set_value('created_at', $row->created_at),
		'created_by' => set_value('created_by', $row->created_by),
		'updated_at' => set_value('updated_at', $row->updated_at),
		'updated_by' => set_value('updated_by', $row->updated_by),
	    );
            $this->load->view('agent/agent_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('agent'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'agent' => $this->input->post('agent',TRUE),
		'kota' => $this->input->post('kota',TRUE),
		'created_at' => $this->input->post('created_at',TRUE),
		'created_by' => $this->input->post('created_by',TRUE),
		'updated_at' => $this->input->post('updated_at',TRUE),
		'updated_by' => $this->input->post('updated_by',TRUE),
	    );

            $this->Agent_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('agent'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Agent_model->get_by_id($id);

        if ($row) {
            $this->Agent_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('agent'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('agent'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('agent', 'agent', 'trim|required');
	$this->form_validation->set_rules('kota', 'kota', 'trim|required');
	$this->form_validation->set_rules('created_at', 'created at', 'trim|required');
	$this->form_validation->set_rules('created_by', 'created by', 'trim|required');
	$this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');
	$this->form_validation->set_rules('updated_by', 'updated by', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Agent.php */
/* Location: ./application/controllers/Agent.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-14 14:50:11 */
/* http://harviacode.com */