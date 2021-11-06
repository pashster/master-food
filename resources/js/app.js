require('./bootstrap');
$(document).on('click', '.container .dropdown-menu', function (e) {
    e.stopPropagation();
});
