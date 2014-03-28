<?php
$msg="";

$report_id          = "";
$report_type        = "";
$report_submit_by   = "";
$report_date        = "";
$report_post_id     ="";
if(isset($_GET['mod']) && $_GET['mod']=='report_detail'){
    $report_id  = $_GET['rep_id'];    
    $rep_detailz   = $adminProj->getReportingNoti($report_id);   
    $report_id          = $rep_detailz[0]['report_id'];
    $report_type        = $rep_detailz[0]['post_type'];
    $report_submit_by   = ucfirst($rep_detailz[0]['first_name']).' '.$rep_detailz[0]['last_name'];;
    $report_date        = $rep_detailz[0]['report_date'];
    $report_post_id     = $rep_detailz[0]['report_post_id'];
}



if(isset($_GET['mod']) && $_GET['mod']=='rep_act')
{ 
    $post_id    = $_GET['post_id'];
    if($_GET['val']=='1')
    {
        $res    = $main->getPostDel($post_id);
        if($res)
        {
            $res    = $main->getDel('tbl_report','report_post_id',$post_id);
            if($res)
            {
                header("Location:report.php?mod=rep_del");
            }
        }
    }  else {
        
         $res    = $main->getDel('tbl_report','report_post_id',$post_id);
            if($res)
            {
                header("Location:report.php?mod=rep_rej");
            }
    }
    
}

if(isset($_GET['mod']) && $_GET['mod']=='rep_del')
{
    $msg.=$admin->showAlert('success','Post Successfully Deleted');
}elseif(isset($_GET['mod']) && $_GET['mod']=='rep_rej')
{
    $msg.=$admin->showAlert('success','Report Successfully Rejected');
}
   




$reports = $adminProj->getReportingNoti();