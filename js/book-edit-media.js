document.querySelector('.js-open-book-cover-media').addEventListener('click', function () {

    var media = wp.media({
        title: '표지를 선택해 주세요',
        library: {
            type: 'image'
        },
        button: {
            text: '넣기'
        }
    });
    media.open();

});