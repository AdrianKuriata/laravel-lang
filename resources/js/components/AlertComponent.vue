<template>
    <div :class="[{'alert alert-dismissible fade' : true, 'show' : showAlert}, alertType]" :style="{display : showAlert? 'block' : 'none'}" role="alert">
        {{message}}
        <button type="button" class="close" @click="close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                showAlert: true
            };
        },
        props: [
            'message',
            'type'
        ],
        computed: {
            alertType() {
                return `alert-${this.type}`;
            }
        },
        methods: {
            close() {
                this.showAlert = false;
            }
        }
    }
</script>
