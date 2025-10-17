<?php

namespace App\Http\Controllers;

use App\Models\EvaluacionFisica;
use App\Models\EvaluacionPsicologica;
use App\Models\Postulante;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class EvaluacionFisicaController extends Controller
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
        return Inertia::render("Admin/EvaluacionFisicas/Index");
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
        $sheet->setCellValue('A' . $fila, "EVALUACIÓN DEL ÁREA DE APTITUD FÍSICA");
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
        $evaluacion_psicologicas = EvaluacionPsicologica::join("postulantes", "postulantes.id", "=", "evaluacion_psicologicas.postulante_id")
            ->where("postulantes.status", 1);
        $evaluacion_psicologicas->where("evaluacion_psicologicas.valoracion", "APTO");
        $evaluacion_psicologicas->where("postulantes.estado", "INSCRITO");
        $evaluacion_psicologicas = $evaluacion_psicologicas->get();
        foreach ($evaluacion_psicologicas as $key => $evaluacion_medica) {
            $sheet->setCellValue('A' . $fila, $key + 1);
            $sheet->setCellValue('B' . $fila, $evaluacion_medica->postulante->codigoPre);
            $sheet->setCellValue('C' . $fila, $evaluacion_medica->postulante->full_ci);
            $sheet->setCellValue('D' . $fila, $evaluacion_medica->postulante->paterno);
            $sheet->setCellValue('E' . $fila, $evaluacion_medica->postulante->materno);
            $sheet->setCellValue('F' . $fila, $evaluacion_medica->postulante->nombre);
            $sheet->setCellValue('G' . $fila, $evaluacion_medica->postulante->genero);
            $sheet->setCellValue('H' . $fila, $evaluacion_medica->postulante->fecha_nac_t);
            $sheet->setCellValue('I' . $fila, $evaluacion_medica->postulante->unidad);
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
        header('Content-Disposition: attachment;filename="evaluacion_fisica' . time() . '.xlsx"');
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

                if (!$postulante->evaluacion_fisica) {
                    $postulante->evaluacion_fisica()->create([
                        "nota" => (float)$colJ,
                        "descripcion" => mb_strtoupper(trim($colK)),
                    ]);
                } else {
                    $postulante->evaluacion_fisica->update([
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
