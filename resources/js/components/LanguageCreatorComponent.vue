<template>
    <div>
        <button
            @click="openModal"
            type="button"
            class="btn btn-icon"
        >
            <i class="fa fa-plus"></i>
        </button>

        <div :class="{'modal fade' : true, 'show' : showModal}"
             :style="{'display' : showModal? 'block' : 'none'}"
             id="showCreateLanguageModal"
             tabindex="-1" role="dialog"
             aria-labelledby="showCreateLanguageModalTitle" aria-hidden="true"
        >
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="showCreateLanguageModalTitle" v-text="modalTitleText"></h5>
                        <button type="button" class="close"  @click="closeModal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form :action="createRoute" method="POST">
                        <input type="hidden" name="_token" :value="csrf">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="code" v-text="inputLabelText"></label>
                                <input type="text" name="code" id="code"
                                   :class="{'form-control' : true, 'is-invalid' : hasErrors}" :placeholder="inputPlaceholderText"
                                >

                                <div class="invalid-feedback" v-if="hasErrors" v-text="hasErrors"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" @click="closeModal" v-text="closeButtonText"></button>
                            <button type="submit" class="btn btn-primary" v-text="createButtonText"></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                languages: [],
                selected_language: null,
                csrf: '',
                showModal: false
            };
        },
        props: [
            'modalTitleText',
            'closeButtonText',
            'createButtonText',
            'inputLabelText',
            'inputPlaceholderText',
            'hasErrors'
        ],
        computed: {
            createRoute() {
                return route(fullRoute('languages.store'));
            }
        },
        mounted() {
            let token = document.head.querySelector('meta[name="csrf-token"]');

            if (token) {
                this.csrf = token.content;
            }

            if (this.hasErrors) {
                this.showModal = true;
            }
        },
        methods: {
            openModal() {
                this.showModal = true;
            },
            closeModal() {
                this.showModal = false;
            }
        },
        watch: {
            showModal(newValue) {
                if (newValue) {
                    document.body.classList.add('modal-open');
                } else {
                    document.body.classList.remove('modal-open');
                }
            }
        }
    }
</script>
