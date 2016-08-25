<?php

class Codigo_Model extends Base_model{
    
    public function __construct(){
        if(!$this->db->table_exists('codigo_contable')){
            $this->create_table_codigo();
        }
    }
    
    public function create_table_codigo(){
        $this->db->query("CREATE TABLE `codigo_contable`(
                        `id_codigo` INT(11) NOT NULL AUTO_INCREMENT,
                        `codigo` INT(11) NOT NULL,
                        `codigo_padre` INT(11) NOT NULL,
                        `nombre_cuenta` VARCHAR(180) NOT NULL,
                        `status` TINYINT(4) NOT NULL DEFAULT '1',
                        PRIMARY KEY (`id_codigo`)
        )DEFAULT CHARSET = utf8;");
        $this->db->query("ALTER TABLE `codigo_contable` ENGINE = InnoDB");
    }
}
