<?php
class IpnController extends Controller
{


    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {


        if (!isset($_POST['merchant_ID']) || !isset($_POST['local_ID']) || !isset($_POST['total']) || !isset($_POST['ipn_verify']))
        {
            //Unauthorized access
            die('0');
        }
        else
        {
            //verify IPN with server

            $verify_url = 'http://secure.platiprinsms.ro/pay/';

            $fields = '';
            $d = array(
                'merchant_ID' => $_POST['merchant_ID'],
                'local_ID' => $_POST['local_ID'],
                'total' => $_POST['total'],
                'ipn_verify' => $_POST['ipn_verify'],
            );

            foreach ($d as $k => $v)
            {
                $fields .= $k . "=" . urlencode($v) . "&";
            }
            $fields = substr($fields, 0, strlen($fields)-1);

            $ch = curl_init($verify_url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $result = curl_exec($ch);

            if ($result == true)
            {
                //IPN verified
                //setam comanda locala ca fiind platita
               // @mysql_query("UPDATE orders SET platita='1' WHERE id='" . $_POST['local_ID'] . "'");
                $db_user=$this->ioc->user;
                $db_user->add_payment($_POST['local_ID'],10);

            }
            else
            {
                //IPN isn't valid
                //nu facem nici o setare
            }
        }

        echo '1'; //transmitem serverului de plati prin sms ca am procesat IPN-ul trimis

    }

}

?>