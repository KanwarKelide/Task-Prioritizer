<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/redmond/jquery-ui.css">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.js"></script>
<div class="page-container">
    <div class="page-sidebar-wrapper">
        <?php $this->load->view('template/sidebar.php');?>
    </div>
    <img src="<?php base_url();?>">
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="pull-right">
                <br>
            </div>
            <div class="row">
               
                    <div class="col-md-12">
                      <div id="passmaterror"></div>
                        <div class="portlet light bordered">
                          
                            <div class="portlet-title">
                                <span class="caption-subject font-green-sharp bold uppercase">Add your tasks</span>
                            </div>
                            <!-- <div class="portlet-body"> -->

                                        <form method="post" class="form-horizontal">
                                            <!-- TASK HEAD -->
                                            <div class="form">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <input type="text" class="form-control todo-taskbody-tasktitle" placeholder="Task Title..."name="task_title" id="titletask">
                                                        <p id="titletaskerr" style="color: red;"></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <textarea class="form-control todo-taskbody-taskdesc" rows="8" placeholder="Task Description..."name="task_desc" id="desctask"></textarea>
                                                        <p id="desctaskerr" style="color: red;"></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <div class="input-icon">
                                                            <i class="fa fa-calendar"></i>
                                                            <input class="form-control todo-taskbody-due" placeholder="Date" name = "due_date" id="txtstartdate" > </div>
                                                            <p id="datedueerr" style="color: red;"></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <select class="form-control todo-taskbody-tags" placeholder="Status" name="status" id="task_status">
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
                                                    <button type="button" id="submitTask" class="btn btn-circle btn-sm green">Save Changes</button>
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
        </div>
    </div>
</div>


<script type="text/javascript">
    $("#txtstartdate").datepicker({
  minDate: 0,
  onSelect: function(date) {
    $("#txtenddate").datepicker('option', 'minDate', date);
  }
});

$("#txtenddate").datepicker({});
</script>
<script type="text/javascript">
   $("#submitTask").click(function()
   {
       var task_title = $("#titletask").val();
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
               url :'<?php echo base_url();?>User/insertTask',
               type :'POST',
               data : {task_title: task_title, task_desc: task_desc, due_date: due_date, status: status, tags: tags},
               success :function(output){
                 if($.trim(output) == 1) {
                       $('#passmaterror').html("<div class='alert alert-success alert-dismissable'>Task has been added successfully.</div>"); 
                       $('#passmaterror').fadeIn().delay(2000).fadeOut(2000);
                       setTimeout("location.reload();",2000);
                   }
               }
           });
       }


   });   
</script>

