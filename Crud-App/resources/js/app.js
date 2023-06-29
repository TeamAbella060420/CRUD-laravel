import './bootstrap';
import 'datatables.net-dt';

import $ from 'jquery';
window.$ = window.jQuery = $;
$(document).ready(function() {
    $('table').DataTable();
});