<script src="<?php echo base_url();?>assets/bootbox/bootbox.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/redmond/jquery-ui.css">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.js"></script>
<div class="page-container">
    <div class="page-sidebar-wrapper">
        <?php $this->load->view('template/sidebar.php');?>
    </div>
    <div class="page-content-wrapper">
        <div class="page-content">
            <div id="passmaterror"></div>

            <div class="row">
                <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light portlet-fit ">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-settings font-red"></i>
                                <span class="caption-subject font-red sbold uppercase">Visits and Appointments</span>
                            </div>
                           
                            <div class="portlet-body">
                                <div class="table-toolbar">
                                    
                                </div>
                               
                                <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center"> Concern Person </th>
                                            <th style="text-align:center"> Purpose </th>
                                            <th style="text-align:center"> Date</th>
                                            <th style="text-align:center"> Location </th>
                                            <th style="text-align:center"> Edit </th>
                                            <th style="text-align:center"> Delete </th>



                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                            <?php foreach($visit_list as $row)
                                            {
                                            ?>
                                            <tr>

                                                <td  align="center"><?php echo $row['person'];?></td>
                                                <td  align="center"><?php echo $row['purpose'];?></td>
                                                <td  align="center"><?php echo $row['meeting_date'];?></td>
                                                <td  align="center"><?php echo $row['location'];?></td>
                                               <td align="center">
                                                            <button type="button" data-id="<?php echo $row['id'];?>" class="btn btn-primary update" data-toggle="modal" data-target="#myModal">Edit</button>
                                                        </td>
                                                <td  align="center">
                                                    <button type="button" data-id="<?php echo $row['id'];?>" class="btn btn-danger remove">Delete</button>
                                                </td>
                                            </tr>
                                            <?php }?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                               
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</div>
<div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                    <div id="passmaterror1"></div>
                <div class="portlet light bordered">        
                  <div class="portlet-title">
                    <span class="caption-subject font-green-sharp bold uppercase">Update your Visits</span>
                  </div>
                  <form method="post" class="form-horizontal">
                                                        <!-- TASK HEAD -->
                                                        <div class="form">
                                                           
                                                            <!-- END TASK HEAD -->
                                                            <!-- TASK TITLE -->
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control todo-taskbody-tasktitle" placeholder="Person to Meet/Place to visit" name="person" id="appointment"> </div>
                                                                    <p id="appointmenterr" style="color: red;"></p>
                                                                    <input type="hidden" id="visitids" name="custId" value="">
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
                                                                        <input name="meeting_date"id="txtstartdate"class="form-control todo-taskbody-due" placeholder="Date"> </div>
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
                          <button type="button" id="updateVisit"  class="btn btn-circle btn-sm green">Save Changes</button>
                          <button class="btn btn-circle btn-sm btn-default" data-dismiss="modal">Cancel</button>
                      </div>
                                                        
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


<!-- display calendar in date field -->
<script type="text/javascript">
    $("#txtstartdate").datepicker({
  minDate: 0,
  onSelect: function(date) {
    $("#txtenddate").datepicker('option', 'minDate', date);
  }
});

$("#txtenddate").datepicker({});
</script>


<!-- delete visit -->
<script type="text/javascript">
    $(".remove").click(function(){
        var id = $(this).attr("data-id");

    bootbox.confirm("Are you sure? " , function(output) {
           if(output == true){
               $.ajax({
                       url :  "<?php echo base_url();?>/User/visitDelete",
                       type:  "POST",
                       data:  {id: id},
                       success :function(output){
                        if($.trim(output)==true){
                            $('#passmaterror').html("<div class='alert alert-success alert-dismissable'>Visit has been Deleted successfully.</div>"); 
                            $('#passmaterror').fadeIn().delay(2000).fadeOut(2000);
                            setTimeout("location.reload();",2000);
    
                        }
    
                       }
                    });
              
           }
          });
       });
</script>


<!--  to show existing data in the modal box -->
<script type="text/javascript">
    $(".update").click(function(){
        var id = $(this).attr("data-id");          
               $.ajax({
                       url :  "<?php echo base_url();?>/User/Visitedit",
                       type:  "POST",
                       data:  {id: id},
                       dataType:'json',
                       success :function(output){
                        $('#visitids').val(output[0].id);
                        $('#appointment').val(output[0].person);
                        $('#appointmentpurpose').val(output[0].purpose);
                        $('#txtstartdate').val(output[0].meeting_date);
                        $('#locationid').val(output[0].location);
                          
                       }
                    });
              
           
         });
      
   
</script>
<!-- validating and inserting data from modal box -->

<script type="text/javascript">
   $("#updateVisit").click(function()
   {
       var person = $("#appointment").val();
       var id = $("#visitids").val();
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
               url :'<?php echo base_url();?>User/Visitupdate',
               type :'POST',
               data : {person: person, purpose: purpose,date: date,location: location,id:id},
               success :function(output){
                 if(output == 1) {
                       $('#passmaterror1').html("<div class='alert alert-success alert-dismissable'>Visit has been Updated successfully.</div>"); 
                       $('#passmaterror1').fadeIn().delay(2000).fadeOut(2000);
                       setTimeout("location.reload();",2000);
                   }
               }
           });
       }


   });   


</script>