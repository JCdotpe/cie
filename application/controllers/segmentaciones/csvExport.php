<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Csvexport extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		$this->load->helper('form');
		$this->load->library('PHPExcel');
	}


	public function ExportacionEvaluador()
	{
		$this->load->model('segmentaciones/rutas_model');
		//colores
			//$color_celda_cabeceras = '27408B';

			$color_celda_cabeceras =   array(
				        'fill' => array(
				            'type' => PHPExcel_Style_Fill::FILL_SOLID,
				            'color' => array('rgb' => '27408B')
				        )
				    );
    	//colores

		$cond1 = "";
		$cond2 = "";
		$cond3 = "";

		$where1 = "";

		$sidx = "convert(datetime,fxinicio,103), prov_operativa_ugel";
		
		if(isset($_GET['codsede'])) { 
			$sede = $this->input->get('codsede');
			if ($sede != -1) { 
				$cond1 = "cod_sede_operativa = '$sede'";
			}
		}else{ $sede = ""; 
			$cond1 = "cod_sede_operativa = '-1'"; }

		if(isset($_GET['codprov'])) { 
			$prov = $this->input->get('codprov');
			if ($prov != -1) { 
				$cond2 = "cod_prov_operativa = '$prov'";
			}
		}else{ $prov = ""; 
			$cond2 = "cod_prov_operativa = '-1'"; }
		
		if(isset($_GET['codruta'])) { 
			$ruta = $this->input->get('codruta');
			$cond3 = "idruta = '$ruta'";
		}else{ $ruta = ""; 
			$cond3 = "idruta = ''";}

		if(!$sidx) $sidx =1;

		$where1 =  "WHERE ".$cond1." AND ".$cond2." AND ".$cond3;
		$count = $this->rutas_model->contar_datos($where1);

		//$data['cantidad'] = $count;
		$query = $this->rutas_model->report_evaluador($sidx, 'asc', '0', $count, $where1);
		//$data['consulta'] = $query;


		//$filtros = $this->segmentacion_model->get_empadronador($sede, $dep, $equi, $ruta);    	
		//$registros = $this->segmentacion_model->get_all_empadronador($sede, $dep, $equi, $ruta);    	
		
		// if ($registros->num_rows() === 0 ){
		// 	$this->session->set_flashdata('msgbox',1);
		// 	redirect('/segmentacion/consulta/index/1');			
		// } 
		  
		// pestaña
		$sheet = $this->phpexcel->getActiveSheet(0);
		
		// formato de la hoja
			// Set Orientation, size and scaling
			//$objPHPExcel->setActiveSheetIndex(0);
			$sheet->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);// horizontal
			//$sheet->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT); // vertical
			$sheet->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A3);
			$sheet->getPageSetup()->setFitToPage(false); // ajustar pagina
			$sheet->getPageSetup()->setFitToWidth(1);
			$sheet->getPageSetup()->setFitToHeight(0);		
			$sheet->setShowGridlines(false);// oculta lineas de cuadricula		
		// formato de la hoja

		// ANCHO Y ALTURA DE COLUMNAS DEL FILE
			$sheet->getColumnDimension('A')->setWidth(1);
			$sheet->getColumnDimension('B')->setWidth(5);
			$sheet->getColumnDimension('C')->setWidth(22);
			$sheet->getColumnDimension('D')->setWidth(20);
			$sheet->getColumnDimension('E')->setWidth(20);
			$sheet->getColumnDimension('F')->setWidth(20);
			$sheet->getColumnDimension('G')->setWidth(8);
			$sheet->getColumnDimension('H')->setWidth(8);
			$sheet->getColumnDimension('I')->setWidth(8);
			$sheet->getColumnDimension('J')->setWidth(8);
			$sheet->getColumnDimension('K')->setWidth(8);
			$sheet->getColumnDimension('L')->setWidth(5);
			$sheet->getColumnDimension('M')->setWidth(5);
			$sheet->getColumnDimension('N')->setWidth(5);
			$sheet->getColumnDimension('O')->setWidth(5);
			$sheet->getColumnDimension('P')->setWidth(5);
			$sheet->getColumnDimension('Q')->setWidth(7);
			$sheet->getColumnDimension('R')->setWidth(8);
			$sheet->getColumnDimension('S')->setWidth(7);
			$sheet->getColumnDimension('T')->setWidth(10);
			$sheet->getColumnDimension('U')->setWidth(9);
			$sheet->getColumnDimension('V')->setWidth(9);
			$sheet->getColumnDimension('W')->setWidth(9);
			$sheet->getColumnDimension('X')->setWidth(30);
			

			$sheet->getRowDimension(4)->setRowHeight(2);
			$sheet->getRowDimension(6)->setRowHeight(2);
			$sheet->getRowDimension(17)->setRowHeight(40);
		// ANCHO Y ALTURA DE COLUMNAS DEL FILE

		// TITULOS
			$sheet->setCellValue('A3','INSTITUTO NACIONAL DE ESTADÍSTICA E INFORMATICA');
			$sheet->mergeCells('A3:X3');
			$sheet->setCellValue('A5','CENSO DE INFRAESTRUCTURA EDUCATIVA 2013');
			$sheet->mergeCells('A5:X5');
			$sheet->setCellValue('A7','PROGRAMACIÓN DE RUTA DE TRABAJO DEL EVALUADOR TÉCNICO');
			$sheet->mergeCells('A7:X7');
			$sheet->getStyle('A3:X7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$sheet->getStyle('A3:X7')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
			$sheet->getStyle('A3:X3')->getFont()->setname('Arial black')->setSize(18);
			$sheet->getStyle('A5:X7')->getFont()->setname('Arial')->setSize(18);

			// LOGO
			
	          $objDrawing = new PHPExcel_Worksheet_Drawing();
	          $objDrawing->setWorksheet($sheet);
	          $objDrawing->setName("inei");
	          $objDrawing->setDescription("Inei");
	          $objDrawing->setPath("img/inei.jpeg");
	          $objDrawing->setCoordinates('C2');
	          $objDrawing->setHeight(80);
	          $objDrawing->setOffsetX(1);
	          $objDrawing->setOffsetY(5);
			
	          
	          // $objDrawing2 = new PHPExcel_Worksheet_Drawing();
	          // $objDrawing2->setWorksheet($sheet);
	          // $objDrawing2->setName("CIE");
	          // $objDrawing2->setDescription("CIE");
	          // $objDrawing2->setPath("img/cenpesco.jpg");
	          // $objDrawing2->setCoordinates('AQ2');
	          // $objDrawing2->setHeight(100);
	          // $objDrawing2->setWidth(100);
	          // $objDrawing2->setOffsetX(1);
	          // $objDrawing2->setOffsetY(10);
	          
		// TITULOS

		// CABECERA ESPECIAL
					$sheet->setCellValue('B9','SEDE OPERATIVA:');
					$sheet->mergeCells('B9:C9');
					$sheet->setCellValue('B10','PROVINCIA OPERATIVA:');
					$sheet->mergeCells('B10:C10');
					$sheet->setCellValue('B11','JEFE BRIGADA:');
					$sheet->mergeCells('B11:C11');
					$sheet->setCellValue('B12','RUTA:');
					$sheet->mergeCells('B12:C12');
					$sheet->getStyle('B9:C12')->getFont()->setname('Arial')->setSize(11)->setBold(true);
					//$sheet->setCellValue('B12','RUTA - EMPADRONADOR:');
					//$sheet->mergeCells('B12:C12');

					if ($query->num_rows() > 0)
					{
						$row = $query->row();
						$sheet->setCellValue('D9',utf8_encode($row->sede_operativa));
						$sheet->mergeCells('D9:E9');
						$sheet->setCellValue('D10',utf8_encode($row->prov_operativa_ugel));
						$sheet->mergeCells('D10:E10');
						$sheet->getCellByColumnAndRow(3, 11)->setValueExplicit($row->cod_jefebrigada,PHPExcel_Cell_DataType::TYPE_STRING);
						$sheet->mergeCells('D11:E11');
						$sheet->getCellByColumnAndRow(3, 12)->setValueExplicit($row->idruta,PHPExcel_Cell_DataType::TYPE_STRING);

						//$sheet->setCellValue('D12',$row->idruta);
						$sheet->mergeCells('D12:E12');
					}
					
					$sheet->getStyle('D9:E12')->getFont()->setname('Arial')->setSize(12);
					$sheet->getStyle("D9:E12")->getAlignment()->setWrapText(true);// AJUSTA TEXTO A CELDA
			     	//$sheet->getStyle("B9:C12")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('#FF9900');
			     	$sheet->getStyle("B9:C12")->applyFromArray($color_celda_cabeceras);
			     	$sheet->getStyle("D9:E12")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
					$sheet->getStyle("B9:C12")->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);

					$sheet->getStyle("B9:E12")->applyFromArray(array(
					'borders' => array(
								'allborders' => array(
												'style' => PHPExcel_Style_Border::BORDER_THIN)
							)
					));
					
					$sheet->setCellValue('J10','NOMBRES Y APELLIDOS DEL EVALUADOR');
					$sheet->mergeCells('J10:T10');
			  		$sheet->getStyle('J10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$sheet->getStyle('J10')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);	
					$sheet->getStyle("J10")->applyFromArray($color_celda_cabeceras);	
													
					$sheet->mergeCells('J11:T11');
					$sheet->getStyle("J10:T11")->applyFromArray(array(
					'borders' => array(
								'allborders' => array(
												'style' => PHPExcel_Style_Border::BORDER_THIN)
							)
					));


					$sheet->setCellValue('X15','DOC.CIE03.01');
					$sheet->mergeCells('X15:X15');

					// $sheet->setCellValue('U10','NOMBRES Y APELLIDOS DEL JEFE DE BRIGADA');
					// $sheet->mergeCells('U10:AG10');
			  //    	$sheet->getStyle('U10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					// $sheet->getStyle('U10')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);	
					// $sheet->getStyle("U10")->applyFromArray($color_celda_cabeceras);

					// $sheet->mergeCells('U11:AG11');
					// $sheet->getStyle("U10:AG11")->applyFromArray(array(
					// 'borders' => array(
					// 			'allborders' => array(
					// 							'style' => PHPExcel_Style_Border::BORDER_THIN)
					// 		)
					// ));

					// $sheet->setCellValue('AI10','NOMBRE Y APELLIDOS DEL EMPADRONADOR');
					// $sheet->mergeCells('AI10:AU10');
					// $sheet->setCellValue('AI11',$filtros->row('NOMBRE_Y_APELLIDOS_DEL_EMPADRONADOR'));
					// $sheet->mergeCells('AI11:AU11');
					
			  //    	//$sheet->getStyle("Y10:AU10")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('#FF9900');
			  //    	$sheet->getStyle("AI10:AU10")->applyFromArray($color_celda_cabeceras);
			     	
			  //    	$sheet->getStyle("AI10:AU10")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					// $sheet->getStyle("AI10:AU10")->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);

					// $sheet->getStyle("AI10:AU11")->applyFromArray(array(
					// 'borders' => array(
					// 			'allborders' => array(
					// 							'style' => PHPExcel_Style_Border::BORDER_THIN)
					// 		)
					// ));


					// $sheet->setCellValue('AQ13','FECHA BD');
					// $sheet->mergeCells('AQ13:AU13');
					// $sheet->getStyle('AQ13')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);	
					// $sheet->getStyle("AQ13")->applyFromArray($color_celda_cabeceras);

					// $sheet->setCellValue('AQ14', $filtros->row('FECHA_UPDATE') );
					// $sheet->getStyle('AQ14')->getNumberFormat()->setFormatCode('dd/mm/yyyy hh:mm:ss'); 
					// $sheet->mergeCells('AQ14:AU14');
			  //    	$sheet->getStyle('AQ13:AQ14')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);					
					// $sheet->getStyle("AQ13:AU14")->applyFromArray(array(
					// 'borders' => array(
					// 			'allborders' => array(
					// 							'style' => PHPExcel_Style_Border::BORDER_THIN)
					// 		)
					// ));
					
					$sheet->getStyle('D9:X11')->getFont()->setname('Arial')->setSize(12);	// TAMAÑO FUENTE CABECERAS
					//$sheet->getStyle('B11:B12')->getFont()->setname('Arial')->setSize(10);	// TAMAÑO FUENTE  SOLO CABECERAS
		// CABECERA ESPECIAL

		// CABECERA
			// INICIO DE LA  cabecera
			$cab = 16;	
				
			// NOMBRE CABECERAS
	
					$sheet->setCellValue('B'.$cab,'N°');
					$sheet->mergeCells('B'.$cab.':B'.($cab+2));

					$sheet->setCellValue('C'.$cab,'Departamento' );
					$sheet->mergeCells('C'.$cab.':C'.($cab+2));
					$sheet->setCellValue('D'.$cab,'Provincia' );
					$sheet->mergeCells('D'.$cab.':D'.($cab+2));
					$sheet->setCellValue('E'.$cab,'Distrito' );
					$sheet->mergeCells('E'.$cab.':E'.($cab+2));
					$sheet->setCellValue('F'.$cab,'Centro Poblado' );
					$sheet->mergeCells('F'.$cab.':F'.($cab+2));
					$sheet->setCellValue('G'.$cab, 'Codigo de Local');
					$sheet->mergeCells('G'.$cab.':G'.($cab+2));	
					$sheet->setCellValue('H'.$cab, 'Periodo');
					$sheet->mergeCells('H'.$cab.':H'.($cab+2));

					$sheet->setCellValue('I'.$cab,'Periodo de trabajo');
					$sheet->mergeCells('I'.$cab.':J'.$cab);
						$sheet->setCellValue('I'.($cab+1),'Fecha Inicio');
						$sheet->mergeCells('I'.($cab+1).':I'.($cab+2));
						$sheet->setCellValue('J'.($cab+1),'Fecha Final');
						$sheet->mergeCells('J'.($cab+1).':J'.($cab+2));
					
					$sheet->setCellValue('K'.$cab,'Días de Operación de Campo');
					$sheet->mergeCells('K'.$cab.':Q'.$cab);
						$sheet->setCellValue('K'.($cab+1),'Traslado' );
						$sheet->mergeCells('K'.($cab+1).':K'.($cab+2));
						$sheet->setCellValue('L'.($cab+1),'Trabajo' );
						$sheet->mergeCells('L'.($cab+1).':L'.($cab+2));
						$sheet->setCellValue('M'.($cab+1),'Recuperación' );
						$sheet->mergeCells('M'.($cab+1).':M'.($cab+2));
						$sheet->setCellValue('N'.($cab+1), 'Retorno a Sede' );
						$sheet->mergeCells('N'.($cab+1).':N'.($cab+2));
						$sheet->setCellValue('O'.($cab+1), 'Gabinete' );
						$sheet->mergeCells('O'.($cab+1).':O'.($cab+2));
						$sheet->setCellValue('P'.($cab+1), 'Descanso' );
						$sheet->mergeCells('P'.($cab+1).':P'.($cab+2));
						$sheet->setCellValue('Q'.($cab+1), 'Total Dias' );
						$sheet->mergeCells('Q'.($cab+1).':Q'.($cab+2));

					$sheet->setCellValue('R'.$cab,'Monto Asignado' );
					$sheet->mergeCells('R'.$cab.':S'.$cab);
						$sheet->setCellValue('R'.($cab+1), 'Mov. Local' );
						$sheet->mergeCells('R'.($cab+1).':R'.($cab+2));
						$sheet->setCellValue('S'.($cab+1), 'Gasto operativo' );
						$sheet->mergeCells('S'.($cab+1).':S'.($cab+2));

					$sheet->setCellValue('T'.$cab,'Asignación de Fondos' );
					$sheet->mergeCells('T'.$cab.':V'.$cab);
						$sheet->setCellValue('T'.($cab+1), 'Mov. Local' );
						$sheet->mergeCells('T'.($cab+1).':T'.($cab+2));
						$sheet->setCellValue('U'.($cab+1), 'Gastos Operativos' );
						$sheet->mergeCells('U'.($cab+1).':U'.($cab+2));
						$sheet->setCellValue('V'.($cab+1), 'Pasaje' );
						$sheet->mergeCells('V'.($cab+1).':V'.($cab+2));
					
					$sheet->setCellValue('W'.$cab, 'TOTAL' );
					$sheet->mergeCells('W'.$cab.':W'.($cab+2));
					$sheet->setCellValue('X'.$cab,'Observaciones' );
					$sheet->mergeCells('X'.$cab.':X'.($cab+2));
			// NOMBRE CABECERAS

			// ESTILOS  CABECERAS
				$sheet->getStyle("B".$cab.":X".($cab+2))->getAlignment()->setWrapText(true);// AJUSTA TEXTO A CELDA
				$sheet->getStyle("B".$cab.":X".($cab+2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);						
				$sheet->getStyle("B".$cab.":X".($cab+2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);						
				$sheet->getStyle("B".$cab.":X".($cab+2))->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
				$sheet->getStyle("B".$cab.":X".($cab+2))->getFont()->setname('Arial')->setSize(9);



		     	$headStyle = $this->phpexcel->getActiveSheet()->getStyle("B".$cab.":X".($cab+2));
		        //$headStyle->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('#FF9900');
				$headStyle->applyFromArray($color_celda_cabeceras);

				$sheet->getStyle("B".$cab.":X".($cab+2))->applyFromArray(array(
				'borders' => array(
							'allborders' => array(
											'style' => PHPExcel_Style_Border::BORDER_THIN)
						)
				));
				$sheet->getStyle('K16')->getFont()->setname('Arial Narrow')->setSize(9); // tamaño especial para esta celda
			// ESTILOS  CABECERAS
		// CABECERA

	    // CUERPO
			$total = $query->num_rows()+ ($cab+2);
			//$numberStyle1 = $this->phpexcel->getActiveSheet(0)->getStyle('Q'.($cab+3).':V'.$total);
			//$numberStyle1->getNumberFormat()->setFormatCode('0.00');

			//$sheet->getActiveSheet(0)->getCell("G")->setValueExplicit('25',PHPExcel_Cell_DataType::TYPE_STRING);

			$sheet->getStyle("A".($cab+3).":X".$total)->getFont()->setname('Arial Narrow')->setSize(9);

			//bordes cuerpo
			$sheet->getStyle("B".($cab+3).":X".$total)->applyFromArray(array(
			'borders' => array(
						'allborders' => array(
										'style' => PHPExcel_Style_Border::BORDER_THIN)
					)
			));

			// EXPORTACION A EXCEL
			$row = $cab+2;
			$col = 2;
			$num = 0;
			$cambio = FALSE;
			 foreach($query->result() as $filas){
			    $row ++;
			    $num ++;			    
			    $sheet->getCellByColumnAndRow(1, $row)->setValue($num);// para numerar los registros
				//foreach($filas as $cols){ // llena cada celda
					
			  		//$sheet->getCellByColumnAndRow($col++, $row)->setValue($cols);
			  		
			  		$sheet->getCellByColumnAndRow(2, $row)->setValue(utf8_encode($filas->NomDept));
			  		$sheet->getCellByColumnAndRow(3, $row)->setValue(utf8_encode($filas->NomProv));
			  		$sheet->getCellByColumnAndRow(4, $row)->setValue(utf8_encode($filas->NomDist));
			  		$sheet->getCellByColumnAndRow(5, $row)->setValue(utf8_encode($filas->centroPoblado));
			  		$sheet->getCellByColumnAndRow(6, $row)->setValueExplicit($filas->codlocal,PHPExcel_Cell_DataType::TYPE_STRING);
			  		$sheet->getCellByColumnAndRow(7, $row)->setValueExplicit($filas->periodo,PHPExcel_Cell_DataType::TYPE_NUMERIC);
			  		$sheet->getCellByColumnAndRow(8, $row)->setValue($filas->fxinicio);
			  		$sheet->getCellByColumnAndRow(9, $row)->setValue($filas->fxfinal);
			  		$sheet->getCellByColumnAndRow(10, $row)->setValue($filas->traslado);
			  		$sheet->getCellByColumnAndRow(11, $row)->setValue($filas->trabajo_supervisor);
			  		$sheet->getCellByColumnAndRow(12, $row)->setValue($filas->recuperacion);
			  		$sheet->getCellByColumnAndRow(13, $row)->setValue($filas->retornosede);
			  		$sheet->getCellByColumnAndRow(14, $row)->setValue($filas->gabinete);
			  		$sheet->getCellByColumnAndRow(15, $row)->setValue($filas->descanso);
			  		$sheet->getCellByColumnAndRow(16, $row)->setValue($filas->totaldias);
			  		$sheet->getCellByColumnAndRow(17, $row)->setValue($filas->movilocal_ma);
			  		$sheet->getCellByColumnAndRow(18, $row)->setValue($filas->gastooperativo_ma);
			  		$sheet->getCellByColumnAndRow(19, $row)->setValue($filas->movilocal_af);
			  		$sheet->getCellByColumnAndRow(20, $row)->setValue($filas->gastooperativo_af);
			  		$sheet->getCellByColumnAndRow(21, $row)->setValue($filas->pasaje);
			  		$sheet->getCellByColumnAndRow(22, $row)->setValue($filas->total_af);
			  		/*
			  		$sheet->getCellByColumnAndRow(10, $row)->setValueExplicit($filas->traslado,PHPExcel_Cell_DataType::TYPE_NUMERIC);
			  		$sheet->getCellByColumnAndRow(11, $row)->setValueExplicit($filas->trabajo_supervisor,PHPExcel_Cell_DataType::TYPE_NUMERIC);
			  		$sheet->getCellByColumnAndRow(12, $row)->setValueExplicit($filas->recuperacion,PHPExcel_Cell_DataType::TYPE_NUMERIC);
			  		$sheet->getCellByColumnAndRow(13, $row)->setValueExplicit($filas->retornosede,PHPExcel_Cell_DataType::TYPE_NUMERIC);
			  		$sheet->getCellByColumnAndRow(14, $row)->setValueExplicit($filas->gabinete,PHPExcel_Cell_DataType::TYPE_NUMERIC);
			  		$sheet->getCellByColumnAndRow(15, $row)->setValueExplicit($filas->descanso,PHPExcel_Cell_DataType::TYPE_NUMERIC);
			  		$sheet->getCellByColumnAndRow(16, $row)->setValueExplicit($filas->totaldias,PHPExcel_Cell_DataType::TYPE_NUMERIC);
			  		$sheet->getCellByColumnAndRow(17, $row)->setValueExplicit($filas->movilocal_ma,PHPExcel_Cell_DataType::TYPE_NUMERIC);
			  		$sheet->getCellByColumnAndRow(18, $row)->setValueExplicit($filas->gastooperativo_ma,PHPExcel_Cell_DataType::TYPE_NUMERIC);
			  		$sheet->getCellByColumnAndRow(19, $row)->setValueExplicit($filas->movilocal_af,PHPExcel_Cell_DataType::TYPE_NUMERIC);
			  		$sheet->getCellByColumnAndRow(20, $row)->setValueExplicit($filas->gastooperativo_af,PHPExcel_Cell_DataType::TYPE_NUMERIC);
			  		$sheet->getCellByColumnAndRow(21, $row)->setValueExplicit($filas->pasaje,PHPExcel_Cell_DataType::TYPE_NUMERIC);
			  		$sheet->getCellByColumnAndRow(22, $row)->setValueExplicit($filas->total_af,PHPExcel_Cell_DataType::TYPE_NUMERIC);
			  		*/
			  		$sheet->getCellByColumnAndRow(23, $row)->setValue(utf8_encode($filas->observaciones));

				//}
				 $col = 2;
				 //dar formato de color intercalado a cada fila
				 if($cambio){
			     	$fila_color = $this->phpexcel->getActiveSheet()->getStyle("B".$row.":W".$row);
			        //$fila_color->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('#CD5C5C');
					$fila_color->applyFromArray(
					    array(
					        'fill' => array(
					            'type' => PHPExcel_Style_Fill::FILL_SOLID,
					            'color' => array('rgb' => 'DCDCDC')
					        )
					    )
					);			        
			        $cambio = FALSE;	
				 }else{	$cambio = TRUE; }
				
			}

 		// CUERPO

		// PIE TOTALES
			$celda_s = $total+1 ; // inicio de pie de resumenes
			$sheet->setCellValue('B'.$celda_s,'TOTAL' );
			$sheet->mergeCells('B'.$celda_s.':J'.$celda_s);
			
			$inicio_s = $cab+3 ; // inicio suma  de resumenes	
			$fin_s = $total ; // fin suma de resumenes	

			$sheet->getStyle('X'.$inicio_s.':X'.$fin_s)->getAlignment()->setWrapText(true);// AJUSTA TEXTO A CELDA


			$sheet->setCellValue('K'. $celda_s ,'=IF(SUM(K'.$inicio_s.':K'.$fin_s.')>0,SUM(K'.$inicio_s.':K'.$fin_s.')," ")');

			$sheet->setCellValue('L'. $celda_s ,'=IF(SUM(L'.$inicio_s.':L'.$fin_s.')>0,SUM(L'.$inicio_s.':L'.$fin_s.')," ")');
			$sheet->setCellValue('M'. $celda_s ,'=IF(SUM(M'.$inicio_s.':M'.$fin_s.')>0,SUM(M'.$inicio_s.':M'.$fin_s.')," ")');
			$sheet->setCellValue('N'. $celda_s ,'=IF(SUM(N'.$inicio_s.':N'.$fin_s.')>0,SUM(N'.$inicio_s.':N'.$fin_s.')," ")');
			$sheet->setCellValue('O'. $celda_s ,'=IF(SUM(O'.$inicio_s.':O'.$fin_s.')>0,SUM(O'.$inicio_s.':O'.$fin_s.')," ")');
			$sheet->setCellValue('P'. $celda_s ,'=IF(SUM(P'.$inicio_s.':P'.$fin_s.')>0,SUM(P'.$inicio_s.':P'.$fin_s.')," ")');
			$sheet->setCellValue('Q'. $celda_s ,'=IF(SUM(Q'.$inicio_s.':Q'.$fin_s.')>0,SUM(Q'.$inicio_s.':Q'.$fin_s.')," ")');
			$sheet->setCellValue('T'. $celda_s ,'=IF(SUM(T'.$inicio_s.':T'.$fin_s.')>0,SUM(T'.$inicio_s.':T'.$fin_s.')," ")');
			$sheet->setCellValue('U'. $celda_s ,'=IF(SUM(U'.$inicio_s.':U'.$fin_s.')>0,SUM(U'.$inicio_s.':U'.$fin_s.')," ")');
			$sheet->setCellValue('V'. $celda_s ,'=IF(SUM(V'.$inicio_s.':V'.$fin_s.')>0,SUM(V'.$inicio_s.':V'.$fin_s.')," ")');
			$sheet->setCellValue('W'. $celda_s ,'=IF(SUM(W'.$inicio_s.':W'.$fin_s.')>0,SUM(W'.$inicio_s.':W'.$fin_s.')," ")');
			// $sheet->mergeCells('Q'.$celda_s.':S'.$celda_s);
			// $sheet->mergeCells('Y'.$celda_s.':X'.$celda_s);

	     	$sheet->getStyle('B'.$celda_s)->applyFromArray($color_celda_cabeceras);
	     	$sheet->getStyle('R'.$celda_s)->applyFromArray($color_celda_cabeceras);
	     	$sheet->getStyle('S'.$celda_s)->applyFromArray($color_celda_cabeceras);
	     	$sheet->getStyle('X'.$celda_s)->applyFromArray($color_celda_cabeceras);
	     	$sheet->getStyle('B'.$celda_s.':X'.$celda_s)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
			$sheet->getStyle('B'.$celda_s)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);

			$sheet->getStyle('B'.$celda_s.':X'.$celda_s)->applyFromArray(array(
			'borders' => array(
						'allborders' => array(
										'style' => PHPExcel_Style_Border::BORDER_THIN)
					)
			));

			//$numberStyle2 = $this->phpexcel->getActiveSheet(0)->getStyle('S'.$celda_s.':V'.$celda_s);
			//$numberStyle2->getNumberFormat()->setFormatCode('0.00');
			//$sheet->getStyle('T'.($total+2).':W'.($total+2))->getFont()->setname('Arial Narrow')->setSize(10);

			//fecha
			$sheet->setCellValue('B'.($celda_s +2),'IMPRESO:' );
			$sheet->mergeCells('B'.($celda_s +2).':C'.($celda_s +2));
	     	$sheet->getStyle('B'.($celda_s + 2))->applyFromArray($color_celda_cabeceras);
	     	$sheet->getStyle('B'.($celda_s + 2).':C'.($celda_s +2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
			$sheet->getStyle('B'.($celda_s + 2))->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);

			$sheet->setCellValue('D'.($celda_s +2), date('d/m/Y H:i:s') );
			//$sheet->getStyle('D'.($celda_s +2))->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_DDMMYYYY); 
			$sheet->getStyle('D'.($celda_s +2))->getNumberFormat()->setFormatCode('d/m/Y H:i:s'); 
			$sheet->getStyle('B'.($celda_s +2).':D'.($celda_s +2))->applyFromArray(array(
			'borders' => array(
						'allborders' => array(
										'style' => PHPExcel_Style_Border::BORDER_THIN)
					)
			));
		// PIE TOTALES

		// SALIDA EXCEL
			//$objPHPExcel->getActiveSheet()->setCellValueExplicitByColumnAndRow($numColum,$numRow,$products[$i][$colName], PHPExcel_Cell_DataType::TYPE_STRING);
			// Propiedades del archivo excel
				$sheet->setTitle("Prog_Ruta_Evaluador");
				$this->phpexcel->getProperties()
				->setTitle("Prog Ruta Evaluador")
				->setDescription("Programacion de ruta de trabajo del evaluador tecnico");

			header("Content-Type: application/vnd.ms-excel");
			$nombreArchivo = 'Prog_ruta_evaluador'.date('YmdHis');
			header("Content-Disposition: attachment; filename=\"$nombreArchivo.xls\""); //EXCEL
			header("Cache-Control: max-age=0");
			
			// Genera Excel
			$writer = PHPExcel_IOFactory::createWriter($this->phpexcel, "Excel5");
			//$writer = new PHPExcel_Writer_Excel2007($this->phpexcel);

			$writer->save('php://output');
			exit;
		// SALIDA EXCEL
	}

/*

	public function ExportacionRutasProvOperativa()
	{
		$this->load->helper('form');
		$this->load->model('segmentaciones/rutas_model');

		$cond1 = "";
		$cond2 = "";
		$cond3 = "";

		$where1 = "";

		$sidx = "convert(datetime,fxinicio,103), prov_operativa_ugel";
		
		if(isset($_GET['codsede'])) { 
			$sede = $this->input->get('codsede');
			if ($sede != -1) { 
				$cond1 = "cod_sede_operativa = '$sede'";
			}
		}else{ $sede = ""; 
			$cond1 = "cod_sede_operativa = '-1'"; }

		if(isset($_GET['codprov'])) { 
			$prov = $this->input->get('codprov');
			if ($prov != -1) { 
				$cond2 = "cod_prov_operativa = '$prov'";
			}
		}else{ $prov = ""; 
			$cond2 = "cod_prov_operativa = '-1'"; }
		
		if(isset($_GET['codruta'])) { 
			$ruta = $this->input->get('codruta');
			$cond3 = "idruta = '$ruta'";
		}else{ $ruta = ""; 
			$cond3 = "idruta = ''";}

		if(!$sidx) $sidx =1;

		$where1 =  "WHERE ".$cond1." AND ".$cond2." AND ".$cond3;
		$count = $this->rutas_model->contar_datos($where1);

		$data['cantidad'] = $count;
		$query = $this->rutas_model->report_rutasprovincia($sidx, 'asc', '0', $count, $where1);
		$data['consulta'] = $query;
		if ($query->num_rows() > 0)
		{
			$row = $query->row(); 
			$data['sede'] = $row->sede_operativa;
			$data['prov'] = $row->prov_operativa_ugel;
			$data['ruta'] = $row->idruta;
		}

		$this->load->view('excel/rutaprovoperativa_xls', $data);
	}
*/

	public function ExportacionJefeBrigada()
	{
		$this->load->model('segmentaciones/rutas_model');
		//colores
			$color_celda_cabeceras =   array(
				        'fill' => array(
				            'type' => PHPExcel_Style_Fill::FILL_SOLID,
				            'color' => array('rgb' => '27408B')
				        )
				    );
    	//colores

		$sidx = "convert(datetime,fxinicio_jb,103), prov_operativa_ugel";
		
		if(isset($_GET['codsede'])) { 
			$sede = $this->input->get('codsede');			
		}else{ $sede = "-1"; }
		$cond1 = "cod_sede_operativa = '$sede'";

		if(isset($_GET['codprov'])) { 
			$provope = $this->input->get('codprov');			
		}else{ $provope = "-1"; }
		$cond2 = "cod_prov_operativa = '$provope'";

		if(isset($_GET['codjb'])) { 
			$jefeb = $this->input->get('codjb');			
		}else{ $jefeb = ""; }
		$cond3 = "cod_jefebrigada = '$jefeb'";

		$where = "WHERE fxinicio_jb is not null AND ".$cond1." AND ".$cond2." AND ".$cond3;
		$count = $this->rutas_model->contar_datos_jb($where);
		
		$query = $this->rutas_model->report_jefebrigada($sidx, 'asc', '0', $count, $where);

		// pestaña
		$sheet = $this->phpexcel->getActiveSheet(0);
		
		// formato de la hoja
			// Set Orientation, size and scaling
			$sheet->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);// horizontal
			$sheet->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A3);
			$sheet->getPageSetup()->setFitToPage(false); // ajustar pagina
			$sheet->getPageSetup()->setFitToWidth(1);
			$sheet->getPageSetup()->setFitToHeight(0);		
			$sheet->setShowGridlines(false);// oculta lineas de cuadricula		
		// formato de la hoja

		// ANCHO Y ALTURA DE COLUMNAS DEL FILE
			$sheet->getColumnDimension('A')->setWidth(1);
			$sheet->getColumnDimension('B')->setWidth(5);
			$sheet->getColumnDimension('C')->setWidth(22);
			$sheet->getColumnDimension('D')->setWidth(20);
			$sheet->getColumnDimension('E')->setWidth(20);
			$sheet->getColumnDimension('F')->setWidth(20);
			$sheet->getColumnDimension('G')->setWidth(8);
			$sheet->getColumnDimension('H')->setWidth(8);
			$sheet->getColumnDimension('I')->setWidth(8);
			$sheet->getColumnDimension('J')->setWidth(8);
			$sheet->getColumnDimension('K')->setWidth(8);
			$sheet->getColumnDimension('L')->setWidth(5);
			$sheet->getColumnDimension('M')->setWidth(5);
			$sheet->getColumnDimension('N')->setWidth(5);
			$sheet->getColumnDimension('O')->setWidth(5);
			$sheet->getColumnDimension('P')->setWidth(7);
			$sheet->getColumnDimension('Q')->setWidth(8);
			$sheet->getColumnDimension('R')->setWidth(7);
			$sheet->getColumnDimension('S')->setWidth(10);
			$sheet->getColumnDimension('T')->setWidth(9);
			$sheet->getColumnDimension('U')->setWidth(9);
			$sheet->getColumnDimension('V')->setWidth(9);
			$sheet->getColumnDimension('W')->setWidth(30);
			

			$sheet->getRowDimension(4)->setRowHeight(2);
			$sheet->getRowDimension(6)->setRowHeight(2);
			$sheet->getRowDimension(17)->setRowHeight(40);
		// ANCHO Y ALTURA DE COLUMNAS DEL FILE

		// TITULOS
			$sheet->setCellValue('A3','INSTITUTO NACIONAL DE ESTADÍSTICA E INFORMATICA');
			$sheet->mergeCells('A3:W3');
			$sheet->setCellValue('A5','CENSO DE INFRAESTRUCTURA EDUCATIVA 2013');
			$sheet->mergeCells('A5:W5');
			$sheet->setCellValue('A7','PROGRAMACIÓN DE RUTA DE TRABAJO DEL JEFE DE BRIGADA');
			$sheet->mergeCells('A7:W7');
			$sheet->getStyle('A3:W7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$sheet->getStyle('A3:W7')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
			$sheet->getStyle('A3:W3')->getFont()->setname('Arial black')->setSize(18);
			$sheet->getStyle('A5:W7')->getFont()->setname('Arial')->setSize(18);

			// LOGO
			
	          $objDrawing = new PHPExcel_Worksheet_Drawing();
	          $objDrawing->setWorksheet($sheet);
	          $objDrawing->setName("inei");
	          $objDrawing->setDescription("Inei");
	          $objDrawing->setPath("img/inei.jpeg");
	          $objDrawing->setCoordinates('C2');
	          $objDrawing->setHeight(80);
	          $objDrawing->setOffsetX(1);
	          $objDrawing->setOffsetY(5);

		// TITULOS

		// CABECERA ESPECIAL
					$sheet->setCellValue('B9','SEDE OPERATIVA:');
					$sheet->mergeCells('B9:C9');
					$sheet->setCellValue('B10','PROVINCIA OPERATIVA:');
					$sheet->mergeCells('B10:C10');
					$sheet->setCellValue('B11','JEFE BRIGADA:');
					$sheet->mergeCells('B11:C11');
					//$sheet->setCellValue('B12','RUTA:');
					//$sheet->mergeCells('B12:C12');
					$sheet->getStyle('B9:C12')->getFont()->setname('Arial')->setSize(11)->setBold(true);

					if ($query->num_rows() > 0)
					{
						$row = $query->row();
						$sheet->setCellValue('D9',utf8_encode($row->sede_operativa));
						$sheet->mergeCells('D9:E9');
						$sheet->setCellValue('D10',utf8_encode($row->prov_operativa_ugel));
						$sheet->mergeCells('D10:E10');
						$sheet->getCellByColumnAndRow(3, 11)->setValueExplicit($row->cod_jefebrigada,PHPExcel_Cell_DataType::TYPE_STRING);
						$sheet->mergeCells('D11:E11');
						//$sheet->setCellValue('D12',$row->idruta);
						//$sheet->mergeCells('D12:E12');
					}

					$sheet->getStyle('D9:E11')->getFont()->setname('Arial')->setSize(12);
					$sheet->getStyle("D9:E11")->getAlignment()->setWrapText(true);// AJUSTA TEXTO A CELDA
			     	
			     	$sheet->getStyle("B9:C11")->applyFromArray($color_celda_cabeceras);
			     	$sheet->getStyle("D9:E11")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
					$sheet->getStyle("B9:C11")->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);

					$sheet->getStyle("B9:E11")->applyFromArray(array(
					'borders' => array(
								'allborders' => array(
												'style' => PHPExcel_Style_Border::BORDER_THIN)
							)
					));
					
					$sheet->setCellValue('J10','NOMBRES Y APELLIDOS DEL JEFE DE BRIGADA');
					$sheet->mergeCells('J10:T10');
			  		$sheet->getStyle('J10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$sheet->getStyle('J10')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);	
					$sheet->getStyle("J10")->applyFromArray($color_celda_cabeceras);	
													
					$sheet->mergeCells('J11:T11');
					$sheet->getStyle("J10:T11")->applyFromArray(array(
					'borders' => array(
								'allborders' => array(
												'style' => PHPExcel_Style_Border::BORDER_THIN)
							)
					));


					$sheet->setCellValue('W15','DOC.CIE03.02');
					$sheet->mergeCells('W15:W15');

					$sheet->getStyle('D9:W11')->getFont()->setname('Arial')->setSize(12);	// TAMAÑO FUENTE CABECERAS
		// CABECERA ESPECIAL

		// CABECERA
			// INICIO DE LA  cabecera
			$cab = 16;	
				
			// NOMBRE CABECERAS
	
					$sheet->setCellValue('B'.$cab,'N°');
					$sheet->mergeCells('B'.$cab.':B'.($cab+2));

					$sheet->setCellValue('C'.$cab,'Departamento' );
					$sheet->mergeCells('C'.$cab.':C'.($cab+2));
					$sheet->setCellValue('D'.$cab,'Provincia' );
					$sheet->mergeCells('D'.$cab.':D'.($cab+2));
					$sheet->setCellValue('E'.$cab,'Distrito' );
					$sheet->mergeCells('E'.$cab.':E'.($cab+2));
					$sheet->setCellValue('F'.$cab,'Centro Poblado' );
					$sheet->mergeCells('F'.$cab.':F'.($cab+2));
					$sheet->setCellValue('G'.$cab, 'Codigo de Local');
					$sheet->mergeCells('G'.$cab.':G'.($cab+2));	
					$sheet->setCellValue('H'.$cab, 'Periodo');
					$sheet->mergeCells('H'.$cab.':H'.($cab+2));

					$sheet->setCellValue('I'.$cab,'Periodo de trabajo');
					$sheet->mergeCells('I'.$cab.':J'.$cab);
						$sheet->setCellValue('I'.($cab+1),'Fecha Inicio');
						$sheet->mergeCells('I'.($cab+1).':I'.($cab+2));
						$sheet->setCellValue('J'.($cab+1),'Fecha Final');
						$sheet->mergeCells('J'.($cab+1).':J'.($cab+2));
					
					$sheet->setCellValue('K'.$cab,'Días de Operación de Campo');
					$sheet->mergeCells('K'.$cab.':P'.$cab);
						$sheet->setCellValue('K'.($cab+1),'Traslado' );
						$sheet->mergeCells('K'.($cab+1).':K'.($cab+2));
						$sheet->setCellValue('L'.($cab+1),'Trabajo' );
						$sheet->mergeCells('L'.($cab+1).':L'.($cab+2));
						$sheet->setCellValue('M'.($cab+1), 'Retorno a Sede' );
						$sheet->mergeCells('M'.($cab+1).':M'.($cab+2));
						$sheet->setCellValue('N'.($cab+1), 'Gabinete' );
						$sheet->mergeCells('N'.($cab+1).':N'.($cab+2));
						$sheet->setCellValue('O'.($cab+1), 'Descanso' );
						$sheet->mergeCells('O'.($cab+1).':O'.($cab+2));
						$sheet->setCellValue('P'.($cab+1), 'Total Dias' );
						$sheet->mergeCells('P'.($cab+1).':P'.($cab+2));

					$sheet->setCellValue('Q'.$cab,'Monto Asignado' );
					$sheet->mergeCells('Q'.$cab.':R'.$cab);
						$sheet->setCellValue('Q'.($cab+1), 'Mov. Local' );
						$sheet->mergeCells('Q'.($cab+1).':Q'.($cab+2));
						$sheet->setCellValue('R'.($cab+1), 'Gasto operativo' );
						$sheet->mergeCells('R'.($cab+1).':R'.($cab+2));

					$sheet->setCellValue('S'.$cab,'Asignación de Fondos' );
					$sheet->mergeCells('S'.$cab.':U'.$cab);
						$sheet->setCellValue('S'.($cab+1), 'Mov. Local' );
						$sheet->mergeCells('S'.($cab+1).':S'.($cab+2));
						$sheet->setCellValue('T'.($cab+1), 'Gastos Operativos' );
						$sheet->mergeCells('T'.($cab+1).':T'.($cab+2));
						$sheet->setCellValue('U'.($cab+1), 'Pasaje' );
						$sheet->mergeCells('U'.($cab+1).':U'.($cab+2));
					
					$sheet->setCellValue('V'.$cab, 'TOTAL' );
					$sheet->mergeCells('V'.$cab.':V'.($cab+2));
					$sheet->setCellValue('W'.$cab,'Observaciones' );
					$sheet->mergeCells('W'.$cab.':W'.($cab+2));
			// NOMBRE CABECERAS

			// ESTILOS  CABECERAS
				$sheet->getStyle("B".$cab.":W".($cab+2))->getAlignment()->setWrapText(true);// AJUSTA TEXTO A CELDA
				$sheet->getStyle("B".$cab.":W".($cab+2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);						
				$sheet->getStyle("B".$cab.":W".($cab+2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);						
				$sheet->getStyle("B".$cab.":W".($cab+2))->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
				$sheet->getStyle("B".$cab.":W".($cab+2))->getFont()->setname('Arial')->setSize(9);



		     	$headStyle = $this->phpexcel->getActiveSheet()->getStyle("B".$cab.":W".($cab+2));
				$headStyle->applyFromArray($color_celda_cabeceras);

				$sheet->getStyle("B".$cab.":W".($cab+2))->applyFromArray(array(
				'borders' => array(
							'allborders' => array(
											'style' => PHPExcel_Style_Border::BORDER_THIN)
						)
				));
				$sheet->getStyle('K16')->getFont()->setname('Arial Narrow')->setSize(9); // tamaño especial para esta celda
			// ESTILOS  CABECERAS
		// CABECERA

	    // CUERPO
			$total = $query->num_rows()+ ($cab+2);
			$sheet->getStyle("A".($cab+3).":W".$total)->getFont()->setname('Arial Narrow')->setSize(9);

			//bordes cuerpo
			$sheet->getStyle("B".($cab+3).":W".$total)->applyFromArray(array(
			'borders' => array(
						'allborders' => array(
										'style' => PHPExcel_Style_Border::BORDER_THIN)
					)
			));

			// EXPORTACION A EXCEL
			$row = $cab+2;
			$col = 2;
			$num = 0;
			$cambio = FALSE;
			 foreach($query->result() as $filas){
			    $row ++;
			    $num ++;			    
			    $sheet->getCellByColumnAndRow(1, $row)->setValue($num);// para numerar los registros
			  		
			  		$sheet->getCellByColumnAndRow(2, $row)->setValue(utf8_encode($filas->nombre_dpto));
			  		$sheet->getCellByColumnAndRow(3, $row)->setValue(utf8_encode($filas->nombre_provincia));
			  		$sheet->getCellByColumnAndRow(4, $row)->setValue(utf8_encode($filas->nombre_distrito));
			  		$sheet->getCellByColumnAndRow(5, $row)->setValue(utf8_encode($filas->centroPoblado));
			  		$sheet->getCellByColumnAndRow(6, $row)->setValueExplicit($filas->codigo_de_local,PHPExcel_Cell_DataType::TYPE_STRING);
			  		$sheet->getCellByColumnAndRow(7, $row)->setValueExplicit($filas->periodo_jb,PHPExcel_Cell_DataType::TYPE_NUMERIC);
			  		$sheet->getCellByColumnAndRow(8, $row)->setValue($filas->fxinicio_jb);
			  		$sheet->getCellByColumnAndRow(9, $row)->setValue($filas->fxfinal_jb);
			  		$sheet->getCellByColumnAndRow(10, $row)->setValue($filas->traslado_jb);
			  		$sheet->getCellByColumnAndRow(11, $row)->setValue($filas->trabajo_supervisor_jb);
			  		$sheet->getCellByColumnAndRow(12, $row)->setValue($filas->retornosede_jb);
			  		$sheet->getCellByColumnAndRow(13, $row)->setValue($filas->gabinete_jb);
			  		$sheet->getCellByColumnAndRow(14, $row)->setValue($filas->descanso_jb);
			  		$sheet->getCellByColumnAndRow(15, $row)->setValue($filas->totaldias_jb);
			  		$sheet->getCellByColumnAndRow(16, $row)->setValue($filas->movilocal_ma_jb);
			  		$sheet->getCellByColumnAndRow(17, $row)->setValue($filas->gastooperativo_ma_jb);
			  		$sheet->getCellByColumnAndRow(18, $row)->setValue($filas->movilocal_af_jb);
			  		$sheet->getCellByColumnAndRow(19, $row)->setValue($filas->gastooperativo_af_jb);
			  		$sheet->getCellByColumnAndRow(20, $row)->setValue($filas->pasaje_jb);
			  		$sheet->getCellByColumnAndRow(21, $row)->setValue($filas->total_af_jb);
			  		$sheet->getCellByColumnAndRow(22, $row)->setValue(utf8_encode($filas->observaciones_jb));
				//}
				 $col = 2;
				 //dar formato de color intercalado a cada fila
				 if($cambio){
			     	$fila_color = $this->phpexcel->getActiveSheet()->getStyle("B".$row.":W".$row);
			        
					$fila_color->applyFromArray(
					    array(
					        'fill' => array(
					            'type' => PHPExcel_Style_Fill::FILL_SOLID,
					            'color' => array('rgb' => 'DCDCDC')
					        )
					    )
					);			        
			        $cambio = FALSE;	
				 }else{	$cambio = TRUE; }
				
			}

 		// CUERPO

		// PIE TOTALES
			$celda_s = $total+1 ; // inicio de pie de resumenes
			$sheet->setCellValue('B'.$celda_s,'TOTAL' );
			$sheet->mergeCells('B'.$celda_s.':J'.$celda_s);
			
			$inicio_s = $cab+3 ; // inicio suma  de resumenes	
			$fin_s = $total ; // fin suma de resumenes	

			$sheet->getStyle('W'.$inicio_s.':W'.$fin_s)->getAlignment()->setWrapText(true);// AJUSTA TEXTO A CELDA

			$sheet->setCellValue('K'. $celda_s ,'=IF(SUM(K'.$inicio_s.':K'.$fin_s.')>0,SUM(K'.$inicio_s.':K'.$fin_s.')," ")');
			$sheet->setCellValue('L'. $celda_s ,'=IF(SUM(L'.$inicio_s.':L'.$fin_s.')>0,SUM(L'.$inicio_s.':L'.$fin_s.')," ")');
			$sheet->setCellValue('M'. $celda_s ,'=IF(SUM(M'.$inicio_s.':M'.$fin_s.')>0,SUM(M'.$inicio_s.':M'.$fin_s.')," ")');
			$sheet->setCellValue('N'. $celda_s ,'=IF(SUM(N'.$inicio_s.':N'.$fin_s.')>0,SUM(N'.$inicio_s.':N'.$fin_s.')," ")');
			$sheet->setCellValue('O'. $celda_s ,'=IF(SUM(O'.$inicio_s.':O'.$fin_s.')>0,SUM(O'.$inicio_s.':O'.$fin_s.')," ")');
			$sheet->setCellValue('P'. $celda_s ,'=IF(SUM(P'.$inicio_s.':P'.$fin_s.')>0,SUM(P'.$inicio_s.':P'.$fin_s.')," ")');
			$sheet->setCellValue('S'. $celda_s ,'=IF(SUM(S'.$inicio_s.':S'.$fin_s.')>0,SUM(S'.$inicio_s.':S'.$fin_s.')," ")');
			$sheet->setCellValue('T'. $celda_s ,'=IF(SUM(T'.$inicio_s.':T'.$fin_s.')>0,SUM(T'.$inicio_s.':T'.$fin_s.')," ")');
			$sheet->setCellValue('U'. $celda_s ,'=IF(SUM(U'.$inicio_s.':U'.$fin_s.')>0,SUM(U'.$inicio_s.':U'.$fin_s.')," ")');
			$sheet->setCellValue('V'. $celda_s ,'=IF(SUM(V'.$inicio_s.':V'.$fin_s.')>0,SUM(V'.$inicio_s.':V'.$fin_s.')," ")');


	     	$sheet->getStyle('B'.$celda_s)->applyFromArray($color_celda_cabeceras);
	     	$sheet->getStyle('Q'.$celda_s)->applyFromArray($color_celda_cabeceras);
	     	$sheet->getStyle('R'.$celda_s)->applyFromArray($color_celda_cabeceras);
	     	$sheet->getStyle('W'.$celda_s)->applyFromArray($color_celda_cabeceras);
	     	$sheet->getStyle('B'.$celda_s.':W'.$celda_s)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
			$sheet->getStyle('B'.$celda_s)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);

			$sheet->getStyle('B'.$celda_s.':W'.$celda_s)->applyFromArray(array(
			'borders' => array(
						'allborders' => array(
										'style' => PHPExcel_Style_Border::BORDER_THIN)
					)
			));

			//fecha
			$sheet->setCellValue('B'.($celda_s +2),'IMPRESO:' );
			$sheet->mergeCells('B'.($celda_s +2).':C'.($celda_s +2));
	     	$sheet->getStyle('B'.($celda_s + 2))->applyFromArray($color_celda_cabeceras);
	     	$sheet->getStyle('B'.($celda_s + 2).':C'.($celda_s +2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
			$sheet->getStyle('B'.($celda_s + 2))->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);

			$sheet->setCellValue('D'.($celda_s +2), date('d/m/Y H:i:s') );
			
			$sheet->getStyle('D'.($celda_s +2))->getNumberFormat()->setFormatCode('d/m/Y H:i:s'); 
			$sheet->getStyle('B'.($celda_s +2).':D'.($celda_s +2))->applyFromArray(array(
			'borders' => array(
						'allborders' => array(
										'style' => PHPExcel_Style_Border::BORDER_THIN)
					)
			));
		// PIE TOTALES

		// SALIDA EXCEL
			// Propiedades del archivo excel
				$sheet->setTitle("Prog_Ruta_JefeB");
				$this->phpexcel->getProperties()
				->setTitle("Prog Ruta Jefe Brigada")
				->setDescription("Programacion de ruta de trabajo del jefe de brigada");

			header("Content-Type: application/vnd.ms-excel");
			$nombreArchivo = 'Prog_ruta_jefeb'.date('YmdHis');
			header("Content-Disposition: attachment; filename=\"$nombreArchivo.xls\""); //EXCEL
			header("Cache-Control: max-age=0");
			
			// Genera Excel
			$writer = PHPExcel_IOFactory::createWriter($this->phpexcel, "Excel5");

			$writer->save('php://output');
			exit;
		// SALIDA EXCEL
	}

	public function ExportacionListadoRutas()
	{
		//colores

		$this->load->model('segmentaciones/rutas_model');

		$cond1 = "";
		$cond2 = "";
		$cond3 = "";

		$where1 = "";

		$sidx = "convert(datetime,fxinicio,103),prov_operativa_ugel";
		
		if(isset($_GET['codsede'])) { 
			$sede = $this->input->get('codsede');
			if ($sede != -1) { 
				$cond1 = "cod_sede_operativa = '$sede'";
			}
		}else{ $sede = ""; 
			$cond1 = "cod_sede_operativa = '-1'"; }

		if(isset($_GET['codprov'])) { 
			$prov = $this->input->get('codprov');
			if ($prov != -1) { 
				$cond2 = "cod_prov_operativa = '$prov'";
			}
		}else{ $prov = ""; 
			$cond2 = "cod_prov_operativa = '-1'"; }
		
		if(isset($_GET['codruta'])) { 
			$ruta = $this->input->get('codruta');
			$cond3 = "idruta = '$ruta'";
		}else{ $ruta = ""; 
			$cond3 = "idruta = ''";}

		if(!$sidx) $sidx =1;
		$where1 =  "WHERE ".$cond1." AND ".$cond2." AND ".$cond3;
		$count = $this->rutas_model->contar_datos($where1);
		$query = $this->rutas_model->listado_rutas($sidx, 'asc', '0', $count, $where1);
		
		$color_celda_cabeceras = array(
        	'fill' => array(
				'type' => PHPExcel_Style_Fill::FILL_SOLID,
					'color' => array('rgb' => '27408B')
				)
			);
		// pestaña
		$sheet = $this->phpexcel->getActiveSheet(0);
		
		// formato de la hoja
			// Set Orientation, size and scaling
			$sheet->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);// horizontal
			$sheet->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A3);
			$sheet->getPageSetup()->setFitToPage(false); // ajustar pagina
			$sheet->getPageSetup()->setFitToWidth(1);
			$sheet->getPageSetup()->setFitToHeight(0);
			$sheet->setShowGridlines(false);// oculta lineas de cuadricula
		// formato de la hoja

		// ANCHO Y ALTURA DE COLUMNAS DEL FILE
			$sheet->getColumnDimension('A')->setWidth(1);
			$sheet->getColumnDimension('B')->setWidth(5);
			$sheet->getColumnDimension('C')->setWidth(18);
			$sheet->getColumnDimension('D')->setWidth(18);
			$sheet->getColumnDimension('E')->setWidth(25);
			$sheet->getColumnDimension('F')->setWidth(25);
			$sheet->getColumnDimension('G')->setWidth(18);
			$sheet->getColumnDimension('H')->setWidth(37);
			$sheet->getColumnDimension('I')->setWidth(37);
			$sheet->getColumnDimension('J')->setWidth(20);
			$sheet->getColumnDimension('K')->setWidth(8);

			$sheet->getRowDimension(4)->setRowHeight(2);
			$sheet->getRowDimension(6)->setRowHeight(2);
		// ANCHO Y ALTURA DE COLUMNAS DEL FILE

		// TITULOS
			$sheet->setCellValue('A3','INSTITUTO NACIONAL DE ESTADÍSTICA E INFORMATICA');
			$sheet->mergeCells('A3:K3');
			$sheet->setCellValue('A5','CENSO DE INFRAESTRUCTURA EDUCATIVA 2013');
			$sheet->mergeCells('A5:K5');
			$sheet->setCellValue('A7','LISTADO DE LOCALES ESCOLARES POR RUTA DE TRABAJO DEL EVALUADOR TECNICO');
			$sheet->mergeCells('A7:K7');
			$sheet->getStyle('A3:K7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$sheet->getStyle('A3:K7')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
			$sheet->getStyle('A3:K3')->getFont()->setname('Arial black')->setSize(18);
			$sheet->getStyle('A5:K7')->getFont()->setname('Arial')->setSize(18);

			// LOGO
			
	          $objDrawing = new PHPExcel_Worksheet_Drawing();
	          $objDrawing->setWorksheet($sheet);
	          $objDrawing->setName("inei");
	          $objDrawing->setDescription("Inei");
	          $objDrawing->setPath("img/inei.jpeg");
	          $objDrawing->setCoordinates('C2');
	          $objDrawing->setHeight(80);
	          $objDrawing->setOffsetX(1);
	          $objDrawing->setOffsetY(5);
			
		// TITULOS

		// CABECERA ESPECIAL
					$sheet->setCellValue('B9','SEDE OPERATIVA:');
					$sheet->mergeCells('B9:C9');
					$sheet->setCellValue('B10','PROVINCIA OPERATIVA:');
					$sheet->mergeCells('B10:C10');
					$sheet->setCellValue('B11','JEFE BRIGADA:');
					$sheet->mergeCells('B11:C11');
					$sheet->setCellValue('B12','RUTA:');
					$sheet->mergeCells('B12:C12');
					$sheet->getStyle('B9:C12')->getFont()->setname('Arial')->setSize(11)->setBold(true);

					if ($query->num_rows() > 0)
					{
						$row = $query->row();
						$sheet->setCellValue('D9',utf8_encode($row->sede_operativa));
						$sheet->mergeCells('D9:E9');
						$sheet->setCellValue('D10',utf8_encode($row->prov_operativa_ugel));
						$sheet->mergeCells('D10:E10');
						$sheet->getCellByColumnAndRow(3, 11)->setValueExplicit($row->cod_jefebrigada,PHPExcel_Cell_DataType::TYPE_STRING);
						$sheet->mergeCells('D11:E11');
						$sheet->getCellByColumnAndRow(3, 12)->setValueExplicit($row->idruta,PHPExcel_Cell_DataType::TYPE_STRING);
						$sheet->mergeCells('D12:E12');						
					}

					$sheet->getStyle("D9:E12")->getAlignment()->setWrapText(true);// AJUSTA TEXTO A CELDA
			     	$sheet->getStyle("B9:C12")->applyFromArray($color_celda_cabeceras);
			     	$sheet->getStyle("D9:E12")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
					$sheet->getStyle("B9:C12")->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);

					$sheet->getStyle("B9:E12")->applyFromArray(array(
					'borders' => array(
								'allborders' => array(
												'style' => PHPExcel_Style_Border::BORDER_THIN)
							)
					));
					
					$sheet->setCellValue('G10','NOMBRES Y APELLIDOS DEL EVALUADOR');
					$sheet->mergeCells('G10:K10');
			  		$sheet->getStyle('G10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$sheet->getStyle('G10')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);	
					$sheet->getStyle("G10")->applyFromArray($color_celda_cabeceras);

					$sheet->mergeCells('G11:K11');
					$sheet->getStyle("G10:K11")->applyFromArray(array(
					'borders' => array(
								'allborders' => array(
												'style' => PHPExcel_Style_Border::BORDER_THIN)
							)
					));

					$sheet->setCellValue('J15','DOC.CIE03.06');
					$sheet->mergeCells('J15:K15');

					$sheet->getStyle('D9:K11')->getFont()->setname('Arial')->setSize(12);	// TAMAÑO FUENTE CABECERAS
		// CABECERA ESPECIAL

		// CABECERA
			// INICIO DE LA  cabecera
			$cab = 16;	
				
			// NOMBRE CABECERAS
					$sheet->setCellValue('B'.$cab,'N°');
					$sheet->mergeCells('B'.$cab.':B'.($cab+2));

					$sheet->setCellValue('C'.$cab,'Departamento' );
					$sheet->mergeCells('C'.$cab.':C'.($cab+2));
					$sheet->setCellValue('D'.$cab,'Provincia' );
					$sheet->mergeCells('D'.$cab.':D'.($cab+2));
					$sheet->setCellValue('E'.$cab,'Distrito' );
					$sheet->mergeCells('E'.$cab.':E'.($cab+2));
					$sheet->setCellValue('F'.$cab,'Centro Poblado' );
					$sheet->mergeCells('F'.$cab.':F'.($cab+2));
					$sheet->setCellValue('G'.$cab, 'Codigo de Local');
					$sheet->mergeCells('G'.$cab.':G'.($cab+2));	
					$sheet->setCellValue('H'.$cab, 'Dirección');
					$sheet->mergeCells('H'.$cab.':H'.($cab+2));
					$sheet->setCellValue('I'.$cab,'Nivel Educativo');
					$sheet->mergeCells('I'.$cab.':I'.($cab+2));
					$sheet->setCellValue('J'.$cab,'UGEL');
					$sheet->mergeCells('J'.$cab.':J'.($cab+2));
					$sheet->setCellValue('K'.$cab,'Area');
					$sheet->mergeCells('K'.$cab.':K'.($cab+2));
			// NOMBRE CABECERAS

			// ESTILOS  CABECERAS
				$sheet->getStyle("B".$cab.":K".($cab+2))->getAlignment()->setWrapText(true);// AJUSTA TEXTO A CELDA
				$sheet->getStyle("B".$cab.":K".($cab+2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);						
				$sheet->getStyle("B".$cab.":K".($cab+2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);						
				$sheet->getStyle("B".$cab.":K".($cab+2))->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
				$sheet->getStyle("B".$cab.":K".($cab+2))->getFont()->setname('Arial')->setSize(12)->setBold(true);

		     	$headStyle = $this->phpexcel->getActiveSheet()->getStyle("B".$cab.":K".($cab+2));
				$headStyle->applyFromArray($color_celda_cabeceras);

				$sheet->getStyle("B".$cab.":K".($cab+2))->applyFromArray(array(
				'borders' => array(
							'allborders' => array(
											'style' => PHPExcel_Style_Border::BORDER_THIN)
						)
				));				
			// ESTILOS  CABECERAS
		// CABECERA

	    // CUERPO
			$total = $query->num_rows()+ ($cab+2);
			
			$sheet->getStyle("A".($cab+3).":K".$total)->getFont()->setname('Arial Narrow')->setSize(9);

			//bordes cuerpo
			$sheet->getStyle("B".($cab+3).":K".$total)->applyFromArray(array(
			'borders' => array(
						'allborders' => array(
										'style' => PHPExcel_Style_Border::BORDER_THIN)
					)
			));

			// EXPORTACION A EXCEL
			$row = $cab+2;
			$col = 2;
			$num = 0;
			$cambio = FALSE;
			 foreach($query->result() as $filas){
			    $row ++;
			    $num ++;			    
			    $sheet->getCellByColumnAndRow(1, $row)->setValue($num);// para numerar los registros

			  		$sheet->getCellByColumnAndRow(2, $row)->setValue(utf8_encode($filas->NomDept));
			  		$sheet->getCellByColumnAndRow(3, $row)->setValue(utf8_encode($filas->NomProv));
			  		$sheet->getCellByColumnAndRow(4, $row)->setValue(utf8_encode($filas->NomDist));
			  		$sheet->getCellByColumnAndRow(5, $row)->setValue(utf8_encode($filas->centroPoblado));
			  		$sheet->getCellByColumnAndRow(6, $row)->setValueExplicit($filas->codlocal,PHPExcel_Cell_DataType::TYPE_STRING);
			  		$sheet->getCellByColumnAndRow(7, $row)->setValue(utf8_encode($filas->direccion));
			  		$sheet->getCellByColumnAndRow(8, $row)->setValue(utf8_encode($filas->Nivel_Educativo));
			  		$sheet->getCellByColumnAndRow(9, $row)->setValue(utf8_encode($filas->ugel));
			  		$sheet->getCellByColumnAndRow(10, $row)->setValue(utf8_encode($filas->area));


				 $col = 2;
				 //dar formato de color intercalado a cada fila
				 if($cambio){
			     	$fila_color = $this->phpexcel->getActiveSheet()->getStyle("B".$row.":K".$row);
					$fila_color->applyFromArray(
					    array(
					        'fill' => array(
					            'type' => PHPExcel_Style_Fill::FILL_SOLID,
					            'color' => array('rgb' => 'DCDCDC')
					        )
					    )
					);			        
			        $cambio = FALSE;	
				 }else{	$cambio = TRUE; }
				
			}

 		// CUERPO

		// PIE TOTALES
			$celda_s = $total+1 ; // inicio de pie de resumenes
			//fecha
			$sheet->setCellValue('B'.($celda_s +2),'IMPRESO:' );
			$sheet->mergeCells('B'.($celda_s +2).':C'.($celda_s +2));
	     	$sheet->getStyle('B'.($celda_s + 2))->applyFromArray($color_celda_cabeceras);
	     	$sheet->getStyle('B'.($celda_s + 2).':C'.($celda_s +2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
			$sheet->getStyle('B'.($celda_s + 2))->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);

			$sheet->setCellValue('D'.($celda_s +2), date('d/m/Y H:i:s') );
			$sheet->getStyle('D'.($celda_s +2))->getNumberFormat()->setFormatCode('d/m/Y H:i:s'); 
			$sheet->getStyle('B'.($celda_s +2).':D'.($celda_s +2))->applyFromArray(array(
			'borders' => array(
						'allborders' => array(
										'style' => PHPExcel_Style_Border::BORDER_THIN)
					)
			));
		// PIE TOTALES

		// SALIDA EXCEL
			// Propiedades del archivo excel
				$sheet->setTitle("List_Locales_Evaluador");
				$this->phpexcel->getProperties()
				->setTitle("List Locales Evaluador")
				->setDescription("Listado de Locales Escolares por Ruta de Trabajo del Evaluador Tecnico");

			header("Content-Type: application/vnd.ms-excel");
			$nombreArchivo = 'List_locales_evaluador'.date('YmdHis');
			header("Content-Disposition: attachment; filename=\"$nombreArchivo.xls\""); //EXCEL
			header("Cache-Control: max-age=0");
			
			// Genera Excel
			$writer = PHPExcel_IOFactory::createWriter($this->phpexcel, "Excel5");

			$writer->save('php://output');
			exit;
		// SALIDA EXCEL
	}

/*
	public function ExportacionListadoRutas()
	{
		$this->load->helper('form');
		$this->load->model('segmentaciones/rutas_model');

		$cond1 = "";
		$cond2 = "";
		$cond3 = "";

		$where1 = "";

		$sidx = "convert(datetime,fxinicio,103),prov_operativa_ugel";
		
		if(isset($_GET['codsede'])) { 
			$sede = $this->input->get('codsede');
			if ($sede != -1) { 
				$cond1 = "cod_sede_operativa = '$sede'";
			}
		}else{ $sede = ""; 
			$cond1 = "cod_sede_operativa = '-1'"; }

		if(isset($_GET['codprov'])) { 
			$prov = $this->input->get('codprov');
			if ($prov != -1) { 
				$cond2 = "cod_prov_operativa = '$prov'";
			}
		}else{ $prov = ""; 
			$cond2 = "cod_prov_operativa = '-1'"; }
		
		if(isset($_GET['codruta'])) { 
			$ruta = $this->input->get('codruta');
			$cond3 = "idruta = '$ruta'";
		}else{ $ruta = ""; 
			$cond3 = "idruta = ''";}

		if(!$sidx) $sidx =1;
		$where1 =  "WHERE ".$cond1." AND ".$cond2." AND ".$cond3;

		$count = $this->rutas_model->contar_datos($where1);

		$data['cantidad'] = $count;
		$query = $this->rutas_model->listado_rutas($sidx, 'asc', '0', $count, $where1);
		$data['consulta'] = $query;
		if ($query->num_rows() > 0)
		{
			$row = $query->row(); 
			$data['sede'] = $row->sede_operativa;
			$data['prov'] = $row->prov_operativa_ugel;
			$data['ruta'] = $row->idruta;
		}
		$this->load->view('excel/listadorutas_xls', $data);
	}
*/
	public function ExportacionLocalsinRuta()
	{
		$this->load->helper('form');
		$this->load->model('segmentaciones/rutas_model');

		$cond1 = "";
		$cond2 = "";
		$cond3 = "";

		$where1 = "";

		$sidx = "prov_operativa_ugel,codigo_de_local";
		
		if(isset($_GET['codsede'])) { 
			$sede = $this->input->get('codsede');
			if ($sede != -1) { 
				$cond1 = "cod_sede_operativa = '$sede'";
			}
		}else{ $sede = ""; }

		if(isset($_GET['codprov'])) { 
			$prov = $this->input->get('codprov');
			if ($prov != -1) { 
				$cond2 = "cod_prov_operativa = '$prov'";
			}
		}else{ $prov = ""; }
		
		$where1 =  "WHERE ".$cond1." AND ".$cond2;
		if(!$sidx) $sidx =1;

		$resultado = $this->rutas_model->contar_datos_sinruta($where1);
		$count = $resultado->num_rows();

		$data['cantidad'] = $count;
		$data['consulta'] = $this->rutas_model->local_sin_ruta($sidx, 'asc', '0', $count, $where1);
		$this->load->view('excel/localsinruta_xls', $data);
	}
}
?>