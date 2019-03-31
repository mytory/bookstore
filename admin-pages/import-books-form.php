<div class="wrap">
    <h1>책 가져오기</h1>

    <form method="get">
        <input type="hidden" name="post_type" value="book">
        <input type="hidden" name="page" value="import-books">

        <table class="form-table">
            <tbody>
            <tr>
                <th scope="row">
                    <label for="query">검색어</label>
                </th>
                <td>
                    <input type="text" id="query" name="query" value="<?= ($_GET['query']) ?? '' ?>">
                </td>
            </tr>
            </tbody>
        </table>

        <p>
            <button type="submit" class="button  button-primary">검색</button>
        </p>

    </form>

</div>