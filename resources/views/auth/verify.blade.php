@extends('base')

@section('title', 'Ověření emailové adresy')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Ověření emailové adresy</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                Odkaz pro ověření byl právě zaslán do Vaší emailové schránky.
                            </div>
                        @endif

                        Předtím, než budete pokračovat, se prosím ujistěte, že jste předtím neobdrželi odkaz pro ověření.
                        Pokud jste takový email neobdrželi,
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">klikněte sem pro odeslání nového</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection