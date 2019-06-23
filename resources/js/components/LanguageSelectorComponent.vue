<template>
    <div class="mdc-select">
        <input @change="selectorValueChanged" type="hidden" name="enhanced-select" :value="defaultLanguage? defaultLanguage.code : null">
        <i class="mdc-select__dropdown-icon"></i>
        <div id="demo-selected-text" class="mdc-select__selected-text text-uppercase" role="button" aria-haspopup="listbox"
             aria-labelledby="demo-label demo-selected-text" v-text="defaultLanguage? defaultLanguage.code : ''">
        </div>
        <div class="mdc-select__menu mdc-menu mdc-menu-surface" role="listbox">
            <ul class="mdc-list text-uppercase">
                <li :class="['mdc-list-item', 'd-flex', 'justify-content-between', {'mdc-list-item--selected' : lang.is_default}]" v-for="lang in orderedLanguages" :data-value="lang.code" role="option" :aria-selected="lang.is_default">
                    <span v-text="lang.code"></span>
                    <i v-if="!lang.is_default" class="fa fa-trash" @click="destroyLanguage(lang.code)"></i>
                </li>
            </ul>
        </div>
        <span id="demo-label" v-text="languageTranslations.label" class="mdc-floating-label mdc-floating-label--float-above">
        </span>
        <div class="mdc-line-ripple"></div>
    </div>
</template>

<script>
    import {MDCSelect} from '@material/select';

    export default {
        data() {
            return {
                languages: [],
                languageTranslations: []
            };
        },
        props: [
            'route'
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
        mounted() {
            const $picker = new MDCSelect(document.querySelector('.mdc-select'));

            $picker.listen('MDCSelect:change', e => {
                console.log('changed');
            });
        },
        created() {
            axios({
                url: this.route,
                method: 'GET',
            }).then(d => {
                this.languages = d.data.languages;
                this.languageTranslations = d.data.language_translations;
            });
        },
        methods: {
            selectorValueChanged() {
                console.log("changed?");
            },
            destroyLanguage(code) {
                // @todo Do poprawienia to jest. nie chce coś tutaj działać, wysyła na jakiś dziwny link, nie taki co trzeba.
                axios({
                    url: `${window.location.protocol}//${window.location.host}/laravel-lang/${code}`,
                    method: 'DELETE'
                }).then(d => {
                    console.log(d.data.message);

                    this.languages = this.languages.filter(item => {
                        return item.code != code;
                    });
                });
            }
        }
    }
</script>