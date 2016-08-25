<?php

class Reportes_model extends Base_model {

    public function reporte_por_fecha($form) {
        $query = $form['query'];

        return $this->db->query("select * from instrucciones
                        left join proveedores using(id_proveedor)
                        left join bancos using (id_banco)
                        where instrucciones.status > 0 and $query order by instrucciones.fecha_pago DESC ")->result_array();
    }

    public function reporte_por_banco($id_banco, $form) {
        if ($id_banco == '0') {
            $query = $form['query'];
        } else {
            $query = 'SHA(id_banco) = "' . $id_banco . '" AND ' . $form['query'];
        }
        return $this->db->query("select * from instrucciones
                        left join proveedores using(id_proveedor)
                        left join bancos using (id_banco)
                        where  instrucciones.status > 0 and instrucciones.t_instrumento != 'Efectivo' and $query order by bancos.nombre_banco asc, instrucciones.fecha_pago DESC")->result_array();
    }

    public function reporte_por_beneficiario($id_proveedor, $form) {
        if ($id_proveedor == '0') {
            $query = $form['query'];
        } else {
            $query = 'id_proveedor = ' . $id_proveedor . ' AND ' . $form['query'];
        }
        return $this->db->query("select * from instrucciones
                        left join proveedores using(id_proveedor)
                        left join bancos using (id_banco)
                        where instrucciones.status > 0 and $query order by proveedores.nombre_proveedor asc, instrucciones.fecha_pago DESC")->result_array();
    }

    public function reporte_por_instrumento($t_instrumento, $form) {
        if ($t_instrumento == '0') {
            $query = $form['query'];
        } else {
            $query = 'instrucciones.t_instrumento = \'' . $t_instrumento . '\' AND ' . $form['query'];
        }
        return $this->db->query("select * from instrucciones
                        left join proveedores using(id_proveedor)
                        left join bancos using (id_banco)
                        where instrucciones.status > 0 and $query order by instrucciones.t_instrumento asc, bancos.moneda asc, instrucciones.fecha_pago DESC")->result_array();
    }

    public function reporte_por_moneda($moneda, $form) {

        if ($moneda == '0') {
            $query = $form['query'];
        } else {
            $query = 'bancos.moneda = \'' . $moneda . '\' AND ' . $form['query'];
        }
        return $this->db->query("select * from instrucciones
                        left join proveedores using(id_proveedor)
                        left join bancos using (id_banco)
                        where  instrucciones.status > 0 and $query order by bancos.moneda asc, instrucciones.fecha_pago DESC ")->result_array();
    }

}

?>
