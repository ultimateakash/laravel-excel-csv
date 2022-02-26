<?php

namespace App\Http\Controllers;

use App\Exports\MoviesCustomExport;
use App\Exports\MoviesQueryExport;
use App\Exports\MoviesExport;
use App\Imports\MoviesUpsertImport;
use App\Imports\MoviesImport;
use App\Models\Movie;
use Maatwebsite\Excel\Facades\Excel;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::get();
        return view('index', compact('movies'));
    }

    public function import()
    {
        if(request()->hasFile('file')) {
            Excel::import(new MoviesImport, request()->file('file')->store('temp'));
        }
        return redirect()->back();
    }

    public function export()
    {
        return Excel::download(new MoviesExport, 'movies.xlsx');
    }

    public function importInsertUpdate()
    {
        if(request()->hasFile('file')) {
            Excel::import(new MoviesUpsertImport, request()->file('file')->store('temp'));
        }
        return redirect()->back();
    }

    public function exportCustomData()
    {
        $movies = [
            [
                'id' => 1,
                'movie' => 'The Dark Knight',
                'category' => 'Action',
                'director' => 'Christopher Nolan',
                'rating' => 9
            ],
            [
                'id' => 2,
                'movie' => 'Shawshank Redemption',
                'category' => 'Drama',
                'director' => 'Frank Darabont',
                'rating' => 9.3
            ]
        ];
        return Excel::download(new MoviesCustomExport($movies), 'movies.csv');
    }

    public function exportQueryData()
    {
        $rating = 9; // Export Popular Movies
        return Excel::download(new MoviesQueryExport($rating), 'movies.csv');
    }
}
