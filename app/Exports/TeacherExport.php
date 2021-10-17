<?php

namespace App\Exports;

use App\Models\tbl_teachers;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Events\AfterSheet;

class TeacherExport implements FromCollection, ShouldAutoSize, WithHeadings, WithStyles, WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $teachers = tbl_teachers::join("tbl_subjects", "tbl_subjects.id", "=", "tbl_teachers.subject")
            ->select("cc_teacher", "tbl_teachers.nombre as teacher", "tbl_subjects.nombre")
            ->get();
        return $teachers;
    }

    public function headings(): array
    {
        return ["ID teacher", "Name", "Subject"];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],

            1  => ['font' => ['size' => 16]],
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function (AfterSheet $event) {

                $event->sheet->getDelegate()->getStyle('A1:C1')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('366092');

                $event->sheet->getStyle('A1:C1')->getFont()
                    ->setSize(16)
                    ->setBold(true)
                    ->getColor()->setRGB('FFFFFF');

                $event->sheet->setAutoFilter('A1:C1');
            },
        ];
    }
}
