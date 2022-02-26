@extends('layouts.main')
@section('title', 'Larvel Import Export')
@section('content')
<main>
    <div class="row mb-2">
        <div class="col-sm-8 offset-2">
            <div class="row">
                <div class="col-md-6">
                    <form method="POST" action="{{ url('import') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="file" class="custom-file-input" id="inputGroupFile" required accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                                <label class="custom-file-label" for="inputGroupFile">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary float-right mr-2">Import <i class="fa fa-upload"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <a href="{{ url('export') }}" class="btn btn-primary float-right @if(count($movies) == 0) disabled @endif" role="button" aria-disabled="true">
                        Export <i class="fa fa-download"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-8 offset-2">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Movie</th>
                        <th scope="col">Category</th>
                        <th scope="col">Director</th>
                        <th scope="col">Rating</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($movies as $movie)
                    <tr>
                        <th scope="row">{{ $movie->id }}</th>
                        <td>{{ $movie->movie }}</td>
                        <td>{{ $movie->category }}</td>
                        <td>{{ $movie->director }}</td>
                        <td><span class="badge bg-warning text-dark">{{ $movie->rating }}</span></td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">No Movies Found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection
