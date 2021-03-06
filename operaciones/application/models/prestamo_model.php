<?php

class Prestamo_Model extends Base_Model {

    public function __construct() {
        parent::__construct();

        if (!$this->db->table_exists('solicitudes')) {
            $this->create_table_solicitudes();
        }
    }

    public function create_table_solicitudes() {
        $this->db->query("
                        CREATE TABLE `solicitudes` (
                                `id_solicitud` int(11) NOT NULL auto_increment,
                                `id_cliente` int(11) NOT NULL,
                                `id_pj` int(11) NOT NULL default '0',
                                `id_pn` int(11) NOT NULL default '0',
                                `tipo_solicitud` int(11) NOT NULL,
                                `n_operacion` varchar(60) NOT NULL,
                                `rollover` int(11) NOT NULL,
                                `fecha_solicitud` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                                `monto_solicitud` float(11,2) NOT NULL,
                                `plazo_solicitud` float(11,2) NOT NULL,
                                `monto_solicitud_aprobado` float(11,2) NOT NULL,
                                `plazo_solicitud_aprobado` float(11,2) NOT NULL,
                                `fecha_solicitud_aprobado` TIMESTAMP,
                                `fecha_vcto_solicitud_aprobado` TIMESTAMP,
                                `destino_solicitud` varchar(255) NOT NULL,
                                `status` tinyint(4) NOT NULL default '0',
                                PRIMARY KEY  (`id_solicitud`)
                        ) DEFAULT CHARSET=utf8;");

        $this->db->query('ALTER TABLE `solicitudes` ENGINE = InnoDB');
    }

    public function save_prestamo($form) {
        $this->db->insert('solicitudes', $form);
    }

    public function get_prestamo($id_cliente) {
        return $this->db->get_where('solicitudes', array('id_cliente' => $id_cliente, 'tipo_solicitud' => 4))->result_array();
    }

    public function get_prestamo_by_id($id_solicitud) {
        $result = $this->db->query("select * from personas_juridicas
                        join principales_clientes using (id_pj)
                        join datos_registros using (id_pj)
                        join datos_bancarios using (id_pj)
                        join solicitudes using (id_pj)
                        left join resumen_financiero_acc using (id_pj)
                        where solicitudes.id_solicitud = {$id_solicitud}")->row_array();
        $nomina_accionista = $this->db->get_where('nom_accionista_empresas', array('id_pj' => $result['id_pj'], 'status >' => 0))->result_array();
        $junta_directiva = $this->db->get_where('jun_directiva_empresas', array('id_pj' => $result['id_pj'], 'status >' => 0))->result_array();
        $result['junta_directiva'] = $junta_directiva;
        $result['nomina_accionista'] = $nomina_accionista;
        $result['ing_anuales_pe'] = unserialize($result['ing_anuales_pe']);
        $result['banco_ref_pj'] = unserialize($result['banco_ref_pj']);
        $result['n_cuenta_ref_pj'] = unserialize($result['n_cuenta_ref_pj']);
        $result['cuenta_ref_pj'] = unserialize($result['cuenta_ref_pj']);

        $result['nombre_rz_pc'] = unserialize($result["nombre_rz_pc"]);
        $result['num_rif_pc'] = unserialize($result["num_rif_pc"]);
        $result['persona_contacto_pc'] = unserialize($result["persona_contacto_pc"]);
        $result['tel_email_pc'] = unserialize($result["tel_email_pc"]);

        return $result;
    }

    public function get_prestamo_pn_by_id($id_solicitud) {
        $result = $this->db->query("select * from inscripcion_pn
                        join solicitudes using (id_cliente)
                        left join resumen_financiero_pn using (id_cliente)
                        where solicitudes.id_solicitud = {$id_solicitud}")->row_array();

        return $result;
    }

    public function prestamo_pn_by_id($id_solicitud) {
        return $this->db->get_where('solicitudes', array('id_solicitud' => $id_solicitud, 'tipo_solicitud' => 4))->row_array();
    }
    
    public function get_solicitud_prestamo($id_solicitud) {
        return $this->db->query("select * from solicitudes
        left join personas_juridicas using(id_pj)
        left join principales_clientes using (id_pj)
        left join datos_registros using (id_pj)
        where tipo_solicitud = 4 and id_solicitud = {$id_solicitud}")->row_array();
    }
    
    public function procesar_prestamo($solicitud) {
        $this->db->where('id_solicitud', $solicitud['id_solicitud']);
        $this->db->update('solicitudes', $solicitud);
    }
    
    public function get_exp_interna_prestamo_pn($id_cliente, $id_solicitud) {
        return $this->db->query("select * from solicitudes
        where tipo_solicitud = 4 and id_cliente = {$id_cliente} and id_solicitud <> {$id_solicitud} ")->result_array();
    }

}