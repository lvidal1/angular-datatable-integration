<?php
	include("vendor/nategood/httpful/bootstrap.php");
	// Get params
	$POST_params = $_POST;
	$params = array(
				"limit" => isset($POST_params["length"])?$POST_params["length"]:'10',
				"page" => isset($POST_params["start"])?($POST_params["start"]/$POST_params["length"]):'0'
			);
	// Object for datatable, it's necessary to render data into datatable
	$RESTobj = array(
				"draw" => $POST_params["draw"],
				"recordsTotal" => 6750,
				"recordsFiltered" => 6750,
				"data" => array()
			);
	// Config url to call webservice
	$uri = "https://api.culqi.com/v2/charges";
	$uri = $uri . "?" . http_build_query($params, '', '&');
	$jwt = "Bearer sk_test_ujVxc7JMCr0ivKQV";

	// Return data inyo datatable's object
	$res =  \Httpful\Request::get($uri)->addHeader('Authorization', $jwt)->send();
    if ($res->body) {
        $RESTobj["data"] = $res->body;
    } else {
        $RESTobj["data"] = false;
    }

    echo json_encode($RESTobj);

?>