@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Author') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/authors/' . $author->id)}}">
                        {{method_field('PATCH')}}
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $author->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <input type=submit value="Done" class = 'btn btn-primary form-control' style='margin-top:1%; margin-bottom:1%'>
                            </div>
                        </div>
                    </form>
                    <form method="POST" action="{{ url('/authors/' . $author->id)}}">
                        {{method_field('DELETE')}}
                        @csrf
                        <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <input type=submit value="Delete" class = 'btn btn-primary form-control' style='margin-top:1%; margin-bottom:1%'>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection