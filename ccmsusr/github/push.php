<?php
header("Content-Type: text/xml; charset=UTF-8");
header("Expires: on, 01 Jan 1970 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

echo '<?xml version="1.0" encoding="utf-8" standalone="yes"?>
<response>';
echo "\n\t<method>syncGitHubButton(req, '1')</method>";
echo "\n\t<output>";

$output = `git status`;
echo "\n1";
if(preg_match("/git reset HEAD/i", $output)) {
    // A file has probably been deleted from the server using FTP.  We need to commit that change to git now first.
    $output = `git reset HEAD`;
    echo "\n1.1";
    echo $output;
    sleep(1);
}

$output = `git add --all`;
echo "\n2";
echo $output;
sleep(1);

$output = `git commit -m "from server"`;
echo "\n3";
echo $output;
sleep(5);

$output = `git push -u origin master`;
echo "\n4\n";
echo $output;
sleep(5);

echo "</output>";
echo "\n</response>";
