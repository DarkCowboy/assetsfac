<?php

class Traspasos_Model extends Base_Model {

    public function __construct() {
//        if (!$this->db->table_exists('traspasos')) {
//            $this->create_table_traspasos();
//        }
    }

//    public function create_table_traspasos() {
//        $this->db->query("CREATE TABLE `traspasos`(
//                                        `id_traspaso` INT(11) NOT NULL AUTO_INCREMENT,
//                                        `id_banco_emisor` INT(11) NOT NULL,
//                                        `id_banco_receptor` INT(11) NOT NULL,
//                                        `t_instrumento` VARCHAR(60) NOT NULL,
//                                        `n_ref` VARCHAR(45) NOT NULL,
//                                        `fecha` TIMESTAMP NOT NULL,
//                                        `monto` FLOAT(11,2) NOT NULL,
//                                        `descripcion` VARCHAR(250) NOT NULL,    
//                                        `status` TINYINT(4) NOT NULL DEFAULT '1',
//                                        PRIMARY KEY (`id_traspaso`))
//                          DEFAULT CHARSET = utf8;");
//
//        $this->db->query("ALTER TABLE `registros` ENGINE = InnoDB");
//    }

    public function add_traspaso() {
        $form = $this->input->post();

        $valida = $this->db->get_where('traspasos', array('n_ref' => $form['n_ref'], 'id_banco_emisor' => $form['id_banco_emisor'], 'id_banco_receptor' => $form['id_banco_receptor']))->row_array();

        if ($valida) {
            $this->db->where('n_ref', $valida['n_ref']);
            $this->db->update('traspasos', $form);
            return $valida['id_traspaso'];
        } else {
            $this->db->insert('traspasos', $form);
            return $this->db->insert_id();
        }
    }

    public function get_all_traspasos_limit() {
        return $this->db->query("SELECT * , be.nombre_banco AS nombre_banco_emisor, id_banco_receptor, br.nombre_banco AS nombre_banco_receptor
                                FROM instrucciones
                                LEFT JOIN bancos be ON be.id_banco = instrucciones.id_banco
                                LEFT JOIN bancos br ON br.id_banco = id_banco_receptor
                                WHERE id_t_operacion = 2
                                AND Date_format( fecha_pago, '%m' ) = Date_format( NOW( ) , '%m' )
                                AND instrucciones.status >=0")->result_array();
    }

    public function busqueda_avanzada($form) {
        $query = $form['query'];
        return $this->db->query("SELECT * , be.nombre_banco AS nombre_banco_emisor, id_banco_receptor, br.nombre_banco AS nombre_banco_receptor
                                FROM instrucciones
                                LEFT JOIN bancos be ON be.id_banco = instrucciones.id_banco
                                LEFT JOIN bancos br ON br.id_banco = id_banco_receptor
                                WHERE {$query} and id_t_operacion = 2
                                
                                AND instrucciones.status >= 0")->result_array();
    }

}