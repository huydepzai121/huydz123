<!-- BEGIN: main -->
<div class="search-container">
    <div class="search-header">
        Dự báo thời tiết
    </div>
    <form method="post" action="{WEATHER.url_search}">
        <div class="form-group">
            <select class="form-control" name="city" id="city">
                <option value="">Select a City</option>
                <!-- BEGIN: city_loop -->
                <option value="{CITY.name}" {CITY.selected}>{CITY.name}</option>
                <!-- END: city_loop -->
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
    </form>
</div>
<div class="scroll-table">
    <table class="table table-bordered table-striped">
        <tbody>
        <!-- BEGIN: loop -->
        <tr>
            <td class="text-center">{WEATHER.name}</td>
            <td class="text-center">{WEATHER.date_forecast}</td>
            <td class="forecast-cell">
                <!-- Cấu trúc hiển thị thông tin thời tiết với hình ảnh và mô tả -->
                <div class="weather-icon">
                    <img src="{WEATHER.avatar}" alt="Weather Icon" style="width: 100px;">
                </div>
                <div class="weather-info">
                    <div class="temp-range">{WEATHER.low_temperature}°C - {WEATHER.high_temperature}°C</div>
                    <div class="weather-desc">{WEATHER.description}</div>
                </div>
            </td>
        </tr>
        <!-- END: loop -->
        </tbody>
    </table>
</div>
<!-- Phần hiển thị phân trang -->
<nav aria-label="Page navigation" class="text-center">
    <ul class="pagination">
        <!-- BEGIN: page_loop -->
        <li class="page-item {PAGE.current}"><a class="page-link" href="{PAGE.link}">{PAGE.num}</a></li>
        <!-- END: page_loop -->
    </ul>
</nav>

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

    /* Điều chỉnh khoảng cách cho card dự báo */
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
    .weather-card {
        background: #3a99ff;
        color: white;
        padding: 20px;
        border-radius: 10px;
        text-align: center;
        width: 250px; /* or 100% depending on your layout */
        margin-left: 200px;
        margin-bottom: 50px;
    }

    .weather-card-body {
        margin: 10px 0;
    }

    .city-name {
        font-size: 1.5em;
        margin-bottom: 5px;
    }

    .weather-description {
        margin-bottom: 20px;
    }

    .temperature {
        font-size: 4em;
        margin-bottom: 20px;
    }

    .weather-details .detail-item {
        font-size: 14px;
        margin-bottom: 5px;
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
        overflow-y: auto;
        height: 500px;
        margin-bottom: 20px;
    }
</style>
<!-- END: main -->
