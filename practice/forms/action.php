<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
		<title>Результат выполенния формы</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="description"  content="Песочница. Просто песочница. Проходи дальше" />
		<meta name="robots" content="index, follow">
<?php include ("{$_SERVER['DOCUMENT_ROOT']}template/inc/scripts.php"); ?>
</head>
<body>
<?php include ("{$_SERVER['DOCUMENT_ROOT']}template/inc/header.php"); ?>
<div class="contet txt">
<h1>Спасибо за ответ</h1>


<p>Здравствуйте, <?php echo htmlspecialchars($_POST['name']); ?>.</p>
<p>Вам <?php echo (int)$_POST['age']; ?> лет.</p>


</div>
<?php include ("{$_SERVER['DOCUMENT_ROOT']}template/inc/footer.php"); ?>
</body>
</html>