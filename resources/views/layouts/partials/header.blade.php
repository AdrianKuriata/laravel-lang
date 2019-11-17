<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm fixed-top">
    <a class="navbar-brand" href="#"><i class="fas fa-language"></i> Devtemple Laravel Lang</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item">
                @include('laravel-lang::layouts.partials.search_field')
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item mr-3">
                <language-selector-component
                    default-locale="{{config('laravel-lang.locale')}}"
                    label-text="{{trans('laravel-lang::language_picker.label')}}"
                ></language-selector-component>
            </li>
            <li class="nav-item">
                <language-creator-component
                    title-text="{{trans('laravel-lang::language_picker.create_button_tooltip')}}"
                ></language-creator-component>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" title="Skanuj w poszukiwaniu nowych elementów"><i class="fab fa-searchengin"></i></a>
            </li>
            <li class="nav-item">
{{--                <form action="{{route(config('laravel-lang.route') . '.destroy', ['id' => 1])}}" method="POST">--}}
{{--                    @csrf--}}
{{--                    @method('DELETE')--}}

{{--                    <button type="submit"--}}
{{--                        class="nav-link btn btn-link"--}}
{{--                        title="{{trans('laravel-lang::language_picker.clear_all_langs_button_tooltip')}}"--}}
{{--                    >--}}
{{--                        <i class="fa fa-trash"></i>--}}
{{--                    </button>--}}
{{--                </form>--}}
            </li>
        </ul>
    </div>
</nav>
