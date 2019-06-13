<div class="mdc-select">
    <input type="hidden" name="enhanced-select">
    <i class="mdc-select__dropdown-icon"></i>
    <div id="demo-selected-text" class="mdc-select__selected-text text-uppercase" role="button" aria-haspopup="listbox"
         aria-labelledby="demo-label demo-selected-text">{{config('laravel-lang.locale')}}
    </div>
    <div class="mdc-select__menu mdc-menu mdc-menu-surface" role="listbox">
        <ul class="mdc-list text-uppercase">
            <li class="mdc-list-item mdc-list-item--selected" data-value="{{config('laravel-lang.locale')}}"
                role="option" aria-selected="true">
                {{config('laravel-lang.locale')}}
            </li>
            @foreach ($languages as $lang)
                <li class="mdc-list-item" data-value="{{$lang}}"
                    role="option" aria-selected="true">
                    {{$lang}}
                </li>
            @endforeach
        </ul>
    </div>
    <span id="demo-label" class="mdc-floating-label mdc-floating-label--float-above">
        {{trans('laravel-lang::language_picker.label')}}
    </span>
    <div class="mdc-line-ripple"></div>
</div>