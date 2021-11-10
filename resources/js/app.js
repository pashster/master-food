require('./bootstrap');
require('./add-to-cart');
$(document).on('click', '.container .dropdown-menu', function (e) {
    e.stopPropagation();
});
