<?php

class RDTvideo
{
    private string $post_url;
    private string $video_link;
    private array $data;
 

    public function getVideoLink(string $post_url,string $config): string
    {

        if($config!=="videosegg_transfer"){

            $post_url = explode("?",$post_url);
            $post_url = $post_url[0];
        }

        if($config!=="videosegg_transfer"){
            if (!isset($post_url) or trim($post_url) == '' or strpos($post_url, 'reddit.com') === false) {
                throw new Exception("You must provide a Reddit post url");
            }
        }
        $this->post_url = $post_url;
        
        if($config!=="videosegg_transfer"){
            
            $data = json_decode(file_get_contents("" . $post_url . ".json"), true);
        
        }else{

            $data =  json_decode(file_get_contents("https://videosegg.com/download_video.php?url_video='$post_url'"),true);

        }

        $this->data = $data;
        if (isset($data[0]['data']['children'][0]['data']['secure_media']['reddit_video']['is_gif'])){
            //scrubber_media_url
           // throw new Exception("Video is actually a gif");
           $video_link=$data[0]['data']['children'][0]['data']['secure_media']['reddit_video']['fallback_url'];
        }
    
        if($config=="normal"){

             $video_link = $data[0]['data']['children'][0]['data']['secure_media']['reddit_video']['dash_url'];    
        
        }else if($config=="redgif"){

            $video_link=$data[0]['data']['children'][0]['data']['preview']['reddit_video_preview']['fallback_url'];

        }else if($config=="videosegg_transfer"){

            
            $video_link = $data['url_video'];

        }

        if($config!=="videosegg_transfer"){
            
            $this->video_link = $video_link;
            $only_url_video =  explode("?",$video_link);
            $this->video_link=$only_url_video[0];
            return $only_url_video[0];
        
        }else{

            $this->video_link = $video_link;
            return $video_link;
        }




    }


    public function download(string $save_as, string $preset = 'fast', int $crf = 20): bool
    {
        
        $video_link = $this->video_link;
        $command = "ffmpeg -i $video_link -c:v libx264 -preset $preset -crf  $crf $save_as.mp4";
        echo shell_exec($command);
        return true;
        
    }

    public function videoDetails(): array
    {
        $data = $this->data;
        $height = $data[0]['data']['children'][0]['data']['secure_media']['reddit_video']['height'];
        $width = $data[0]['data']['children'][0]['data']['secure_media']['reddit_video']['width'];
        $duration = $data[0]['data']['children'][0]['data']['secure_media']['reddit_video']['duration'];
        return array('width' => $width, 'height' => $height, 'duration' => $duration);
    }


    #Here insert the method videoThumb() in $url and where you get save the image set value to var path EXAMPLE path/videos/ew
    public function download_thumb($url_thumb,$path){
    
        shell_exec("ffmpeg -i $url_thumb -c copy $path");

        return $path;
    }

    public function videoThumb(): string
    {
        return $this->data[0]['data']['children'][0]['data']['thumbnail'];
    }

    public function videoPostedSub(): string
    {
        return $this->data[0]['data']['children'][0]['data']['subreddit'];
    }

    public function videoPostedBy(): string
    {
        return $this->data[0]['data']['children'][0]['data']['author'];
    }

    public function videoTitle(): string
    {
        return $this->data[0]['data']['children'][0]['data']['title'];
    }

    public function videoPostedDate(string $format = 'Y-m-d H:i:s'): string
    {
        return gmdate($format, $this->data[0]['data']['children'][0]['data']['created_utc']);
    }
}
