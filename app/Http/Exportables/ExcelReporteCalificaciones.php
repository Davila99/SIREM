<?php
namespace App\Http\Exportables;

use App\Http\Controllers\ReporteCalificacionesController;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;

class ExcelReporteCalificaciones implements FromCollection,  WithHeadings, ShouldAutoSize
{
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {

                $event->sheet->getStyle('A1:Z1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'color' => ['rgb' => 'FFFFFF'],
                    ],
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'startColor' => ['rgb' => '008000'],
                    ],
                ]);
    
                $event->sheet->getDefaultStyle()->getAlignment()->setWrapText(true);
    
            },
        ];
    }
    
    public function headings(): array
    {
        return [
           
            
            'Calificacion',
            'CalificacionCualitativa',
            'Observacion',
            'Grado',
            'Seccion',
            'Turno',
            'AñoLectivo',
            'Asignatura',
            
            'Corte',
        ];
    }
    public function collection()
    {
        $data = app(ReporteCalificacionesController::class)->getData();
        return $data['calificaciones'];
    }

}