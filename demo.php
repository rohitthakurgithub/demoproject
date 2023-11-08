<?php
require 'vendor/autoload.php'; // Include the DOMPDF autoload.php file

use Dompdf\Dompdf;
use Dompdf\Options;

// Create a new instance of DOMPDF
if(isset($_POST['pdf_genrator'])){
$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isPhpEnabled', true);
$dompdf = new Dompdf($options);
$data = [
    ["ID", "Name", "Email", "City"],
    [1, "John Doe", "john@example.com", "Mohali"],
    [2, "Jane Smith", "jane@example.com", "Chandigarh"],
    [3, "Alice Johnson", "alice@example.com", "Pune"],
    [4, "Bob Wilson", "bob@example.com", "New York"],
    [5, "Eva Adams", "eva@example.com", "Los Angeles"],
    [6, "Chris Lee", "chris@example.com", "Toronto"],
    [7, "Grace Brown", "grace@example.com", "London"],
    [8, "Tom Taylor", "tom@example.com", "Sydney"],
    [9, "Linda White", "linda@example.com", "Paris"],
    [10, "Mike Turner", "mike@example.com", "Berlin"],
    [11, "Mike Turner", "mike@example.com", "Berlin"],
    [12, "Mike Turner", "mike@example.com", "Berlin"],
    [13, "Mike Turner", "mike@example.com", "Berlin"],
    [14, "Mike Turner", "mike@example.com", "Berlin"],
    [15, "Mike Turner", "mike@example.com", "Berlin"],
];
// echo '<pre>';print_r($data);echo '</pre>';
$rowsPerPage = 5;
$totalPages = ceil(count($data) / $rowsPerPage);
// echo $totalPages;
// die;
$html = '';
for ($page = 1; $page <= $totalPages; $page++) {
    $html .= '<html><head></head><body>';
    $html .= '<table border="1"><tr><th>ID</th><th>Name</th><th>Email</th><th>City</th></tr>';
    $startRow = ($page - 1) * $rowsPerPage;
    $endRow = $page * $rowsPerPage;
// echo $endRow.'<br>';
    for ($i = $startRow; $i < $endRow && $i < count($data); $i++) {
        $html .= '<tr>';
        foreach ($data[$i] as $cell) {
            $html .= "<td>$cell</td>";
        }
        $html .= '</tr>';
    }
    $html .= '</table>';
    if ($page < $totalPages) {
        $html .= '<div style="page-break-before: always;"></div>';
    }
    $html .= '</body></html>';
    if ($page == 3) {
        break;
    }
}
 // die();
// Load HTML content into DOMPDF
$dompdf->loadHtml($html);

// Set paper size and orientation (e.g., A4 portrait)
$dompdf->setPaper('A4', 'portrait');

// Render the PDF (inline or download as 'document.pdf')
$dompdf->render();
$dompdf->stream('document.pdf');
}else{
    echo "";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<form method="post">
    <button type="submit" name="pdf_genrator">Genrate pdf</button>
</form>
</body>
</html>