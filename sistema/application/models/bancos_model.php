<?php

class Bancos_Model extends Base_Model {

    public function __construct() {
        if (!$this->db->table_exists('bancos')) {
            $this->create_table_bancos();
        }
        if (!$this->db->table_exists('cortes')) {
            $this->create_table_cortes();
        }
    }

    public function create_table_bancos() {
        $this->db->query("CREATE TABLE `bancos`(
                            `id_banco` int(11) NOT NULL AUTO_INCREMENT,
                            `nombre_banco_ident` VARCHAR(160) NOT NULL,
                            `nombre_banco` VARCHAR(160) NOT NULL,
                            `t_banco` VARCHAR(20) NOT NULL,
                            `t_de_cuenta` VARCHAR(20) NOT NULL,
                            `n_cuenta` VARCHAR(60) NOT NULL,
                            `moneda` VARCHAR(60) NOT NULL,
                            `status` TINYINT(4) NOT NULL DEFAULT '1',
                            PRIMARY KEY(`id_banco`)
        )DEFAULT CHARSET=utf8;");
        $this->db->query("ALTER TABLE `bancos` ENGINE = InnoDB");
    }

    public function create_table_cortes() {
        $this->db->query("CREATE TABLE `cortes`(
                            `id_corte` INT(11) NOT NULL AUTO_INCREMENT,
                            `id_banco` INT(11) NOT NULL,
                            `mes_year` VARCHAR(8) NOT NULL,
                            `saldo` FLOAT(11,2) NOT NULL,
                            `status` TINYINT(4) NOT NULL DEFAULT '1',
                            PRIMARY KEY (`id_corte`)
        )DEFAULT CHARSET=utf8;");
        $this->db->query("ALTER TABLE `cortes` ENGINE = InnoDB");
    }

    public function update_corte($form, $elimina = null) {
        if ($elimina) {
            $valida = $this->db->get_where('cortes', array('id_banco' => $form['id_banco']))->row_array();
            if ($form['id_t_operacion'] == 1 || $form['id_t_operacion'] == 2) {
                $corte['saldo'] = $valida['saldo'] + $form['total_monto_pagar'];
            }
            if ($form['id_t_operacion'] == 3) {
                $corte['saldo'] = $valida['saldo'] - $form['total_monto_pagar'];
            }
            $this->db->where(array('id_banco' => $form['id_banco']));
            $this->db->update('cortes', $corte);
        } else {
            if ($form['total_monto_pagar']) {
                if ($form['id_t_operacion'] == 1 || $form['id_t_operacion'] == 2) {
                    $form['total_monto_pagar'] = $form['total_monto_pagar'] * -1;
                }
                if ($form['id_t_operacion'] == 3) {
                    $form['total_monto_pagar'] = $form['total_monto_pagar'];
                }
            }
            if ($form['fecha_pago']) {
                $form['fecha'] = $form['fecha_pago'];
            }
            if (!$form['fecha']) {
                $form['fecha'] = date('Y-m-d');
            }
            if ($form['saldo']) {
                $corte['saldo'] = $form['saldo'];
            } else if ($form['saldo_actual']) {
                $corte['saldo'] = $form['saldo_actual'];
            } else if ($form['total_monto_pagar']) {
                $corte['saldo'] = $form['total_monto_pagar'];
            } else {
                $corte['saldo'] = $form['monto_instruccion'];
            }
            $fecha = explode('-', $form['fecha']);
            $corte['id_banco'] = $form['id_banco'];
            $corte['mes_year'] = $fecha[1] . '/' . $fecha[0];
            $valida = $this->db->get_where('cortes', array('id_banco' => $form['id_banco'], 'mes_year' => $corte['mes_year']))->row_array();
            if ($valida) {
                $corte['saldo'] = $valida['saldo'] + $corte['saldo'];
                $this->db->where(array('id_banco' => $form['id_banco']));
                $this->db->update('cortes', $corte);
            } else {

                if ($fecha[1] == 1) {
                    $fecha[1] = 13;
                }
                $fecha[1] = $fecha[1] - 1;
                if (strlen($fecha[1]) == 1) {
                    $fecha[1] = '0' . $fecha[1];
                }
                $corte['mes_year'] = $fecha[1] . '/' . $fecha[0];
                $valida = $this->db->get_where('cortes', array('id_banco' => $form['id_banco'], 'mes_year' => $corte['mes_year']))->row_array();
                if ($valida) {
                    if ($fecha[1] == 12) {
                        $fecha[1] = 0;
                    }

                    $fecha[1] = $fecha[1] + 1;
                    if (strlen($fecha[1]) == 1) {
                        $fecha[1] = '0' . $fecha[1];
                    }

                    $corte['mes_year'] = $fecha[1] . '/' . $fecha[0];
                    $corte['saldo'] = $valida['saldo'] + $corte['saldo'];
                    $this->db->insert('cortes', $corte);
                } else {
                    $corte['mes_year'] = date('m/Y');
                    $this->db->insert('cortes', $corte);
                }
            }
        }
    }

    public function get_bancos() {
//        return $this->db->get_where('bancos', array('status >=' => 0, 'id_banco >=' => 0))->result_array();
        
//        return $this->db->query("select * from bancos
//                                    join cortes using(id_banco)
//                                    where bancos.status >= 0 and id_banco >= 0")->result_array();
        return $this->db->query("SELECT * FROM bancos b INNER JOIN cortes c ON c.id_banco = b.id_banco GROUP BY b.id_banco")->result_array();
    }

    public function guardar_banco($banco) {
        $valida = $this->db->get_where('bancos', array('n_cuenta' => $banco['n_cuenta']))->row_array();
        if ($valida) {
            $this->db->where('n_cuenta', $banco['n_cuenta']);
            $this->db->update('bancos', $banco);
            return $valida['id_banco'];
        } else {
            $this->db->insert('bancos', $banco);
            return $this->db->insert_id();
        }
    }

    public function get_banco_by_id($id_banco) {
        return $this->db->get_where("bancos", array('SHA(id_banco)' => $id_banco))->row_array();
    }
    

    public function editar_banco($form) {
        $this->db->where('SHA(id_banco)', $form['id_banco']);
        unset($form['id_banco']);
        $this->db->update('bancos', $form);
    }

    public function eliminar_banco($id_banco) {
        $this->db->where('SHA(id_banco)', $id_banco);
        $this->db->update('bancos', array('status' => -1));
    }

    public function habilitar($id_banco) {
        $this->db->where('SHA(id_banco)', $id_banco);
        $this->db->update('bancos', array('status' => 0));
    }

    public function deshabilitar($id_banco) {
        $this->db->where('SHA(id_banco)', $id_banco);
        $this->db->update('bancos', array('status' => 0));
    }

    public function busqueda_avanzada($query) {
//        return $this->db->query("SELECT * FROM `instrucciones` WHERE {$query['query']}
//                        ORDER BY `instrucciones`.`fecha_pago` DESC")->result_array();
//        SELECT *, instrucciones.id_banco, be.nombre_banco as nombre_banco_emisor, id_banco_receptor, br.nombre_banco as nombre_banco_receptor FROM `instrucciones` inner join bancos be on be.id_banco = instrucciones.id_banco left join bancos br on br.id_banco = id_banco_receptor WHERE instrucciones.id_banco = 1 ORDER BY `instrucciones`.`fecha_pago` DESC 
        return $this->db->query("SELECT *, instrucciones.id_banco, be.nombre_banco as nombre_banco_emisor, id_banco_receptor, br.nombre_banco as nombre_banco_receptor "
                . "FROM `instrucciones` "
                . "inner join bancos be on be.id_banco = instrucciones.id_banco "
                . "left join bancos br on br.id_banco = id_banco_receptor "
                . "WHERE {$query['query']} ORDER BY `instrucciones`.`id_instruccion` ASC")->result_array();
//                debug($this->db->last_query());
    }

    public function comprueba_corte($query) {
        return $this->db->query("SELECT * FROM `cortes` WHERE {$query}")->row_array();
    }

}