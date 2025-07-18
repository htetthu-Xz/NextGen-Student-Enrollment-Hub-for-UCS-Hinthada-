<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Material;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;

class StopStudentExport implements FromCollection, WithMapping, WithHeadings, WithTitle, WithCustomStartCell, WithEvents
{
    public function collection()
    {
        return User::where('stop', 'yes')->with(['studentRegistrations'])->get();
    }

    public function map($user): array
    {
        return [
            $this->rowCounter = ($this->rowCounter ?? 0) + 1,
            $user->image,
            $user->name,
            $user->CurrentUserAcademicInfo()->roll_no ?? 'N/A',
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
            'NRC Student',
            'Date of Birth',
            'Permanent Address',
            'Phone/Guardian Phone',
            'University ID No',
        ];
    }

    public function title(): string
    {
        return 'ရပ်နား ကျောင်းသားများစာရင်း';
    }

    public function startCell(): string
    {
        return 'A6';
    }

    public function registerEvents(): array
    {
        return [
            BeforeSheet::class => function (BeforeSheet $event) {
                $event->sheet->setCellValue('A1', 'ကွန်ပျူတာတက္ကသိုလ် (ဟင်္သာတ) ရပ်နား ကျောင်းသားများစာရင်း');
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
