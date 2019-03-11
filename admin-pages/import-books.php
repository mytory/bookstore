<div class="wrap">
    <h1>책 가져오기</h1>

    <form method="post">
        <table class="form-table">
            <tbody>
            <tr>
                <th scope="row">
                    <label for="query">검색어</label>
                </th>
                <td>
                    <input type="text" id="query" name="query">
                </td>
            </tr>
            </tbody>
        </table>

        <?php
        submit_button('검색');
        ?>

    </form>


    <?php
    $url = 'https://dapi.kakao.com/v3/search/book?';
    $query_string = http_build_query([
        'query' => '미움받을 용기',
    ]);

    $args = [
        'httpversion' => '1.1',
        'headers' => [
           'Authorization' => 'KakaoAK 0fc0c2dc50f30e94f25eacdbfc49e436',
        ],
    ];

    $response = wp_remote_get($url . $query_string, $args);
    $response_code = wp_remote_retrieve_response_code($response);
    $response_message = wp_remote_retrieve_response_message($response);
    $headers = wp_remote_retrieve_headers($response);
    $body = json_decode(wp_remote_retrieve_body($response));
    ?>
    </pre>
    <?php

    if ($response_code !== 200) {
        ?>
        <h2>에러: <?= $body->errorType ?></h2>
        <p><?= $body->message ?></p>
        <?php
    } else {
        ?>
        <h2>검색 결과</h2>
        <pre>
            <?php var_dump($body) ?>
        </pre>

        <?php
    }

    ?>


</div>