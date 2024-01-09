<?php
namespace App\Http\Exportables;

use App\Http\Controllers\ReporteEstudianteController;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;

class ExcelReporteEstudiante implements FromCollection,  WithHeadings, ShouldAutoSize
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
            'OrganizacionAcademica',
            'Fecha',
            'Autorizado',
            'Asignatura',
            'Empleado',
            'Grado',
            'Seccion',
            'Turno',
            'AnioLectivo',
        ];
    }
    public function collection()
    {
        $data = app(ReporteEstudianteController::class)->getData();
        return $data['estudiantes'];
    }

}