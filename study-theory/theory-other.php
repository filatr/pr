﻿<?php include ("{$_SERVER['DOCUMENT_ROOT']}/template/inc/header.php"); ?>
<h1>Разное</h1>

<p>Источники</p>
<ul>
	<li><a href="https://uk.wikipedia.org/wiki/CURL" target="_blank">cURL [wikipedia ua]</a>
		<ul>
			<li><a href="https://curl.haxx.se/" target="_blank">"Родной сайт"</a></li>
			<li><a href="https://github.com/curl/curl" target="_blank">GIThub</a></li>
		</ul>
	</li>
	<li><a href="https://losst.ru/kak-polzovatsya-curl" target="_blank">Как пользоваться curl</a></li>
</ul>
<hr>
<h2>cURL</h2>

<p>Нам часто приходится загружать различные файлы из интернета, например, исполняемые файлы программ, файлы скриптов, архивы с исходниками. Но не всегда это нужно делать через браузер. Во многих ситуациях гораздо проще выполнить все действия через терминал. Поскольку таким образом вы можете автоматизировать процесс. С другой стороны, веб-мастерам время от времени приходится тестировать доступность веб-сайтов, проверять отправляемые и получаемые заголовки и многое другое.</p>
<p>Для решения таких задач и задач подобного круга можно воспользоваться утилитой curl. Она позволяет решить намного более широкий круг задач, среди которых даже имитация действий пользователя на сайте. В этой статье мы рассмотрим как пользоваться curl, что это такое и зачем нужна эта программа.</p>
<h3>Что такое curl?</h3>
<p>Кроссплатформенная служебная программа командной строки, позволяющая взаимодействовать с множеством различных серверов по множеству различных протоколов с синтаксисом URL.</p>
<p>Программа cURL может автоматизировать передачу файлов или последовательность таких операций. Например, это хорошее средство для моделирования действий пользователя в веб-обозревателе.</p>
<p>Программа поддерживает протоколы: FTP, FTPS, HTTP, HTTPS, TFTP, SCP, SFTP, Telnet, DICT, LDAP, а также POP3, IMAP и SMTP. Также cURL поддерживает сертификаты HTTPS, методы HTTP POST, HTTP PUT, загрузку на FTP, загрузку через формы HTTP.</p>
<p>Поддерживаемые методы аутентификации: базовая, дайджест, NTLM и Negotiate для HTTP, а также Kerberos для FTP.</p>
<p>Возможно возобновление передачи файла с места обрыва (при поддержке протоколом), туннелирование через HTTP-прокси, поддержка HTTP-Cookie.</p>
<p>cURL — это не офлайн-браузер типа HTTrack и не может целиком загрузить содержимое сайта.</p>
<hr>
<?php include ("{$_SERVER['DOCUMENT_ROOT']}/template/inc/footer.php"); ?>
<?php //include '../template/inc/footer.php'; ?>