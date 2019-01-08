<style>
    .button-like-text {
        border: 0;
        padding: 0;
        background-color: transparent;
    }
    .color-danger {
        color: #a00;
    }
    .color-danger:hover {
        color: #dc3232;
    }
</style>

<div style="text-align: center;">
    <p>
        <button type="button" class="button  button-primary  js-open-book-cover-media">표지 넣기</button>
    </p>

    <p class="js-book-cover-thumbnail"></p>

    <button type="button" class="button-like-text  color-danger  js-remove-book-cover" style="display: none;">표지 제거</button>

    <input type="hidden" name="meta[cover_id]"
           value="<?= esc_attr(get_post_meta(get_the_ID(), 'cover_id', true)) ?>">
</div>