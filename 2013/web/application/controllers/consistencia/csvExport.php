<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Csvexport extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		$this->load->helper('form');
		$this->load->library('PHPExcel');
		$this->load->model('consistencia/reporte_model');
	}

	public function exp_avance_digitacion()
	{

		$fecha_min = $this->input->get('v_fxmin');
		// $fecha_max = $this->input->get('v_fxmax');
		$query = $this->reporte_model->get_avance_digitacion($fecha_min);

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
			$sheet->getColumnDimension('E')->setWidth(20);
			$sheet->getColumnDimension('F')->setWidth(23);
			$sheet->getColumnDimension('G')->setWidth(15);
			$sheet->getColumnDimension('H')->setWidth(30);
			$sheet->getColumnDimension('I')->setWidth(15);
			

			$sheet->getRowDimension(4)->setRowHeight(2);
			$sheet->getRowDimension(6)->setRowHeight(2);
		// ANCHO Y ALTURA DE COLUMNAS DEL FILE

		// TITULOS
			$sheet->setCellValue('D3','INSTITUTO NACIONAL DE ESTADÍSTICA E INFORMATICA');
			$sheet->mergeCells('D3:I3');
			$sheet->setCellValue('D5','CENSO DE INFRAESTRUCTURA EDUCATIVA 2013');
			$sheet->mergeCells('D5:I5');
			$sheet->setCellValue('D7','REPORTE DE AVANCE DE DIGITACION');
			$sheet->mergeCells('D7:I7');
			$sheet->getStyle('D3:I7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$sheet->getStyle('D3:I7')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
			$sheet->getStyle('D3:I3')->getFont()->setname('Arial black')->setSize(16);
			$sheet->getStyle('D5:I7')->getFont()->setname('Arial')->setSize(16);

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
					$sheet->setCellValue('B9','FECHA:');
					$sheet->mergeCells('B9:C9');

					$sheet->setCellValue('D9',$fecha_min);
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
					$sheet->mergeCells('B'.$cab.':B'.($cab+1));

					$sheet->setCellValue('C'.$cab,'DEPARTAMENTO' );
					$sheet->mergeCells('C'.$cab.':C'.($cab+1));
					$sheet->setCellValue('D'.$cab,'META' );
					$sheet->mergeCells('D'.$cab.':D'.($cab+1));

					$sheet->setCellValue('E'.$cab,'Número de Locales Escolares');
					$sheet->mergeCells('E'.$cab.':F'.$cab);
						$sheet->setCellValue('E'.($cab+1),'DIGITADO DIA');
						$sheet->mergeCells('E'.($cab+1).':E'.($cab+1));
						$sheet->setCellValue('F'.($cab+1),'DIGITADO ACUMULADO');
						$sheet->mergeCells('F'.($cab+1).':F'.($cab+1));

					$sheet->setCellValue('G'.$cab,'%');
					$sheet->mergeCells('G'.$cab.':G'.$cab);
						$sheet->setCellValue('G'.($cab+1),'AVANCE');
						$sheet->mergeCells('G'.($cab+1).':G'.($cab+1));
						
					$sheet->setCellValue('H'.$cab,'Número de Cédulas Faltantes');
					$sheet->mergeCells('H'.$cab.':H'.$cab);
						$sheet->setCellValue('H'.($cab+1),'FALTA DIGITAR');
						$sheet->mergeCells('H'.($cab+1).':H'.($cab+1));

					$sheet->setCellValue('I'.$cab,'%');
					$sheet->mergeCells('I'.$cab.':I'.$cab);
						$sheet->setCellValue('I'.($cab+1),'AVANCE');
						$sheet->mergeCells('I'.($cab+1).':I'.($cab+1));


					// $sheet->setCellValue('G'.$cab, 'Instituciones Educativas según Resultado');
					// $sheet->mergeCells('G'.$cab.':P'.$cab);	
					// 	$sheet->setCellValue('G'.($cab+1), 'Completa');
					// 	$sheet->mergeCells('G'.($cab+1).':H'.($cab+1));
					// 		$sheet->setCellValue('G'.($cab+2), 'Abs');
					// 		$sheet->mergeCells('G'.($cab+2).':G'.($cab+2));
					// 		$sheet->setCellValue('H'.($cab+2), '%');
					// 		$sheet->mergeCells('H'.($cab+2).':H'.($cab+2));
					// 	$sheet->setCellValue('I'.($cab+1), 'Incompleta');
					// 	$sheet->mergeCells('I'.($cab+1).':J'.($cab+1));
					// 		$sheet->setCellValue('I'.($cab+2), 'Abs');
					// 		$sheet->mergeCells('I'.($cab+2).':I'.($cab+2));
					// 		$sheet->setCellValue('J'.($cab+2), '%');
					// 		$sheet->mergeCells('J'.($cab+2).':J'.($cab+2));
					// 	$sheet->setCellValue('K'.($cab+1), 'Rechazo');
					// 	$sheet->mergeCells('K'.($cab+1).':L'.($cab+1));
					// 		$sheet->setCellValue('K'.($cab+2), 'Abs');
					// 		$sheet->mergeCells('K'.($cab+2).':K'.($cab+2));
					// 		$sheet->setCellValue('L'.($cab+2), '%');
					// 		$sheet->mergeCells('L'.($cab+2).':L'.($cab+2));
					// 	$sheet->setCellValue('M'.($cab+1), 'Desocupada');
					// 	$sheet->mergeCells('M'.($cab+1).':N'.($cab+1));
					// 		$sheet->setCellValue('M'.($cab+2), 'Abs');
					// 		$sheet->mergeCells('M'.($cab+2).':M'.($cab+2));
					// 		$sheet->setCellValue('N'.($cab+2), '%');
					// 		$sheet->mergeCells('N'.($cab+2).':N'.($cab+2));
					// 	$sheet->setCellValue('O'.($cab+1), 'Otro');
					// 	$sheet->mergeCells('O'.($cab+1).':P'.($cab+1));
					// 		$sheet->setCellValue('O'.($cab+2), 'Abs');
					// 		$sheet->mergeCells('O'.($cab+2).':O'.($cab+2));
					// 		$sheet->setCellValue('P'.($cab+2), '%');
					// 		$sheet->mergeCells('P'.($cab+2).':P'.($cab+2));
			// NOMBRE CABECERAS

			// ESTILOS  CABECERAS
				$sheet->getStyle("B".$cab.":I".($cab+1))->getAlignment()->setWrapText(true);// AJUSTA TEXTO A CELDA
				$sheet->getStyle("B".$cab.":I".($cab+1))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);						
				$sheet->getStyle("B".$cab.":I".($cab+1))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);						
				$sheet->getStyle("B".$cab.":I".($cab+1))->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
				$sheet->getStyle("B".$cab.":I".($cab+1))->getFont()->setname('Arial')->setSize(9);



		     	$headStyle = $this->phpexcel->getActiveSheet()->getStyle("B".$cab.":I".($cab+1));
				$headStyle->applyFromArray($color_celda_cabeceras);

				$sheet->getStyle("B".$cab.":I".($cab+1))->applyFromArray(array(
				'borders' => array(
							'allborders' => array(
											'style' => PHPExcel_Style_Border::BORDER_THIN)
						)
				));
				// $sheet->getStyle('K16')->getFont()->setname('Arial Narrow')->setSize(9); // tamaño especial para esta celda
			// ESTILOS  CABECERAS
		// CABECERA

	    // CUERPO
			$total = $query->num_rows()+ ($cab+1);
			
			$sheet->getStyle("A".($cab+2).":I".$total)->getFont()->setname('Arial')->setSize(9);

			//bordes cuerpo
			$sheet->getStyle("B".($cab+2).":I".$total)->applyFromArray(array(
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
			  		
			  		$sheet->getCellByColumnAndRow(2, $row)->setValue(utf8_encode(trim($filas->Sede_Operativa)));
			  		$sheet->getCellByColumnAndRow(3, $row)->setValue($filas->Meta);
			  		$sheet->getCellByColumnAndRow(4, $row)->setValue($filas->Digit_Dia);
			  		$sheet->getCellByColumnAndRow(5, $row)->setValue($filas->Digit_Acum);
			  		$sheet->getCellByColumnAndRow(6, $row)->setValue($filas->Avance1);
			  		$sheet->getCellByColumnAndRow(7, $row)->setValue($filas->Falta_Dig);
			  		$sheet->getCellByColumnAndRow(8, $row)->setValue($filas->Avance2);
				//}
				 $col = 2;
				 //dar formato de color intercalado a cada fila
				 if($cambio){
			     	$fila_color = $this->phpexcel->getActiveSheet()->getStyle("B".$row.":I".$row);
			        
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

			$sheet->getStyle('B'.($cab+2).':I'.$total)->getAlignment()->setWrapText(true)->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

			$sheet->getStyle('D'.($cab+2).':I'.$total)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

 		// CUERPO

		// PIE TOTALES
			$celda_s = $total+1 ; // inicio de pie de resumenes

			$sheet->setCellValue('B'.$celda_s,'TOTALES');
			$sheet->mergeCells('B'.$celda_s.':C'.$celda_s);
			// $sheet->mergeCells('H'.$celda_s.':Q'.$celda_s);
			
			$inicio_s = $cab+2 ; // inicio suma  de resumenes	
			$fin_s = $total ; // fin suma de resumenes	

			$sheet->setCellValue('D'. $celda_s ,'=SUM(D'.$inicio_s.':D'.$fin_s.')');
			$sheet->setCellValue('E'. $celda_s ,'=SUM(E'.$inicio_s.':E'.$fin_s.')');
			$sheet->setCellValue('F'. $celda_s ,'=SUM(F'.$inicio_s.':F'.$fin_s.')');
			$sheet->setCellValue('G'. $celda_s ,'=ROUND((F'.$celda_s.'*100/(D'.$celda_s.'-F'.$celda_s.')),2)');
			$sheet->setCellValue('H'. $celda_s ,'=SUM(H'.$inicio_s.':H'.$fin_s.')');
			$sheet->setCellValue('I'. $celda_s ,'=ROUND((H'.$celda_s.'*100/D'.$celda_s.'),2)');

			$sheet->getStyle('B'.$celda_s)->applyFromArray($color_celda_cabeceras);
	     	$sheet->getStyle('B'.$celda_s.':I'.$celda_s)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
			$sheet->getStyle('B'.$celda_s)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
			// $sheet->getStyle('G'. $celda_s)->getNumberFormat()->setFormatCode('#,##0.00');
			$sheet->getStyle('B'.$celda_s.':I'.$celda_s)->applyFromArray(array(
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
				$sheet->setTitle("Reporte Avance Digitacion");
				$this->phpexcel->getProperties()
				->setTitle("Reporte Avance Digitacion")
				->setDescription("Reporte de Avande de Digitacion");

			header("Content-Type: application/vnd.ms-excel");
			$nombreArchivo = 'Reporte_Avance_Digitacion_'.date('Y-m-d');
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