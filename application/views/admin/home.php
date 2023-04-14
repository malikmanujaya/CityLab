<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
<link rel="stylesheet" href="<?php echo BASEURL.'/public/assets/css/admin.css'?>"/>
<?php include "components/sidenav.php"; ?>   

<div class="main" style="flex-direction:column;">
  <div class="overview">
    <div class="box">
      <div class="right-side">
        <div class="box-topic">Total Sales</div>
        <div class="number">40,876</div>
      </div>
    </div>
    <div class="box">
      <div class="right-side">
        <div class="box-topic">Total Order</div>
        <div class="number">38,876</div>
      </div>
    </div>
    <div class="box">
      <div class="right-side">
        <div class="box-topic">Total Profit</div>
        <div class="number">$12,876</div>
      </div>
    </div>
    <div class="box">
      <div class="right-side">
        <div class="box-topic">Total Return</div>
        <div class="number">11,086</div>
      </div>
    </div>
  </div>
  
  <div class="charts">

    <canvas id="chart1" style='max-width: 600px; max-height: 400px; margin: 60px;'></canvas>

    <?php 
    $name = [];
    $count = [];
    $result=$data['result'];
    if(!empty($result)){
      foreach($result as $data){
        array_push($name,$data[0]);
        array_push($count,$data[1]);
      }
    }else{
      array_push($name,"No Tools Available" );
      array_push($count,0);
    }
    echo '<script>
      var xValues = '.json_encode($name).';
      var yValues = '.json_encode($count).';
      var barColors = "rgba(75, 192, 192, 0.2)";

      new Chart("chart1", {
        type: "bar",
        data: {
          labels: xValues,
          datasets: [{
            label: "# of Inventory Tools",
            data: yValues,
            backgroundColor: barColors,
            borderWidth: 1
          }]
        },
        options: {
          legend: {display: false},
          scales: {
            xAxes: [{
              gridLines:{display: false}
            }]
          },
          title: {
            display: true,
            text: "Inventory Count"
          }
        }
      });
    </script>';

    ?>

<canvas id="chart2" style='max-width: 600px; max-height: 400px; margin: 60px;'></canvas>

<?php 
$name = [];
$count = [];

if(!empty($result)){
  foreach($result as $data){
    array_push($name,$data[0]);
    array_push($count,$data[1]);
  }
}else{
  array_push($name,"No Tools Available" );
  array_push($count,0);
}
echo '<script>
  var xValues = '.json_encode($name).';
  var yValues = '.json_encode($count).';

  new Chart("chart2", {
    type: "doughnut",
    data: {
      labels: xValues,
      datasets: [{
        label: "# of Inventory Tools",
        data: yValues,
        backgroundColor: [
          "rgba(255, 99, 132, 0.2)",
          "rgba(54, 162, 235, 0.2)",
          "rgba(255, 206, 86, 0.2)",
          "rgba(75, 192, 192, 0.2)",
          "rgba(153, 102, 255, 0.2)",
          "rgba(255, 159, 64, 0.2)"
        ],
        borderWidth: 1
      }]
    },
    options: {
      legend: {display: false},
      scales: {
        xAxes: [{
          gridLines:{display: false}
        }]
      },
      title: {
        display: true,
        text: "Inventory Count"
      }
    }
  });
</script>';

?>

  </div>
