jQuery('.js-import').click(function (e) {
    var $ = jQuery,
        base64EncodedBook = $(this).data('book');

    $.post(ajaxurl, {
        action: 'import_books',
        base64EncodedBook: base64EncodedBook,
    }, function (response) {

        console.log(response);

        if (response.result === 'success') {

            $(e.target)
                .text('가져옴')
                .attr('disabled', true);

            // console.log(response.message);
        }

        if (response.result === 'fail') {
            alert(response.message);
        }

    }, 'json');
});