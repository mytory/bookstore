<table class="form-table">
<tbody>
<tr>
    <th><label for="subtitle_head">앞부제</label></th>
    <td>
        <input type="text" name="meta[subtitle_head]" id="subtitle_head" class="regular-text"
               value="<?= esc_attr(get_post_meta(get_the_ID(), 'subtitle_head', true)) ?>">
    </td>
</tr>
<tr>
    <th><label for="subtitle_tail">뒷부제</label></th>
    <td>
        <input type="text" name="meta[subtitle_tail]" id="subtitle_tail" class="regular-text"
               value="<?= esc_attr(get_post_meta(get_the_ID(), 'subtitle_tail', true)) ?>">
    </td>
</tr>
<tr>
    <th><label for="price">가격</label></th>
    <td>
        <input type="tel" name="meta[price]" id="price" class="regular-text"
               value="<?= esc_attr(get_post_meta(get_the_ID(), 'price', true)) ?>"
               pattern="[0-9]+" title="숫자로만 적어 주세요">
    </td>
</tr>
<tr>
    <th><label for="published_date">발행일</label></th>
    <td>
        <input type="date" name="meta[published_date]" id="published_date" class="regular-text"
               value="<?= esc_attr(get_post_meta(get_the_ID(), 'published_date', true)) ?>">
    </td>
</tr>
<tr>
    <th><label for="pages">페이지수</label></th>
    <td>
        <input type="tel" name="meta[pages]" id="pages" class="small-text"
               value="<?= esc_attr( get_post_meta( get_the_ID(), 'pages', true ) ) ?>"
               pattern="[0-9]+" title="숫자로만 적어 주세요">
    </td>
</tr>
<tr>
    <th><label for="isbn">ISBN</label></th>
    <td>
        <input type="text" name="meta[isbn]" id="isbn" class="regular-text"
               value="<?= esc_attr( get_post_meta( get_the_ID(), 'isbn', true ) ) ?>">
    </td>
</tr>
<tr>
    <th>추천 책 여부</th>
    <td>
        <label style="margin-right: 1em;">
            <input type="radio" name="meta[is_recommended]" value="1"
				<?= ( get_post_meta( get_the_ID(), 'is_recommended', true ) ) ? 'checked' : '' ?>>
            예
        </label>

        <label>
            <input type="radio" name="meta[is_recommended]" value="0"
				<?= ( ! get_post_meta( get_the_ID(), 'is_recommended', true ) ) ? 'checked' : '' ?>>
            아니오
        </label>
    </td>
</tr>
</tbody>
</table>