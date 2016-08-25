<?php

// Modelo del Panel Public
class Pla_Inscrip_Model extends Base_Model {

    public function __construct() {
        parent::__construct();

        if (!$this->db->table_exists('personas_juridicas')) {
            $this->create_table_pj();
        }
        if (!$this->db->table_exists('perfil_empresas')) {
            $this->create_table_perfil_empresa();
        }
        if (!$this->db->table_exists('principales_clientes')) {
            $this->create_table_principales_clientes();
        }
        if (!$this->db->table_exists('datos_registros')) {
            $this->create_table_registro_empresa();
        }
        if (!$this->db->table_exists('datos_bancarios')) {
            $this->create_table_datos_bancarios();
        }
        if (!$this->db->table_exists('nom_accionista_empresas')) {
            $this->create_table_nom_accionista();
        }
        if (!$this->db->table_exists('jun_directiva_empresas')) {
            $this->create_table_jun_directiva();
        }
        if (!$this->db->table_exists('inscripcion_pn')) {
            $this->create_table_inscripcion_pn();
        }
        if (!$this->db->table_exists('representantes_legales_pj')) {
            $this->create_table_representantes_legales_pj();
        }
    }

    public function create_table_pj() {
        $this->db->query("
                    CREATE TABLE `personas_juridicas` (
                            `id_pj` int(11) NOT NULL auto_increment,
                            `id_cliente` int(11) NOT NULL,
                            `nacionalidad_emp` varchar(3) NOT NULL,
                            `nom_rz_pj` varchar(255) NOT NULL,
                            `rif_pj` varchar(255) NOT NULL,
                            `telefono_pj` varchar(32) NOT NULL,
                            `email_pj` varchar(255) NOT NULL,
                            `direccion_pj` text NOT NULL,
                            `status` tinyint(4) NOT NULL default '1',
                            PRIMARY KEY (`id_pj`)
                    ) DEFAULT CHARSET=utf8;");

        $this->db->query('ALTER TABLE `personas_juridicas` ENGINE = InnoDB');
    }

    public function create_table_representantes_legales_pj() {
        $this->db->query("
                    CREATE TABLE `representantes_legales_pj` (
                            `id_repl_pj` int(11) NOT NULL auto_increment,
                            `id_pj` int(11) NOT NULL,
                            `nom_apell_repl` varchar(255) NOT NULL,
                            `nacionalidad_repl` varchar(255) NOT NULL,
                            `cedula_repl` varchar(32) NOT NULL,
                            `sexo_repl` varchar(32) NOT NULL,
                            `cargo_repl` varchar(32) NOT NULL,
                            `status` tinyint(4) NOT NULL default '1',
                            PRIMARY KEY (`id_repl_pj`)
                    ) DEFAULT CHARSET=utf8;");

        $this->db->query('ALTER TABLE `representantes_legales_pj` ENGINE = InnoDB');
    }

    public function create_table_perfil_empresa() {
        $this->db->query("
                    CREATE TABLE `perfil_empresas` (
                            `id_perfil_empresa` int(11) NOT NULL auto_increment,
                            `id_pj` int(11) NOT NULL,
                            `ing_anuales_pe` text NOT NULL,
                            `activo_pt` float(11,2) NOT NULL,
                            `pasivo_pt` float(11,2) NOT NULL,
                            `cap_soc_pt` float(11,2) NOT NULL,
                            `cap_con_pt` float(11,2) NOT NULL,
                            `experiencia_pt` text NOT NULL,
                            `tipo_inversion_pt` text NOT NULL,
                            `status` tinyint(4) NOT NULL default '1',
                            PRIMARY KEY  (`id_perfil_empresa`)
                    ) DEFAULT CHARSET=utf8;");

        $this->db->query('ALTER TABLE `perfil_empresas` ENGINE = InnoDB');
    }

    public function create_table_principales_clientes() {
        $this->db->query("
                    CREATE TABLE `principales_clientes` (
                            `id_principales_clientes` int(11) NOT NULL auto_increment,
                            `id_pj` int(11) NOT NULL,
                            `nombre_rz_pc` text NOT NULL,
                            `num_rif_pc` varchar(255) NOT NULL,
                            `persona_contacto_pc` text NOT NULL,
                            `tel_email_pc` text NOT NULL,
                            `status` tinyint(4) NOT NULL default '1',
                            PRIMARY KEY  (`id_principales_clientes`)
                    ) DEFAULT CHARSET=utf8;");

        $this->db->query('ALTER TABLE `principales_clientes` ENGINE = InnoDB');
    }

    public function create_table_registro_empresa() {
        $this->db->query("
                    CREATE TABLE `datos_registros` (
                            `id_registro_empresa` int(11) NOT NULL auto_increment,
                            `id_pj` int(11) NOT NULL,
                            `of_reg_pj` text NOT NULL,
                            `nom_reg_pj` varchar(60) NOT NULL,
                            `num_reg_pj` varchar(11) NOT NULL,
                            `num_doc_pj` varchar(30),
                            `num_ficha_pj` varchar(30),
                            `tomo_reg_pj` varchar(11) NOT NULL,
                            `fecha_reg_pj` date NOT NULL,
                            `ciudad_reg_pj` varchar(60) NOT NULL,
                            `estado_reg_pj` varchar(60) NOT NULL,
                            `dura_reg_pj` int(11) NOT NULL,
                            `num_emp_reg_pj` int(11) NOT NULL,
                            `rep_leg_reg_pj` varchar(70) NOT NULL,
                            `status` tinyint(4) NOT NULL default '1',
                            PRIMARY KEY  (`id_registro_empresa`)
                    ) DEFAULT CHARSET=utf8;");

        $this->db->query('ALTER TABLE `datos_registros` ENGINE = InnoDB');
    }

    public function create_table_datos_bancarios() {
        $this->db->query("
                    CREATE TABLE `datos_bancarios` (
                            `id_dat_banca_empresa` int(11) NOT NULL auto_increment,
                            `id_pj` int(11) NOT NULL,
                            `banco_ref_pj` text NOT NULL,
                            `n_cuenta_ref_pj` text NOT NULL,
                            `cuenta_ref_pj` text NOT NULL,
                            `status` tinyint(4) NOT NULL default '1',
                            PRIMARY KEY  (`id_dat_banca_empresa`)
                    ) DEFAULT CHARSET=utf8;");

        $this->db->query('ALTER TABLE `datos_bancarios` ENGINE = InnoDB');
    }

    public function create_table_nom_accionista() {
        $this->db->query("
                    CREATE TABLE `nom_accionista_empresas` (
                            `id_nom_accionista` int(11) NOT NULL auto_increment,
                            `id_pj` int(11) NOT NULL,
                            `nom_raz_na` varchar(60) NOT NULL,
                            `nacionalidad_na` varchar(60) NOT NULL,
                            `genero_na`  varchar(6) NOT NULL,
                            `cedula_na` varchar(60) NOT NULL,
                            `cap_sus_na` float(11,2) NOT NULL,
                            `cap_pag_na` float(11,2) NOT NULL,
                            `status` tinyint(4) NOT NULL default '1',
                            PRIMARY KEY  (`id_nom_accionista`)
                    ) DEFAULT CHARSET=utf8;");

        $this->db->query('ALTER TABLE `nom_accionista_empresas` ENGINE = InnoDB');
    }

    public function create_table_jun_directiva() {
        $this->db->query("
                    CREATE TABLE `jun_directiva_empresas` (
                            `id_jun_directiva` int(11) NOT NULL auto_increment,
                            `id_pj` int(11) NOT NULL,
                            `nombres_dir` varchar(60) NOT NULL,
                            `apellidos_dir` varchar(60) NOT NULL,
                            `nacionalidad_dir` varchar(80) NOT NULL,
                            `genero_dir`  varchar(6) NOT NULL,
                            `cedula_dir` varchar(60) NOT NULL,
                            `cargo_dir` varchar(60) NOT NULL,
                            `tipo_firma_dir` TEXT NOT NULL,
                            `status` tinyint(4) NOT NULL default '1',
                            PRIMARY KEY  (`id_jun_directiva`)
                    ) DEFAULT CHARSET=utf8;");

        $this->db->query('ALTER TABLE `jun_directiva_empresas` ENGINE = InnoDB');
    }

    public function create_table_inscripcion_pn() {
        $this->db->query(" CREATE TABLE `inscripcion_pn` (
                            `id_pn` int(11) NOT NULL auto_increment,
                            `id_jun_directiva` int(11) NOT NULL default '0',
                            `id_cliente` int(11) NOT NULL default '0',
                            `nom_apell_pn` varchar(255) NOT NULL,
                            `nacionalidad_pn` varchar(255) NOT NULL,
                            `cedula_pn` varchar(255) NOT NULL,
                            `sexo_pn` varchar(255) NOT NULL,
                            `lug_nac_pn` varchar(255) NOT NULL,
                            `fecha_nac_pn` varchar(255) NOT NULL,
                            `o_naciona_pn` varchar(255) NOT NULL,
                            `e_civil_pn` varchar(255) NOT NULL,
                            `nom_apell_cony` varchar(255) NOT NULL,
                            `nacionalidad_cony` varchar(255) NOT NULL,
                            `cedula_cony` varchar(255) NOT NULL,                            
                            `telefono_cony` varchar(255) NOT NULL,                            
                            `telefono_pn` varchar(255) NOT NULL,
                            `email_pn` varchar(255) NOT NULL,
                            `direccion_pn` varchar(255) NOT NULL,
                            `banco_ref_pn` varchar(255) NOT NULL,
                            `n_cuenta_ref_pn` varchar(255) NOT NULL,
                            `cuenta_ref_pn` varchar(255) NOT NULL,
                            `nom_rz_dl_pn` varchar(255) NOT NULL,
                            `rif_dl_pn` varchar(255) NOT NULL,
                            `telefono_dl_pn` varchar(255) NOT NULL,
                            `email_dl_pn` varchar(255) NOT NULL,
                            `direccion_dl_pn` varchar(255) NOT NULL,
                            `act_aeco_dl_pn` varchar(255) NOT NULL,
                            `cargo_dl_pn` varchar(255) NOT NULL,
                            `ant_dl_pn` varchar(255) NOT NULL,
                            `exp_con_neg_pc` varchar(255) NOT NULL,
                            `o_inversion_pn` varchar(255) NOT NULL,
                            `n_academico_pn` varchar(255) NOT NULL,
                            `activo_pn` VARCHAR( 260 ) NOT NULL,
                            `pasivo_pn` VARCHAR( 260 ) NOT NULL,
                            `ing_anua_pn` varchar(255) NOT NULL,
                            `pat_total_pn` varchar(255) NOT NULL,
                            `status` tinyint(4) NOT NULL default '1',
                            PRIMARY KEY  (`id_pn`)
                    ) DEFAULT CHARSET=utf8;");

        $this->db->query('ALTER TABLE `inscripcion_pn` ENGINE = InnoDB');
    }

    public function salvar_planilla_inscripcion($id_cliente) {
        $form = $this->input->post();

        // Persona Juridica
        $p_j["nom_rz_pj"] = $form["nom_rz_pj"];
        $p_j["rif_pj"] = $form["rif_pj"];
        $p_j["telefono_pj"] = $form["telefono_pj"];
        $p_j["email_pj"] = $form["email_pj"];
        $p_j["direccion_pj"] = $form["direccion_pj"];
        $p_j["nacionalidad_emp"] = $form["nacionalidad_emp"];
        //principales Cientes
        $p_c['nombre_rz_pc'] = serialize($form["nombre_rz_pc"]);
        $p_c['num_rif_pc'] = serialize($form["num_rif_pc"]);
        $p_c['persona_contacto_pc'] = serialize($form["persona_contacto_pc"]);
        $p_c['tel_email_pc'] = serialize($form["tel_email_pc"]);
        // Registro de la empresa
        $r_e["num_doc_pj"] = $form["num_doc_pj"];
        $r_e["num_ficha_pj"] = $form["num_ficha_pj"];
        $r_e["of_reg_pj"] = $form["of_reg_pj"];
        $r_e["nom_reg_pj"] = $form["of_reg_pj"];
        $r_e["num_reg_pj"] = $form["num_reg_pj"];
        $r_e["tomo_reg_pj"] = $form["tomo_reg_pj"];
        $r_e["fecha_reg_pj"] = $form["fecha_reg_pj"];
        $r_e["ciudad_reg_pj"] = $form["ciudad_reg_pj"];
        $r_e["estado_reg_pj"] = $form["estado_reg_pj"];
        $r_e["dura_reg_pj"] = $form["dura_reg_pj"];
        $r_e["num_emp_reg_pj"] = $form["num_emp_reg_pj"];
        // Datos Bancarios
        $d_b["banco_ref_pj"] = serialize($form["banco_ref_pj"]);
        $d_b["n_cuenta_ref_pj"] = serialize($form["n_cuenta_ref_pj"]);
        $d_b["cuenta_ref_pj"] = serialize($form["cuenta_ref_pj"]);

        // Nomina de accionista
        if ($form["nom_raz_na"] || $form["nacionalidad_na"] || $form["genero_na"] || $form["cedula_na"]) {
            $n_a["nom_raz_na"] = $form["nom_raz_na"];
            $n_a["nacionalidad_na"] = $form["nacionalidad_na"];
            $n_a["genero_na"] = $form["genero_na"];
            $n_a["cedula_na"] = $form["cedula_na"];
            $n_a["cedula_na_valida"] = $form["cedula_na_valida"];
            $n_a["cap_sus_na"] = $form["cap_sus_na"];
            $n_a["cap_pag_na"] = $form["cap_pag_na"];
            foreach ($n_a["cap_sus_na"] as &$row) {
                $row = str_replace('.', '', $row);
            }
            foreach ($n_a["cap_pag_na"] as &$row) {
                $row = str_replace('.', '', $row);
            }
            foreach ($n_a["cap_sus_na"] as &$row) {
                $row = str_replace(',', '.', $row);
            }
            foreach ($n_a["cap_pag_na"] as &$row) {
                $row = str_replace(',', '.', $row);
            }
            foreach ($n_a["cedula_na"] as &$row) {
                $row = str_replace('.', '', $row);
            }

            $n_a = $this->arreglo($n_a);
        }

        // Junta Directiva
        $j_d["nombres_dir"] = $form["nombres_dir"];
        $j_d["apellidos_dir"] = $form["apellidos_dir"];
        $j_d["nacionalidad_dir"] = $form["nacionalidad_dir"];
        $j_d["genero_dir"] = $form["genero_dir"];
        $j_d["cedula_dir"] = $form["cedula_dir"];
        $j_d["cedula_dir_valida"] = $form["cedula_dir_valida"];
        foreach ($j_d["cedula_dir"] as &$row) {
            $row = str_replace('.', '', $row);
        }
        $j_d["cargo_dir"] = $form["cargo_dir"];
        $j_d["tipo_firma_dir"] = $form["tipo_firma_dir"];
        $j_d = $this->arreglo($j_d);

        // Representante Legal
        $repl['nom_apell_repl'] = $form["nom_apell_repl"];
        $repl['nacionalidad_repl'] = $form["nacionalidad_repl"];
        $repl['cedula_repl'] = $form["cedula_repl"];
        $repl['cedula_repl'] = str_replace('.', '', $repl['cedula_repl']);
        $repl['cargo_repl'] = $form["cargo_repl"];
        $repl['sexo_repl'] = $form["sexo_repl"];

        $verifica_email = $this->db->get_where('personas_juridicas', array('id_cliente' => $id_cliente))->row_array();
        $id_cliente = $this->session->userdata['user_data_cliente']['id_cliente'];
        if (count($verifica_email) > 0) {
            $id_pj = $verifica_email['id_pj'];
            $p_e['id_pj'] = $id_pj;
            $r_e['id_pj'] = $id_pj;
            $d_b['id_pj'] = $id_pj;
            $p_c['id_pj'] = $id_pj;
            $repl['id_pj'] = $id_pj;
            $this->db->where('id_pj', $id_pj);

            $this->db->update('personas_juridicas', $p_j);

            $this->db->delete('representantes_legales_pj', array('id_pj' => $id_pj));
            $this->db->delete('principales_clientes', array('id_pj' => $id_pj));

            $this->db->delete('datos_registros', array('id_pj' => $id_pj));
            $this->db->delete('datos_bancarios', array('id_pj' => $id_pj));

            $this->db->insert('representantes_legales_pj', $repl);
            $this->db->insert('datos_bancarios', $d_b);
            $this->db->insert('datos_registros', $r_e);
            $this->db->insert('principales_clientes', $p_c);

            foreach ($j_d as $row) {
                $row['id_pj'] = $id_pj;
                $cedula_valida = $row['cedula_dir_valida'];
                unset($row['cedula_dir_valida']);
                $valid = $this->db->get_where('jun_directiva_empresas', array('id_pj' => $id_pj, 'cedula_dir' => $cedula_valida))->row_array();
                if (count($valid) > 0) {
                    $this->db->where('cedula_dir', $cedula_valida);
                    $this->db->update('jun_directiva_empresas', $row);
                } else {
                    $this->db->insert('jun_directiva_empresas', $row);
                }
            }
            if ($n_a) {
                foreach ($n_a as $row) {
                    $cedula_valida_na = $row['cedula_na_valida'];
                    unset($row['cedula_na_valida']);
                    $valida = $this->db->get_where('nom_accionista_empresas', array('cedula_na' => $cedula_valida_na))->row_array();
                    if (count($valida) > 0) {
                        $row['status'] = 1;
                        $this->db->where('cedula_na', $cedula_valida_na);
                        $this->db->update('nom_accionista_empresas', $row);
                    } else {
                        $row['id_pj'] = $id_pj;
                        $this->db->insert('nom_accionista_empresas', $row);
                    }
                }
            }
        } else {
            $p_j['id_cliente'] = $id_cliente;
            $this->db->insert('personas_juridicas', $p_j);
            $id_pj = $this->db->insert_id();
            $p_e['id_pj'] = $id_pj;
            $r_e['id_pj'] = $id_pj;
            $d_b['id_pj'] = $id_pj;
            $p_c['id_pj'] = $id_pj;
            $repl['id_pj'] = $id_pj;

//            $this->db->insert('perfil_empresas', $p_e);
            $this->db->insert('datos_registros', $r_e);
            $this->db->insert('datos_bancarios', $d_b);
            $this->db->insert('principales_clientes', $p_c);
            $this->db->insert('representantes_legales_pj', $repl);

            foreach ($n_a as $row) {
                $row['id_pj'] = $id_pj;
                $this->db->insert('nom_accionista_empresas', $row);
            }
            foreach ($j_d as $row) {
                $row['id_pj'] = $id_pj;
                $this->db->insert('jun_directiva_empresas', $row);
            }
        }

        $result = $this->db->query("select * from personas_juridicas
                        left join principales_clientes using (id_pj)
                        left join datos_registros using (id_pj)
                        left join datos_bancarios using (id_pj)
                        left join representantes_legales_pj using (id_pj)
                        where id_pj = {$id_pj}")->row_array();
        $nomina_accionista = $this->db->get_where('nom_accionista_empresas', array('id_pj' => $id_pj, 'status >' => 0))->result_array();
        $junta_directiva = $this->db->get_where('jun_directiva_empresas', array('id_pj' => $id_pj, 'status >' => 0))->result_array();
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

    public function arreglo($datos) {
        $x = $datos;
        foreach ($x as $key => $value) {
            $dim = count($value);
            $keys[] = $key;
            $values[] = $value;
        }
        $j = 0;
        for ($i = 1; $i <= $dim; $i++) {
            $arreglo[$j] = $keys;
            $j++;
        }
        $j = 0;
        foreach ($arreglo as &$row) {
            $din_row = count($row);
            for ($i = 0; $i < $din_row; $i++) {
                $row[$row[$i]] = $values[$i][$j];
                unset($row[$i]);
            }
            $j++;
        }
        return $arreglo;
    }

    public function get_planilla_empresa($id_pj) {
        $result = $this->db->query("select * from personas_juridicas
                        left join principales_clientes using (id_pj)
                        left join datos_registros using (id_pj)
                        left join datos_bancarios using (id_pj)
                        left join representantes_legales_pj using (id_pj)
                        where id_pj = {$id_pj}")->row_array();
        $nomina_accionista = $this->db->get_where('nom_accionista_empresas', array('id_pj' => $id_pj, 'status >' => 0))->result_array();
        $junta_directiva = $this->db->get_where('jun_directiva_empresas', array('id_pj' => $id_pj, 'status >' => 0))->result_array();
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

    public function get_id_pj($id_cliente) {
        $this->db->get_where('personas_juridicas', array('id_cliente' => $id_cliente, 'status >' => 0))->row_array();
        $resultado = $this->db->get_where('personas_juridicas', array('id_cliente' => $id_cliente, 'status >' => 0))->row_array();
        if (count($resultado) > 0) {
            $id = $resultado['id_pj'];
        } else {
            $id = null;
        }

        return $id;
    }

    public function get_accionista($id_accionista) {
        return $this->db->get_where('nom_accionista_empresas', array('id_nom_accionista' => $id_accionista, 'status >' => 0))->row_array();
    }

    public function get_directivo($id_directivo) {
        return $this->db->get_where('jun_directiva_empresas', array('id_jun_directiva' => $id_directivo, 'status >' => 0))->row_array();
    }

    public function salvar_ficha_pn_pj() {
        $form = $this->input->post();
        $form['cedula_pn'] = str_replace('.', '', $form['cedula_pn']);
        $form['activo_pn'] = str_replace('.', '', $form['activo_pn']);
        $form['pasivo_pn'] = str_replace('.', '', $form['pasivo_pn']);
        $form['ing_anua_pn'] = str_replace('.', '', $form['ing_anua_pn']);
        $form['pat_total_pn'] = str_replace('.', '', $form['pat_total_pn']);
        $form['activo_pn'] = str_replace(',', '.', $form['activo_pn']);
        $form['pasivo_pn'] = str_replace(',', '.', $form['pasivo_pn']);
        $form['ing_anua_pn'] = str_replace(',', '.', $form['ing_anua_pn']);
        $form['pat_total_pn'] = str_replace(',', '.', $form['pat_total_pn']);

        $form["banco_ref_pn"] = serialize($form["banco_ref_pn"]);
        $form["n_cuenta_ref_pn"] = serialize($form["n_cuenta_ref_pn"]);
        $form["cuenta_ref_pn"] = serialize($form["cuenta_ref_pn"]);

        $valida = $this->db->get_where('inscripcion_pn', array('id_jun_directiva' => $form['id_jun_directiva'], 'status >' => 0))->row_array();

        if (!$valida) {
            $valida = $this->db->get_where('inscripcion_pn', array('cedula_pn' => $form['cedula_pn'], 'status >' => 0))->row_array();
        }

        if (count($valida) > 0) {
            if (!$valida['id_jun_directiva']) {
                $this->db->where('cedula_pn', $form['cedula_pn']);
                $this->db->update('inscripcion_pn', $form);
            } else {
                $this->db->where('id_jun_directiva', $form['id_jun_directiva']);
                $this->db->update('inscripcion_pn', $form);
            }
        } else {
            $this->db->insert('inscripcion_pn', $form);
            $form['id_jun_directiva'] = $this->db->insert_id();
        }

        return $this->db->get_where('inscripcion_pn', array('id_jun_directiva' => $form['id_jun_directiva'], 'status >' => 0))->row_array();
    }

    public function get_ficha_pn_pj($id_directivo = 0) {
        $result = $this->db->get_where('inscripcion_pn', array('id_jun_directiva' => $id_directivo, 'status >' => 0))->row_array();
        if (count($result) > 0) {
            $result['banco_ref_pn'] = unserialize(@$result['banco_ref_pn']);
            $result['n_cuenta_ref_pn'] = unserialize(@$result['n_cuenta_ref_pn']);
            $result['cuenta_ref_pn'] = unserialize(@$result['cuenta_ref_pn']);
        }
        return $result;
    }

    public function delete_directivo($id_jun_directiva) {
        $this->db->delete('jun_directiva_empresas', array('id_jun_directiva' => $id_jun_directiva));
    }

    public function delete_accionista_by_id($id_nom_accionista) {
        $this->db->where('id_nom_accionista', $id_nom_accionista);
        $this->db->update('nom_accionista_empresas', array('status' => -1));
    }

    public function salvar_planilla_inscripcion_pn() {

        $form = $this->input->post();
        $form['cedula_pn'] = str_replace('.', '', $form['cedula_pn']);
        $form['activo_pn'] = str_replace('.', '', $form['activo_pn']);
        $form['pasivo_pn'] = str_replace('.', '', $form['pasivo_pn']);
        $form['ing_anua_pn'] = str_replace('.', '', $form['ing_anua_pn']);
        $form['pat_total_pn'] = str_replace('.', '', $form['pat_total_pn']);

        $form['activo_pn'] = str_replace(',', '.', $form['activo_pn']);
        $form['pasivo_pn'] = str_replace(',', '.', $form['pasivo_pn']);
        $form['ing_anua_pn'] = str_replace(',', '.', $form['ing_anua_pn']);
        $form['pat_total_pn'] = str_replace(',', '.', $form['pat_total_pn']);

        $form['id_cliente'] = @$this->session->userdata['user_data_cliente']['id_cliente'];
        $form["banco_ref_pn"] = serialize($form["banco_ref_pn"]);
        $form["n_cuenta_ref_pn"] = serialize($form["n_cuenta_ref_pn"]);
        $form["cuenta_ref_pn"] = serialize($form["cuenta_ref_pn"]);

        $valida = $this->db->get_where('inscripcion_pn', array('id_cliente' => $form['id_cliente'], 'status >' => 0))->row_array();

        if (!$valida) {
            $valida = $this->db->get_where('inscripcion_pn', array('cedula_pn' => $form['cedula_pn'], 'status >' => 0))->row_array();
            $cedula = true;
        }else{
            $cedula = false;
        }

        if (count($valida) > 0) {
            if ($cedula) {
                $this->db->where('cedula_pn', $form['cedula_pn']);
                $this->db->update('inscripcion_pn', $form);
            } else {
                $this->db->where('id_cliente', $form['id_cliente']);
                $this->db->update('inscripcion_pn', $form);
            }
        } else {
            $this->db->insert('inscripcion_pn', $form);
        }

        return $this->db->get_where('inscripcion_pn', array('id_cliente' => $form['id_cliente'], 'status >' => 0))->row_array();
    }

    public function get_planilla_pn($id_cliente = 0) {
        $result = $this->db->get_where('inscripcion_pn', array('id_cliente' => $id_cliente, 'status >' => 0))->row_array();
        if (count($result) > 0) {
            $result['banco_ref_pn'] = unserialize(@$result['banco_ref_pn']);
            $result['n_cuenta_ref_pn'] = unserialize(@$result['n_cuenta_ref_pn']);
            $result['cuenta_ref_pn'] = unserialize(@$result['cuenta_ref_pn']);
        }
        return $result;
    }

    public function get_planilla_pn_cedula($cedula_pn = 0) {
        $result = $this->db->get_where('inscripcion_pn', array('cedula_pn' => $cedula_pn, 'status >' => 0))->row_array();
        if (count($result) > 0) {
            $result['banco_ref_pn'] = unserialize(@$result['banco_ref_pn']);
            $result['n_cuenta_ref_pn'] = unserialize(@$result['n_cuenta_ref_pn']);
            $result['cuenta_ref_pn'] = unserialize(@$result['cuenta_ref_pn']);
        }
        return $result;
    }

}
