(function () {

    function renderCoverAndShowRemoveButton(attachment) {
        var imgEl = '<img src="' + attachment.sizes.medium.url + '"/>';
        document.querySelector('.js-book-cover-thumbnail').innerHTML = imgEl;

        document.querySelector('.js-remove-book-cover').style.display = 'inline-block';
    }

    function initMediaObject() {
        return wp.media({
            title: '표지를 선택해 주세요',
            library: {
                type: 'image'
            },
            button: {
                text: '넣기'
            }
        });
    }

    function bindOpeningMediaLibrary() {
        document.querySelector('.js-open-book-cover-media').addEventListener('click', function () {
            media.open();
        });
    }

    function bindSelectCover() {
        media.on('select', function () {
            var attachment = media.state()
                .get('selection')
                .first()
                .toJSON();

            renderCoverAndShowRemoveButton(attachment);

            document.querySelector('[name="meta[cover_id]"]').value = attachment.id;

        });
    }

    function renderCoverAlreadyHas() {
        if (document.querySelector('[name="meta[cover_id]"]').value) {
            wp.media.attachment(document.querySelector('[name="meta[cover_id]"]').value)
                .fetch()
                .then(renderCoverAndShowRemoveButton);
        }
    }

    function bindRemoveCover() {
        document.querySelector('.js-remove-book-cover').addEventListener('click', function () {
            document.querySelector('[name="meta[cover_id]"]').value = '';
            document.querySelector('.js-book-cover-thumbnail').innerHTML = '';
            this.style.display = 'none';
        });

    }




    var media = initMediaObject();

    bindOpeningMediaLibrary();

    bindSelectCover();

    bindRemoveCover();

    renderCoverAlreadyHas();

}());