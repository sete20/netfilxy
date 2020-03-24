@extends('layouts.dashboard.app')

@section('content')

    <div>
        <h2>Movies</h2>
    </div>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.welcome') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Movie</li>
    </ul>

    <div class="row">

        <div class="col-md-12">
            <div class="tile mb-4">

                <div class="row">

                    <div class="col-12">

                        <form action="">
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="search" autofocus class="form-control" placeholder="search ny name, description, rating, year" value="{{ request()->search }}">
                                    </div>
                                </div><!-- end of col -->

                                <div class="col-md-4">
                       
                                </div><!-- end of col -->

                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                                   
                                        <a href="{{ route('dashboard.movies.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add</a>
                             
                                       
              
                                </div>
                            </div><!-- end of row -->

                        </form><!-- end of form -->

                    </div><!-- end of col 12 -->

                </div><!-- end of row -->

                <div class="row">
                    <div class="col-md-12">
                        @if ($movies->count() > 0)
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Description</th>
                           
                                    <th>Year</th>
                                    <th>Rating</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach ($movies as $index=>$movie)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $movie->name }}</td>
                                        <td>{{ Str::limit($movie->description, 50) }}</td>

                                        <td>{{ $movie->year }}</td>
                                        <td>{{ $movie->rating }}</td>
                                        <td>
                                            @if (auth()->user()->hasPermission('update_movies'))
                                                <a href="{{ route('dashboard.movies.edit', $movie->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                            @else
                                                <a href="#" disabled class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                            @endif
                                            @if (auth()->user()->hasPermission('delete_movies'))
                                                <form method="post" action="{{ route('dashboard.movies.destroy', $movie->id) }}" style="display: inline-block;">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> Delete</button>
                                                </form><!-- end of form -->
                                            @else
                                                <a href="#" disabled class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>Delete</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>

                            {{ $movies->appends(request()->query())->links() }}

                        @else
                            <h3 style="font-weight: 400;">Sorry no records found</h3>
                        @endif
                    </div>
                </div>
            </div><!-- end of tile -->
        </div><!-- end of col -->

    </div><!-- end of row -->

@endsection