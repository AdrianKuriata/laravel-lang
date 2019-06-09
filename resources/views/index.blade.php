@extends('laravel-lang::layouts.app')

@section('content')
    <ul class="mdc-list mdc-list--two-line border shadow-sm">
        @for($i = 1; $i <= 10; $i++)
            <li class="mdc-list-item" tabindex="0">
                <span class="mdc-list-item__text">
                      <span class="mdc-list-item__primary-text">First-line text</span>
                      <span class="mdc-list-item__secondary-text">EN: Second-line text</span>
                </span>
                <span class="mdc-list-item__meta material-icons" aria-hidden="true">
                    <i class="fa fa-pencil-alt"></i>
                    <i class="fa fa-trash"></i>
                </span>
            </li>
        @endfor
    </ul>
@endsection