<?php
get_header();

the_post();
?>

    <article class="wrapper">
        <header>
            <h1><?php the_title(); ?></h1>
        </header>

        <aside>
            <?php the_author(); ?>
            | <?php the_date(); ?>
        </aside>

        <div>
            <?php
            echo wp_get_attachment_image(get_the_ID(), "full");
            ?>
        </div>

        <?php
        include_once ABSPATH . 'wp-admin/includes/image.php';
        $path = get_attached_file(get_the_ID());
        $metadata = wp_read_image_metadata($path);
        ?>
        <ul>
            <?php
            foreach (array_filter($metadata) as $k => $v) {
                if ($k === 'created_timestamp') {
                    $v = date('Y-m-d H:i:s', $v);
                }
                ?>
                <li><?= $k ?>: <?= (is_array($v) ? implode(', ', $v) : $v) ?></li>
            <?php } ?>
        </ul>

        <footer>
            <?php
            the_post_navigation([
                'prev_text' => '이 이미지가 포함된 글: <b>%title</b>',
            ]);
            ?>
        </footer>
    </article>


<?php

get_footer();
