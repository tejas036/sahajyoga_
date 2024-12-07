<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://bootswatch.com/simplex/bootstrap.min.css">
    <title>Document</title>
    <style>
table .collapse.in {
	display:table-row;
}
    </style>
</head>
<body>
<table class="table table-responsive table-hover">
  <thead>
        <tr><th>Column</th><th>Column</th><th>Column</th><th>Column</th></tr>
    </thead>
    <tbody>
        <tr class="clickable" data-toggle="collapse" id="row1" data-target=".row1">
            <td><i class="glyphicon glyphicon-plus"></i></td>
            <td>data</td>
          	<td>data</td>  
            <td>data</td>
        </tr>
        <tr class="collapse row1">
            <td>- child row</td>
            <td>data</td>
          	<td>data</td>  
            <td>data</td>
        </tr>
        <tr class="collapse row1">
            <td>- child row</td>
            <td>data</td>
          	<td>data</td>  
            <td>data</td>
        </tr>
        <tr class="clickable" data-toggle="collapse" id="row2" data-target=".row2">
            <td><i class="glyphicon glyphicon-plus"></i></td>
            <td>data</td>
          	<td>data</td>  
            <td>data</td>
        </tr>
        <tr class="collapse row2">
            <td>- child row</td>
            <td>data 2</td>
          	<td>data 2</td>  
            <td>data 2</td>
        </tr>
        <tr class="collapse row2">
            <td>- child row</td>
            <td>data 2</td>
          	<td>data 2</td>  
            <td>data 2</td>
        </tr>
    </tbody>
</table>
</body>
</html>