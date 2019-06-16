<header class="mdc-top-app-bar mdc-top-app-bar--fixed">
    <div class="mdc-top-app-bar__row">
        <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
            <span class="mdc-top-app-bar__title"><i class="fas fa-language"></i> Devtemple Laravel Lang</span>
        </section>
        <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
            @include('laravel-lang::layouts.partials.search_field')
        </section>
        <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
            <language-selector-component route="{{route('language_selector.index')}}"></language-selector-component>
        </section>
        <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end" role="toolbar">
            <a
                href="#"
                class="mdc-top-app-bar__action-item create-lang-button"
                aria-label="{{trans('laravel-lang::language_picker.create_button_tooltip')}}"
                title="{{trans('laravel-lang::language_picker.create_button_tooltip')}}"
                data-target="#create-language-dialog"
            >
                <i class="fa fa-plus"></i>
            </a>
            <a href="#" class="mdc-top-app-bar__action-item" aria-label="Scan" title="Skanuj w poszukiwaniu nowych elementów"><i class="fab fa-searchengin"></i></a>

            <form action="{{route(config('laravel-lang.route') . '.destroy', ['id' => 1])}}" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit" class="mdc-top-app-bar__action-item" aria-label="{{trans('laravel-lang::language_picker.clear_all_langs_button_tooltip')}}" title="{{trans('laravel-lang::language_picker.clear_all_langs_button_tooltip')}}">
                    <span class="mdc-button__icon fa fa-trash"></span>
                </button>
            </form>
        </section>
    </div>
</header>

@push('bottom')
    @include('laravel-lang::layouts.partials.create_language_dialog')
@endpush