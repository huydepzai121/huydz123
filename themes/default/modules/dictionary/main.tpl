<!-- BEGIN: main -->
<div id="dictionary-container" class="container mt-4">
    <div id="search-bar" class="row justify-content-center mb-4">
        <form class="form-inline" method="post">
            <div class="form-group mx-sm-3 mb-2">
                <input type="text" class="form-control" id="search-input" name="search_word" value="" placeholder="Nhập từ cần tìm...">
            </div>
            <button type="submit" id="search-button" class="btn btn-primary mb-2">Tìm kiếm</button>
        </form>
    </div>

    <!-- BEGIN: result -->
    <div class="result alert alert-success" role="alert">
        <h4 class="alert-heading">Từ: {FOUND_WORD.words}</h4>
        <p>Nghĩa: {FOUND_WORD.translation}</p>
        <hr>
        <p class="mb-0">Mô tả: {FOUND_WORD.description}</p>
    </div>
    <!-- END: result -->

    <!-- BEGIN: no_result -->
    <div class="no-result alert alert-warning" role="alert">
        Không tìm thấy từ: {SEARCH_WORD}
    </div>
    <!-- END: no_result -->
</div>
<style>
    #dictionary-container {
        max-width: 800px;
        margin: auto;
    }

    #search-bar {
        margin-bottom: 2rem;
    }

    .result, .no-result {
        padding: 1rem;
        border: 1px solid #ddd;
        border-radius: 0.5rem;
        margin-bottom: 1rem;
    }

    .result {
        border-color: #c3e6cb;
    }

    .no-result {
        border-color: #ffeeba;
    }
</style>

<!-- END: main -->
