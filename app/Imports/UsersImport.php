<?php

namespace App\Imports;

use App\Models\tbl_improt_data;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new tbl_improt_data([
            // 'improt_id'                       => $row[0],
            'improt_name'                     => $row[1],
            'improt_number'                     => $row[2],
        ]);
    }
}
