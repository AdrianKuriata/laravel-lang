import {MDCSelect} from '@material/select';
import {MDCRipple} from '@material/ripple';
import {MDCDialog} from '@material/dialog';
import {MDCTextField} from '@material/textfield';
import {MDCTextFieldIcon} from '@material/textfield/icon';

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

        dialog.listen('MDCDialog:opened', e => {
            // Zapytanie do serwera, ale najpierw Vue.js ogarnąć
        });
    });
});