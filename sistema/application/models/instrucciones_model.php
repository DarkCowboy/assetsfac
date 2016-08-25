<?php

class Instrucciones_Model extends Base_Model {

    public function __construct() {
        if (!$this->db->table_exists('instrucciones')) {
            $this->create_table_instrucciones();
        }
        if (!$this->db->table_exists('cheques')) {
            $this->create_table_cheques();
        }
    }

    public function create_table_instrucciones() {
        $this->db->query("CREATE TABLE `instrucciones`(
                            `id_instruccion` INT(11) NOT NULL AUTO_INCREMENT,
                            `id_proveedor` INT(11) NOT NULL,
                            `iva` FLOAT(11,2) NOT NULL,
                            `Concepto_pago` VARCHAR(255) NOT NULL,
                            `detalles_concepto` VARCHAR(255) NOT NULL,
                            `t_documento` VARCHAR(255) NOT NULL,
                            `fecha_pago` TIMESTAMP NOT NULL,
                            `id_banco` INT(11) NOT NULL,
                            `monto_instruccion` FLOAT(11,2) NOT NULL,
                            `total_monto_pagar` FLOAT(11,2) NOT NULL,
                            `n_cheque` VARCHAR(255) NOT NULL,
                            `t_instrumento` VARCHAR(255) NOT NULL,
                            `id_t_operacion` VARCHAR(60) NOT NULL,
                            `id_banco_receptor` INT( 11 ) NOT NULL,
                            `traspaso` TINYINT(4) NOT NULL default '0',
                            `status` TINYINT(4) NOT NULL default '0',
                            PRIMARY KEY(`id_instruccion`)
                            ) DEFAULT CHARSET = utf8;");
        $this->db->query("ALTER TABLE `instrucciones` ENGINE = InnoDB");

        //   ALTER TABLE `instrucciones` ADD `id_t_operacion` int(11) NOT NULL AFTER `t_instrumento` ,
        //   ADD `id_banco_receptor` INT(11) NOT NULL AFTER `id_t_operacion` 
    }

    public function create_table_cheques() {
        $this->db->query("CREATE TABLE `cheques`(
                            `id_cheque` INT(11) NOT NULL AUTO_INCREMENT,
                            `id_banco` INT(11) NOT NULL,
                            `nombre_imagen_cheque` VARCHAR(255) NOT NULL,
                            `status` TINYINT(4) NOT NULL default '0',
                            PRIMARY KEY(`id_cheque`)
                            ) DEFAULT CHARSET = utf8;");
        $this->db->query("ALTER TABLE `cheques` ENGINE = InnoDB");
    }

    public function agregar_instruccion($instruccion) {
        $this->db->insert('instrucciones', $instruccion);
        return $this->db->insert_id();
    }

    public function editar_instruccion($instruccion) {
        $id_instruccion = $instruccion['id_instruccion'];
        unset($instruccion['id_instruccion']);
        $this->db->where('SHA(id_instruccion)', $id_instruccion);
        $this->db->update('instrucciones', $instruccion);
    }

    public function eliminar_instruccion($id_instruccion) {
        $this->db->where('SHA(id_instruccion)', $id_instruccion);
        $this->db->update('instrucciones', array('status' => -1));
    }

    public function get_instrucciones() {
        return $this->db->query("select * from instrucciones
                        left join proveedores using(id_proveedor)
                        left join bancos using (id_banco)
                        where id_t_operacion = 1 and instrucciones.status = 0 order by instrucciones.fecha_pago DESC")->result_array();
    }

    public function get_instrucciones_procesadas() {
        $x = $this->db->query("SELECT * FROM instrucciones
                        LEFT JOIN proveedores USING ( id_proveedor )
                        LEFT JOIN bancos USING ( id_banco )
                        WHERE id_t_operacion = 1 and instrucciones.status = 1 ORDER BY `instrucciones`.`fecha_pago` DESC")->result_array();
        return $x;
    }

    public function get_instrucciones_by_id($id_instruccion) {
        return $this->db->query("select * from instrucciones
                        left join proveedores using(id_proveedor)
                        left join bancos using (id_banco)
                        left join cheques using (id_banco)
                        left join codigo_contable on id_codigo = Concepto_pago
                        where SHA(id_instruccion) = '$id_instruccion'")->row_array();
    }
    public function get_ingresos_by_id($id_instruccion) {
        return $this->db->query("select * from instrucciones
                        left join proveedores using(id_proveedor)
                        left join bancos using (id_banco)
                        left join cheques using (id_banco)
                        left join codigo_contable on id_codigo = Concepto_pago
                        where id_t_operacion = 3 and SHA(id_instruccion) = '$id_instruccion'")->row_array();
    }

    public function agregar_traspaso($form) {
        $this->db->insert('instrucciones', $form);
    }

    public function agregar_ingreso($form) {
        $this->db->insert('instrucciones', $form);
    }
    
    public function consulta_ingresos_actuales(){
        return $this->db->query("select * from instrucciones
                        left join proveedores using(id_proveedor)
                        left join bancos using (id_banco)
                        left join cheques using (id_banco)
                        where  id_t_operacion = 3 and instrucciones.status > 0 and
                         `fecha_pago` BETWEEN DATE_SUB( NOW( ) , INTERVAL 12 MONTH ) AND NOW( )
                        order by instrucciones.fecha_pago DESC ")->result_array();
//                        Date_format( fecha_pago, '%m' ) = Date_format( NOW( ) , '%m' ) 
        
    }
    public function consulta_egresos_actuales(){
        return $this->db->query("select * from instrucciones
                        left join proveedores using(id_proveedor)
                        left join bancos using (id_banco)
                        where  id_t_operacion = 1 and instrucciones.status > 0 and
                         `fecha_pago` BETWEEN DATE_SUB( NOW( ) , INTERVAL 12 MONTH ) AND NOW( )
                        order by instrucciones.fecha_pago DESC ")->result_array();
//                        Date_format( fecha_pago, '%m' ) = Date_format( NOW( ) , '%m' ) 
    }

}