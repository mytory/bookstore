<div style="text-align: center;">
    <p>
        <button type="button" class="button  js-open-book-cover-media">표지 넣기</button>
    </p>

    <div class="js-book-cover-thumbnail"></div>

    <input type="hidden" name="meta[cover_id]"
           value="<?= esc_attr(get_post_meta(get_the_ID(), 'cover_id', true)) ?>">
</div>