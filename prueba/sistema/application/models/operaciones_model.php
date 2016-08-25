<?php // 
//class Operaciones_Model extends Base_model {
//
//    public function __construct() {
//        if (!$this->db->table_exists('operaciones')) {
//            $this->create_table_operaciones();
//        }
//    }
//
//    public function create_table_operaciones() {
//        $this->db->query("CREATE TABLE `operaciones`(
//                            `id_operacion` INT(11) NOT NULL AUTO_INCREMENT,
//                            `n_ref` VARCHAR(25) NOT NULL,
//                            `t_instrumento` VARCHAR(150) NOT NULL,
//                            `id_t_operacion` INT(11) NOT NULL,
//                            `monto` FLOAT(11,2) NOT NULL,
//                            `descripcion` TEXT NOT NULL,
//                            `fecha_operacion` TIMESTAMP NOT NULL,
//                            `id_tercero` INT(11) NOT NULL,
//                            `iva` FLOAT(11,2) NOT NULL,
//                            `total_monto` FLOAT(11,2) NOT NULL,
//                            `id_banco_emisor` INT(11) NOT NULL,
//                            `id_banco_receptor` INT(11) NOT NULL,
//                            `status` TINYINT(4) NOT NULL DEFAULT '1',
//                            PRIMARY KEY (`id_operacion`)) DEFAULT CHARSET=utf8;");
//        $this->db->query('ALTER TABLE `t_operaciones` ENGINE = InnoDB');
//    }
//
//}

?>
