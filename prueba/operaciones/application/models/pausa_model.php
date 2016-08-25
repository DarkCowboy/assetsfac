<?php

class Pausa_Model extends Base_Model {

    public function __construct() {
        parent::__construct();

        if (!$this->db->table_exists('pagos')) {
            $this->create_table_pagos();
        }
    }

    public function create_table_pagos() {
        $this->db->query("
                        CREATE TABLE `pagos` (
                                `id_pago` int(11) NOT NULL auto_increment,
                                `id_solicitud` int(11) NOT NULL,
                                `tipo_solicitud` int(11) NOT NULL,
                                `n_operacion` varchar(60) NOT NULL,
                                `fecha_solicitud` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                                `monto_solicitud_aprobado` float(11,2) NOT NULL,
                                `plazo_solicitud_aprobado` float(11,2) NOT NULL,
                                `fecha_solicitud_aprobado` TIMESTAMP,
                                `fecha_vcto_solicitud_aprobado` TIMESTAMP,
                                `total_depositado` float(11,2)  NOT NULL,
                                `dif_actual` float(11,2)  NOT NULL,
                                `fecha_pago` TIMESTAMP,
                                `ingreso_diferencial` float(11,2)  NOT NULL,
                                `pago_capital` float(11,2)  NOT NULL,
                                `status` tinyint(4) NOT NULL default '0',
                                PRIMARY KEY  (`id_pago`)
                        ) DEFAULT CHARSET=utf8;");

        $this->db->query('ALTER TABLE `pagos` ENGINE = InnoDB');
    }

    public function registrar_pago($form, $id_solicitud, $data=null) {
        if($data != null){
            $this->db->insert('pagos', $data);
        }

        $this->db->where('id_solicitud', $id_solicitud);
        $this->db->update('pagos', $form);

        $this->db->where('id_solicitud', $id_solicitud);
        $this->db->update('solicitudes', array('pause' => '0'));
    }
    


    public function pausar_solicitud($data) {

        $this->db->where('id_solicitud', $data['id_solicitud']);
        $this->db->update('solicitudes', array('pause' => '1'));

        $this->db->where('id_solicitud', $data['id_solicitud']);
        $x = $this->db->get('pagos');

//        debug($this->db->get('pagos')->result_array() );hfghffhf
        if ($x->num_rows) {
            $this->db->where('id_solicitud', $data['id_solicitud']);
            $this->db->update('pagos', $data);
        } else {
            $this->db->insert('pagos', $data);
        }
//        debug($this->db->last_query());
    }

    public function reanudar($id_solicitud) {
        $this->db->where('id_solicitud', $id_solicitud);
        $this->db->update('solicitudes', array('pause' => '0'));

        $this->db->where('id_solicitud', $id_solicitud);
        $this->db->delete('pagos');
    }

}
