<?php
namespace App\Http\Exportables;

use App\Http\Controllers\ReporteMatriculaController;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;

class ExcelReporteMatricula implements FromCollection,  WithHeadings, ShouldAutoSize
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
            'FechaMatricula',
            'AñoLectivo',
            'PartidaNacimiento',
            'TarjetaVacuna',
            'DiplomaPrescolar',
            'CedulaPadres',
            'HojaTraslado',
            'DiplomaSecundaria',
            'NombreEstudiante',
            'ApellidoEstudiante',
            'CodigoEstudiante',
            'FechaNacimiento',
            'Direccion',
            'Sexo',
            'Grado',
            'Seccion',
            'Turno',
        ];
    }
    public function collection()
    {
        $data = app(ReporteMatriculaController::class)->getData();
        return $data['matriculas'];
    }

}