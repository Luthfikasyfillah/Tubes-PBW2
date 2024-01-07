<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Circle Chart</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }

        .circle-chart {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: conic-gradient(
                #3498db 0% 25%,      /* Blue */
                #e74c3c 25% 50%,     /* Red */
                #2ecc71 50% 75%,     /* Green */
                #f39c12 75% 100%     /* Yellow */
            );
        }

        .chart-label {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            color: #333;
            line-height: 200px; /* Sesuaikan dengan tinggi circle-chart */
        }
    </style>
</head>
<body>

<div class="circle-chart"></div>

</body>
</html>