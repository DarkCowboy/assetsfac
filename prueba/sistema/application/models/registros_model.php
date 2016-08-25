<?php

class Registros_model extends Base_Model {

    public function __construct() {

        if (!$this->db->table_exists('registros')) {
            $this->create_table_registros();
        }
    }

    public function create_table_registros() {

        $this->db->query("CREATE  TABLE `registros` (
                          `id_registro` INT(11) NOT NULL AUTO_INCREMENT ,
                          `id_operacion` INT(11) NOT NULL ,
                          `t_operacion` VARCHAR(45) NOT NULL ,
                          PRIMARY KEY (`id_registro`))
                          DEFAULT CHARSET = utf8;");

        $this->db->query("ALTER TABLE `registros` ENGINE = InnoDB");
    }

    public function add_registro($registro) {
        $valida = $this->db->get_where('registros', array('t_operacion' => $registro['t_operacion'], 'id_operacion' => $registro['id_operacion']))->row_array();
        if ($valida) {
            $this->db->where('id_operacion', $registro['id_operacion']);
            $this->db->update('registros', $registro);
            return $valida['id_registro'];
        } else {
            $this->db->insert('registros', $registro);
            return $this->db->insert_id();
        }
    }

}