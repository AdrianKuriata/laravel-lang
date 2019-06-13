import {MDCSelect} from '@material/select';
import {MDCRipple} from '@material/ripple';
import {MDCDialog} from '@material/dialog';
import {MDCTextField} from '@material/textfield';
import {MDCTextFieldIcon} from '@material/textfield/icon';

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

[].map.call(document.querySelectorAll('.mdc-text-field-icon'), function(el) {
    return new MDCTextFieldIcon(el);
});

[].map.call(document.querySelectorAll('.mdc-button'), function(el) {
    return new MDCRipple(el);
});

[].map.call(document.querySelectorAll('.mdc-select'), function(el) {
    return new MDCSelect(el);
});

[].map.call(document.querySelectorAll('.mdc-text-field'), function(el) {
    return new MDCTextField(el);
});

document.querySelectorAll('[data-toggle="dialog"]').forEach(item => {
    item.addEventListener('click', () => {
        const dialog = new MDCDialog(document.querySelector(item.dataset.target));

        dialog.open();
    });
});

document.addEventListener('DOMContentLoaded', () => {
    document.querySelector('[data-mdc-dialog-action="accept"]').addEventListener('click', e => {
        e.preventDefault();
        const parent = e.target.closest('.mdc-dialog__surface');
        const form = parent.querySelector('form');
        const url = form.action;
        const code = parent.querySelector('[name="code"]').value;

        axios({
            url: url,
            method: 'POST',
            data: {
                code: code
            }
        }).then(d => {
            console.log(d);
        }).catch(error => {
            const errors = error.response.data.errors;

            // for (item in errors) {
            //     // let field = form.querySelector(item);
            //     //
            //     // if (!field) {
            //     //     throw new Error(`This field doesn't exists in this form: ${field}`);
            //     // }
            //     //
            //     // if (field.type != 'hidden') {
            //     //     let errorMessage = '';
            //     //
            //     //     errorMessage = document.createElement('div');
            //     //     let
            //     //     errorMessage.classList.add('mdc-text-field-helper-line');
            //     //     errorMessage.appendChild(this.addErrorMessage(, field));
            //     //
            //     //     field.closest(this.getWhereAppendErrorMessage(field)).appendChild(errorMessage);
            //     //     this.setFieldParentError(field);
            //     }
            // }
        });
    });
});

// window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
//
// const app = new Vue({
//     el: '#app',
// });