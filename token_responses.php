<?php
use \GiveToken\RecruitingTokenResponse;

require_once __DIR__.'/config.php';
_session_start();
if (!logged_in()) {
    header('Location: '.$app_root);
}
//echo '<pre>';print_r($_SESSION);die;

define('TITLE', 'GiveToken.com - Token Responses');
require __DIR__.'/header.php';
?>
<style>
body {
  background-color: white;
}
#responses-table {
  margin-top: 100px;
  color: black;
}
</style>
</head>
<body id="token-responses">
  <div>
    <?php require __DIR__.'/navbar.php';?>
  </div>
  <div class="row">
    <div class="col-sm-offset-3 col-sm-6">
      <table id="responses-table" class="table table-striped table-hover">
        <thead>
          <th>Token</th>
          <th>Email</th>
          <th>Response</th>
          <th>Date &amp; Time (CST)</th>
        </thead>
        <tbody>
          <?php
          $RecruitingTokenResponse = new RecruitingTokenResponse();
          $responses = $RecruitingTokenResponse->get($_SESSION['user_id']);
          foreach ($responses as $response) {
              echo '<tr>';
              echo "<td><a href=\"/token/recruiting/{$response['long_id']}\">{$response['long_id']}</a></td>";
              echo "<td>{$response['email']}</td>";
              echo "<td>{$response['response']}</td>";
              echo "<td>{$response['created']}</td>";
              echo '</tr>';
          }?>
        </tbody>
      </table>
    </div>
  </div>
  <?php //require __DIR__.'/footer.php';?>
</body>
</html>
