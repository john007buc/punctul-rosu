<?php
/**
 * Created by JetBrains PhpStorm.
 * User: YWA
 * Date: 1/24/13
 * Time: 12:27 AM
 * To change this template use File | Settings | File Templates.
 */
class ProcessImages
{

    private $file;
    private $file_folder;

    public function __construct($file_name=null,$file_folder=null)
    {

        $this->file=$file_name;
        $this->file_folder=$file_folder;






    }

    public function saveThumbnail($thumb_folder)
    {
        if(!is_null($this->file) && file_exists($this->file_folder.'/'.$this->file))
        {

            $src_size=getimagesize($this->file_folder.'/'.$this->file);
            switch($src_size['mime'])
            {

                case 'image/jpeg':
                    $src_image=imagecreatefromjpeg($this->file_folder.'/'.$this->file);
                    break;
                case 'image/png':
                    $src_image=imagecreatefrompng($this->file_folder.'/'.$this->file);
                    break;
                case 'image/gif':
                    $src_image=imagecreatefromgif($this->file_folder.'/'.$this->file);
                    break;
                default:
                    $src_image=false;

            }


            if($src_image!=false)
            {
                $thumb_width=150;

                    $new_width=($src_size[0] <= $thumb_width)?$src_size[0]:$thumb_width;

                    $new_height=($src_size[1]/$src_size[0])* $new_width;
                    $new_height=($new_height< 3*$new_width)?$new_height:3*$new_width;

                    $thumb=imagecreatetruecolor($new_width,$new_height);

                   $white = imagecolorallocate( $thumb, 255, 255, 255);
                   imagefill($thumb, 0, 0, $white);

                   imagecopyresampled($thumb,$src_image,0,0,0,0,$new_width,$new_height,$src_size[0],$src_size[1]);


                   list($image_name,$ext)=explode('.',$this->file);
                   return imagejpeg($thumb,$thumb_folder.'/'.$image_name.'.jpg');

            }



        }

        return false;


    }





}