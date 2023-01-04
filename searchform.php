<form role="search" method="get" id="searchform" action="<?= home_url('/') ?>">
    <div>
        <label class="screen-reader-text" for="s">검색:</label>
        <input type="text" value="<?= get_search_query() ?>" name="s" id="s">
        <button>검색</button>
    </div>
</form>