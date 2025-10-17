<?php

namespace App\Http\Controllers;

use App\Models\EvaluacionFisica;
use App\Models\Postulante;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class EvaluacionInstruccionController extends Controller
{
    public $titulo = [
        'font' => [
            'bold' => true,
            'size' => 12,
            'family' => 'Times New Roman'
        ],
        'borders' => [
            'allBorders' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_NONE,
            ],
        ],
    ];

    public $textoBold = [
        'font' => [
            'bold' => true,
            'size' => 10,
        ],
    ];

    public $headerTabla = [
        'font' => [
            'bold' => true,
            'size' => 10,
            'color' => ['argb' => 'ffffff'],
        ],
        'alignment' => [
            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
        ],
        'borders' => [
            'allBorders' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
        'fill' => [
            'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
            'color' => ['rgb' => '4a5123']
        ],
    ];

    public $bodyTabla = [
        'font' => [
            'size' => 10,
        ],
        'alignment' => [
            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            // 'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ],
        'borders' => [
            'allBorders' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
    ];

    public $textLeft = [
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
        ],
    ];

    public $textRight = [
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
        ],
    ];


    public $textCenter = [
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ],
    ];

    public function index()
    {
        return Inertia::render("Admin/EvaluacionInstruccions/Index");
    }

    public function descargar()
    {
        $spreadsheet = new Spreadsheet();
        $spreadsheet->getProperties()
            ->setCreator("ADMIN")
            ->setLastModifiedBy('Administración')
            ->setTitle('Registros')
            ->setSubject('Registros')
            ->setDescription('Registros')
            ->setKeywords('PHPSpreadsheet')
            ->setCategory('Listado');

        $sheet = $spreadsheet->getActiveSheet();

        $spreadsheet->getDefaultStyle()->getFont()->setName('Arial');

        $fila = 1;
        $sheet->setCellValue('A' . $fila, "EVALUACIÓN DEL ÁREA DE INSTRUCCIÓN POLICIAL");
        $sheet->mergeCells("A" . $fila . ":K" . $fila);  //COMBINAR CELDAS
        $sheet->getStyle('A' . $fila . ':K' . $fila)->getAlignment()->setHorizontal('center');
        $sheet->getStyle('A' . $fila . ':K' . $fila)->applyFromArray($this->titulo);
        $fila++;
        $fila++;
        $sheet->setCellValue('A' . $fila, 'NÚMERO');
        $sheet->setCellValue('B' . $fila, 'CÓDIGO DE PROSPECTO');
        $sheet->setCellValue('C' . $fila, 'C.I.');
        $sheet->setCellValue('D' . $fila, 'AP. PATERNO');
        $sheet->setCellValue('E' . $fila, 'AP. MATERNO');
        $sheet->setCellValue('F' . $fila, 'NOMBRE(S)');
        $sheet->setCellValue('G' . $fila, 'SEXO');
        $sheet->setCellValue('H' . $fila, 'FECHA DE NACIMIENTO');
        $sheet->setCellValue('I' . $fila, '¿DÓNDE POSTULA?');
        $sheet->setCellValue('J' . $fila, 'PUNTUACIÓN');
        $sheet->setCellValue('K' . $fila, 'RESULTADO');
        $sheet->getStyle('A' . $fila . ':K' . $fila)->applyFromArray($this->headerTabla);
        $fila++;

        // OBTENER POSTULANTES
        $evaluacion_fisicas = EvaluacionFisica::join("postulantes", "postulantes.id", "=", "evaluacion_fisicas.postulante_id")
            ->where("postulantes.status", 1);
        $evaluacion_fisicas->where("evaluacion_fisicas.descripcion", "APROBADO");
        $evaluacion_fisicas->where("postulantes.estado", "INSCRITO");
        $evaluacion_fisicas = $evaluacion_fisicas->get();
        foreach ($evaluacion_fisicas as $key => $evaluacion_fisica) {
            $sheet->setCellValue('A' . $fila, $key + 1);
            $sheet->setCellValue('B' . $fila, $evaluacion_fisica->postulante->codigoPre);
            $sheet->setCellValue('C' . $fila, $evaluacion_fisica->postulante->full_ci);
            $sheet->setCellValue('D' . $fila, $evaluacion_fisica->postulante->paterno);
            $sheet->setCellValue('E' . $fila, $evaluacion_fisica->postulante->materno);
            $sheet->setCellValue('F' . $fila, $evaluacion_fisica->postulante->nombre);
            $sheet->setCellValue('G' . $fila, $evaluacion_fisica->postulante->genero);
            $sheet->setCellValue('H' . $fila, $evaluacion_fisica->postulante->fecha_nac_t);
            $sheet->setCellValue('I' . $fila, $evaluacion_fisica->postulante->unidad);
            $sheet->getStyle('A' . $fila . ':K' . $fila)->applyFromArray($this->bodyTabla);
            $fila++;
        }

        $sheet->getColumnDimension('A')->setWidth(6);
        $sheet->getColumnDimension('B')->setWidth(15);
        $sheet->getColumnDimension('C')->setWidth(15);
        $sheet->getColumnDimension('D')->setWidth(10);
        $sheet->getColumnDimension('E')->setWidth(20);
        $sheet->getColumnDimension('F')->setWidth(12);
        $sheet->getColumnDimension('G')->setWidth(15);
        $sheet->getColumnDimension('H')->setWidth(15);
        $sheet->getColumnDimension('I')->setWidth(13);
        $sheet->getColumnDimension('J')->setWidth(12);
        $sheet->getColumnDimension('K')->setWidth(12);

        foreach (range('A', 'K') as $columnID) {
            $sheet->getStyle($columnID)->getAlignment()->setWrapText(true);
        }

        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        $sheet->getPageMargins()->setTop(0.5);
        $sheet->getPageMargins()->setRight(0.1);
        $sheet->getPageMargins()->setLeft(0.1);
        $sheet->getPageMargins()->setBottom(0.1);
        $sheet->getPageSetup()->setPrintArea('A:K');
        $sheet->getPageSetup()->setFitToWidth(1);
        $sheet->getPageSetup()->setFitToHeight(0);

        // DESCARGA DEL ARCHIVO
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="evaluacion_instruccion' . time() . '.xlsx"');
        header('Cache-Control: max-age=0');
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
    }

    public function subir(Request $request)
    {
        try {
            $archivo = $request->file("archivo");
            $spreadsheet = IOFactory::load($archivo->getPathname());
            $hoja = $spreadsheet->getActiveSheet();
            $filas = $hoja->getRowIterator(4);

            foreach ($filas as $fila) {
                $celdas = $fila->getCellIterator();
                $celdas->setIterateOnlyExistingCells(false);
                $colB = $hoja->getCell('B' . $fila->getRowIndex())->getValue(); // codigo
                $colJ = $hoja->getCell('J' . $fila->getRowIndex())->getValue(); // puntaje
                $colK = $hoja->getCell('K' . $fila->getRowIndex())->getValue(); // resultado

                $postulante = Postulante::where("codigoPre", $colB)->get()->first();

                if ((trim($colJ) == '') || (trim($colK))  == '' || (trim($colK) == '')) {
                    throw new Exception("Existen campos sin llenar");
                }

                if (!$postulante->evaluacion_instruccion) {
                    $postulante->evaluacion_instruccion()->create([
                        "nota" => (float)$colJ,
                        "descripcion" => mb_strtoupper(trim($colK)),
                    ]);
                } else {
                    $postulante->evaluacion_instruccion->update([
                        "nota" => (float)$colJ,
                        "descripcion" => mb_strtoupper(trim($colK)),
                    ]);
                }
            }

            return response()->JSON([
                "sw" => true,

            ]);
        } catch (\Exception $e) {
            throw ValidationException::withMessages([
                'error' =>  $e->getMessage(),
            ]);
        }
    }
}
