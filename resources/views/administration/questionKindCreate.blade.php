@extends('base')

@section('content')
<div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Nová kategorie</div>                    

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.questionKindStore') }}" class="w-100">
                            @csrf                            
                            
                            <div class="form-group row">
                                <label for="code" class="col-md-2 col-form-label text-md-right">Kód</label>

                                <div class="col-md-10">
                                    <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" required autocomplete="code" autofocus>

                                    @error('code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-2 col-form-label text-md-right">Popis</label>

                                <div class="col-md-10">
                                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description">

                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-12 offset-md-2">
                                    <button type="submit" class="btn btn-success">
                                        Uložit
                                    </button>
                                    <a href="#" class="btn btn-danger">Vrátit zpět</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection