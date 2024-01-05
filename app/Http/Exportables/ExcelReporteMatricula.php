<?php
namespace App\Http\Exportables;

use App\Http\Controllers\ReporteMatriculaController;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExcelReporteMatricula implements FromCollection,  WithHeadings
{
    public function headings(): array
    {
        return [
            'Fecha',
            'User',
            'Date',
        ];
    }
    public function collection()
    {
        $data = app(ReporteMatriculaController::class)->getData();
        return $data['matriculas'];
    }
}