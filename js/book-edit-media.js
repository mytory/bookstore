(function () {
    var media = wp.media({
        title: '표지를 선택해 주세요',
        library: {
            type: 'image'
        },
        button: {
            text: '넣기'
        }
    });

    document.querySelector('.js-open-book-cover-media').addEventListener('click', function () {
        media.open();
    });

    media.on('select', function () {
        var attachment = media.state()
            .get('selection')
            .first()
            .toJSON();

        var imgEl = '<img src="' + attachment.sizes.medium.url + '"/>';

        document.querySelector('.js-book-cover-thumbnail').innerHTML = imgEl;

        document.querySelector('[name="meta[cover_id]"]').value = attachment.id;

    });

}());