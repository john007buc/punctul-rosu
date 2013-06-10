<?php
/**
 * User: YWA
 * Date: 4/19/13
 * Time: 11:04 PM
 * This class is an iterator for reading files
 */
class FileIterator implements Iterator
{
    /**
     * File pointer resource
     *
     * @var resource
     */
    private $fp;

    /**
     * @var int
     */
    private $index=0;

    /**
     * The line read from file
     *
     * @var string
     */
    private $line;

    /**
     * Constructor
     *
     * @param string $file_name The name of the files
     */

    public function __construct($file_name)
    {
        $fp=fopen($file_name,"r");
        if(!$fp){
           die("Could not open conf file");
        }
        $this->fp=$fp;
        $this->line=rtrim(fgets($this->fp),"\n");
    }

    /**
     * Set the index and file cursor to zero
     *
     * @return void
     */

    function rewind()
    {
        $this->index=0;
        rewind($this->fp);
       $this->line=rtrim(fgets($this->fp),"\n");
    }

    /**
     * Return the current line from the file
     *
     * @return string
     */
    function current()
    {
        return ($this->line);
    }

    /**
     * Return the index value
     *
     * @return int
     */
    function key()
    {
        return ($this->index);
    }

    /**
     * Return the next line
     *
     * @return null|string
     */
    function next()
    {
        $this->index++;
        $this->line=rtrim(fgets($this->fp),"\n");
        if(!feof($this->fp)){
            return $this->line;
        }else{
            return (null);
        }
    }
    /**
     * Verify if the reading process should continue
     *
     * @return bool
     */

    function valid()
    {
        return ((feof($this->fp))?false:true);
    }
}
?>
