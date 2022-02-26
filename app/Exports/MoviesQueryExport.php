<?php

namespace App\Exports;

use App\Models\Movie;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class MoviesQueryExport implements FromQuery, WithHeadings, WithMapping
{
    use Exportable;

    public function __construct(float $rating)
    {
        $this->rating = $rating;
    }

    /**
    * @return \Illuminate\Database\Query\Builder
    */
    public function query()
    {
        return Movie::query()->where('rating', '>=', $this->rating);
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
