<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/redmond/jquery-ui.css">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.js"></script>

<div class="page-container">
    <div class="page-sidebar-wrapper">
        <?php $this->load->view('template/sidebar.php');?>
    </div>
    <div class="page-content-wrapper">
        <div class="page-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="full-height-content full-height-content-scrollable">
                                <div class="full-height-content-body">
                                    <div class="todo-content">
                                            <div id="passmaterror"></div>
                                    <div class="portlet light bordered">
                                        <!-- PROJECT HEAD -->
                                        <div class="portlet-title">
                                            <span class="caption-subject font-green-sharp bold uppercase">Meet Up/Visit Dashboard</span>
                                        </div>
                                            
                                         <div class="portlet-body">

                                                <div class="todo-tasklist-devider"> </div>
                                                
                                                    <form method="post" class="form-horizontal">
                                                        <!-- TASK HEAD -->
                                                        <div class="form">
                                                           
                                                            <!-- END TASK HEAD -->
                                                            <!-- TASK TITLE -->
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control todo-taskbody-tasktitle" placeholder="Person to Meet/Place to visit" name="person" id="appointment"> </div>
                                                                    <p id="appointmenterr" style="color: red;"></p>
                                                            </div>
                                                            <!-- TASK DESC -->
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <textarea class="form-control todo-taskbody-taskdesc" rows="8" placeholder="Purpose of Meet/Visit" name= "purpose" id="appointmentpurpose"></textarea>
                                                                    <p id="appointmentpurposeerr" style="color: red;"></p>
                                                                </div>
                                                            </div>
                                                            <!-- END TASK DESC -->
                                                            <!-- TASK DUE DATE -->
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <div class="input-icon">
                                                                        <i class="fa fa-calendar"></i>
                                                                        <input id="txtstartdate"class="form-control todo-taskbody-due" placeholder="Date"> </div>
                                                                        <p id="appointmentdateerr" style="color: red;"></p>
                                                                </div>
                                                            </div>
                                                            <div class = "form-group">
                                                                <div class ="col-md-12">
                                                                    
                                                                    <div class="input-icon">
                                                                        <i class="fa fa-location-arrow"></i>
                                                                        <input type="text" id="locationid" class= "form-control "placeholder="Location" name="location">
                                                                        <p id="locationiderr" style="color: red;"></p>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>

                                                            <!-- TASK TAGS -->
                                                            
                                                            
                                                            <div class="form-actions right todo-form-actions">
                                                                <button type="button" id="submitVisit" class="btn btn-circle btn-sm green">Save Changes</button>
                                                                <button class="btn btn-circle btn-sm btn-default">Cancel</button>
                                                            </div>
                                                        
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END TODO CONTENT -->
                            </div>
                        </div>
                        <!-- END PAGE CONTENT-->
                    </div>
                    <!-- END PAGE BASE CONTENT -->
                </div>
                <!-- BEGIN FOOTER -->
                
                                    
                <!-- END CONTENT BODY -->
            </div>
          
        </div>


<!-- to display calendar -->
<script type="text/javascript">
    $("#txtstartdate").datepicker({
  minDate: 0,
  onSelect: function(date) {
    $("#txtenddate").datepicker('option', 'minDate', date);
  }
});

$("#txtenddate").datepicker({});
</script>



<!-- validating and inserting data -->
<script type="text/javascript">
   $("#submitVisit").click(function()
   {
       var person = $("#appointment").val();
       var purpose = $("#appointmentpurpose").val();
       var date = $("#txtstartdate").val();
       var location = $("#locationid").val();
       var s ='';
      
       if (person=="") 
       {
            $("#appointmenterr").html("Appointment is empty");
            s=1;
       }
       else
       {
            $("#appointmenterr").html("");
       }

       if (purpose=="")
       {
            $("#appointmentpurposeerr").html("Purpose of meeting is Empty");
            s=1;
       }
       else
       {
            $("#appointmentpurposeerr").html("");
       }
         if (date=="")
       {
            $("#appointmentdateerr").html("Date is Empty");
            s=1;
       }
       else
       {
            $("#appointmentdateerr").html("");
       }
         if (location=="")
       {
            $("#locationiderr").html("Location is Empty");
            s=1;
       }
       else
       {
            $("#locationiderr").html("");
       }

       if (s!=1) {
        $.ajax({
               url :'<?php echo base_url();?>User/insertVisit',
               type :'POST',
               data : {person: person, purpose: purpose,date: date,location: location},
               success :function(output){
                 if($.trim(output) == 1) {
                       $('#passmaterror').html("<div class='alert alert-success alert-dismissable'>Visit has been added successfully.</div>"); 
                       $('#passmaterror').fadeIn().delay(2000).fadeOut(2000);
                       setTimeout("location.reload();",2000);
                   }
               }
           });
       }


   });   


</script>
        