﻿<?php include ("{$_SERVER['DOCUMENT_ROOT']}/template/inc/header.php"); ?>
<h1>Регулярные выражения</h1>
<p>Постановка задачи</p>

<?php

$word = "ус";
$regexp = "/[а-я]{0,}" . $word . "[а-я]{0,}/ui";
$lines1 = "Сумно і непривітно тепер в нашій Тухольщині! Правда, і Стрий, і Опір однаково миють її рінисті, зелені узберіжжя, луги її однаково покриваються весною травами та цвітами і в її лазуровім, чистім повітрі однаково плавле та колесує орел-беркут, як і перед давніми віками. Але все інше як же змінилося! І ліси, і села, і люди! Що давно ліси густі, непрохідні закривали майже весь її простір, окрім високих полонин, сходили вдолину аж над самі ріки, — тепер вони, мов сніг на сонці, стопилися, зрідли, змаліли, декуди пощезали, лишаючи по собі лисі облази; інде знов із них остоялися лише пообсмалювані пеньки, а з-між них де-де несміло виростає нужденна смеречина або ще нужденніший яловець. Що давно тихо тут було, не чути ніякого голосу, крім вівчарської трембіти десь на далекій полонині або рику дикого тура чи оленя в гущавинах, — тепер на полонині гейкають воларі, а в ярах і дебрях галюкають рубачі, трачі й гонтарі, ненастанно, мов невмирущий черв, підгризаючи та підтинаючи красу тухольських гір — столітні ялиці та смереки, і або спускаючи їх, потятих на великі ботюки, долі потоками до нових парових тартаків, або таки на місці ріжучи на дошки та на гонти.";

$lines2 = "Але найбільше змінилися люди. Зверха глянувши, то немовби змоглася між ними «культура», але на ділі виходить, що змоглося тільки їх число. Сіл і присілків більше, хат по селах більше, але зате по хатах убожество більше і нужда більша. Народ нужденний, прибитий, понурий, супроти чужих несмілий і недотепний. Кождий дбає тільки про себе, не розуміючи того, що таким робом роздроблюються їх сили, ослаблюється громада. Не так тут колись було! Хоч менше народу, та зате що за народ! що за життя кипіло в тих горах, серед тих непрохідних борів у стіп могутнього Зелеменя! Лиха доля довгі віки знущалася над тим народом. Тяжкі удари підкопали його добробит, нужда зломала його свобідну, здорову вдачу, і нині тільки неясні, давні спомини нагадують правнукам щасливіше життя предків. І коли часом стара бабуся, сидячи в запічку та прядучи грубу вовну, почне розповідати дрібним унукам про давню давнину, про напади монголів-песиголовців і про тухольського ватажка Беркута, — діти слухають тривожно, в їх сивих оченятах блискотять сльози. А коли скінчиться дивовижна повість, то малі й старі, зітхаючи, шепчуть: «Ах, яка ж то красна байка!»";

?>


<p class="like_b">C помощью регулярных выражений из нижеприведенного текста выбрать слова, которые содержат <span class="like_i">[<?php echo $word; ?>]</span> и все эти слова с этой буквой вывести отдельной строчкой</p>


<div class="spoiler_v2">
<a href="#" class="spoiler-trigger"><span>Сам текст</span></a>
<div class="spoiler-block">
<p><?php echo $lines1; ?><p>
<p><?php echo $lines2; ?><p>
</div>
</div>
<?php
echo '<hr>';
$lines = $lines1 . $lines2;
$result = preg_match_all ($regexp, $lines, $match);
echo "
	<p>Найдено совпадений: <span class=\"like_b\">" . $result . "</span></p>
	<p>Найденные слова: 
		";

foreach ($match[0] as $value) {
	  echo $value . "; ";
}

echo '</p><hr>';

//Возможны еще такие варианты вывода результата.
//Вариант 1
/*
for ($i=0; $i < count($match); $i++) {
	foreach ($match[$i] as $key => $value) {
	        echo $value . "; "; 
  }
}
*/

//Вариант 2
/*
foreach ($match[0] as $value):
	  echo $value . "; ";
	endforeach;
echo '<br><hr>';
*/
 ?>
<p>Регулярное выражение имеет вид:</p>
<pre><code>
/[а-я]{0,}ус[а-я]{0,}/ui
</code></pre>
<p>Функция, отвечающая за полукчение результата 'регулярки' и PHP-код, отвечающий за вывод этого результатат:
<pre><code>

$result = preg_match_all ($regexp, $lines, $match);

foreach ($match[0] as $value) {
	  echo $value . "; ";
}
</code></pre>





<?php
include ("{$_SERVER['DOCUMENT_ROOT']}/template/inc/footer.php"); ?>
<?php //include '../template/inc/footer.php'; ?>