<?php

namespace App\Imports;

use App\Models\Movie;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Row;

class MoviesUpsertImport implements OnEachRow, WithHeadingRow
{
    public function onRow(Row $row)
    {
        Movie::updateOrCreate(
            [
                'movie' => $row['movie']
            ],
            [
                'movie' => $row['movie'],
                'category' => $row['category'],
                'director' => $row['director'],
                'rating' => $row['rating']
            ]
        );
    }
}
