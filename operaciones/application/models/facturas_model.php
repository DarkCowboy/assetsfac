<?php

class Facturas_Model extends Base_Model {

    public function __construct() {
        parent::__construct();

        if (!$this->db->table_exists('facturas')) {
            $this->create_table_facturas();
        }
    }

    public function create_table_facturas() {
        $this->db->query("
                        CREATE TABLE `facturas` (
                                `id_factura` int(11) NOT NULL auto_increment,
                                `id_solicitud` int(11) NOT NULL,
                                `numero` int(11) NOT NULL,
                                `numero_factura` int(11) NOT NULL,
                                `deudor` varchar(255) NOT NULL,
                                `rif` varchar(30) NOT NULL,
                                `fecha_emision` varchar(30) NOT NULL,
                                `fecha_vencimiento` varchar(30) NOT NULL,
                                `valor_nominal` float(11,2) NOT NULL,
                                `iva` float(11,2) NOT NULL,
                                `valor_con_iva` float(11,2) NOT NULL,
                                `status` tinyint(4) NOT NULL default '0',
                                PRIMARY KEY  (`id_factura`)
                        ) DEFAULT CHARSET=utf8;");

        $this->db->query('ALTER TABLE `facturas` ENGINE = InnoDB');
    }

    public function cargar_lote($form) {
        $facturas = $form;
        foreach ($facturas as $row) {
            $this->db->insert('facturas', $row);
        }
        return 'guardado';
    }

    public function valida_facturas($form) {
        foreach ($form as $row) {
            $valida = $this->db->get_where('facturas', array('numero_factura' => $row['numero_factura'], 'rif' => $row['rif']))->row_array();
            if (count($valida) > 0) {
                return $valida;
                break;
            }
        }
        return 'validado';
    }

    public function get_facturas($id_solicitud) {
        return $this->db->get_where('facturas', array('id_solicitud' => $id_solicitud))->result_array();
    }

    public function editar_facturas($id_solicitud, $form) {
        $facturas = $form;
        foreach ($facturas as $row) {
            $this->db->start_cache();
            $this->db->from('facturas');
            $this->db->where('id_solicitud', $id_solicitud);
            $this->db->where('numero_factura', $row['numero_factura']);
            $this->db->stop_cache();
            if ($this->db->count_all_results() == 0) {
                $this->db->insert('facturas', $row);
            } else {
                $this->db->update('facturas', $row);
            }
            $this->db->flush_cache();
        }
    }

    public function eliminar_factura($id_factura) {
        $this->db->where('id_factura', $id_factura);
        $this->db->update('facturas', array('status' => '-1'));
    }

    public function undo_elimina($id_factura) {
        $this->db->where('id_factura', $id_factura);
        $this->db->update('facturas', array('status' => '0'));
    }

}
