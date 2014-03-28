<?php
use PHPImageWorkshop\ImageWorkshop;
class Image extends Main
{
   private $path = 'lib/image/ImageWorkshop.php';
   public  $dirPath = "thumbs/";
   public $createFolders = true;
   public   $backgroundColor =null;
   public $imageQuality = 95; 
   public $w=62,$h=63;
   
 



   public function  __construct()
   {
      
      require_once($this->config['script_path'].$this->path);
                
   }
   
   
   public function create_thumb($file_name,$path)
   {
      
      $layer = ImageWorkshop::initFromPath($path.$file_name);
      $layer->cropMaximumInPixel(0, 0, "MM");
      $layer->resizeInPixel($this->w, $this->h);
      $image = $layer->getResult();
      $layer->save($this->config['upload_path'].$this->dirPath, $file_name, $this->createFolders, $this->backgroundColor, $this->imageQuality);
      
   }
   
   
   public function set_default()
   {
      
      $this->dirPath="thumbs/";
      $this->w=62;
      $this->h=63;      
      
   }
   
   
 
   
   
   

   
   
   
   
   
   
   
}//classs Ends


