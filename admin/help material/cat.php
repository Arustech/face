<?php require("header.php");





include("cat_process.php");





?>

<script type="text/javascript" src="plugins/nestable/jquery.nestable.min.js"></script>

<body>

<?php require ('top-nav.php')?>    

    <div id="container">

  <?php require ('sidebar.php')?>	

        <div id="content">

            <div class="container">

			

                <div class="crumbs">

                    <ul id="breadcrumbs" class="breadcrumb">

                        <li> <i class="icon-home"></i>  <a href="index.php">Dashboard</a> 

                        </li>

                        <li class="current"> <a href="cat.php" title="">Categories</a> 

                        </li>

                    </ul>

                    

                </div>

				<?=$msg;?>

                <div class="page-header">

                    <div class="page-title">

                        <h3>Categories</h3>  <span>List Of Categories</span> 

                    </div>

                    

                </div>

				 <div class="row">

                    <div class="col-md-12" id="add_cat">

                        <div class="widget box">

                        <?



						?>

                            <div class="widget-header">

                                <h4><i class="icon-reorder"></i> <?=$title?> Category / SubCategory</h4> 

								<div class="toolbar no-padding">

                                    <div class="btn-group"> <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span> 

                                    </div>

                                </div>

                            </div>

                            <div class="widget-content">

                                <form class="form-horizontal row-border" action="#" method="post">

                                                                   

                                    <div class="form-group">

                                       <label class="col-md-2 control-label">Title:</label>

                                        <div class="col-md-6">

                                            <input type="text" class="form-control" name="category_title" value="<?=$cat_title?>">

                                        </div>

                                        <div class="col-md-4">

                                        <?

										$style="";

										 if(isset($_GET['t']) && $_GET['t']=='cat' && $_GET['mod']=='edit')

										$style="style='display:none'";







																		

										 ?>

                                        

                                            <select <?=$style?> class="form-control" name="category_parent" id="culture">

											<option value="0" selected="selected">No Parent</option>

                                                <?

												

												$cats_for_select = $adminProj->getCategories(0);

												 foreach($cats_for_select as $cat)

												{

												if($cat_parent==$cat['category_id'])

												{

												$selected='selected';

												}else

												{

												$selected='';

												}

												?>

												<option value="<?=$cat['category_id']?>" <?=$selected?> ><?=$cat['category_title']?></option>

												<?

												}?>                                            </select>

                                        </div>

										<div class="col-md-4" style="float:right;margin-top:5px;">

										<input type="hidden" name='category_id'value="<?=$id?>">

										<input type="submit" value="<?=$btn_name?>" name="<?=$btn_name?>" class="btn btn-sm btn-primary"/> 

										</div>

                                    </div>

									

									

									

                                 </form>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="row" id="list">

                    <div class="col-md-12">

                        <div class="widget box">

                            <div class="widget-header">

                                <h4><i class="icon-reorder"></i> Categories List</h4> 

                                <div class="toolbar no-padding">

                                    <div class="btn-group"> <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span> 

                                    </div>

                                </div>

                            </div>

							

                            <div class="widget-content">

							<div class="row">

							<div class="dataTables_header clearfix">

								<div class="col-md-6" style="float:right;">

                                <form name="frm_search" action="" method="post">

									<div class="dataTables_filter" id="DataTables_Table_0_filter">

										<label>

											<div class="input-group"><span class="input-group-addon"><i class="icon-search"></i></span>

												<input type="text" name="txt_search" aria-controls="DataTables_Table_0" class="form-control">



											</div>

                                                                                            <button type="submit" name="btn_search" class="btn btn-sm btn-success">Search</button>

										</label>

									</div>

                                    </form>

								</div>

							</div>

							</div>

                            

                            <div class="row">

                            <div class="col-md-6">

                        <div class="widget box">

                            <div class="widget-header">

                                <h4><i class="icon-reorder"></i> Categories</h4> 

                            </div>

                            <div class="widget-content">

                                <div id="nestable_list_2" class="dd">

                                    <ol class="dd-list ">

                                    

                                 <? 

								



									 foreach ($cats as $cat ) 

									 {

										

									

									  ?>

                                    

                                        <li data-id="1" class="dd-item ">

                                            <div class="dd-handle dd-nodrag"><?=$cat['category_title']?><span style="float:right"> <a title="" class="btn btn-xs bs-tooltip" href="?mod=edit&id=<?=$cat['category_id']?>&t=cat<?=$page->getQs();?>" data-original-title="Edit">

										   <i class="icon-pencil"></i>

										   </a>

                                           

                                           <a title="" class="btn btn-xs bs-tooltip" href="?mod=trash&id=<?=$cat['category_id']?>&t=cat<?=$page->getQs();?>" data-original-title="Delete">

										   <i class="icon-trash"></i>

										   </a>

                                           </span></div>

                                            

                                            <?   

										$subs = $adminProj->getCategories(0,$cat['category_id']);



										if($subs)

										{?>   

                                        

                                        <ol class="dd-list" style="">

										<?	foreach($subs as  $sub)

											{?>

												

											 

                                         <li data-id="17" class="dd-item">

                             <div class="dd-handle dd-nodrag"><?=$sub['category_title']?><span style="float:right"> <a title="" class="btn btn-xs bs-tooltip" href="?mod=edit&id=<?=$sub['category_id']?>&t=sub<?=$page->getQs();?>" data-original-title="Edit">

										   <i class="icon-pencil"></i>

										   </a>

                                           

                                           <a title="" class="btn btn-xs bs-tooltip" href="?mod=trash&id=<?=$sub['category_id']?>&t=sub<?=$page->getQs();?>" data-original-title="Delete">

										   <i class="icon-trash"></i>

										   </a>

                                           </span></div>

                                                </li>

                                            	

											<? } ?>

											

                                            </ol>

										<? } ?>

                                            

                                            

                                        </li>

                                        

                                        <? } ?>

                                        

                                                                           

                                    </ol>

                                </div>

                            </div>

                        </div>

                    </div>

                            

                            </div>

                            

                            

                            

                            

                                

								<div class="row">

								<div class="dataTables_footer clearfix">

									<div class="col-md-6">

										<div class="dataTables_info" id="DataTables_Table_0_info"><? $page->printResultBar();?></div>

									</div>

									<div class="col-md-6">

                                    



										<div class="dataTables_paginate paging_bootstrap">

                                         <?  $page->printNavBar(); ?>

                                        										

										</div>

									</div>

								</div>

							</div>

                            </div>

                        </div>

                    </div>

                </div>

                

            </div>

        </div>

    </div>

  <script type="text/javascript">

  



$(document).ready(function () {

	

    $("#nestable_list_2").nestable({

        group: 1

    });



    

});

  </script>

</body>



</html>