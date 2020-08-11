@extends('base')

@section('content')
<nav class="mt-4">
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-role-tab" data-toggle="tab" href="#nav-role" role="tab" aria-controls="nav-role" aria-selected="true">Témata</a>        
    <a class="nav-item nav-link" id="nav-user-tab" data-toggle="tab" href="#nav-user" role="tab" aria-controls="nav-user" aria-selected="false">Uživatelé</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active mt-4" id="nav-role" role="tabpanel" aria-labelledby="nav-role-tab">
    <a href="{{ route('admin.questionKindCreate') }}" class="btn btn-lg btn-success mb-4">Založit nové téma</a>
        <table class="table table-striped table-bordered table-responsive-md">
            <thead>
            <tr>
                <th>Kód</th>
                <th>Popis</th>  
                <th></th>              
            </tr>
        </thead>
        <tbody>
           
            @forelse ($categories as $category)
                <tr>
                    <td>{{ $category->code }}</td>
                    <td>{{ $category->description }}</td>                    
                    <td>
                        <div class="text-center">
                            <a href="#" class="btn btn-sm btn-success">
                                <i class="fa fa-edit mr-1"></i>
                                Editovat                                
                            </a>
                            @if ($category->questions->isEmpty())     
                                <a href="#" onclick="event.preventDefault(); $('#questionKind-delete-{{ $category->id }}').submit();" class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash mr-1"></i>
                                    Smazat                                
                                </a>
                                <form action="{{ route('admin.questionKindDestroy', ['questionKind' => $category]) }}" method="POST" id="questionKind-delete-{{ $category->id }}" class="d-none">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            @else
                                <button class="btn btn-sm btn-danger" disabled>
                                    <i class="fa fa-trash mr-1"></i>
                                    Smazat                                
                                </button>                                
                            @endif                                                                               
                        </div>                        
                    </td>                    
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">
                        Neexistují žádné kategorie
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
  </div>    
  <div class="tab-pane fade mt-4" id="nav-user" role="tabpanel" aria-labelledby="nav-user-tab">
    <table class="table table-striped table-bordered table-responsive-md mt-4">
        <thead>
            <tr>
                <th>Jméno</th>
                <th>Email</th>                
                <th>Email ověřen</th>   
                <th>Datum registrace</th>                
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>                    
                    <td>{{ $user->email_verified_at ? $user->email_verified_at->isoFormat('LLL') : '' }}</td>    
                    <td>{{ $user->created_at->isoFormat('LLL') }}</td>                    
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">
                        Neexistují žádní uživatelé
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
  </div>
</div>
@endsection