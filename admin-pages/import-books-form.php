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

</div>