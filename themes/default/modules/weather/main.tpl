<!-- BEGIN: main -->

<h1 class="text-center mb-5">Dự báo thời tiết</h1>
<div class="d-flex justify-content-end mb-5 text-center">
    <form class="form-inline" method="post" action="">
        <select class="form-control" name="id_city">
            <!-- BEGIN: city_loop -->
            <option value="{CITY.name}" {CITY.selected}>{CITY.name}</option>
            <!-- END: city_loop -->
        </select>
        <button class="btn btn-outline-success" type="submit" name="submit">Tìm kiếm</button>
    </form>
</div>

<!-- Kiểm tra xem form đã được submit hay chưa -->
<!-- IF !IS_SUBMIT -->
<!-- Hiển thị bảng khi không có submit -->
<!-- BEGIN: table_loop -->
<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>Thành phố</th>
        <th>Thời gian</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>{WEATHER.name}</td>
        <td>{WEATHER.date_forecast}</td>
        <td class="forecast-cell" rowspan="4">
            <div class="icons">
                <img src="{WEATHER.avatar}" alt="Cloudy" width="42.35px" height="42.35px">
            </div>
            <div class="temp-range">{WEATHER.low_temperature}°C - {WEATHER.high_temperature}°C</div>

            <div class="weather-desc">{WEATHER.description}</div>
        </td>
    </tr>
    </tbody>
</table>
<!-- END: table_loop -->
<!-- ELSE -->
<!-- Hiển thị card khi có submit -->
<div class="row justify-content-center mb-5">
    <!-- BEGIN: loop -->
    <div class="weather-card mb-4 mt-5">
        <div class="weather-card-body">
            <div class="city">{WEATHER.name}</div>
            <div class="date_forecast">{WEATHER.date_forecast}</div>
            <div class="description">{WEATHER.description}</div>
            <div class="temperature">{WEATHER.low_temperature}°C - {WEATHER.high_temperature}°C</div>
            <div class="weather-details">
                <div class="detail-item">Gió: {WEATHER.wind_speed} km/h</div>
            </div>
            <div class="weather-details">
                <div class="detail-item">Lượng mưa: {WEATHER.rain} mm</div>
            </div>
        </div>
    </div>
    <!-- END: loop -->
</div>
<!-- ENDIF -->

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
        background: #428bca;
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
        font-size: 0.9em;
        margin-bottom: 5px;
    }

    /* Add more styles as needed */
    .forecast-cell {
        font-family: 'Arial', sans-serif;
        color: #333;
        text-align: center;
    }

    .temp-range {
        font-size: 1.2em;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .icons img {
        width: 20px; /* Adjust as needed */
        height: 20px; /* Adjust as needed */
        margin-right: 5px; /* Space between icons */
    }

    .weather-desc {
        font-size: 0.8em;
    }
</style>
<!-- END: main -->
