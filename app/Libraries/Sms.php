<?php

namespace App\Libraries;

class Sms {

    protected $login;

    protected $password;

    function __construct() {
    
        $this->login = env('SMS_USLUGI_LOGIN', null);

        $this->password = env('SMS_USLUGI_PASSWORD', null); 
    
    }

    private $charset;

    ///Проверка баланса
    function balance(){
        return $this->get( $this->request("balance"), "account" );
    }

    function reports($start = "0000-00-00", $stop = "0000-00-00", $dop = array()){
        if (!isset($dop["source"])) $dop["source"] = "%";
        if (!isset($dop["number"])) $dop["number"] = "%";

        $result = $this->request("report", array(
            "start" => $start,
            "stop" => $stop,
            "source" => $dop["source"],
            "number" => $dop["number"],
        ));
        if ($this->get($result, "code") != 1){
            $return =  array("code" => $this->get($result, "code"), "descr" => $this->get($result, "descr"));
        }
        else{
            $return =  array(
                "code" => $this->get($result, "code"),
                "descr" => $this->get($result, "descr"),
            );
            if (isset($result['sms'])) {
                if (!isset($result['sms'][0])) $result['sms'] = array($result['sms']);
                $return["sms"] = $result['sms'];
            }
        }
        return $return;
    }

    function sendedSmsList($start = "0000-00-00", $stop = "0000-00-00", $number = false){
        $result = $this->request("reportNumber", array(
            "start" => $start,
            "stop" => $stop,
            "number" => $number
        ));
        return $result;
    }

    function detailReport($smsid){
        $result = $this->request("report", array("smsid" => $smsid));
        if ($this->get($result, "code") != 1){
            $return =  array("code" => $this->get($result, "code"), "descr" => $this->get($result, "descr"));
        }
        else{
            $detail = $result["detail"];
            $return =  array(
                "code" => $this->get($result, "code"),
                "descr" => $this->get($result, "descr"),
                "delivered" => $detail['delivered'],
                "notDelivered" => $detail['notDelivered'],
                "waiting" => $detail['waiting'],
                "process" => $detail['process'],
                "enqueued" => $detail['enqueued'],
                "cancel" => $detail['cancel'],
                "onModer" => $detail['onModer'],
            );
            if (isset($result['sms'])) $return["sms"] = $result['sms'];
        }
        return $return;
    }

    //отправка смс
    //params = array (text => , source =>, datetime => , action =>, onlydelivery =>, smsid =>)
    function send($params = array(), $phones = array()) {
        $phones = (array)$phones;
        if (!isset($params["action"])) $params["action"] = "send";
        $someXML = "";
        if (isset($params["text"])) $params["text"] = htmlspecialchars($params["text"],null,HTTPS_CHARSET);
        foreach ($phones as $phone) {
            if (is_array($phone)) {
                if (isset($phone["number"])){
                    $someXML .= "<to number='".$phone['number']."'>";
                    if (isset($phone["text"])){
                        $someXML .= htmlspecialchars($phone["text"],null,HTTPS_CHARSET);
                    }
                    $someXML .= "</to>";
                }
            }
            else {
                $someXML .= "<to number='$phone'></to>";
            }
        }

        $result = $this->request("send", $params, $someXML);

        if ($this->get($result, "code") != 1) {
            $return =  array("code" => $this->get($result, "code"), "descr" => $this->get($result, "descr"));
        }
        else {
            $return = array(
                "code" => 1,
                "descr" => $this->get($result, "descr"),
                "datetime" => $this->get($result, "datetime"),
                "action" => $this->get($result, "action"),
                "allRecivers" => $this->get($result, "allRecivers"),
                "colSendAbonent" => $this->get($result, "colSendAbonent"),
                "colNonSendAbonent" => $this->get($result, "colNonSendAbonent"),
                "priceOfSending" => $this->get($result, "priceOfSending"),
                "colsmsOfSending" => $this->get($result, "colsmsOfSending"),
                "price" => $this->get($result,"price"),
                "smsid" => $this->get($result,"smsid"),
            );
        }

        return $return;

    }

    function get($responce, $key)
    {
        if (isset($responce[$key])) return $responce[$key];
        return false;
    }

    function getURL($action)
    {
        if (USE_HTTPS == 1)
            $address = HTTPS_ADDRESS."API/XML/".$action.".php";
        else
            $address = HTTP_ADDRESS."API/XML/".$action.".php";
        $address .= "?returnType=json";
        return $address;
    }


    function request($action,$params = array(),$someXML = "")
    {
        $xml = $this->makeXML($params,$someXML);
        if (HTTPS_METHOD == "curl"){
            $res = $this->request_curl($action,$xml);
        }
        elseif (HTTPS_METHOD == "file_get_contents"){
            $opts = array('http' =>
                array(
                    'method'  => 'POST',
                    'header'  => 'Content-type: application/x-www-form-urlencoded',
                    'content' => $xml
                )
            );

            $context  = stream_context_create($opts);

            $res = file_get_contents($this->getURL($action), false, $context);
        }
        if (isset($res)){
            $res = json_decode($res,true);
            if (isset($res["data"])) return $res["data"];
            return array();
        }
    }

    function request_curl($action,$xml){
        $address = $this->getURL($action);
        $ch = curl_init($address);
        curl_setopt($ch, CURLOPT_URL, $address);
        curl_setopt($ch, CURLOPT_FAILONERROR, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    function makeXML($params,$someXML = ""){
        $xml = "<?xml version='1.0' encoding='UTF-8'?>
		<data>
			<login>{$this->login}</login>
			<password>{$this->password}</password>
			";
        foreach ($params as $key => $value)
        {
            if (is_array($value))
            {
                $xml .= "<$key ";
                foreach ($value as $attr => $v)
                {
                    $xml .= " $attr='".addslashes(htmlspecialchars($v))."' ";
                }
                $xml .= " />";
            }
            else $xml .= "<$key>$value</$key>";
        }
        $xml .= "$someXML
		</data>";
        $xml = htmlspecialchars($xml);
        return $xml;
    }

}
