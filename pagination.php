<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" id="font-awesome-style-css" href="http://phpflow.com/code/css/bootstrap3.min.css" type="text/css" media="all">
<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
<script type="text/javascript" charset="utf8" src="select2.js"></script>
<link rel="stylesheet" type="text/css" href="select2.css"> 
<title>phpflow.com : Source code of simaple pagination</title>
</head>
<body>
<div><h3>Source code : PHP simaple pagination</h1></div>
<div>
<link href="bootstrap.css" rel="stylesheet">  
<?php  
$dbhost = 'localhost';  
$dbuser = 'root';  
$dbpass = "";  
$conn = mysql_connect($dbhost,$dbpass,$dbuser) or die ('Error connecting to mysql'); 
$dbname = 'record';  
$connection = mysql_select_db($dbname); 
  
$limit = 2; 
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
$start_from = ($page-1) * $limit;  
  
$sql = "SELECT * FROM posts ORDER BY title ASC LIMIT $start_from, $limit";  
$rs_result = mysql_query ($sql);  
?>  
<table class="table table-bordered table-striped">  
<thead>  
<tr>  
<th>title</th>  
<th>body</th>  
</tr>  
</thead>  
<tbody>  
<?php  
while ($row = mysql_fetch_assoc($rs_result)) {  
?>  
            <tr>  
            <td><? echo $row["title"]; ?></td>  
            <td><? echo $row["body"]; ?></td>  
            </tr>  
<?php  
};  
?>  
</tbody>  
</table>  
<?php  
$sql = "SELECT COUNT(id) FROM posts";  
$rs_result = mysql_query($sql);  
$row = mysql_fetch_row($rs_result);  
$total_records = $row[0];  
$total_pages = ceil($total_records / $limit);  
$pagLink = "<ul class='pagination'>";  
for ($i=1; $i<=$total_pages; $i++) {  
             $pagLink .= "<li><a href='pagination.php?page=".$i."'>".$i."</a></li>";  
};  
echo $pagLink . "</ul>";  
?>  
</div>
</body>
<script>
jQuery(document).ready(function() {
jQuery("#extId").select2({
                width: 'element',
                matcher: function(term, text) {
                    return text === 'Add New Number' || $.fn.select2.defaults.matcher.apply(this, arguments);
                },
                sortResults: function(results) {
                    if (results.length > 1) results.pop();
                    return results;
                }
			});
    });
</script>
