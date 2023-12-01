<!-- BEGIN: main -->
<div class="page panel panel-default">
    <div class="panel-body">
        <h3 class="text-center margin-bottom-lg">Tìm kiếm từ điển</h3>
        <div id="search-form" class="text-center">
            <form method="post">
                <div class="form-group">
                    <label class="sr-only">Từ tìm kiếm</label>
                    <input class="form-control" id="search-input" name="search_word" value="{SEARCH_WORD}" placeholder="Nhập từ cần tìm...">
                </div>
                <div class="form-group">
                    <button type="submit" id="search-button" class="btn btn-primary mb-2">Tìm kiếm</button>
                </div>
                <div class="radio">
                    <label class="radio-inline">
                        <input name="rdb" type="radio" value="0" checked>
                        Cả cụm từ
                    </label>
                    <label class="radio-inline">
                        <input name="rdb" type="radio" value="1">
                        Tối thiểu 1 từ
                    </label>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- BEGIN: result -->
<div class="result">
    <!-- BEGIN: word -->
    <div class="word alert alert-success" role="alert">
        <h4 class="alert-heading">Từ: {WORD.words}</h4>
        <p>Nghĩa: {WORD.translation}</p>
        <p>Loại: {WORD.loaitu}</p>
        <p>Mô tả: {WORD.description}</p>
    </div>
    <!-- END: word -->
</div>
<!-- END: result -->

<!-- BEGIN: no_result -->
<div class="no-result alert alert-warning" role="alert">
    Không tìm thấy từ: {SEARCH_WORD}
</div>
<!-- END: no_result -->
<!-- END: main -->
