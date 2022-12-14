<?php
require_once('rdt-video.php');

echo "Comenzando";
$call = new RDTvideo();
$url = $call->getVideoLink('https://www.reddit.com/r/funny/comments/d8qo81/baby_crocodiles_sound_like_theyre_shooting_laser/');
echo $call->videoTitle();
echo " ".$url;
$call->download("descargar2");



#echo $url."\n";
#echo shell_exec("ffmpeg -i https://v.redd.it/enxxsuo5xko31/DASHPlaylist.mpd -c copy guardado.mp4");
echo "\n ya se descargo";
