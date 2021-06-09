<?php

namespace App\Entities;

use CodeIgniter\Entity;
use App\Models\ArticlesModel;
use App\Models\ProductModel;
use App\Models\ImageModel;
use App\Models\ArticlePriceModel;

class Articles extends Entity
{
   /**
    * @param string $idProduct
    * @return ProductModel|string
    */
   public function getNameOfArticle(string $idProduct)
   {
      $grade = new ProductModel();
      $ArticleName = $grade->where('idProduct', $idProduct)->find();

      $name = $ArticleName? $ArticleName[0]->name :"";

      return   $name;
   }
   /**
    * @param  $idImage
    * @return ImageModel|string
    */
   public function getImageName( $idImage)
   {
      $fomrt = new ImageModel();
      if ($idImage != NULL) {
         $image = $fomrt->where('idImage', $idImage)->find();
         $name = $image?$image[0]->name:"";
      } else{
         $name = "404image";
      }

      return   $name;
   }
   /**
    * @param  $idImage
    * @return ImageModel|string
    */
   public function getImageExtend( $idImage)
   {
      $fomrt = new ImageModel();
      if ($idImage != NULL) {
      $image = $fomrt->where('idImage', $idImage)->find();
      $val =$image? $image[0]->fileExtension :"";
   } else{
      $val = "jpg";
   }
      return   $val;
   }

   /**
    * @param  $idArticle
    * @return ArticlePriceModel|string
    */
   public function getPrice( $idArticle)
   {
      $fomrt = new ArticlePriceModel();
     
      $price = $fomrt->where('idArticle', $idArticle)->find();
      if ($price != NULL) {
      $val = $price?$price[0]->price :"";
    } else{
      $val = 0;
   }
      return   $val;
   }
}
