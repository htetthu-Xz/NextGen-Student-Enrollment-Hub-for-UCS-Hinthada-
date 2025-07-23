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

class FilteredStudentsExport implements FromCollection, WithMapping, WithHeadings, WithTitle, WithCustomStartCell, WithEvents, WithDrawings
{
    public $request, $students;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function collection()
    {
        $this->students = User::with('studentRegistrations')
            ->where('role', 'user');

        if ($this->request->filled('searchKey')) {
            $this->students->where('name', 'like', '%' . $this->request->input('searchKey') . '%');
        }

        if ($this->request->filled('major')) {
            $this->students->whereHas('studentRegistrations', function ($q) {
                $q->where('major', $this->request->input('major'));
            });
        }

        if ($this->request->filled('year')) {
            $this->students->whereHas('studentRegistrations', function ($q) {
                $q->where('academic_year', $this->request->input('year'));
            });
        }

        if ($this->request->filled('academic_class')) {
            $this->students->whereHas('studentRegistrations', function ($q) {
                $q->where('academic_year_id', $this->request->input('academic_class'));
            });
        }

        return $this->students->get();
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
                $drawing->setHeight(50); 
                $drawing->setCoordinates('B' . ($index + 7));
                $drawings[] = $drawing;
            }
        }

        return $drawings;
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
            }
        ];
    }
}
