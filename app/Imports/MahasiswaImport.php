<?php

namespace App\Imports;

use App\Models\Kelas;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithProgressBar;

class MahasiswaImport implements ToCollection, WithHeadingRow, WithProgressBar
{
    /**
     * @param Collection $collection
     */
    use Importable;

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $user = User::create([
                'name' => $row['name'],
                'username' => $row['npm'],
                'email' => $row['email'],
                'password' => Hash::make($row['npm']),
            ]);
            $kelas = Kelas::where('slug', $row['kelas'])->first();
            $user->mahasiswa()->create([
                'npm' => $row['npm'],
                'kelas_id' => $kelas->id,
            ]);
            $user->assignRole('mahasiswa');
        }
    }

    public function rules(): array
    {
        return [
            'email' => ['nullable', 'email', 'unique:users,email'],
            'name' => ['required', 'string'],
            'npm' => ['required', 'string', 'unique:mahasiswas,npm'],
            'kelas' => ['required', 'string', 'exists:kelas,slug'],
        ];
    }

    public function headingRow(): int
    {
        return 2;
    }
}
