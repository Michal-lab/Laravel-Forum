@extends('base')

@section('content')

@if ($errors->any())

<script>
 $(document).ready(function() {
    $('#modal').modal('show');
 }); 
</script>

<div id="modal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Upozornění</h5>        
      </div>
      <div class="modal-body">
        <p>{{ $errors->first() }}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>        
      </div>
    </div>
  </div>
</div>

@endif


<!-- QUESTION -->
<div class="row">    
    <div class="card mt-5 border-primary w-100">
        <div class="card-header text-primary d-flex flex-row justify-content-between">
            <h2>{{ $question->title }}</h2>                
            @if (auth()->user()->id == $question->author_id)
                <div class="d-flex flex-row">                    
                    <a href="{{ route('question.edit', ['question' => $question]) }}" class="btn btn-success pt-2"><i class="fa fa-edit mr-1"></i>Upravit</a>
                    <a href="#" onclick="event.preventDefault(); $('#question-delete-{{ $question->id }}').submit();" class="btn btn-danger ml-2 pt-2"><i class="fa fa-trash mr-1"></i>Smazat</a>
                    <form action="{{ route('question.destroy', ['question' => $question]) }}" method="POST" id="question-delete-{{ $question->id }}" class="d-none">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>            
            @endif
        </div>
        <div class="card-body">            
            {!! $question->question !!}            
        </div>
        <div class="card-footer text-right d-flex flex-row justify-content-between">            
            <div class="text-success">{{ $author->name }}</div>
            <div class="d-flex flex-row">
                <div><i class="fa fa-save mr-1"></i> {{ $question->created_at->diffForHumans() }}</div>                        
                <div class="ml-5"><i class="fa fa-edit mr-1"></i> {{ $question->updated_at->diffForHumans() }}</div>
            </div>            
        </div>                
    </div>            
</div>

<div class="row">
    <div class="card w-100 my-3">
        <div class="card-header">
            <h2>Odpovědět</h2>
        </div>
        <div class="card-body">    
            <form action="{{ route('answer.store') }}" method="POST">
                @csrf                          
                
                <input type="hidden" name="question_id" value="{{ $question->id }}">
                
                <div class="form-group row">                
                    <div class="col-md-12">
                        <textarea name="answer" id="answer" class="form-control @error('answer') is-invalid @enderror" rows="8">{{ old('answer') }}</textarea>

                        @error('question')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-lg btn-success">
                            Vložit odpověď
                        </button>                    
                    </div>
                </div>
            </form>            
        </div>        
    </div>
</div>

<!-- ANSWERS -->
@forelse ($answers as $answer) 
    <div class="row">          
        <div class="col-lg-8 p-0 mx-auto">
            @if ($answer->author_id == auth()->user()->id)
                <div class="card border-primary mt-5 w-100">            
            @else
                <div class="card border-secondary mt-5 w-100">            
            @endif            
                <div class="card-header text-right d-flex flex-row justify-content-between">
                    <div class="text-success">{{ $answer->author->name }}</div>
                    <div class="d-flex flex-row">
                        <div>{{ $answer->created_at->diffForHumans() }}</div>                                                        
                    </div>                    
                </div>            
                <div class="card-body">
                    {!! $answer->answer !!}
                </div>                            
            </div>            
        </div>        
    </div>
@empty
    <div class="row">
        <div class="alert alert-success border-success m-0 mt-3 mb-3 w-100" style="font-size: 1.3rem;">
            Zatím neexistují žádné odpovědi.
        </div>  
    </div>
@endforelse

@endsection

@push('scripts')
    <script type="text/javascript" src="{{ asset('//cdn.tinymce.com/4/tinymce.min.js') }}"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: '#answer',
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

