@extends('base')

@section('content')
<div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Nový dotaz</div>                    

                    <div class="card-body">
                        <form method="POST" action="{{ route('question.store') }}" class="w-100">
                            @csrf                            

                            <input type="hidden" name="author_id" value="{{ auth()->user()->id }}">

                            <div class="form-group row">
                                <label for="title" class="col-md-2 col-form-label text-md-right">Titulek</label>

                                <div class="col-md-10">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                                    @error('title')
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

                            <div class="form-group row">
                                <label for="question_kind_id" class="col-md-2 col-form-label text-md-right">Kategorie</label>

                                <div class="col-md-10">
                                    <select name="question_kind_id" id="question_kind_id" class="form-control @error('question_kind_id') is-invalid @enderror">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->code }}</option>
                                        @endforeach
                                    </select>

                                    @error('question_kind_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tags" class="col-md-2 col-form-label text-md-right">Tagy (oddělené čárkou)</label>

                                <div class="col-md-10">
                                    <input id="tags" type="text" class="form-control @error('tags') is-invalid @enderror" name="tags" value="{{ old('tags') }}" required autocomplete="tags">

                                    @error('tags')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="question" class="col-md-2 col-form-label text-md-right">Obsah dotazu</label>

                                <div class="col-md-10">
                                    <textarea name="question" id="question" class="form-control @error('question') is-invalid @enderror" rows="8">{{ old('question') }}</textarea>
                                    
                                    @error('question')
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
                                    <a href="{{ $backUrl }}" class="btn btn-danger">Vrátit zpět</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ asset('//cdn.tinymce.com/4/tinymce.min.js') }}"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: '#question',
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table contextmenu paste'
            ],
            toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            entities: '160,nbsp',
            entity_encoding: 'raw',
        });       
    </script>
@endpush