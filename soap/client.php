<?php

ini_set('soap.wsdl_cache_enabled', 0);

$service=new SoapClient("http://localhost/WebService/soap/server.wsdl",
						array(
							'wsdl_cache' => 0,
							'trace' => 1,
	)
);

$taballservices=$service->rechercheClient();

print_r($taballservices);
?>