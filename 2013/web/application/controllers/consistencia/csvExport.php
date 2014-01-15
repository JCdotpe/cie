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

		$query = $this->reporte_model->get_avance_digitacion();

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
			$sheet->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);// vertical
			$sheet->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
			$sheet->getPageSetup()->setFitToPage(false); // ajustar pagina
			$sheet->getPageSetup()->setFitToWidth(1);
			$sheet->getPageSetup()->setFitToHeight(0);		
		// formato de la hoja

		// ANCHO Y ALTURA DE COLUMNAS DEL FILE
			$sheet->getColumnDimension('A')->setWidth(1);
			$sheet->getColumnDimension('B')->setWidth(5);
			$sheet->getColumnDimension('C')->setWidth(22);
			$sheet->getColumnDimension('D')->setWidth(18);
			$sheet->getColumnDimension('E')->setWidth(30);
			$sheet->getColumnDimension('F')->setWidth(25);
						

			$sheet->getRowDimension(4)->setRowHeight(2);
			$sheet->getRowDimension(6)->setRowHeight(2);
		// ANCHO Y ALTURA DE COLUMNAS DEL FILE

		// TITULOS
			$sheet->setCellValue('D3','INSTITUTO NACIONAL DE ESTADÍSTICA E INFORMATICA');
			$sheet->mergeCells('D3:F3');
			$sheet->setCellValue('D5','CENSO DE INFRAESTRUCTURA EDUCATIVA 2013');
			$sheet->mergeCells('D5:F5');
			$sheet->setCellValue('D7','REPORTE DE AVANCE DE PROCESAMIENTO');
			$sheet->mergeCells('D7:F7');
			$sheet->getStyle('D3:F7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$sheet->getStyle('D3:F7')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
			$sheet->getStyle('D3:F3')->getFont()->setname('Arial black')->setSize(12);
			$sheet->getStyle('D5:F7')->getFont()->setname('Arial')->setSize(12);

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

					$sheet->setCellValue('D9',date('d/m/Y'));
					$sheet->mergeCells('D9:D9');

					$sheet->getStyle('D9:C9')->getFont()->setname('Arial')->setSize(12);
					$sheet->getStyle("D9:C9")->getAlignment()->setWrapText(true);// AJUSTA TEXTO A CELDA

			     	$sheet->getStyle("B9:C9")->applyFromArray($color_celda_cabeceras);

			     	$sheet->getStyle("B9:E9")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
					$sheet->getStyle("B9:C9")->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);

					$sheet->getStyle("B9:D9")->applyFromArray(array(
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
					$sheet->mergeCells('E'.$cab.':E'.$cab);
						$sheet->setCellValue('E'.($cab+1),'DIGITADO');
						$sheet->mergeCells('E'.($cab+1).':E'.($cab+1));

					$sheet->setCellValue('F'.$cab,'%');
					$sheet->mergeCells('F'.$cab.':F'.$cab);
						$sheet->setCellValue('F'.($cab+1),'AVANCE');
						$sheet->mergeCells('F'.($cab+1).':F'.($cab+1));
			// NOMBRE CABECERAS

			// ESTILOS  CABECERAS
				$sheet->getStyle("B".$cab.":F".($cab+1))->getAlignment()->setWrapText(true);// AJUSTA TEXTO A CELDA
				$sheet->getStyle("B".$cab.":F".($cab+1))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);						
				$sheet->getStyle("B".$cab.":F".($cab+1))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);						
				$sheet->getStyle("B".$cab.":F".($cab+1))->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
				$sheet->getStyle("B".$cab.":F".($cab+1))->getFont()->setname('Arial')->setSize(9);



		     	$headStyle = $this->phpexcel->getActiveSheet()->getStyle("B".$cab.":F".($cab+1));
				$headStyle->applyFromArray($color_celda_cabeceras);

				$sheet->getStyle("B".$cab.":F".($cab+1))->applyFromArray(array(
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
			
			$sheet->getStyle("A".($cab+2).":F".$total)->getFont()->setname('Arial')->setSize(9);

			//bordes cuerpo
			$sheet->getStyle("B".($cab+2).":F".$total)->applyFromArray(array(
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
			  		
			  		$sheet->getCellByColumnAndRow(2, $row)->setValue(utf8_encode(trim($filas->Departamento)));
			  		$sheet->getCellByColumnAndRow(3, $row)->setValue($filas->Meta);
			  		$sheet->getCellByColumnAndRow(4, $row)->setValue($filas->Digitado);
			  		$sheet->getCellByColumnAndRow(5, $row)->setValue($filas->Avance);
				//}
				 $col = 2;
				 //dar formato de color intercalado a cada fila
				 if($cambio){
			     	$fila_color = $this->phpexcel->getActiveSheet()->getStyle("B".$row.":F".$row);
			        
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

			$sheet->getStyle('B'.($cab+2).':F'.$total)->getAlignment()->setWrapText(true)->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

			$sheet->getStyle('D'.($cab+2).':F'.$total)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

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
			$sheet->setCellValue('F'. $celda_s ,'=ROUND((E'.$celda_s.'/D'.$celda_s.')*100,2)');
			

			$sheet->getStyle('B'.$celda_s)->applyFromArray($color_celda_cabeceras);
	     	$sheet->getStyle('B'.$celda_s.':F'.$celda_s)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
			$sheet->getStyle('B'.$celda_s)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
			// $sheet->getStyle('G'. $celda_s)->getNumberFormat()->setFormatCode('#,##0.00');
			$sheet->getStyle('B'.$celda_s.':F'.$celda_s)->applyFromArray(array(
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
				$sheet->setTitle("Reporte Avance Procesamiento");
				$this->phpexcel->getProperties()
				->setTitle("Reporte Avance Procesamiento")
				->setDescription("Reporte de Avande de Procesamiento");

			header("Content-Type: application/vnd.ms-excel");
			$nombreArchivo = 'Reporte_Avance_Procesamiento_'.date('Y-m-d');
			header("Content-Disposition: attachment; filename=\"$nombreArchivo.xls\""); //EXCEL
			header("Cache-Control: max-age=0");
			
			// Genera Excel
			$writer = PHPExcel_IOFactory::createWriter($this->phpexcel, "Excel5");

			$writer->save('php://output');
			exit;
		// SALIDA EXCEL
	}


	public function exp_avance_digitacion_userdig()
	{

		$query = $this->reporte_model->get_avance_digitacion_userdig();

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
			$sheet->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);// vertical
			$sheet->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
			$sheet->getPageSetup()->setFitToPage(false); // ajustar pagina
			$sheet->getPageSetup()->setFitToWidth(1);
			$sheet->getPageSetup()->setFitToHeight(0);		
		// formato de la hoja

		// ANCHO Y ALTURA DE COLUMNAS DEL FILE
			$sheet->getColumnDimension('A')->setWidth(1);
			$sheet->getColumnDimension('B')->setWidth(5);
			$sheet->getColumnDimension('C')->setWidth(18);
			$sheet->getColumnDimension('D')->setWidth(18);
			$sheet->getColumnDimension('E')->setWidth(18);
			$sheet->getColumnDimension('F')->setWidth(18);
			$sheet->getColumnDimension('G')->setWidth(18);
			$sheet->getColumnDimension('H')->setWidth(18);
			$sheet->getColumnDimension('I')->setWidth(18);
			$sheet->getColumnDimension('J')->setWidth(18);
			$sheet->getColumnDimension('K')->setWidth(18);


			$sheet->getRowDimension(4)->setRowHeight(2);
			$sheet->getRowDimension(6)->setRowHeight(2);
		// ANCHO Y ALTURA DE COLUMNAS DEL FILE

		// TITULOS
			$sheet->setCellValue('D3','INSTITUTO NACIONAL DE ESTADÍSTICA E INFORMATICA');
			$sheet->mergeCells('D3:K3');
			$sheet->setCellValue('D5','CENSO DE INFRAESTRUCTURA EDUCATIVA 2013');
			$sheet->mergeCells('D5:K5');
			$sheet->setCellValue('D7','REPORTE DE AVANCE DE PROCESAMIENTO POR DIGITADOR');
			$sheet->mergeCells('D7:K7');
			$sheet->getStyle('D3:K7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$sheet->getStyle('D3:K7')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
			$sheet->getStyle('D3:K3')->getFont()->setname('Arial black')->setSize(16);
			$sheet->getStyle('D5:K7')->getFont()->setname('Arial')->setSize(16);

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

					$sheet->setCellValue('D9',date('d/m/Y'));
					$sheet->mergeCells('D9:D9');

					$sheet->getStyle('D9:C9')->getFont()->setname('Arial')->setSize(12);
					$sheet->getStyle("D9:C9")->getAlignment()->setWrapText(true);// AJUSTA TEXTO A CELDA

			     	$sheet->getStyle("B9:C9")->applyFromArray($color_celda_cabeceras);

			     	$sheet->getStyle("B9:E9")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
					$sheet->getStyle("B9:C9")->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);

					$sheet->getStyle("B9:D9")->applyFromArray(array(
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

					$sheet->setCellValue('C'.$cab,'USUARIO' );
					$sheet->mergeCells('C'.$cab.':C'.($cab+1));
					$sheet->setCellValue('D'.$cab,'CANTIDAD DE LOCALES' );
					$sheet->mergeCells('D'.$cab.':D'.($cab+1));
					$sheet->setCellValue('E'.$cab,'% LOCALES DIGITADOS' );
					$sheet->mergeCells('E'.$cab.':E'.($cab+1));

					$sheet->setCellValue('F'.$cab,'CANTIDAD DE PREDIOS');
					$sheet->mergeCells('F'.$cab.':F'.($cab+1));
						// $sheet->setCellValue('F'.($cab+1),'DIGITADO');
						// $sheet->mergeCells('F'.($cab+1).':F'.($cab+1));
					$sheet->setCellValue('G'.$cab,'% CANTIDAD DE PREDIOS');
					$sheet->mergeCells('G'.$cab.':G'.($cab+1));

					$sheet->setCellValue('H'.$cab,'CANTIDAD DE EDIFICACIONES');
					$sheet->mergeCells('H'.$cab.':H'.($cab+1));
					$sheet->setCellValue('I'.$cab,'% CANTIDAD DE EDIFICACIONES');
					$sheet->mergeCells('I'.$cab.':I'.($cab+1));

					$sheet->setCellValue('J'.$cab,'CANTIDAD DE AMBIENTES');
					$sheet->mergeCells('J'.$cab.':J'.($cab+1));
					$sheet->setCellValue('K'.$cab,'% CANTIDAD DE AMBIENTES');
					$sheet->mergeCells('K'.$cab.':K'.($cab+1));
						
			// NOMBRE CABECERAS

			// ESTILOS  CABECERAS
				$sheet->getStyle("B".$cab.":K".($cab+1))->getAlignment()->setWrapText(true);// AJUSTA TEXTO A CELDA
				$sheet->getStyle("B".$cab.":K".($cab+1))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);						
				$sheet->getStyle("B".$cab.":K".($cab+1))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);						
				$sheet->getStyle("B".$cab.":K".($cab+1))->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
				$sheet->getStyle("B".$cab.":K".($cab+1))->getFont()->setname('Arial')->setSize(9);



		     	$headStyle = $this->phpexcel->getActiveSheet()->getStyle("B".$cab.":K".($cab+1));
				$headStyle->applyFromArray($color_celda_cabeceras);

				$sheet->getStyle("B".$cab.":K".($cab+1))->applyFromArray(array(
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
			
			$sheet->getStyle("A".($cab+2).":K".$total)->getFont()->setname('Arial')->setSize(9);

			//bordes cuerpo
			$sheet->getStyle("B".($cab+2).":K".$total)->applyFromArray(array(
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

			$t_local = 0;
			$t_predio = 0;
			$t_edif = 0;
			$t_amb = 0;

			foreach ($query->result() as $value) {
				$t_local += $value->c_local;
				$t_predio += $value->c_predio;
				$t_edif += $value->c_edifica;
				$t_amb += $value->c_ambient;
			}

			 foreach($query->result() as $filas){
			    $row ++;
			    $num ++;			    
			    $sheet->getCellByColumnAndRow(1, $row)->setValue($num);// para numerar los registros
			  		
			  		$sheet->getCellByColumnAndRow(2, $row)->setValue($filas->user_id);
			  		
			  		$sheet->getCellByColumnAndRow(3, $row)->setValue($filas->c_local);
			  		$prc_local = ($t_local > 0) ? ($filas->c_local * 100) / $t_local : 0;
			  		$sheet->getCellByColumnAndRow(4, $row)->setValue(round($prc_local,2));

			  		$sheet->getCellByColumnAndRow(5, $row)->setValue($filas->c_predio);
			  		$prc_predio = ($t_predio > 0) ? ($filas->c_predio * 100) / $t_predio : 0;
			  		$sheet->getCellByColumnAndRow(6, $row)->setValue(round($prc_predio,2));

			  		$sheet->getCellByColumnAndRow(7, $row)->setValue($filas->c_edifica);
			  		$prc_edifica = ($t_edif > 0) ? ($filas->c_edifica * 100) / $t_edif : 0;
			  		$sheet->getCellByColumnAndRow(8, $row)->setValue(round($prc_edifica,2));

			  		$sheet->getCellByColumnAndRow(9, $row)->setValue($filas->c_ambient);
			  		$prc_ambient = ($t_amb > 0) ? ($filas->c_ambient * 100) / $t_amb : 0;
			  		$sheet->getCellByColumnAndRow(10, $row)->setValue(round($prc_ambient,2));
				//}
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

			$sheet->getStyle('B'.($cab+2).':K'.$total)->getAlignment()->setWrapText(true)->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			// $sheet->getStyle('C'.($cab+2).':K'.$total)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

 		// CUERPO

		// PIE TOTALES
			$celda_s = $total+1 ; // inicio de pie de resumenes

			$sheet->setCellValue('B'.$celda_s,'TOTALES');
			$sheet->mergeCells('B'.$celda_s.':C'.$celda_s);
			// $sheet->mergeCells('H'.$celda_s.':Q'.$celda_s);
			
			$inicio_s = $cab+2 ; // inicio suma  de resumenes	
			$fin_s = $total ; // fin suma de resumenes	

			$sheet->setCellValue('D'. $celda_s ,'=SUM(D'.$inicio_s.':D'.$fin_s.')');
			$sheet->setCellValue('E'. $celda_s ,'=ROUND(SUM(E'.$inicio_s.':E'.$fin_s.'),0)');
			$sheet->setCellValue('F'. $celda_s ,'=SUM(F'.$inicio_s.':F'.$fin_s.')');
			$sheet->setCellValue('G'. $celda_s ,'=ROUND(SUM(G'.$inicio_s.':G'.$fin_s.'),0)');
			$sheet->setCellValue('H'. $celda_s ,'=SUM(H'.$inicio_s.':H'.$fin_s.')');
			$sheet->setCellValue('I'. $celda_s ,'=ROUND(SUM(I'.$inicio_s.':I'.$fin_s.'),0)');
			$sheet->setCellValue('J'. $celda_s ,'=SUM(J'.$inicio_s.':J'.$fin_s.')');
			$sheet->setCellValue('K'. $celda_s ,'=ROUND(SUM(K'.$inicio_s.':K'.$fin_s.'),0)');
			
			

			$sheet->getStyle('B'.$celda_s)->applyFromArray($color_celda_cabeceras);
	     	$sheet->getStyle('B'.$celda_s.':K'.$celda_s)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
			$sheet->getStyle('B'.$celda_s)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
			
			$sheet->getStyle('B'.$celda_s.':K'.$celda_s)->applyFromArray(array(
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
				$sheet->setTitle("Avance por Digitador");
				$this->phpexcel->getProperties()
				->setTitle("Rpt Avnc Procesamiento")
				->setDescription("Reporte de Avande de Procesamiento por Digitador");

			header("Content-Type: application/vnd.ms-excel");
			$nombreArchivo = 'Reporte_Avance_Procesamiento_Digitador'.date('Y-m-d');
			header("Content-Disposition: attachment; filename=\"$nombreArchivo.xls\""); //EXCEL
			header("Cache-Control: max-age=0");
			
			// Genera Excel
			$writer = PHPExcel_IOFactory::createWriter($this->phpexcel, "Excel5");

			$writer->save('php://output');
			exit;
		// SALIDA EXCEL
	}


	public function exp_estado_situacional()
	{

		$query = $this->reporte_model->get_estado_situacional();

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
			$sheet->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);// vertical
			$sheet->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
			$sheet->getPageSetup()->setFitToPage(false); // ajustar pagina
			$sheet->getPageSetup()->setFitToWidth(1);
			$sheet->getPageSetup()->setFitToHeight(0);		
		// formato de la hoja

		// ANCHO Y ALTURA DE COLUMNAS DEL FILE
			$sheet->getColumnDimension('A')->setWidth(1);
			$sheet->getColumnDimension('B')->setWidth(5);
			$sheet->getColumnDimension('C')->setWidth(22);
			$sheet->getColumnDimension('D')->setWidth(10);
			$sheet->getColumnDimension('E')->setWidth(10);
			$sheet->getColumnDimension('F')->setWidth(10);
			$sheet->getColumnDimension('G')->setWidth(10);
			$sheet->getColumnDimension('H')->setWidth(10);
			$sheet->getColumnDimension('I')->setWidth(10);
			$sheet->getColumnDimension('J')->setWidth(10);
			$sheet->getColumnDimension('K')->setWidth(10);
			$sheet->getColumnDimension('L')->setWidth(10);
			$sheet->getColumnDimension('M')->setWidth(10);


			$sheet->getRowDimension(4)->setRowHeight(2);
			$sheet->getRowDimension(6)->setRowHeight(2);
		// ANCHO Y ALTURA DE COLUMNAS DEL FILE

		// TITULOS
			$sheet->setCellValue('D3','INSTITUTO NACIONAL DE ESTADÍSTICA E INFORMATICA');
			$sheet->mergeCells('D3:M3');
			$sheet->setCellValue('D5','CENSO DE INFRAESTRUCTURA EDUCATIVA 2013');
			$sheet->mergeCells('D5:M5');
			$sheet->setCellValue('D7','REPORTE DE ESTADO SITUACIONAL');
			$sheet->mergeCells('D7:M7');
			$sheet->getStyle('D3:M7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$sheet->getStyle('D3:M7')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
			$sheet->getStyle('D3:M3')->getFont()->setname('Arial black')->setSize(16);
			$sheet->getStyle('D5:M7')->getFont()->setname('Arial')->setSize(16);

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

					$sheet->setCellValue('D9',date('d/m/Y'));
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

					$sheet->setCellValue('D'.$cab,'TOTAL' );
					$sheet->mergeCells('D'.$cab.':F'.$cab);
						$sheet->setCellValue('D'.($cab+1),'Meta');
						$sheet->mergeCells('D'.($cab+1).':D'.($cab+1));
						$sheet->setCellValue('E'.($cab+1),'En BD');
						$sheet->mergeCells('E'.($cab+1).':E'.($cab+1));
						$sheet->setCellValue('F'.($cab+1),'Avance %');
						$sheet->mergeCells('F'.($cab+1).':F'.($cab+1));

					$sheet->setCellValue('G'.$cab,'TABLET');
					$sheet->mergeCells('G'.$cab.':I'.$cab);
						$sheet->setCellValue('G'.($cab+1),'Meta');
						$sheet->mergeCells('G'.($cab+1).':G'.($cab+1));
						$sheet->setCellValue('H'.($cab+1),'Procesado');
						$sheet->mergeCells('H'.($cab+1).':H'.($cab+1));
						$sheet->setCellValue('I'.($cab+1),'Avance %');
						$sheet->mergeCells('I'.($cab+1).':I'.($cab+1));

					$sheet->setCellValue('J'.$cab,'OTIN');
					$sheet->mergeCells('J'.$cab.':M'.$cab);
						$sheet->setCellValue('J'.($cab+1),'Meta');
						$sheet->mergeCells('J'.($cab+1).':J'.($cab+1));
						$sheet->setCellValue('K'.($cab+1),'UDRA');
						$sheet->mergeCells('K'.($cab+1).':K'.($cab+1));
						$sheet->setCellValue('L'.($cab+1),'Procesado');
						$sheet->mergeCells('L'.($cab+1).':L'.($cab+1));
						$sheet->setCellValue('M'.($cab+1),'Avance %');
						$sheet->mergeCells('M'.($cab+1).':M'.($cab+1));
			// NOMBRE CABECERAS

			// ESTILOS  CABECERAS
				$sheet->getStyle("B".$cab.":M".($cab+1))->getAlignment()->setWrapText(true);// AJUSTA TEXTO A CELDA
				$sheet->getStyle("B".$cab.":M".($cab+1))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);						
				$sheet->getStyle("B".$cab.":M".($cab+1))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);						
				$sheet->getStyle("B".$cab.":M".($cab+1))->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
				$sheet->getStyle("B".$cab.":M".($cab+1))->getFont()->setname('Arial')->setSize(9);



		     	$headStyle = $this->phpexcel->getActiveSheet()->getStyle("B".$cab.":M".($cab+1));
				$headStyle->applyFromArray($color_celda_cabeceras);

				$sheet->getStyle("B".$cab.":M".($cab+1))->applyFromArray(array(
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
			
			$sheet->getStyle("A".($cab+2).":M".$total)->getFont()->setname('Arial')->setSize(9);

			//bordes cuerpo
			$sheet->getStyle("B".($cab+2).":M".$total)->applyFromArray(array(
			'borders' => array(
						'allborders' => array(
										'style' => PHPExcel_Style_Border::BORDER_THIN)
					)
			));

			// EXPORTACION A EXCEL
			$row = $cab+1;
			$col = 2;
			// $num = 0;
			$cambio = FALSE;
			 foreach($query->result() as $filas){
			    $row ++;
			    // $num ++;
			    $sheet->getCellByColumnAndRow(1, $row)->setValue($filas->cod_dpto);
		  		$sheet->getCellByColumnAndRow(2, $row)->setValue(utf8_encode(trim($filas->Dpto)));
		  		$sheet->getCellByColumnAndRow(3, $row)->setValue($filas->Total_Meta);
		  		$sheet->getCellByColumnAndRow(4, $row)->setValue($filas->Total_Cant);
		  		$sheet->getCellByColumnAndRow(5, $row)->setValue($filas->Total_Porc);
		  		$sheet->getCellByColumnAndRow(6, $row)->setValue($filas->Tablet_Meta);
		  		$sheet->getCellByColumnAndRow(7, $row)->setValue($filas->Tablet_Cant);
		  		$sheet->getCellByColumnAndRow(8, $row)->setValue($filas->Tablet_Porc);
		  		$sheet->getCellByColumnAndRow(9, $row)->setValue($filas->OTIN_Meta);
		  		$sheet->getCellByColumnAndRow(10, $row)->setValue($filas->OTIN_Udra);
		  		$sheet->getCellByColumnAndRow(11, $row)->setValue($filas->OTIN_Cant);
		  		$sheet->getCellByColumnAndRow(12, $row)->setValue($filas->OTIN_Porc);
				//}
				 $col = 2;
				 //dar formato de color intercalado a cada fila
				 if($cambio){
			     	$fila_color = $this->phpexcel->getActiveSheet()->getStyle("B".$row.":M".$row);
			        
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

			$sheet->getStyle('B'.($cab+2).':M'.$total)->getAlignment()->setWrapText(true)->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

			// $sheet->getStyle('D'.($cab+2).':F'.$total)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

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
			$sheet->setCellValue('F'. $celda_s ,'=(E'.$celda_s.'/D'.$celda_s.')*100');

			$sheet->setCellValue('G'. $celda_s ,'=SUM(G'.$inicio_s.':G'.$fin_s.')');
			$sheet->setCellValue('H'. $celda_s ,'=SUM(H'.$inicio_s.':H'.$fin_s.')');
			$sheet->setCellValue('I'. $celda_s ,'=(H'.$celda_s.'/D'.$celda_s.')*100');

			$sheet->setCellValue('J'. $celda_s ,'=SUM(J'.$inicio_s.':J'.$fin_s.')');
			$sheet->setCellValue('K'. $celda_s ,'=SUM(K'.$inicio_s.':K'.$fin_s.')');
			$sheet->setCellValue('L'. $celda_s ,'=SUM(L'.$inicio_s.':L'.$fin_s.')');
			$sheet->setCellValue('M'. $celda_s ,'=(L'.$celda_s.'/D'.$celda_s.')*100');
			

			$sheet->getStyle('B'.$celda_s)->applyFromArray($color_celda_cabeceras);
	     	$sheet->getStyle('B'.$celda_s.':M'.$celda_s)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
			$sheet->getStyle('B'.$celda_s)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
			
			
			$sheet->getStyle('F'. $celda_s)->getNumberFormat()->setFormatCode('#,##0.0');
			$sheet->getStyle('I'. $celda_s)->getNumberFormat()->setFormatCode('#,##0.0');
			$sheet->getStyle('M'. $celda_s)->getNumberFormat()->setFormatCode('#,##0.0');
			

			$sheet->getStyle('B'.$celda_s.':M'.$celda_s)->applyFromArray(array(
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
				$sheet->setTitle("Reporte Estado Situacional");
				$this->phpexcel->getProperties()
				->setTitle("Reporte Estado Situacional")
				->setDescription("Reporte de Estado Situacional");

			header("Content-Type: application/vnd.ms-excel");
			$nombreArchivo = 'Reporte_Estado_Situacional_'.date('Y-m-d');
			header("Content-Disposition: attachment; filename=\"$nombreArchivo.xls\""); //EXCEL
			header("Cache-Control: max-age=0");
			
			// Genera Excel
			$writer = PHPExcel_IOFactory::createWriter($this->phpexcel, "Excel5");

			$writer->save('php://output');
			exit;
		// SALIDA EXCEL
	}

	public function exp_cobertura_otin()
	{

		$query = $this->reporte_model->get_cobertura_otin();

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
			$sheet->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);// vertical
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
			$sheet->getColumnDimension('E')->setWidth(22);
			$sheet->getColumnDimension('F')->setWidth(22);
			$sheet->getColumnDimension('G')->setWidth(22);
			$sheet->getColumnDimension('H')->setWidth(15);
			$sheet->getColumnDimension('I')->setWidth(15);
						

			$sheet->getRowDimension(4)->setRowHeight(2);
			$sheet->getRowDimension(6)->setRowHeight(2);
		// ANCHO Y ALTURA DE COLUMNAS DEL FILE

		// TITULOS
			$sheet->setCellValue('D3','INSTITUTO NACIONAL DE ESTADÍSTICA E INFORMATICA');
			$sheet->mergeCells('D3:I3');
			$sheet->setCellValue('D5','CENSO DE INFRAESTRUCTURA EDUCATIVA 2013');
			$sheet->mergeCells('D5:I5');
			$sheet->setCellValue('D7','REPORTE DE COBERTURA DE OTIN');
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

					$sheet->setCellValue('D9',date('d/m/Y'));
					$sheet->mergeCells('D9:D9');

					$sheet->getStyle('D9:C9')->getFont()->setname('Arial')->setSize(12);
					$sheet->getStyle("D9:C9")->getAlignment()->setWrapText(true);// AJUSTA TEXTO A CELDA

			     	$sheet->getStyle("B9:C9")->applyFromArray($color_celda_cabeceras);

			     	$sheet->getStyle("B9:E9")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);	
					$sheet->getStyle("B9:C9")->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);

					$sheet->getStyle("B9:D9")->applyFromArray(array(
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

					$sheet->setCellValue('C'.$cab,'SEDE OPERATIVA' );
					$sheet->mergeCells('C'.$cab.':C'.($cab+1));
					$sheet->setCellValue('D'.$cab,'PROVINCIA OPERATIVA' );
					$sheet->mergeCells('D'.$cab.':D'.($cab+1));
					$sheet->setCellValue('E'.$cab,'DEPARTAMENTO');
					$sheet->mergeCells('E'.$cab.':E'.($cab+1));
					$sheet->setCellValue('F'.$cab,'PROVINCIA');
					$sheet->mergeCells('F'.$cab.':F'.($cab+1));
					$sheet->setCellValue('G'.$cab,'DISTRITO');
					$sheet->mergeCells('G'.$cab.':G'.($cab+1));
					$sheet->setCellValue('H'.$cab,'CODIGO DE LOCAL');
					$sheet->mergeCells('H'.$cab.':H'.($cab+1));
					$sheet->setCellValue('I'.$cab,'DIGITADO');
					$sheet->mergeCells('I'.$cab.':I'.($cab+1));
						
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
			  		$sheet->getCellByColumnAndRow(3, $row)->setValue(utf8_encode(trim($filas->Provincia_Operativa)));
			  		$sheet->getCellByColumnAndRow(4, $row)->setValue(utf8_encode(trim($filas->Departamento)));
			  		$sheet->getCellByColumnAndRow(5, $row)->setValue(utf8_encode(trim($filas->Provincia)));
			  		$sheet->getCellByColumnAndRow(6, $row)->setValue(utf8_encode(trim($filas->Distrito)));
			  		$sheet->getCellByColumnAndRow(7, $row)->setValueExplicit($filas->codigo_de_local,PHPExcel_Cell_DataType::TYPE_STRING);
			  		$sheet->getCellByColumnAndRow(8, $row)->setValue($filas->Digitado);
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

			$sheet->getStyle('B'.($cab+2).':H'.$total)->getAlignment()->setWrapText(true)->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

			$sheet->getStyle('H'.($cab+2).':I'.$total)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

 		// CUERPO

		// PIE TOTALES
			$celda_s = $total+1 ; // inicio de pie de resumenes

			$inicio_s = $cab+2 ; // inicio suma  de resumenes	
			$fin_s = $total ; // fin suma de resumenes	
	

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
				$sheet->setTitle("Reporte Cobertura OTIN");
				$this->phpexcel->getProperties()
				->setTitle("Reporte Cobertura OTIN")
				->setDescription("Reporte de Cobertura de OTIN");

			header("Content-Type: application/vnd.ms-excel");
			$nombreArchivo = 'Reporte_Cobertura_OTIN_'.date('Y-m-d');
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