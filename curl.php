<?php
$soapUser = "Bi0n5";  //  username
$soapPassword = "f0rum"; // password

$curl = curl_init();
 
curl_setopt_array($curl, array(
  CURLOPT_URL => "http://192.168.1.33:8080/ws/services/BionsForumService/",
  CURLOPT_USERPWD => $soapUser.":".$soapPassword,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => 
"<soapenv:Envelope xmlns:soapenv=\"http://schemas.xmlsoap.org/soap/envelope/\" xmlns:bnis=\"http://www.bnisekuritas.co.id\">
   <soapenv:Header/>
   <soapenv:Body>
      <bnis:validate>
         <!--Optional:-->
         <bnis:csrId>0DM002</bnis:csrId>
         <!--Optional:-->
         <bnis:email>coba</bnis:email>
      </bnis:validate>
   </soapenv:Body>
</soapenv:Envelope>",
  CURLOPT_HTTPHEADER => array("content-type: text/xml"),
));
 
$response = curl_exec($curl);
$err = curl_error($curl);
 
curl_close($curl);
 
if ($err) {
  echo "cURL Error #:" . $err;
} else {

$plainXML = mungXML( trim($response) );
$arrayResult = json_decode(json_encode(SimpleXML_Load_String($plainXML, 'SimpleXMLElement', LIBXML_NOCDATA)), true);

print_r($arrayResult);

echo $arrayResult['soapenv_Body']['ns_validateResponse']['ns_return']['ax21_isValid'];
foreach($arrayResult['soapenv_Body']['ns_validateResponse']['ns_return'] as $k => $v) {
//	echo $k.'-'.$v;
}
// FUNCTION TO MUNG THE XML SO WE DO NOT HAVE TO DEAL WITH NAMESPACE


//     $response1 = str_replace("<soap:Body>","",$response);
//     $response2 = str_replace("</soap:Body>","",$response1);

     // convertingc to XML
//     $parser = simplexml_load_string($response);

//	 print_r($response);

//  echo $response;
}
 
function mungXML($xml)
{
    $obj = SimpleXML_Load_String($xml);
    if ($obj === FALSE) return $xml;

    // GET NAMESPACES, IF ANY
    $nss = $obj->getNamespaces(TRUE);
    if (empty($nss)) return $xml;

    // CHANGE ns: INTO ns_
    $nsm = array_keys($nss);
    foreach ($nsm as $key)
    {
        // A REGULAR EXPRESSION TO MUNG THE XML
        $rgx
        = '#'               // REGEX DELIMITER
        . '('               // GROUP PATTERN 1
        . '\<'              // LOCATE A LEFT WICKET
        . '/?'              // MAYBE FOLLOWED BY A SLASH
        . preg_quote($key)  // THE NAMESPACE
        . ')'               // END GROUP PATTERN
        . '('               // GROUP PATTERN 2
        . ':{1}'            // A COLON (EXACTLY ONE)
        . ')'               // END GROUP PATTERN
        . '#'               // REGEX DELIMITER
        ;
        // INSERT THE UNDERSCORE INTO THE TAG NAME
        $rep
        = '$1'          // BACKREFERENCE TO GROUP 1
        . '_'           // LITERAL UNDERSCORE IN PLACE OF GROUP 2
        ;
        // PERFORM THE REPLACEMENT
        $xml =  preg_replace($rgx, $rep, $xml);
    }

    return $xml;

} // End :: mungXML()
?>