<?php

namespace App\Exports;

use App\Models\tbl_scores;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Events\AfterSheet;

class ScoresExport implements FromCollection, ShouldAutoSize, WithHeadings, WithStyles, WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $score = tbl_scores::join("tbl_subjects", "tbl_subjects.id", "=", "tbl_scores.id_subject")
            ->join("tbl_students", "tbl_students.id", "=", "tbl_scores.id_student")
            ->select("tbl_subjects.nombre as subject", "tbl_students.nombre as student", "score")
            ->orderBy('tbl_subjects.id', 'desc')->get();

        return $score;
    }

    public function headings(): array
    {
        return ["Subjects", "Name", "Score"];
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
