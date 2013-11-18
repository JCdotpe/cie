<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Csvexport extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		$this->load->helper('form');
		$this->load->library('PHPExcel');
		$this->load->model('seguimiento/seguimiento_model');
	}

	public function ExportacionODEI()
	{
		
		$periodo = $this->input->get('periodo');
		
		if ($periodo!=99){
			$query = $this->seguimiento_model->get_cruce_odei($periodo);
		}else{
			$query = $this->seguimiento_model->get_cruce_odei_total();
		}
		
		// pestaña
		$sheet = $this->phpexcel->getActiveSheet(0);

		//colores
			$color_celda_cabeceras =   array(
				'fill' => array(
					'type' => PHPExcel_Style_Fill::FILL_SOLID,
					'color' => array('rgb' => '27408B')
				)
			);
		//colores
		
		// formato de la hoja
			// Set Orientation, size and scaling
			$sheet->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);// horizontal
			$sheet->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
			$sheet->getPageSetup()->setFitToPage(false); // ajustar pagina
			$sheet->getPageSetup()->setFitToWidth(1);
			$sheet->getPageSetup()->setFitToHeight(0);		
		// formato de la hoja

		// ANCHO Y ALTURA DE COLUMNAS DEL FILE
			$sheet->getColumnDimension('A')->setWidth(1);
			$sheet->getColumnDimension('B')->setWidth(5);
			$sheet->getColumnDimension('C')->setWidth(22);
			$sheet->getColumnDimension('D')->setWidth(15);
			$sheet->getColumnDimension('E')->setWidth(10);
			$sheet->getColumnDimension('F')->setWidth(10);
			$sheet->getColumnDimension('G')->setWidth(8);
			$sheet->getColumnDimension('H')->setWidth(8);
			$sheet->getColumnDimension('I')->setWidth(8);
			$sheet->getColumnDimension('J')->setWidth(8);
			$sheet->getColumnDimension('K')->setWidth(8);
			$sheet->getColumnDimension('L')->setWidth(5);
			$sheet->getColumnDimension('M')->setWidth(6);
			$sheet->getColumnDimension('N')->setWidth(6);
			$sheet->getColumnDimension('O')->setWidth(5);
			$sheet->getColumnDimension('P')->setWidth(5);
			
			

			$sheet->getRowDimension(4)->setRowHeight(2);
			$sheet->getRowDimension(6)->setRowHeight(2);
		// ANCHO Y ALTURA DE COLUMNAS DEL FILE

		// TITULOS
			$sheet->setCellValue('D3','INSTITUTO NACIONAL DE ESTADÍSTICA E INFORMATICA');
			$sheet->mergeCells('D3:P3');
			$sheet->setCellValue('D5','CENSO DE INFRAESTRUCTURA EDUCATIVA 2013');
			$sheet->mergeCells('D5:P5');
			$sheet->setCellValue('D7','REPORTE DE REGISTRO POR ODEI (MONITOREO)');
			$sheet->mergeCells('D7:P7');
			$sheet->getStyle('D3:P7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$sheet->getStyle('D3:P7')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
			$sheet->getStyle('D3:P3')->getFont()->setname('Arial black')->setSize(16);
			$sheet->getStyle('D5:P7')->getFont()->setname('Arial')->setSize(16);

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
					$sheet->setCellValue('B9','PERIODO:');
					$sheet->mergeCells('B9:C9');

					if ($periodo==99){ $periodo = "Todos"; }

					$sheet->setCellValue('D9',$periodo);
					$sheet->mergeCells('D9:E9');

					$sheet->getStyle('D9:C9')->getFont()->setname('Arial')->setSize(12);
					$sheet->getStyle("D9:C9")->getAlignment()->setWrapText(true);// AJUSTA TEXTO A CELDA

			     	$sheet->getStyle("B9:C9")->applyFromArray($color_celda_cabeceras);

			     	$sheet->getStyle("B9:E9")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
					$sheet->getStyle("B9:C9")->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);

					$sheet->getStyle("B9:E9")->applyFromArray(array(
					'borders' => array(
								'allborders' => array(
												'style' => PHPExcel_Style_Border::BORDER_THIN)
							)
					));
		// CABECERA ESPECIAL

		// CABECERA
			// INICIO DE LA  cabecera
			$cab = 11;	
				
			// NOMBRE CABECERAS
	
					$sheet->setCellValue('B'.$cab,'N°');
					$sheet->mergeCells('B'.$cab.':B'.($cab+2));

					$sheet->setCellValue('C'.$cab,'ODEI' );
					$sheet->mergeCells('C'.$cab.':C'.($cab+2));
					$sheet->setCellValue('D'.$cab,'TOTAL DE LOCALES ESCOLARES' );
					$sheet->mergeCells('D'.$cab.':D'.($cab+2));

					$sheet->setCellValue('E'.$cab,'Total Locales Escolares Censados' );
					$sheet->mergeCells('E'.$cab.':F'.($cab+2));
						$sheet->setCellValue('E'.($cab+2),'Abs');
						$sheet->mergeCells('E'.($cab+2).':E'.($cab+2));
						$sheet->setCellValue('F'.($cab+2),'%');
						$sheet->mergeCells('F'.($cab+2).':F'.($cab+2));


					$sheet->setCellValue('G'.$cab, 'Instituciones Educativas según Resultado');
					$sheet->mergeCells('G'.$cab.':P'.$cab);	
						$sheet->setCellValue('G'.($cab+1), 'Completa');
						$sheet->mergeCells('G'.($cab+1).':H'.($cab+1));
							$sheet->setCellValue('G'.($cab+2), 'Abs');
							$sheet->mergeCells('G'.($cab+2).':G'.($cab+2));
							$sheet->setCellValue('H'.($cab+2), '%');
							$sheet->mergeCells('H'.($cab+2).':H'.($cab+2));
						$sheet->setCellValue('I'.($cab+1), 'Incompleta');
						$sheet->mergeCells('I'.($cab+1).':J'.($cab+1));
							$sheet->setCellValue('I'.($cab+2), 'Abs');
							$sheet->mergeCells('I'.($cab+2).':I'.($cab+2));
							$sheet->setCellValue('J'.($cab+2), '%');
							$sheet->mergeCells('J'.($cab+2).':J'.($cab+2));
						$sheet->setCellValue('K'.($cab+1), 'Rechazo');
						$sheet->mergeCells('K'.($cab+1).':L'.($cab+1));
							$sheet->setCellValue('K'.($cab+2), 'Abs');
							$sheet->mergeCells('K'.($cab+2).':K'.($cab+2));
							$sheet->setCellValue('L'.($cab+2), '%');
							$sheet->mergeCells('L'.($cab+2).':L'.($cab+2));
						$sheet->setCellValue('M'.($cab+1), 'Desocupada');
						$sheet->mergeCells('M'.($cab+1).':N'.($cab+1));
							$sheet->setCellValue('M'.($cab+2), 'Abs');
							$sheet->mergeCells('M'.($cab+2).':M'.($cab+2));
							$sheet->setCellValue('N'.($cab+2), '%');
							$sheet->mergeCells('N'.($cab+2).':N'.($cab+2));
						$sheet->setCellValue('O'.($cab+1), 'Otro');
						$sheet->mergeCells('O'.($cab+1).':P'.($cab+1));
							$sheet->setCellValue('O'.($cab+2), 'Abs');
							$sheet->mergeCells('O'.($cab+2).':O'.($cab+2));
							$sheet->setCellValue('P'.($cab+2), '%');
							$sheet->mergeCells('P'.($cab+2).':P'.($cab+2));
			// NOMBRE CABECERAS

			// ESTILOS  CABECERAS
				$sheet->getStyle("B".$cab.":P".($cab+2))->getAlignment()->setWrapText(true);// AJUSTA TEXTO A CELDA
				$sheet->getStyle("B".$cab.":P".($cab+2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);						
				$sheet->getStyle("B".$cab.":P".($cab+2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);						
				$sheet->getStyle("B".$cab.":P".($cab+2))->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
				$sheet->getStyle("B".$cab.":P".($cab+2))->getFont()->setname('Arial')->setSize(9);



		     	$headStyle = $this->phpexcel->getActiveSheet()->getStyle("B".$cab.":P".($cab+2));
				$headStyle->applyFromArray($color_celda_cabeceras);

				$sheet->getStyle("B".$cab.":P".($cab+2))->applyFromArray(array(
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
			
			$sheet->getStyle("A".($cab+3).":P".$total)->getFont()->setname('Arial Narrow')->setSize(9);

			//bordes cuerpo
			$sheet->getStyle("B".($cab+3).":P".$total)->applyFromArray(array(
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
			  		
			  		$sheet->getCellByColumnAndRow(2, $row)->setValue(utf8_encode(trim($filas->detadepen)));
			  		$sheet->getCellByColumnAndRow(3, $row)->setValue($filas->LocEscolares);
			  		$sheet->getCellByColumnAndRow(4, $row)->setValue($filas->LocEscolar_Censado);
			  		$sheet->getCellByColumnAndRow(5, $row)->setValue($filas->LocEscolar_Censado_Porc);
			  		$sheet->getCellByColumnAndRow(6, $row)->setValue($filas->Completa);
			  		$sheet->getCellByColumnAndRow(7, $row)->setValue($filas->Completa_Porc);
			  		$sheet->getCellByColumnAndRow(8, $row)->setValue($filas->Incompleta);
			  		$sheet->getCellByColumnAndRow(9, $row)->setValue($filas->Incompleta_Porc);
			  		$sheet->getCellByColumnAndRow(10, $row)->setValue($filas->Rechazo);
			  		$sheet->getCellByColumnAndRow(11, $row)->setValue($filas->Rechazo_Porc);
			  		$sheet->getCellByColumnAndRow(12, $row)->setValue($filas->Desocupada);
			  		$sheet->getCellByColumnAndRow(13, $row)->setValue($filas->Desocupada_Porc);
			  		$sheet->getCellByColumnAndRow(14, $row)->setValue($filas->Otro);
			  		$sheet->getCellByColumnAndRow(15, $row)->setValue($filas->Otro_Porc);
				//}
				 $col = 2;
				 //dar formato de color intercalado a cada fila
				 if($cambio){
			     	$fila_color = $this->phpexcel->getActiveSheet()->getStyle("B".$row.":P".$row);
			        
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

			$sheet->getStyle('B'.($cab+2).':P'.$total)->getAlignment()->setWrapText(true)->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

			$sheet->getStyle('D'.($cab+2).':P'.$total)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

 		// CUERPO

		// PIE TOTALES
			$celda_s = $total+1 ; // inicio de pie de resumenes

			//fecha
			$sheet->setCellValue('B'.($celda_s +2),'IMPRESO:' );
			$sheet->mergeCells('B'.($celda_s +2).':C'.($celda_s +2));
	     	$sheet->getStyle('B'.($celda_s + 2))->applyFromArray($color_celda_cabeceras)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	     		
			$sheet->getStyle('B'.($celda_s + 2))->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);

			$sheet->setCellValue('D'.($celda_s +2), date('d/m/Y H:i:s') );
			$sheet->mergeCells('D'.($celda_s +2).':E'.($celda_s +2));
			
			$sheet->getStyle('D'.($celda_s +2))->getNumberFormat()->setFormatCode('d/m/Y H:i:s'); 
			$sheet->getStyle('B'.($celda_s +2).':E'.($celda_s +2))->applyFromArray(array(
			'borders' => array(
						'allborders' => array(
										'style' => PHPExcel_Style_Border::BORDER_THIN)
					)
			));
		// PIE TOTALES

		// SALIDA EXCEL
			// Propiedades del archivo excel
				$sheet->setTitle("Reporte Registro ODEI");
				$this->phpexcel->getProperties()
				->setTitle("Reporte Registro ODEI")
				->setDescription("Reporte de Registro por ODEI - MONITOREO");

			header("Content-Type: application/vnd.ms-excel");
			$nombreArchivo = 'Monitoreo_Registro_x_ODEI_'.date('Y-m-d').'_Periodo('.$periodo.')';
			header("Content-Disposition: attachment; filename=\"$nombreArchivo.xls\""); //EXCEL
			header("Cache-Control: max-age=0");
			
			// Genera Excel
			$writer = PHPExcel_IOFactory::createWriter($this->phpexcel, "Excel5");

			$writer->save('php://output');
			exit;
		// SALIDA EXCEL
	}

	public function ExportacionODEI_Avance()
	{
		$periodo_min = $this->input->get('vperiodo1');
		$periodo_max = $this->input->get('vperiodo2');

		$vSede = $this->input->get('sede');
		$vprov = $this->input->get('prov');
		
		if ( $periodo_min == 1 && $periodo_max == 14 ) {
			$periodo = 99;
		}else if ( $periodo_min == '' && $periodo_max == '' ){
			$periodo = -1;
		}else{
			$periodo = 1;
		}

		$query = $this->seguimiento_model->get_avance_odeiST($vSede,$vprov,$periodo,$periodo_min,$periodo_max);
				
		// pestaña
		$sheet = $this->phpexcel->getActiveSheet(0);

		//colores
			$color_celda_cabeceras =   array(
				'fill' => array(
					'type' => PHPExcel_Style_Fill::FILL_SOLID,
					'color' => array('rgb' => '27408B')
				)
			);
		//colores
		
		// formato de la hoja
			// Set Orientation, size and scaling
			$sheet->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);// horizontal
			$sheet->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
			$sheet->getPageSetup()->setFitToPage(false); // ajustar pagina
			$sheet->getPageSetup()->setFitToWidth(1);
			$sheet->getPageSetup()->setFitToHeight(0);		
		// formato de la hoja

		// ANCHO Y ALTURA DE COLUMNAS DEL FILE
			$sheet->getColumnDimension('A')->setWidth(1);
			$sheet->getColumnDimension('B')->setWidth(5);
			$sheet->getColumnDimension('C')->setWidth(22);
			$sheet->getColumnDimension('D')->setWidth(15);
			$sheet->getColumnDimension('E')->setWidth(10);
			$sheet->getColumnDimension('F')->setWidth(10);
			$sheet->getColumnDimension('G')->setWidth(8);
			$sheet->getColumnDimension('H')->setWidth(8);
			$sheet->getColumnDimension('I')->setWidth(8);
			$sheet->getColumnDimension('J')->setWidth(8);
			$sheet->getColumnDimension('K')->setWidth(8);
			$sheet->getColumnDimension('L')->setWidth(5);
			$sheet->getColumnDimension('M')->setWidth(6);
			$sheet->getColumnDimension('N')->setWidth(6);
			$sheet->getColumnDimension('O')->setWidth(5);
			$sheet->getColumnDimension('P')->setWidth(5);
			$sheet->getColumnDimension('Q')->setWidth(5);
			//$sheet->getColumnDimension('R')->setWidth(15);
			

			$sheet->getRowDimension(4)->setRowHeight(2);
			$sheet->getRowDimension(6)->setRowHeight(2);
		// ANCHO Y ALTURA DE COLUMNAS DEL FILE

		// TITULOS
			$sheet->setCellValue('D3','INSTITUTO NACIONAL DE ESTADÍSTICA E INFORMATICA');
			$sheet->mergeCells('D3:R3');
			$sheet->setCellValue('D5','CENSO DE INFRAESTRUCTURA EDUCATIVA 2013');
			$sheet->mergeCells('D5:Q5');
			$sheet->setCellValue('D7','REPORTE DE AVANCE DIARIO POR ET');
			$sheet->mergeCells('D7:Q7');
			$sheet->getStyle('D3:Q7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$sheet->getStyle('D3:Q7')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
			$sheet->getStyle('D3:Q3')->getFont()->setname('Arial black')->setSize(16);
			$sheet->getStyle('D5:Q7')->getFont()->setname('Arial')->setSize(16);

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
					$sheet->setCellValue('B9','PERIODO:');
					$sheet->mergeCells('B9:C9');

					//if ($periodo==99){ $periodo = "Todos"; }

					$sheet->setCellValue('D9',$periodo_min.' - '.$periodo_max);
					$sheet->mergeCells('D9:E9');

					$sheet->getStyle('D9:C9')->getFont()->setname('Arial')->setSize(12);
					$sheet->getStyle("D9:C9")->getAlignment()->setWrapText(true);// AJUSTA TEXTO A CELDA

			     	$sheet->getStyle("B9:C9")->applyFromArray($color_celda_cabeceras);

			     	$sheet->getStyle("B9:E9")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
					$sheet->getStyle("B9:C9")->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);

					$sheet->getStyle("B9:E9")->applyFromArray(array(
					'borders' => array(
								'allborders' => array(
												'style' => PHPExcel_Style_Border::BORDER_THIN)
							)
					));
		// CABECERA ESPECIAL

		// CABECERA
			// INICIO DE LA  cabecera
			$cab = 11;	
				
			// NOMBRE CABECERAS
	
					$sheet->setCellValue('B'.$cab,'N°');
					$sheet->mergeCells('B'.$cab.':B'.($cab+2));

					$sheet->setCellValue('C'.$cab,'SEDE' );
					$sheet->mergeCells('C'.$cab.':C'.($cab+2));
					$sheet->setCellValue('D'.$cab,'PROVINCIA' );
					$sheet->mergeCells('D'.$cab.':D'.($cab+2));

					$sheet->setCellValue('E'.$cab,'LOCALES PROGRAMADOS' );
					$sheet->mergeCells('E'.$cab.':E'.($cab+2));
					$sheet->setCellValue('F'.$cab,'Locales Visitados');
					$sheet->mergeCells('F'.$cab.':F'.($cab+2));
					$sheet->setCellValue('G'.$cab,'AVANCE (%)');
					$sheet->mergeCells('G'.$cab.':G'.($cab+2));


					$sheet->setCellValue('H'.$cab, 'Instituciones Educativas según Resultado');
					$sheet->mergeCells('H'.$cab.':Q'.$cab);
						$sheet->setCellValue('H'.($cab+1), 'Completa');
						$sheet->mergeCells('H'.($cab+1).':I'.($cab+1));
							$sheet->setCellValue('H'.($cab+2), 'Abs');
							$sheet->mergeCells('H'.($cab+2).':H'.($cab+2));
							$sheet->setCellValue('I'.($cab+2), '%');
							$sheet->mergeCells('I'.($cab+2).':I'.($cab+2));
						$sheet->setCellValue('J'.($cab+1), 'Incompleta');
						$sheet->mergeCells('J'.($cab+1).':K'.($cab+1));
							$sheet->setCellValue('J'.($cab+2), 'Abs');
							$sheet->mergeCells('J'.($cab+2).':J'.($cab+2));
							$sheet->setCellValue('K'.($cab+2), '%');
							$sheet->mergeCells('K'.($cab+2).':K'.($cab+2));
						$sheet->setCellValue('L'.($cab+1), 'Rechazo');
						$sheet->mergeCells('L'.($cab+1).':M'.($cab+1));
							$sheet->setCellValue('L'.($cab+2), 'Abs');
							$sheet->mergeCells('L'.($cab+2).':L'.($cab+2));
							$sheet->setCellValue('L'.($cab+2), '%');
							$sheet->mergeCells('M'.($cab+2).':M'.($cab+2));
						$sheet->setCellValue('N'.($cab+1), 'Desocupada');
						$sheet->mergeCells('N'.($cab+1).':O'.($cab+1));
							$sheet->setCellValue('N'.($cab+2), 'Abs');
							$sheet->mergeCells('N'.($cab+2).':N'.($cab+2));
							$sheet->setCellValue('O'.($cab+2), '%');
							$sheet->mergeCells('O'.($cab+2).':O'.($cab+2));
						$sheet->setCellValue('P'.($cab+1), 'Otro');
						$sheet->mergeCells('P'.($cab+1).':Q'.($cab+1));
							$sheet->setCellValue('P'.($cab+2), 'Abs');
							$sheet->mergeCells('P'.($cab+2).':P'.($cab+2));
							$sheet->setCellValue('Q'.($cab+2), '%');
							$sheet->mergeCells('Q'.($cab+2).':Q'.($cab+2));

/*					$sheet->setCellValue('R'.$cab,'RESULTADO VISITA (%)');
					$sheet->mergeCells('R'.$cab.':R'.($cab+2));
*/			// NOMBRE CABECERAS

			// ESTILOS  CABECERAS
				$sheet->getStyle("B".$cab.":Q".($cab+2))->getAlignment()->setWrapText(true);// AJUSTA TEXTO A CELDA
				$sheet->getStyle("B".$cab.":Q".($cab+2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);						
				$sheet->getStyle("B".$cab.":Q".($cab+2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);						
				$sheet->getStyle("B".$cab.":Q".($cab+2))->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
				$sheet->getStyle("B".$cab.":Q".($cab+2))->getFont()->setname('Arial')->setSize(9);



		     	$headStyle = $this->phpexcel->getActiveSheet()->getStyle("B".$cab.":Q".($cab+2));
				$headStyle->applyFromArray($color_celda_cabeceras);

				$sheet->getStyle("B".$cab.":Q".($cab+2))->applyFromArray(array(
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
			
			$sheet->getStyle("A".($cab+3).":Q".$total)->getFont()->setname('Arial Narrow')->setSize(9);

			//bordes cuerpo
			$sheet->getStyle("B".($cab+3).":Q".$total)->applyFromArray(array(
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
			  		
			  		$sheet->getCellByColumnAndRow(2, $row)->setValue(utf8_encode(trim($filas->Sede)));
			  		$sheet->getCellByColumnAndRow(3, $row)->setValue(utf8_encode(trim($filas->Prov)));
			  		$sheet->getCellByColumnAndRow(4, $row)->setValue($filas->LocaProg);
			  		$sheet->getCellByColumnAndRow(5, $row)->setValue($filas->TotalVisitados);

			  		if ( $filas->TotalVisitados > 0 ) {

				  		$sheet->getCellByColumnAndRow(6, $row)->setValue('=IF('.$filas->PorAvance.'>=100,ROUND('.$filas->PorAvance.',0),'.$filas->PorAvance.')');
				  		$sheet->getCellByColumnAndRow(7, $row)->setValue($filas->Tcompletos);
				  		$sheet->getCellByColumnAndRow(8, $row)->setValue('=IF('.$filas->Porcompletos.'>=100,ROUND('.$filas->Porcompletos.',0),'.$filas->Porcompletos.')');
				  		$sheet->getCellByColumnAndRow(9, $row)->setValue($filas->TIncompleto);
				  		$sheet->getCellByColumnAndRow(10, $row)->setValue('=IF('.$filas->PorInc.'>=100,ROUND('.$filas->PorInc.',0),'.$filas->PorInc.')');
				  		$sheet->getCellByColumnAndRow(11, $row)->setValue($filas->TRechazo);
				  		$sheet->getCellByColumnAndRow(12, $row)->setValue('=IF('.$filas->PorRechazo.'>=100,ROUND('.$filas->PorRechazo.',0),'.$filas->PorRechazo.')');
				  		$sheet->getCellByColumnAndRow(13, $row)->setValue($filas->TLocal_Cerrado);
				  		$sheet->getCellByColumnAndRow(14, $row)->setValue('=IF('.$filas->PorLocal_Cerrado.'>=100,ROUND('.$filas->PorLocal_Cerrado.',0),'.$filas->PorLocal_Cerrado.')');
				  		$sheet->getCellByColumnAndRow(15, $row)->setValue($filas->TOtros);
				  		$sheet->getCellByColumnAndRow(16, $row)->setValue('=IF('.$filas->PorOtros.'>=100,ROUND('.$filas->PorOtros.',0),'.$filas->PorOtros.')');
			  	
			  		}else{
			  			
			  			$sheet->getCellByColumnAndRow(6, $row)->setValue($filas->PorAvance);
				  		$sheet->getCellByColumnAndRow(7, $row)->setValue($filas->Tcompletos);
				  		$sheet->getCellByColumnAndRow(8, $row)->setValue($filas->Porcompletos);
				  		$sheet->getCellByColumnAndRow(9, $row)->setValue($filas->TIncompleto);
				  		$sheet->getCellByColumnAndRow(10, $row)->setValue($filas->PorInc);
				  		$sheet->getCellByColumnAndRow(11, $row)->setValue($filas->TRechazo);
				  		$sheet->getCellByColumnAndRow(12, $row)->setValue($filas->PorRechazo);
				  		$sheet->getCellByColumnAndRow(13, $row)->setValue($filas->TLocal_Cerrado);
				  		$sheet->getCellByColumnAndRow(14, $row)->setValue($filas->PorLocal_Cerrado);
				  		$sheet->getCellByColumnAndRow(15, $row)->setValue($filas->TOtros);
				  		$sheet->getCellByColumnAndRow(16, $row)->setValue($filas->PorOtros);
			  		}
			  		//$sheet->getCellByColumnAndRow(16, $row)->setValue('Hola');
			  		//$sheet->setCellValue('Q'.$row,'=SUM(H'.$row.',J'.$row.',L'.$row.',N'.$row.',P'.$row.')');

				//}
				 $col = 2;
				 //dar formato de color intercalado a cada fila
				 if($cambio){
			     	$fila_color = $this->phpexcel->getActiveSheet()->getStyle("B".$row.":Q".$row);
			        
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

			$sheet->getStyle('B'.($cab+2).':Q'.$total)->getAlignment()->setWrapText(true)->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

			$sheet->getStyle('D'.($cab+2).':Q'.$total)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

 		// CUERPO

		// PIE TOTALES
			$celda_s = $total+1 ; // inicio de pie de resumenes
			$sheet->setCellValue('B'.$celda_s,'TOTALES');
			$sheet->mergeCells('B'.$celda_s.':D'.$celda_s);
			$sheet->mergeCells('H'.$celda_s.':Q'.$celda_s);
			
			$inicio_s = $cab+3 ; // inicio suma  de resumenes	
			$fin_s = $total ; // fin suma de resumenes	

			$sheet->setCellValue('E'. $celda_s ,'=IF(SUM(E'.$inicio_s.':E'.$fin_s.')>0,SUM(E'.$inicio_s.':E'.$fin_s.')," ")');
			$sheet->setCellValue('F'. $celda_s ,'=IF(SUM(F'.$inicio_s.':F'.$fin_s.')>0,SUM(F'.$inicio_s.':F'.$fin_s.')," ")');
			$sheet->setCellValue('G'. $celda_s ,'=IF(SUM(E'.$inicio_s.':E'.$fin_s.')>0,((SUM(F'.$inicio_s.':F'.$fin_s.'))/(SUM(E'.$inicio_s.':E'.$fin_s.')))*100," ")');


			$sheet->getStyle('B'.$celda_s)->applyFromArray($color_celda_cabeceras);
	     	$sheet->getStyle('h'.$celda_s)->applyFromArray($color_celda_cabeceras);
	     	$sheet->getStyle('B'.$celda_s.':Q'.$celda_s)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
			$sheet->getStyle('B'.$celda_s)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
			$sheet->getStyle('G'. $celda_s)->getNumberFormat()->setFormatCode('#,##0.00');
			$sheet->getStyle('B'.$celda_s.':Q'.$celda_s)->applyFromArray(array(
			'borders' => array(
						'allborders' => array(
										'style' => PHPExcel_Style_Border::BORDER_THIN)
					)
			));

			//fecha
			$sheet->setCellValue('B'.($celda_s +2),'IMPRESO:' );
			$sheet->mergeCells('B'.($celda_s +2).':C'.($celda_s +2));
	     	$sheet->getStyle('B'.($celda_s + 2))->applyFromArray($color_celda_cabeceras)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	     		
			$sheet->getStyle('B'.($celda_s + 2))->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);

			$sheet->setCellValue('D'.($celda_s +2), date('d/m/Y H:i:s') );
			$sheet->mergeCells('D'.($celda_s +2).':E'.($celda_s +2));
			$sheet->getStyle('D'.($celda_s +2))->getNumberFormat()->setFormatCode('d/m/Y H:i:s'); 
			$sheet->getStyle('B'.($celda_s +2).':E'.($celda_s +2))->applyFromArray(array(
			'borders' => array(
						'allborders' => array(
										'style' => PHPExcel_Style_Border::BORDER_THIN)
					)
			));
		// PIE TOTALES

		// SALIDA EXCEL
			// Propiedades del archivo excel
				$sheet->setTitle("Reporte Avance ODEI");
				$this->phpexcel->getProperties()
				->setTitle("Reporte Avance ODEI")
				->setDescription("Reporte de Avance Diario por ODEI");

			header("Content-Type: application/vnd.ms-excel");
			$nombreArchivo = 'Monitoreo_AvanceDiario_ODEI_'.date('Y-m-d').'_Periodo('.$periodo.')';
			header("Content-Disposition: attachment; filename=\"$nombreArchivo.xls\""); //EXCEL
			header("Cache-Control: max-age=0");
			
			// Genera Excel
			$writer = PHPExcel_IOFactory::createWriter($this->phpexcel, "Excel5");

			$writer->save('php://output');
			exit;
		// SALIDA EXCEL
	}

	public function ExportacionUbigeo()
	{
		
		$depa = $this->input->get('vdepa');
		$prov = $this->input->get('vprov');
		$periodo = $this->input->get('vperiodo');
		
		$tipo = 0;

		if ($depa!=99 && $prov!=99 && $periodo!=99)
		{
			$tipo = 1;
		}elseif ($depa!=99 && $prov!=99 && $periodo==99){
			$tipo = 2;
		}elseif ($depa!=99 && $prov==99 && $periodo!=99){
			$tipo = 3;
		}elseif ($depa!=99 && $prov==99 && $periodo==99){
			$tipo = 4;
		}elseif ($depa==99 && $periodo!=99){
			$tipo = 5;
		}elseif ($depa==99 && $periodo==99){
			$tipo = 6;
		}
		$query = $this->seguimiento_model->get_ubigeo_cedula($depa,$prov,$periodo,$tipo);
		
		// pestaña
		$sheet = $this->phpexcel->getActiveSheet(0);

		//colores
			$color_celda_cabeceras =   array(
				'fill' => array(
					'type' => PHPExcel_Style_Fill::FILL_SOLID,
					'color' => array('rgb' => '27408B')
				)
			);
		//colores
		
		// formato de la hoja
			// Set Orientation, size and scaling
			$sheet->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);// horizontal
			$sheet->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
			$sheet->getPageSetup()->setFitToPage(false); // ajustar pagina
			$sheet->getPageSetup()->setFitToWidth(1);
			$sheet->getPageSetup()->setFitToHeight(0);		
		// formato de la hoja

		// ANCHO Y ALTURA DE COLUMNAS DEL FILE
			$sheet->getColumnDimension('A')->setWidth(1);
			$sheet->getColumnDimension('B')->setWidth(5);
			$sheet->getColumnDimension('C')->setWidth(22);
			$sheet->getColumnDimension('D')->setWidth(15);
			$sheet->getColumnDimension('E')->setWidth(15);
			$sheet->getColumnDimension('F')->setWidth(10);
			$sheet->getColumnDimension('G')->setWidth(8);
			$sheet->getColumnDimension('H')->setWidth(8);
			$sheet->getColumnDimension('I')->setWidth(8);
			$sheet->getColumnDimension('J')->setWidth(8);
			$sheet->getColumnDimension('K')->setWidth(8);
			$sheet->getColumnDimension('L')->setWidth(5);
			$sheet->getColumnDimension('M')->setWidth(6);
			$sheet->getColumnDimension('N')->setWidth(6);
			$sheet->getColumnDimension('O')->setWidth(5);
			$sheet->getColumnDimension('P')->setWidth(5);
			$sheet->getColumnDimension('Q')->setWidth(5);
			
			

			$sheet->getRowDimension(4)->setRowHeight(2);
			$sheet->getRowDimension(6)->setRowHeight(2);
		// ANCHO Y ALTURA DE COLUMNAS DEL FILE

		// TITULOS
			$sheet->setCellValue('D3','INSTITUTO NACIONAL DE ESTADÍSTICA E INFORMATICA');
			$sheet->mergeCells('D3:Q3');
			$sheet->setCellValue('D5','CENSO DE INFRAESTRUCTURA EDUCATIVA 2013');
			$sheet->mergeCells('D5:Q5');
			$sheet->setCellValue('D7','REPORTE DE REGISTRO POR UBIGEO (MONITOREO)');
			$sheet->mergeCells('D7:Q7');
			$sheet->getStyle('D3:Q7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$sheet->getStyle('D3:Q7')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
			$sheet->getStyle('D3:Q3')->getFont()->setname('Arial black')->setSize(16);
			$sheet->getStyle('D5:Q7')->getFont()->setname('Arial')->setSize(16);

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
					$sheet->setCellValue('B9','PERIODO:');
					$sheet->mergeCells('B9:C9');

					if ($periodo==99){ $periodo = "Todos"; }

					$sheet->setCellValue('D9',$periodo);
					$sheet->mergeCells('D9:E9');

					$sheet->getStyle('D9:C9')->getFont()->setname('Arial')->setSize(12);
					$sheet->getStyle("D9:C9")->getAlignment()->setWrapText(true);// AJUSTA TEXTO A CELDA

			     	$sheet->getStyle("B9:C9")->applyFromArray($color_celda_cabeceras);

			     	$sheet->getStyle("B9:E9")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
					$sheet->getStyle("B9:C9")->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);

					$sheet->getStyle("B9:E9")->applyFromArray(array(
					'borders' => array(
								'allborders' => array(
												'style' => PHPExcel_Style_Border::BORDER_THIN)
							)
					));
		// CABECERA ESPECIAL

		// CABECERA
			// INICIO DE LA  cabecera
			$cab = 11;	
				
			// NOMBRE CABECERAS
	
					$sheet->setCellValue('B'.$cab,'N°');
					$sheet->mergeCells('B'.$cab.':B'.($cab+2));

					$sheet->setCellValue('C'.$cab,'Departamento' );
					$sheet->mergeCells('C'.$cab.':C'.($cab+2));
					$sheet->setCellValue('D'.$cab,'Provincia' );
					$sheet->mergeCells('D'.$cab.':D'.($cab+2));
					$sheet->setCellValue('E'.$cab,'TOTAL DE LOCALES ESCOLARES' );
					$sheet->mergeCells('E'.$cab.':E'.($cab+2));

					$sheet->setCellValue('F'.$cab,'Total Locales Escolares Censados' );
					$sheet->mergeCells('F'.$cab.':G'.($cab+1));
						$sheet->setCellValue('F'.($cab+2),'Abs');
						$sheet->mergeCells('F'.($cab+2).':F'.($cab+2));
						$sheet->setCellValue('G'.($cab+2),'%');
						$sheet->mergeCells('G'.($cab+2).':G'.($cab+2));


					$sheet->setCellValue('H'.$cab, 'Instituciones Educativas según Resultado');
					$sheet->mergeCells('H'.$cab.':Q'.$cab);	
						$sheet->setCellValue('H'.($cab+1), 'Completa');
						$sheet->mergeCells('H'.($cab+1).':I'.($cab+1));
							$sheet->setCellValue('H'.($cab+2), 'Abs');
							$sheet->mergeCells('H'.($cab+2).':H'.($cab+2));
							$sheet->setCellValue('I'.($cab+2), '%');
							$sheet->mergeCells('I'.($cab+2).':I'.($cab+2));
						$sheet->setCellValue('J'.($cab+1), 'Incompleta');
						$sheet->mergeCells('J'.($cab+1).':K'.($cab+1));
							$sheet->setCellValue('J'.($cab+2), 'Abs');
							$sheet->mergeCells('J'.($cab+2).':J'.($cab+2));
							$sheet->setCellValue('K'.($cab+2), '%');
							$sheet->mergeCells('K'.($cab+2).':K'.($cab+2));
						$sheet->setCellValue('L'.($cab+1), 'Rechazo');
						$sheet->mergeCells('L'.($cab+1).':M'.($cab+1));
							$sheet->setCellValue('L'.($cab+2), 'Abs');
							$sheet->mergeCells('L'.($cab+2).':L'.($cab+2));
							$sheet->setCellValue('M'.($cab+2), '%');
							$sheet->mergeCells('M'.($cab+2).':M'.($cab+2));
						$sheet->setCellValue('N'.($cab+1), 'Desocupada');
						$sheet->mergeCells('N'.($cab+1).':O'.($cab+1));
							$sheet->setCellValue('N'.($cab+2), 'Abs');
							$sheet->mergeCells('N'.($cab+2).':N'.($cab+2));
							$sheet->setCellValue('O'.($cab+2), '%');
							$sheet->mergeCells('O'.($cab+2).':O'.($cab+2));
						$sheet->setCellValue('P'.($cab+1), 'Otro');
						$sheet->mergeCells('P'.($cab+1).':Q'.($cab+1));
							$sheet->setCellValue('P'.($cab+2), 'Abs');
							$sheet->mergeCells('P'.($cab+2).':P'.($cab+2));
							$sheet->setCellValue('Q'.($cab+2), '%');
							$sheet->mergeCells('Q'.($cab+2).':Q'.($cab+2));
			// NOMBRE CABECERAS

			// ESTILOS  CABECERAS
				$sheet->getStyle("B".$cab.":Q".($cab+2))->getAlignment()->setWrapText(true);// AJUSTA TEXTO A CELDA
				$sheet->getStyle("B".$cab.":Q".($cab+2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);						
				$sheet->getStyle("B".$cab.":Q".($cab+2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);						
				$sheet->getStyle("B".$cab.":Q".($cab+2))->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
				$sheet->getStyle("B".$cab.":Q".($cab+2))->getFont()->setname('Arial')->setSize(9);



		     	$headStyle = $this->phpexcel->getActiveSheet()->getStyle("B".$cab.":Q".($cab+2));
				$headStyle->applyFromArray($color_celda_cabeceras);

				$sheet->getStyle("B".$cab.":Q".($cab+2))->applyFromArray(array(
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
			
			$sheet->getStyle("A".($cab+3).":Q".$total)->getFont()->setname('Arial Narrow')->setSize(9);

			//bordes cuerpo
			$sheet->getStyle("B".($cab+3).":Q".$total)->applyFromArray(array(
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

			    $provincia = ($tipo!=5 && $tipo!=6) ? $filas->Provincia : '';
			  		
			  		$sheet->getCellByColumnAndRow(2, $row)->setValue(utf8_encode(trim($filas->Departamento)));
			  		$sheet->getCellByColumnAndRow(3, $row)->setValue(utf8_encode(trim($provincia)));
			  		$sheet->getCellByColumnAndRow(4, $row)->setValue($filas->LocEscolares);
			  		$sheet->getCellByColumnAndRow(5, $row)->setValue($filas->LocEscolar_Censado);
			  		$sheet->getCellByColumnAndRow(6, $row)->setValue($filas->LocEscolar_Censado_Porc);
			  		$sheet->getCellByColumnAndRow(7, $row)->setValue($filas->Completa);
			  		$sheet->getCellByColumnAndRow(8, $row)->setValue($filas->Completa_Porc);
			  		$sheet->getCellByColumnAndRow(9, $row)->setValue($filas->Incompleta);
			  		$sheet->getCellByColumnAndRow(10, $row)->setValue($filas->Incompleta_Porc);
			  		$sheet->getCellByColumnAndRow(11, $row)->setValue($filas->Rechazo);
			  		$sheet->getCellByColumnAndRow(12, $row)->setValue($filas->Rechazo_Porc);
			  		$sheet->getCellByColumnAndRow(13, $row)->setValue($filas->Desocupada);
			  		$sheet->getCellByColumnAndRow(14, $row)->setValue($filas->Desocupada_Porc);
			  		$sheet->getCellByColumnAndRow(15, $row)->setValue($filas->Otro);
			  		$sheet->getCellByColumnAndRow(16, $row)->setValue($filas->Otro_Porc);
				//}
				 $col = 2;
				 //dar formato de color intercalado a cada fila
				 if($cambio){
			     	$fila_color = $this->phpexcel->getActiveSheet()->getStyle("B".$row.":Q".$row);
			        
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

			$sheet->getStyle('B'.($cab+2).':Q'.$total)->getAlignment()->setWrapText(true)->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

			$sheet->getStyle('D'.($cab+2).':Q'.$total)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

 		// CUERPO

		// PIE TOTALES
			$celda_s = $total+1 ; // inicio de pie de resumenes

			//fecha
			$sheet->setCellValue('B'.($celda_s +2),'IMPRESO:' );
			$sheet->mergeCells('B'.($celda_s +2).':C'.($celda_s +2));
	     	$sheet->getStyle('B'.($celda_s + 2))->applyFromArray($color_celda_cabeceras)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	     		
			$sheet->getStyle('B'.($celda_s + 2))->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);

			$sheet->setCellValue('D'.($celda_s +2), date('d/m/Y H:i:s') );
			$sheet->mergeCells('D'.($celda_s +2).':E'.($celda_s +2));
			
			$sheet->getStyle('D'.($celda_s +2))->getNumberFormat()->setFormatCode('d/m/Y H:i:s'); 
			$sheet->getStyle('B'.($celda_s +2).':E'.($celda_s +2))->applyFromArray(array(
			'borders' => array(
						'allborders' => array(
										'style' => PHPExcel_Style_Border::BORDER_THIN)
					)
			));
		// PIE TOTALES

		// SALIDA EXCEL
			// Propiedades del archivo excel
				$sheet->setTitle("Monitoreo Registro UBIGEO");
				$this->phpexcel->getProperties()
				->setTitle("Reporte Registro Ubigeo")
				->setDescription("Reporte de Registro por Ubigeo");

			header("Content-Type: application/vnd.ms-excel");
			$nombreArchivo = 'Monitoreo_Registro_Ubigeo_'.date('Y-m-d');
			header("Content-Disposition: attachment; filename=\"$nombreArchivo.xls\""); //EXCEL
			header("Cache-Control: max-age=0");
			
			// Genera Excel
			$writer = PHPExcel_IOFactory::createWriter($this->phpexcel, "Excel5");

			$writer->save('php://output');
			exit;
		// SALIDA EXCEL
	}

	public function ExportacionUbigeo_Avance()
	{

		$depa = $this->input->get('vdepa');
		$prov = $this->input->get('vprov');
		$periodo_min = $this->input->get('vperiodo1');
		$periodo_max = $this->input->get('vperiodo2');
		
		$tipo = 0;

		if ($depa!=99 && $prov!=99)
		{
			$tipo = 1;
		}elseif ($depa!=99 && $prov==99){
			$tipo = 2;
		}elseif ($depa==99){
			$tipo = 3;
		}

		//echo $tipo;

		$query = $this->seguimiento_model->get_avance_ubigeo($depa,$prov,$periodo_min,$periodo_max,$tipo);
				  
		// pestaña
		$sheet = $this->phpexcel->getActiveSheet(0);

		//colores
			$color_celda_cabeceras =   array(
				'fill' => array(
					'type' => PHPExcel_Style_Fill::FILL_SOLID,
					'color' => array('rgb' => '27408B')
				)
			);
		//colores
		
		// formato de la hoja
			// Set Orientation, size and scaling
			$sheet->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);// horizontal
			$sheet->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
			$sheet->getPageSetup()->setFitToPage(false); // ajustar pagina
			$sheet->getPageSetup()->setFitToWidth(1);
			$sheet->getPageSetup()->setFitToHeight(0);		
		// formato de la hoja

		// ANCHO Y ALTURA DE COLUMNAS DEL FILE
			$sheet->getColumnDimension('A')->setWidth(1);
			$sheet->getColumnDimension('B')->setWidth(5);
			$sheet->getColumnDimension('C')->setWidth(22);
			$sheet->getColumnDimension('D')->setWidth(15);
			$sheet->getColumnDimension('E')->setWidth(15);
			$sheet->getColumnDimension('F')->setWidth(10);
			$sheet->getColumnDimension('G')->setWidth(8);
			$sheet->getColumnDimension('H')->setWidth(8);
			$sheet->getColumnDimension('I')->setWidth(8);
			$sheet->getColumnDimension('J')->setWidth(8);
			$sheet->getColumnDimension('K')->setWidth(8);
			$sheet->getColumnDimension('L')->setWidth(5);
			$sheet->getColumnDimension('M')->setWidth(6);
			$sheet->getColumnDimension('N')->setWidth(6);
			$sheet->getColumnDimension('O')->setWidth(5);
			$sheet->getColumnDimension('P')->setWidth(5);
			$sheet->getColumnDimension('Q')->setWidth(5);
			
			

			$sheet->getRowDimension(4)->setRowHeight(2);
			$sheet->getRowDimension(6)->setRowHeight(2);
		// ANCHO Y ALTURA DE COLUMNAS DEL FILE

		// TITULOS
			$sheet->setCellValue('D3','INSTITUTO NACIONAL DE ESTADÍSTICA E INFORMATICA');
			$sheet->mergeCells('D3:R3');
			$sheet->setCellValue('D5','CENSO DE INFRAESTRUCTURA EDUCATIVA 2013');
			$sheet->mergeCells('D5:Q5');
			$sheet->setCellValue('D7','REPORTE DE AVANCE DIARIO POR UBIGEO (MONITOREO)');
			$sheet->mergeCells('D7:Q7');
			$sheet->getStyle('D3:Q7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$sheet->getStyle('D3:Q7')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
			$sheet->getStyle('D3:Q3')->getFont()->setname('Arial black')->setSize(16);
			$sheet->getStyle('D5:Q7')->getFont()->setname('Arial')->setSize(16);

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
					$sheet->setCellValue('B9','PERIODO:');
					$sheet->mergeCells('B9:C9');

					//if ($periodo==99){ $periodo = "Todos"; }

					$sheet->setCellValue('D9',$periodo_min.' - '.$periodo_max);
					$sheet->mergeCells('D9:E9');

					$sheet->getStyle('D9:C9')->getFont()->setname('Arial')->setSize(12);
					$sheet->getStyle("D9:C9")->getAlignment()->setWrapText(true);// AJUSTA TEXTO A CELDA

			     	$sheet->getStyle("B9:C9")->applyFromArray($color_celda_cabeceras);

			     	$sheet->getStyle("B9:E9")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
					$sheet->getStyle("B9:C9")->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);

					$sheet->getStyle("B9:E9")->applyFromArray(array(
					'borders' => array(
								'allborders' => array(
												'style' => PHPExcel_Style_Border::BORDER_THIN)
							)
					));
		// CABECERA ESPECIAL

		// CABECERA
			// INICIO DE LA  cabecera
			$cab = 11;	
				
			// NOMBRE CABECERAS
	
					$sheet->setCellValue('B'.$cab,'N°');
					$sheet->mergeCells('B'.$cab.':B'.($cab+2));

					$sheet->setCellValue('C'.$cab,'Departamento');
					$sheet->mergeCells('C'.$cab.':C'.($cab+2));
					$sheet->setCellValue('D'.$cab,'Provincia');
					$sheet->mergeCells('D'.$cab.':D'.($cab+2));
					$sheet->setCellValue('E'.$cab,'LOCALES PROGRAMADOS DEL PERIODO' );
					$sheet->mergeCells('E'.$cab.':E'.($cab+2));
					$sheet->setCellValue('F'.$cab,'Locales Visitados');
					$sheet->mergeCells('F'.$cab.':F'.($cab+2));
					$sheet->setCellValue('G'.$cab,'AVANCE (%)');
					$sheet->mergeCells('G'.$cab.':G'.($cab+2));


					$sheet->setCellValue('H'.$cab, 'Instituciones Educativas según Resultado');
					$sheet->mergeCells('H'.$cab.':Q'.$cab);
						$sheet->setCellValue('H'.($cab+1), 'Completa');
						$sheet->mergeCells('H'.($cab+1).':I'.($cab+1));
							$sheet->setCellValue('H'.($cab+2), 'Abs');
							$sheet->mergeCells('H'.($cab+2).':H'.($cab+2));
							$sheet->setCellValue('I'.($cab+2), '%');
							$sheet->mergeCells('I'.($cab+2).':I'.($cab+2));
						$sheet->setCellValue('J'.($cab+1), 'Incompleta');
						$sheet->mergeCells('J'.($cab+1).':K'.($cab+1));
							$sheet->setCellValue('J'.($cab+2), 'Abs');
							$sheet->mergeCells('J'.($cab+2).':J'.($cab+2));
							$sheet->setCellValue('K'.($cab+2), '%');
							$sheet->mergeCells('K'.($cab+2).':K'.($cab+2));
						$sheet->setCellValue('L'.($cab+1), 'Rechazo');
						$sheet->mergeCells('L'.($cab+1).':M'.($cab+1));
							$sheet->setCellValue('L'.($cab+2), 'Abs');
							$sheet->mergeCells('L'.($cab+2).':L'.($cab+2));
							$sheet->setCellValue('M'.($cab+2), '%');
							$sheet->mergeCells('M'.($cab+2).':M'.($cab+2));
						$sheet->setCellValue('N'.($cab+1), 'Desocupada');
						$sheet->mergeCells('N'.($cab+1).':O'.($cab+1));
							$sheet->setCellValue('N'.($cab+2), 'Abs');
							$sheet->mergeCells('N'.($cab+2).':N'.($cab+2));
							$sheet->setCellValue('O'.($cab+2), '%');
							$sheet->mergeCells('O'.($cab+2).':O'.($cab+2));
						$sheet->setCellValue('P'.($cab+1), 'Otro');
						$sheet->mergeCells('P'.($cab+1).':Q'.($cab+1));
							$sheet->setCellValue('P'.($cab+2), 'Abs');
							$sheet->mergeCells('P'.($cab+2).':P'.($cab+2));
							$sheet->setCellValue('Q'.($cab+2), '%');
							$sheet->mergeCells('Q'.($cab+2).':Q'.($cab+2));

			// NOMBRE CABECERAS

			// ESTILOS  CABECERAS
				$sheet->getStyle("B".$cab.":Q".($cab+2))->getAlignment()->setWrapText(true);// AJUSTA TEXTO A CELDA
				$sheet->getStyle("B".$cab.":Q".($cab+2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);						
				$sheet->getStyle("B".$cab.":Q".($cab+2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);						
				$sheet->getStyle("B".$cab.":Q".($cab+2))->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
				$sheet->getStyle("B".$cab.":Q".($cab+2))->getFont()->setname('Arial')->setSize(9);



		     	$headStyle = $this->phpexcel->getActiveSheet()->getStyle("B".$cab.":Q".($cab+2));
				$headStyle->applyFromArray($color_celda_cabeceras);

				$sheet->getStyle("B".$cab.":Q".($cab+2))->applyFromArray(array(
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
			
			$sheet->getStyle("A".($cab+3).":Q".$total)->getFont()->setname('Arial Narrow')->setSize(9);

			//bordes cuerpo
			$sheet->getStyle("B".($cab+3).":Q".$total)->applyFromArray(array(
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
			  		
			  		$provincia = ($tipo !=3) ? $filas->NombProv : '';
			  		$sheet->getCellByColumnAndRow(2, $row)->setValue(utf8_encode(trim($filas->NombDpto)));
			  		$sheet->getCellByColumnAndRow(3, $row)->setValue(utf8_encode(trim($provincia)));
			  		$sheet->getCellByColumnAndRow(4, $row)->setValue($filas->LocEscolares);
			  		$sheet->getCellByColumnAndRow(5, $row)->setValue($filas->LocEscolar_Censado);
			  		if ( $filas->LocEscolar_Censado > 0 ) {

				  		$sheet->getCellByColumnAndRow(6, $row)->setValue('=IF('.$filas->LocEscolar_Censado_Porc.'>=100,ROUND('.$filas->LocEscolar_Censado_Porc.',0),'.$filas->LocEscolar_Censado_Porc.')');
				  		$sheet->getCellByColumnAndRow(7, $row)->setValue($filas->Completa);
				  		$sheet->getCellByColumnAndRow(8, $row)->setValue('=IF('.$filas->Completa_Porc.'>=100,ROUND('.$filas->Completa_Porc.',0),'.$filas->Completa_Porc.')');
				  		$sheet->getCellByColumnAndRow(9, $row)->setValue($filas->Incompleta);
				  		$sheet->getCellByColumnAndRow(10, $row)->setValue('=IF('.$filas->Incompleta_Porc.'>=100,ROUND('.$filas->Incompleta_Porc.',0),'.$filas->Incompleta_Porc.')');
				  		$sheet->getCellByColumnAndRow(11, $row)->setValue($filas->Rechazo);
				  		$sheet->getCellByColumnAndRow(12, $row)->setValue('=IF('.$filas->Rechazo_Porc.'>=100,ROUND('.$filas->Rechazo_Porc.',0),'.$filas->Rechazo_Porc.')');
				  		$sheet->getCellByColumnAndRow(13, $row)->setValue($filas->Desocupada);
				  		$sheet->getCellByColumnAndRow(14, $row)->setValue('=IF('.$filas->Desocupada_Porc.'>=100,ROUND('.$filas->Desocupada_Porc.',0),'.$filas->Desocupada_Porc.')');
				  		$sheet->getCellByColumnAndRow(15, $row)->setValue($filas->Otro);
				  		$sheet->getCellByColumnAndRow(16, $row)->setValue('=IF('.$filas->Otro_Porc.'>=100,ROUND('.$filas->Otro_Porc.',0),'.$filas->Otro_Porc.')');

			  		}else{

				  		$sheet->getCellByColumnAndRow(6, $row)->setValue($filas->LocEscolar_Censado_Porc);
				  		$sheet->getCellByColumnAndRow(7, $row)->setValue($filas->Completa);
				  		$sheet->getCellByColumnAndRow(8, $row)->setValue($filas->Completa_Porc);
				  		$sheet->getCellByColumnAndRow(9, $row)->setValue($filas->Incompleta);
				  		$sheet->getCellByColumnAndRow(10, $row)->setValue($filas->Incompleta_Porc);
				  		$sheet->getCellByColumnAndRow(11, $row)->setValue($filas->Rechazo);
				  		$sheet->getCellByColumnAndRow(12, $row)->setValue($filas->Rechazo_Porc);
				  		$sheet->getCellByColumnAndRow(13, $row)->setValue($filas->Desocupada);
				  		$sheet->getCellByColumnAndRow(14, $row)->setValue($filas->Desocupada_Porc);
				  		$sheet->getCellByColumnAndRow(15, $row)->setValue($filas->Otro);
				  		$sheet->getCellByColumnAndRow(16, $row)->setValue($filas->Otro_Porc);
			  		}


				//}
				 $col = 2;
				 //dar formato de color intercalado a cada fila
				 if($cambio){
			     	$fila_color = $this->phpexcel->getActiveSheet()->getStyle("B".$row.":Q".$row);
			        
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

			$sheet->getStyle('B'.($cab+2).':Q'.$total)->getAlignment()->setWrapText(true)->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

			$sheet->getStyle('D'.($cab+2).':Q'.$total)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

 		// CUERPO

		// PIE TOTALES
			$celda_s = $total+1 ; // inicio de pie de resumenes
			$sheet->setCellValue('B'.$celda_s,'TOTALES');
			$sheet->mergeCells('B'.$celda_s.':D'.$celda_s);
			$sheet->mergeCells('H'.$celda_s.':Q'.$celda_s);
			
			$inicio_s = $cab+3 ; // inicio suma  de resumenes	
			$fin_s = $total ; // fin suma de resumenes	

			$sheet->setCellValue('E'. $celda_s ,'=IF(SUM(E'.$inicio_s.':E'.$fin_s.')>0,SUM(E'.$inicio_s.':E'.$fin_s.')," ")');
			$sheet->setCellValue('F'. $celda_s ,'=IF(SUM(F'.$inicio_s.':F'.$fin_s.')>0,SUM(F'.$inicio_s.':F'.$fin_s.')," ")');
			$sheet->setCellValue('G'. $celda_s ,'=ROUND((F'.$celda_s.'*100)/E'.$celda_s.',2)');

			$sheet->getStyle('B'.$celda_s)->applyFromArray($color_celda_cabeceras);
	     	$sheet->getStyle('H'.$celda_s)->applyFromArray($color_celda_cabeceras);
	     	$sheet->getStyle('B'.$celda_s.':Q'.$celda_s)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
			$sheet->getStyle('B'.$celda_s)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);

			$sheet->getStyle('B'.$celda_s.':Q'.$celda_s)->applyFromArray(array(
			'borders' => array(
						'allborders' => array(
										'style' => PHPExcel_Style_Border::BORDER_THIN)
					)
			));

			//fecha
			$sheet->setCellValue('B'.($celda_s +2),'IMPRESO:' );
			$sheet->mergeCells('B'.($celda_s +2).':C'.($celda_s +2));
	     	$sheet->getStyle('B'.($celda_s + 2))->applyFromArray($color_celda_cabeceras)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	     		
			$sheet->getStyle('B'.($celda_s + 2))->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);

			$sheet->setCellValue('D'.($celda_s +2), date('d/m/Y H:i:s') );
			$sheet->mergeCells('D'.($celda_s +2).':E'.($celda_s +2));
			$sheet->getStyle('D'.($celda_s +2))->getNumberFormat()->setFormatCode('d/m/Y H:i:s'); 
			$sheet->getStyle('B'.($celda_s +2).':E'.($celda_s +2))->applyFromArray(array(
			'borders' => array(
						'allborders' => array(
										'style' => PHPExcel_Style_Border::BORDER_THIN)
					)
			));
		// PIE TOTALES

		// SALIDA EXCEL
			// Propiedades del archivo excel
				$sheet->setTitle("Reporte Avance UBIGEO");
				$this->phpexcel->getProperties()
				->setTitle("Reporte Avance Ubigeo")
				->setDescription("Reporte de Avance Diario por Ubigeo");

			header("Content-Type: application/vnd.ms-excel");
			$nombreArchivo = 'Monitoreo_AvanceDiario_Ubigeo_'.date('Y-m-d');
			header("Content-Disposition: attachment; filename=\"$nombreArchivo.xls\""); //EXCEL
			header("Cache-Control: max-age=0");
			
			// Genera Excel
			$writer = PHPExcel_IOFactory::createWriter($this->phpexcel, "Excel5");

			$writer->save('php://output');
			exit;
		// SALIDA EXCEL
	}

}
?>