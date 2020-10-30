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
                                            <span class="caption-subject font-red sbold uppercase">Tasks at a Glance</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-toolbar">
                                          
                                        </div>
                                        <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                            <thead>
                                                <tr>
                                                    <th style="text-align:center"> Task Title </th>
                                                    <th style="text-align:center"> Task Description </th>
                                                    <th style="text-align:center"> Deadline </th>
                                                    <th style="text-align:center"> Status </th>
                                                    <th style="text-align:center"> Tags </th>
                                                    <th style="text-align:center"> Edit </th>
                                                    <th style="text-align:center"> Delete </th>
                                                    

                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    <?php foreach($task_list as $row)
                                                    {
                                                    ?>
                                                    <tr>
                                                        <td align="center"><?php echo $row['task_title'];?></td>
                                                        <td align="center"><?php echo $row['task_desc'];?></td>
                                                        <td align="center"><?php echo $row['duedate'];?></td>
                                                        <td align="center"><?php echo $row['status'];?></td>
                                                        <td align="center"><?php echo $row['tags'];?></td>
                                                        <td align="center">
                                                            <button type="button" data-id="<?php echo $row['id'];?>" class="btn btn-primary update" data-toggle="modal" data-target="#myModal">Edit</button>
                                                        </td>
                                                        <td align="center">
                                                            <button type="button" data-id="<?php echo $row['id'];?>" class="btn btn-danger remove">Delete</button>
                                                        </td>
                                                        
                                                    </tr>
                                                    <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
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
                    <span class="caption-subject font-green-sharp bold uppercase">Update your tasks</span>
                  </div>
                  <form method="post" class="form-horizontal">
                    <div class="form">
                      <div class="form-group">
                          <div class="col-md-12">
                              <input type="text" value="" class="form-control todo-taskbody-tasktitle"  name="task_title" id="titletask">
                              <p id="titletaskerr" style="color: red;"></p>
                                <input type="hidden" id="taskids" name="custId" value="">

                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-md-12">
                              <textarea class="form-control todo-taskbody-taskdesc" rows="2"  placeholder="Task Description..." name="task_desc" id="desctask"></textarea>
                              <p id="desctaskerr" style="color: red;"></p>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-md-12">
                              <div class="input-icon">
                                  <i class="fa fa-calendar"></i>
                                  <input class="form-control todo-taskbody-due" placeholder="Date" name = "due_date"  id="txtstartdate"> 
                              </div>
                              <p id="datedueerr" style="color: red;"></p>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-md-12">
                              <select class="form-control todo-taskbody-tags" placeholder="Status" name="status"  id="task_status">
                                  <option value="Pending">Pending</option>
                                  <option value="On Going">On Going</option>
                                  <option value="Completed">Completed</option>
                                  <option value="Delivered">Delivered</option>
                              </select>
                              <p id="statuserr" style="color: red;"></p>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-md-12">
                              <select class="form-control todo-taskbody-tags" placeholder="Tags" name="tags"  id="task_tags">
                                  <option value="Urgent">Urgent</option>
                                  <option value="Very Important">Very Important</option>
                                  <option value="Important">Important</option>
                                  <option value="Ignorant">Ignorant</option>
                              </select>
                              <p id="tagserr" style="color: red;"></p>
                          </div>
                      </div>
                      <div class="form-actions right todo-form-actions">
                          <button type="button" id="updateTask"  class="btn btn-circle btn-sm green">Save Changes</button>
                          <button class="btn btn-circle btn-sm btn-default" data-dismiss="modal">Cancel</button>
                      </div>
                    </div>
                  </form>
                </div>
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





<!-- Delete function  -->
<script type="text/javascript">
    $(".remove").click(function()
    {
        var id = $(this).attr("data-id");

    bootbox.confirm("Are you sure?" , function(output) 
    {
           if(output == true)
           {
               $.ajax({
                       url :  "<?php echo base_url();?>/User/taskDelete",
                       type:  "POST",
                       data:  {id: id},
                       success :function(output)
                       {
                          if($.trim(output)==true)
                            {
                              $('#passmaterror').html("<div class='alert alert-success alert-dismissable'>Task has been Deleted successfully.</div>"); 
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
                       url :  "<?php echo base_url();?>/User/Taskedit",
                       type:  "POST",
                       data:  {id: id},
                       dataType:'json',
                       success :function(output){
                        $('#taskids').val(output[0].id);
                        $('#titletask').val(output[0].task_title);
                        $('#desctask').val(output[0].task_desc);
                        $('#txtstartdate').val(output[0].duedate);
                        $('#task_status').val(output[0].status);
                        $('#task_tags').val(output[0].tags);
                          
                       }
                    });
              
           
         });
      
   
</script>


<!-- to edit and insert the new data from modal box -->


<script type="text/javascript">
   $("#updateTask").click(function()
   {
       
       var task_title = $("#titletask").val();
       var id = $("#taskids").val();
       var task_desc  = $("#desctask").val();
       var due_date   = $("#txtstartdate").val();
       var status     = $("#task_status").val();
       var tags       = $("#task_tags").val();
       var s ='';
       

       if (task_title=="") 
       {
            $("#titletaskerr").html("Title is empty");
            s=1;
       }
       else
       {
            $("#titletaskerr").html("");
       }

       
      
       if (task_desc=="")
       {
            $("#desctaskerr").html("Task Description is Empty");
            s=1;
       }
       else
       {
            $("#desctaskerr").html("");
       }




       if (due_date=="")
       {
            $("#datedueerr").html("Date is Empty");
            s=1;
       }
       else
       {
            $("#datedueerr").html("");
       }




        if (status=="") 
       {
            $("#statuserr").html("Status is empty");
            s=1;
       }
       else
       {
            $("#statuserr").html("");
       }




        if (tags=="") 
       {
            $("#tagserr").html("Tags is empty");
            s=1;
       }
       else
       {
            $("#tagserr").html("");
       }





       if (s!=1) {
        $.ajax({
               url :'<?php echo base_url();?>User/Taskupdate',
               type :'POST',
               data : {task_title: task_title, task_desc: task_desc, due_date: due_date, status: status, tags: tags,id:id},
               success :function(output){
                 if(output == 1) {
                       $('#passmaterror1').html("<div class='alert alert-success alert-dismissable'>Task has been Updated successfully.</div>"); 
                       $('#passmaterror1').fadeIn().delay(2000).fadeOut(2000);
                       setTimeout("location.reload();",2000);
                   }
               }
           });
       }


   });   
</script>
