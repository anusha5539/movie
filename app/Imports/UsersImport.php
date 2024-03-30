<?php

namespace App\Imports;

use App\Models\Movie;
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
        return new Movie([
            'movie_id'     => $row[0],
            'title'    => $row[1],
         ]);
    }
}
