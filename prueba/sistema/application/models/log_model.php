<?php

class Log_model extends Base_Model {

    public function __construct() {
        if (!$this->db->table_exists('log_ins_pag')) {
            $this->create_table_log();
        }
    }

    public function create_table_log() {
        $this->db->query("
                        CREATE TABLE `log_ins_pag` (
                                `id_log` INT(11) NOT NULL auto_increment,
                                `id_instruccion` INT(11) NOT NULL,
                                `id_user` INT(11) NOT NULL,
                                `creada` TINYINT(4) NOT NULL default '0',
                                `editada` TINYINT(4) NOT NULL default '0',
                                `eliminada` TINYINT(4) NOT NULL default '0',
                                `procesada` TINYINT(4) NOT NULL default '0',
                                `aceptada` TINYINT(4) NOT NULL default '0',
                                `fecha` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                                PRIMARY KEY  (`id_log`)
                        ) DEFAULT CHARSET=utf8;");

        $this->db->query('ALTER TABLE `log_ins_pag` ENGINE = InnoDB');
    }

    public function registro_log($form) {
        $this->db->insert('log_ins_pag', $form);
    }
    
    public function get_usuario_by_id($id_instruccion){
        return $this->db->query("select * from log_ins_pag
                        left join users using(id_user)
                        where SHA(id_instruccion) = '$id_instruccion' and (creada = 1 or procesada = 1) ")->result_array();
    }

}