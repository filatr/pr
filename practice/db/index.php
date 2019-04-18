﻿<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
		<title>БД и SQL: разбор</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="description"  content="Песочница. Просто песочница. Проходи дальше" />
		<meta name="robots" content="index, follow">
<?php include ("{$_SERVER['DOCUMENT_ROOT']}template/inc/scripts.php"); ?>
</head>
<body>
<?php include ("{$_SERVER['DOCUMENT_ROOT']}template/inc/header.php"); ?>
<div class="contet txt">
<h1>БД и SQL запросы</h1>
<p><a href="/phpmyadmin/" target="_blank">phpmyadmin</a></p>
<p>Источники</p>

<ul>
<li><a href="http://tradebenefit.ru/primery-mysql-zaprosov" target="_blank">Примеры SQL запросов к базе данных MySQL</a></li>
<li><a href="https://www.site-do.ru/db/db.php#2" target="_blank">Уроки SQL и баз данных</a>
	<ul><li><a href="https://www.site-do.ru/db/sql4.php" target="_blank">Урок 4. Выборка данных - оператор SELECT</a></li></ul>
</li>
<li><a href="https://www.php.net/manual/ru/mysqli.quickstart.statements.php" target="_blank">Выполнение запросов</a></li>
<li><a href="https://www.php.net/manual/ru/function.mysql-query.php" target="_blank">mysql_query</a></li>
<li><a href="https://php.ru/manual/function.mysql-query.html" target="_blank">mysql_query - Посылает запрос MySQL</a></li>
<li><a href="http://www.php.su/articles/?cat=phpdb&page=025" target="_blank">SQL - запросы и их обработка с помощью PHP</a></li>
<li><a href="https://htmlweb.ru/php/mysql.php" target="_blank">Связь с базами данных MySQL</a></li>
<li><a href="https://metanit.com/web/php/7.5.php" target="_blank">Получение данных</a></li>
</ul>

<h2>Теория</h2>
<h3>Подключение к БД</h3>
<pre>
<code>
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "new_bd";

// Создание подключения
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка подключения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
</code>
</pre>

<p>Подключение к БД: mysqli_connect(хост, пользователь, пароль, название БД)</p>
<p>После выполенения скрыпта закрыть соединение к БД: mysqli_close();</p>
<p>mysqli_query() - что-то запрашиваем в БД, синтаксис: SELECT "выборка таблицы или всех" FROM "название ячейки"</p>
<p>Чтобы <span class="like_b">создать</span> таблицу, нам надо использовать выражение SQL "CREATE TABLE 'название таблицы'"</p>
<p>Чтобы <span class="like_b">удалить</span> таблицу, нам надо использовать выражение SQL "DROP TABLE 'название таблицы'"</p>
<p>Чтобы <span class="like_b">добавить данные</span> в таблицу, нам надо использовать SQL "INSERT" (<span class="like_i">INSERT INTO tovars VALUES(NULL, 'Samsung Galaxy III','Samsumg')</span>)</p>
<!--
INSERT INTO tablica1(id, name) VALUE (1, "Валентин");
INSERT INTO tablica1(id, name) VALUE (2, "Николай");
INSERT INTO tablica1(id, name) VALUE (3, "Василий");
INSERT INTO tablica2(id, age) VALUE (1, "28");
INSERT INTO tablica2(id, age) VALUE (2, "29");
INSERT INTO tablica2(id, age) VALUE (3, "30");
-->
<p>mysqli_real_escape_string() - защита со стороны скрипта (SQL-инъекции)</p>
<p>Чтобы <span class="like_b">получить данные</span> из таблици, нам надо использовать SQL "SELECT" (<span class="like_i">SELECT * FROM tovars)</span>)</p>
<p>mysqli_num_rows() - узнаем количество строк</p>
<p>mysqli_fetch_row() - извлечь отдельную строку</p>
<p>mysqli_free_result() - очистить память от ненужных данных</p>
<p>Чтобы <span class="like_b">редактировать данные</span> в таблице, нам надо использовать SQL "UPDATE" (<span class="like_i">UPDATE tovars SET name='Samsung ACE II', company='Samsung' WHERE id='1')</span>), при редактировании юзать GET</p>
<p>Чтобы <span class="like_b">удалить данные</span> из таблици, нам надо использовать SQL "DELETE" (<span class="like_i">DELETE FROM tovars WHERE id = '5'</span>)</p>

<hr>
<h3>что такое index sql</h3>

<p>Одним из важнейших путей достижения высокой производительности SQL Server является использование индексов. Индекс ускоряет процесс запроса, предоставляя быстрый доступ к строкам данных в таблице, аналогично тому, как указатель в книге помогает вам быстро найти необходимую информацию.</p>
<div class="spoiler_v2">
<p href="#" class="spoiler-trigger"><span>Далее</span></p>
<div class="spoiler-block">
<h4>Структура индекса</h4>
<p>Индексы создаются для столбцов таблиц и представлений. Индексы предоставляют путь для быстрого поиска данных на основе значений в этих столбцах. Например, если вы создадите индекс по первичному ключу, а затем будете искать строку с данными, используя значения первичного ключа, то SQL Server сначала найдет значение индекса, а затем использует индекс для быстрого нахождения всей строки с данными. Без индекса будет выполнен полный просмотр (сканирование) всех строк таблицы, что может оказать значительное влияние на производительность.</p>
<p>Вы можете создать индекс на большинстве столбцов таблицы или представления. Исключением, преимущественно, являются столбцы с типами данных для хранения больших объектов (LOB), таких как image, text или varchar(max). Вы также можете создать индексы на столбцах, предназначенных для хранения данных в формате XML, но эти индексы устроены немного иначе, чем стандартные и их рассмотрение выходит за рамки данной статьи. Также в статье не рассматриваются columnstore индексы. Вместо этого я фокусируюсь на тех индексах, которые наиболее часто применяются в базах данных SQL Server.</p>
<p>Индекс состоит из набора страниц, узлов индекса, которые организованы в виде древовидной структуры — сбалансированного дерева. Эта структура является иерархической по своей природе и начинается с корневого узла на вершине иерархии и конечных узлов, листьев, в нижней части, как показано на рисунке:</p>
<img src="/img/balanced-tree.jpg" class="alone_img" alt="сбалансированое дерева" >
<p>Когда вы формируете запрос на индексированный столбец, подсистема запросов начинает идти сверху от корневого узла и постепенно двигается вниз через промежуточные узлы, при этом каждый слой промежуточного уровня содержит более детальную информацию о данных. Подсистема запросов продолжает двигаться по узлам индекса до тех пор, пока не достигнет нижнего уровня с листьями индекса. К примеру, если вы ищете значение 123 в индексированном столбе, то подсистема запросов сначала на корневом уровне определит страницу на первом промежуточном (intermediate) уровне. В данном случае первой страница указывает на значение от 1 до 100, а вторая от 101 до 200, таким образом подсистема запросов обратится ко второй странице этого промежуточного уровня. Далее будет выяснено, что следует обратиться к третьей странице следующего промежуточного уровня. Отсюда подсистема запросов прочитает на нижнем уровне значение самого индекса. Листья индекса могут содержать как сами данные таблицы, так и просто указатель на строки с данными в таблице, в зависимости от типа индекса: кластеризованный индекс или некластеризованный.</p>
<h4>Кластеризованный индекс</h4>
<p>Кластеризованный индекс хранит реальные строки данных в листьях индекса. Возвращаясь к предыдущему примеру, это означает что строка данных, связанная со значение ключа, равного 123 будет храниться в самом индексе. Важной характеристикой кластеризованного индекса является то, что все значения отсортированы в определенном порядке либо возрастания, либо убывания. Таким образом, таблица или представление может иметь только один кластеризованный индекс. В дополнение следует отметить, что данные в таблице хранятся в отсортированном виде только в случае если создан кластеризованный индекс у этой таблицы.</p>
<p>Таблица не имеющая кластеризованного индекса называется кучей.</p>
<h4>Некластеризованный индекс</h4>
<p>В отличие от кластеризованного индекса, листья некластеризованного индекса содержат только те столбцы (ключевые), по которым определен данный индекс, а также содержит указатель на строки с реальными данными в таблице. Это означает, что системе подзапросов необходима дополнительная операция для обнаружения и получения требуемых данных. Содержание указателя на данные зависит от способа хранения данных: кластеризованная таблица или куча. Если указатель ссылается на кластеризованную таблицу, то он ведет к кластеризованному индексу, используя который можно найти реальные данные. Если указатель ссылается на кучу, то он ведет к конкретному идентификатору строки с данными. Некластеризованные индексы не могут быть отсортированы в отличие от кластеризованных, однако вы можете создать более одного некластеризованного индекса на таблице или представлении, вплоть до 999. Это не означает, что вы должны создавать как можно больше индексов. Индексы могут как улучшить, так и ухудшить производительность системы. В дополнение к возможности создать несколько некластеризованных индексов, вы можете также включить дополнительные столбцы (included column) в свой индекс: на листьях индекса будет храниться не только значение самих индексированных столбцов, но и значения этих не индексированных дополнительных столбцов. Этот подход позволит вам обойти некоторые ограничения, наложенные на индекс. К примеру, вы можете включить неидексируемый столбец или обойти ограничение на длину индекса (900 байт в большинстве случаев).</p>
<h4>Типы индексов</h4>
<p>В дополнение к тому, что индекс может быть либо кластеризованным, либо некластеризованным, возможно его дополнительно сконфигурировать как составной индекс, уникальный индекс или покрывающий индекс.</p>
<h5>Составной индекс</h5>
<p>Такой индекс может содержать более одного столбца. Вы можете включить до 16 столбцов в индекс, но их общая длина ограничена 900 байтами. Как кластеризованный, так и некластеризованный индексы могут быть составными.</p>
<h5>Уникальный индекс</h5>
<p>Такой индекс обеспечивает уникальность каждого значения в индексируемом столбце. Если индекс составной, то уникальность распространяется на все столбцы индекса, но не на каждый отдельный столбец. К примеру, если вы создадите уникальных индекс на столбцах ИМЯ и ФАМИЛИЯ, то полное имя должно быть уникально, но отдельно возможны дубли в имени или фамилии.</p>
Уникальный индекс автоматически создается когда вы определяете ограничения столбца: первичный ключ или ограничение на уникальность значений:
<ul>
    <li><p class="like_i">Первичный ключ</p>
    <p>Когда вы определяете ограничение первичного ключа на один или несколько столбцов, тогда SQL Server автоматически создаёт уникальный кластеризованный индекс, если кластеризованный индекс не был создан ранее (в этом случае создается уникальный некластеризованный индекс по первичному ключу)</p></li>
    <li><p class="like_i">Уникальность значений</p>
    <p>Когда вы определяете ограничение на уникальность значений, тогда SQL Server автоматически создает уникальный некластеризованный индекс. Вы можете указать, чтобы был создан уникальный кластеризованный индекс, если кластеризованного индекса до сих пор не было создано на таблице</p></li>
</ul>


<h5>Покрывающий индекс</h5>
<p>Такой индекс позволяет конкретному запросу сразу получить все необходимые данные с листьев индекса без дополнительных обращений к записям самой таблицы.</p>
<h4>Проектирование индексов</h4>
<p>Насколько полезны индексы могут быть, настолько аккуратно они должны быть спроектированы. Поскольку индексы могут занимать значительное дисковое пространство, вы не захотите создавать индексов больше, чем необходимо. В дополнение, индексы автоматически обновляются когда сама строка с данными обновляется, что может привести к дополнительным накладным расходам ресурсов и падению производительности. При проектирование индексов должно приниматься во внимание несколько соображений относительно базы данных и запросов к ней.</p>

<h4>База данных</h4>

<p>Как было отмечено ранее индексы могут улучить производительность системы, т.к. они обеспечивают подсистему запросов быстрым путем для нахождения данных. Однако, вы должны также принять во внимание то, как часто вы собираетесь вставлять, обновлять или удалять данные. Когда вы изменяете данные, то индексы должны также быть изменены, чтобы отразить соответствующие действия над данными, что может значительно снизить производительность системы. Рассмотрим следующие рекомендации при планировании стратегии индексирования:</p>
<ul>
    <li>Для таблиц которые часто обновляются используйте как можно меньше индексов.</li>
    <li>Если таблица содержит большое количество данных, но их изменения незначительны, тогда используйте столько индексов, сколько необходимо для улучшение производительности ваших запросов. Однако хорошо подумайте перед использованием индексов на небольших таблицах, т.к. возможно использование поиска по индексу может занять больше времени, нежели простое сканирование всех строк.</li>
    <li>Для кластеризованных индексов старайтесь использовать настолько короткие поля насколько это возможно. Наилучшим образом будет применение кластеризованного индекса на столбцах с уникальными значениями и не позволяющими использовать NULL. Вот почему первичный ключ часто используется как кластеризованный индекс.</li>
    <li>Уникальность значений в столбце влияет на производительность индекса. В общем случае, чем больше у вас дубликатов в столбце, тем хуже работает индекс. С другой стороны, чем больше уникальных значения, тем выше работоспособность индекса. Когда возможно используйте уникальный индекс.</li>
    <li>Для составного индекса возьмите во внимание порядок столбцов в индексе. Столбцы, которые используются в выражениях WHERE (к примеру, WHERE FirstName = 'Charlie') должны быть в индексе первыми. Последующие столбцы должны быть перечислены с учетом уникальности их значений (столбцы с самым высоким количеством уникальных значений идут первыми).</li>
    <li>Также можно указать индекс на вычисляемых столбцах, если они соответствуют некоторым требованиям. К примеру, выражение которые используются для получения значения столбца, должны быть детерминистическими (всегда возвращать один и тот же результат для заданного набора входных параметров).</li>
</ul>
<h4>Запросы к базе данных</h4>
<p>Другое соображение которое следует учитывать при проектировании индексов это какие запросы выполняются к базе данных. Как было указано ранее, вы должны учитывать как часто изменяются данные. Дополнительно следует использовать следующие принципы:</p>
<ul>
    <li>Старайтесь вставлять или модифицировать в одном запросе как можно больше строк, а не делать это в несколько одиночных запросов.</li>
    <li>Создайте некластеризованный индекс на столбцах которые часто используются в ваших запросах в качестве условий поиска в WHERE и соединения в JOIN.</li>
    <li>Рассмотрите возможность индексирования столбцов, использующихся в запросах поиска строк на точное соответствие значений.</li>
</ul>
</div>
</div>

<ul>
<li><a href="https://habr.com/ru/post/247373/" target="_blank">Основы индексов в SQL Server [habr]</a></li>
<li><a href="https://ru.wikipedia.org/wiki/Индекс_(базы_данных)" target="_blank">Индекс (базы данных) [wikipedia]</a></li>
</ul>
<hr>

<h3>Связи sql</h3>
<p>При проектировании базы данных, здравый смысл подсказывает нам, что мы должны использовать различные таблицы для разных данных. Пример: клиенты, заказы, записи, сообщения и т.д. Так же мы должны иметь взаимосвязи между этими таблицами. Например, клиент имеет заказы, а у заказа есть позиции (товары). Эти взаимосвязи должны быть отражены в базе данных. А также, когда мы получаем данные с помощью SQL, мы должны использовать определенные типы запросов JOIN, чтобы получить нужный результат.</p>
<p>Вот несколько типов отношений в базе данных. Сегодня мы рассмотрим следующие:</p>
<ul>
    <li>Отношения один к одному</li>
    <li>Один ко многим и многие к одному</li>
    <li>Многие ко многим</li>
    <li>Связь с самим собой</li>
</ul>
<p>Когда данные выбираются из нескольких связанных таблиц, мы будем использовать запрос JOIN. Есть несколько типов присоединения, мы познакомимся с этими:</p>
<ul>
    <li>Cross Joins (Перекрестное соединение)</li>
    <li>Natural Joins (Естественное соединений)</li>
    <li>Inner Joins (Внутреннее соединений)</li>
    <li>Left (Outer) Joins (Левое (внешнее) соединение)</li>
    <li>Right (Outer) Joins (Правое (внешнее) соединение)</li>
</ul>
<p class="like_i">обратить внимание на ON и USING, а так же на JOIN.</p>

<p>Источник: <a href="http://jtest.ru/bazyi-dannyix/sql-dlya-nachinayushhix-chast-3.html" target="_blank">SQL для начинающих. Часть 3</a></p>

<hr>

<h4>JOIN</h4>

<p>Оператор JOIN используется для соединения двух или нескольких таблиц. Соединение таблиц может быть внутренним (INNER) или внешним (OUTER), причем внешнее соединение может быть левым (LEFT), правым (RIGHT) или полным (FULL). Далее на примере двух таблиц рассмотрим различные варианты их соединения.</p>
<p><span class="like_b">Предикат</span> определяет условие соединения строк из разных таблиц.</p>


<p><a href="http://2sql.ru/novosti/sql-inner-join/" target="_blank">Оператор SQL INNER JOIN</a></p>
<p><a href="https://www.w3schools.com/sql/sql_join.asp" target="_blank">SQL Joins</a></p>
<hr>

<h3>EXPLAIN</h3>
<div class="spoiler_v2">
<p href="#" class="spoiler-trigger"><span>Далее</span></p>
<div class="spoiler-block">
<p>EXPLAIN имя_таблицы является синонимом операторов DESCRIBE имя_таблицы и SHOW COLUMNS FROM имя_таблицы.</p>
<p>Если оператор SELECT предваряется ключевым словом EXPLAIN, MySQL сообщит о том, как будет производиться обработка SELECT, и предоставит информацию о порядке и методе связывания таблиц.</p>
<p class="like_b">При помощи EXPLAIN можно выяснить, когда стоит снабдить таблицы индексами, чтобы получить более быструю выборку, использующую индексы для поиска записей. Кроме того, можно проверить, насколько удачный порядок связывания таблиц был выбран оптимизатором. Заставить оптимизатор связывать таблицы в заданном порядке можно при помощи указания STRAIGHT_JOIN.</p>
<p>Для непростых соединений EXPLAIN возвращает строку информации о каждой из использованных в работе оператора SELECT таблиц. Таблицы перечисляются в том порядке, в котором они будут считываться. MySQL выполняет все связывания за один проход (метод называется "single-sweep multi-join"). Делается это так: MySQL читает строку из первой таблицы, находит совпадающую строку во второй таблице, затем - в третьей, и так далее. Когда обработка всех таблиц завершается, MySQL выдает выбранные столбцы и обходит в обратном порядке список таблиц до тех пор, пока не будет найдена таблица с наибольшим совпадением строк. Следующая строка считывается из этой таблицы и процесс продолжается в следующей таблице.</p>

<pre><code class="php hljs">EXPLAIN SELECT * FROM categories</code></pre>
<pre><code class="php hljs">********************** <span class="hljs-number"><span class="hljs-number">1.</span></span> row **********************
id: <span class="hljs-number"><span class="hljs-number">1</span></span>
select_type: SIMPLE
table: categories
type: ALL
possible_keys: <span class="hljs-keyword"><span class="hljs-keyword">NULL</span></span>
key: <span class="hljs-keyword"><span class="hljs-keyword">NULL</span></span>
key_len: <span class="hljs-keyword"><span class="hljs-keyword">NULL</span></span>
ref: <span class="hljs-keyword"><span class="hljs-keyword">NULL</span></span>
rows: <span class="hljs-number"><span class="hljs-number">4</span></span>
Extra: 
<span class="hljs-number"><span class="hljs-number">1</span></span> row in set (<span class="hljs-number"><span class="hljs-number">0.00</span></span> sec)
</code></pre>
<p>Вывод команды EXPLAIN включает следующие столбцы: </p>

<ul>
    <li>id – порядковый номер для каждого SELECT’а внутри запроса (когда имеется несколько подзапросов)</li>
    <li>select_type – тип запроса SELECT.
		<ul>
			<li>SIMPLE — Простой запрос SELECT без подзапросов или UNION’ов</li>
			<li>PRIMARY – данный SELECT – самый внешний запрос в JOIN’е</li>
			<li>DERIVED – данный SELECT является частью подзапроса внутри FROM</li>
			<li>SUBQUERY – первый SELECT в подзапросе</li>
			<li>DEPENDENT SUBQUERY – подзапрос, который зависит от внешнего запроса</li>
			<li>UNCACHABLE SUBQUERY – не кешируемый подзапрос (существуют определенные условия для того, чтобы запрос кешировался)</li>
			<li>UNION – второй или последующий SELECT в UNION’е</li>
			<li>DEPENDENT UNION – второй или последующий SELECT в UNION’е, зависимый от внешнего запроса</li>
			<li>UNION RESULT – результат UNION’а</li>
		</ul>
	</li>
    <li>Table – таблица, к которой относится выводимая строка</li>
    <li>Type — указывает на то, как MySQL связывает используемые таблицы. Это одно из наиболее полезных полей в выводе потому, что может сообщать об отсутствующих индексах или почему написанный запрос должен быть пересмотрен и переписан.<br>
	Возможные значения:
		<ul>
			<li>System – таблица имеет только одну строку</li>
			<li>Const – таблица имеет только одну соответствующую строку, которая проиндексирована. Это наиболее быстрый тип соединения потому, что таблица читается только один раз и значение строки может восприниматься при дальнейших соединениях как константа.</li>
			<li>Eq_ref – все части индекса используются для связывания. Используемые индексы: PRIMARY KEY или UNIQUE NOT NULL. Это еще один наилучший возможный тип связывания.</li>
			<li>Ref – все соответствующие строки индексного столбца считываются для каждой комбинации строк из предыдущей таблицы. Этот тип соединения для индексированных столбцов выглядит как использование операторов = или < = ></li>
			<li>Fulltext – соединение использует полнотекстовый индекс таблицы</li>
			<li>Ref_or_null – то же самое, что и ref, но также содержит строки со значением null для столбца</li>
			<li>Index_merge – соединение использует список индексов для получения результирующего набора. Столбец key вывода команды EXPLAIN будет содержать список использованных индексов.</li>
			<li>Unique_subquery – подзапрос IN возвращает только один результат из таблицы и использует первичный ключ.</li>
			<li>Index_subquery – тоже, что и предыдущий, но возвращает более одного результата.</li>
			<li>Range – индекс, использованный для нахождения соответствующей строки в определенном диапазоне, обычно, когда ключевой столбец сравнивается с константой, используя операторы вроде: BETWEEN, IN, >, >=, etc.</li>
			<li>Index – сканируется все дерево индексов для нахождения соответствующих строк.</li>
			<li>All – Для нахождения соответствующих строк используются сканирование всей таблицы. Это наихудший тип соединения и обычно указывает на отсутствие подходящих индексов в таблице.</li>
		</ul>
	</li>
    <li>Possible_keys – показывает индексы, которые могут быть использованы для нахождения строк в таблице. На практике они могут использоваться, а могут и не использоваться. Фактически, этот столбец может сослужить добрую службу в деле оптимизации запросов, т.к значение NULL указывает на то, что не найдено ни одного подходящего индекса.</li>
    <li>Key– указывает на использованный индекс. Этот столбец может содержать индекс, не указанный в столбце possible_keys. В процессе соединения таблиц оптимизатор ищет наилучшие варианты и может найти ключи, которые не отображены в possible_keys, но являются более оптимальными для использования.</li>
    <li>Key_len – длина индекса, которую оптимизатор MySQL выбрал для использования. Например, значение key_len, равное 4, означает, что памяти требуется для хранения 4 знаков. На эту тему вот cсылка</li>
    <li>Ref – указываются столбцы или константы, которые сравниваются с индексом, указанным в поле key. MySQL выберет либо значение константы для сравнения, либо само поле, основываясь на плане выполнения запроса.</li>
    <li>Rows – отображает число записей, обработанных для получения выходных данных. Это еще одно очень важное поле, которое дает повод оптимизировать запросы, особенно те, которые используют JOIN’ы и подзапросы.</li>
    <li>Extra – содержит дополнительную информацию, относящуюся к плану выполнения запроса. Такие значения как “Using temporary”, “Using filesort” и т.д могут быть индикатором проблемного запроса. С полным списком возможных значений вы можете ознакомиться <a href="http://dev.mysql.com/doc/refman/5.6/en/explain-output.html#explain-extra-information" target="_blank">здесь</a></li>
</ul>

<p>Источники</p>
<ul>
<li><a href="http://www.php.su/mysql/manual/?page=EXPLAIN" target="_blank">5.2.1 Синтаксис оператора EXPLAIN (получение информации о SELECT)</a></li>
<li><a href="https://habr.com/ru/post/211022/" target="_blank">Использование EXPLAIN. Улучшение запросов </a></li>
<li><a href="http://www.mysql.ru/docs/man/EXPLAIN.html" target="_blank">5.2.1 Синтаксис оператора EXPLAIN (получение информации о SELECT)</a></li>
</ul>
</div>
</div>

<hr>
<h2>Практика</h2>
<p>Пример 1: вывод данных, полученых в <a href="/practice/forms/#forma1" target="_blank">форме 1</a></p>
<?php require_once ("{$_SERVER['DOCUMENT_ROOT']}template/inc/connection.php"); // подключаем скрипт

$link = mysqli_connect($servername, $username, $password, $dbname) 
    or die("Ошибка " . mysqli_error($link)); 
     $link->set_charset("utf8");
$query ="SELECT * FROM user";

$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
if($result)
{
    $rows = mysqli_num_rows($result); // количество полученных строк
     
    echo "<div class=\"test_bd\">
	<div>Id</div>
	<div>Имя</div>
	<div>Возраст</div>
	<div>E-mail</div>
	<div>Редактируем запись</div>
	</div>";
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);
        echo "<div class=\"test_bd\">";
            for ($j = 0 ; $j < 4 ; ++$j) echo "<div>$row[$j]</div>";
			for ($k = 0 ; $k < 1 ; ++$k) echo "<div><a href=\"?id=$row[0]#url\">Запись $row[0]</a></div>";
        echo "</div>";
    }
     
    // очищаем результат
    mysqli_free_result($result);
}
 
mysqli_close($link);

?>
<p>Пример 2: скрипт редактирования данных, полученых в <a href="/practice/forms/#forma1" target="_blank">форме 1</a>. Ссылка на редактирование - см.в в примере выше</p>

<?php

$link = mysqli_connect($servername, $username, $password, $dbname) 
        or die("Ошибка " . mysqli_error($link)); 
		$link->set_charset("utf8");
     
// если запрос POST 
if(isset($_POST['name']) && isset($_POST['age']) && isset($_POST['email']) && isset($_POST['id'])){
 
    $id = htmlentities(mysqli_real_escape_string($link, $_POST['id']));
    $name = htmlentities(mysqli_real_escape_string($link, $_POST['name']));
    $age = htmlentities(mysqli_real_escape_string($link, $_POST['age']));
    $email = htmlentities(mysqli_real_escape_string($link, $_POST['email']));
     
    $query ="UPDATE user SET name='$name', age='$age', email='$email' WHERE id='$id'";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
 
    if($result)
        echo "<span style='color:blue;'>Данные обновлены</span>";
}

// если запрос GET
if(isset($_GET['id']))
{   
    $id = htmlentities(mysqli_real_escape_string($link, $_GET['id']));
     
    // создание строки запроса
    $query ="SELECT * FROM user WHERE id = '$id'";
    // выполняем запрос
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    //если в запросе более нуля строк
    if($result && mysqli_num_rows($result)>0) 
    {
        $row = mysqli_fetch_row($result); // получаем первую строку
        $name = $row[1];
        $company = $row[2];
         
        echo "<a name=\"url\"></a>
			<form method='POST'>
            <input type='hidden' name='id' value='$id' />
            <p>Введите имя:<br> 
            <input type='text' name='name' value='$name' /></p>
            <p>Введите возраст: <br> 
            <input type='number' name='age' min='0' max='100' step='1' value='' /></p>
            <p>Уточните e-mail: <br> 
            <input type='text' name='email' value='' /></p>
            <input type='submit' value='Сохранить'>
			</form>
			<p><a href=\"/practice/db/\">Вернутся назад</a></p>";
         
        mysqli_free_result($result);
    }
}
// закрываем подключение
mysqli_close($link);
//truncate

?>

<h4>Пример 3</h4>

Блок 1, Учёные
Ньютон Исаак, Ілля Мечников, Зельман Ваксман, Йосеф Шмуель Аґнон, Саймон (Семен) Кузнець, Роальд Гофман, Георгій Харпак, Світлана Алексієвич

Блок 2, наука
фізіологія та медицина, література, економіка, хімія, фізика, 

Блок 3, твори


<ul>
<li><a href="/admin/">Админ'ка</a></li>
</ul>

</div>
<?php include ("{$_SERVER['DOCUMENT_ROOT']}/template/inc/footer.php"); ?>
</body>
</html>