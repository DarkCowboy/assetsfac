<?php

class Departamentos_model extends Base_Model {

    public function __construct() {

        if (!$this->db->table_exists('departamentos')) {
            $this->create_table_department();
        }
    }

    public function create_table_department() {
        $this->db->query("CREATE TABLE `departamentos`(
                            `id_departamento` int(11) NOT NULL auto_increment,
                            `name_departamento` varchar(60) NOT NULL,
                            `status` TINYINT(4) NOT NULL default '1',
                            PRIMARY KEY  (`id_departamento`)
                            )DEFAULT CHARSET=utf8;");
        $this->db->query("ALTER TABLE `departamentos` ENGINE = InnoDB");
    }
    
    public function add_department(){
        $this->db->insert('departamentos', $this->input->post());
    }
    
    public function get_departamentos(){
        return $this->db->get_where('departamentos', array('status >=' => 0))->result_array();
    }

}

?>
