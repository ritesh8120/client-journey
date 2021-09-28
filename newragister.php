<?php 
date_default_timezone_set( 'America/Los_Angeles' );
include('config.php');
// if press submite button so this query is runn

	// variable value get the form whit post method
	$username = $_POST["username"];
	$email = $_POST['email'];
	$link = $_POST['link'];
	$requeststatus = $_POST['requeststatus'];
	$ReplyStatus = $_POST['ReplyStatus'];
	$level = $_POST['level'];
	$date = date('Y-m-d');

	$query = $conn->query("INSERT INTO `client_info`(`firstname`, `lastname`, `email`, `phone`, `address`, `source`, `lead`, `posion`, `date`, `Audience`, `type`, `dataform`, `level`, `connenction`, `reply`, `link`) VALUES ('$username','','$email','','','','','0','$date','$level','','','0','$requeststatus','$ReplyStatus','$link')");
	if ($query === TRUE) 
	{
	    $last_id = $conn->insert_id;
	    $result = $conn->query("INSERT INTO `clientpogistion`(`clientid`, `checkboxname`, `cstatus`, `img`, `form_no`)VALUES ('$last_id' ,'Optin page 1/2/3/4','0','','1'),('$last_id' ,'Free Swipe file Email (Invite to FB group - PUBLIC)','0','','2'),('$last_id' ,'Masterclass Exclusive VSL Page','0','','3'),('$last_id' ,'Clicked on Purchase now Button','0','','4'),('$last_id' ,'Order Form Page','0','','5'),('$last_id' ,'Order Confirmation Page','0','','6'),    ('$last_id' ,'Click Funnel Members page (ALL VIDEOS)','0','','7'),('$last_id' ,'Welcome message email','0','','8'),('$last_id' ,'Access to facebook group (PRIVATE)','0','','9'),('$last_id' ,'My PortalX Access','0','','10'),('$last_id' ,'Email 1 - video 1','0','','11'),('$last_id' ,'Email 2 - video 2','0','','12'),('$last_id' ,'Email 3 - Video 3','0','','13'),('$last_id', 'Email 4 - video 4', '0', '', '14'),('$last_id', 'Email 5 - video 5', '0', '', '15'),('$last_id', 'Email to book appointment with rajah sharma 30 mins', '0', '', '16'), ('$last_id', 'Testimonial email.', '0', '', '17'),('$last_id', 'Website Audit', '0', '', '18'),('$last_id', 'Social Media Presence Audit', '0', '', '19')");
        
        $result1 = $conn->query("INSERT INTO `personal`(`client_id`, `ustatus`, `form_name`,`form_no`) VALUES ('$last_id' ,'0','Discover Session','1'),('$last_id' ,'0','Client pondring Sheet','2'),('$last_id' ,'0','Goal setting','3'),('$last_id' ,'0','Action Plan Agreement Sheet','4'),('$last_id' ,'0','What Do You Need To Let Go Of','5'),('$last_id' ,'0','Conflict Belief','6'),('$last_id' ,'0','Stop procrastinating and get it done','7'),('$last_id' ,'0','Daily Success Habits','8'),('$last_id' ,'0','Energy zappers','9'),('$last_id' ,'0','My spark team','10'),('$last_id' ,'0','What Makes My Heart Sing','11'),('$last_id' ,'0','Mentor Magic','12'),('$last_id' ,'0','Golden Image List','13'),('$last_id' ,'0','Monthly Client Review and Feedback','14')");
        
        $result2 = $conn->query("INSERT INTO `business`(`client_id`, `ustatus`, `form_name`,`form_no`)VALUES ('$last_id' ,'0','A-1 Your business vision','1'),('$last_id' ,'0','A-2 Branding exercise','2'),('$last_id' ,'0','A-3 Client profile','3'),('$last_id' ,'0','A-4 Why people buy what youre Selling','4'),('$last_id' ,'0','A-5 How to talk about your new Avatar','5'),('$last_id' ,'0','B-5 49 Questions + Bio','6'),('$last_id' ,'0','B-14 60 day Launch check list From conceptualization to postmortem','7'),('$last_id' ,'0','A-10 Idea Mapping- Niche tightening','8'),('$last_id' ,'0','B-7 Pre-selling your high end program','9'),('$last_id' ,'0','A-11 client interview approach questionnaire?','10'),('$last_id' ,'0','B-1 The Sales cycle','11'),('$last_id' ,'0','B-2 Self- Promotion strategies','12'),('$last_id' ,'0','B-9 Launch Emails','13'),('$last_id' ,'0','B-3 Know like trust- launch','14'), ('$last_id' ,'0','A-7 Creating the know like & trust factor','15'),('$last_id' ,'0','A-8 Product creation','16'),('$last_id' ,'0','B-6 content structure','17'),('$last_id' ,'0','A-9 Perfect pricing & simple selling','18'),('$last_id' ,'0','B-8 Launch Details','19'),('$last_id' ,'0','A-6 The transformation stepping into the new Avatar','20'),('$last_id' ,'0','B-12 Pulling it all togeather','21'),('$last_id' ,'0','B-10 Getting your client to Finish Line','22')"); 
        
        header("Location: ./login");
	}

?>