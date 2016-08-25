<?php

class Cupos_Model extends Base_Model {

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
                                `codigo_solicitud` TINYINT( 4 ) NOT NULL,
                                `rollover` int(11) NOT NULL,
                                `fecha_solicitud` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                                `monto_solicitud` float(11,2) NOT NULL,
                                `modalidad` text NOT NULL,
                                `plazo_solicitud` float(11,2) NOT NULL,
                                `num_comite` VARCHAR( 60 ) NOT NULL, 
                                `monto_solicitud_aprobado` float(11,2) NOT NULL,
                                `plazo_solicitud_aprobado` float(11,2) NOT NULL,
                                `fecha_solicitud_aprobado` TIMESTAMP,
                                `fecha_vcto_solicitud_aprobado` TIMESTAMP,
                                `datos_notaria` text NOT NULL,
                                `porcentaje_compra` text NOT NULL,
                                `plazo` text NOT NULL,
                                `mora_dias` text NOT NULL,
                                `mora_monto` FLOAT( 11, 2 ) NOT NULL DEFAULT '0',
                                `ana_comentarios` text NOT NULL,
                                `rep_riesgo` text NOT NULL,
                                `destino_solicitud` varchar(255) NOT NULL,
                                `notificacion` varchar(11) NOT NULL default '0-0',
                                `t_pago` tinyint(4) NOT NULL default '0',
                                `ref_bancaria` text NOT NULL,
                                `fecha_pago` TIMESTAMP,
                                `monto_depositado` FLOAT( 11, 2 ) NOT NULL DEFAULT '0',
                                `status` tinyint(4) NOT NULL default '0',
                                PRIMARY KEY  (`id_solicitud`)
                        ) DEFAULT CHARSET=utf8;");
        $this->db->query('ALTER TABLE `solicitudes` ENGINE = InnoDB');
    }

    public function nuevo_cupo($form) {
        $valida_no_procesada = $this->db->get_where('solicitudes', array('id_cliente' => $form['id_cliente'], 'status' => 0, 'tipo_solicitud' => '1'))->row_array();
        $valida_proce_espera = $this->db->get_where('solicitudes', array('id_cliente' => $form['id_cliente'], 'status' => 1, 'tipo_solicitud' => '1'))->row_array();

        if (count($valida_no_procesada) > 0 or count($valida_proce_espera) > 0) {
            return false;
        } else {
            $this->db->insert('solicitudes', $form);
            return true;
        }
    }

    public function get_cupos($id_cliente) {
        return $this->db->get_where('solicitudes', array('id_cliente' => $id_cliente, 'tipo_solicitud' => 1))->result_array();
    }
    
    public function get_cupo_($id_cliente) {
        return $this->db->get_where('solicitudes', array('id_cliente' => $id_cliente, 'tipo_solicitud' => 1, 'status' => 2))->row_array();
    }

    public function nueva_venta($form) {
        $this->db->insert('solicitudes', $form);
        return $this->db->insert_id();
    }

    public function get_ventas($id_cliente) {
        $result = $this->db->query("select solicitudes.*, personas_juridicas.nom_rz_pj, datediff(fecha_vcto_solicitud_aprobado,CURRENT_TIMESTAMP) as dias_restantes from solicitudes
            join personas_juridicas using (id_pj)
            where tipo_solicitud = 2 and solicitudes.status >= 0 and solicitudes.id_cliente = {$id_cliente}")->result_array();
        $valida = 0;
        foreach ($result as $row) {

            if ($row['dias_restantes'] < 0 and $row['status'] == '2') {
                $row['dias_restantes'] = (int) $row['dias_restantes'] * -1;
                $mora_monto = ($row['monto_solicitud'] * 0.325 * $row['dias_restantes']) / 360;
                $this->db->where('id_solicitud', $row['id_solicitud']);
                $this->db->update('solicitudes', array('status' => '6', 'mora_dias' => $row['dias_restantes'], 'mora_monto' => $mora_monto));
                $valida = '1';
            }
            if ($row['dias_restantes'] < 0 and $row['status'] == '6') {
                $row['dias_restantes'] = (int) $row['dias_restantes'] * -1;
                $mora_monto = ($row['monto_solicitud'] * 0.325 * $row['dias_restantes']) / 360;
                $this->db->where('id_solicitud', $row['id_solicitud']);
                $this->db->update('solicitudes', array('status' => '6', 'mora_dias' => $row['dias_restantes'], 'mora_monto' => $mora_monto));
                $valida = '1';
            }


            if ($valida == '1') {
                $result = $this->db->query("select solicitudes.*, personas_juridicas.nom_rz_pj, datediff(fecha_vcto_solicitud_aprobado,CURRENT_TIMESTAMP) as dias_restantes from solicitudes
            join personas_juridicas using (id_pj)
            where tipo_solicitud = 2 and solicitudes.status >= 0 and solicitudes.id_cliente = {$id_cliente}")->result_array();
            }
        }
        return $result;
    }

    public function get_pagares($id_cliente) {

        $result = $this->db->query("select solicitudes.*, personas_juridicas.nom_rz_pj, datediff(fecha_vcto_solicitud_aprobado,CURRENT_TIMESTAMP) as dias_restantes from solicitudes
            join personas_juridicas using (id_pj)
            where tipo_solicitud = 3 and solicitudes.status >= 0 and solicitudes.id_cliente = {$id_cliente}")->result_array();
        $valida = 0;
        foreach ($result as $row) {

            if ($row['dias_restantes'] < 0 and $row['status'] == '2') {
                $row['dias_restantes'] = (int) $row['dias_restantes'] * -1;
                $mora_monto = ($row['monto_solicitud'] * 0.325 * $row['dias_restantes']) / 360;
                $this->db->where('id_solicitud', $row['id_solicitud']);
                $this->db->update('solicitudes', array('status' => '6', 'mora_dias' => $row['dias_restantes'], 'mora_monto' => $mora_monto));
                $valida = '1';
            }
            if ($row['dias_restantes'] < 0 and $row['status'] == '6') {
                $row['dias_restantes'] = (int) $row['dias_restantes'] * -1;
                $mora_monto = ($row['monto_solicitud'] * 0.325 * $row['dias_restantes']) / 360;
                $this->db->where('id_solicitud', $row['id_solicitud']);
                $this->db->update('solicitudes', array('status' => '6', 'mora_dias' => $row['dias_restantes'], 'mora_monto' => $mora_monto));
                $valida = '1';
            }


            if ($valida == '1') {
                $result = $this->db->query("select solicitudes.*, personas_juridicas.nom_rz_pj, datediff(fecha_vcto_solicitud_aprobado,CURRENT_TIMESTAMP) as dias_restantes from solicitudes
            join personas_juridicas using (id_pj)
            where tipo_solicitud = 3 and solicitudes.status >= 0 and solicitudes.id_cliente = {$id_cliente}")->result_array();
            }
        }
        return $result;
    }

    public function get_pagares_pn($id_cliente) {

        $result = $this->db->query("select * from solicitudes
            where tipo_solicitud = 3 and solicitudes.status >= 0 and solicitudes.id_cliente = {$id_cliente}")->result_array();
        $valida = 0;
        foreach ($result as $row) {

            if ($row['dias_restantes'] < 0 and $row['status'] == '2') {
                $row['dias_restantes'] = (int) $row['dias_restantes'] * -1;
                $mora_monto = ($row['monto_solicitud'] * 0.325 * $row['dias_restantes']) / 360;
                $this->db->where('id_solicitud', $row['id_solicitud']);
                $this->db->update('solicitudes', array('status' => '6', 'mora_dias' => $row['dias_restantes'], 'mora_monto' => $mora_monto));
                $valida = '1';
            }
            if ($row['dias_restantes'] < 0 and $row['status'] == '6') {
                $row['dias_restantes'] = (int) $row['dias_restantes'] * -1;
                $mora_monto = ($row['monto_solicitud'] * 0.325 * $row['dias_restantes']) / 360;
                $this->db->where('id_solicitud', $row['id_solicitud']);
                $this->db->update('solicitudes', array('status' => '6', 'mora_dias' => $row['dias_restantes'], 'mora_monto' => $mora_monto));
                $valida = '1';
            }


            if ($valida == '1') {
                $result = $this->db->query("select * from solicitudes
            where tipo_solicitud = 3 and solicitudes.status >= 0 and solicitudes.id_cliente = {$id_cliente}")->result_array();
            }
        }
        return $result;
    }

    public function get_cupo_by_id($id_solicitud) {
        $result = $this->db->query("select * from personas_juridicas
                        left join principales_clientes using (id_pj)
                        left join datos_registros using (id_pj)
                        left join datos_bancarios using (id_pj)
                        left join solicitudes using (id_pj)
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

    public function get_venta_by_id($id_solicitud) {
        $result = $this->db->query("select * from personas_juridicas
                        left join principales_clientes using (id_pj)
                        left join datos_registros using (id_pj)
                        left join datos_bancarios using (id_pj)
                        left join solicitudes using (id_pj)
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

    public function get_exp_interna($id_pj, $id_solicitud) {
        return $this->db->query("select * from solicitudes
        where tipo_solicitud = 2 and id_pj = {$id_pj} and id_solicitud <> {$id_solicitud} ")->result_array();
    }

    public function get_solicitud_venta($id_solicitud) {
        return $this->db->query("select * from solicitudes
        left join personas_juridicas using(id_pj)
        left join principales_clientes using (id_pj)
        left join datos_registros using (id_pj)
        where tipo_solicitud = 2 and id_solicitud = {$id_solicitud}")->row_array();
    }

    public function get_solicitud_pagare($id_solicitud) {
        return $this->db->query("select * from solicitudes
        left join personas_juridicas using(id_pj)
        left join principales_clientes using (id_pj)
        left join datos_registros using (id_pj)
        where tipo_solicitud = 3 and id_solicitud = {$id_solicitud}")->row_array();
    }

    public function get_cupo_activo($id_pj) {
//        select * from solicitudes where solicitudes.id_pj = 3 and tipo_solicitud = 1 and solicitudes.status = 2 ORDER BY `tipo_solicitud` ASC 
        return $this->db->query("select * from solicitudes where solicitudes.id_pj = {$id_pj} and tipo_solicitud = 1 and solicitudes.status = 2 ORDER BY `tipo_solicitud` ASC ")->row_array();
//        return $this->db->query("select * from avales_contrato
//                                left join solicitudes using(id_solicitud)
//                                left join nom_accionista_empresas using(id_nom_accionista)
//                                where solicitudes.id_pj = {$id_pj} and tipo_solicitud = 1 and solicitudes.status = 2")->result_array();
    }

    public function get_rep_legal($id_pj) {
        return $this->db->get_where('representantes_legales_pj', array('id_pj' => $id_pj))->row_array();
    }

    public function get_all_operaciones($id_cliente, $cupo = 0) {
        if ($cupo == 1) {
            $solicitudes = 'tipo_solicitud >= 0';
        } else {
            $solicitudes = 'tipo_solicitud > 1';
        }
        $result = $this->db->query("select solicitudes.*, personas_juridicas.nom_rz_pj, datediff(fecha_vcto_solicitud_aprobado,CURRENT_TIMESTAMP) as dias_restantes from solicitudes
            join personas_juridicas using (id_pj)
            where {$solicitudes} and solicitudes.status >= 0 and solicitudes.id_cliente = {$id_cliente}")->result_array();

        $valida = 0;
        foreach ($result as $row) {

            if ($row['dias_restantes'] < 0 and $row['status'] == '2') {
                $row['dias_restantes'] = (int) $row['dias_restantes'] * -1;
                $mora_monto = ($row['monto_solicitud'] * 0.325 * $row['dias_restantes']) / 360;
                $this->db->where('id_solicitud', $row['id_solicitud']);
                $this->db->update('solicitudes', array('status' => '6', 'mora_dias' => $row['dias_restantes'], 'mora_monto' => $mora_monto));
                $valida = '1';
            }
            if ($row['dias_restantes'] < 0 and $row['status'] == '6') {
                $row['dias_restantes'] = (int) $row['dias_restantes'] * -1;
                $mora_monto = ($row['monto_solicitud'] * 0.325 * $row['dias_restantes']) / 360;
                $this->db->where('id_solicitud', $row['id_solicitud']);
                $this->db->update('solicitudes', array('status' => '6', 'mora_dias' => $row['dias_restantes'], 'mora_monto' => $mora_monto));
                $valida = '1';
            }


            if ($valida == '1') {
                $result = $this->db->query("select solicitudes.*, personas_juridicas.nom_rz_pj, 
                    datediff(fecha_vcto_solicitud_aprobado,CURRENT_TIMESTAMP) as dias_restantes from solicitudes
            join personas_juridicas using (id_pj)
            where tipo_solicitud > 1 and solicitudes.status >= 0 and solicitudes.id_cliente = {$id_cliente}")->result_array();
            }
        }
        return $result;
    }
    
    public function status_solicitudes(){
        
        
    }

    public function get_all_operaciones_pn($id_cliente) {

        $result = $this->db->query("select solicitudes.*, 
            datediff(fecha_vcto_solicitud_aprobado,CURRENT_TIMESTAMP) as dias_restantes from solicitudes
            where tipo_solicitud > 1 and solicitudes.status >= 0 and solicitudes.id_cliente = {$id_cliente}")->result_array();

        $valida = 0;
        foreach ($result as $row) {

            if ($row['dias_restantes'] < 0 and $row['status'] == '2') {
                $row['dias_restantes'] = (int) $row['dias_restantes'] * -1;
                $mora_monto = ($row['monto_solicitud'] * 0.325 * $row['dias_restantes']) / 360;
                $this->db->where('id_solicitud', $row['id_solicitud']);
                $this->db->update('solicitudes', array('status' => '6', 'mora_dias' => $row['dias_restantes'], 'mora_monto' => $mora_monto));
                $valida = '1';
            }
            if ($row['dias_restantes'] < 0 and $row['status'] == '6') {
                $row['dias_restantes'] = (int) $row['dias_restantes'] * -1;
                $mora_monto = ($row['monto_solicitud'] * 0.325 * $row['dias_restantes']) / 360;
                $this->db->where('id_solicitud', $row['id_solicitud']);
                $this->db->update('solicitudes', array('status' => '6', 'mora_dias' => $row['dias_restantes'], 'mora_monto' => $mora_monto));
                $valida = '1';
            }


            if ($valida == '1') {
                $result = $this->db->query("select solicitudes.*, 
                    datediff(fecha_vcto_solicitud_aprobado,CURRENT_TIMESTAMP) as dias_restantes from solicitudes
                    where tipo_solicitud > 1 and solicitudes.status >= 0 and solicitudes.id_cliente = {$id_cliente}")->result_array();
            }
        }
        return $result;
    }

    public function get_operaciones_reportes_vcto($id_cliente) {
        return $this->db->query("            
        (select 
               datediff(fecha_vcto_solicitud_aprobado,CURRENT_TIMESTAMP) as dias_restantes,
               inscripcion_pn.nom_apell_pn as nombre_razon_social_pn_pj,
               inscripcion_pn.cedula_pn as rif_cedula_pn_pj,
               inscripcion_pn.email_pn as email_pn_pj,
               inscripcion_pn.telefono_pn as telefono_pn_pj, solicitudes.* from solicitudes
               join inscripcion_pn using(id_cliente) 
               where tipo_solicitud <> 1 and solicitudes.status > 1 and id_cliente = {$id_cliente} order by fecha_vcto_solicitud_aprobado asc)
        union
        (select 
               datediff(fecha_vcto_solicitud_aprobado,CURRENT_TIMESTAMP) as dias_restantes,
               personas_juridicas.nom_rz_pj as nombre_razon_social_pn_pj,
               personas_juridicas.rif_pj as rif_cedula_pn_pj,
               personas_juridicas.email_pj as email_pn_pj, 
               personas_juridicas.telefono_pj as telefono_pn_pj, solicitudes.* from solicitudes  
               join personas_juridicas using(id_cliente)
               where tipo_solicitud <> 1 and solicitudes.status > 1 and id_cliente = {$id_cliente}  order by fecha_vcto_solicitud_aprobado asc)order by fecha_vcto_solicitud_aprobado asc")->result_array();
    }

}