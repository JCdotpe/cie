<?php
class dudra_model extends CI_MODEL{

 	 function insert($req)
	{

		$this->db->insert('fichas_Udra', $req);
       //echo $this->db->insert('udra', $req );
		return $this->db->insert_id();
	}


	public function insert_cedulas($data)
	{
		$sql="INSERT INTO fichas_Udra (id_local, cnt_01, cnt_01A, cnt_01B, idUser,resultado) VALUES ('".$data['id_local']."', ".$data['cnt_01'].", '".$data['cnt_01A']."', '".$data['cnt_01B']."', '".$data['idUser']."', '".$data['result']."') ";
		//echo $sql;
		$this->db->query($sql);
		 return $this->db->affected_rows() > 0;
	}




     function update_udra($req,$cod)
    {
        $this->db->where('codigo_udra', $cod );
        $this->db->update('udra', $req );
        return $this->db->insert_id();
    }

	function get_udra($code)
    {
    	$this->db->select('*');
        $this->db->order_by('codigo_udra','asc');
        if ($code!="-1") {
            # code...
            $this->db->where('codigo_act', $code );
        }
        $this->db->where('estado', 1 );
        $q = $this->db->get('v_udra');
        return $q;
    }

	function mostrar_datos($inicio, $final, $sidx, $sord,$code){
        $where="";
        if ($code!="-1") {
            # code...
           $where = " WHERE codigo_act = '$code' and estado=1";
        }else{
            $where = " where estado=1";
        }
        //$sql="SELECT  *  FROM (SELECT ROW_NUMBER() OVER (ORDER BY ".$sidx." ".$sord.") AS RowNumber, * FROM v_udra ".$where.") AS udra WHERE estado=1 and  RowNumber  BETWEEN ".$inicio." AND ".$final."  ";
        $sql="SELECT  *  FROM (SELECT ROW_NUMBER() OVER (ORDER BY ".$sidx." ".$sord.") AS RowNumber, * FROM v_udra ".$where.") AS udra WHERE estado=1 and  (udra.RowNumber > $inicio  and udra.RowNumber <= $final)  ";


    	$q = $this->db->query($sql);
		return $q;
    }

    function mostrar_resumen($code){
        $where="";
        if ($code!="-1") {
            # code...
           $where = " WHERE u.codigo_act = '$code' ";
        }

        $sql="select u.Proyecto,u.Entrada,u.Salida,u.Saldo from v_activo_movimiento_Resumen as u
        ".$where." ";

        $q = $this->db->query($sql);
        return $q;

    }




    function get_mov_udra($cod)
    {
        $this->db->select('*');
        $this->db->where('codigo_act', $cod );
        $this->db->order_by('codigo_act','asc');
        $q = $this->db->get('v_activo_movimientos');
        return $q;
    }
    function get_mov_udra_all()
    {
        $this->db->select('*');
        $this->db->order_by('total_activos','desc');
        $q = $this->db->get('v_activo_movimiento_Proyecto');
        return $q;
    }

    function update_estado_udra($req,$cod)
    {
        $this->db->where('codigo_udra', $cod );
        $this->db->update('udra', $req );
        return $this->db->insert_id();
    }

    function Get_Udra_cantidad($codigo){

        $this->db->select('cantidad');
        $this->db->where('codigo_udra', $codigo );
        $q = $this->db->get('udra');
        return $q;
    }
    public function nro_locales_for_udra($condicion1)
    {
        $sql = "SELECT count(id_local) as NroRegistros FROM fichas_Udra $condicion1";
        $q = $this->db->query($sql);
        $row = $q->first_row();
        return $row->NroRegistros;
    }

        public function get_locales_for_udra($ord, $ascdesc, $inicio, $final, $condicion1)
    {
        $sql="SELECT * FROM (  SELECT ROW_NUMBER() OVER (ORDER BY fecha_reg desc) as row,id_local,cnt_01,cnt_01A,cnt_01B ,convert(varchar(10),fecha_reg,103) as fecha_reg ,resultado=case resultado when 1 then 'Completo' when 2 then 'Incompleto' when 3 then 'Rechazo' when 4 then'Local Cerrado' when 5 then 'OTROS' ELSE 'ERROR' end FROM fichas_Udra $condicion1) a WHERE a.row > $inicio and a.row <= $final";
        $q=$this->db->query($sql);
        return $q;
    }


        public function get_Udra_Reporte()
    {
         $this->db->select('*');
        $this->db->where('codigo_act', $cod );
        $this->db->order_by('codigo_act','asc');
        $q = $this->db->get('v_activo_movimientos');
        return $q;
    }


      public function get_udra_digitacion()
    {
        $sql="SELECT * FROM V_UDRA_DIGITA ORDER BY sede_operativa,dpto_nombre desc";
        $q=$this->db->query($sql);
        return $q;
    }





}