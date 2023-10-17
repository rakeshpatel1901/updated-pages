<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        body{
            background-color: #eee;
        }
        .finalize-order{
            position: absolute;
            width: 100%;
            display: flex;
            justify-content: center;
            top: -500px;
            
        }
        .finalize-order-sub{
            width: 40%;
            background-color: white;
            
            border-radius: 8px;
            display: flex;
            flex-direction : column;
            border: 1px solid black;
            position :relative;
        }
        .close-finalize-order{
            position: absolute;
            width: 95%;
            display: flex;
            justify-content: flex-end;
        }
        .close-finalize-order p{
            padding-right: 80px;
        }
        .delivery-address{

            padding-top : 10px;
        }
        .pdr-30{
            padding-left:30px;
        }
        .finalize-order-proceed{
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="finalize-order">
        <div class="finalize-order-sub">
            <div class="close-finalize-order">
                <h2>close</h2>
                
            </div>
            <div class="delivery-address pdr-30">
                <h2>Your Delivery Address : </h2>
                <div class="delivery-address-detail">
                    input
                </div>

            </div>
            <div class="paymentmethod pdr-30">
                <h2>Select Payment Option : </h2>
                <input type="radio" name="paymentmode" id="cash" value="1">Cash<br>
                <input type="radio" name="paymentmode" id="online" value="2">Online Payment
            </div>
            <div class="bill pdr-30">
                <h2>Total Bill</h2>
            </div>
            <div class="finalize-order-proceed">
                <button onclick="submitform1()">Proceed</button>
            </div>
        </div>
    </div>

    <form id="form_1" name="form1" onsubmit="return false" action="">
        <button onclick="selectpayment()">Submit</button>
    </form>
</body>
</html>
<script>
    function selectpayment(){
        $('.finalize-order').css('top','80px');
        $('.finalize-order').css('transition','0.8s all ease-in-out');
    }
    function submitform1(){
        var radioButtons = document.getElementsByName('paymentmode');
        for (const radioButton of radioButtons) {
            if (radioButton.checked) {
                selectedValue = radioButton.value;
                break; // Once a selected radio button is found, exit the loop
            }
        }
        if(selectedValue==1){
            document.getElementById('form_1').action="cash.php";
            document.getElementById('form_1').submit();
        }
        else if(selectedValue==2){
            document.getElementById('form_1').action="online.php";
            document.getElementById('form_1').submit();
        }
        
    }

</script>