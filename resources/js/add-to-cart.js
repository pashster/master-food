$(document).ready(function() {
    $('.add-to-cart').on('click', function (e) {
        e.preventDefault();
        const foodId = $(this).data('food-id');
        const token = $('meta[name="csrf-token"]').attr("content");
        $.ajax({
            method: 'POST',
            url: '/items',
            data: {'_token': token, 'food_id': foodId}
        }).done(response => {
            console.log(response.cart);
            renderHtml(response.cart);
            notification();
        }).fail(response => {
            if (response.status === 302) {
                window.location = response.responseJSON.redirect
            }
        });
    });

    const renderHtml = cart => {
        if ($('.basket').length > 0) {
            $('.basket').replaceWith(cart);
        } else {
            $('.cart-section').prepend(cart);
        }
    };

    const notification = () => {
        alert('Product added successfully.')
    };

    $(document).on('click', '.pqt-minus', function(e) {
        changeItemCount($(this).data('item-id'), 'minus');
    });
    $(document).on('click', '.pqt-plus', function(e) {
        changeItemCount($(this).data('item-id'), 'plus')
    });

    const changeItemCount = (itemId, action) => {
        const token = $('meta[name="csrf-token"]').attr("content");
        $.ajax({
            method: 'PUT',
            url: `/items/${itemId}`,
            data: {'_token': token, 'action': action}
        }).done(response => {
            renderHtml(response.cart)
        })
    }
});
