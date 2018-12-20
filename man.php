<?php
    $conn = mysqli_connect('localhost', 'root', '', 'restyle');
    session_start();
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
			z-index: 2000;
			list-style-type: none;
			display: block;
			margin-bottom: 15px 0px;

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
		.www1{
			width: 15%;
			height: 100%;
			text-align: left;
			position: relative;
			left: 10px;
			top: 0px;
		}
		.cveta{
			display: flex;
			flex-direction: column;
		}
		.razmer{
			display: flex;
			flex-direction: column;
		}
		.item{
			display: inline-flex;
			color: black;
			text-decoration-line: none;
			font-size: 13px;
		}
		.odezhda a{
			color: black;
			text-decoration-line: none;
			font-size: 13px;
		}
		.aksessuary a{
			color: black;
			text-decoration-line: none;
			font-size: 13px;
		}
		input[type="checkbox"] {
			display: none;
		}
		label {
			color: #000;
			cursor: default;
			font-weight: normal;
			line-height: 30px;
			padding: 10px 0;
			vertical-align: middle;
		}
		label:before {
			content: " ";
			color: #000;
			display: inline-block;
			font: 20px/30px FontAwesome;
			margin-right: 15px;
			position: relative;
			text-align: center;
			text-indent: 0px;
			width: 30px;
			height: 30px;
			background: #F4F0F4;
			border: 1px solid #e3e3e3;
			border-image: initial;
			vertical-align: middle;
		}
		input:checked + label:before {
			content: "\f00c";
		}
		input:disabled + label:before {
			background: #eee;
			color: #aaa;
		}
		.www2{
			width: 85%;
			height: 100%;
			position: relative;
			left: 15%;
			top: 0px;
			display: flex;
			flex-wrap: wrap;
		}
		.namee p{
			text-align: center;
		}
		.namee {
			display: inline-block;
			justify-content: space-around;
			text-align: center;
			width: 400px;
			height: 600px;
		}
		.www{
		height: 0px;
		}
		.namee img {
	  		transition: transform .2s;
	  		margin: 0 auto;
		}

		.namee img:hover {
	  		-ms-transform: scale(1.5); 
	  		-webkit-transform: scale(1.5); 
	  		transform: scale(1.5); 
		}
		.overlay a{
			color: black;
			text-decoration-line: none;
		}

	</style>
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
	<div class="www">
	<div class="www1">
		<div class="odezhda">
			<h3>ОДЕЖДА</h3>
			<a href="mens.php?name=Пальто"><p>Пальто</p></a>
			<a href=""><p>Куртки</p></a>
			<a href=""><p>Костюмы</p></a>
			<a href=""><p>Пиджаки</p></a>
			<a href=""><p>Толстовки</p></a>
			<a href=""><p>Кожа</p></a>
			<a href=""><p>Свитеры</p></a>
			<a href="mens.php?name=Рубашки"><p>Рубашки</p></a>
			<a href=""><p>Футболки</p></a>
			<a href="mens.php?name=Брюки"><p>Брюки</p></a>
			<a href="mens.php?name=Джинсы"><p>Джинсы</p></a>
			<a href=""><p>Парки</p></a>
		</div>
		<div class="aksessuary">
			<h3>АКСЕССУАРЫ</h3>
			<a href="mens.php?name=Обувь"><p>Обувь</p></a>
			<a href=""><p>Сумки</p></a>
			<a href=""><p>Бумажники</p></a>
			<a href=""><p>Платки и шарфы</p></a>
			<a href=""><p>Солнцезащитные очки</p></a>
			<a href=""><p>Ремни</p></a>
			<a href=""><p>Шапки и перчатки</p></a>
		</div>
		<div class="cveta">
			<h3>ЦВЕТА</h3>
			<div class="item">
				<input type="checkbox" id="a" value="Черные">
				<label for="a">Черные</label>
			</div>
			<div class="item">
				<input type="checkbox" id="b" value="Белые">
				<label for="b">Белые</label>
			</div>
			<div class="item">
				<input type="checkbox" id="c" value="Красные">
				<label for="c">Красные</label>
			</div>
			<div class="item">
				<input type="checkbox" id="d" value="Серые">
				<label for="d">Серые</label>
			</div>
			<div class="item">
				<input type="checkbox" id="e" value="Синие">
				<label for="e">Синие</label>
			</div>
			<div class="item">
				<input type="checkbox" id="f" value="Бежевые">
				<label for="f">Бежевые</label>
			</div>
			<div class="item">
				<input type="checkbox" id="g" value="Зеленые">
				<label for="g">Зеленые</label>
			</div>
			<div class="item">
				<input type="checkbox" id="h" value="Коричневые">
				<label for="h">Коричневые</label>
			</div>
			<div class="item">
				<input type="checkbox" id="i" value="Кремовые">
				<label for="i">Кремовые</label>
			</div>
			<div class="item">
				<input type="checkbox" id="j" value="Розовые">
				<label for="j">Розовые</label>
			</div>
			<div class="item">
				<input type="checkbox" id="k" value="Желтые">
				<label for="k">Желтые</label>
			</div>
			<div class="item">
				<input type="checkbox" id="l" value="Фиолетовые">
				<label for="l">Фиолетовые</label>
			</div>
		</div>
		<div class="razmer">
			<h3>Размер</h3>
			<div class="item">
				<input type="checkbox" id="m">
				<label for="m">XS</label>
			</div>
			<div class="item">
				<input type="checkbox" id="n">
				<label for="n">S</label>
			</div>
			<div class="item">
				<input type="checkbox" id="o">
				<label for="o">M</label>
			</div>
			<div class="item">
				<input type="checkbox" id="p">
				<label for="p">L</label>
			</div>
			<div class="item">
				<input type="checkbox" id="q">
				<label for="q">XL</label>
			</div>
		</div>
	</div>
</div>
<div class="www">
	<div class="www2">
		<?php
			$type=[["namee"=>"Пальто","img"=>"https://st.mngbcn.com/rcs/pics/static/T3/fotos/S20/33055724_56.jpg?ts=1533663517968&imwidth=287&imdensity=1.25","price"=>"KZT 30000"],["namee"=>"Пальто","img"=>"https://st.mngbcn.com/rcs/pics/static/T3/fotos/outfit/S20/33083746_09-99999999_01.jpg?ts=1532003565381&imwidth=287&imdensity=1.25","price"=>"KZT 30000"],["namee"=>"Пальто","img"=>"https://st.mngbcn.com/rcs/pics/static/T3/fotos/outfit/S20/33085718_98-99999999_01.jpg?ts=1533663517968&imwidth=287&imdensity=1.25","price"=>"KZT 35000"],["namee"=>"Пальто","img"=>"https://st.mngbcn.com/rcs/pics/static/T3/fotos/outfit/S20/33023741_99-99999999_01.jpg?ts=1534509192176&imwidth=287&imdensity=1.25","price"=>"KZT 30000"],["namee"=>"Пальто","img"=>"https://st.mngbcn.com/rcs/pics/static/T4/fotos/S20/43049063_52.jpg?ts=1543836819752&imwidth=287&imdensity=1.25","price"=>"KZT 30000"],["namee"=>"Пальто","img"=>"https://st.mngbcn.com/rcs/pics/static/T3/fotos/S20/33097625_03.jpg?ts=1536327180339&imwidth=287&imdensity=1.25","price"=>"KZT 30000"],["namee"=>"Пальто","img"=>"https://st.mngbcn.com/rcs/pics/static/T3/fotos/S20/33077632_99.jpg?ts=1536060718509&imwidth=287&imdensity=1.25","price"=>"KZT 30000"],["name"=>"Пальто","img"=>"https://st.mngbcn.com/rcs/pics/static/T3/fotos/outfit/S20/33065727_92-99999999_01.jpg?ts=1531327744344&imwidth=287&imdensity=1.25","price"=>"KZT 30000"],["namee"=>"Пальто","img"=>"https://st.mngbcn.com/rcs/pics/static/T4/fotos/S20/43069061_09.jpg?ts=1544607182124&imwidth=287&imdensity=1.25","price"=>"KZT 30000"],["namee"=>"Брюки","img"=>"https://st.mngbcn.com/rcs/pics/static/T3/fotos/outfit/S20/33053745_16-99999999_01.jpg?ts=1533663517968&imwidth=287&imdensity=1.25","price"=>"KZT 25990"],["namee"=>"Брюки","img"=>"https://st.mngbcn.com/rcs/pics/static/T3/fotos/outfit/S20/33023041_01-99999999_01.jpg?ts=1535380633303&imwidth=287&imdensity=1.25","price"=>"KZT 25990"],["namee"=>"Брюки","img"=>"https://st.mngbcn.com/rcs/pics/static/T3/fotos/S20/33035808_57.jpg?ts=1539189206105&imwidth=287&imdensity=1.25","price"=>"KZT 25990"],["namee"=>"Брюки","img"=>"https://st.mngbcn.com/rcs/pics/static/T3/fotos/outfit/S20/33043733_93-99999999_01.jpg?ts=1533645715663&imwidth=287&imdensity=1.25","price"=>"KZT 25990"],["namee"=>"Брюки","img"=>"https://st.mngbcn.com/rcs/pics/static/T3/fotos/S20/33075718_77.jpg?ts=1533145948034&imwidth=287&imdensity=1.25","price"=>"KZT 25990"],["namee"=>"Брюки","img"=>"https://st.mngbcn.com/rcs/pics/static/T3/fotos/S20/33020541_37.jpg?ts=1528908162308&imwidth=287&imdensity=1.25","price"=>"KZT 25990"],["namee"=>"Брюки","img"=>"https://st.mngbcn.com/rcs/pics/static/T3/fotos/S20/33073746_64.jpg?ts=1534501985602&imwidth=287&imdensity=1.25","price"=>"KZT 25990"],["namee"=>"Брюки","img"=>"https://st.mngbcn.com/rcs/pics/static/T3/fotos/outfit/S20/33065724_39-99999999_01.jpg?ts=1535477236293&imwidth=287&imdensity=1.25","price"=>"KZT 25990"],["namee"=>"Брюки","img"=>"https://st.mngbcn.com/rcs/pics/static/T3/fotos/S20/33020542_69.jpg?ts=1528908162308&imwidth=287&imdensity=1.25","price"=>"KZT 25990"],["namee"=>"Рубашки","img"=>"https://st.mngbcn.com/rcs/pics/static/T3/fotos/S20/33080625_99_D1.jpg?ts=1528972687676&imwidth=287&imdensity=1.25","price"=>"KZT 10990"],["namee"=>"Рубашки","img"=>"https://st.mngbcn.com/rcs/pics/static/T3/fotos/S20/33023748_52_D2.jpg?ts=1533645715663&imwidth=287&imdensity=1.25","price"=>"KZT 10990"],["namee"=>"Рубашки","img"=>"https://st.mngbcn.com/rcs/pics/static/T3/fotos/S20/33017640_56.jpg?ts=1538134384348&imwidth=287&imdensity=1.25","price"=>"KZT 10990"],["namee"=>"Рубашки","img"=>"https://st.mngbcn.com/rcs/pics/static/T3/fotos/S20/33023749_01_D1.jpg?ts=1533663517968&imwidth=287&imdensity=1.25","price"=>"KZT 10990"],["namee"=>"Рубашки","img"=>"https://st.mngbcn.com/rcs/pics/static/T3/fotos/S20/33053731_TC.jpg?ts=1533645715663&imwidth=287&imdensity=1.25","price"=>"KZT 10990"],["namee"=>"Рубашки","img"=>"https://st.mngbcn.com/rcs/pics/static/T3/fotos/S20/33037638_92.jpg?ts=1537525989900&imwidth=287&imdensity=1.25","price"=>"KZT 10990"],["namee"=>"Рубашки","img"=>"https://st.mngbcn.com/rcs/pics/static/T3/fotos/S20/33070681_20.jpg?ts=1528908162308&imwidth=287&imdensity=1.25","price"=>"KZT 10990"],["namee"=>"Рубашки","img"=>"https://st.mngbcn.com/rcs/pics/static/T3/fotos/S20/33075720_01.jpg?ts=1535477236293&imwidth=287&imdensity=1.25","price"=>"KZT 10990"],["namee"=>"Рубашки","img"=>"https://st.mngbcn.com/rcs/pics/static/T3/fotos/S20/33063784_01.jpg?ts=1533645715663&imwidth=287&imdensity=1.25","price"=>"KZT 10990"],["namee"=>"Джинсы","img"=>"https://st.mngbcn.com/rcs/pics/static/T3/fotos/outfit/S20/33020570_TO-99999999_01.jpg?ts=1528908162308&imwidth=287&imdensity=1.25","price"=>"KZT 10990"],["namee"=>"Джинсы","img"=>"https://st.mngbcn.com/rcs/pics/static/T3/fotos/outfit/S20/33090808_TG-99999999_01.jpg?ts=1531139611977&imwidth=287&imdensity=1.25","price"=>"KZT 10990"],["namee"=>"Джинсы","img"=>"https://st.mngbcn.com/rcs/pics/static/T3/fotos/S20/33010592_TS.jpg?ts=1528908162308&imwidth=287&imdensity=1.25","price"=>"KZT 10990"],["namee"=>"Джинсы","img"=>"https://st.mngbcn.com/rcs/pics/static/T3/fotos/S20/33020567_TS_D1.jpg?ts=1528908162308&imwidth=287&imdensity=1.25","price"=>"KZT 10990"],["namee"=>"Джинсы","img"=>"https://st.mngbcn.com/rcs/pics/static/T3/fotos/outfit/S20/33013806_BB-99999999_01.jpg?ts=1534505590682&imwidth=287&imdensity=1.25","price"=>"KZT 10990"],["namee"=>"Джинсы","img"=>"https://st.mngbcn.com/rcs/pics/static/T3/fotos/outfit/S20/33010595_TN-99999999_01.jpg?ts=1528908162308&imwidth=287&imdensity=1.25","price"=>"KZT 10990"],["namee"=>"Джинсы","img"=>"https://st.mngbcn.com/rcs/pics/static/T3/fotos/S20/33020573_TG.jpg?ts=1528908162308&imwidth=287&imdensity=1.25","price"=>"KZT 10990"],["namee"=>"Джинсы","img"=>"https://st.mngbcn.com/rcs/pics/static/T3/fotos/outfit/S20/33010586_TC-99999999_01.jpg?ts=1524232408591&imwidth=287&imdensity=1.25","price"=>"KZT 10990"],["namee"=>"Джинсы","img"=>"https://st.mngbcn.com/rcs/pics/static/T3/fotos/S20/33020572_TG.jpg?ts=1528908162308&imwidth=287&imdensity=1.25","price"=>"KZT 10990"],["namee"=>"Обувь","img"=>"https://st.mngbcn.com/rcs/pics/static/T3/fotos/S20/33080837_99_B.jpg?ts=1538479994920&imwidth=287&imdensity=1.25","price"=>"KZT 10990"],["namee"=>"Обувь","img"=>"https://st.mngbcn.com/rcs/pics/static/T3/fotos/S20/33030606_CU.jpg?ts=1525941454813&imwidth=287&imdensity=1.25","price"=>"KZT 10990"],["namee"=>"Обувь","img"=>"https://st.mngbcn.com/rcs/pics/static/T3/fotos/S20/33095750_99_D8.jpg?ts=1541011204971&imwidth=287&imdensity=1.25","price"=>"KZT 10990"],["namee"=>"Обувь","img"=>"https://st.mngbcn.com/rcs/pics/static/T3/fotos/S20/33080567_01_B.jpg?ts=1524562425784&imwidth=287&imdensity=1.25","price"=>"KZT 10990"],["namee"=>"Обувь","img"=>"https://st.mngbcn.com/rcs/pics/static/T3/fotos/S20/33090567_92_B.jpg?ts=1530636222298&imwidth=287&imdensity=1.25","price"=>"KZT 10990"],["namee"=>"Обувь","img"=>"https://st.mngbcn.com/rcs/pics/static/T3/fotos/S20/33080645_99_D8.jpg?ts=1541414599513&imwidth=287&imdensity=1.25","price"=>"KZT 10990"],["namee"=>"Обувь","img"=>"https://st.mngbcn.com/rcs/pics/static/T4/fotos/S20/43085024_CU_D3.jpg?ts=1544617991730&imwidth=287&imdensity=1.25","price"=>"KZT 10990"],["namee"=>"Обувь","img"=>"https://st.mngbcn.com/rcs/pics/static/T3/fotos/S20/33070568_37_B.jpg?ts=1522921151503&imwidth=287&imdensity=1.25","price"=>"KZT 10990"],["namee"=>"Обувь","img"=>"https://st.mngbcn.com/rcs/pics/static/T3/fotos/S20/33050838_30_D3.jpg?ts=1528908162308&imwidth=287&imdensity=1.25","price"=>"KZT 10990"]];

			if(isset($_GET['namee'])){
				$name =  $_GET['namee'];
				foreach($type as $element){
					if($element['namee'] == $namee)
						echo "<div class=\"namee\">
									<a href =\"#\"><img src=\"" . $element['img'] ."\"/></>
									<div class=\"overlay\"><a href=\"\">"."Добавить"."
									".$element['price']."
									</div>
								</div>";
				}
			}
		?>
	</div>
	</div>
</body>
</html>






