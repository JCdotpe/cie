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


	public function ExportacionRutasProvOperativa()
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

		$sidx = "convert(datetime,fxinicio), prov_operativa_ugel";
		
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
		$query = $this->rutas_model->report_rutasprovincia($sidx, 'asc', '0', $count, $where1);
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
			$sheet->getColumnDimension('W')->setWidth(15);
			

			$sheet->getRowDimension(4)->setRowHeight(2);
			$sheet->getRowDimension(6)->setRowHeight(2);
			$sheet->getRowDimension(17)->setRowHeight(40);
		// ANCHO Y ALTURA DE COLUMNAS DEL FILE

		// TITULOS
			$sheet->setCellValue('A3','INSTITUTO NACIONAL DE ESTADÍSTICA E INFORMATICA');
			$sheet->mergeCells('A3:W3');
			$sheet->setCellValue('A5','CENSO DE INFRAESTRUCTURA EDUCATIVA 2013');
			$sheet->mergeCells('A5:W5');
			$sheet->setCellValue('A7','RUTA POR PROVINCIA OPERATIVA');
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
						$sheet->setCellValue('D9',$row->sede_operativa);
						$sheet->mergeCells('D9:E9');
						$sheet->setCellValue('D10',$row->prov_operativa_ugel);
						$sheet->mergeCells('D10:E10');
						$sheet->setCellValue('D11','');
						$sheet->mergeCells('D11:E11');
						$sheet->setCellValue('D12',$row->idruta);
						$sheet->mergeCells('D12:E12');
					}

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
					
					$sheet->setCellValue('I10','NOMBRES Y APELLIDOS DEL EVALUADOR');
					$sheet->mergeCells('I10:S10');
			  		$sheet->getStyle('I10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$sheet->getStyle('I10')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);	
					$sheet->getStyle("I10")->applyFromArray($color_celda_cabeceras);	
													
					$sheet->mergeCells('I11:S11');
					$sheet->getStyle("I10:S11")->applyFromArray(array(
					'borders' => array(
								'allborders' => array(
												'style' => PHPExcel_Style_Border::BORDER_THIN)
							)
					));

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
					
					$sheet->getStyle('D9:W11')->getFont()->setname('Arial')->setSize(12);	// TAMAÑO FUENTE CABECERAS
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
					
					$sheet->setCellValue('H'.$cab,'Periodo de trabajo');
					$sheet->mergeCells('H'.$cab.':I'.$cab);
						$sheet->setCellValue('H'.($cab+1),'Fecha Inicio');
						$sheet->mergeCells('H'.($cab+1).':H'.($cab+2));
						$sheet->setCellValue('I'.($cab+1),'Fecha Final');
						$sheet->mergeCells('I'.($cab+1).':I'.($cab+2));
					
					$sheet->setCellValue('J'.$cab,'Días de Operación de Campo');
					$sheet->mergeCells('J'.$cab.':P'.$cab);
						$sheet->setCellValue('J'.($cab+1),'Traslado' );
						$sheet->mergeCells('J'.($cab+1).':J'.($cab+2));
						$sheet->setCellValue('K'.($cab+1),'Trabajo' );
						$sheet->mergeCells('K'.($cab+1).':K'.($cab+2));
						$sheet->setCellValue('L'.($cab+1),'Recuperación' );
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
					$sheet->mergeCells('S'.$cab.':V'.$cab);
						$sheet->setCellValue('S'.($cab+1), 'Mov. Local' );
						$sheet->mergeCells('S'.($cab+1).':S'.($cab+2));
						$sheet->setCellValue('T'.($cab+1), 'Gastos Operativos' );
						$sheet->mergeCells('T'.($cab+1).':T'.($cab+2));
						$sheet->setCellValue('U'.($cab+1), 'Pasaje' );
						$sheet->mergeCells('U'.($cab+1).':U'.($cab+2));
						$sheet->setCellValue('V'.($cab+1), 'TOTAL' );
						$sheet->mergeCells('V'.($cab+1).':V'.($cab+2));

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
		        //$headStyle->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('#FF9900');
				$headStyle->applyFromArray($color_celda_cabeceras);

				$sheet->getStyle("B".$cab.":W".($cab+2))->applyFromArray(array(
				'borders' => array(
							'allborders' => array(
											'style' => PHPExcel_Style_Border::BORDER_THIN)
						)
				));
				$sheet->getStyle('J16')->getFont()->setname('Arial Narrow')->setSize(9); // tamaño especial para esta celda
			// ESTILOS  CABECERAS
		// CABECERA

	    // CUERPO
			$total = $query->num_rows()+ ($cab+2);
			//$numberStyle1 = $this->phpexcel->getActiveSheet(0)->getStyle('Q'.($cab+3).':V'.$total);
			//$numberStyle1->getNumberFormat()->setFormatCode('0.00');

			//$sheet->getActiveSheet(0)->getCell("G")->setValueExplicit('25',PHPExcel_Cell_DataType::TYPE_STRING);

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
				//foreach($filas as $cols){ // llena cada celda
					
			  		//$sheet->getCellByColumnAndRow($col++, $row)->setValue($cols);
			  		
			  		$sheet->getCellByColumnAndRow(2, $row)->setValue($filas->NomDept);
			  		$sheet->getCellByColumnAndRow(3, $row)->setValue($filas->NomProv);
			  		$sheet->getCellByColumnAndRow(4, $row)->setValue($filas->NomDist);
			  		$sheet->getCellByColumnAndRow(5, $row)->setValue($filas->centroPoblado);
			  		$sheet->getCellByColumnAndRow(6, $row)->setValueExplicit($filas->codlocal,PHPExcel_Cell_DataType::TYPE_STRING);
			  		$sheet->getCellByColumnAndRow(7, $row)->setValue($filas->fxinicio);
			  		$sheet->getCellByColumnAndRow(8, $row)->setValue($filas->fxfinal);
			  		$sheet->getCellByColumnAndRow(9, $row)->setValueExplicit($filas->traslado,PHPExcel_Cell_DataType::TYPE_NUMERIC);
			  		$sheet->getCellByColumnAndRow(10, $row)->setValueExplicit($filas->trabajo_supervisor,PHPExcel_Cell_DataType::TYPE_NUMERIC);
			  		$sheet->getCellByColumnAndRow(11, $row)->setValueExplicit($filas->recuperacion,PHPExcel_Cell_DataType::TYPE_NUMERIC);
			  		$sheet->getCellByColumnAndRow(12, $row)->setValueExplicit($filas->retornosede,PHPExcel_Cell_DataType::TYPE_NUMERIC);
			  		$sheet->getCellByColumnAndRow(13, $row)->setValueExplicit($filas->gabinete,PHPExcel_Cell_DataType::TYPE_NUMERIC);
			  		$sheet->getCellByColumnAndRow(14, $row)->setValueExplicit($filas->descanso,PHPExcel_Cell_DataType::TYPE_NUMERIC);
			  		$sheet->getCellByColumnAndRow(15, $row)->setValueExplicit($filas->totaldias,PHPExcel_Cell_DataType::TYPE_NUMERIC);
			  		$sheet->getCellByColumnAndRow(16, $row)->setValueExplicit($filas->movilocal_ma,PHPExcel_Cell_DataType::TYPE_NUMERIC);
			  		$sheet->getCellByColumnAndRow(17, $row)->setValueExplicit($filas->gastooperativo_ma,PHPExcel_Cell_DataType::TYPE_NUMERIC);
			  		$sheet->getCellByColumnAndRow(18, $row)->setValueExplicit($filas->movilocal_af,PHPExcel_Cell_DataType::TYPE_NUMERIC);
			  		$sheet->getCellByColumnAndRow(19, $row)->setValueExplicit($filas->gastooperativo_af,PHPExcel_Cell_DataType::TYPE_NUMERIC);
			  		$sheet->getCellByColumnAndRow(20, $row)->setValueExplicit($filas->pasaje,PHPExcel_Cell_DataType::TYPE_NUMERIC);
			  		$sheet->getCellByColumnAndRow(21, $row)->setValueExplicit($filas->total_af,PHPExcel_Cell_DataType::TYPE_NUMERIC);
			  		$sheet->getCellByColumnAndRow(22, $row)->setValue($filas->observaciones);
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
			$sheet->mergeCells('B'.$celda_s.':I'.$celda_s);
			
			$inicio_s = $cab+3 ; // inicio suma  de resumenes	
			$fin_s = $total ; // fin suma de resumenes	

			$sheet->setCellValue('J'. $celda_s ,'=SUM(J'.$inicio_s.':J'.$fin_s.')');
			$sheet->setCellValue('K'. $celda_s ,'=SUM(K'.$inicio_s.':K'.$fin_s.')');
			$sheet->setCellValue('L'. $celda_s ,'=SUM(L'.$inicio_s.':L'.$fin_s.')');
			$sheet->setCellValue('M'. $celda_s ,'=SUM(M'.$inicio_s.':M'.$fin_s.')');
			$sheet->setCellValue('N'. $celda_s ,'=SUM(N'.$inicio_s.':N'.$fin_s.')');
			$sheet->setCellValue('O'. $celda_s ,'=SUM(O'.$inicio_s.':O'.$fin_s.')');
			$sheet->setCellValue('P'. $celda_s ,'=SUM(P'.$inicio_s.':P'.$fin_s.')');
			$sheet->setCellValue('S'. $celda_s ,'=SUM(S'.$inicio_s.':S'.$fin_s.')');
			$sheet->setCellValue('T'. $celda_s ,'=SUM(T'.$inicio_s.':T'.$fin_s.')');
			$sheet->setCellValue('U'. $celda_s ,'=SUM(U'.$inicio_s.':U'.$fin_s.')');
			$sheet->setCellValue('V'. $celda_s ,'=SUM(V'.$inicio_s.':V'.$fin_s.')');

			// $sheet->mergeCells('Q'.$celda_s.':S'.$celda_s);
			// $sheet->mergeCells('Y'.$celda_s.':X'.$celda_s);

	     	$sheet->getStyle('B'.$celda_s)->applyFromArray($color_celda_cabeceras);
	     	$sheet->getStyle('Q'.$celda_s)->applyFromArray($color_celda_cabeceras);
	     	$sheet->getStyle('R'.$celda_s)->applyFromArray($color_celda_cabeceras);
	     	$sheet->getStyle('B'.$celda_s.':W'.$celda_s)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
			$sheet->getStyle('B'.$celda_s)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);

			$sheet->getStyle('B'.$celda_s.':W'.$celda_s)->applyFromArray(array(
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
				$sheet->setTitle("Rutas_por_Provincia_Operativa");
				$this->phpexcel->getProperties()
				->setTitle("Rutas por Provincia Operativa")
				->setDescription("Rutas por Provincia Operativa");

			header("Content-Type: application/vnd.ms-excel");
			$nombreArchivo = 'RutasPorProvinciaOpe_'.date('YmdHis');
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