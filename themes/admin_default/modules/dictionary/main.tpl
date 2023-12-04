<!-- BEGIN: main -->
<form action="" method="post" class="form-group" enctype="multipart/form-data">
    <input type="hidden" name="id" value="{ID}">
    <div class="row">
        <div class="col-24 col-md-24">
            <div class="form-group">
                <label>Từ Tiếng Anh:</label>
                <input type="text" class="form-control" name="words" value="{WORD}" />
            </div>
        </div>
        <div class="col-24 col-md-24">
            <div class="form-group">
                <label>Từ Tiếng Việt:</label>
                <input type="text" name="translation" class="form-control" value="{TRANSLATION}">
            </div>
        </div>
        <div class="col-24 col-md-24">
            <div class="form-group">
                <label>Mô tả :</label>
                <textarea name="description" id="description">{DESCRIPTION}</textarea>
            </div>
        </div>
        <div class="col-24 col-md-24">
            <div class="form-group">
                <label>Phiên âm:</label>
                <input type="text" name="spelling" class="form-control" value="{SPELLING}">
            </div>
        </div>
        <div class="col-24 col-md-24">
            <div class="form-group">
                <label for="loaitu">Chọn loại từ:</label>
                <select name="loaitu" id="loaitu" class="form-control">
                    <!-- BEGIN: loaitu_option -->
                    <option value="{OPTION_VALUE}" {SELECTED}>{OPTION_TEXT}</option>
                    <!-- END: loaitu_option -->
                </select>
            </div>
        </div>
        <div class="col-24 col-md-24">
            <div class="form-group">
                <label>Phát âm</label>
                <input type="file" name="audioFile" class="form-control" value="{AUDIO_PATH}" accept="audio/*">
            </div>
        </div>
        <!-- BEGIN: has_audio -->
        <div class="col-24 col-md-24">
            <audio controls>
                <source src="{AUDIO_PATH}" type="audio/mpeg">
            </audio>
        </div>
        <!-- END: has_audio -->

        <div id="exampleEntries" class="col-24">
            <!-- BEGIN: existing_examples -->
            <div class="row">
                <div class="col-24 col-md-12">
                    <div class="form-group">
                        <label>Ví dụ:</label>
                        <input type="text" name="example[]" class="form-control" value="{EXAMPLE_VALUE}">
                    </div>
                </div>
                <div class="col-24 col-md-12">
                    <div class="form-group">
                        <label>Bản dịch ví dụ:</label>
                        <input type="text" name="example_translation[]" class="form-control" value="{TRANSLATION_VALUE}">
                    </div>
                </div>
            </div>
            <!-- END: existing_examples -->
        </div>
    </div>

    <button type="button" id="addExampleButton" class="btn btn-secondary mt-3">Thêm ví dụ và bản dịch</button>
    <button type="submit" name="submit" id="submit" value="1" class="btn btn-primary mt-3">Lưu</button>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let type = "{ALERT_TYPE}";
        let message = "{ALERT_MESSAGE}";
        let redirectUrl = "{REDIRECT_URL}";

        if (message && type) {
            Swal.fire({
                icon: type,
                title: message,
                showConfirmButton: true
            }).then((result) => {
                if (result.isConfirmed && type === "success" && redirectUrl) {
                    window.location.href = redirectUrl;
                }
            });
        }
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById("addExampleButton").addEventListener("click", function() {
            let exampleSet = document.createElement("div");
            exampleSet.classList.add("row");
            let exampleInput = document.createElement("div");
            exampleInput.classList.add("col-24", "col-md-12");
            exampleInput.innerHTML = '<div class="form-group"><label>Ví dụ:</label><input type="text" name="example[]" class="form-control"></div>';
            exampleSet.appendChild(exampleInput);
            let translationInput = document.createElement("div");
            translationInput.classList.add("col-24", "col-md-12");
            translationInput.innerHTML = '<div class="form-group"><label>Bản dịch ví dụ:</label><input type="text" name="example_translation[]" class="form-control"></div>';
            exampleSet.appendChild(translationInput);
            let exampleEntries = document.getElementById("exampleEntries");
            exampleEntries.insertBefore(exampleSet, exampleEntries.firstChild);
        });
    });
</script>
<script type="text/javascript" src="{NV_BASE_SITEURL}assets/editors/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
    CKEDITOR.replace('description');
</script>
<!-- END: main -->
