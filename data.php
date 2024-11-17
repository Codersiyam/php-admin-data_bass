<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="./css/dataTables.dataTables.css" />
</head>

<body>
<table id="example" class="display">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th> Username</th>
            <th>Email</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
      <?php 
$con=mysqli_connect("localhost","root","","data");
        $data_select=mysqli_query($con,"SELECT * FROM `form`");
            while($rows=mysqli_fetch_assoc($data_select)){?>
                <tr>
                    <td><?=$rows['id']?></td>
                    <td><?=$rows['sname']?></td>
                    <td><?=$rows['username']?></td>
                    <td><?=$rows['email']?></td>
                    <td><?=$rows['time']?></td>
                </tr>

<?php

            }
      ?>
      
    </tbody>
</table>



<script src="./js/jquery-3.7.1.js" ></script>
<script src="./js/dataTables.js" ></script>
<script src="./js/dataTables.buttons.js" ></script>
<script src="./js/buttons.dataTables.js" ></script>
<script src="./js/jszip.min.js" ></script>
<script src="./js/pdfmake.min.js" ></script>
<script src="./js/vfs_fonts.js" ></script>
<script src="./js/buttons.html5.min.js" ></script>
<script src="./js/buttons.print.min.js" ></script>


<script>

$(document).ready( function () {
    new DataTable('#example', {
    layout: {
        topStart: {
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        }
    }
});
} );

</script>
</body>
</html>