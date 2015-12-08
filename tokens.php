<?php
use \GiveToken\RecruitingToken;

require_once __DIR__.'/config.php';
if (!logged_in()) {
    header('Location: '.$app_root);
}

define('TITLE', 'GiveToken.com - Token Responses');
require __DIR__.'/header.php';
?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/s/dt/jszip-2.5.0,pdfmake-0.1.18,dt-1.10.10,b-1.1.0,b-flash-1.1.0,b-html5-1.1.0,b-print-1.1.0/datatables.min.css"/>
<style>
body {
  background-color: white;
}
#datatable-div {
  margin-top: 100px;
  margin-bottom: 150px;
}
#responses-table {
  color: black;
}
button.dt-button, div.dt-button, a.dt-button {
  padding-bottom: 2px;
  padding-top: 2px;
}
</style>
</head>
<body id="token-responses">
  <div>
    <?php require __DIR__.'/navbar.php';?>
  </div>
  <div class="row" id="datatable-div">
    <div class="col-sm-offset-2 col-sm-8">
      <h2>Tokens</h2>
      <table id="responses-table" class="table table-striped table-hover">
        <thead>
          <th>Token</th>
          <th>Created</th>
        </thead>
        <tbody>
          <?php
          $responses = RecruitingToken::getUserTokens($_SESSION['user_id']);
          foreach ($responses as $response) {
              echo '<tr>';
              echo "<td align=left>";
              echo "<a href=\"/create_recruiting?id={$response->long_id}\">{$response->job_title}</a>";
              echo " (<a href=\"/token/recruiting/{$response->long_id}\">Preview</a>)";
              echo "</td>";
              echo "<td>{$response->created}</td>";
              echo '</tr>';
          }?>
        </tbody>
      </table>
    </div>
  </div>
  <?php require __DIR__.'/footer.php';?>
  <script type="text/javascript" src="https://cdn.datatables.net/s/dt/jszip-2.5.0,pdfmake-0.1.18,dt-1.10.10,b-1.1.0,b-flash-1.1.0,b-html5-1.1.0,b-print-1.1.0/datatables.min.js"></script>
  <script>
  $(document).ready(function() {
      var table = $('#responses-table').DataTable({
          dom: 'B<"clear">lfrtip',
          buttons: [
              'copy', 'csv', 'excel', 'pdf','print'
          ]
      });
  });
  </script>
</body>
</html>