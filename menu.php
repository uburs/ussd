<?php 
    include_once "util.php";


    class Menu{
        protected $text;
        protected $sessionId;

        function _construct($text, $sessionId)
        {
            $this->text = $text;
            $this->sessionId = $sessionId;
        }

        //Menu registered users will see on screen
        public function mainMenuRegistered(){
            $response = "CON Reply with\n";
            $response .= "1. Send money\n";
            $response .= "2. Widthraw money\n";
            $response .= "3. Check balance\n";
            echo $response;
        }

        //Menu unregistered users will see, prompting them to sign up
        public function mainMenuUnRegistered(){
            $response = "CON Welcome to CashApp. Reply with\n";
            $response .= "1. Register\n";
            echo $response;
        }

        public function registerMenu($textArray){
            $level = count($textArray);
            if($level == 1){
                echo "CON Please enter your full name:";
            }else if($level == 2){
                echo "CON Please set your PIN:";
            }else if($level == 3){
                echo "CON Please re-enter your PIN:";
            }else if($level == 4){
                $name = $textArray[1];
                $pin = $textArray[2];
                $confirmPin = $textArray[3];

                if($pin != $confirmPin){
                    echo "END Your pins do not match. Please try again";
                }ELSE{
                    //We can register the user
                    //Send SMS
                    echo "END You have been registered";
                }
            }
        }

        public function sendMoneyMenu($textArray){
            $level = count($textArray);
            if($level == 1){
                echo "CON Enter mobile number of receiver:";
            }else if($level == 2){
                echo "CON Enter amount:";
            }else if($level == 3){
                echo "CON Please Enter your PIN:";
            }
            else if($level == 4){
                $response = "CON Send " . $textArray[2]. " " . $textArray[2]. "\n";
                $response .= "1. Confirm\n";
                $response .= "2. Cancel\n";
                $response .= Util::$GO_BACK . " Back\n";
                $response .= Util::$GO_TO_MAIN_MENU . " Main menu\n"; 
                echo $response;
            }
            else if($level == 5 && $textArray[4] == 1){
                //a confirm
                //Send the money plus process
                //Check if pin is correct
                echo "END Your request is being processed";
            }else if($level == 5 && $textArray[4] == 2){
                echo "END Thank you for using our service";
            }else if($level == 5 && $textArray[4] == Util::$GO_BACK ){
                echo "END You requested back to one step - PIN";
            }else if($level == 5 && $textArray[4] == Util::$GO_TO_MAIN_MENU ){
                echo "END You requested back to main menu";
            }else{
                echo "END Invalid entry";
            }
        }

        public function widthrawMoneyMenu($textArray){

        }

        public function checkBalanceMenu($textArray){
            
        }
    }



?>