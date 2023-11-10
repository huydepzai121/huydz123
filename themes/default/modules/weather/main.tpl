<!-- BEGIN: main -->
<div class="search-container">
    <div class="search-header">
        Dự báo thời tiết
    </div>
    <form method="post" action="" id="weather-form">
        <div class="form-group">
            <select class="form-control" name="id_city" id="id_city">
                <!-- BEGIN: city_loop -->
                <option value="{CITY.name}" {CITY.selected}>{CITY.name}</option>
                <!-- END: city_loop -->
            </select>
        </div>
        <button type="submit" class="btn search-button" name="submit">Tìm kiếm</button>
    </form>
</div>

<!-- IF !IS_SUBMIT -->

<div class="scroll-table">
    <table class="table table-bordered table-striped" id="weather-table">

        <tbody>
        <!-- BEGIN: table_loop -->
        <tr>
            <td class="text-center">{WEATHER.name}</td>
            <td class="text-center">{WEATHER.date_forecast}</td>
            <td class="forecast-cell">
                <div class="weather-icon">
                    <img src="{WEATHER.avatar}" alt="Weather Icon" style="width: 100px;">
                </div>
                <div class="weather-info">
                    <div class="temp-range">{WEATHER.low_temperature}°C - {WEATHER.high_temperature}°C</div>
                    <div class="weather-desc">{WEATHER.description}</div>
                </div>
            </td>
        </tr>
        <!-- END: table_loop -->
        </tbody>
    </table>
</div>

<!-- ENDIF -->
<!-- ELSE -->
<div class="weather-forecast-container">
    <div class="weather-forecast">
        <!-- BEGIN: loop -->
        <div class="weather-card">
            <div class="date">{WEATHER.date_forecast}</div>
            <div class="icon"><img src="{WEATHER.avatar}" alt="" /></div>
            <div class="temp-high">{WEATHER.high_temperature}°C</div>
            <div class="temp-low">{WEATHER.low_temperature}°C</div>
            <div class="humidity">{WEATHER.rain}mm</div>
            <div class="wind">{WEATHER.wind_speed}m/s</div>
            <div class="description">{WEATHER.description}</div>
        </div>
        <!-- END: loop -->
    </div>
</div>

<!-- Styles và scripts cần thiết cho main.tpl -->
<style>
    .custom-card-header {
        background-color: #4CAF50; /* Green background for header */
        color: white;
        border-bottom: 2px solid #ddd;
        padding: 10px;
    }

    .custom-card {
        border: 2px solid #ddd; /* Solid border for the card */
        border-radius: 5px;
        background-color: #f7f7f7; /* Light grey background for card */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .custom-card-body {
        padding: 20px;
    }

    .pagination .page-item.active .page-link {
        background-color: #4CAF50;
        border-color: #4CAF50;
    }

    .pagination .page-link {
        color: #4CAF50;
    }

    .pagination .page-link:hover {
        background-color: #4CAF50;
        color: white;
    }

    .pagination .page-item.disabled .page-link {
        color: #ccc;
    }
    /* Tăng khoảng cách ở dưới tiêu đề */
    h1.text-center {
        margin-bottom: 40px;
    }

    /* Điều chỉnh khoảng cách của form tìm kiếm */
    .form-inline {
        margin-bottom: 30px;
    }

    /* Khung tìm kiếm và nút tìm kiếm */
    .form-control {
        margin-right: 10px;
    }

    .btn-outline-success {
        margin-top: 5px;
        margin-right: 5px;
    }

    .custom-card {
        margin-top: 30px;
        margin-bottom: 30px;
    }

    .custom-card-header {
        padding: 15px;
    }

    .custom-card-body {
        padding: 25px;
    }

    /* Điều chỉnh khoảng cách cho phần phân trang */
    .pagination {
        margin-top: 40px;
    }

    .page-item {
        margin-right: 5px;
    }
    .weather-forecast-container {
        overflow-x: auto; /* Cho phép cuộn ngang nếu nội dung không vừa */
    }

    .weather-forecast {
        display: flex;
        flex-wrap: nowrap; /* Ngăn các thẻ chuyển sang hàng mới để cho phép cuộn ngang */
        gap: 10px; /* Khoảng cách giữa các thẻ */
        justify-content: flex-start; /* Căn các thẻ từ trái sang phải */
    }

    .weather-card {
        border: 1px solid #ccc;
        padding: 10px;
        text-align: center;
        flex: 0 0 180px; /* Đặt chiều rộng cố định cho mỗi thẻ và ngăn chúng co giãn */
        /* Bỏ thuộc tính max-width vì không cần thiết nữa khi sử dụng flex-wrap: nowrap; */
    }

    /* Phần này đảm bảo rằng ảnh thời tiết sẽ có kích thước phù hợp */
    .icon img {
        width: 50px; /* Hoặc kích thước mà bạn mong muốn */
        height: auto;
    }

    .date, .temp-high, .temp-low, .humidity, .wind, .description {
        margin-bottom: 5px; /* Khoảng cách giữa các dòng thông tin */
    }



    /* Add more styles as needed */
    .forecast-cell {
        display: flex;
        align-items: center;
        justify-content: start;
        width: 100%; /* Or your desired width */


    }

    .weather-icon {
        flex: none; /* Don't grow or shrink */
        margin-right: 10px; /* Adjust space between the icon and the info */
    }

    .weather-info {
        flex: 1;
        text-align: left;
        padding-left: 50px;
    }

    .temp-range {
        font-weight: bold;
        /* Add other styles as needed */
    }

    .weather-desc {
        /* Add other styles as needed */
    }

    .search-container {
        /* Đã chuyển các thuộc tính từ .search-card */
        background: linear-gradient(to right, #e6f7ff, #b3e0ff); /* Light blue background */
        padding: 32px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1); /* Bóng mờ */
        width: 100%;
        border-radius: 0.5rem; /* Bo góc */
        margin-bottom: 50px;
    }

    .search-header {
        font-size: 32px;
        color: #333333;
        margin-bottom: 16px;
        text-align: center;
    }

    .search-button {
        background: #007bff; /* Màu nền của nút */
        border: none;
        padding: 8px 16px;
        border-radius: 4px;
        color: white;
        text-transform: uppercase;
        font-weight: bold;
        width: 100%; /* Chiều rộng toàn bộ */
    }
    .style-table{
        background: #3d7fbc;
        color: #fff;
    }
    .scroll-table{
        overflow-y: scroll;
        max-height: 1000px;
        margin-bottom: 20px;
    }
    .weather-forecast-container {
        overflow-x: scroll; /* Cho phép cuộn ngang nếu nội dung không vừa */
        width: 840px;
    }

    .weather-forecast {
        display: flex;
        flex-wrap: nowrap; /* Ngăn các thẻ chuyển sang hàng mới để cho phép cuộn ngang */
        gap: 10px; /* Khoảng cách giữa các thẻ */
        justify-content: flex-start; /* Căn các thẻ từ trái sang phải */
    }

    .weather-card {
        border: 1px solid #ccc;
        padding: 10px;
        text-align: center;
        flex: 0 0 180px; /* Đặt chiều rộng cố định cho mỗi thẻ và ngăn chúng co giãn */
        /* Bỏ thuộc tính max-width vì không cần thiết nữa khi sử dụng flex-wrap: nowrap; */
    }

    /* Phần này đảm bảo rằng ảnh thời tiết sẽ có kích thước phù hợp */
    .icon img {
        width: 50px; /* Hoặc kích thước mà bạn mong muốn */
        height: auto;
    }

    .date, .temp-high, .temp-low, .humidity, .wind, .description {
        margin-bottom: 5px; /* Khoảng cách giữa các dòng thông tin */
    }
</style>
<script>
    document.getElementById("weather-form").addEventListener("submit", function(event) {
        // Ngăn chặn việc submit form mặc định
        event.preventDefault();

        // Kiểm tra xem form đã được submit hay chưa
        var isSubmit = /* Thực hiện kiểm tra ở đây */;

        if (isSubmit) {
            // Nếu form đã được submit, ẩn bảng bằng cách đặt display thành none
            document.getElementById("weather-table").style.display = "none";

            // Đặt chiều cao của scrollable area thành auto sau khi submit
            document.querySelector(".scroll-table").style.height = "auto";
        }
    });

    // JavaScript để đặt chiều cao của scrollable area
    var scrollTable = document.querySelector(".scroll-table");
    scrollTable.style.height = "500px"; // Đặt chiều cao mặc định
</script>
<!-- END: main -->
