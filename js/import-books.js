jQuery('.js-import').click(function () {
    var $ = jQuery,
        base64EncodedBook = $(this).data('book');

    $.post(ajaxurl, {
        action: 'import_books',
        base64EncodedBook: base64EncodedBook,
    }, function (response) {
        console.log(response);
    }, 'json');
});