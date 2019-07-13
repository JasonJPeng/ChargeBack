<?php
session_start();
$_SESSION["POST"] = $_POST;
?>

<!DOCTYPE html>
<html><head>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src = "https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src = "datatable.js"></script>
       </head><body>
          
            <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>MID</th>
                            <th>Order ID</th>
                            <th>Full Name</th>
                            <th>Origin Amount</th>
                            <th>Amount</th>
                            <th>Card No.</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>MID</th>
                            <th>Order ID</th>
                            <th>Full Name</th>
                            <th>Origin Amount</th>
                            <th>Amount</th>
                            <th>Card No.</th>
                        </tr>
                    </tfoot>
                </table>

           </body>
</html>