<?php 
    
    //http://92ab-197-211-53-11.eu.ngrok.io/ussdsms/index.php; 

    include_once 'menu.php';
    // Read the variables sent via POST from our API
    $sessionId   = $_POST["sessionId"];
    $serviceCode = $_POST["serviceCode"];
    $phoneNumber = $_POST["phoneNumber"];
    $text        = $_POST["text"];

    //$isRegistered = false;
    $menu = new Menu();
    $text = $menu->middleware($text);
    
    

    if($text == "" && $isRegistered){
        //user is registered and string is empty
        $menu->mainMenuRegistered();
    }else if($text == "" && !$isRegistered){
        //user is unregistered and string is empty
        $menu->mainMenuUnRegistered();

    }else if($isRegistered){
        //user is unregistered and string is not empty
        //If the user is unregistered and responds with 1 in prompt above, 
        //it is stored in array 1 and the user is provided register form

        $textArray = explode("*", $text);
        switch($textArray[0]){
            case 1:
                $menu->registerMenu($textArray);
            break;
            default:
                echo "END Invalid choice. Please try again";
                 
        }

    }else{
            //user is registered and string is not empty
        $textArray = explode("*", $text);
        switch($textArray[0]){
            case 1:
                $menu->sendMoneyMenu($textArray);
            break;
            
            case 2:
                $menu->widthrawMoneyMenu($textArray);
                break;

            case 3:
                $menu->checkBalanceMenu($textArray);
                break;

            default:
                echo "END Invalid choice. Please try again";

          }
        }


?>