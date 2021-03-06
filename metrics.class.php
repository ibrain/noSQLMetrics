<?php
	
	error_reporting(E_ALL);
	class NoSQLMetrics
	{
		function SetVisitor($metrics_id)
		{

			if(!isset($_COOKIE["visit_$metrics_id"]))
			{
					$NoSQLMetricsData = file_get_contents("store.json");
					$NoSQLMetricsData = json_decode($NoSQLMetricsData,true);
					$NoSQLMetricsData["pages"][$metrics_id]["visits"] = intval($NoSQLMetricsData["pages"][$metrics_id]["visits"])+1;
					$NoSQLMetricsData = json_encode($NoSQLMetricsData);
					file_put_contents("store.json",$NoSQLMetricsData);
					SetCookie("visit_$metrics_id",'VISIT_SET',time()+86400);
			}

		}
		
		
		
		
		function SetLike($metrics_id)
		{
		
		if(!isset($_COOKIE["like_$metrics_id"]))
			{
			$NoSQLMetricsData = file_get_contents("store.json");
			$NoSQLMetricsData = json_decode($NoSQLMetricsData,true);
			$NoSQLMetricsData["pages"][$metrics_id]["likes"] = intval($NoSQLMetricsData["pages"][$metrics_id]["likes"])+1;
			$NoSQLMetricsData = json_encode($NoSQLMetricsData);
			file_put_contents("store.json",$NoSQLMetricsData);
			SetCookie("like_$metrics_id",'LIKE_SET',time()+86400);
			}
		}
		
		function GetVisitors($metrics_id)
		{
			$NoSQLMetricsData = file_get_contents("store.json");
			$NoSQLMetricsData = json_decode($NoSQLMetricsData,true);
			return intval($NoSQLMetricsData["pages"][$metrics_id]["visits"]);
			
		}
		
		function GetLikes($metrics_id)
		{
			$NoSQLMetricsData = file_get_contents("store.json");
			$NoSQLMetricsData = json_decode($NoSQLMetricsData,true);
			return intval($NoSQLMetricsData["pages"][$metrics_id]["likes"]);
			
		}
		
	
	};

?>