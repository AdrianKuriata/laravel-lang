<div class="mdc-dialog"
     role="alertdialog"
     aria-modal="true"
     aria-labelledby="my-dialog-title"
     aria-describedby="my-dialog-content"
     id="create-language-dialog">
    <div class="mdc-dialog__container">
        <div class="mdc-dialog__surface">
            <!-- Title cannot contain leading whitespace due to mdc-typography-baseline-top() -->
            <h2 class="mdc-dialog__title" id="my-dialog-title">
                <!--
     -->{{trans('laravel-lang::language_picker.create_dialog_title')}}<!--
   -->
            </h2>
            <div class="mdc-dialog__content" id="my-dialog-content">
                <form action="{{route(config('laravel-lang.route') . '.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="mdc-text-field">
                            <input type="text" name="code" id="my-text-field" class="mdc-text-field__input">
                            <label class="mdc-floating-label" for="my-text-field">
                                {{trans('laravel-lang::language_picker.input_language')}}
                            </label>
                            <div class="mdc-line-ripple"></div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-3">
                        <div class="mr-2">
                            <button type="button" class="mdc-button mdc-light" data-mdc-dialog-action="cancel">
                                <span class="mdc-button__label">{{trans('laravel-lang::language_picker.close')}}</span>
                            </button>
                        </div>
                        <div>
                            <button type="button" class="mdc-button mdc-dark save-language">
                                <span class="mdc-button__label">{{trans('laravel-lang::language_picker.create')}}</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="mdc-dialog__scrim"></div>
</div>