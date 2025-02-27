<?php
    session_start();
    include("connection.php");
    include("functions.php");
    if($_SERVER['REQUEST_METHOD']=="POST"){
        //something was posted
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
        if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
        {

            //read from database
            $query = "select * from users where user_name ='$user_name' limit 1";
            $result = mysqli_query($con, $query);
            if($result){
                if($result && mysqli_num_rows($result)>0){
                    $user_data = mysqli_fetch_assoc($result);
                    if($user_data['password']===$password){
                        $_SESSION['user_id']=$user_data['user_id'];
                        header("Location: Meniu.php");
                        die;
                    }
                }
            }
            echo "Plase enter some valid information!";
        }else
        {
            echo "Plase enter some valid information!";
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>

</head>
<body>
<style type="text/css">
body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(to right, #6a11cb, #2575fc);
        }
        #box {
            background-color: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            margin: auto;
            width: 300px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            text-align: center;
        }
        #box div {
            font-size: 24px;
            margin-bottom: 20px;
            color: white;
        }
        #text {
            height: 35px;
            border-radius: 5px;
            padding: 4px;
            border: solid thin #aaa;
            width: calc(100% - 10px);
            margin: 10px 0;
            font-size: 16px;
        }
        #button {
            padding: 10px 20px;
            width: 100%;
            color: white;
            background-color: #2575fc;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        #button:hover {
            background-color: #1a5bb8;
        }
        a {
            color: white;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s;
        }
        a:hover {
            color: #6a11cb;
        }
    </style>
    <div id="box">
        <form method="post">
            <div style="font-size: 20px; margin: 10px; color: white;">Login</div>
            <input id="text" type="text" name="user_name"></br>
            <input id="text" type="password" name="password"></br>
            <input id="button" type="submit" value="Login"></br>
            <a href ="sign_in.php">Click to register</a></br>
    </form>
    </div>
</body>
</html>
