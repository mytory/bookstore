<?php
function get_term_names($taxonomy, $tail_word = '', $is_link = true, $separator = ', ')
{
    $terms = wp_get_post_terms(get_the_ID(), $taxonomy);
    if (count($terms)) {
        $array = [];
        foreach ($terms as $term) {
            if ($is_link) {
                $link = get_term_link($term);
                $array[] = "<a href='{$link}'>{$term->name}</a>";
            } else {
                $array[] = $term->name;
            }
        }
        return implode($separator, $array) . $tail_word;
    }

    return '';
}