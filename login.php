<?php
    $conn = mysqli_connect('localhost', 'root', '', 'restyle');
    session_start();

    if(isset($_POST['log'])){
        $login = $_POST['login'];
        $pass = $_POST['pass'];

        $query = "SELECT * FROM users WHERE login='" . $login . "'";
        $user = mysqli_query($conn, $query)->fetch_assoc();

        if($user['password'] == $pass){
            $_SESSION['auth'] = $user;
            header('Location: main.php');
        }
        else {print('Неверный логин или пароль!');}
    }

?>

<!DOCTYPE>
<html>
<head>
    <title></title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
    <link href="https://fonts.googleapis.com/css?family=Sirin+Stencil" rel="stylesheet">
    <style>
        .hidden{
            display: none;
        }

        #logout{
            position: absolute;
            background-color: white;
            padding: 10px;
            right: 0;
            top: 0;
        }
        *{
            margin: 0;
            padding: 0;
        }
        html body{
            font-size: 15px;
            width: 100%;
            height: 100%;
        }
        .items a{
            text-decoration: none;
            color: black;
        }
        .vhod a{
            text-decoration: none;
            color: black;
        }
        .main{
            display: flex;
            justify-content: space-around;
            max-width: 1200px;
            margin:0 auto;
            width:100%;
        }
        .name{
            margin-right: 50px;

        }
        .items{
            list-style-type: none;
            display: block;
            margin-bottom: 15px 0px;
            z-index: 2000;
            background: white;

        }
        .vhod{
            list-style-type: none;
            display: block;
            margin-bottom: 15px 0;
            background: white;
            margin-left: 10px;
            padding-top: 20px;

        }
        .items ul{
            list-style-type: none;
            margin:0;
            padding: 5;
            display: block;
            word-spacing: 5em;
        }
        .items ul ul{
            display: none;
        }
        .items ul li:hover > ul{
            display: block;
        }
        .items ul ul ul{
            margin-left: 200px;
            top:0px;
            position: absolute;
        }

        .vhod ul{
            list-style-type: none;
            margin:0;
            padding: 0;
            display: block;
        }
        .items li{
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: inline-block;
            position: relative;
            font-size: 14px;
            color: #def1f0;
            position: relative;
        }
        .vhod li{
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: inline-block;
            position: relative;
            font-size: 14px;
            color: #def1f0;
        }
        .items li a{
            padding: 15px 20px;
            font-size: 14px;
            display: inline-block;
            outline: 0;
            font-weight: 400;
        }
        .vhod li a{
            padding:15px 20px;
            font-size: 14px;
            display: inline-block;
            outline: 0;
            font-weight: 400;
        }
        .items li:hover ul.dropdown{display: block;}
        .vhod li:hover ul.dropdown{display: block;}
        .items li ul.dropdown{
            position: absolute;
            display: none;
            width: 200px;
            background:lightgrey;
            box-shadow: 0 2px 5px 0 rgba(0,0,0,0.3);
            padding-top: 0;
        }
        .vhod li ul.dropdown{
            position: absolute;
            display: none;
            width: 200px;
            background:lightgrey;
            box-shadow: 0 2px 5px 0 rgba(0,0,0,0.3);
            padding-top: 0;
        }
        .items li ul.dropdownTwo{
            position: absolute;
            display: none;
            width: 200px;
            background:lightgrey;
            box-shadow: 0 2px 5px 0 rgba(0,0,0,0.3);
            padding-top: 0;
        }
        .items li ul.dropdown li{
            display: block;
            list-style-type: none;
        }
        .items li ul.dropdownTwo li{
            display: block;
            list-style-type: none;
        }
        .vhod li ul.dropdown li{
            display: block;
            list-style-type: none;
        }
        .items li ul.dropdown li a{
            padding: 15px 20px;
            font-size: 15px;
            color: #fff;
            display: block;
            font-weight: 400;
        }
        .items li ul.dropdownTwo li a{
            padding: 15px 20px;
            font-size: 15px;
            color: #fff;
            display: block;
            font-weight: 400;
        }
        .vhod li ul.dropdown li a{
            padding: 15px 20px;
            font-size: 15px;
            color: #fff;
            display: block;
            font-weight: 400;
        }
        .items li ul.dropdown li:last-child a{border-bottom: none;}
        .items li ul.dropdownTwo li:last-child a{border-bottom: none;}
        .vhod li ul.dropdown li:last-child a{border-bottom: none;}
        .items li:hover a{
            background:lightgrey;
            color: #fff !important;
        }
        .vhod li:hover a{
            background:lightgrey;
            color: #fff !important;
        }
        .items li:first-child:hover a{border-radius: 3px 0 0 3px;}
        .vhod li:first-child:hover a{border-radius: 3px 0 0 3px;}
        .items li ul.dropdown li:hover a{background: rgba(0,0,0,0.1);}
        .items li ul.dropdownTwo li:hover a{background: rgba(0,0,0,0.5);}
        .vhod li ul.dropdown li:hover a{background: rgba(0,0,0,0.1);}
        .items li ul.dropdown li:first-child:hover a{border-radius: 0;}
        .vhod li ul.dropdown li:first-child:hover a{border-radius: 0;}
        .vhod li ul.dropdownTwo li:first-child:hover a{border-radius: 0;}
        .items li:hover .arrow-down{border-top: 5px solid black;}
        .vhod li:hover .arrow-down{border-top: 5px solid black;}
        .arrow-down{
            width: 0;
            height: 0;
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            top: 15px;
            right: -5px;
            content: '';
        }
        .dropdownTwo{
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
        }

        .name a{
            color: black;
            text-decoration-line: none;
            font-size: 30px;
            font-family: 'Sirin Stencil', cursive;
        }
        .it{
            text-align: center;
            font-size: 12px;
            font-family: 'Sirin Stencil', cursive;
        }
        .image1{
            width: 30%;
        }
        .image2{
            width: 30%;
        }
        .image1 img{
            float: left;
        }
        .image2 img{
            float: right;
        }
        .images{
            display: inline-flex;
            height: 1200px;
        }
        .text{
            width: 40%;
            text-align: center;
            position: relative;
            top: 100px;
        }
        .text a{
            color: black;
            text-decoration-line: none;
            font-size: 12px;
            font-family: 'Sirin Stencil', cursive;
            position: relative;

        }
        .text .p1 p{
            font-size: 60px;
            padding-bottom: 50px;
        }
        .a{
            word-spacing: 2em;
            padding-bottom: 30px;
        }
        .p2{
            position: relative;
            top: 150px;
        }
        .p2 p{
            font-size: 20px;
            padding-bottom: 30px;
        }
        .p2 .a2{
            word-spacing: 2em;
            padding-bottom: 100px;
        }

        .PP{
            text-align: center;
            display: flex;
            flex-direction: column;
            position: relative;
            top: 70px;
            padding-bottom: 50px;
        }
        .PP a{
            font-size: 40px;
            padding: 20px;
            font-family: bold;
            padding-bottom: 20px;
        }
        footer{
            background-color: rgb(252,250,252);
            position: relative;
            height: 150px;
            bottom: 0px;
            clear: both;
            text-align: center;
            word-spacing: 2em;
        }
        footer i{
            position: relative;
            top: 90px;
            word-spacing: 4em;
        }
        footer a{
            color: black;
        }
        .end{
            position: relative;
            top: 130px;
        }

    </style>
    <script>
            var i=0;
            var images=[];
            var time=4000;
            images[0]='images/image1.jpg';
            images[1]='images/image3.jpg';
            function changeImg(){
                document.image1.src=images[i];
                document.image2.src=images[i];
                if(i<images.length-1){
                    i++;
                }
                else{
                    i=0;
                }
                setTimeout("changeImg()",time);
            }
            window.onload=changeImg;
    </script>
</head>
<body>
<div class="main">
    <div class="name">
        <a href="main.php">RESTYLE</a>
    </div>
   <div class="items">
            <ul>
                <li><a href=""><strong>Распродажа<span class="arrow-down"></span></strong></a>
                    <ul class="dropdown">
                        <li><a href="">Женская</a></li>
                        <li><a href="">Мужская</a></li>
                        <li><a href="">Девочки</a></li>
                        <li><a href="">Мальчики</a></li>
                    </ul>
                </li>
                <li><a href="main.php"><strong>Женская<span class="arrow-down"></span></strong></a>
                    <ul class="dropdown">
                        <li><a href="womans.php">Одежда</a>
                            <ul class="dropdownTwo">
                                <li><a href="">Пальто</a></li>
                                <li><a href="">Куртки</a></li>
                                <li><a href="">Костюмы</a></li>
                                <li><a href="">Платья</a></li>
                                <li><a href="">Комбинезоны</a></li>
                                <li><a href="">Кардиганы и свитеры</a></li>
                                <li><a href="">Рубашки</a></li>
                                <li><a href="">Футболки и топы</a></li>
                                <li><a href="">Брюки</a></li>
                                <li><a href="">Джинсы</a></li>
                                <li><a href="">Топы</a></li>
                            </ul>
                        </li>
                        <li><a href="">Аксессуары</a>
                            <ul class="dropdownTwo">
                                <li><a href="">Обувь</a></li>
                                <li><a href="">Сумки</a></li>
                                <li><a href="">Бижутерия</a></li>
                                <li><a href="">Кошельки и бумажники</a></li>
                                <li><a href="">Платки и шарфы</a></li>
                                <li><a href="">Солнцезащитные очки</a></li>
                                <li><a href="">Ремни</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="men.php"><strong>Мужская<span class="arrow-down"></span></strong></a>
                    <ul class="dropdown">
                        <li><a href="man.php">Одежда</a>
                            <ul class="dropdownTwo">
                                <li><a href="">Пальто</a></li>
                                <li><a href="">Куртки</a></li>
                                <li><a href="">Костюмы</a></li>
                                <li><a href="">Толстовки</a></li>
                                <li><a href="">Кожа</a></li>
                                <li><a href="">Рубашки</a></li>
                                <li><a href="">Футболки и топы</a></li>
                                <li><a href="">Брюки</a></li>
                                <li><a href="">Джинсы</a></li>
                            </ul>
                        </li>
                        <li><a href="">Аксессуары</a>
                            <ul class="dropdownTwo">
                                <li><a href="">Обувь</a></li>
                                <li><a href="">Сумки</a></li>
                                <li><a href="">Часы</a></li>
                                <li><a href="">Бумажники</a></li>
                                <li><a href="">Галстуки</a></li>
                                <li><a href="">Солнцезащитные очки</a></li>
                                <li><a href="">Ремни</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="girl.php"><strong>Девочки<span class="arrow-down"></span></strong></a>
                    <ul class="dropdown">
                        <li><a href="girls.php">Одежда</a>
                            <ul class="dropdownTwo">
                                <li><a href="">Пальто</a></li>
                                <li><a href="">Куртки</a></li>
                                <li><a href="">Костюмы</a></li>
                                <li><a href="">Платья</a></li>
                                <li><a href="">Комбинезоны</a></li>
                                <li><a href="">Кардиганы и свитеры</a></li>
                                <li><a href="">Рубашки</a></li>
                                <li><a href="">Футболки и топы</a></li>
                                <li><a href="">Брюки</a></li>
                                <li><a href="">Джинсы</a></li>
                                <li><a href="">Пижамы</a></li>
                            </ul>
                        </li>
                        <li><a href="">Аксессуары</a>
                            <ul class="dropdownTwo">
                                <li><a href="">Обувь</a></li>
                                <li><a href="">Сумки</a></li>
                                <li><a href="">Бижутерия</a></li>
                                <li><a href="">Шапки и шарфы</a></li>
                                <li><a href="">Солнцезащитные очки</a></li>
                                <li><a href="">Ремни</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="boy.php"><strong>Мальчики<span class="arrow-down"></span></strong></a>
                    <ul class="dropdown">
                        <li><a href="boys.php">Одежда</a>
                            <ul class="dropdownTwo">
                                <li><a href="">Пальто</a></li>
                                <li><a href="">Куртки</a></li>
                                <li><a href="">Костюмы</a></li>
                                <li><a href="">Комбинезоны</a></li>
                                <li><a href="">Кардиганы и свитеры</a></li>
                                <li><a href="">Рубашки</a></li>
                                <li><a href="">Футболки и топы</a></li>
                                <li><a href="">Брюки</a></li>
                                <li><a href="">Джинсы</a></li>
                                <li><a href="">Пижамы</a></li>
                            </ul>
                        </li>
                        <li><a href="">Аксессуары</a>
                            <ul class="dropdownTwo">
                                <li><a href="">Обувь</a></li>
                                <li><a href="">Сумки</a></li>
                                <li><a href="">Бижутерия</a></li>
                                <li><a href="">Кошельки и бумажники</a></li>
                                <li><a href="">Шапки и шарфы</a></li>
                                <li><a href="">Солнцезащитные очки</a></li>
                                <li><a href="">Ремни</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
            
        </div>
        <div class="vhod">
            <?php
                if($_SESSION['auth'] != 0){
                    $user = $_SESSION['auth'];
                    echo '<p id="username">' . $user['name'] . ' ' . $user['surname'] . '</p>';
                    echo '<a href="logout.php">Выйти</a>';
                }

                else {
                    echo '<a href="login.php">Вход</a>';
                }
            ?>
            <a href=""><i class="fa fa-shopping-cart"></i></a>
        </div>
    </div>
<hr>
<div class="it">Бесплатная доставка от KZT 11 500</div>
<hr>

<form action="login.php" method="post">
    <input type="text" placeholder="Логин..." name="login" required>
    <input type="password" placeholder="Пароль..." name="pass" required>
    <button type="submit" name="log">Войти</button>
</form>
<p>Нет аккаунта? <a href="sign-up.php">Зарегистрироваться</a></p>

<footer class="footer">
    <a href=""><i class="fab fa-instagram "></i></a>
    <a href=""><i class='fab fa-facebook'></i></a>
    <a href=""><i class='fab fa-twitter'></i></a>
    <a href=""><i class='fab fa-vk'></i></a>
    <div class="end">&copy<?=date('Y')?> RESTYLE</div>
</footer>
</body>
</html>






