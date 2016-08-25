<?php

class Facturas_Model extends Base_Model {

    public function __construct() {
        parent::__construct();

        if (!$this->db->table_exists('facturas')) {
            $this->create_table_facturas();
        }
        if (!$this->db->table_exists('recibos')) {
            $this->create_table_recibos();
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
                                `plazo_compra` int(11) NOT NULL,
                                `rendimiento_compra` DECIMAL(11,2) NOT NULL,
                                `precio_compra` DECIMAL(11,2) NOT NULL,
                                `liquidado_compra` DECIMAL(11,2) NOT NULL,
                                `id_recibo` INT(11) NOT NULL,
                                `pause` TINYINT(4) NOT NULL,
                                `fecha_pausado` varchar(30) NOT NULL,
                                `status` tinyint(4) NOT NULL default '0',
                                PRIMARY KEY  (`id_factura`)
                        ) DEFAULT CHARSET=utf8;");

        $this->db->query('ALTER TABLE `facturas` ENGINE = InnoDB');
    }
    public function create_table_recibos() {
                $this->db->query("
                        CREATE TABLE `recibos` (
                                `id_recibo` int(11) NOT NULL auto_increment,
                                `nombre_recibo` text not null,
                                `tipo` text not null,
                                `facturas` text not null,
                                `status` tinyint(4) NOT NULL default '0',
                                PRIMARY KEY  (`id_recibo`)
                        ) DEFAULT CHARSET=utf8;");

        $this->db->query('ALTER TABLE `recibos` ENGINE = InnoDB');
    }
    
    public function pause_facturas($facturas){
        $id_recibo = $facturas['id_recibo'];
        $fecha_pausado = $facturas['fecha_pausado'];
        unset($facturas['id_recibo']);
        unset($facturas['fecha_pausado']);
        foreach($facturas as $filas){
                $this->db->where('id_factura', $filas['id_factura']);
                $this->db->update('facturas', array('status' => 1, 'id_recibo' => $id_recibo, 'fecha_pausado' => $fecha_pausado));
        }
    }
    
    public function guarda_recibo($recibo){
        $this->db->insert('recibos', $recibo);
        return $this->db->insert_id();
    }

    public function cargar_lote($form) {
        $facturas = $form;
        foreach ($facturas as $row) {
            $this->db->insert('facturas', $row);
        }
        return 'guardado';
    }
    
    public function valida_facturas($form){
        foreach ($form as $row) {
            $valida = $this->db->get_where('facturas', array('numero_factura' => $row['numero_factura'], 'rif' => $row['rif']))->row_array();
            if (count($valida) > 0) {
                return $valida;
                break;
            }
        }
        return 'validado';
    }
    
    public function get_facturas($id_solicitud){
        return $this->db->get_where('facturas', array('id_solicitud' => $id_solicitud))->result_array();
    }

}