@extends('laravel-lang::layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-1">
        <h4>Translations for: PL</h4>
        <h4 class="badge badge-primary" title="Number of translations found for current selected language.">40</h4>
    </div>

    <div class="list-group shadow-sm">
        @for($i = 1; $i <= 10; $i++)
        <a href="#" class="list-group-item list-group-item-action rounded-0">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-1">Your translation</h5>
                    <small>Key from translation file</small>
                </div>
                <div>
                    <button type="button" class="btn btn-icon mr-2"><i class="fa fa-trash"></i></button>
                    <button type="button" class="btn btn-icon"><i class="fa fa-pencil-alt"></i></button>
                </div>
            </div>
        </a>
        @endfor
    </div>
@endsection
