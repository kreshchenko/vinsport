<?php
     // ������ ���������
     include "rss.inc";           // ��� ���������� �����
     include "conn.inc";           // ���������� ��� �������� ����
header('Content-type: text/html; charset=utf-8');


   $Rss= new CRss();

   $Rss->Title="vinsport.info";
   $Rss->Link="http://vinsport.info/";
   $Rss->Copyright="2015";
   $Rss->Description="All Vinnytsia sport";
   $Rss->Category = "Sport";
   $Rss->Language="ua";

   $Rss->ManagingEditor="kreshchenko@vinsport.info";
   $Rss->WebMaster="kreshchenko@vinsport.info";
   $Rss->Query="SELECT
                news.name,
                news.shortText,
                news.id,
                news.date,
                news.catID
     FROM news
     ORDER by DATE desc Limit 0,20";

    $Rss->Open($Server,$DataBase,$Login,$Password);
     $Rss->LastBuildDate=date("r");
      // �������� ��������� ���� ����������
     $query = "select news.date
                        FROM news
          ORDER by news.date desc Limit 0,1";

      $result1 = mysql_query($query)
              or die("FROM blog failed");

      $line = mysql_fetch_array($result1);

      $Date =date("r",strtotime($line[0]));
       mysql_free_result($result1);

      $Rss->LastBuildDate=$Date;
      $Rss->PubDate=$Rss->LastBuildDate;

     $Rss->PrintHeader();
     $Rss->Query();

     while ($line = mysql_fetch_array($Rss->Result))
     {   // ��� ������ ������ �������
               $Title = $line[0];
               $Description = $line[1];
               //$Link='index.php?view=cat&id=';
               $Link='http://vinsport.info/index.php?view=news&amp;id='.$line[2];
               $PubDate=date("r",strtotime($line[3]));
               $Category=$line[4];
               $Rss->PrintBody($Title,$Link,$Description,$Category,$PubDate);
    }
    $Rss->PrintFooter();
    $Rss->Close();

?>









