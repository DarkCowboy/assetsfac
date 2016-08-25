<?php

class Movimientos_Model extends Base_Model {

    public function __construct() {
        if (!$this->db->table_exists('movimientos')) {
            $this->create_table_moviemientos();
        }
    }

    public function create_table_moviemientos() {
        $this->db->query("CREATE TABLE `movimientos`(
                            `id_movimiento` INT(11) NOT NULL AUTO_INCREMENT,
                            `id_registro` INT(11) NOT NULL,
                            `id_banco` INT(11) NOT NULL,
                            `saldo` FLOAT(11,2) NOT NULL,
                            `concepto` VARCHAR(255) NOT NULL,
                            `n_ref` VARCHAR(255) NOT NULL,
                            `t_movimiento` TINYINT(4) NOT NULL,
                            `fecha`  timestamp NOT NULL,
                            `status` TINYINT(4) NOT NULL DEFAULT '1',
                            PRIMARY KEY(`id_movimiento`)
        )DEFAULT CHARSET=utf8;");

        $this->db->query("ALTER TABLE `bancos` ENGINE = InnoDB");
    }

    public function agregar_movimiento($movimiento) {
        $valida = $this->db->query("select * from bancos 
                                    left join movimientos using(id_banco) 
                                    where bancos.id_banco = {$movimiento['id_banco']} and movimientos.concepto = 'Saldo Inicial'")->row_array();
        if (!$valida) {
            $movimiento['concepto'] = 'Saldo Inicial';
            $this->db->insert('movimientos', $movimiento);
        } elseif ($movimiento['concepto'] == 'Saldo Inicial') {
            $this->db->where('id_banco', $movimiento['id_banco']);
            $this->db->where('concepto', $movimiento['concepto']);
            $this->db->update('movimientos', $movimiento);
        } else {
            $this->db->insert('movimientos', $movimiento);
        }
    }

    public function eliminar_movimiento() {
        $this->db->update();
    }

    public function editar_movimiento() {
        $this->db->update();
    }

}