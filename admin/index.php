<?php
include "dbLib.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Контакты</title>

    <!-- Bootstrap -->
    <link href="../css/normalize.css" rel="stylesheet">	
    <link href="../css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/font.css">	
	<link rel="stylesheet" href="../css/style.css"> <!-- общие стили -->
	<link rel="stylesheet" href="../css/contact.css"> <!-- стили конкретной страницы -->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
	<header>
	<section class="header-top">
		<div class="row">
			<div class="col-sm-2">
				<a href="\"><img src="../img/logo.png" class="center-block"></a>
			</div>		
			<div class="col-sm-4 text-left">
				<a href="\"><span class="nameOfCompany">Arkada</span></a>
			</div>
			<div class="col-sm-6 text-right" style="padding-top: 31px; padding-right: 30px;">
				<span class="writeToUs">Напишите нам</br><a href="mailto:info@arkadaspb.ru">info@arkadaspb.ru</a></span>
			</div>
		</div>	
	</section>
	<section class="header-second">	
		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col-sm-2 navigationBox text-uppercase">
				<a href="../index.html">
				<span class="fa-stack fa-2x navigationIcon">
					<i class="fa fa-circle-thin fa-stack-2x"></i>
					<i class="fa fa-home fa-stack-1x"></i>
				</span>	
				</br><span class="navigationText">Главная</span>
				</a>
			</div>
			<div class="col-sm-2 navigationBox text-uppercase">
				<a href="../project.html">
				<span class="fa-stack fa-2x navigationIcon">
					<i class="fa fa-circle-thin fa-stack-2x"></i>
					<i class="fa fa-globe fa-stack-1x"></i>
				</span>	
				</br><span class="navigationText">проекты</span>	
				</a>
			</div>
			<div class="col-sm-2 navigationBox text-uppercase">
				<a href="../vacancy.html">
				<span class="fa-stack fa-2x navigationIcon">
					<i class="fa fa-circle-thin fa-stack-2x"></i>
					<i class="fa fa-cog fa-stack-1x"></i>
				</span>	
				</br><span class="navigationText">вакансии</span>	
				</a>				
			</div>
			<div class="col-sm-2 navigationBox text-uppercase">
				<a href="../rewiews.html">			
				<span class="fa-stack fa-2x navigationIcon">
					<i class="fa fa-circle-thin fa-stack-2x"></i>
					<i class="fa fa-commenting fa-stack-1x"></i>
				</span>	
				</br><span class="navigationText">отзывы</span>		
				</a>				
			</div>
			<div class="col-sm-2 navigationBoxActive text-uppercase">
				<a href="../contact.html">
				<span class="fa-stack fa-2x navigationIconActive">
					<i class="fa fa-circle-thin fa-stack-2x"></i>
					<i class="fa fa-envelope fa-stack-1x"></i>
				</span>	
				</br><span class="navigationText">контакты</span>	
				</a>				
			</div>		
			<div class="col-sm-1"></div>		
		</div>
	</section>
	<section class="header-bar">		
		<div class="row">
			<div class="col-sm-2">
				<span class="characterOfCompany">K</span>
			</div>
			<div class="col-sm-10">
				<h2><p class="text-left">Ждем от Вас <span class="blueNameCompany">Предложений о сотрудничестве!</span></p></h2>
				<p class="text-left">Вы можете связаться с нами, заполнив специальную форму или используя контактные данные. Мы ждём от Вас предложений по улучшению нашей работы или предложений о сотрудничестве. </p>
			</div>
		</div>
	</section>
	</header>
</div>	
<div class="container">	
	<section class="contact">
		<div class="check-reviews"><h2>Отзывы на модерацию</h2>		
 		<div class="row padding-top-40 grid">		
		<?php $stmt = $connection->query('SELECT * FROM reviews WHERE status = 0 AND deleted = 0 order by id desc');
			while($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{?>
			<div class="col-xs-6 col-sm-4 col-md-3 reviews-block-admin grid-item">
				<div class="text" style="padding-left: 10px; padding-right: 10px;">			
				<p class="name text-left"><strong><?php echo $row["firstname"] ?></strong></p><p class="date text-left"><?php echo $row["date"] ?></p>		
				<p class="text-justify"><?php echo $row["message"] ?></p>
				</div>	
				<div class="post_full_like_wrap">	
					<div class="col-sm-3"></div>					
					<div class="col-sm-2"><a id="tooltip" href="delete.php?id=<?php echo $row["id"]?>" title="Удалить"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a></div>
					<div class="col-sm-2"></div>
					<div class="col-sm-2"><a id="tooltip" href="post.php?id=<?php echo $row["id"]?>" title="Опубликовать на сайте"><i class="fa fa-hdd-o fa-2x" aria-hidden="true"></i></a></div>
					<div class="col-sm-3"></div>					
				</div>				
			</div>
			<?}?>
		</div>
		</div>
		<div class="public-reviews"><h2>Опубликованные отзывы</h2>	
 		<div class="row padding-top-40 grid">		
		<?php $stmt = $connection->query('SELECT * FROM reviews WHERE status = 1 order by id desc');
			while($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{?>
			<div class="col-xs-6 reviews-block-admin grid-item">
				<div class="text" style="padding-left: 10px; padding-right: 10px; background-color: #ffffff;">			
					<p class="name text-left"><strong><?php echo $row["firstname"] ?></strong></p><p class="date text-left"><?php echo $row["date"] ?></p>		
					<p class="text-justify"><?php echo $row["message"] ?></p>
				</div>	
				<div class="post_full_like_wrap">	
					<div class="col-sm-3"></div>					
					<div class="col-sm-2"><a id="tooltip" href="delete.php?id=<?php echo $row["id"]?>" title="Удалить"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a></div>
					<div class="col-sm-2"></div>
					<div class="col-sm-2"><a id="tooltip" href="post.php?id=<?php echo $row["id"]?>" title="Опубликовать на сайте"><i class="fa fa-hdd-o fa-2x" aria-hidden="true"></i></a></div>
					<div class="col-sm-3"></div>					
				</div>
			</div>
			<?}?>
		</div>	
		</div>
		<div class="deleted-reviews"><h2>Удаленные отзывы</h2>
 		<div class="row padding-top-40 grid">		
		<?php $stmt = $connection->query('SELECT * FROM reviews WHERE deleted = 1 order by id desc');
			while($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{?>
			<div class="col-xs-6 col-sm-4 col-md-3 reviews-block-admin grid-item">
				<div class="text" style="padding-left: 10px; padding-right: 10px;">			
				<p class="name text-left"><strong><?php echo $row["firstname"] ?></strong></p><p class="date text-left"><?php echo $row["date"] ?></p>		
				<p class="text-justify"><?php echo $row["message"] ?></p>
				</div>	
				<div class="post_full_like_wrap">	
					<div class="col-sm-3"></div>					
					<div class="col-sm-2"><a id="tooltip" href="delete.php?id=<?php echo $row["id"]?>" title="Удалить"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a></div>
					<div class="col-sm-2"></div>
					<div class="col-sm-2"><a id="tooltip" href="post.php?id=<?php echo $row["id"]?>" title="Опубликовать на сайте"><i class="fa fa-hdd-o fa-2x" aria-hidden="true"></i></a></div>
					<div class="col-sm-3"></div>					
				</div>				
			</div>
			<?}?>
		</div>
		</div>
		<div class="question"><h2>Анкеты</h2>
 		<div class="row padding-top-40 grid">		
		<?php $stmt = $connection->query('SELECT * FROM anketa WHERE deleted = 0 order by id desc');
			while($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{?>
			<div class="col-xs-6 col-sm-4 col-md-3 reviews-block-admin grid-item">
				<div class="text">			
				<p class="name text-left"><strong><?php echo $row["Name"]?> <?php echo $row["LastName"]?></strong></p>
				<p class="date text-left"><strong><?php echo $row["Tel"]?></strong></p>
				<p class="date text-left"><strong><a href="mailto:<?php echo $row["Email"]?>"><?php echo $row["Email"]?></a></strong></p>
				<p class="age text-left"><strong>Возраст: <?php echo $row["age"] ?></strong></p>				
				<p class="date text-left">Дата заполнения: <?php echo $row["date"]?></p>	
				<p class="date text-left">На последнем м/р, мес.: в платной версии)))</p>				
				<p class="text-left"><strong>Вакансия: </strong><?php echo $row["position"]?></p>
				<p class="text-justify"><strong>Обязанности: </strong><?php echo $row["responsibilities"]?></p>
				<p class="text-justify"><strong>Навыки: </strong><?php echo $row["skills"]?></p>
				</div>	
				<div class="post_full_like_wrap">	
					<div class="col-sm-3"></div>					
					<div class="col-sm-2"><a id="tooltip" href="delete_anketa.php?id=<?php echo $row["id"]?>" title="Удалить"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a></div>
					<div class="col-sm-2"></div>
					<div class="col-sm-2"></div>
					<div class="col-sm-3"></div>					
				</div>				
			</div>
			<?}?>
		</div>
		</div>			
	</section>
</div>
<div class="container">
	<footer>
		<div class="row" style="margin-left: 0px; margin-right: 0px; padding-top: 22px;">
			<div class="col-sm-3  footerBoxText">
				Меню сайта
			</div>
			<div class="col-sm-6  footerBoxText">
				Контактные данные
			</div>
			<div class="col-sm-3 ">
				<span class="nameOfCompanyFooter">Arkada</span>
			</div>
		</div>
		<div class="row" style="padding-top: 22px;">
			<div class="col-sm-3">
				<div class="row">
					<div class="col-sm-6 text-right footerBoxTextMenu">
					<i class="fa fa-angle-double-right" aria-hidden="true"></i>
					</div>
					<div class="col-sm-6 text-left footerBoxTextMenu"><a href="../index.html">главная</a></div>					
				</div>
				<div class="row">
					<div class="col-sm-6 text-right">
					<i class="fa fa-angle-double-right footerBoxTextMenu" aria-hidden="true"></i>
					</div>
					<div class="col-sm-6 text-left footerBoxTextMenu"><a href="../project.html">проекты</a></div>					
				</div>
				<div class="row">
					<div class="col-sm-6 text-right">
					<i class="fa fa-angle-double-right footerBoxTextMenu" aria-hidden="true"></i>
					</div>
					<div class="col-sm-6 text-left footerBoxTextMenu"><a href="../vacancy.html">вакансии</a></div>					
				</div>
				<div class="row">
					<div class="col-sm-6 text-right">
					<i class="fa fa-angle-double-right footerBoxTextMenu" aria-hidden="true"></i>
					</div>
					<div class="col-sm-6 text-left footerBoxTextMenu"><a href="../rewiews.html">отзывы</a></div>					
				</div>
				<div class="row">
					<div class="col-sm-6 text-right">
					<i class="fa fa-angle-double-right footerBoxTextMenu" aria-hidden="true"></i>
					</div>
					<div class="col-sm-6 text-left footerBoxTextMenu"><a href="../contact.html">контакты</a></div>					
				</div>				
			</div>
			<div class="col-sm-6">
				<div class="row">
				<ins><span class="footerBoxTextMenu">Адрес</span></ins></br>
				Санкт-Петербург, м. Ладожская, </br>Проспект Косыгина, 21 лит. А </br>
				<ins><span class="footerBoxTextMenu">Email</span></ins></br>
				<a href="mailto:info@arkadaspb.ru">info@arkadaspb.ru</a></br>
				<ins><span class="footerBoxTextMenu">Телефон</span></ins></br>
				8(812)577-24-99
				</div>
			</div>
			
		</div>		
	</footer>
</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
	<script src="../libs/owl-carousel/owl.carousel.js"></script>
	<script src="../js/jquery.scrollUp.min.js" type="text/javascript"></script>	
	<script src="../libs/masonry/masonry.pkgd.min.js"></script>	
	<script src="../js/myscripts.js" type="text/javascript"></script>	
  </body>
</html>