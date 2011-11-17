<?php

$number=rand(1,3);
switch ($number)
{
	case 1;
	include("reddit.php");
	$array=reddit();
	$reddit=true;
	break;
	
	case 2;
	include("9gag.php");
	$array=lolninegag();
	break;
	
	case 3;
	include("4chan.php");
	$array=fourChan();
	$fourchan=true;
	break;

}
foreach ($array as $item)
{?>
<div class="cs_article">
<?php if ($fourchan) {?><a href="<?php echo $item[2]?>"> <?php }?>	<h2><?php echo $item[0]?></h2><?php if ($fourchan) {?></a><?php }?>
	<img src="<?php echo $item[1]?>" alt="<?php echo $item[0]?>" />
</div>
<?php 
}

if ($reddit){
$array2=reddit('AdviceAnimals');	
foreach ($array2 as $item)
{?>
<div class="cs_article">
<?php if ($fourchan) {?><a href="<?php echo $item[2]?>"> <?php }?>	<h2><?php echo $item[0]?></h2><?php if ($fourchan) {?></a><?php }?>
	<img src="<?php echo $item[1]?>" alt="<?php echo $item[0]?>" />
</div>
<?php 
}
/*
$array3=reddit('funny');	
foreach ($array3 as $item)
{?>
<div class="cs_article">
<?php if ($fourchan) {?><a href="<?php echo $item[2]?>"> <?php }?>	<h2><?php echo $item[0]?></h2><?php if ($fourchan) {?></a><?php }?>
	<img src="<?php echo $item[1]?>" alt="<?php echo $item[0]?>" />
</div>
<?php 
}
*/




}
?>

<?php 
/*
					<div class="cs_article">
						<h2>title</h2>
						<img src="url" alt="title" />
					</div>
*/
?>