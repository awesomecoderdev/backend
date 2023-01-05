<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex,nofollow" />
    <title> Order confirmation </title>

    <style>
        * {
            box-sizing: border-box;
        }

        /* general styling */
        body {
            font-family: "Open Sans", sans-serif;
        }

        /* Create four equal columns that floats next to each other */
        .column {
            float: left;
            width: 23%;
            padding: 10px;
            border-right: 1px dotted #000;
            /* height: 100%; */
            height: auto;
            /* Should be removed. Only for demonstration */
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }


        .d-flex {
            display: flex;
        }

        .flex-col {
            flex-direction: column;
        }

        .justify-content-between {
            justify-content: space-between;
        }

        .justify-content-center {
            justify-content: center;
        }

        .justify-content-end {
            justify-content: end;
        }

        .float-right {
            float: right;
        }

        .float-left {
            float: left;
        }

        .circle-logo {
            width: 60px;
        }

        .logo {
            width: 220px;
        }

        .title {
            margin-top: 5px;
        }

        .student-name {
            margin-bottom: 10px;
        }

        .bar-code {
            width: 200px;
            align-self: center;
            margin-top: 5px;
            margin-bottom: 10px;
        }

        .align-center {
            align-self: center;
        }

        /*table*/
        table {
            /* margin-top: 10px; */
            border: 1px solid #ccc;
            border-collapse: collapse;
            margin: 0;
            padding: 0;
            width: 100%;
            table-layout: fixed;
        }

        table tr {
            background-color: #fff;
            border: 1px solid #000;
            padding: .35em;
        }

        table th,
        table td {
            /* padding: .625em; */
            border: 1px solid #000;
        }

        /*table end*/
        hr {
            border-top: 1px solid #000;
        }
    </style>
</head>

<body>
    <div class="row d-flex justify-content-between ">
        <div class="column">
            <div class="d-flex justify-content-between">
                <strong>Invoice # INV/2022</strong>
                <strong>Student Copy</strong>
            </div>
            <div class="d-flex flex-col justify-content-center">
                <h4 class="align-center title">Quran Education Online</h4>
            </div>
            <div class="d-flex justify-content-between">
                <div class="d-flex flex-col">
                    <span>Due Date:</span>
                    <span>08/09/2022</span>
                </div>
                <div class="d-flex flex-col">
                    <span>Account: 75-HBL</span>
                    <span>HMC Taxila</span>
                </div>
            </div>
            <div class="d-flex flex-col justify-content-center">
                <img src="https://i.ibb.co/c8CQvBq/barcode.png" alt="bar code" class="bar-code" />
            </div>
            <table>
                <thead>
                    <tr>
                        <th scope="col left" colspan="2">Description</th>
                        <th scope="col right">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td data-label="Account" colspan="2">Electricity-319315001<br />Consumption</td>
                        <td data-label="Amount">500.0</td>
                    </tr>
                    <tr>
                        <td scope="row" data-label="Account" colspan="2">Water-319315001<br />Fix Charges</td>
                        <td data-label="Amount">100.0</td>
                    </tr>
                    <tr>
                        <td scope="row" data-label="Account" colspan="2">Rent-319315001<br />Fix Charges</td>
                        <td data-label="Amount">13930.0</td>
                    </tr>
                </tbody>
            </table>
            <hr />
            <div class="d-flex justify-content-between">
                <strong>Payable by due date</strong>
                <span>Rs. 14,530</span>
            </div>
            <hr />
            <div class="d-flex justify-content-between">
                <strong>Payable after due date</strong>
                <span>14,580.0</span>
            </div>
            <br />
            <hr />
            <div class="d-flex flex-col">
                <span>For Bank Use Only</span>
                <span>Received Payment Rs.</span>
            </div><br />
            <div class="d-flex flex-col float-right">
                <span>Signature and Stamp</span>
                <span>Bank Officer</span>
            </div><br /><br />
            <div class="d-flex">
                <span>Date:</span>
                <span>______________</span>
            </div>

        </div>
        <div class="column">
            <div class="d-flex justify-content-between">
                <strong>Invoice # INV/2022</strong>
                <strong>Student Copy</strong>
            </div>
            <div class="d-flex flex-col justify-content-center">
                <h4 class="align-center title">Quran Education Online</h4>
            </div>
            <div class="d-flex justify-content-between">
                <div class="d-flex flex-col">
                    <span>Due Date:</span>
                    <span>08/09/2022</span>
                </div>
                <div class="d-flex flex-col">
                    <span>Account: 75-HBL</span>
                    <span>HMC Taxila</span>
                </div>
            </div>
            <div class="d-flex flex-col justify-content-center">
                <img src="https://i.ibb.co/c8CQvBq/barcode.png" alt="bar code" class="bar-code" />
            </div>
            <table>
                <thead>
                    <tr>
                        <th scope="col left" colspan="2">Description</th>
                        <th scope="col right">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td data-label="Account" colspan="2">Electricity-319315001<br />Consumption</td>
                        <td data-label="Amount">500.0</td>
                    </tr>
                    <tr>
                        <td scope="row" data-label="Account" colspan="2">Water-319315001<br />Fix Charges</td>
                        <td data-label="Amount">100.0</td>
                    </tr>
                    <tr>
                        <td scope="row" data-label="Account" colspan="2">Rent-319315001<br />Fix Charges</td>
                        <td data-label="Amount">13930.0</td>
                    </tr>
                </tbody>
            </table>
            <hr />
            <div class="d-flex justify-content-between">
                <strong>Payable by due date</strong>
                <span>Rs. 14,530</span>
            </div>
            <hr />
            <div class="d-flex justify-content-between">
                <strong>Payable after due date</strong>
                <span>14,580.0</span>
            </div>
            <br />
            <hr />
            <div class="d-flex flex-col">
                <span>For Bank Use Only</span>
                <span>Received Payment Rs.</span>
            </div><br />
            <div class="d-flex flex-col float-right">
                <span>Signature and Stamp</span>
                <span>Bank Officer</span>
            </div><br /><br />
            <div class="d-flex">
                <span>Date:</span>
                <span>______________</span>
            </div>

        </div>
        <div class="column">
            <div class="d-flex justify-content-between">
                <strong>Invoice # INV/2022</strong>
                <strong>Student Copy</strong>
            </div>
            <div class="d-flex flex-col justify-content-center">
                <h4 class="align-center title">Quran Education Online</h4>
            </div>
            <div class="d-flex justify-content-between">
                <div class="d-flex flex-col">
                    <span>Due Date:</span>
                    <span>08/09/2022</span>
                </div>
                <div class="d-flex flex-col">
                    <span>Account: 75-HBL</span>
                    <span>HMC Taxila</span>
                </div>
            </div>
            <div class="d-flex flex-col justify-content-center">
                <img src="https://i.ibb.co/c8CQvBq/barcode.png" alt="bar code" class="bar-code" />
            </div>
            <table>
                <thead>
                    <tr>
                        <th scope="col left" colspan="2">Description</th>
                        <th scope="col right">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td data-label="Account" colspan="2">Electricity-319315001<br />Consumption</td>
                        <td data-label="Amount">500.0</td>
                    </tr>
                    <tr>
                        <td scope="row" data-label="Account" colspan="2">Water-319315001<br />Fix Charges</td>
                        <td data-label="Amount">100.0</td>
                    </tr>
                    <tr>
                        <td scope="row" data-label="Account" colspan="2">Rent-319315001<br />Fix Charges</td>
                        <td data-label="Amount">13930.0</td>
                    </tr>
                </tbody>
            </table>
            <hr />
            <div class="d-flex justify-content-between">
                <strong>Payable by due date</strong>
                <span>Rs. 14,530</span>
            </div>
            <hr />
            <div class="d-flex justify-content-between">
                <strong>Payable after due date</strong>
                <span>14,580.0</span>
            </div>
            <br />
            <hr />
            <div class="d-flex flex-col">
                <span>For Bank Use Only</span>
                <span>Received Payment Rs.</span>
            </div><br />
            <div class="d-flex flex-col float-right">
                <span>Signature and Stamp</span>
                <span>Bank Officer</span>
            </div><br /><br />
            <div class="d-flex">
                <span>Date:</span>
                <span>______________</span>
            </div>

        </div>
        <div class="column">
            <div class="d-flex justify-content-between">
                <strong>Invoice # INV/2022</strong>
                <strong>Student Copy</strong>
            </div>
            <div class="d-flex flex-col justify-content-center">
                <h4 class="align-center title">Quran Education Online</h4>
            </div>
            <div class="d-flex justify-content-between">
                <div class="d-flex flex-col">
                    <span>Due Date:</span>
                    <span>08/09/2022</span>
                </div>
                <div class="d-flex flex-col">
                    <span>Account: 75-HBL</span>
                    <span>HMC Taxila</span>
                </div>
            </div>
            <div class="d-flex flex-col justify-content-center">
                <img src="https://i.ibb.co/c8CQvBq/barcode.png" alt="bar code" class="bar-code" />
            </div>
            <table>
                <thead>
                    <tr>
                        <th scope="col left" colspan="2">Description</th>
                        <th scope="col right">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td data-label="Account" colspan="2">Electricity-319315001<br />Consumption</td>
                        <td data-label="Amount">500.0</td>
                    </tr>
                    <tr>
                        <td scope="row" data-label="Account" colspan="2">Water-319315001<br />Fix Charges</td>
                        <td data-label="Amount">100.0</td>
                    </tr>
                    <tr>
                        <td scope="row" data-label="Account" colspan="2">Rent-319315001<br />Fix Charges</td>
                        <td data-label="Amount">13930.0</td>
                    </tr>
                </tbody>
            </table>
            <hr />
            <div class="d-flex justify-content-between">
                <strong>Payable by due date</strong>
                <span>Rs. 14,530</span>
            </div>
            <hr />
            <div class="d-flex justify-content-between">
                <strong>Payable after due date</strong>
                <span>14,580.0</span>
            </div>
            <br />
            <hr />
            <div class="d-flex flex-col">
                <span>For Bank Use Only</span>
                <span>Received Payment Rs.</span>
            </div><br />
            <div class="d-flex flex-col float-right">
                <span>Signature and Stamp</span>
                <span>Bank Officer</span>
            </div><br /><br />
            <div class="d-flex">
                <span>Date:</span>
                <span>______________</span>
            </div>

        </div>
    </div>
</body>

</html>