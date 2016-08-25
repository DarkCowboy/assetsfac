<?php

class Proveedores_Model extends Base_Model {

    public function __construct() {
        if (!$this->db->table_exists('proveedores')) {
            $this->create_table_proveedores();
        }
    }

    public function create_table_proveedores() {
        $this->db->query("CREATE TABLE `proveedores`(
                        `id_proveedor` INT(11) NOT NULL AUTO_INCREMENT,
                        `id_number_proveedor` VARCHAR(60) NOT NULL,
                        `pre_id_number` VARCHAR(60) NOT NULL,
                        `nombre_proveedor` VARCHAR(180) NOT NULL,
                        `email_proveedor` VARCHAR(180) NOT NULL,
                        `status` TINYINT(4) NOT NULL DEFAULT '1',
                        PRIMARY KEY (`id_proveedor`)
        )DEFAULT CHARSET = utf8;");
        $this->db->query("ALTER TABLE `proveedores` ENGINE = InnoDB");
    }

    public function agregar_proveedor($proveedor) {
        $valida = $this->db->get_where('proveedores', array('id_number_proveedor' => $proveedor['id_number_proveedor']))->row_array();
        if ($valida) {
            $this->db->where('id_number_proveedor', $proveedor['id_number_proveedor']);
            $this->db->update('proveedores', $proveedor);
            return $valida['id_proveedor'];
        }
        $this->db->insert('proveedores', $proveedor);
        return $this->db->insert_id();
    }

    public function get_proveedor_by_id($id_proveedor) {
        return $this->db->get_where('proveedores', array('SHA(id_proveedor)' => $id_proveedor, 'status >' => 0))->row_array();
    }

    public function editar_proveedor($form) {
        $this->db->where('SHA(id_proveedor)', $form['id_proveedor']);
        unset($form['id_proveedor']);
        $this->db->update('proveedores', $form);
    }

    public function get_proveedores() {
        return $this->db->query('select * from proveedores where status > 0 order by nombre_proveedor asc')->result_array();
//        return $this->db->get_where('proveedores', array('status >' => 0))->result_array();
    }

    public function eliminar($code) {

        $this->db->where('SHA(id_proveedor)', $code);
        $this->db->update('proveedores', array('status' => -1));
//        debug($this->db->last_query());
    }

    public function habilitar($code) {
        $this->db->where('SHA(id_proveedor)', $code);
        $this->db->update('proveedores', array('status' => 1));
//        debug($this->db->last_query());
    }

    public function desabilitar($code) {
        $this->db->where('SHA(id_proveedor)', $code);
        $this->db->update('proveedores', array('status' => 0));
//        debug($this->db->last_query());
    }

    public function get_all_info_provee($id_proveedor){
        $this->db->where('SHA(id_proveedor)', $id_proveedor);
        return $this->db->query("select * from proveedores
                        left join instrucciones using(id_proveedor)
                        left join bancos using (id_banco)
                        where SHA(id_proveedor) = '$id_proveedor' and instrucciones.status > 0 order by instrucciones.fecha_pago DESC" )->result_array();
    }
}