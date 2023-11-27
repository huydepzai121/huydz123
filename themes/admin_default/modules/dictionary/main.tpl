
<!-- BEGIN: main -->
<form action="" method="post" class="form-group" enctype="multipart/form-data">
    <input type="hidden" name="id" value="{WEATHER.id}">
    <div class="row">
        <div class="col-24 col-md-24">
            <div class="form-group">
                <label>Từ Tiếng Anh:</label>
                <input type="text" class="form-control " name="words"  value="{WORD}" />
            </div>
        </div>
        <div class="col-24 col-md-24">
            <div class="form-group">
                <label >Từ Tiếng Việt:</label>
                <input type="text" name="translation" class="form-control" value="{TRANSLATION}"></span>
            </div>
        </div>
        <div class="col-24 col-md-24">
            <div class="form-group">
                <label>Mô tả</label>
                <textarea name="description" id="description">{DESCRIPTION}</textarea>
            </div>
            </div>
        </div>
    <button type="submit" name="submit" id="submit" value="1" class="btn btn-primary mt-5">Lưu</button>


</form>
<script>   document.addEventListener('DOMContentLoaded', function() {
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
<script type="text/javascript" src="{NV_BASE_SITEURL}assets/editors/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
    CKEDITOR.replace('description');
</script>
<!-- END: main -->