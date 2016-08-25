<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Config_Model extends CI_Model {

    private $all_parameter = null;

    public function __construct() {
        $this->load->database();

        # Si la tabla no existe es creada
        if (!$this->db->table_exists('config')) {
            $this->create_table();
        }
    }

    public function get_parameter($parameter_name, $only_value = true) {

        # Si los parametros no han sido cargados son consultados en base de datos
        if ($this->all_parameter === null) {
            $this->all_parameter = $this->db->get('config')->result_array();
        }

        foreach ($this->all_parameter as $item) {
            if ($item['name'] == $parameter_name) {
                if ($only_value) {
                    return $item['value'];
                } else {
                    return $item;
                }
            }
        }
    }

    public function create_table() {
        $this->db->query("
					CREATE TABLE `config` (
						`id_config` int(11) NOT NULL auto_increment,
						`name` varchar(255) NOT NULL,
						`label` varchar(255) NOT NULL,
						`value` text NOT NULL,
						PRIMARY KEY  (`id_config`),
						UNIQUE KEY `name` (`name`)
					) DEFAULT CHARSET=utf8;");

        $this->db->query('ALTER TABLE `config` ENGINE = InnoDB');

        $config = array(
            'name' => 'max_attemps',
            'label' => 'Máximo de intentos fallidos',
            'value' => '5',
        );
        $this->db->insert('config', $config);
    }

    public function agregar_config() {

        $valida = $this->db->get_where('config', array('label' => 'moneda'))->row_array();
        if (count($valida) > 0) {
            $this->db->where('label', $this->input->post('label'));
            $this->db->update('config', $this->input->post());
            $x = $this->db->get_where('config', array('label' => 'moneda'))->row_array();
            $moneda['moneda'] = $x;
            $moneda['mensaje'] = 'Registro editado Correctamente';
            return $moneda;
        } else {
            $this->db->insert('config', $this->input->post());
            $x = $this->db->get_where('config', array('label' => 'moneda'))->row_array();
            $moneda['moneda'] = $x;
            $moneda['mensaje'] = 'Registro agregado Correctamente';
            return $moneda;
        }
    }
    
        public function get_parameter_sistema($parameter_name, $only_value = true) {

        # Si los parametros no han sido cargados son consultados en base de datos
        if ($this->all_parameter === null) {
            $this->all_parameter = $this->db->get('config')->result_array();
        }

        foreach ($this->all_parameter as $item) {
            if ($item['label'] == $parameter_name) {
                if ($only_value) {
                    return $item;
                } else {
                    return $item;
                }
            }
        }
    }
    
    public function get_moneda(){
        return $this->db->get_where('config', array('label' => 'moneda'))->row_array();
    }
 
    public function get_declaracion(){
        return $this->db->get_where('config', array('label' => 'declaracion_jurada'))->row_array();
    }
    public function get_declaracion_pn(){
        return $this->db->get_where('config', array('label' => 'declaracion_jurada_pn'))->row_array();
    }

}

/* End of file config_model.php */
/* Location: ./application/models/config_model.php */
