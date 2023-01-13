<?php

require_once 'vendor/autoload.php';
require_once "app/controllers/crudclientes.php";


//generar pdf
$html = "<!DOCTYPE html>
<html lang='es'>
    <head>
        <meta charset='UTF-8'>
        <title>Informe $cli->first_name</title>
        
<style>
    body{
        font-family: Lucida Sans Unicode, Lucida Grande, sans-serif;
        font-size: 20px;
    }
    table {
        border-collapse: collapse;
        width: 100%;
        border: 1px solid #000;
    }
    th, td {
        text-align: left;
        padding: 8px;
        border: 1px solid #000;
    }
    th {
        background-color: #0000cc;
        color: white;
    }
    h1 {
        background-color: #0000cc;
        color: white;
        text-align: center;
        padding: 10px;
    }
</style>
</head>
    <body>
        <h1>Informe de $cli->first_name $cli->last_name</h1>
            <table>
                <tr>
                    <th>ID</th>
                    <td>$cli->id</td>
                </tr>
                <tr>
                    <th>NOMBRE</th>
                    <td>$cli->first_name</td>
                </tr>
                <tr>
                    <th>APELLIDO</th>
                    <td>$cli->last_name</td>
                </tr>
                <tr>
                    <th>EMAIL</th>
                    <td>$cli->email</td>
                </tr>
                <tr>
                    <th>GÉNERO</th>
                    <td>$cli->gender</td>
                </tr>
                <tr>
                    <th>IP</th>
                    <td>$cli->ip_address</td>
                </tr>
                <tr>
                    <th>TELÉFONO</th>
                    <td>$cli->telefono</td>
                </tr>
            </table>
    </body>
</html>";
$pdf = new \Mpdf\Mpdf;
$pdf->WriteHTML($html);
$pdf->Output();
?>
