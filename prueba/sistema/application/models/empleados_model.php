<?php

class Empleados_Model extends Base_Model {

    public function __construct() {
        parent::__construct();

        if (!$this->db->table_exists('empleados')) {
            $this->create_table_empleados();
        }

        if (!$this->db->table_exists('fotos_empleados')) {
            $this->create_table_fotos_empleados();
        }
        
    }

    public function create_table_empleados() {

        $this->db->query("CREATE TABLE `empleados`(
                            `id_empleado` INT(11) NOT NULL AUTO_INCREMENT,
                            `primer_nombre_emp` VARCHAR(60) NOT NULL,
                            `segundo_nombre_emp` VARCHAR(60) NOT NULL,
                            `primer_apellido_emp` VARCHAR(60) NOT NULL,
                            `segundo_apellido_emp` VARCHAR(60) NOT NULL,
                            `cedula_emp` int(11) NOT NULL,
                            `nacionalidad_emp` VARCHAR(2) NOT NULL,
                            `estado_civil_emp` VARCHAR(2) NOT NULL,
                            `sexo_emp` VARCHAR(2) NOT NULL,
                            `lugar_nac_emp` VARCHAR(120) NOT NULL,
                            `fecha_nac_emp` VARCHAR(2) NOT NULL,
                            `direccion_emp` TEXT NOT NULL,
                            `email_emp` VARCHAR(120) NOT NULL,
                            `telefonos_emp` VARCHAR(120) NOT NULL,
                            `sueldo_emp` FLOAT(11,2) NOT NULL,
                            `ticket_emp` FLOAT(11,2) NOT NULL,
                            `id_departamento` TINYINT(4) NOT NULL,
                            `cargo_empleado` VARCHAR(60) NOT NULL,
                            `fecha_ingreso_empleado` TIMESTAMP NOT NULL,
                            `status` TINYINT(4) NOT NULL DEFAULT '1',
                            PRIMARY KEY  (`id_empleado`)
                            )DEFAULT CHARSET=utf8;");
        $this->db->query('ALTER TABLE `empleados` ENGINE = InnoDB');
    }

    public function create_table_fotos_empleados() {

        $this->db->query("CREATE TABLE `fotos_empleados`(
                            `id_foto_empleado` INT(11) NOT NULL AUTO_INCREMENT,
                            `id_empleado` INT(11) NOT NULL,
                            `name_foto` TEXT NOT NULL,
                            `tipo_foto` VARCHAR(30) NOT NULL,
                            `medidas_vista_foto` VARCHAR(45) NOT NULL,
                            `width_foto` INT(11) NOT NULL,
                            `height_foto` INT(11) NOT NULL,
                            `status` TINYINT(4) NOT NULL DEFAULT '1',
                            PRIMARY KEY  (`id_foto_empleado`)
                            )DEFAULT CHARSET=utf8;");
        $this->db->query('ALTER TABLE `fotos_empleados` ENGINE = InnoDB');
    }

    public function agrega_empleado($form) {
        $valida = $this->db->get_where('empleados', array('cedula_emp' => $form['cedula_emp']))->row_array();
        if (!$valida) {
            $this->db->insert('empleados', $form);
            return $this->db->insert_id();
        } else {
            $result = $this->db->get_where('empleados', array('cedula_emp' => $form['cedula_emp']))->row_array();
            $form['status'] = 1;
            $this->db->where('cedula_emp', $form['cedula_emp']);
            $this->db->update('empleados', $form);
            return ($result['id_empleado']);
        }
    }

    public function cargar_imagen($image) {
        $valida = $this->db->get_where("fotos_empleados", array('id_empleado' => $image['id_empleado']))->row_array();
        if (!$valida) {
            $this->db->insert('fotos_empleados', $image);
            return false;
        } else {
            $this->db->where('id_empleado', $image['id_empleado']);
            $this->db->update('fotos_empleados', $image);
            return @unlink('./images/fotos_empleados/' . $valida['name_foto']);
        }
    }

    public function edita_imagen($image) {
        $id_empleado = $image['id_empleado'];
        unset($image['id_empleado']);
        $valida = $this->db->get_where("fotos_empleados", array('SHA(id_empleado)' => $id_empleado))->row_array();
        if (!$valida) {
            $empleado = $this->db->get_where("empleados", array('SHA(id_empleado)' => $id_empleado))->row_array();
            $image['id_empleado'] = $empleado['id_empleado'];
            $this->db->insert('fotos_empleados', $image);
            return false;
        } else {
            $this->db->where('SHA(id_empleado)', $id_empleado);
            $this->db->update('fotos_empleados', $image);
            return @unlink('./images/fotos_empleados/' . $valida['name_foto']);
        }
    }

    public function edita_empleado() {
        $form = $this->input->post();
        $id_empleado = $form['id_empleado'];
        unset($form['id_empleado']);
        $this->db->where('SHA(id_empleado)', $id_empleado);
        $this->db->update('empleados', $form);
        if($this->db->_error_number()){
            return false;
        }
        return true;
    }

    public function get_empleados() {
        return $this->db->query("select * from empleados join departamentos using (id_departamento) where empleados.status >= 0 order by id_departamento asc")->result_array();
    }

    public function get_empleado_by_id($id_empleado) {
        return $this->db->query("select * from empleados 
            join departamentos using(id_departamento) 
            left join fotos_empleados using(id_empleado)
            where SHA(id_empleado) = '$id_empleado'")->row_array();
    }

}