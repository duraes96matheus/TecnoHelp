<?php
	$servername = "localhost";
	$username = "SistemaTH";
	$password = "14042015";
	$dbname = "SistemaTH";
	
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	
	function parseToXML($htmlStr){
		$xmlStr=str_replace('<','&lt;',$htmlStr);
		$xmlStr=str_replace('>','&gt;',$xmlStr);
		$xmlStr=str_replace('"','&quot;',$xmlStr);
		$xmlStr=str_replace("'",'&#39;',$xmlStr);
		$xmlStr=str_replace("&",'&amp;',$xmlStr);
		return $xmlStr;
	}
	
	// Select all the rows in the markers table
	$result_markers = "SELECT * FROM TB_Usuario where type='Prestador'";
	$resultado_markers = mysqli_query($conn, $result_markers);
	
	header("Content-type: text/xml");	
	echo '<markers>';	
	while ($row_markers = mysqli_fetch_assoc($resultado_markers)){
	  echo '<marker ';
	  echo 'name="' . parseToXML($row_markers['name']) . '" ';
	  echo 'address="' . parseToXML($row_markers['address']) . '" ';
	  echo 'lat="' . $row_markers['lat'] . '" ';
	  echo 'lng="' . $row_markers['lng'] . '" ';
	  echo 'type="' . $row_markers['type'] . '" ';
	  echo '/>';
	}
	
	// End XML file
	echo '</markers>';
	

	
	
	
