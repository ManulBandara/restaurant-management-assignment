$(document).ready(function () {
    // Show food picture when you pick one
    $('#image').change(function (e) {
        const reader = new FileReader();
        reader.onload = function (e) {
            $('#imagePreview').attr('src', e.target.result).show();
        };
        reader.readAsDataURL(e.target.files[0]);
    });

    // Check forms so you don't forget anything
    $('#concessionForm, #orderForm').on('submit', function (e) {
        const $form = $(this);
        $form.find('.text-danger').remove();
        $form.find('.is-invalid').removeClass('is-invalid');

        let isValid = true;
        $form.find('[required]').each(function () {
            if (!$(this).val()) {
                $(this).addClass('is-invalid');
                $(this).after('<div class="text-danger">Please fill this!</div>');
                isValid = false;
            }
        });

        if (!isValid) {
            e.preventDefault();
        }
    });

    // Refresh kitchen orders every 30 seconds
    setInterval(refreshOrders, 30000);
});

// Refresh kitchen orders
function refreshOrders() {
    $.ajax({
        url: '/kitchen',
        method: 'GET',
        success: function (data) {
            const newContent = $(data).find('#kitchenTable tbody').html();
            $('#kitchenTable tbody').html(newContent);
        },
        error: function () {
            console.log('Oops, something went wrong!');
        }
    });
}