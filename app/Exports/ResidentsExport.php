<?php

namespace App\Exports;

use App\Models\Resident;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ResidentsExport implements FromCollection, WithHeadings
{
    protected $residentId;

    public function __construct($residentId)
    {
        $this->residentId = $residentId;
    }

    public function collection()
    {
        // Gantilah query sesuai dengan kebutuhan Anda
        return Resident::where('id', $this->residentId)->get();
    }

    public function headings(): array
    {
        // Sesuaikan dengan nama kolom yang ada di tabel
        return [
            'id',
            'nik',
            'nama',
            'foto',
            'jenis kelamin',
            'tanggal lahir',
            'alamat',
            'agama',
            'pekerjaan',
            'waktu dibuat',
            'waktu diupdate',
        ];
    }
}
