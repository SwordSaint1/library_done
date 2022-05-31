<?php
$servername = "localhost";
$username = "root";
$password = 'trspassword2022';
$dbname = "library_management";
date_default_timezone_set('Asia/Manila');
$server_date_time = date('Y-m-d H:i:s');
//mysql and db connection

$con = new mysqli($servername, $username, $password, $dbname);

if ($con->connect_error) {  //error check
    die("Connection failed: " . $con->connect_error);
}
else
{

}


$filename = "Book Report";  //your_file_name
$file_ending = "xls";   //file_extention

header("Content-Type: application/xls");    
header("Content-Disposition: attachment; filename=$filename.'$server_date_time'.$file_ending");  
header("Pragma: no-cache"); 
header("Expires: 0");

$sep = "\t";

$sql="SELECT book_details.id,book_details.acquisition_no,book_details.description,book_details.author,book_details.date_publish,book_details.category,book_details.book_type,book_details.title,book_details.location,book_details.shelf,book_details.book_qty as Existing,
    (SELECT count(book_details.id) FROM book_details LEFT JOIN borrowed_books ON book_details.book_qrcode = borrowed_books.book_qrcode WHERE borrowed_books.status = 'Borrow' GROUP BY borrowed_books.status LIMIT 1) as Books_Loaned, (SELECT count(book_details.id) FROM book_details LEFT JOIN borrowed_books ON book_details.book_qrcode = borrowed_books.book_qrcode WHERE borrowed_books.status = 'Lost' GROUP BY borrowed_books.status LIMIT 1) as Books_Lost, book_details.book_qty + count(borrowed_books.status) as Books_Total FROM book_details
    LEFT JOIN borrowed_books ON borrowed_books.book_qrcode = book_details.book_qrcode GROUP BY borrowed_books.book_qrcode,borrowed_books.status,book_details.id,borrowed_books.id"; 
$resultt = $con->query($sql);
while ($property = mysqli_fetch_field($resultt)) { //fetch table field name
    echo $property->name."\t";
}

print("\n");    

while($row = mysqli_fetch_row($resultt))  //fetch_table_data
{
    $schema_insert = "";
    for($j=0; $j< mysqli_num_fields($resultt);$j++)
    {
        if(!isset($row[$j]))
            $schema_insert .= "NULL".$sep;
        elseif ($row[$j] != "")
            $schema_insert .= "$row[$j]".$sep;
        else
            $schema_insert .= "".$sep;
    }
    $schema_insert = str_replace($sep."$", "", $schema_insert);
    $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
    $schema_insert .= "\t";
    print(trim($schema_insert));
    print "\n";
}

?>