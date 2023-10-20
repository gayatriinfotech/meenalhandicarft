<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .container {
        padding-right: 20px;
        padding-left: 20px;
        margin-right: auto;
        margin-left: auto;
    }

    @media (min-width: 768px) {
        .container {
            width: 700px;
        }
    }

    @media (min-width: 992px) {
        .container {
            width: 930px;
        }
    }

    @media (min-width: 1200px) {
        .container {
            width: 1000px;
        }
    }

    .header {
        border: 1px solid black;
        border-radius: 5px;
        padding: 0px 10px;
    }
</style>

<body>
    <div class="container">
        <br>
        <div class="header">
            <span><img src="http://meenalhandicraft.com/frontend/image/meenal_handicraft_logo-removebg-preview.png" width="80px" alt=""></span>
            <span style="float: right;"><br>Order Placed</span>
        </div>
        <div>
            <p>Hi {{$name}},</p>
            <p>Your order has been successfully placed.</p>
        </div>
        
    </div>
</body>

</html>