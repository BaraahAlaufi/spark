<?php
class PurchaseFormHandling{
    private $receipt=[];
    
    public function total_price($numOfTickets){
        $numOfTickets = (int)$numOfTickets;
        $totalPrice = $numOfTickets * 27.56;
        if ($numOfTickets >= 3){
            $discount = $totalPrice * 0.01;
            $totalPrice = $totalPrice - $discount;
        }
        return $totalPrice;
    }

    public function generate_receipt($numOfTickets, $ground){
        $totalPrice = $this->total_price($numOfTickets);
        if ($this->receipt !== null) {
            reset($this->receipt);}

        $this->receipt[] =[ 'Number Of Tickets' => $numOfTickets,
                            'Ground Stand' => $ground,
                            'Total Prices' => $totalPrice];
    }

    public function display() {
        foreach ($this->receipt as $key => $receiptItem) {
            foreach ($receiptItem as $subKey => $subValue) {
                echo "$subKey: $subValue<br>";
            }
        }
    }
}

$receipt = new PurchaseFormHandling();

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $numOfTickets = $_POST["number_of_tickets"];
    $ground = $_POST['groundStand'];
    $cardNum = $_POST['card'];
    $expDate = $_POST['exp'];
    $cvs = $_POST['cvs'];

    $receipt->generate_receipt($numOfTickets, $ground);
}

?>

<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <title>Tickets Hub: Find Your Pass!</title>
        <link rel="stylesheet" href="styles.css">
        <Style>
            .container{text-align: center;}
            #spark{background-color: #232831;}
        </Style>
    </head>
    <body id="spark">

            <nav class="navbar navbar-expand-sm navbar-dark" >
                    
                    <a class="navbar-brand" href="#">
                        <img src="logo.png" alt="Logo" style="width: 60px;">
                    </a>

                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="schedule.html">Schedule</a></li>
                    <li class="nav-item"><a class="nav-link" href="teams.html">Teams</a></li>
                    <li class="nav-item"><a class="nav-link active" href="purchase.php">Tickets</a></li>
                    <li class="nav-item"><a class="nav-link" href="news.html">News</a></li>
                    <li class="nav-item"><a class="nav-link " href="LogIn.html">Log in</a></li>
                    <li class="nav-item"><a class="nav-link" href="SignUp.html">Sign up</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.html">Contact us</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.html">About us</a></li>
                    <li class="nav-item"><a class="nav-link" href="calculation.html">Calculation</a></li>
                    <li class="nav-item"><a class="nav-link" href="funPage.html">Fun Page</a></li>
                    <li class="nav-item"><a class="nav-link" href="feedback.php">Feedback</a></li>
                </ul>
        </nav> 
        <div  >
            <h1 class="head" id="vp">Tickets</h1>
       </div>

        <div class="row" style="background-color: #Ce2029; height: 50px;">
        <p style="font-size: 25px; text-align: center;"> Tickets pirces starts from 27.65 €</p>
     </div>
        

     <form id="ticketsForm" class="form-group" style="margin: 70px;" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <div class="mb-3 mt-3" >
            <label for="number" class="form-label" style="color: #efefef;">Number of tickets:</label>
            <input type="number"  style="background-color: #3d424d; color:#efefef" class="form-control" id="number" placeholder="Enter The Number Of Ticktes"name="number_of_tickets" >
        </div>

        <hr style="border-top: 1px solid #8a8484">
        <label for="GroundStand" class="form-label" style="color: #efefef;">GroundStand:</label>
            <div class="form-check" style="color:#efefef;">
                <input type="radio" id="A" name="groundStand" value="A" class="form-check-input" checked>
                    <label for="A" class="form-check-label">A</label><br>
                <input type="radio" id="B" name="groundStand" value="B" class="form-check-input">
                    <label for="B" class="form-check-label">B</label><br>
                <input type="radio" id="C" name="groundStand" value="C" class="form-check-input">
                    <label for="C" class="form-check-label">C</label><br>
            </div>
            <hr style="border-top: 1px solid #8a8484">

            <div class="mb-3 mt-3" >
                <label for="card" class="form-label" style="color: #efefef;">Card number:</label>
                <input type="number"  style="background-color: #3d424d; color:#efefef" class="form-control" id="card" name="card" placeholder="0000 0000 0000 0000" required>
            </div>

            <div class="mb-3 mt-3" >
                <label for="exp" class="form-label" style="color: #efefef;">Exp Date:</label>
                <input type="text"  style="background-color: #3d424d; color:#efefef" placeholder="00/00" class="form-control" id="exp" name="exp" >
            </div>

            <div class="mb-3 mt-3" >
                <label for="cvs" class="form-label" style="color: #efefef;">CVS:</label>
                <input type="number"  style="background-color: #3d424d; color:#efefef" class="form-control" id="cvs" name="cvs" required placeholder="000">
            </div>

            <div class="mb-3 mt-3 form-check form-switch">
                <input class="form-check-input" type="checkbox"  style="background-color: #Ce2029;" name="refund" required checked>
                <label class="form-check-label" for="refund" style="color: #efefef;">I understand that tickets are non-refundable after Purchase</label>
            </div>
                
            <hr style="border-top: 1px solid #8a8484">

            <button type="submit" class="mb-3 mt-3 btn" style="background-color: #Ce2029; color: #efefef;" data-bs-toggle="modal" data-bs-target="#receipt">Purchase</button>
               
     </form>

     <div class="modal fade " id="receipt" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
        <div class="modal-dialog" >
            <div class="modal-content" >
                <div class="modal-header">
                    <h4 class="modal-title fs-5" id="staticBackdropLabel" style="color: #000;">RECEIPT</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="background-color:#3d424d;">
                    <?php echo $receipt->display(); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="footer text-center">
        <p>Encountering an error? Check your credentials and try again. Need assistance? Contact our support team.</p>

        <div class="row d-flex justify-content-center align-items-center" style="background-color: #Ce2029; height: 80px;">
            <div class="col"> <a href="LogIn.html" class="btn" style="background-color: #3d424d; color: #efefef;">Log in</a> </div>
            <div class="col"> <a href="SignUp.html" class="btn" style="background-color: #3d424d; color: #efefef;">Sign up</a> </div>
            <div class="col"> <a href="contact.html" class="btn" style="background-color: #3d424d; color: #efefef;">Contact us</a> </div>
        </div>

     </div>

    </body>
</html>
