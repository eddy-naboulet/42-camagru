<?php
function paging($connect, $imgparpage)
{
	$retour_total = $connect->query("SELECT COUNT(*) AS total FROM PICTURES");

	while ($req = $retour_total->fetch())
		$total = $req['total'];
	$imgparpage = 9;
	$nbpage = ceil($total/$imgparpage);
	if(isset($_GET['page']))
	{
		 $pageActuelle=intval($_GET['page']);

		 if($pageActuelle>$nbpage)
		 {
			  $pageActuelle = $nbpage;
		 }
	}
	else
	{
		 $pageActuelle = 1;
	}
	$premiereEntree = ($pageActuelle -1) * $imgparpage;
	return ($premiereEntree);
}
function paging_my_profile($connect, $imgparpage, $author)
{
	$retour_total = $connect->query('SELECT COUNT(*) AS total FROM PICTURES WHERE AUTHOR_PICTURE ="'.$author.'"');

	while ($req = $retour_total->fetch())
		$total = $req['total'];
	$imgparpage = 9;
	$nbpage = ceil($total/$imgparpage);
	if(isset($_GET['page']))
	{
		 $pageActuelle=intval($_GET['page']);

		 if($pageActuelle>$nbpage)
		 {
			  $pageActuelle = $nbpage;
		 }
	}
	else
	{
		 $pageActuelle = 1;
	}
	$premiereEntree = ($pageActuelle -1) * $imgparpage;
	return ($premiereEntree);
}


function number_page($connect, $imgparpage)
{
	$retour_total = $connect->query("SELECT COUNT(*) AS total FROM PICTURES");

	while ($req = $retour_total->fetch())
		$total = $req['total'];
	$imgparpage = 9;
	$nbpage = ceil($total/$imgparpage);
	return ($nbpage);
}

function number_page_my_profile($connect, $imgparpage, $author)
{
	$retour_total = $connect->prepare("SELECT COUNT(*) AS total FROM PICTURES WHERE AUTHOR_PICTURE = :author");
	$retour_total->execute(array(':author' => $author));

	while ($req = $retour_total->fetch())
		$total = $req['total'];
	$imgparpage = 9;
	$nbpage = ceil($total/$imgparpage);
	return ($nbpage);
}

function current_page($connect, $imgparpage)
{
	$retour_total = $connect->query("SELECT COUNT(*) AS total FROM PICTURES");

	while ($req = $retour_total->fetch())
		$total = $req['total'];
	$imgparpage = 9;
	$nbpage = ceil($total/$imgparpage);
	if(isset($_GET['page']))
	{
		 $pageActuelle=intval($_GET['page']);

		 if($pageActuelle>$nbpage)
		 {
			  $pageActuelle = $nbpage;
		 }
	}
	else
	{
		 $pageActuelle = 1;
	}
	$premiereEntree = ($pageActuelle -1) * $imgparpage;
	return ($pageActuelle);
}
function current_page_my_profile($connect, $imgparpage, $author)
{
	$retour_total = $connect->prepare("SELECT COUNT(*) AS total FROM PICTURES WHERE AUTHOR_PICTURE = :author");
	$retour_total->execute(array(':author' => $author));

	while ($req = $retour_total->fetch())
		$total = $req['total'];
	$imgparpage = 9;
	$nbpage = ceil($total/$imgparpage);
	if(isset($_GET['page']))
	{
		 $pageActuelle=intval($_GET['page']);

		 if($pageActuelle>$nbpage)
		 {
			  $pageActuelle = $nbpage;
		 }
	}
	else
	{
		 $pageActuelle = 1;
	}
	$premiereEntree = ($pageActuelle -1) * $imgparpage;
	return ($pageActuelle);
}
function display_paging($connect)
{
	echo '<p align="center">Page : ';
	$imgparpage = 9;
	$nbpage = number_page($connect, $imgparpage);
	$pageActuelle = current_page($connect, $imgparpage);
	for($i = 1; $i <= $nbpage; $i++)
	{
		if($i==$pageActuelle)
		{
			echo ' [ '.$i.' ] ';
		}
		else
		{
			echo ' <a href="gallery.php?page='.$i.'">'.$i.' </a> ';
		}
	}
	echo '</p>';
}
function display_paging_my_profile($connect, $author)
{
	echo '<p align="center">Page : ';
	$imgparpage = 9;
	$nbpage = number_page_my_profile($connect, $imgparpage, $author);
	$pageActuelle = current_page_my_profile($connect, $imgparpage, $author);
	for($i = 1; $i <= $nbpage; $i++)
	{
		if($i==$pageActuelle)
		{
			echo ' [ '.$i.' ] ';
		}
		else
		{
			echo ' <a href="my_profile.php?page='.$i.'">'.$i.' </a> ';
		}
	}
	echo '</p>';
}
?>
