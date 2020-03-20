@extends('layouts.dashboard.app')

@section('content')

    <div>
        <h2>settings</h2>
    </div>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.welcome') }}">Dashboard</a></li>
       
        <li class="breadcrumb-item active">Add</li>
    </ul>

    <div class="row">
        <div class="col-md-12">
            <div class="tile mb-4">

                <form method="post" action="{{ route('dashboard.settings') }}">
                    @csrf
                    @method('post')

                    @include('dashboard.partials._errors')
                    @php 
                    $social_sites = ['facebook', 'google' , 'twitter'];
                    @endphp

                    @foreach($social_sites as $social_site)
                    
                    {{--Facebook Client id--}}
                    <div class="form-group">
                        <label>{{$social_site}} Client id</label>
                        <input type="text" name="{{$social_site}}_client_id" class="form-control" value="{{ setting($social_site.'_client_id') }}">
                    </div>

                    {{--Facebook Client Secret--}}
                    <div class="form-group">
                        <label>{{$social_site}} Client Secret</label>
                        <input type="text" name="{{$social_site}}_client_Secret" class="form-control" value="{{ setting($social_site.'_client_Secret') }}">
                    </div>

                    {{--Facebook Redirect Url--}}
                    <div class="form-group">
                        <label>{{$social_site}} Redirect Url</label>
                        <input type="text" name="{{$social_site}}_Redirect_Url" class="form-control" value="{{ setting($social_site.'_Redirect_Url') }}">
                    </div>
                    
                    
                    @endforeach


                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add</button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of tile -->
        </div><!-- end of col -->
    </div><!-- end of row -->

@endsection