<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate PDF using Dompdf</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
</head>
<body>
    <div class="container box">
        <h2 class="text-center text-primary">Generate PDF using Dompdf</h2>
        <br />
        <?php 
        if(isset($customer_data))
        {
        ?>
            <table class="table table-bordered table-striped">
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>View</td>
                    <td>View in PDF</td>
                </tr>
                <?php 
                foreach($customer_data->result() as $row)
                {
                    echo '
                    <tr>
                        <td>'.$row->UserID.'</td>
                        <td>'.$row->Name.'</td>
                        <td><a href="'.base_url().'pdfcontroller/details/'.$row->UserID.'">View</a></td>
                        <td><a href="'.base_url().'pdfcontroller/pdfdetails/'.$row->UserID.'">View in PDF</a></td>
                    </tr>
                    ';
                }
                ?>
            </table>
        <?php
        }
        if(isset($customer_details))
        {
            echo $customer_details;
        }
        ?>
    </div>
</body>
</html>