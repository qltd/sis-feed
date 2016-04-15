<?php
/**
 * Simple script to read from SIS feed and print an XML document which can then be parsed
 * @rdar
 *
 * */

header('Content-Type:text/xml;charset=utf-8');

$result = file_get_contents("http://sis.siggraph.org/cgi-bin/procform?sessiontype=".@$_GET['type']."&date=".@$_GET['date']."&sortby=".@$_GET['sort']."&preparsed=1&command=pack&formname=sessions&conferenceid=114");

$new_results = str_replace(" (at) ", "@", $result);

$new_results = str_replace("<eventImageThumbnail>", "<eventImageThumbnail>http://sis.siggraph.org/OPAL/Themes/SIS/2016/src/downloads-perm/", $new_results);

$new_results = str_replace('<eventImage name="publicimage">', '<eventImage>http://sis.siggraph.org/OPAL/Themes/SIS/2016/src/downloads-perm/', $new_results);

echo $new_results;

