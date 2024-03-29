<?php
use \Sizzle\Report;

if (!logged_in()) {
    header('Location: '.'/');
}

$period = strtolower($_GET['period'] ?? '');
if (!in_array($period, ['weekly', 'monthly'])) {
    $period = 'weekly';
}
if (isset($_GET['reload']) && 'true' === $_GET['reload']) {
    unset($_SESSION['report'][$period.'ResponseRate']);
}

if (isset($_SESSION['report'][$period.'ResponseRate'])) {
    $rates = $_SESSION['report'][$period.'ResponseRate']['data'];
} else {
    $rates = (new Report())->responseRate($period);
    array_pop($rates);
    $_SESSION['report'][$period.'ResponseRate']['data'] = $rates;
    $_SESSION['report'][$period.'ResponseRate']['cached'] = time();
}
$labels = '';
$yes = '';
$no = '';
$maybe = '';
foreach ($rates as $rate) {
  $labels .= "'".($rate['Week Starting'] ?? $rate['Month'])."',";
  $yes .= $rate['Yes %'].',';
  $maybe .= ($rate['Yes %']+$rate['Maybe %']).',';
  $no .= ($rate['Yes %']+$rate['No %']+$rate['Maybe %']).',';
}
$dataObj = '{';
$dataObj .= "labels:[$labels],";
$dataObj .= "datasets:[";
$dataObj .= "{label:'Yes',data:[$yes],backgroundColor:'rgba(75,192,192,1)',borderColor:'rgba(75,192,192,1)',pointRadius:0},";
$dataObj .= "{label:'Maybe',data:[$maybe],backgroundColor:'rgba(255,206,86,1)',borderColor:'rgba(255,206,86,1)',pointRadius:0},";
$dataObj .= "{label:'No',data:[$no],backgroundColor:'rgba(255,99,132,1)',borderColor:'rgba(255,99,132,1)',pointRadius:0}";
$dataObj .= ']}';

date_default_timezone_set('America/Chicago');

define('TITLE', 'Response Rate');
require __DIR__.'/../header.php';
?>
<style>
body {
  background-color: white;
}
#org-info {
  margin-top: 100px;
  color: black;
  text-align: left;
}
</style>
</head>
<body id="visitors">
  <div>
    <?php require __DIR__.'/../navbar.php';?>
  </div>
  <div class="row" id="org-info">
    <div class="col-sm-offset-1 col-sm-10">
      <h1>Response Rates</h1>
      <input id="period-weekly" type="radio" name="period" value="weekly" <?=($period=='weekly' ? 'checked' :'')?>> Weekly
      <input id="period-monthly" type="radio" name="period" value="monthly" <?=($period=='monthly' ? 'checked' :'')?>> Monthly
      <br />
      <canvas id="myChart" width="1000" height="400"></canvas>
      <p>
        * Not counting views from users, IPs matching an IP a user has used, or bots. Ignoring responses
        to test or user email addresses.
        <br />
        ** Report has a one week cache duration
        (<a href="<?=$_SERVER['REQUEST_URI'].(strpos($_SERVER['REQUEST_URI'], '?') ? '&' : '?')?>reload=true">reload</a>).
      </p>
    </div>
  </div>
  <?php require __DIR__.'/../footer.php';?>
  <script src="/js/Chart.min.js"></script>
  <script>
  var ctx = document.getElementById("myChart");
  var myChart = new Chart(ctx, {
      type: 'line',
      data: <?=$dataObj?>,
      options: {
        responsive: false
      }
  });
  $('input[type=radio][name=period]').change(function() {
      window.location = '/report/response_rate?period='+this.value;
  })
  </script>
</body>
</html>
