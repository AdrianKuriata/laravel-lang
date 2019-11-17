<template>
    <div>
        <button
            @click="openModal"
            type="button"
            class="btn btn-link"
            :title="titleText"
        >
            <i class="fa fa-plus"></i>
        </button>

<!--        <form action="{{route(config('laravel-lang.route') . '.store')}}" method="POST">-->
<!--            @csrf-->
<!--            <div class="form-group">-->
<!--                <div class="mdc-text-field">-->
<!--                    <input type="text" name="code" id="my-text-field" class="mdc-text-field__input">-->
<!--                    <label class="mdc-floating-label" for="my-text-field">-->
<!--                        {{trans('laravel-lang::language_picker.input_language')}}-->
<!--                    </label>-->
<!--                    <div class="mdc-line-ripple"></div>-->
<!--                </div>-->
<!--            </div>-->

<!--            <div class="d-flex justify-content-end mt-3">-->
<!--                <div class="mr-2">-->
<!--                    <button type="button" class="mdc-button mdc-light" data-mdc-dialog-action="cancel">-->
<!--                        <span class="mdc-button__label">{{trans('laravel-lang::language_picker.close')}}</span>-->
<!--                    </button>-->
<!--                </div>-->
<!--                <div>-->
<!--                    <button type="button" class="mdc-button mdc-dark save-language">-->
<!--                        <span class="mdc-button__label">{{trans('laravel-lang::language_picker.create')}}</span>-->
<!--                    </button>-->
<!--                </div>-->
<!--            </div>-->
<!--        </form>-->
    </div>
</template>

<script>
    export default {
        data() {
            return {
                languages: [],
                selected_language: null,
            };
        },
        props: [
            'titleText'
        ],
        computed: {
            defaultLanguage() {
                return this.languages.filter(item => {
                    return item.is_default;
                })[0];
            },
            orderedLanguages() {
                return this.languages.sort((a, b) => {
                    if (a.code < b.code)
                        return -1;
                    if (a.code > b.code)
                        return 1;
                    return 0;
                });
            }
        },
        created() {
            axios({
                url: route(fullRoute('languages.index')),
                method: 'GET',
            }).then(d => {
                this.languages = d.data.languages;
            });
        },
        methods: {
            openModal() {

            }
        }
    }
</script>
