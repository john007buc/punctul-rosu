<?php
/**
 * Created by II.
 * User: YWA
 * Date: 4/20/13
 * Time: 9:56 PM
 * Read conf files for multi-language module
 */
class ReadConf
{
    /**
     * The name of conf file
     *
     * @var string
     */
    private $file_name;

    /**
     * This array is for all variabiles read from conf file
     *
     * @var array
     */
    private $params=array();

    /**
     * Constructor
     *
     * @param string $file
     *
     */
    public function __construct($file)
    {
        $this->file_name=$file;
    }

    /**
     * @param string $param The name of the parameter to return
     * @return string The value of a parameter
     */
    public function getParam($param)
    {
        $iterator=new FileIterator($this->file_name);
        foreach($iterator as $k=>$v)
        {
            //If row is not empty line or comment line (starting with #)
            if (!preg_match('/^[\s]*$/',$v) && !preg_match('/[#]{1,}.*$/',$v)){
                $matches=preg_split('/=/',$v);
                if(count($matches)==2 && $param==$matches[0]){
                    break;
                }
            }
        }
        //before return remove double quotes and carriage return from the ends
        return (preg_replace('/"(.*)"\s*$/', '$1', $matches[1]));
    }
}
?>