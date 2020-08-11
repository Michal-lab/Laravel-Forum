@extends('base')

@section('content')
<div class="row">

    <div class="col-lg-8">
        
        <div class="jumbotron" style="background: transparent!important;">        
            <h1 class="text-center">Kategorie: {{ $questionKind->code }}</h1>
            <hr class="mt-4" />

            <div class="text-center py-3">
              <a href="{{ route('createFromCategory', ['id' => $questionKind->id]) }}" class="btn btn-success btn-lg px-5 py-3">
                <i class="fa fa-arrow-right mr-3"></i>
                Položit nový dotaz ve zvolené kategorii
                <i class="fa fa-arrow-left ml-3"></i>
              </a>
            </div>            
            <hr class="mt-3" />

            <h4 class="text-center text-secondary mt-4">Nově přidaná témata</h4>  

            @forelse ($questions as $question) 
              <div class="card text-center mt-5 border-info">
                <div class="card-header text-success">
                  {{ $question->title }}
                </div>
                <div class="card-body">
                  <h5 class="card-title">{{ $question->description }}</h5>
                  <p class="card-text text-truncate">{{ $question->question }}</p>
                  <a href="{{ route('question.show', ['question' => $question]) }}" class="btn btn-primary">Vstoupit do diskuze</a>
                </div>
                <div class="card-footer text-muted">
                  {{ $question->created_at->diffForHumans() }}                  
                </div>
              </div>
            @empty
              <h5 class="text-center text-primary mt-5">Zatím neexistují žádné diskuze.</h5>  
            @endforelse
        </div>        
    </div>     

</div>
@endsection