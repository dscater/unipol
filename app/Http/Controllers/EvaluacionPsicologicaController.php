<?php

namespace App\Http\Controllers;

use App\Models\EvaluacionMedica;
use App\Models\Postulante;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class EvaluacionPsicologicaController extends Controller
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
        return Inertia::render("Admin/EvaluacionPsicologicas/Index");
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
        $sheet->setCellValue('A' . $fila, "EVALUACIÓN PSICOLÓGICA");
        $sheet->mergeCells("A" . $fila . ":L" . $fila);  //COMBINAR CELDAS
        $sheet->getStyle('A' . $fila . ':L' . $fila)->getAlignment()->setHorizontal('center');
        $sheet->getStyle('A' . $fila . ':L' . $fila)->applyFromArray($this->titulo);
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
        $sheet->setCellValue('J' . $fila, 'VALORACIÓN');
        $sheet->setCellValue('K' . $fila, 'NÚMERO DE BAUCHER');
        $sheet->setCellValue('L' . $fila, 'NÚMERO DE FOLDER');
        $sheet->getStyle('A' . $fila . ':L' . $fila)->applyFromArray($this->headerTabla);
        $fila++;

        // OBTENER POSTULANTES
        $evaluacion_medicas = EvaluacionMedica::join("postulantes", "postulantes.id", "=", "evaluacion_medicas.postulante_id")
            ->where("postulantes.status", 1);
        $evaluacion_medicas->where("evaluacion_medicas.valoracion", "APTO");
        $evaluacion_medicas->where("postulantes.estado", "INSCRITO");
        $evaluacion_medicas = $evaluacion_medicas->get();
        foreach ($evaluacion_medicas as $key => $evaluacion_medica) {
            $sheet->setCellValue('A' . $fila, $key + 1);
            $sheet->setCellValue('B' . $fila, $evaluacion_medica->postulante->codigoPre);
            $sheet->setCellValue('C' . $fila, $evaluacion_medica->postulante->full_ci);
            $sheet->setCellValue('D' . $fila, $evaluacion_medica->postulante->paterno);
            $sheet->setCellValue('E' . $fila, $evaluacion_medica->postulante->materno);
            $sheet->setCellValue('F' . $fila, $evaluacion_medica->postulante->nombre);
            $sheet->setCellValue('G' . $fila, $evaluacion_medica->postulante->genero);
            $sheet->setCellValue('H' . $fila, $evaluacion_medica->postulante->fecha_nac_t);
            $sheet->setCellValue('I' . $fila, $evaluacion_medica->postulante->unidad);
            $sheet->getStyle('A' . $fila . ':L' . $fila)->applyFromArray($this->bodyTabla);
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
        $sheet->getColumnDimension('L')->setWidth(12);

        foreach (range('A', 'L') as $columnID) {
            $sheet->getStyle($columnID)->getAlignment()->setWrapText(true);
        }

        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        $sheet->getPageMargins()->setTop(0.5);
        $sheet->getPageMargins()->setRight(0.1);
        $sheet->getPageMargins()->setLeft(0.1);
        $sheet->getPageMargins()->setBottom(0.1);
        $sheet->getPageSetup()->setPrintArea('A:L');
        $sheet->getPageSetup()->setFitToWidth(1);
        $sheet->getPageSetup()->setFitToHeight(0);

        // DESCARGA DEL ARCHIVO
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="evaluacion_psicologica' . time() . '.xlsx"');
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
                $colJ = $hoja->getCell('J' . $fila->getRowIndex())->getValue(); // valoracion
                $colK = $hoja->getCell('K' . $fila->getRowIndex())->getValue(); // baucher
                $colL = $hoja->getCell('L' . $fila->getRowIndex())->getValue(); // folder

                $postulante = Postulante::where("codigoPre", $colB)->get()->first();

                if ((trim($colJ) == '') || (trim($colK))  == '' || (trim($colK) == '')) {
                    throw new Exception("Existen campos sin llenar");
                }

                if (!$postulante->evaluacion_psicologica) {
                    $postulante->evaluacion_psicologica()->create([
                        "valoracion" => mb_strtoupper(trim($colJ)),
                        "nro_baucher" => trim($colK),
                        "nro_folder" => trim($colL),
                    ]);
                } else {
                    $postulante->evaluacion_psicologica->update([
                        "valoracion" => mb_strtoupper(trim($colJ)),
                        "nro_baucher" => trim($colK),
                        "nro_folder" => trim($colL),
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
