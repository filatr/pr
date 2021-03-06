<?php include ("{$_SERVER['DOCUMENT_ROOT']}/template/inc/header.php"); ?>

<h1>Создаем 3 таблицы, выводим данные в 4</h1>

<p>Создаем таблицу</p>
<pre>
<code>
CREATE TABLE school_subject (
id CHAR(10) NOT NULL Primary key,
subjects CHAR(25) NOT NULL,
id_teacher CHAR(25) NOT NULL
)
</code>
</pre>
<p>...  и вносим данные</p>
<pre>
<code>
INSERT INTO school_subject (id, subjects, id_teacher)
VALUE
(1, "Физика", "8"),
(2, "Химия", "7"),
(3, "Математика", "6"),
(4, "Биология", "5"),
(5, "Язык, письмо", "4"),
(6, "литература", "3"),
(7, "История", "2"),
(8, "География", "1")
</code>
</pre>
<p>...  и по аналогии для других 2х таблиц</p>

<div class="our_school">
<?php require_once ("{$_SERVER['DOCUMENT_ROOT']}/template/inc/connection.php"); // подключаем скрипт

$paramClass   = "
<p>Таблица:				<textarea>school_class</textarea></p>
<p>Названия столбцов:	<textarea>id, class, id_subject</textarea></p>";
$paramTeacher = "
<p>Таблица:				<textarea>school_teacher</textarea></p>
<p>Названия столбцов:	<textarea>id, teachers</textarea></p>";
$paramSubject = "
<p>Таблица:				<textarea>school_subject</textarea></p>
<p>Названия столбцов:	<textarea>id, subjects, id_teacher</textarea></p>";

$link = mysqli_connect($servername, $username, $password, $dbname) 
    or die("Ошибка " . mysqli_error($link)); 
     $link->set_charset("utf8");
$query ="SELECT * FROM school_class";
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
if($result)
{
    $rows = mysqli_num_rows($result); // количество полученных строк
    echo "<table><tr><td colspan=\"3\">$paramClass</td></tr>
	<tr><th>ID</th><th>№ класса</th><th>id_subject</th></tr>";
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);
        echo "<tr>";
            for ($j = 0 ; $j < 3 ; ++$j) echo "<td>$row[$j]</td>";
        echo "</tr>";
    }
     echo "</table>";
    // очищаем результат
    mysqli_free_result($result);
}

$query ="SELECT * FROM school_teacher";

$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
if($result)
{
    $rows = mysqli_num_rows($result); // количество полученных строк
    echo "<table><tr><td colspan=\"2\">$paramTeacher</td></tr>
	<tr><th>ID</th><th>Наши учителя</th></tr>";
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);
        echo "<tr>";
            for ($j = 0 ; $j < 2 ; ++$j) echo "<td>$row[$j]</td>";
        echo "</tr>";
    }
     echo "</table>";
    // очищаем результат
    mysqli_free_result($result);
}

$query ="SELECT * FROM school_subject";

$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
if($result)
{
    $rows = mysqli_num_rows($result); // количество полученных строк
     
    echo "<table><tr><td colspan=\"3\">$paramSubject</td></tr>
	<tr><th>ID</th><th>Предмет</th><th>id_teacher</th></tr>";
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);
        echo "<tr>";
            for ($j = 0 ; $j < 3 ; ++$j) echo "<td>$row[$j]</td>";
        echo "</tr>";
    }
     echo "</table>";
    // очищаем результат
    mysqli_free_result($result);
}
 
mysqli_close($link);

?>
</div>

<p>В понедельник на 1м уроке у школьников будут такие уроки (какие учетеля в каких классах какие предметы читают?)</p>




<?php require_once ("{$_SERVER['DOCUMENT_ROOT']}/template/inc/connection.php"); // подключаем скрипт

$link = mysqli_connect($servername, $username, $password, $dbname) 
    or die("Ошибка " . mysqli_error($link)); 
    $link->set_charset("utf8");

$query ="
SELECT school_class.class, school_teacher.teachers, school_subject.subjects
FROM school_class
INNER JOIN school_subject
ON school_class.id_subject = school_subject.id
INNER JOIN school_teacher
ON school_subject.id_teacher = school_teacher.id
ORDER BY school_class.id
";

$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 

if($result)
{
    $rows = mysqli_num_rows($result); // количество полученных строк
     
    echo "<table class=\"tbl_1\"><tr>
	<th>Класс</th>
	<th>Учитель</th>
	<th>Предмет</th>
	</tr>";
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);
        echo "<tr>";
            for ($j = 0 ; $j < 3 ; ++$j) echo "<td>$row[$j]</td>";
        echo "</tr>";
    }
     echo "</table>";
    // очищаем результат
	//var_dump ($result);
    mysqli_free_result($result);
}

mysqli_close($link);

echo 
'
<p>Запрос к БД имеет следующий вид:</p>
<pre>
<code>
SELECT school_class.class, school_teacher.teachers, school_subject.subjects
FROM school_class
INNER JOIN school_subject
ON school_class.id_subject = school_subject.id
INNER JOIN school_teacher
ON school_subject.id_teacher = school_teacher.id
ORDER BY school_class.id
</code>
</pre>
<p>А PHP\'ый вывод этого результата:</p>
<pre>
<code>
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
if($result) {
    $rows = mysqli_num_rows($result); // количество полученных строк
    echo "&lt;table class=&lt;\"tbl_1\"&gt;&lt;tr&gt;
	&lt;th&gt;Класс&lt;/th&gt;
	&lt;th&gt;Учитель&lt;/th&gt;
	&lt;th&gt;Предмет&lt;/th&gt;
	&lt;/tr&gt;";
    for ($i = 0 ; $i < $rows ; ++$i) {
        $row = mysqli_fetch_row($result);
        echo "&lt;tr>";
            for ($j = 0 ; $j < 3 ; ++$j) echo "&lt;td>$row[$j]&lt;/td&gt;";
        echo "&lt;/tr&gt;";
    }
     echo "&lt;/table&gt;";
    mysqli_free_result($result);
}
mysqli_close($link);
</code>
</pre>
';








include ("{$_SERVER['DOCUMENT_ROOT']}/template/inc/footer.php"); ?>
