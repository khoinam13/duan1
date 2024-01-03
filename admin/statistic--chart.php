<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
          var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            <?php
            require "backend/connect.php";
            $select = "SELECT * FROM loai_hang";
            $result = mysqli_query($conn,$select);
            while($row = $result->fetch_assoc()){
              $i = 0;
              $selectCount = "SELECT COUNT(*) FROM san_pham WHERE ma_loai_hang = '$row[ma_loai_hang]'";
              $resultCount = mysqli_query($conn,$selectCount);
              $Count = $resultCount->fetch_row(); 
              echo"
                ['".$row['ten_loai_hang']."', ".$Count[$i]."],
                ";
              $i++;
            }
            ?> 
            ])
            
          // ['Work',     11],
          //   ['Eat',      2],
          //   ['Commute',  2],
          //   ['Watch TV', 2],
          //   ['Sleep',    7]

        var options = {
          title: 'TỈ LỆ HÀNG HOÁ'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <?php
        require "partials/header.php";
    ?>
    <div class="container">
        <h2 class="heading">Biểu đồ thống kế</h2>
        <div id="piechart" style="width: 100%; height: 500px;" class="center"></div>  
    </div>
    
  </body>
</html>
