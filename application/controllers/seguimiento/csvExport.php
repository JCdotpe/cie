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
		//$cond1 = "";
		$cond2 = "";

		$where1 = "";
		$todos = "";

		$sidx = "detadepen";
		/*
		if(isset($_GET['odei'])) { 
			$odei = $this->input->get('odei');
			if ($odei != -1) { 
				$cond1 = "coddepe = '$odei'";
			}
		}else{ $odei = ""; 
			$cond1 = "coddepe = '-1'"; }
		*/
		if(isset($_GET['periodo'])) { 
			$periodo = $this->input->get('periodo');
			if ($periodo != -1) { 
				if ($periodo != 99)
				{
					$cond2 = "Periodo = '$periodo'";
				}else{
					$todos = "SI";
				}
			}
		}else{ $periodo = ""; 
			$cond2 = "Periodo = '-1'"; }

		if(!$sidx) $sidx =1;

		$where1 =  "WHERE ".$cond2;
		$count = $this->seguimiento_model->get_cantidad_for_odei($where1,$todos);

		//$data['cantidad'] = $count;
		$query = $this->seguimiento_model->get_seguimiento_for_odei($sidx, 'asc', '0', $count, $where1, $todos);
		//$data['consulta'] = $query;
		  
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
			$sheet->setCellValue('D7','REPORTE DE MONITOREO POR ODEI');
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
				$sheet->setTitle("Monitoreo ODEI");
				$this->phpexcel->getProperties()
				->setTitle("Reporte Monitoreo ODEI")
				->setDescription("Reporte de Monitoreo por ODEI");

			header("Content-Type: application/vnd.ms-excel");
			$nombreArchivo = 'Monitoreo_ODEI'.date('YmdHis');
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