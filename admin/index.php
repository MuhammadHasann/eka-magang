<?php
session_start();
if (!isset($_SESSION['id_login'])) {
    echo "<script>
    alert('Silakan Login Kembali !');
    window.location = '../index.php';
    </script>";
}else {

$page = "Dashboard";
include '../config/header.php';
?>
    <div id="layoutSidenav_content">
      <main>
          <div class="container-fluid px-4">
            <div class="row">
              <div class="col-xl-4 col-md-6">
                <div class="card bg-primary text-white mb-4">
                  <div class="card-body">Primary Card</div>
                  <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-md-6">
                <div class="card bg-warning text-white mb-4">
                  <div class="card-body">Warning Card</div>
                  <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-md-6">
                <div class="card bg-success text-white mb-4">
                  <div class="card-body">Success Card</div>
                  <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                  </div>
                </div>
              </div>
            </div>
          <div class="col-xl-12">
            <div class="card mb-4">
              <div class="card-header">
                <i class="fas fa-chart-area me-1"></i>
                Dokumen Masuk
              </div>
              <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
            </div>
          </div>
      </main>
    </div>

     <!-- Main content -->
     <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">

        <div class="col-lg-12 col-12">
        <div class="card">
          <div class="card-body">
          <div class="row">
            
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  <?php
include '../config/footer.php';
?>
<!-- Chart -->
<script>
  $.get("../config/chart-connection.php",function(response) {
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#292b2c';
  
    // Area Chart Example
    var data = response.data;
    var max = response.max;
    var ctx = document.getElementById("myAreaChart");
    var myLineChart = new Chart(ctx, {
      type: 'line',
      data: {
        // labels: ["Mar 1", "Mar 2", "Mar 3", "Mar 4", "Mar 5", "Mar 6", "Mar 7", "Mar 8", "Mar 9", "Mar 10", "Mar 11", "Mar 12", "Mar 13"],
        labels: [<?php foreach($data as $d){ echo '"'.$d['date'].'",';}?>],
        datasets: [{
          label: "Sessions",
          lineTension: 0.3,
          backgroundColor: "rgba(2,117,216,0.2)",
          borderColor: "rgba(2,117,216,1)",
          pointRadius: 5,
          pointBackgroundColor: "rgba(2,117,216,1)",
          pointBorderColor: "rgba(255,255,255,0.8)",
          pointHoverRadius: 5,
          pointHoverBackgroundColor: "rgba(2,117,216,1)",
          pointHitRadius: 50,
          pointBorderWidth: 2,
          data: [<?php foreach($data as $d){ echo '"'.$d['total'].'",';}?>],
        }],
      },
      options: {
        scales: {
          xAxes: [{
            time: {
              unit: 'date'
            },
            gridLines: {
              display: false
            },
            ticks: {
              maxTicksLimit: 7
            }
          }],
          yAxes: [{
            ticks: {
              min: 0,
              max: max,
              maxTicksLimit: 5
            },
            gridLines: {
              color: "rgba(0, 0, 0, .125)",
            }
          }],
        },
        legend: {
          display: false
        }
      }
    });
  });
</script>

<!-- <script>
   $(function () {
    //---------------------
    //- STACKED BAR CHART -
    //---------------------
    var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    var barchartData = {
      labels: [
        <?php
$j = mysqli_query($koneksi, "SELECT id_pendaftaran_tanah, MONTH(date_pendaftaran_tanah) AS bulan , COUNT(id_pendaftaran_tanah) AS jumlah FROM pendaftaran_tanah 
WHERE YEAR(date_pendaftaran_tanah) = year(curdate())
GROUP BY MONTH(date_pendaftaran_tanah);;");
if (isset($_POST['tahun'])) {
  # code...
  $j = mysqli_query($koneksi, "SELECT id_pendaftaran_tanah, MONTH(date_pendaftaran_tanah) AS bulan , COUNT(id_pendaftaran_tanah) AS jumlah FROM pendaftaran_tanah 
  WHERE YEAR(date_pendaftaran_tanah) = '$tahun'
  GROUP BY MONTH(date_pendaftaran_tanah);");
}
$org = array();
while ($data = mysqli_fetch_array($j)) {
  $org[] = $data['jumlah'];
  $latin = $bulan[(int)$data['bulan']];
  echo "'$latin',";
}
        ?>
      ],
      datasets: [{
        data: [<?php for ($i=0; $i < count($org) ; $i++) { 
          echo $org[$i].",";
        }
        ?>],
        backgroundColor: [<?php for ($i=0; $i < count($org) ; $i++) { 
          echo "getRandomColor(),";
        }?>],
      }]
    }

    var stackedBarChartOptions = {
      responsive: true,
      maintainAspectRatio: false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true,
          ticks: {
          stepSize: 1,
          min: 0,
        },
        }]
      }
    }

    new Chart(stackedBarChartCanvas, {
      type: 'bar',
      data: barchartData,
      options: stackedBarChartOptions
    })

    function getRandomColor() {
    var letters = '789ABCD'.split('');
    var color = '#';
    for (var i = 0; i < 6; i++ ) {
        color += letters[Math.round(Math.random() * 6)];
    }
    return color;
}
  })
    </script>
    <?php } ?> -->
