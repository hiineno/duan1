<section class="chart">
        <table>
            <thead>
                <tr>
                    <th>Danh mục</th>
                    <th>Số lượng sp</th>
                    <th>Gía cao </th>
                    <th>Gía thấp</th>
                    <th>Trung bình</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($list_thongke as $value) : ?>
                    <tr>
                        <td><?php echo $value["ten_loai"] ?></td>
                        <td><?php echo $value["So_luong"] ?></td>
                        <td><?php echo $value["Gia_cao"] ?></td>
                        <td><?php echo $value["Gia_thap"] ?></td>
                        <td><?php echo $value["Gia_TB"] ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>

        </table>
        <div id="piechart"></div>
    </section>
    <script type="text/javascript">
        // Load google charts
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        // Draw the chart and set the chart values
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Danh mục', 'Thống kê hàng hóa'],
                <?php
                $i = 1;
                $sumCart = count($list_thongke);
                foreach ($list_thongke as $value) {
                    if ($i == $sumCart) $coma = "";
                    else $coma = ",";
                    echo "['" . $value["ten_loai"] . "'," . $value["So_luong"] . "]" . $coma;
                    $i += 1;
                }
                ?>
            ]);

            // Optional; add a title and set the width and height of the chart
            var options = {
                'title': 'Biểu đồ thống kê hàng hóa API',
                'width': 550,
                'height': 400

            };
            // Display the chart inside the <div> element with id="piechart"
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
        }
    </script>