<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MoviesCustomExport implements FromCollection, WithHeadings
{
    protected $movie;

    public function __construct(array $movie)
    {
        $this->movie = $movie;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect($this->movie);
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
}
