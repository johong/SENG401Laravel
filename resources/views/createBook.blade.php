@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Book') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/books') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="iSBN" class="col-md-4 col-form-label text-md-right">{{ __('ISBN') }}</label>

                            <div class="col-md-6">
                                <input id="iSBN" type="number" class="form-control{{ $errors->has('iSBN') ? ' is-invalid' : '' }}" name="iSBN" value="{{ old('iSBN') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="year" class="col-md-4 col-form-label text-md-right">{{ __('Year') }}</label>

                            <div class="col-md-6">
                                <input id="year" type="number" class="form-control{{ $errors->has('year') ? ' is-invalid' : '' }}" name="year" value="{{ old('year') }}" required>

                                @if ($errors->has('year'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('year') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="publisher" class="col-md-4 col-form-label text-md-right">{{ __('Publisher') }}</label>

                            <div class="col-md-6">
                                <input id="publisher" type="text" class="form-control{{ $errors->has('publisher') ? ' is-invalid' : '' }}" name="publisher" value="{{ old('publisher') }}" required>

                                @if ($errors->has('publisher'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('publisher') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                            <div class="col-md-6">
                                <input id="image" type="url" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" required>

                                @if ($errors->has('image'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                                <label for="subscription" class="col-md-4 col-form-label text-md-right">{{ __('Subscription') }}</label>
    
                                <div class="col-md-6">
                                    <input id="subscription" type="checkbox" value= "true" class="form-control{{ $errors->has('subscription') ? ' is-invalid' : '' }}" name="subscription">
    
                                    @if ($errors->has('subscription'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('subscription') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add Book') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection