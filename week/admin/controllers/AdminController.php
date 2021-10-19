
<?php

require_once('connection.php');
class  AdminManager{

    private $connection;
        
    function __construct()
    {
           $this->connection=DBContext::Connect();
    }


    //---------------------------------
    //USER ACCOUNT MANAGEMENT SECTION
    //----------------------------------
    function authenticate($username,$password)
    {
        $sql="SELECT * FROM `users` WHERE (`username`='$username' AND `password`='$password')";
             if($result=$this->connection->query($sql))
             {
 
                 if(mysqli_num_rows($result)!=0)
                 {
                     $userdata=mysqli_fetch_assoc($result);
                     $_SESSION['name']=$userdata['use'];
                     $_SESSION['name']=1;
                    // $_SESSION['user_email']=$userdata['Email'];
                     return true;
                 }
             }
             return false;
    }

    function Redirect($url, $permanent = false)
    {
        if (headers_sent() === false)
        {
            header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
        }
    
        exit();
    }
    
    
   function isLoggedIn()
   {
  //  session_start();
    if(isset($_SESSION['name']))
    {
       
    }else{
        $this->Redirect('index.php', false);
    }
    
   }

function logout()
{
    session_destroy();
    $this->Redirect('index.php', false);
}
     //---------------------------------
    //END ACCOUNT MANAGEMENT SECTION
    //----------------------------------

function getPendingScientists()
	{
          // RETURNS SCIENTISTS WHOSE DETAILS ARE NOT ADDED YET

		//$email=$_SESSION['user_email'];
	//	$sql="select * from scientist ";

        $sql="SELECT * 
        FROM scientist  as S
        WHERE S.id NOT IN 
            (SELECT scientistId
             FROM final )";
		if($result=$this->connection->query($sql))
				return $result;
			return false;
	}
    function getScientists()
	{
		//$email=$_SESSION['user_email'];
		$sql="select * from scientist ";

        
		if($result=$this->connection->query($sql))
				return $result;
			return false;
	}


    function insertScientist($pId,$mId,$wId,$description,$filename,$pptname)
    {
        try{

           

           // $sql="INSERT INTO `final`( `projectId`, `monthId`, `filename`, `description`, `ppt_name`, `weekid`) VALUES (1,1,'11','11','11',1)";
            $sql="INSERT INTO `final`
            (
            `projectId`,
            `monthId`,
            `filename`,
            `description`,
            `ppt_name`,
             `weekid`

            )
            VALUES
            ($pId,$mId,'$filename','$description','$pptname',$wId)";


   $result=$this->connection->query($sql);
   return $result;
           

            return false;
        }catch(Exception $e)
        {
            //print_r($e);
            return $e;
        }
       
     
        
    }

   function getQuaters()
   {
       $sql="select * from quater";
       if($result=$this->connection->query($sql))
       {
               return $result;
       }

       return false;
   }
      function getWeek()
   {
       $sql="select * from week";
       if($result=$this->connection->query($sql))
       {
               return $result;
       }

       return false;
   }





    function getScientistDeatils()
    {
        $sql="SELECT S.name as ProjectName,q.name as MonthName,w.name as WeekName,F.description,f.filename,f.ppt_name FROM final as F
JOIN scientist as S on S.id=F.projectId
JOIN week as W on F.weekid=w.id
JOIN quater as q  on q.id=f.monthId";
    
        if($result=$this->connection->query($sql))
        {
                return $result;

              //return false;
        }

        return false;
    }







    function getReport()
    {
        $array=array();
        $sql="select * from scientist ";
        if($result=$this->connection->query($sql))
        {
            while ($row = $result->fetch_assoc()) {
               $data=$this->getProjectSubmissionDetails($row['id']);

               while($qa =mysqli_fetch_assoc($data))
                    {
                      array_push($array,$qa);
                    }
              // array_push($array,$data);
            }
                return $array;
        }

        return  $array;

    }


    function getProjectSubmissionDetails($id)
    {
        $sql="select Q.name as MonthName,W.name WeekName ,(select name from scientist where id=$id) as projectName, f.projectId as status from quater as Q  join week as W
        left join final as F on F.monthid=Q.id AND W.id=weekId  AND F.projectId=$id
         order by Q.id,w.id";
          if($result=$this->connection->query($sql))
         {
                 return   $result;
         }
 
         return array();
    }
   
    function getDetails()
    {
        $array=array();
        $sql="select  DISTINCT F.scientistId as id ,S.name from  final F
        JOIN scientist as S ON S.id=F.scientistId";
        if($result=$this->connection->query($sql))
        {
                 $r=array();
                   while ($row = $result->fetch_assoc()) {
                       $r=null;
                    $quaters=$this->getQuatersByScientistId($row['id']);
                    
                   // $c++;
                  // array('quaters'=>mysqli_fetch_assoc($quaters));
                 // mysqli_
                   // $row['quaters']=$quaters->fetch_all();

                    $arr=[];

                    while($qa =mysqli_fetch_assoc($quaters))
                    {
                      array_push($arr,$qa);
                    }

                    $row['quaters']=$arr;
                   // $r=array($row,'quaters'=>$quaters);
                    // $r= $row+$quaters;

                    array_push($array,$row);
                    }

                    return $array;
        }

        return  $array;
    }

    function getQuatersByScientistId($id)
    {
        $sql="select F.quaterId as id ,Q.name ,F.filename,F.pptname,F.description    from  final F
        JOIN quater as Q ON Q.id=F.quaterId where F.scientistId=$id";
        if($result=$this->connection->query($sql))
        {
                return   $result;
        }

        return array();

    }

 
  



    function getScientistDetailById($id)
    {
        $sql='select * from final where id='.$id;
        if($result=$this->connection->query($sql))
        {
                return $result->fetch_assoc();
        }

        return false;
    }

    function deleteScientistDetail($id)
    {
         $sql="delete from final where id=$id";
         if($result=$this->connection->query($sql))
         {
                 return true;
         }
 
         return false;


    }

    function updateScientist($scientistId,$quatertId,$description,$filename,$pptname,$id)
    {
        try{

           


         

        // $sql="UPDATE `final` set `scientistId`= $scientistId, `quaterId`=$quatertId,`description`='$description',`filename`='$filename',`pptname`='$pptname' where id=$id";

        //    $sql="UPDATE `aroma`.`final`
        //    SET
           
        //    `scientistId` = $scientistId,
        //    `quaterId` = $quatertId,
        //    `filename` = '$filename',
        //    `description` ='$description',
        //    `pptname`='$pptname'
           
        //    WHERE `id` = $id;
        //    ";

$sql="UPDATE `aroma`.`final`
SET

`quaterId` = $quatertId,
`filename` = '$filename',
`description` ='$description',
`pptname`='$pptname'

WHERE `id` = $id;
";
            if($result=$this->connection->query($sql))
            {
                    return true;
            }

            return false;
        }catch(Exception $e)
        {
            return false;
        }
       
     
        
    }



}

?>