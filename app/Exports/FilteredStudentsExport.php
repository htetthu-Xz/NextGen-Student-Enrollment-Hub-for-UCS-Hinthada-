<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\User;

use App\Helper\Facades\File;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Events\AfterSheet;

class FilteredStudentsExport implements FromCollection, WithMapping, WithHeadings, WithTitle, WithCustomStartCell, WithEvents, WithDrawings, WithStyles
{
    public $request, $students;

    public function __construct($request)
    {
        $query = User::with('studentRegistrations')
            ->where('role', 'user');

        if ($request->filled('searchKey')) {
            $query->where('name', 'like', '%' . $request->input('searchKey') . '%');
        }

        if ($request->filled('major')) {
            $query->whereHas('studentRegistrations', function ($q) use ($request) {
                $q->where('major', $request->input('major'));
            });
        }

        if ($request->filled('academic_year')) {
            $query->whereHas('studentRegistrations', function ($q) use ($request) {
                $q->where('academic_year', $request->input('academic_year'));
            });
        }

        if ($request->filled('academic_class')) {
            $query->whereHas('studentRegistrations', function ($q) use ($request) {
                $q->where('academic_year_id', $request->input('academic_class'));
            });
        }

        $this->students = $query->get();
    }


    public function collection()
    {
        return $this->students;
    }

    public function drawings()
    {
        $drawings = [];

        foreach ($this->students as $index => $student) {
            $drawing = new Drawing();
            $drawing->setName('User Image');
            $drawing->setDescription('User Image');

            $imagePath = public_path(File::GetStudentDataPath($student) . $student->image);

            if (file_exists($imagePath)) {
                $drawing->setPath($imagePath);
                $drawing->setWidthAndHeight(150, 65);
                $drawing->setCoordinates('B' . ($index + 7));
                $drawings[] = $drawing;
            }
        }

        return $drawings;
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getDefaultRowDimension()->setRowHeight(100);

        $sheet->getColumnDimension('A')->setWidth(5);
        $sheet->getColumnDimension('B')->setWidth(9);

        $sheet->getColumnDimension('C')->setWidth(20);
        $sheet->getColumnDimension('D')->setWidth(15);
        $sheet->getColumnDimension('E')->setWidth(20);
        $sheet->getColumnDimension('F')->setWidth(20);
        $sheet->getColumnDimension('G')->setWidth(20);
        $sheet->getColumnDimension('I')->setWidth(25);
        $sheet->getColumnDimension('J')->setWidth(18);
        $sheet->getColumnDimension('K')->setWidth(20);

        $sheet->getStyle('A6:K' . ($this->students->count() + 6))
            ->getAlignment()
            ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
            ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
            ->setWrapText(true);

        return [];
    }


    public function map($user): array
    {
        return [
            $this->rowCounter = ($this->rowCounter ?? 0) + 1,
            '',
            $user->name,
            $user->CurrentUserAcademicInfo()->roll_no ?? 'N/A',
            $user->CurrentUserAcademicInfo()->father_name ?? 'N/A',
            $user->CurrentUserAcademicInfo()->mother_name ?? 'N/A',
            $user->CurrentUserAcademicInfo()->nrc_student ?? 'N/A',
            $user->CurrentUserAcademicInfo()->dob ?? 'N/A',
            $user->CurrentUserAcademicInfo()->permanent_address ?? 'N/A',
            $user->CurrentUserAcademicInfo()->phone ?? 'N/A',
            $user->uni_id_no,
        ];
    }

    public function headings(): array
    {
        return [
            'No',
            'Image',
            'Name',
            'Roll No',
            'Father Name',
            'Mother Name',
            'NRC Student',
            'Date of Birth',
            'Permanent Address',
            'Phone/Guardian Phone',
            'University ID No',
        ];
    }

    public function title(): string
    {
        return 'ကျောင်းသားများစာရင်း';
    }

    public function startCell(): string
    {
        return 'A6';
    }

    public function registerEvents(): array
    {
        return [
            BeforeSheet::class => function (BeforeSheet $event) {
                $event->sheet->setCellValue('A1', 'ကွန်ပျူတာတက္ကသိုလ် (ဟင်္သာတ) ကျောင်းသားများစာရင်း');
                $event->sheet->setCellValue('A2', 'Generated on: ' . Carbon::now()->format('F j, Y, g:i A'));
                $event->sheet->mergeCells('A1:G1');
                $event->sheet->mergeCells('A2:G2');
                $event->sheet->mergeCells('A3:G3');

                $event->sheet->getStyle('A1')->getFont()->setBold(true)->setSize(16);
                $event->sheet->getStyle('A2')->getFont()->setItalic(true)->setSize(12);
                $event->sheet->getStyle('A3')->getFont()->setSize(12);
            },

            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

                // Bold headers
                $sheet->getStyle('A6:K6')->getFont()->setBold(true);

                // Set border for all data cells
                $sheet->getStyle('A6:K' . ($this->students->count() + 6))
                    ->getBorders()
                    ->getAllBorders()
                    ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                $startRow = 7;
                $endRow = $this->students->count() + 6;
                for ($row = $startRow; $row <= $endRow; $row++) {
                    $sheet->getRowDimension($row)->setRowHeight(50);
                }
            }
        ];
    }
}
