<?php

namespace App\Livewire;

use App\Models\Department;
use App\Models\User;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
//fuente usada para subida archivo

//https://blog.devgenius.io/laravel-upload-csv-file-read-its-contents-and-insert-them-into-laravel-database-table-d721753a2f86
class SubirArchivo extends Component
{
    use WithFileUploads;
    public $csv_File;

    public function render()
    {
        return view('livewire.subir-archivo');
    }

    public  function importFromCsv()
    {
        $this->validate([

            'csv_File' => 'required|file|mimes:csv,txt'
        ]);

        $csvData = file_get_contents($this->csv_File->getRealPath());
        $rows = explode("\n", $csvData);

        array_shift($rows);


        foreach ($rows as $row) {
            $data = str_getcsv($row);

            if (count($data) < 5) {
                continue;
            }
            $email = $data[2];
            if (User::where('email', $email)->exists()) {
                continue;
            }
            $department=$data[3];

            if (!Department::where('id', $department)->exists()) {
               continue;
            }
            User::create([

                'name' => $data[0],
                'last_name' => $data[1],
                'email' => $data[2],
                'department_id' => intval($data[3]),
                'password' => Hash::make($data[4]),
            ]);
        }
    }
}
