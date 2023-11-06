
<!-- BEGIN: main -->
<form action="{FORM_ACTION}" method="post" class="form-group" enctype="multipart/form-data">
    <input type="hidden" name="id" value="{WEATHER.id}">
    <div class="row">
        <div class="col-24 col-md-24">
            <label>Tên thành phố:</label>
            <select name="id_city" id="id_city" class="form-control">
                <!-- BEGIN: city_loop -->
                <option value="{CITY_ID}" {SELECTED_CITY}>{CITY_NAME}</option>
                <!-- END: city_loop -->
            </select>
        </div>
        <div class="col-6 col-md-6">
            <div class="form-group">
                <label>Ngày dự báo:</label>
                <input type="date" class="form-control datepicker" name="date_forecast" autocomplete="off" value="{WEATHER.date_forecast}" />
            </div>
        </div>
        <div class="col-24 col-md-24">
            <div class="col-6 col-md-6">
                <label>Khoảng thời gian:</label>
                <select name="id_time_period" id="id_time_period" class="form-control">
                    <!-- BEGIN: time_loop -->
                    <option value="{TIME_ID}" {SELECTED_TIME}>{TIME_NAME}</option>
                    <!-- END: time_loop -->
                </select>
            </div>
        </div>
        <div class="col-24 col-md-24">
            <div class="form-group">
                <label for="description">Mô tả:</label>

                <textarea name="description" id="description">{WEATHER.description}</textarea>
            </div>
        </div>
        <div class="col-10 col-md-10">
            <div class="form-group">
                <label for="wind_speed">Tốc độ gió:</label>
                <span><input type="number" name="wind_speed" class="form-control" value="{WEATHER.wind_speed}" required>km/h</span>
            </div>
        </div>
        <div class="col-24 col-md-24">
            <div class="form-group">
                <label for="temperature_note">Ghi chú nhiệt độ:</label>
                <textarea name="temperature_note" id="temperature_note" class="form-control" rows="5">{WEATHER.wind_speed}</textarea>
            </div>
        </div>
        <div class="col-10 col-md-10">
            <div class="form-group">
                <label for="temperature_value">Giá trị nhiệt độ:</label>
                <span><input type="number" name="temperature_value" class="form-control" value="{WEATHER.temperature_value}"required> °C</span>
            </div>
        </div>
        <div class="col-24 col-md-24">
            <label>Ảnh đại diện từ máy tính:</label>
            <input type="file" class="form-control-file" name="avatar" accept="image/*"  />
        </div>
    </div>

    <button type="submit" name="submit" id="submit" value="1" class="btn btn-primary mt-5">Lưu</button>
</form>
<script type="text/javascript" src="{NV_BASE_SITEURL}assets/editors/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
    CKEDITOR.replace('description');
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            todayHighlight: true,
            autoclose: true
        });
    });
</script>
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
<script>   document.addEventListener('DOMContentLoaded', function() {
        let type = "{ALERT_TYPE}";
        let message = "{ALERT_MESSAGE}";

        if (message && type) {
            Swal.fire({
                icon: type,
                title: message,
                showConfirmButton: true
            });
        }
    });
</script>
<!-- END: main -->
