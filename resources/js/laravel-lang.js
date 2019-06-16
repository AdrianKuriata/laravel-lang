// import {MDCSelect} from '@material/select';
import {MDCRipple} from '@material/ripple';
import {MDCDialog} from '@material/dialog';
import {MDCTextField} from '@material/textfield';
import {MDCTextFieldIcon} from '@material/textfield/icon';
import {MDCSnackbar} from '@material/snackbar';

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


window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const files = require.context('./', true, /\.vue$/i);
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
//
const app = new Vue({
    el: '#app',
});

[].map.call(document.querySelectorAll('.mdc-text-field-icon'), function (el) {
    return new MDCTextFieldIcon(el);
});

[].map.call(document.querySelectorAll('.mdc-button'), function (el) {
    return new MDCRipple(el);
});

/*[].map.call(document.querySelectorAll('.mdc-select'), function (el) {
    return new MDCSelect(el);
});*/

[].map.call(document.querySelectorAll('.mdc-text-field'), function (el) {
    return new MDCTextField(el);
});

function initSnackbars()
{
    [].map.call(document.querySelectorAll('.mdc-snackbar'), function(el) {
        return new MDCSnackbar(el);
    });
}

initSnackbars();

document.querySelector('.create-lang-button').addEventListener('click', e => {
    const item = e.currentTarget;
    const dialog = new MDCDialog(document.querySelector(item.dataset.target));
    dialog.open();
});

function getPreparedFieldName(name) {
    let splited_name = name.split('.');
    let formated_name;

    for (let n in splited_name) {
        if (n == 0) {
            formated_name = splited_name[n];
        } else {
            formated_name += splited_name.length == 2 && (/\d/).test(splited_name[n]) ? '[]' : `[${splited_name[n]}]`;
        }
    }

    return `[name${splited_name.length == 2 && (/\d/).test(splited_name[n]) ? '^' : ''}="${formated_name}"]`;
}

document.addEventListener('DOMContentLoaded', () => {
    document.querySelector('.save-language').addEventListener('click', e => {
        e.preventDefault();
        const parent = e.target.closest('.mdc-dialog__surface');
        const form = parent.querySelector('form');
        const url = form.action;
        const code = parent.querySelector('[name="code"]').value;

        form.querySelectorAll('.mdc-text-field--invalid').forEach(item => {
            item.classList.remove('mdc-text-field--invalid');
        });

        form.querySelectorAll('.mdc-text-field-helper-line').forEach(item => {
            item.remove();
        });

        axios({
            url: url,
            method: 'POST',
            data: {
                code: code
            }
        }).then(d => {
            if (d.data.message) {
                console.log(d.data.message);
            }

            if (d.status == 200) {
                app.$children[0].languages.push({
                    code: code,
                    is_default: false
                });
            }
        }).catch(error => {
            if (error.response) {
                const errors = error.response.data.errors;

                for (let item in errors) {
                    let field = form.querySelector(getPreparedFieldName(item));

                    if (!field) {
                        throw new Error(`This field doesn't exists in this form: ${field}`);
                    }

                    if (field.type != 'hidden') {
                        let errorContainer;
                        let errorMessage;

                        errorMessage = document.createElement('p');
                        errorMessage.classList.add('mdc-text-field-helper-text', 'mdc-text-field-helper-text--persistent', 'mdc-text-field-helper-text--validation-msg');
                        errorMessage.innerText = errors[item];

                        errorContainer = document.createElement('div');
                        errorContainer.classList.add('mdc-text-field-helper-line');
                        errorContainer.appendChild(errorMessage);

                        field.closest('.form-group').appendChild(errorContainer);
                        field.closest('.mdc-text-field').classList.add('mdc-text-field--invalid');
                    }
                }
            }
        });
    });
});