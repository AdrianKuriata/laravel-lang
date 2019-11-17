<template>
    <div class="input-group mb-0">
        <select
                class="form-control"
                name="language_selector"
                v-model="selected_language"
        >
            <option v-text="lang.code" :selected="lang.code == defaultLanguage.code" v-for="lang in orderedLanguages" :value="lang.code"></option>
        </select>
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button"><i class="fa fa-trash" @click="destroyLanguage"></i></button>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                languages: [],
                selected_language: this.defaultLocale,
            };
        },
        props: [
            'labelText',
            'defaultLocale'
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
            destroyLanguage() {
                axios({
                    url: route(fullRoute('languages.destroy'), this.selected_language),
                    method: 'POST',
                    data: {
                        _method: 'DELETE'
                    }
                }).then(d => {
                    this.languages = d.data.languages;
                });
            }
        }
    }
</script>
