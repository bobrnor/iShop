<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8" />
	<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<title>NoNameShoes.ru</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<?php
            $this->load->helper('url');
            echo "<link rel='stylesheet' href='".base_url()."style/style.css' type='text/css' media='screen, projection' />";
            /*echo "<link rel='stylesheet' href='".base_url()."style/tovar_style.css' type='text/css' media='screen, projection' />";
            echo "<link rel='stylesheet' href='".base_url()."style/scrollable-horizontal.css' type='text/css' media='screen, projection' />";
            echo "<link rel='stylesheet' href='".base_url()."style/scrollable-buttons.css' type='text/css' media='screen, projection' />";
            echo "<link rel='stylesheet' href='".base_url()."style/scrollable-navigator.css' type='text/css' media='screen, projection' />";
           */ echo "<script src='".base_url()."js/jquery.tools.min.js'></script>"; 
        ?>
    
</head>

<body>

<header id="header">
	<table id="head">
    	<tr>
        	<td id="logo"><a href= "/index.php"> SHOES</a></td>
            <td class="nav-link" width="150px" <?php if ($activeLink == 1) echo "id='ac_link'"; ?> ><a href="/index.php/news/">Новости</a></td>
            <td class="nav-link" width="150px" <?php if ($activeLink==2) echo "id='ac_link'"; ?> ><a href="/index.php/items/">Каталог</a></td>
            <td class="nav-link" width="126px" <?php if ($activeLink==3) echo "id='ac_link'"; ?> ><a href="#">О нас</a></td>
            <td class="nav-link" width="154px" <?php if ($activeLink==4) echo "id='ac_link'"; ?> >
                <?php 
                    if ((isset($_SESSION['hasLogined'])==false)||($_SESSION['hasLogined']==0))
                        echo "<a href='/index.php/users/login/'>Вход</a></td>";
                    else
                        echo "<a href='/index.php/users/unlogin/'>Выход</a></td>";
                            
                ?>
                
                
            <?php if ($activeLink==5)
                echo "<td id='basket' width='115px' style='background-image: url(/images/basket_active.png);'>
                    <a href='/index.php/basket/'><img id='bas_pic' src= '/images/basket_hover.png' /> </a></td>";
            else 
                echo "<td id='basket' width='115px'><a href='/index.php/basket/'><img id='bas_pic' src= '/images/basket_hover.png' /> </a></td>"; ?>
        </tr>
    </table>
		
</header><!-- #header-->

<div id="wraper">
    <section id="middle">


