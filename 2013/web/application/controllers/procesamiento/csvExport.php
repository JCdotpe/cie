<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Csvexport extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		$this->load->helper('form');
		$this->load->library('PHPExcel');
		$this->load->model('procesamiento/dudra_model');
	}

	public function ExportacionUD()
	{
		
		
	
		$query = $this->dudra_model->get_udra_digitacion();
		
		
		// pestaña
		$sheet = $this->phpexcel->getActiveSheet(0);

		//colores
			$color_celda_cabeceras =   array(
				'fill' => array(
					'type' => PHPExcel_Style_Fill::FILL_SOLID,
					'color' => array('rgb' => '006699')
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
			$sheet->getColumnDimension('D')->setWidth(22);
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
			$sheet->getColumnDimension('R')->setWidth(5);
			

			$sheet->getRowDimension(4)->setRowHeight(2);
			$sheet->getRowDimension(6)->setRowHeight(2);
		// ANCHO Y ALTURA DE COLUMNAS DEL FILE

		// TITULOS
			$sheet->setCellValue('D3','INSTITUTO NACIONAL DE ESTADÍSTICA E INFORMATICA');
			$sheet->mergeCells('D3:R3');
			$sheet->setCellValue('D5','CENSO DE INFRAESTRUCTURA EDUCATIVA 2013');
			$sheet->mergeCells('D5:R5');
			$sheet->setCellValue('D7','REPORTE DE UDRA VS DIGITACIÓN');
			$sheet->mergeCells('D7:R7');
			$sheet->getStyle('D3:R7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$sheet->getStyle('D3:R7')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
			$sheet->getStyle('D3:R3')->getFont()->setname('Arial black')->setSize(16);
			$sheet->getStyle('D5:R7')->getFont()->setname('Arial')->setSize(16);

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


		// CABECERA
			// INICIO DE LA  cabecera
			$cab = 10;	
				
			// NOMBRE CABECERAS
	
					$sheet->setCellValue('B'.$cab,'N°');
					$sheet->mergeCells('B'.$cab.':B'.($cab+1));

					$sheet->setCellValue('C'.$cab,'SEDE' );
					$sheet->mergeCells('C'.$cab.':C'.($cab+1));
					$sheet->setCellValue('D'.$cab,'Departamento' );
					$sheet->mergeCells('D'.$cab.':D'.($cab+1));
					$sheet->setCellValue('E'.$cab,'Provincia' );
					$sheet->mergeCells('E'.$cab.':E'.($cab+1));


					$sheet->setCellValue('F'.$cab,'% Avance' );
					$sheet->mergeCells('F'.$cab.':F'.($cab+1));

					$sheet->setCellValue('G'.$cab, 'UDRA');
					$sheet->mergeCells('G'.$cab.':L'.$cab);	
						$sheet->setCellValue('G'.($cab+1), 'Total UDRA');
						$sheet->mergeCells('G'.($cab+1).':G'.($cab+1));
							$sheet->setCellValue('H'.($cab+1), 'Completa');
							$sheet->mergeCells('H'.($cab+1).':H'.($cab+1));
							$sheet->setCellValue('I'.($cab+1), 'Incompleta');
							$sheet->mergeCells('I'.($cab+1).':I'.($cab+1));
							$sheet->setCellValue('J'.($cab+1), 'Rechazo');
							$sheet->mergeCells('J'.($cab+1).':J'.($cab+1));
							$sheet->setCellValue('K'.($cab+1), 'Desocupada');
							$sheet->mergeCells('K'.($cab+1).':K'.($cab+1));
							$sheet->setCellValue('L'.($cab+1), 'Otro');
							$sheet->mergeCells('L'.($cab+1).':L'.($cab+1));
						$sheet->setCellValue('M'.$cab, 'DIGITACIÓN');
						$sheet->mergeCells('M'.$cab.':R'.$cab);
							$sheet->setCellValue('M'.($cab+1), 'Total Digitación');
							$sheet->mergeCells('M'.($cab+1).':M'.($cab+1));
							$sheet->setCellValue('N'.($cab+1), 'Completa');
							$sheet->mergeCells('N'.($cab+1).':N'.($cab+1));
							$sheet->setCellValue('O'.($cab+1), 'Incompleta');
							$sheet->mergeCells('O'.($cab+1).':O'.($cab+1));
							$sheet->setCellValue('P'.($cab+1), 'Rechazo');
							$sheet->mergeCells('P'.($cab+1).':P'.($cab+1));
							$sheet->setCellValue('Q'.($cab+1), 'Desocupada');
							$sheet->mergeCells('Q'.($cab+1).':Q'.($cab+1));
							$sheet->setCellValue('R'.($cab+1), 'Otro');
							$sheet->mergeCells('R'.($cab+1).':R'.($cab+1));
						
			// NOMBRE CABECERAS

			// ESTILOS  CABECERAS
				$sheet->getStyle("B".$cab.":R".($cab+1))->getAlignment()->setWrapText(true);// AJUSTA TEXTO A CELDA
				$sheet->getStyle("B".$cab.":R".($cab+1))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);						
				$sheet->getStyle("B".$cab.":R".($cab+1))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);						
				$sheet->getStyle("B".$cab.":R".($cab+1))->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
				$sheet->getStyle("B".$cab.":R".($cab+1))->getFont()->setname('Arial')->setSize(9);



		     	$headStyle = $this->phpexcel->getActiveSheet()->getStyle("B".$cab.":R".($cab+1));
				$headStyle->applyFromArray($color_celda_cabeceras);

				$sheet->getStyle("B".$cab.":R".($cab+1))->applyFromArray(array(
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
			
			$sheet->getStyle("A".($cab+2).":R".$total)->getFont()->setname('Arial Narrow')->setSize(9);

			//bordes cuerpo
			$sheet->getStyle("B".($cab+2).":R".$total)->applyFromArray(array(
			'borders' => array(
						'allborders' => array(
										'style' => PHPExcel_Style_Border::BORDER_THIN)
					)
			));

			// EXPORTACION A EXCEL
			$row = $cab+1;
			$col = 2;
			$num = 0;
			$cambio = FALSE;
			 foreach($query->result() as $filas){
			    $row ++;
			    $num ++;			    
			    $sheet->getCellByColumnAndRow(1, $row)->setValue($num);// para numerar los registros
			  		
			  		$sheet->getCellByColumnAndRow(2, $row)->setValue(utf8_encode(trim($filas->sede_operativa)));
			  		$sheet->getCellByColumnAndRow(3, $row)->setValue($filas->dpto_nombre);
			  		$sheet->getCellByColumnAndRow(4, $row)->setValue($filas->prov_nombre);
			  		$sheet->getCellByColumnAndRow(5, $row)->setValue($filas->avance);
			  		$sheet->getCellByColumnAndRow(6, $row)->setValue($filas->TU);
			  		$sheet->getCellByColumnAndRow(7, $row)->setValue($filas->ur1);
			  		$sheet->getCellByColumnAndRow(8, $row)->setValue($filas->ur2);
			  		$sheet->getCellByColumnAndRow(9, $row)->setValue($filas->ur3);
			  		$sheet->getCellByColumnAndRow(10, $row)->setValue($filas->ur4);
			  		$sheet->getCellByColumnAndRow(11, $row)->setValue($filas->ur5);
			  		$sheet->getCellByColumnAndRow(12, $row)->setValue($filas->Tf);
			  		$sheet->getCellByColumnAndRow(13, $row)->setValue($filas->Fr1);
			  		$sheet->getCellByColumnAndRow(14, $row)->setValue($filas->Fr2);
			  		$sheet->getCellByColumnAndRow(15, $row)->setValue($filas->Fr3);
			  		$sheet->getCellByColumnAndRow(16, $row)->setValue($filas->Fr4);
			  		$sheet->getCellByColumnAndRow(17, $row)->setValue($filas->Fr5);
				//}
				 $col = 2;
				 //dar formato de color intercalado a cada fila

				 if($cambio){
			     	$fila_color = $this->phpexcel->getActiveSheet()->getStyle("B".$row.":R".$row);
			        
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

				 $prov = $filas->prov_nombre;
				 $dpto = $filas->dpto_nombre;
		
				 if($prov=="-" && $dpto!="- TOTAL"){
			     	$fila_color = $this->phpexcel->getActiveSheet()->getStyle("B".$row.":R".$row);
			        
					$fila_color->applyFromArray(
					    array(
					        'fill' => array(
					            'type' => PHPExcel_Style_Fill::FILL_SOLID,
					            'color' => array('rgb' => 'CCFFFF')
					        )
					    )
					);			        
			        
				 }

				 				
			}

			$sheet->getStyle('B'.($cab+1).':R'.$total)->getAlignment()->setWrapText(true)->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

			$sheet->getStyle('D'.($cab+1).':R'.$total)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

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
				$sheet->setTitle("Reporte UDRA_VS_DIGITACION");
				$this->phpexcel->getProperties()
				->setTitle("Reporte UDRA_VS_DIGITACION")
				->setDescription("Reporte avance Udra vs Digitación");

			header("Content-Type: application/vnd.ms-excel");
			$nombreArchivo = 'UDRA_VS_DIGITACION_'.date('Y-m-d').'';
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