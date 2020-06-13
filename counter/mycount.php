<?php

    /*******************************************************************
    *         Название:  MyCount                                       *
    *           Версия:  0.2                                           *
    *             Файл:  mycount.php                                   *
    *       Требования:  PHP 4+                                        *
    *        Платформа:  любая                                         *
    *             Язык:  русский                                       *
    *            Автор:  Иванов Владимир Юрьевич aka Voventus          *
    *                     Copyright (c) 2007                           *
    ********************************************************************
    *              WWW:  http://                                       *
    *           E-Mail:  myvlad@mail.ru                                *
    *              ICQ:  309 207 539                                   *
    ********************************************************************
    *                г.Владивосток, Январь, 2007г.                     *
    *******************************************************************/


//error_reporting(E_ALL);

/////================================/////
///// Настройка картинки счетчика... /////
/////    Названия картинок можно     /////
/////    посмотреть в директории     /////
/////            "images"            /////
/////================================/////
          $IMAGE = "count1";         /////
/////================================/////
/////================================/////

session_name("sid");
session_start();
session_register("ip");

if (!file_exists("data/count.dat") or !file_exists("data/time.dat"))
  {
  	print ("Системный файл \"count.dat\" или \"date.dat\" не существует!");
  	exit();
  }

//----------
//----------
$mycount['time'] = join("", file("data/time.dat"));

if ($mycount['time'] == false)
  {
    $mycount['file'] = @fopen("data/time.dat", "r+") or die ("Невозможно открыть файл!");

    flock($mycount['file'], LOCK_EX);
    fwrite($mycount['file'], time());
    flock($mycount['file'], LOCK_UN);
    fclose($mycount['file']);
  }

$mycount['time'] = join("", file("data/time.dat"));

///// 86400с = 24ч /////
if ((time() - $mycount['time']) >= "86400")
  {
    $mycount['count'] = file("data/count.dat");
    $mycount['count'][1] = "0";

    $mycount['file1'] = @fopen("data/time.dat", "r+") or die ("Невозможно открыть файл!");
    $mycount['file2'] = @fopen("data/count.dat", "w") or die ("Невозможно открыть файл!");

    flock($mycount['file1'], LOCK_EX);
    flock($mycount['file2'], LOCK_EX);

    fwrite($mycount['file1'], time());
    fwrite($mycount['file2'], $mycount['count'][0]);
    fwrite($mycount['file2'], $mycount['count'][1]);

    flock($mycount['file1'], LOCK_UN);
    flock($mycount['file2'], LOCK_UN);
    fclose($mycount['file1']);
    fclose($mycount['file2']);
  }
//----------
//----------

$mycount['image']       = ImageCreateFromPng("images/".$IMAGE.".png");
$mycount['color_red']   = ImageColorAllocate($mycount['image'], 255, 0, 0);
$mycount['color_black'] = ImageColorAllocate($mycount['image'], 0, 0, 0);

$mycount['string1'] = "Hosts";
$mycount['string2'] = "total";
$mycount['string3'] = "today";

$mycount['count'] = convert_cyr_string($mycount['string1'], "k", "w");
$mycount['count'] = convert_cyr_string($mycount['string2'], "k", "w");
$mycount['count'] = convert_cyr_string($mycount['string3'], "k", "w");

ImageString($mycount['image'], 2, 50, 0, $mycount['string1'], $mycount['color_red']);
ImageString($mycount['image'], 2, 9, 9,  $mycount['string2'], $mycount['color_red']);
ImageString($mycount['image'], 2, 9, 18, $mycount['string3'], $mycount['color_red']);


/////----------------------------------------------------------------/////
///// Функция считывает счетчик из БД и ффтуливает его в картинку... /////
/////----------------------------------------------------------------/////

function view_count()
  {
    global $mycount;

    $mycount['counts'] = file("data/count.dat");

    $i = 9;

    foreach($mycount['counts'] as $mycount['count'])
      {
        $mycount['count'] = str_replace("\r\n", "", $mycount['count']);
        $mycount['count'] = str_replace("\n", "",   $mycount['count']);
        $mycount['count'] = str_replace("\r", "",   $mycount['count']);

        $mycount['count'] = convert_cyr_string($mycount['count'], "k", "w");

        ImageString($mycount['image'], 2, 54, $i,  $mycount['count'], $mycount['color_black']);

        $i += 9;
      }

    Header("Content-type: image/png");

    ImagePng($mycount['image']);
    ImageDestroy($mycount['image']);

    unset($mycount);
  }

/////----------------------------------------------------------------/////
/////----------------------------------------------------------------/////
/////----------------------------------------------------------------/////


if (($_SERVER['REMOTE_ADDR'] === "127.0.0.1") or ($_SESSION['ip'] === $_SESRVER['REMOTE_ADDR'])) view_count();
  else
    {
      $mycount['counts'] = file("data/count.dat");

      $mycount['file'] = @fopen("data/count.dat", "w+") or die ("Невозможно открыть файл!");

      flock($mycount['file'], LOCK_EX);

      foreach($mycount['counts'] as $mycount['count'])
        {
          $mycount['count'] = str_replace("\r\n", "", $mycount['count']);
          $mycount['count'] = str_replace("\n", "",   $mycount['count']);
          $mycount['count'] = str_replace("\r", "",   $mycount['count']);

          $mycount['count']++;

          fwrite($mycount['file'], $mycount['count']."\r\n");
        }

      flock($mycount['file'], LOCK_UN);
      fclose($mycount['file']);

      $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];

      view_count();
    }

?>