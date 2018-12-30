<div class="postbox">

    <h2>목차</h2>
    <hr style="margin: 0">

    <div class="inside">
        <?php
        $meta_toc = get_post_meta(get_the_ID(), 'toc', true);
        wp_editor($meta_toc, 'book_toc', [
            'textarea_name' => 'meta[toc]',
        ]);
        ?>
    </div>

</div>
