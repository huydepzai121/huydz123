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
<div class="container mt-5">
    <!-- BEGIN: word -->
    <div class="word-container row">
        <div class="col">
            <h2 class="word-title" id="word-text">
                {WORD.words}
                <small class="word-spelling text-muted">{WORD.spelling}</small>
                <span class="sound-icon" data-audio="{WORD.audioPath}">
                    <i class="fa fa-volume-up" aria-hidden="true"></i><span id="uk"> UK</span>
                </span>
            </h2>
        </div>
    </div>
    <!-- END: word -->
</div>
<!-- END: result -->

<!-- BEGIN: no_result -->
<div class="no-result alert alert-warning" role="alert">
    Không tìm thấy từ: {SEARCH_WORD}
</div>
<!-- END: no_result -->
<style>
    .sound-icon {
        cursor: pointer;
        color: #8f8f8f;
    }
    .sound-icon:hover{
        color:#0a7be9;
    }
    #word-text{
        font-size: 15pt;
        color: #0a7be9;
    }
    #uk{
        font-size: 9pt;
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var soundIcons = document.querySelectorAll('.sound-icon');

        soundIcons.forEach(function(icon) {
            icon.addEventListener('click', function() {
                var audioPath = icon.getAttribute('data-audio');
                var audio = new Audio(audioPath);
                audio.play();
            });
        });
    });
</script>
<!-- END: main -->
