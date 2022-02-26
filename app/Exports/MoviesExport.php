<?php

namespace App\Exports;

use App\Models\Movie;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class MoviesExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Movie::all();
    }

    public function headings(): array
    {
        return [
            'Id',
            'Movie',
            'Category',
            'Director',
            'Rating'
        ];
    }

    public function map($movie): array
    {
        return [
            $movie->id,
            $movie->movie,
            $movie->category,
            $movie->director,
            $movie->rating
        ];
    }
}
