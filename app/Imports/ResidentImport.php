<?php

namespace App\Imports;

use App\Models\Resident;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ResidentImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Sesuaikan kolom dan data yang diimpor sesuai dengan struktur model Anda
        return new Resident([
            'nik' => $row['nik'],
            'name' => $row['nama'],
            'image_path' => $row['foto'],
            'gender' => $row['jenis_kelamin'],
            'birthdate' => $row['tanggal_lahir'],
            'address' => $row['alamat'],
            'religion' => $row['agama'],
            'profession' => $row['pekerjaan']
        ]);
    }
}
