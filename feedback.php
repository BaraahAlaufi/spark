<?php
class feedbackFormHandler{
    private $file;
    private $array = [];

    public function __construct($file){
        $this->file = $file;
        $this->loadData();
    }

    private function loadData(){
        if(file_exists($this->file)){
            $existingData = file_get_contents($this->file);
            $this->array = unserialize($existingData);
        }
    }
    private function saveData(){
        file_put_contents($this->file,serialize($this->array));
    }
    public function add($rate, $feedback){
        $this->array[] = [
            'rate' => $rate,
            'feedback' => $feedback,
        ];
        $this->saveData();
    }
    public function delete($index){
        if(isset($this->array[$index])){
            unset($this->array[$index]);
            $this->saveData();
        }
    }
    public function displayFeedback(){
        if(empty($this->array)){
            echo '<p>No feedback available</p>';
        }else{
            echo '<table border="1">';
            echo '<tr><th>RATES</th><th>FEEDBACKS</th><th>ACTION</th></tr>';
            foreach ($this->array as $index => $item){
                echo '<tr>';
                echo '<td>'. $item['rate'] .'</td>';
                echo '<td>'. $item['feedback'] .'</td>';
                echo '<td><a href="?action=delete&index='.$index.'">Delete</a></td>';
                echo '</tr>';
            }
            echo '</table>';
        }
    }
}

$file = 'feedbackData.txt';
$form = new feedbackFormHandler($file);
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $rate = $_POST['rate'];
    $feedback = $_POST['feedback'];

    $form->add($rate, $feedback);
} 
if(isset($_GET['action']) && $_GET['action']==='delete'){
    $index = isset($_GET['index']) ? $_GET['index']:null;
    $form->delete($index);
}
?>

<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"> </script>
        <title>Share your experience!</title>
        <link rel="stylesheet" href="styles.css">
        <Style>
            .container{text-align: center;}
            #spark{background-color: #232831;}
            .form-check-label:hover {
                font-weight: bolder;
                color: #Ce2029;
            }
            .btn:hover{
                font-weight: bolder;
            }
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
                    <li class="nav-item"><a class="nav-link" href="tickets.html">Tickets</a></li>
                    <li class="nav-item"><a class="nav-link" href="news.html">News</a></li>
                    <li class="nav-item"><a class="nav-link " href="LogIn.html">Log in</a></li>
                    <li class="nav-item"><a class="nav-link" href="SignUp.html">Sign up</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.html">Contact us</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.html">About us</a></li>
                    <li class="nav-item"><a class="nav-link" href="calculation.html">Calculation</a></li>
                    <li class="nav-item"><a class="nav-link" href="funPage.html">Fun Page</a></li>
                   
                    <li class="nav-item"><a class="nav-link active" href="feedBack.html">Feedback</a></li>
                </ul>
        </nav> 
        <div  >
            <h1 class="head" id="vp">FeedBack</h1>
       </div>

        <div class="row" style="background-color: #Ce2029; height: 50px;">
        <p style="font-size: 25px; text-align: center; font-weight: lighter;">Your feedback is invaluable to us, and we'll use it to make meaningful improvements.</p>
     </div>
        

        <form id="demo" class="form-group" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" style="margin: 70px;">

            <div class="mb-3 mt-3" >  <!--Phone number input-->
                <label for="number" class="form-label" style="color: #efefef;"> Phone number:</label>
                <input type="number"  style="background-color: #3d424d; color:#efefef" class="form-control" id="phoneNumber" placeholder="Enter Your Phone Number" name="phone number" required >
            </div>
            <hr style="border-top: 1px solid #8a8484">

            <div class="mb-3 mt-3" > <!--Password input-->
                <label for="password" class="form-label" style="color: #efefef;">Password:</label>
                <input type="password"  style="background-color: #3d424d; color:#efefef" class="form-control" id="password" placeholder="Enter Your Password" name="password" required >
            </div>
            <hr style="border-top: 1px solid #8a8484">


       

            <label for="gender" class="form-label" style="color: #efefef;">Gender:</label> <!--Gender-->
                <div class="form-check" style="color:#efefef;">
                    <input type="radio" id="male" name="gender" value="male" class="form-check-input" checked>
                        <label for="male" class="form-check-label">Male</label><br>
                    <input type="radio" id="female" name="gender" value="female" class="form-check-input">
                        <label for="female" class="form-check-label">Female</label><br>
                
                </div>
            <hr style="border-top: 1px solid #8a8484">

            <div class="mb-3 mt-3" > <!--feedback-->
                <label for="feedback1" class="form-label" style="color: #efefef;">Were you able to find all the necessary details about the race venues, schedules, and ticket prices easily?</label>
                <input type="text"  style="background-color: #3d424d; color:#efefef" placeholder="  Yes/No" class="form-control" id="feedback1" name="feedback1" >
            </div>

            <hr style="border-top: 1px solid #8a8484">
            <div class="mb-3 mt-3" >
                <label for="cvs" class="form-label" style="color: #efefef;">What improvements or additional features would you suggest to enhance the ticket purchasing experience for F1 races on our website? (give your feedback)</label>
                <textarea  style="background-color: #3d424d; color:#efefef" class="form-control" id="feedback" name="feedback" required></textarea>
            </div>

            <hr style="border-top: 1px solid #8a8484">
            <label for="gender" class="form-label" style="color: #efefef;">On scale of 1 to 5, how would you rate the overall user experience of the website in terms of browsing or purchasing F1 race tickets?</label>
                <div class="form-check" style="color:#efefef;">
                    <input type="radio" id="1" name="rate" value="1" class="form-check-input">
                        <label for="1" class="form-check-label">1. Very Poor</label><br>
                    <input type="radio" id="2" name="rate" value="2" class="form-check-input">
                        <label for="2" class="form-check-label">2. Poor</label><br>
                    <input type="radio" id="3" name="rate" value="3" class="form-check-input" checked>
                        <label for="3" class="form-check-label">3. Average</label><br>    
                    <input type="radio" id="4" name="rate" value="4" class="form-check-input">
                        <label for="4" class="form-check-label">4. Good</label><br>        
                    <input type="radio" id="5" name="rate" value="5" class="form-check-input">
                        <label for="5" class="form-check-label">5. Excellent</label><br>           
                </div>

            <hr style="border-top: 1px solid #8a8484">
            <div class="mb-3 mt-3 form-check form-switch">
                <input class="form-check-input" type="checkbox"  style="background-color: #Ce2029;" name="refund">
                <label class="form-check-label" for="refund" style="color: #efefef;">Subscribe</label>
            </div>
                
            <hr style="border-top: 1px solid #8a8484">

            <button type="submit" class="mb-3 mt-3 btn" value="submit" style="background-color: #Ce2029; color: #efefef;">Submit</button>
               
        </form>
     <div class="row" >
        <h2>Rates & Feedbacks</h2>
        <div><?php echo $form->displayFeedback(); ?></div>
     </div>

     <div class="footer text-center">
        <p>Encountering an error? Check your credentials and try again. Need assistance? Contact our support team.</p>

        <div class="row d-flex justify-content-center align-items-center" style="background-color: #Ce2029; height: 80px;">
            <div class="col"> <a href="LogIn.html" class="btn" style="background-color: #3d424d; color: #efefef;">Log in</a> </div>
            <div class="col"> <a href="SignUp.html" class="btn" style="background-color: #3d424d; color: #efefef;">Sign up</a> </div>
            <div class="col"> <a href="contact.html" class="btn" style="background-color: #3d424d; color: #efefef;">Contact us</a> </div>
        </div>

     </div>


<script>
    //assign the entered values of each input as constants
    const form = document.getElementById('demo');
    const phone = document.getElementById('phoneNumber');
    const feedback = document.getElementById('feedback');
    const pass = document.getElementById('password');
    const pattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/; //craeting a pattern for the password (capital and small letters/1 digit atleast/8 length long or more)

    form.addEventListener('submit', function(event){

    if(!pattern.test(pass.value)){ //checking if the password is similar to the given password pattern
        alert('Password must contain at least one uppercase letter, one lowercase letter, one digit, and be at least 8 characters long');
        event.preventDefault(); //the form will not be submitted
        return;
    }

    //validating the phone number (must start with 9 or 7 )
    if (!/^[97]/.test(phone.value)) {
                alert("Phone number must start with 9 or 7"); //alert message displayed if the number is invalid
                event.preventDefault(); //the form will not be submitted
                return;
           
            }

    //checking if the feedback is 15 letters or more
    if (feedback.value.length < 15) {
                alert("Please provide more detailed feedback!"); //alert message displayed if the feedback is short 
                event.preventDefault(); //the form will not be submitted
                return;
            }        });

</script>

    </body>
</html>