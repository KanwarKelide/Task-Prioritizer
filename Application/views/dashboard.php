<div class="page-container">
    <div class="page-sidebar-wrapper">
        <?php $this->load->view('template/sidebar.php');?>
    </div>

    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <span class="caption-subject font-green-sharp bold uppercase">STATUS</span>
                        
                            <div class="portlet-body">
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <span class="dashboard-stat dashboard-stat-v2 blue-chambray isDisabled">
                                        <div class="visual">
                                            <i class="fa fa-minus-circle"></i>
                                        </div>
                                        <div class="details">
                                            <div class="number">
                                                <span data-value="<?php echo $showStatusPending;?>"><?php echo $showStatusPending;?></span>
                                            </div>
                                            <div class="desc" id="pending"> Pending </div>
                                        </div>
                                    </span>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <span class="dashboard-stat dashboard-stat-v2 blue-dark">
                                    <div class="visual">
                                        <i class="fa fa-bar-chart-o"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span data-value="<?php echo $showStatusOnGoing;?>"><?php echo $showStatusOnGoing;?></span> 
                                        </div>
                                        <div class="desc"> On Going </div>
                                    </div>
                                </span>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <span class="dashboard-stat dashboard-stat-v2 blue-soft">
                                    <div class="visual">
                                        <i class="fa fa-check-square-o"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span data-value="<?php echo $showStatusCompleted;?>"><?php echo $showStatusCompleted;?></span>
                                        </div>
                                        <div class="desc"> Completed </div>
                                    </div>
                                </span>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <span class="dashboard-stat dashboard-stat-v2 green">
                                    <div class="visual">
                                        <i class="fa fa-thumbs-up"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number"> 
                                            <span data-value="<?php echo $showStatusDelivered;?>"><?php echo $showStatusDelivered;?></span>
                                        </div>
                                        <div class="desc"> Delivered </div>
                                    </div>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-md-12">
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <span class="caption-subject font-green-sharp bold uppercase">TAgs</span>
                        
                        <div class="portlet-body">
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <span class="dashboard-stat dashboard-stat-v2 red-thunderbird">
                                    <div class="visual">
                                        <i class="fa fa-exclamation-triangle"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number"> 
                                            <span data-value="<?php echo $showTagUrgent;?>"><?php echo $showTagUrgent;?></span>
                                        </div>
                                        <div class="desc"> Urgent </div>
                                    </div>
                                </span>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <span class="dashboard-stat dashboard-stat-v2 yellow-gold">
                                    <div class="visual">
                                        <i class="glyphicon glyphicon-pushpin"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number"> 
                                            <span data-value="<?php echo $showTagVeryImportant;?>"><?php echo $showTagVeryImportant;?></span>
                                        </div>
                                        <div class="desc"> Very Important </div>
                                    </div>
                                </span>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <span class="dashboard-stat dashboard-stat-v2 yellow-soft">
                                    <div class="visual">
                                        <i class="glyphicon glyphicon-asterisk"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number"> 
                                            <span data-value="<?php echo $showTagImportant;?>"><?php echo $showTagImportant;?></span>
                                        </div>
                                        <div class="desc"> Important </div>
                                    </div>
                                </span>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <span class="dashboard-stat dashboard-stat-v2 green-seagreen">
                                    <div class="visual">
                                        <i class="fa fa-ban"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number"> 
                                            <span data-value="<?php echo $showTagIgnorant;?>"><?php echo $showTagIgnorant;?></span>
                                        </div>
                                        <div class="desc"> Ignorant </div>
                                    </div>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


