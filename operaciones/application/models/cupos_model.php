<?php

class Cupos_Model extends Base_Model {

    public function __construct() {
        parent::__construct();
        if (!$this->db->table_exists('solicitudes')) {
            $this->create_table_solicitudes();
        }
        if (!$this->db->table_exists('resumen_financiero_acc')) {
            $this->create_table_resumen_financiero_acc();
        }
        if (!$this->db->table_exists('firma_contrato_marco')) {
            $this->create_table_firma_contrato_marco();
        }
        if (!$this->db->table_exists('avales_contrato')) {
            $this->create_table_avales_contrato();
        }
        if (!$this->db->table_exists('resumen_financiero_pn')) {
            $this->create_table_resumen_financiero_pn();
        }
        if (!$this->db->table_exists('codeudores')) {
            $this->create_table_codeudores();
        }
    }

    public function email($correo, $asunto, $cuerpo) {
        $this->load->library('email');

        $this->email->from('admin@msfactoring.com.ve', 'Ms Factoring C.A.');
        $this->email->to($correo);
        $this->email->cc($correo);
        $this->email->bcc($correo);
        $this->email->subject($asunto);
        $this->email->message($cuerpo);

        $this->email->send();

    }

    public function create_table_codeudores() {
        $this->db->query("
                        CREATE TABLE `codeudores` (
                                `id_codeudor` int(11) NOT NULL auto_increment,
                                `id_solicitud` int(11) NOT NULL,
                                `nom_apell_codeudor` TEXT NOT NULL,
                                `nacionalidad_codeudor` TEXT NOT NULL,
                                `genero_codeudor` TEXT NOT NULL,
                                `cedula_codeudor` TEXT NOT NULL,
                                PRIMARY KEY  (`id_codeudor`)
                        ) DEFAULT CHARSET=utf8;");

        $this->db->query('ALTER TABLE `codeudores` ENGINE = InnoDB');
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

    public function create_table_resumen_financiero_acc() {
        $this->db->query("
                        CREATE TABLE `resumen_financiero_acc` (
                                `id_resumen` int(11) NOT NULL auto_increment,
                                `id_pj` int(11) NOT NULL,
                                `nom_acc_resumen` text NOT NULL,
                                `ing_netos_accio` text NOT NULL,
                                `utl_neta_accio` text NOT NULL,
                                `act_cir_accio` text NOT NULL,
                                `act_fij_accio` text NOT NULL,
                                `otr_act_accio` text NOT NULL,
                                `tot_act_accio` text NOT NULL,
                                `pas_cp_accio` text NOT NULL,
                                `pas_lp_accio` text NOT NULL,
                                `otr_pas_accio` text NOT NULL,
                                `tot_pas_accio` text NOT NULL,
                                `cap_soc_accio` text NOT NULL,
                                `cap_con_nt_accio` text NOT NULL,
                                `tot_pas_cap_accio` text NOT NULL,
                                `cap_trab_accio` text NOT NULL,
                                `solve_accio` text NOT NULL,
                                `liq_accio` text NOT NULL,
                                `status` tinyint(4) NOT NULL default '0',
                                PRIMARY KEY  (`id_resumen`)
                        ) DEFAULT CHARSET=utf8;");

        $this->db->query('ALTER TABLE `resumen_financiero_acc` ENGINE = InnoDB');
    }

    public function create_table_resumen_financiero_pn() {
        $this->db->query("
                        CREATE TABLE `resumen_financiero_pn` (
                                `id_resumen_pn` int(11) NOT NULL auto_increment,
                                `id_cliente` int(11) NOT NULL,
                                `ing_netos_pn` text NOT NULL,
                                `utl_neta_pn` text NOT NULL,
                                `act_cir_pn` text NOT NULL,
                                `act_fij_pn` text NOT NULL,
                                `otr_act_pn` text NOT NULL,
                                `tot_act_pn` text NOT NULL,
                                `pas_cp_pn` text NOT NULL,
                                `pas_lp_pn` text NOT NULL,
                                `otr_pas_pn` text NOT NULL,
                                `tot_pas_pn` text NOT NULL,
                                `cap_soc_pn` text NOT NULL,
                                `cap_con_nt_pn` text NOT NULL,
                                `tot_pas_cap_pn` text NOT NULL,
                                `cap_trab_pn` text NOT NULL,
                                `solve_pn` text NOT NULL,
                                `liq_pn` text NOT NULL,
                                `status` tinyint(4) NOT NULL default '0',
                                PRIMARY KEY  (`id_resumen_pn`)
                        ) DEFAULT CHARSET=utf8;");

        $this->db->query('ALTER TABLE `resumen_financiero_pn` ENGINE = InnoDB');
    }

    public function create_table_firma_contrato_marco() {
        $this->db->query("
                        CREATE TABLE `firma_contrato_marco` (
                                `id_firma_cm` int(11) NOT NULL auto_increment,
                                `id_solicitud` int(11) NOT NULL,
                                `id_jun_directiva` int(11) NOT NULL,
                                `status` tinyint(4) NOT NULL default '0',
                                PRIMARY KEY  (`id_firma_cm`)
                        ) DEFAULT CHARSET=utf8;");

        $this->db->query('ALTER TABLE `firma_contrato_marco` ENGINE = InnoDB');
    }

    public function create_table_avales_contrato() {
        $this->db->query("
                        CREATE TABLE `avales_contrato` (
                                `id_avales_cm` int(11) NOT NULL auto_increment,
                                `id_solicitud` int(11) NOT NULL,
                                `id_nom_accionista` int(11) NOT NULL,
                                `status` tinyint(4) NOT NULL default '0',
                                PRIMARY KEY  (`id_avales_cm`)
                        ) DEFAULT CHARSET=utf8;");

        $this->db->query('ALTER TABLE `avales_contrato` ENGINE = InnoDB');
    }

    public function agregar_aval($form) {
        $valida = $this->db->get_where('jun_directiva_empresas', array('cedula_dir' => $form['cedula_dir'], 'status' => -10))->row_array();
        if ($valida) {
            $this->db->delete('jun_directiva_empresas', array('cedula_dir' => $form['cedula_dir'], 'status' => -10));
        }
        $this->db->insert('jun_directiva_empresas', $form);
    }

    public function guardar_estado_financiero_acc($resumen_finan) {
        $this->db->where('id_pj', $resumen_finan['id_pj']);
        $this->db->delete('resumen_financiero_acc');
        $this->db->insert('resumen_financiero_acc', $resumen_finan);
    }

    public function guardar_resumen_financiero_pn($resumen_finan) {
        $this->db->where('id_cliente', $resumen_finan['id_cliente']);
        $this->db->delete('resumen_financiero_pn');
        $this->db->insert('resumen_financiero_pn', $resumen_finan);
    }

    public function procesar_cupo($solicitud) {
        $this->db->where('id_solicitud', $solicitud['id_solicitud']);
        $this->db->update('solicitudes', $solicitud);
    }

    public function procesar_pagare($solicitud) {
        $this->db->where('id_solicitud', $solicitud['id_solicitud']);
        $this->db->update('solicitudes', $solicitud);
    }

    public function nuevo_cupo($form) {
        $valida_no_procesada = $this->db->get_where('solicitudes', array('id_cliente' => $form['id_cliente'], 'status' => 0))->row_array();
        $valida_proce_espera = $this->db->get_where('solicitudes', array('id_cliente' => $form['id_cliente'], 'status' => 1))->row_array();

        if (count($valida_no_procesada) > 0 or count($valida_proce_espera) > 0) {
            return false;
        } else {
            $this->db->insert('solicitudes', $form);
            return true;
        }
    }

    public function get_solicitud_by_id($id_solicitud){
        return $this->db->query("select * from solicitudes where id_solicitud = {$id_solicitud}")->row_array();
    }
    public function get_all_operaciones($id_cliente) {

        $result = $this->db->query("select solicitudes.*, personas_juridicas.nom_rz_pj, datediff(fecha_vcto_solicitud_aprobado,CURRENT_TIMESTAMP) as dias_restantes from solicitudes
            join personas_juridicas using (id_pj)
            left join codeudores using (id_solicitud)
            where tipo_solicitud > 1 and solicitudes.status >= 0 and solicitudes.id_cliente = {$id_cliente}")->result_array();

        $valida = 0;
        foreach ($result as $row) {

            if ($row['dias_restantes'] < 0 and $row['status'] == '2') {
                $row['dias_restantes'] = (int) $row['dias_restantes'] * -1;
                $mora_monto = ($row['monto_solicitud_aprobado'] * 0.325 * $row['dias_restantes']) / 360;
                $this->db->where('id_solicitud', $row['id_solicitud']);
                $this->db->update('solicitudes', array('status' => '6', 'mora_dias' => $row['dias_restantes'], 'mora_monto' => $mora_monto));
                $valida = '1';
            }
            if ($row['dias_restantes'] < 0 and $row['status'] == '6') {
                $row['dias_restantes'] = (int) $row['dias_restantes'] * -1;
                $mora_monto = ($row['monto_solicitud_aprobado'] * 0.325 * $row['dias_restantes']) / 360;
                $this->db->where('id_solicitud', $row['id_solicitud']);
                $this->db->update('solicitudes', array('status' => '6', 'mora_dias' => $row['dias_restantes'], 'mora_monto' => $mora_monto));
                $valida = '1';
            }


            if ($valida == '1') {
                $result = $this->db->query("select solicitudes.*, personas_juridicas.nom_rz_pj, 
                    datediff(fecha_vcto_solicitud_aprobado,CURRENT_TIMESTAMP) as dias_restantes from solicitudes
            join personas_juridicas using (id_pj)
            left join codeudores using (id_solicitud)
            where tipo_solicitud > 1 and solicitudes.status >= 0 and solicitudes.id_cliente = {$id_cliente}")->result_array();
            }
        }
        return $result;
    }

    public function get_all_operaciones_pn($id_cliente) {

        $result = $this->db->query("select solicitudes.*, 
            datediff(fecha_vcto_solicitud_aprobado,CURRENT_TIMESTAMP) as dias_restantes from solicitudes
            left join codeudores using (id_solicitud)
            where tipo_solicitud > 1 and solicitudes.status >= 0 and solicitudes.id_cliente = {$id_cliente}")->result_array();

        $valida = 0;
        foreach ($result as $row) {

            if ($row['dias_restantes'] < 0 and $row['status'] == '2') {
                $row['dias_restantes'] = (int) $row['dias_restantes'] * -1;
                $mora_monto = ($row['monto_solicitud_aprobado'] * 0.325 * $row['dias_restantes']) / 360;
                $this->db->where('id_solicitud', $row['id_solicitud']);
                $this->db->update('solicitudes', array('status' => '6', 'mora_dias' => $row['dias_restantes'], 'mora_monto' => $mora_monto));
                $valida = '1';
            }
            if ($row['dias_restantes'] < 0 and $row['status'] == '6') {
                $row['dias_restantes'] = (int) $row['dias_restantes'] * -1;
                $mora_monto = ($row['monto_solicitud_aprobado'] * 0.325 * $row['dias_restantes']) / 360;
                $this->db->where('id_solicitud', $row['id_solicitud']);
                $this->db->update('solicitudes', array('status' => '6', 'mora_dias' => $row['dias_restantes'], 'mora_monto' => $mora_monto));
                $valida = '1';
            }


            if ($valida == '1') {
                $result = $this->db->query("select solicitudes.*, 
                    datediff(fecha_vcto_solicitud_aprobado,CURRENT_TIMESTAMP) as dias_restantes from solicitudes
                    left join codeudores using (id_solicitud)
                    where tipo_solicitud > 1 and solicitudes.status >= 0 and solicitudes.id_cliente = {$id_cliente}")->result_array();
            }
        }
        return $result;
    }

    public function get_all_cupos() {

        $result = $this->db->query("            
        select 
               datediff(fecha_vcto_solicitud_aprobado,CURRENT_TIMESTAMP) as dias_restantes,
               inscripcion_pn.nom_apell_pn as nombre_razon_social_pn_pj,
               inscripcion_pn.cedula_pn as rif_cedula_pn_pj,
               inscripcion_pn.email_pn as email_pn_pj,
               inscripcion_pn.telefono_pn as telefono_pn_pj, solicitudes.* from solicitudes
               join inscripcion_pn using(id_cliente) 
               where tipo_solicitud = 1 and solicitudes.status >= 0
        union
        select 
               datediff(fecha_vcto_solicitud_aprobado,CURRENT_TIMESTAMP) as dias_restantes,
               personas_juridicas.nom_rz_pj as nombre_razon_social_pn_pj,
               personas_juridicas.rif_pj as rif_cedula_pn_pj,
               personas_juridicas.email_pj as email_pn_pj, 
               personas_juridicas.telefono_pj as telefono_pn_pj, solicitudes.* from solicitudes  
               join personas_juridicas using(id_cliente)
               where tipo_solicitud = 1 and solicitudes.status >= 0")->result_array();

        $valida = 0;
        foreach ($result as $row) {
            if ($row['dias_restantes'] < 0) {
                $this->db->where('id_solicitud', $row['id_solicitud']);
                $this->db->update('solicitudes', array('status' => '5'));
                $valida = '1';
            }
            if ($valida == '1') {
                $result = $this->db->query("            
        select 
               datediff(fecha_vcto_solicitud_aprobado,CURRENT_TIMESTAMP) as dias_restantes,
               inscripcion_pn.nom_apell_pn as nombre_razon_social_pn_pj,
               inscripcion_pn.cedula_pn as rif_cedula_pn_pj,
               inscripcion_pn.email_pn as email_pn_pj,
               inscripcion_pn.telefono_pn as telefono_pn_pj, solicitudes.* from solicitudes
               join inscripcion_pn using(id_cliente) 
               where tipo_solicitud = 1 and solicitudes.status >= 0
        union
        select 
               datediff(fecha_vcto_solicitud_aprobado,CURRENT_TIMESTAMP) as dias_restantes,
               personas_juridicas.nom_rz_pj as nombre_razon_social_pn_pj,
               personas_juridicas.rif_pj as rif_cedula_pn_pj,
               personas_juridicas.email_pj as email_pn_pj, 
               personas_juridicas.telefono_pj as telefono_pn_pj, solicitudes.* from solicitudes  
               join personas_juridicas using(id_cliente)
               where tipo_solicitud = 1 and solicitudes.status >= 0")->result_array();
            }
        }
        return $result;
    }

    public function get_all_ventas() {
        $result = $this->db->query("select  solicitudes.*,
            datediff(fecha_vcto_solicitud_aprobado,CURRENT_TIMESTAMP) as dias_restantes, 
            personas_juridicas.nom_rz_pj,
            personas_juridicas.rif_pj,
            personas_juridicas.email_pj
            from solicitudes 
            join personas_juridicas using (id_pj)
            where tipo_solicitud = 2 and solicitudes.status >= 0")->result_array();
        $valida = 0;
        foreach ($result as $row) {
            if ($row['dias_restantes'] < 0 and $row['status'] == '2') {
                $row['dias_restantes'] = (int) $row['dias_restantes'] * -1;
                $mora_monto = ($row['monto_solicitud_aprobado'] * 0.325 * $row['dias_restantes']) / 360;
                $this->db->where('id_solicitud', $row['id_solicitud']);
                $this->db->update('solicitudes', array('status' => '6', 'mora_dias' => $row['dias_restantes'], 'mora_monto' => $mora_monto));
                $valida = '1';
            }
            if ($row['dias_restantes'] < 0 and $row['status'] == '6') {
                $row['dias_restantes'] = (int) $row['dias_restantes'] * -1;
                $mora_monto = ($row['monto_solicitud_aprobado'] * 0.325 * $row['dias_restantes']) / 360;
                $this->db->where('id_solicitud', $row['id_solicitud']);
                $this->db->update('solicitudes', array('status' => '6', 'mora_dias' => $row['dias_restantes'], 'mora_monto' => $mora_monto));
                $valida = '1';
            }


            if ($valida == '1') {
                $result = $this->db->query("select  solicitudes.*,
                datediff(fecha_vcto_solicitud_aprobado,CURRENT_TIMESTAMP) as dias_restantes, 
                personas_juridicas.nom_rz_pj,
                personas_juridicas.rif_pj,
                personas_juridicas.email_pj
                from solicitudes 
                join personas_juridicas using (id_pj)
                where tipo_solicitud = 2 and solicitudes.status >= 0")->result_array();
            }
        }
        return $result;
    }

    public function get_all_pagares() {

        $result = $this->db->query("            
        select 
               datediff(fecha_vcto_solicitud_aprobado,CURRENT_TIMESTAMP) as dias_restantes,
               inscripcion_pn.nom_apell_pn as nombre_razon_social_pn_pj,
               inscripcion_pn.cedula_pn as rif_cedula_pn_pj,
               inscripcion_pn.email_pn as email_pn_pj,
               inscripcion_pn.telefono_pn as telefono_pn_pj, solicitudes.* from solicitudes
               join inscripcion_pn using(id_cliente) 
               left join codeudores using (id_solicitud)
               where tipo_solicitud = 3 and solicitudes.status >= 0
        union
        select 
               datediff(fecha_vcto_solicitud_aprobado,CURRENT_TIMESTAMP) as dias_restantes,
               personas_juridicas.nom_rz_pj as nombre_razon_social_pn_pj,
               personas_juridicas.rif_pj as rif_cedula_pn_pj,
               personas_juridicas.email_pj as email_pn_pj, 
               personas_juridicas.telefono_pj as telefono_pn_pj, solicitudes.* from solicitudes  
               join personas_juridicas using(id_cliente)
               left join codeudores using (id_solicitud)
               where tipo_solicitud = 3 and solicitudes.status >= 0")->result_array();

        $valida = 0;
        foreach ($result as $row) {

            if ($row['dias_restantes'] < 0 and $row['status'] == '2') {
                $row['dias_restantes'] = (int) $row['dias_restantes'] * -1;
                $mora_monto = ($row['monto_solicitud_aprobado'] * 0.325 * $row['dias_restantes']) / 360;
                $this->db->where('id_solicitud', $row['id_solicitud']);
                $this->db->update('solicitudes', array('status' => '6', 'mora_dias' => $row['dias_restantes'], 'mora_monto' => $mora_monto));
                $valida = '1';
            }
            if ($row['dias_restantes'] < 0 and $row['status'] == '6') {
                $row['dias_restantes'] = (int) $row['dias_restantes'] * -1;
                $mora_monto = ($row['monto_solicitud_aprobado'] * 0.325 * $row['dias_restantes']) / 360;
                $this->db->where('id_solicitud', $row['id_solicitud']);
                $this->db->update('solicitudes', array('status' => '6', 'mora_dias' => $row['dias_restantes'], 'mora_monto' => $mora_monto));
                $valida = '1';
            }
            if ($valida == '1') {
                $result = $this->db->query("            
        select 
               datediff(fecha_vcto_solicitud_aprobado,CURRENT_TIMESTAMP) as dias_restantes,
               inscripcion_pn.nom_apell_pn as nombre_razon_social_pn_pj,
               inscripcion_pn.cedula_pn as rif_cedula_pn_pj,
               inscripcion_pn.email_pn as email_pn_pj,
               inscripcion_pn.telefono_pn as telefono_pn_pj, solicitudes.* from solicitudes
               join inscripcion_pn using(id_cliente) 
               left join codeudores using (id_solicitud)
               where tipo_solicitud = 3 and solicitudes.status >= 0
        union
        select 
               datediff(fecha_vcto_solicitud_aprobado,CURRENT_TIMESTAMP) as dias_restantes,
               personas_juridicas.nom_rz_pj as nombre_razon_social_pn_pj,
               personas_juridicas.rif_pj as rif_cedula_pn_pj,
               personas_juridicas.email_pj as email_pn_pj, 
               personas_juridicas.telefono_pj as telefono_pn_pj, solicitudes.* from solicitudes  
               join personas_juridicas using(id_cliente)
               left join codeudores using (id_solicitud)
               where tipo_solicitud = 3 and solicitudes.status >= 0")->result_array();
            }
        }

        return $result;
    }

    public function get_all_prestamo() {

        $result = $this->db->query("            
        select 
               datediff(fecha_vcto_solicitud_aprobado,CURRENT_TIMESTAMP) as dias_restantes,
               inscripcion_pn.nom_apell_pn as nombre_razon_social_pn_pj,
               inscripcion_pn.cedula_pn as rif_cedula_pn_pj,
               inscripcion_pn.email_pn as email_pn_pj,
               inscripcion_pn.telefono_pn as telefono_pn_pj, solicitudes.* from solicitudes
               join inscripcion_pn using(id_cliente) 
               where tipo_solicitud = 4 and solicitudes.status >= 0
        union
        select 
               datediff(fecha_vcto_solicitud_aprobado,CURRENT_TIMESTAMP) as dias_restantes,
               personas_juridicas.nom_rz_pj as nombre_razon_social_pn_pj,
               personas_juridicas.rif_pj as rif_cedula_pn_pj,
               personas_juridicas.email_pj as email_pn_pj, 
               personas_juridicas.telefono_pj as telefono_pn_pj, solicitudes.* from solicitudes  
               join personas_juridicas using(id_cliente)
               where tipo_solicitud = 4 and solicitudes.status >= 0")->result_array();

        $valida = 0;
        foreach ($result as $row) {

            if ($row['dias_restantes'] < 0 and $row['status'] == '2') {
                $row['dias_restantes'] = (int) $row['dias_restantes'] * -1;
                $mora_monto = ($row['monto_solicitud_aprobado'] * 0.325 * $row['dias_restantes']) / 360;
                $this->db->where('id_solicitud', $row['id_solicitud']);
                $this->db->update('solicitudes', array('status' => '6', 'mora_dias' => $row['dias_restantes'], 'mora_monto' => $mora_monto));
                $valida = '1';
            }
            if ($row['dias_restantes'] < 0 and $row['status'] == '6') {
                $row['dias_restantes'] = (int) $row['dias_restantes'] * -1;
                $mora_monto = ($row['monto_solicitud_aprobado'] * 0.325 * $row['dias_restantes']) / 360;
                $this->db->where('id_solicitud', $row['id_solicitud']);
                $this->db->update('solicitudes', array('status' => '6', 'mora_dias' => $row['dias_restantes'], 'mora_monto' => $mora_monto));
                $valida = '1';
            }
            if ($valida == '1') {
                $result = $this->db->query("            
        select 
               datediff(fecha_vcto_solicitud_aprobado,CURRENT_TIMESTAMP) as dias_restantes,
               inscripcion_pn.nom_apell_pn as nombre_razon_social_pn_pj,
               inscripcion_pn.cedula_pn as rif_cedula_pn_pj,
               inscripcion_pn.email_pn as email_pn_pj,
               inscripcion_pn.telefono_pn as telefono_pn_pj, solicitudes.* from solicitudes
               join inscripcion_pn using(id_cliente) 
               where tipo_solicitud = 4 and solicitudes.status >= 0
        union
        select 
               datediff(fecha_vcto_solicitud_aprobado,CURRENT_TIMESTAMP) as dias_restantes,
               personas_juridicas.nom_rz_pj as nombre_razon_social_pn_pj,
               personas_juridicas.rif_pj as rif_cedula_pn_pj,
               personas_juridicas.email_pj as email_pn_pj, 
               personas_juridicas.telefono_pj as telefono_pn_pj, solicitudes.* from solicitudes  
               join personas_juridicas using(id_cliente)
               where tipo_solicitud = 4 and solicitudes.status >= 0")->result_array();
            }
        }
        return $result;
    }

    public function get_cupos($id_cliente) {
        $result = $this->db->query("select *, datediff(fecha_vcto_solicitud_aprobado,CURRENT_TIMESTAMP) as dias_restantes from solicitudes 
            where id_cliente = {$id_cliente} and tipo_solicitud = 1 and status >= 0")->result_array();
        $valida = 0;
        foreach ($result as $row) {
            if ($row['dias_restantes'] < 0) {
                $this->db->where('id_solicitud', $row['id_solicitud']);
                $this->db->update('solicitudes', array('status' => '5'));
                $valida = '1';
            }
            if ($valida == '1') {
                $result = $this->db->query("select *, datediff(fecha_vcto_solicitud_aprobado,CURRENT_TIMESTAMP) as dias_restantes from solicitudes 
                where id_cliente = {$id_cliente} and tipo_solicitud = 1 and status >= 0")->result_array();
            }
        }
        return $result;
    }

    public function get_pagare($id_cliente) {
        $result = $this->db->query("select *, datediff(fecha_vcto_solicitud_aprobado,CURRENT_TIMESTAMP) as dias_restantes from solicitudes 
            left join codeudores using (id_solicitud)
            where id_cliente = {$id_cliente} and tipo_solicitud = 3 and status > 0")->result_array();
        $valida = 0;
        foreach ($result as $row) {

            if ($row['dias_restantes'] < 0 and $row['status'] == '2') {
                $row['dias_restantes'] = (int) $row['dias_restantes'] * -1;
                $mora_monto = ($row['monto_solicitud_aprobado'] * 0.325 * $row['dias_restantes']) / 360;
                $this->db->where('id_solicitud', $row['id_solicitud']);
                $this->db->update('solicitudes', array('status' => '6', 'mora_dias' => $row['dias_restantes'], 'mora_monto' => $mora_monto));
                $valida = '1';
            }
            if ($row['dias_restantes'] < 0 and $row['status'] == '6') {
                $row['dias_restantes'] = (int) $row['dias_restantes'] * -1;
                $mora_monto = ($row['monto_solicitud_aprobado'] * 0.325 * $row['dias_restantes']) / 360;
                $this->db->where('id_solicitud', $row['id_solicitud']);
                $this->db->update('solicitudes', array('status' => '6', 'mora_dias' => $row['dias_restantes'], 'mora_monto' => $mora_monto));
                $valida = '1';
            }


            if ($valida == '1') {
                $result = $this->db->query("select *, datediff(fecha_vcto_solicitud_aprobado,CURRENT_TIMESTAMP) as dias_restantes from solicitudes 
                    left join codeudores using (id_solicitud)
            where id_cliente = {$id_cliente} and tipo_solicitud = 3 and status > 0")->result_array();
            }
        }
        return $result;
    }

    public function get_solicitud_pagare($id_solicitud) {
        return $this->db->query("select * from solicitudes
        left join personas_juridicas using(id_pj)
        left join principales_clientes using (id_pj)
        left join datos_registros using (id_pj)
        left join codeudores using (id_solicitud)
        where tipo_solicitud = 3 and id_solicitud = {$id_solicitud}")->row_array();
    }

    public function nueva_venta($form) {
        $this->db->insert('solicitudes', $form);
        return $this->db->insert_id();
    }

    public function get_ventas($id_cliente) {
//        return $this->db->get_where('solicitudes', array('id_cliente' => $id_cliente, 'tipo_solicitud' => 2, 'status >=' => 0))->result_array();
        $result = $this->db->query("select solicitudes.*, codeudores.id_codeudor, codeudores.nom_apell_codeudor, codeudores.nacionalidad_codeudor, codeudores.genero_codeudor, codeudores.cedula_codeudor ,  personas_juridicas.nom_rz_pj, datediff(fecha_vcto_solicitud_aprobado,CURRENT_TIMESTAMP) as dias_restantes from solicitudes
            join personas_juridicas using (id_pj)
            left join codeudores using (id_solicitud)
            where tipo_solicitud = 2 and solicitudes.status >= 0 and solicitudes.id_cliente = {$id_cliente}")->result_array();
        $valida = 0;
        foreach ($result as $row) {

            if ($row['dias_restantes'] < 0 and $row['status'] == '2') {
                $row['dias_restantes'] = (int) $row['dias_restantes'] * -1;
                $mora_monto = ($row['monto_solicitud_aprobado'] * 0.325 * $row['dias_restantes']) / 360;
                $this->db->where('id_solicitud', $row['id_solicitud']);
                $this->db->update('solicitudes', array('status' => '6', 'mora_dias' => $row['dias_restantes'], 'mora_monto' => $mora_monto));
                $valida = '1';
            }
            if ($row['dias_restantes'] < 0 and $row['status'] == '6') {
                $row['dias_restantes'] = (int) $row['dias_restantes'] * -1;
                $mora_monto = ($row['monto_solicitud_aprobado'] * 0.325 * $row['dias_restantes']) / 360;
                $this->db->where('id_solicitud', $row['id_solicitud']);
                $this->db->update('solicitudes', array('status' => '6', 'mora_dias' => $row['dias_restantes'], 'mora_monto' => $mora_monto));
                $valida = '1';
            }


            if ($valida == '1') {
                $result = $this->db->query("select solicitudes.*, codeudores.*, personas_juridicas.nom_rz_pj, datediff(fecha_vcto_solicitud_aprobado,CURRENT_TIMESTAMP) as dias_restantes from solicitudes
                join personas_juridicas using (id_pj)
                left join codeudores using (id_solicitud)
                where tipo_solicitud = 2 and solicitudes.status >= 0  and solicitudes.id_cliente = {$id_cliente}")->result_array();
            }
        }
        return $result;
    }

    public function get_cupo_by_id($id_solicitud) {
        $result = $this->db->query("select *, datediff(fecha_vcto_solicitud_aprobado,CURRENT_TIMESTAMP) as dias_restantes from personas_juridicas
                        left join principales_clientes using (id_pj)
                        left join datos_registros using (id_pj)
                        left join datos_bancarios using (id_pj)
                        left join solicitudes using (id_pj)
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

    public function get_pagare_by_id($id_solicitud) {
        $result = $this->db->query("select *, datediff(fecha_vcto_solicitud_aprobado,CURRENT_TIMESTAMP) as dias_restantes from personas_juridicas
                        left join principales_clientes using (id_pj)
                        left join datos_registros using (id_pj)
                        left join datos_bancarios using (id_pj)
                        left join solicitudes using (id_pj)
                        left join resumen_financiero_acc using (id_pj)
                        left join codeudores using (id_solicitud)
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

    public function get_pagare_pn_by_id($id_solicitud) {
        $result = $this->db->query("select * from inscripcion_pn
                        join solicitudes using (id_cliente)
                        left join codeudores using (id_solicitud)
                        where solicitudes.id_solicitud = {$id_solicitud}")->row_array();

        return $result;
    }

    public function get_venta_by_id_planilla($id_solicitud) {
        $result = $this->db->query("select *, datediff(fecha_vcto_solicitud_aprobado,CURRENT_TIMESTAMP) as dias_restantes from personas_juridicas
                        left join principales_clientes using (id_pj)
                        left join datos_registros using (id_pj)
                        left join datos_bancarios using (id_pj)
                        left join solicitudes using (id_pj)
                        left join codeudores using (id_solicitud)
                        where solicitudes.id_solicitud = {$id_solicitud}")->row_array();
        $nomina_accionista = $this->db->get_where('nom_accionista_empresas', array('id_pj' => $result['id_pj'], 'status >' => 0))->result_array();
        $junta_directiva = $this->db->get_where('jun_directiva_empresas', array('id_pj' => $result['id_pj'], 'status <>' => -1))->result_array();
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
        $result = $this->db->query("select *, datediff(fecha_vcto_solicitud_aprobado,CURRENT_TIMESTAMP) as dias_restantes from personas_juridicas
                        left join principales_clientes using (id_pj)
                        left join datos_registros using (id_pj)
                        left join datos_bancarios using (id_pj)
                        left join solicitudes using (id_pj)
                        left join codeudores using (id_solicitud)
                        where solicitudes.id_solicitud = {$id_solicitud}")->row_array();

        $nomina_accionista = $this->db->get_where('nom_accionista_empresas', array('id_pj' => $result['id_pj'], 'status >' => 0))->result_array();
        $junta_directiva = $this->db->get_where('jun_directiva_empresas', array('id_pj' => $result['id_pj'], 'status <>' => -1))->result_array();
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

    public function get_esperiencia($id_pj, $id_solicitud) {
        $result = $this->db->get_where('solicitudes', array('tipo_solicitud' => 2, 'id_pj' => $id_pj, 'id_solicitud <>' => $id_solicitud))->result_array();
    }

    public function get_reclasificacion($id_pj) {
        return $this->db->get_where('reclasificaciones', array('id_pj' => $id_pj))->row_array();
    }

    public function get_resumen_acc($id_pj) {
        $resumen_finan = $this->db->get_where('resumen_financiero_acc', array('id_pj' => $id_pj))->row_array();

        $resumen_finan['nom_acc_resumen'] = unserialize($resumen_finan['nom_acc_resumen']);
        $resumen_finan['ing_netos_accio'] = unserialize($resumen_finan['ing_netos_accio']);
        $resumen_finan['utl_neta_accio'] = unserialize($resumen_finan['utl_neta_accio']);
        $resumen_finan['act_cir_accio'] = unserialize($resumen_finan['act_cir_accio']);
        $resumen_finan['act_fij_accio'] = unserialize($resumen_finan['act_fij_accio']);
        $resumen_finan['otr_act_accio'] = unserialize($resumen_finan['otr_act_accio']);
        $resumen_finan['tot_act_accio'] = unserialize($resumen_finan['tot_act_accio']);
        $resumen_finan['pas_cp_accio'] = unserialize($resumen_finan['pas_cp_accio']);
        $resumen_finan['pas_lp_accio'] = unserialize($resumen_finan['pas_lp_accio']);
        $resumen_finan['otr_pas_accio'] = unserialize($resumen_finan['otr_pas_accio']);
        $resumen_finan['tot_pas_accio'] = unserialize($resumen_finan['tot_pas_accio']);
        $resumen_finan['cap_soc_accio'] = unserialize($resumen_finan['cap_soc_accio']);
        $resumen_finan['cap_con_nt_accio'] = unserialize($resumen_finan['cap_con_nt_accio']);
        $resumen_finan['tot_pas_cap_accio'] = unserialize($resumen_finan['tot_pas_cap_accio']);
        $resumen_finan['cap_trab_accio'] = unserialize($resumen_finan['cap_trab_accio']);
        $resumen_finan['solve_accio'] = unserialize($resumen_finan['solve_accio']);
        $resumen_finan['liq_accio'] = unserialize($resumen_finan['liq_accio']);

        return $resumen_finan;
    }

    public function get_resumen_pn($id_cliente) {
        $resumen_finan = $this->db->get_where('resumen_financiero_pn', array('id_cliente' => $id_cliente))->row_array();

        $resumen_finan['ing_netos_pn'] = unserialize($resumen_finan['ing_netos_pn']);
        $resumen_finan['utl_neta_pn'] = unserialize($resumen_finan['utl_neta_pn']);
        $resumen_finan['act_cir_pn'] = unserialize($resumen_finan['act_cir_pn']);
        $resumen_finan['act_fij_pn'] = unserialize($resumen_finan['act_fij_pn']);
        $resumen_finan['otr_act_pn'] = unserialize($resumen_finan['otr_act_pn']);
        $resumen_finan['tot_act_pn'] = unserialize($resumen_finan['tot_act_pn']);
        $resumen_finan['pas_cp_pn'] = unserialize($resumen_finan['pas_cp_pn']);
        $resumen_finan['pas_lp_pn'] = unserialize($resumen_finan['pas_lp_pn']);
        $resumen_finan['otr_pas_pn'] = unserialize($resumen_finan['otr_pas_pn']);
        $resumen_finan['tot_pas_pn'] = unserialize($resumen_finan['tot_pas_pn']);
        $resumen_finan['cap_soc_pn'] = unserialize($resumen_finan['cap_soc_pn']);
        $resumen_finan['cap_con_nt_pn'] = unserialize($resumen_finan['cap_con_nt_pn']);
        $resumen_finan['tot_pas_cap_pn'] = unserialize($resumen_finan['tot_pas_cap_pn']);
        $resumen_finan['cap_trab_pn'] = unserialize($resumen_finan['cap_trab_pn']);
        $resumen_finan['solve_pn'] = unserialize($resumen_finan['solve_pn']);
        $resumen_finan['liq_pn'] = unserialize($resumen_finan['liq_pn']);

        return $resumen_finan;
    }

    public function edit_monto_aprobado($id_solicitud, $monto_aprobado){
        $this->db->where('id_solicitud', $id_solicitud);
        $this->db->update('solicitudes', array('monto_solicitud_aprobado' => $monto_aprobado));
    }
    
    public function get_solicitud_venta($id_solicitud) {
        return $this->db->query("select *, datediff(fecha_vcto_solicitud_aprobado,CURRENT_TIMESTAMP) as dias_restantes from solicitudes
        left join personas_juridicas using(id_pj)
        left join principales_clientes using (id_pj)
        left join datos_registros using (id_pj)
        where tipo_solicitud = 2 and id_solicitud = {$id_solicitud}")->row_array();
    }

    public function aprobar_solicitud($id_solicitud, $form) {
        $rollover_data = $this->db->get_where('solicitudes', array('id_solicitud' => $id_solicitud))->row_array();
        $rollover = $rollover_data['rollover'];
        if (!isset($form['plazo_solicitud_aprobado'])) {
            $form['plazo_solicitud_aprobado'] = 7300;
        }

        if (isset($form['avales'])) {
            $this->db->where('id_solicitud', $id_solicitud);
            $this->db->delete('avales_contrato');
            foreach ($form['avales'] as $row) {
                $this->db->insert('avales_contrato', array('id_nom_accionista' => $row, 'id_solicitud' => $id_solicitud));
            }
            unset($form['avales']);
        }

        if ($rollover) {
            $aprobada = $rollover_data['fecha_pago'];
            $form['fecha_solicitud_aprobado'] = $aprobada;
        } else {
            $aprobada = $form['fecha_solicitud_aprobado'];
            $form['fecha_solicitud_aprobado'] = $aprobada . ' ' . date('H:i:s');
        }

        $vence = suma_fechas($aprobada, $form['plazo_solicitud_aprobado']);

        $form['fecha_vcto_solicitud_aprobado'] = $vence . ' ' . date('H:i:s');
        $result = $this->db->get_where('solicitudes', array('id_solicitud' => $id_solicitud))->row_array();
        $form['status'] = 2;
        $this->db->where('id_solicitud', $id_solicitud);
        $this->db->update('solicitudes', $form);

        $this->db->where('id_solicitud', $rollover);
        $this->db->update('solicitudes', array('status' => '5'));
    }

    public function aceptar_pagare_pj($id_solicitud, $form) {

        if (isset($form['avales'])) {
            $this->db->where('id_solicitud', $id_solicitud);
            $this->db->delete('avales_contrato');
            foreach ($form['avales'] as $row) {
                $this->db->insert('avales_contrato', array('id_nom_accionista' => $row, 'id_solicitud' => $id_solicitud));
            }
            unset($form['avales']);
        }

        $form['status'] = 7;
        $this->db->where('id_solicitud', $id_solicitud);
        $this->db->update('solicitudes', $form);
    }

    public function aceptar_pagare_pn($id_solicitud, $form) {

        if (isset($form['avales'])) {
            $this->db->where('id_solicitud', $id_solicitud);
            $this->db->delete('avales_contrato');
            foreach ($form['avales'] as $row) {
                $this->db->insert('avales_contrato', array('id_nom_accionista' => $row, 'id_solicitud' => $id_solicitud));
            }
            unset($form['avales']);
        }

        $form['status'] = 7;
        $this->db->where('id_solicitud', $id_solicitud);
        $this->db->update('solicitudes', $form);
    }

    
    public function aceptar_solicitud_venta($id_solicitud, $form) {

        if (isset($form['avales'])) {
            $this->db->where('id_solicitud', $id_solicitud);
            $this->db->delete('avales_contrato');
            foreach ($form['avales'] as $row) {
                $this->db->insert('avales_contrato', array('id_nom_accionista' => $row, 'id_solicitud' => $id_solicitud));
            }
            unset($form['avales']);
        }

        $form['status'] = 7;
        $this->db->where('id_solicitud', $id_solicitud);
        $this->db->update('solicitudes', $form);
    }

    public function reverso($form) {
        $this->db->where('id_solicitud', $form['id_solicitud']);
        $this->db->update('solicitudes', $form);
    }

    public function acepta_pagare($id_solicitud) {
        $this->db->where('id_solicitud', $id_solicitud);
        $this->db->update('solicitudes', array('status' => 1));
    }

    public function get_firmantes_contrato($id_solicitud) {
        return $this->db->query("select * from firma_contrato_marco
                                join jun_directiva_empresas using(id_jun_directiva)
                                where id_solicitud = {$id_solicitud}")->result_array();
    }

    public function get_firmantes_contrato_idpj($id_pj) {
        return $this->db->query("select * from  firma_contrato_marco
                                join solicitudes using(id_solicitud)
                                join jun_directiva_empresas using(id_jun_directiva)
                                where solicitudes.id_pj = {$id_pj} and tipo_solicitud = 1 and solicitudes.status = 2")->result_array();
    }

    public function get_avales_contrato($id_solicitud) {
        return $this->db->query("select *, cedula_na as cedula_pn from avales_contrato
                                join nom_accionista_empresas using(id_nom_accionista)
                                where id_solicitud = {$id_solicitud}")->result_array();
    }

    public function get_exp_interna($id_pj, $id_solicitud) {
        return $this->db->query("select * from solicitudes
        where tipo_solicitud = 2 and id_pj = {$id_pj} and id_solicitud <> {$id_solicitud} ")->result_array();
    }

    public function get_exp_interna_pagare($id_pj, $id_solicitud) {
        return $this->db->query("select * from solicitudes
        where tipo_solicitud = 3 and id_pj = {$id_pj} and id_solicitud <> {$id_solicitud} ")->result_array();
    }

    public function get_exp_interna_pagare_pn($id_cliente, $id_solicitud) {
        return $this->db->query("select * from solicitudes
        where tipo_solicitud = 3 and id_cliente = {$id_cliente} and id_solicitud <> {$id_solicitud} ")->result_array();
    }

    public function rechazar($id_solicitud) {
        $this->db->where('id_solicitud', $id_solicitud);
        $this->db->update('solicitudes', array('status' => 3));
    }

    public function eliminar($id_solicitud) {
        $this->db->where('id_solicitud', $id_solicitud);
        $this->db->update('solicitudes', array('status' => -1));
    }

    public function get_cupo_activo($id_pj) {
        return $this->db->query("select * from solicitudes
                                where solicitudes.id_pj = {$id_pj} and tipo_solicitud = 1 and solicitudes.status = 2")->row_array();
    }

    public function get_avales($id_pj) {
        return $this->db->query("select * from avales_contrato
                                join solicitudes using(id_solicitud)
                                join nom_accionista_empresas using (id_nom_accionista)
                                where solicitudes.id_pj = {$id_pj} and tipo_solicitud = 1 and solicitudes.status = 2")->result_array();
    }

    public function get_rep_legal($id_pj) {
        return $this->db->get_where('representantes_legales_pj', array('id_pj' => $id_pj))->row_array();
    }

    public function get_operaciones_reportes() {
        return $this->db->query("            
        select 
               datediff(fecha_vcto_solicitud_aprobado,CURRENT_TIMESTAMP) as dias_restantes,
               inscripcion_pn.nom_apell_pn as nombre_razon_social_pn_pj,
               inscripcion_pn.cedula_pn as rif_cedula_pn_pj,
               inscripcion_pn.email_pn as email_pn_pj,
               inscripcion_pn.telefono_pn as telefono_pn_pj, solicitudes.* from solicitudes
               join inscripcion_pn using(id_cliente) 
               where tipo_solicitud <> 1 and solicitudes.status > 1
        union
        select 
               datediff(fecha_vcto_solicitud_aprobado,CURRENT_TIMESTAMP) as dias_restantes,
               personas_juridicas.nom_rz_pj as nombre_razon_social_pn_pj,
               personas_juridicas.rif_pj as rif_cedula_pn_pj,
               personas_juridicas.email_pj as email_pn_pj, 
               personas_juridicas.telefono_pj as telefono_pn_pj, solicitudes.* from solicitudes  
               join personas_juridicas using(id_cliente)
               where tipo_solicitud <> 1 and solicitudes.status > 1")->result_array();
    }

    public function get_operaciones_reportes_vcto() {
        return $this->db->query("            
        (select 
               datediff(fecha_vcto_solicitud_aprobado,CURRENT_TIMESTAMP) as dias_restantes,
               inscripcion_pn.nom_apell_pn as nombre_razon_social_pn_pj,
               inscripcion_pn.cedula_pn as rif_cedula_pn_pj,
               inscripcion_pn.email_pn as email_pn_pj,
               inscripcion_pn.telefono_pn as telefono_pn_pj, solicitudes.* from solicitudes
               join inscripcion_pn using(id_cliente) 
               where tipo_solicitud <> 1 and solicitudes.status > 1 order by fecha_vcto_solicitud_aprobado asc)
        union
        (select 
               datediff(fecha_vcto_solicitud_aprobado,CURRENT_TIMESTAMP) as dias_restantes,
               personas_juridicas.nom_rz_pj as nombre_razon_social_pn_pj,
               personas_juridicas.rif_pj as rif_cedula_pn_pj,
               personas_juridicas.email_pj as email_pn_pj, 
               personas_juridicas.telefono_pj as telefono_pn_pj, solicitudes.* from solicitudes  
               join personas_juridicas using(id_cliente)
               where tipo_solicitud <> 1 and solicitudes.status > 1 order by fecha_vcto_solicitud_aprobado asc)order by fecha_vcto_solicitud_aprobado asc")->result_array();
    }

    public function get_operaciones_reportes_cliente_vcto() {
        return $this->db->query("            
        (select 
               datediff(fecha_vcto_solicitud_aprobado,CURRENT_TIMESTAMP) as dias_restantes,
               inscripcion_pn.nom_apell_pn as nombre_razon_social_pn_pj,
               inscripcion_pn.cedula_pn as rif_cedula_pn_pj,
               inscripcion_pn.email_pn as email_pn_pj,
               inscripcion_pn.telefono_pn as telefono_pn_pj, solicitudes.* from solicitudes
               join inscripcion_pn using(id_cliente) 
               where tipo_solicitud <> 1 and solicitudes.status > 1 order by fecha_vcto_solicitud_aprobado asc)
        union
        (select 
               datediff(fecha_vcto_solicitud_aprobado,CURRENT_TIMESTAMP) as dias_restantes,
               personas_juridicas.nom_rz_pj as nombre_razon_social_pn_pj,
               personas_juridicas.rif_pj as rif_cedula_pn_pj,
               personas_juridicas.email_pj as email_pn_pj, 
               personas_juridicas.telefono_pj as telefono_pn_pj, solicitudes.* from solicitudes  
               join personas_juridicas using(id_cliente)
               where tipo_solicitud <> 1 and solicitudes.status > 1 order by fecha_vcto_solicitud_aprobado asc)order by nombre_razon_social_pn_pj asc")->result_array();
    }

    public function get_operaciones_reportes_tipo_vcto() {
        return $this->db->query("            
        (select 
               datediff(fecha_vcto_solicitud_aprobado,CURRENT_TIMESTAMP) as dias_restantes,
               inscripcion_pn.nom_apell_pn as nombre_razon_social_pn_pj,
               inscripcion_pn.cedula_pn as rif_cedula_pn_pj,
               inscripcion_pn.email_pn as email_pn_pj,
               inscripcion_pn.telefono_pn as telefono_pn_pj, solicitudes.* from solicitudes
               join inscripcion_pn using(id_cliente) 
               where tipo_solicitud <> 1 and solicitudes.status > 1 order by fecha_vcto_solicitud_aprobado asc)
        union
        (select 
               datediff(fecha_vcto_solicitud_aprobado,CURRENT_TIMESTAMP) as dias_restantes,
               personas_juridicas.nom_rz_pj as nombre_razon_social_pn_pj,
               personas_juridicas.rif_pj as rif_cedula_pn_pj,
               personas_juridicas.email_pj as email_pn_pj, 
               personas_juridicas.telefono_pj as telefono_pn_pj, solicitudes.* from solicitudes  
               join personas_juridicas using(id_cliente)
               where tipo_solicitud <> 1 and solicitudes.status > 1 order by fecha_vcto_solicitud_aprobado asc)order by tipo_solicitud asc")->result_array();
    }

    public function cierra_operacion($id_solicitud) {
        $this->db->where('id_solicitud', $id_solicitud);
        $this->db->update('solicitudes', array('status' => '5'));
    }

    public function notificacion_enviada($notificacion, $id_solicitud) {
        $this->db->where('id_solicitud', $id_solicitud);
        $this->db->update('solicitudes', array('notificacion' => $notificacion));
    }

    public function automatico() {

        $result = $this->db->query("select solicitudes.*, personas_juridicas.nom_rz_pj, datediff(fecha_vcto_solicitud_aprobado,CURRENT_TIMESTAMP) as dias_restantes from solicitudes
            join personas_juridicas using (id_pj)
            where tipo_solicitud > 1 and solicitudes.status >= 0")->result_array();

        $valida = 0;
        foreach ($result as $row) {

            if ($row['dias_restantes'] < 0 and $row['status'] == '2') {
                $row['dias_restantes'] = (int) $row['dias_restantes'] * -1;
                $mora_monto = ($row['monto_solicitud_aprobado'] * 0.325 * $row['dias_restantes']) / 360;
                $this->db->where('id_solicitud', $row['id_solicitud']);
                $this->db->update('solicitudes', array('status' => '6', 'mora_dias' => $row['dias_restantes'], 'mora_monto' => $mora_monto));
                $valida = '1';
            }
            if ($row['dias_restantes'] < 0 and $row['status'] == '6') {
                $row['dias_restantes'] = (int) $row['dias_restantes'] * -1;
                $mora_monto = ($row['monto_solicitud_aprobado'] * 0.325 * $row['dias_restantes']) / 360;
                $this->db->where('id_solicitud', $row['id_solicitud']);
                $this->db->update('solicitudes', array('status' => '6', 'mora_dias' => $row['dias_restantes'], 'mora_monto' => $mora_monto));
                $valida = '1';
            }


            if ($valida == '1') {
                $result = $this->db->query("select solicitudes.*, personas_juridicas.nom_rz_pj, datediff(fecha_vcto_solicitud_aprobado,CURRENT_TIMESTAMP) as dias_restantes from solicitudes
            join personas_juridicas using (id_pj)
            where tipo_solicitud > 1 and solicitudes.status >= 0")->result_array();
            }
        }
        return $result;
    }

    public function agregar_codeudor($form) {
        $this->db->insert('codeudores', $form);
    }

}
