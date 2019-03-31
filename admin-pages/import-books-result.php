<div class="wrap">
    <?php
    if ($response_code !== 200) {
        ?>
        <h2>에러: <?= $body->errorType ?></h2>
        <p><?= $body->message ?></p>
        <?php
    } else {
        ?>
        <h2>검색 결과</h2>


        <p><?= number_format($body->meta->total_count) ?>개</p>


        <table class="wp-list-table  widefat  striped">
            <thead>
            <tr>
                <th scope="col">표지</th>
                <th scope="col">제목</th>
                <th scope="col">저자</th>
                <th scope="col">출판사</th>
                <th scope="col">발행일</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($body->documents as $book) { ?>
                <tr>
                    <td><img height="100" src="<?= $book->thumbnail ?>" alt=""></td>
                    <td><?= $book->title ?></td>
                    <td><?= implode(', ', $book->authors) ?></td>
                    <td><?= $book->publisher ?></td>
                    <td nowrap><?= date('Y-m-d', strtotime($book->datetime)) ?></td>
                    <td nowrap>
                        <?php if ($book->is_duplication) { ?>
                            있음
                        <?php } else { ?>
                            <button class="button  js-import" data-book="<?= base64_encode(json_encode($book)) ?>">
                                가져오기
                            </button>
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    <?php } ?>

    <?php if (!$body->meta->is_end) { ?>
        <p style="text-align: center;">

            <?php if ($request_page > 1) { ?>
                <a href="?post_type=book&page=import-books&query=<?= $_GET['query'] ?>&request_page=<?= $request_page - 1 ?>">
                    이전 페이지</a>
                |
            <?php } ?>

            <?php if (!$body->meta->is_end) { ?>
                <a href="?post_type=book&page=import-books&query=<?= $_GET['query'] ?>&request_page=<?= $request_page + 1 ?>">
                    다음 페이지
                </a>
            <?php } else { ?>
                마지막 페이지
            <?php } ?>
        </p>
    <?php } ?>

</div>