<?php

class Empresa_model extends Base_Model {

    public function __construct() {
        parent::__construct();
        if (!$this->db->table_exists('empresa')) {
            $this->create_table();
        }

        if (!$this->db->table_exists('j_d_empresa')) {
            $this->create_table_j_d_empresa();
        }
    }

    public function create_table() {
        $this->db->query("CREATE TABLE `empresa` (
                        `id_empresa` int(11) NOT NULL auto_increment,
                        `nombre_empresa` text NOT NULL,
                        `rif_empresa` text NOT NULL,
                        `direccion_empresa` text NOT NULL,
                        `telefonos_empresa` varchar(255) NOT NULL,
                        `numero_registro` varchar(255) NOT NULL,
                        `tomo_registro` varchar(255) NOT NULL,
                        `fecha_registro` varchar(255) NOT NULL,
                        `ciudad_registro` varchar(255) NOT NULL,
                        `nombre_registro` varchar(255) NOT NULL,
                        `status` tinyint NULL default '1',
                        PRIMARY KEY  (`id_empresa`)) DEFAULT CHARSET=utf8;");

        $this->db->query('ALTER TABLE `empresa` ENGINE = InnoDB');
    }

    public function create_table_j_d_empresa() {
        $this->db->query("CREATE TABLE `j_d_empresa` (
                          `id_directivo_empresa` int(11) NOT NULL AUTO_INCREMENT,
                          `id_empresa` int(11) NOT NULL,
                          `nombre_directivo_empresa` varchar(250) NOT NULL,
                          `apellido_directivo_empresa` varchar(250) NOT NULL,
                          `t_document_directivo_empresa` varchar(10) NOT NULL,
                          `ci_rif_directivo_empresa` varchar(30) NOT NULL,
                          `tip_firma` varchar(10) NOT NULL,
                          `cargo_directivo_empresa` varchar(100) NOT NULL,
                          PRIMARY KEY (`id_directivo_empresa`)) DEFAULT CHARSET=utf8;");

        $this->db->query('ALTER TABLE `j_d_empresa` ENGINE = InnoDB');
    }

    public function get_datos_empresa() {
        return $this->db->query("select * from empresa where id_empresa = 1")->row_array();
    }

    public function add_edit() {
        $valida = $this->db->get_where('empresa', array('id_empresa' => 1))->row_array();
        if (empty($valida)) {
            $this->db->insert('empresa', $this->input->post());
            return $this->db->query("select * from empresa where id_empresa = 1")->row_array();
        } else {
            $this->db->where('id_empresa', 1);
            $this->db->update('empresa', $this->input->post());
            return $this->db->query("select * from empresa where id_empresa = 1")->row_array();
        }
    }

    public function add_edit_j_d($arreglo) {
        $this->db->delete('j_d_empresa', array('id_empresa' => 0));
        foreach ($arreglo as $row) {
            $this->db->insert('j_d_empresa', $row);
        }
        return $this->db->query("select * from j_d_empresa")->result_array();
    }
    
    public function get_junta_direct(){
        return $this->db->query("select * from j_d_empresa")->result_array();
    }
    
    public function delete_jd($id_jd){
        $this->db->delete('j_d_empresa', array('id_directivo_empresa' => $id_jd));
    }

}