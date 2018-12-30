<div class="postbox">

    <h2>저자 소개</h2>
    <hr style="margin: 0">

    <div class="inside">
        <?php
        $book_author_intro = get_post_meta(get_the_ID(), 'book_author_intro', true);
        wp_editor($book_author_intro, 'book_author_intro', [
            'textarea_name' => 'meta[book_author_intro]',
            'textarea_rows' => 5
        ]);
        ?>
    </div>

</div>
