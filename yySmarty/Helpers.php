<?php
/**
 * Helpers
 *
 * Contain functions used in controllers's actions
 */
class Helpers
{
   /**
    * Constructor
    */
    public function __construct()
    {

    }
    /**
     * @param string $val The value of the array to be filtered
     * @return bool
     */

    public function filter_variants($val)
    {
        return ($val === "");
    }

    /**
     * Take the article HTML data from ckeditor and substract title (from the placeholder <h2>[[Title]]</h2>) and the body of the article
     *
     * @param string $news
     * @return array
     */
    public function token_news($news)
    {
        $header_start=strpos($news,'<h2');
        $header_end=strpos($news,'</h2>');
        $header= substr($news,$header_start,$header_end-$header_start+5);
        $title_start=strpos($header,'[[');
        $title_stop=strpos($header,']]');
        $title=substr($header,$title_start+2,$title_stop-$title_start-2);
        $body=substr_replace($news,'', $header_start, $header_end- $header_start+5);

        return array($title,$body);
    }
}

?>