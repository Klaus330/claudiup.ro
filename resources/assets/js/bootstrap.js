import jQuery from 'jquery';
import Vue from 'vue';
import axios from 'axios';
import Form from './utilities/Form.js';
import swal from 'sweetalert';

window.Vue = Vue;
window.jQuery = jQuery;

window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With']='XMLHttpRequest';

window.Form = Form;