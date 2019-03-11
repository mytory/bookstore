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
                        <button class="button  js-import" data-book="<?= base64_encode(json_encode($book)) ?>">
                            임포트
                        </button>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    <?php } ?>
</div>