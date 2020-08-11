@extends('base')

@section('content')
<div class="row">

    <div class="col-lg-8">
        
        <div class="jumbotron" style="background: transparent!important;">        
            <h1 class="text-center">Vítejte na našem diskuzním fóru.</h1>
            <p class="lead mt-4 text-center">Můžete zde najít cenné rady a zkušenosti týkající se Vašeho vozu.</p>
            <p class="lead text-center">Pokud nenajdete, co jste hledali, neváhejte se zde zeptat.</p>
            <hr class="mt-4" />

            <div class="text-center py-3">
              <a href="{{ route('question.create') }}" class="btn btn-success btn-lg px-5 py-3">
                <i class="fa fa-arrow-right mr-3"></i>
                Položit nový dotaz
                <i class="fa fa-arrow-left ml-3"></i>
              </a>
            </div>            
            <hr class="mt-3" />

            <h4 class="text-center text-secondary mt-4">Nově přidaná témata</h4>  

            @forelse ($questions as $question) 
              <div class="card text-center mt-5 border-info">
                <div class="card-header text-success">
                  <div class="d-flex flex-row justify-content-between">
                    <div>
                      {{ $question->title }}
                    </div>
                    <div>
                      <strong>{{ $question->questionKind->code }}</strong>
                    </div>
                  </div>                                    
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

  <!-- Sidebar Widgets Column -->
  <div class="col-md-4">

    <!-- Search Widget -->
    <div class="card my-4">
      <h5 class="card-header">Vyhledávání</h5>
      <div class="card-body">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Vyhledat...">
          <span class="input-group-append">
            <button class="btn btn-secondary" type="button">Najít</button>
          </span>
        </div>
      </div>
    </div>

    <!-- Categories Widget -->
    <div class="card my-4">
      <h5 class="card-header">
        Kategorie
      </h5>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-6">
            <ul class="list-unstyled mb-0">
              @foreach ($categories as $category)
                <li>
                  <a href="{{ route('questionKind.show', ['questionKind' => $category]) }}">{{ $category->code }}</a>
                </li>
              @endforeach
            </ul>
          </div>          
        </div>
      </div>
    </div>   

  </div>

</div>
<!-- /.row -->

@endsection