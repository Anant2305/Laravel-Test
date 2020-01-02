<?php
function dbopen ($dbname = "anant615_CSTA",$user = "anant615",$password = "hFKS*p's",$server = "localhost:3306"){
	
	if (!($mylink = mysql_connect($server,$user,$password))) {
		print "<h3>Could not connect to the database.  Please try again later</h3>\n";
		exit;
	}
	mysql_select_db($dbname);
	return $mylink;
}

//void dbclose([string, link from mysql_connect])
function dbclose($mylink){
	mysql_close($mylink);
}

// int safe_query ([string query])

// This function will execute an SQL query against the currently open
// MySQL database. If the global variable $query_debug is not empty,
// the query will be printed out before execution. If the execution fails,
// the query and any error message from MySQL will be printed out, and
// the function will return FALSE. Otherwise, it returns the MySQL
// result set identifier.

function safe_query ($query){
	global $query_debug;

	if (empty($query)){ 
		return FALSE; 
	}

	if (!empty($query_debug)){ 
		print "<pre>$query</pre>\n"; 
	}

	$result = mysql_query($query);
	if(!$result){
  		print "Please contact admin regarding this query failure: "
   		."<li>errorno=".mysql_errno()
   		."<li>error=".mysql_error()
   		."<li>query=".$query;		
  	}else{
	 	return $result;
	}
}


	function trackVisit() {
		if ( $_SERVER['REQUEST_URI'] != "/favicon.ico" ) {
			$localLink = dbopen();
			$referrerParts = parse_url($_SERVER['HTTP_REFERER']);
			$setClause[]= "sessionID='" . session_id() . "'";
			$setClause[]= "visitedHostName='" . $_SERVER['HTTP_HOST'] . "'";
			if ( !empty($_SERVER['REDIRECT_URL']) ) {
				$setClause[]= "visitedPageName='" . $_SERVER['REDIRECT_URL'] . "'";
			} else {
				$setClause[]= "visitedPageName='" . $_SERVER['PHP_SELF'] . "'";
			}
			$setClause[]= "visitedQueryString='" . $_SERVER['QUERY_STRING'] . "'";
			$setClause[]= "referredHostName='" . $referrerParts['host'] . "'";
			$setClause[]= "referredPageName='" . $referrerParts['path'] . "'";
			$setClause[]= "referredQueryString='" . $referrerParts['query'] . "'";
			$setClause[]= "fromAds='" . $_SESSION['sess_fromGoogleAds'] . "'";
			$setClause[]= "fromGoogle='" . $_SESSION['sess_fromGoogle'] . "'";

			$query = "insert into VisitorStats set " . implode(",", $setClause);
			$result = safe_query($query);
			dbclose($localLink);
		}
		return;
	}
?>
