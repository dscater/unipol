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

class EvaluacionMedicaController extends Controller
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
        return Inertia::render("Admin/EvaluacionMedicas/Index");
    }

    public function paginado(Request $request)
    {
        $perPage = $request->perPage;
        $page = (int)($request->input("page", 1));
        $search = (string)$request->input("search", "");
        $orderByCol = $request->orderByCol;
        $desc = $request->desc;

        $columnsSerachLike = [
            "CONCAT_WS(' ', postulantes.nombre, postulantes.paterno, postulantes.materno)",
            "CONCAT_WS(' ', postulantes.ci, postulantes.complemento, postulantes.ci_exp)",
            "postulantes.unidad",
            "postulantes.codigoPre",
            "valoracion",
            "nro_baucher",
            "nro_folder",
        ];
        $columnsFilter = [];
        $columnsBetweenFilter = [];
        $orderBy = [];
        if ($orderByCol && $desc) {
            $orderBy = [
                [$orderByCol, $desc]
            ];
        }

        $evaluacion_medicas = EvaluacionMedica::with(["postulante"])->select("evaluacion_medicas.*")
            ->join("postulantes", "postulantes.id", "=", "evaluacion_medicas.postulante_id");


        // Filtros exactos
        foreach ($columnsFilter as $key => $value) {
            if (!is_null($value)) {
                $evaluacion_medicas->where("evaluacion_medicas.$key", $value);
            }
        }

        // Filtros por rango
        foreach ($columnsBetweenFilter as $key => $value) {
            if (isset($value[0], $value[1])) {
                $evaluacion_medicas->whereBetween("evaluacion_medicas.$key", $value);
            }
        }

        // Búsqueda en múltiples columnas con LIKE
        if (!empty($search) && !empty($columnsSerachLike)) {
            $evaluacion_medicas->where(function ($query) use ($search, $columnsSerachLike) {
                foreach ($columnsSerachLike as $col) {
                    $query->orWhereRaw("$col LIKE ?", ["%{$search}%"]);
                }
            });
        }
        // Ordenamiento
        foreach ($orderBy as $value) {
            if (isset($value[0], $value[1])) {
                $evaluacion_medicas->orderBy($value[0], $value[1]);
            }
        }


        $evaluacion_medicas = $evaluacion_medicas->paginate($perPage, ['*'], 'page', $page);
        return response()->JSON([
            "data" => $evaluacion_medicas->items(),
            "total" => $evaluacion_medicas->total(),
            "lastPage" => $evaluacion_medicas->lastPage()
        ]);
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
        $sheet->setCellValue('A' . $fila, "EVALUACIÓN MÉDICA");
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
        $postulantes = Postulante::where("status", 1);
        $postulantes->where("estado", "INSCRITO");
        $postulantes = $postulantes->get();
        foreach ($postulantes as $key => $postulante) {
            $sheet->setCellValue('A' . $fila, $key + 1);
            $sheet->setCellValue('B' . $fila, $postulante->codigoPre);
            $sheet->setCellValue('C' . $fila, $postulante->full_ci);
            $sheet->setCellValue('D' . $fila, $postulante->paterno);
            $sheet->setCellValue('E' . $fila, $postulante->materno);
            $sheet->setCellValue('F' . $fila, $postulante->nombre);
            $sheet->setCellValue('G' . $fila, $postulante->genero);
            $sheet->setCellValue('H' . $fila, $postulante->fecha_nac_t);
            $sheet->setCellValue('I' . $fila, $postulante->unidad);
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
        header('Content-Disposition: attachment;filename="evaluacion_medica' . time() . '.xlsx"');
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

                if (!$postulante->evaluacion_medica) {
                    $postulante->evaluacion_medica()->create([
                        "valoracion" => mb_strtoupper(trim($colJ)),
                        "nro_baucher" => trim($colK),
                        "nro_folder" => trim($colL),
                    ]);
                } else {
                    $postulante->evaluacion_medica->update([
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
