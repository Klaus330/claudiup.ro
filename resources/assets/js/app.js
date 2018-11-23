import "./bootstrap.js";



Vue.component('contact-form', require('./components/ContactForm.vue'));
Vue.component('wysiwyg', require('./components/Wysiwyg.vue'));
Vue.component('project-type-list', require('./components/ProjectTypeList.vue'));
Vue.component('multiple-select', require('./components/MultipleSelect.vue'));
Vue.component('validate-button', require('./components/ValidateButton.vue'));
Vue.component('delete-button', require('./components/DeleteButton.vue'));
Vue.component('book', require('./components/Book.vue'));
Vue.component('comment', require('./components/Comment.vue'));
Vue.component('comment-form', require('./components/CommentForm.vue'));

new Vue({
    el: '#app',
});


