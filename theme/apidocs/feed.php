<?php
header('Content-type: application/xml');
echo "<?xml version='1.0' encoding='UTF-8'?>\n";
echo "<rss version='2.0' xmlns:atom='http://www.w3.org/2005/Atom'>\n";
echo "<channel>\n";
echo "<title>LoginRadius ChangeLog </title>\n";
echo "<atom:link href='https://www.loginradius.com/docs/api/changelog/feed/' rel='self' type='application/rss+xml'/>\n";
echo "<description>New enhancements and releases</description>\n";
echo "<link>https://www.loginradius.com/docs/api/changelog</link>\n";

$postsContent = file_get_contents( "./database/apidocs/menus/posts.json");
$posts = json_decode($postsContent, true);
$filelist = array_column($posts, 'url');
$changeLogDir = "./database/apidocs/changelog/";

foreach ($filelist as $filename)
{
    $path = $changeLogDir . $filename.".json";
    $postContent = file_get_contents($path);
    $post = json_decode($postContent, true);
    $description = $post["description"] ? strip_tags($post["description"]) : "";
    echo "<item>\n";
    echo "<title>" .$post["name"]. "</title> \n ";
    echo "<description>" . $description . "</description>\n";
    echo "<pubDate>" . date('D, d M Y', strtotime($post["created_date"])) . " GMT</pubDate>\n";
    echo "<link>https://www.loginradius.com/docs/api/changelog/$filename</link>\n";
    echo "<atom:link href='https://www.loginradius.com/docs/api/changelog/$filename' rel='self' type='application/rss+xml'/>\n";
    echo "</item>\n";

}
echo "</channel>\n";
echo "</rss>\n";


?>