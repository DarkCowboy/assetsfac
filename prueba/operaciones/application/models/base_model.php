<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Base_Model extends CI_Model {

	public $table_schema;
	private $schema;

	public function __construct() {
		$this->load->database();
	}

	public function get_schema($table) {
		if (!is_object($this->schema)) {
			$this->schema = new stdClass();
		}
		$schema = $this->db->query("DESCRIBE {$table}")->result_array();
		$fields = array();
		$this->schema->table = $table;
		foreach ($schema as $_item) {
			if (!isset($this->schema->index) && $_item['Key'] == 'PRI') {
				$this->schema->index = $_item['Field'];
				$fields[] = $_item['Field'];
			} else {
				$fields[] = $_item['Field'];
			}
		}
		$this->schema->fields = $fields;
	}

	public function status($id, $status) {
		$this->db->where($this->schema->index, $id);
		$this->db->update($this->schema->table, array('status' => $status));
	}

	public function update($id) {
		$data = array();
		foreach ($this->schema->fields as $fields) {
			if ($this->input->post($fields) && $this->input->post($fields) != $this->schema->index) {
				$data[$fields] = $this->input->post($fields);
			}
		}
		$this->db->where($this->schema->index, $id);
		$this->db->update($this->schema->table, $data);
	}

	public function save() {
		$data = array();
		foreach ($this->schema->fields as $fields) {
			if ($this->input->post($fields) && $this->input->post($fields) != $this->schema->index) {
				$data[$fields] = $this->input->post($fields);
			}
		}
		$this->db->insert($this->schema->table, $data);
		return $this->db->insert_id();
	}

	public function get_data($id = FALSE) {
		if ($id == FALSE) {
			$query = $this->db->get_where($this->schema->table, array('status >=' => 0));
			return $query->result_array();
		} elseif (is_numeric($id)) {
			$query = $this->db->get_where($this->schema->table, array('status >=' => 0, $this->schema->index => $id));
			return $query->row_array();
		} elseif (is_array ($id)){
			$id['status >='] = 0;
			$query = $this->db->get_where($this->schema->table, $id);
		}

	}

}

/* End of file base_model.php */
/* Location: ./application/models/base_model.php */
