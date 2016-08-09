<?php
//Controllers/user.php

public function search_user($search="")
{
    $search = $this->input->post('search');
    $this->load->model('user_model');
    $search = str_replace('%20', " ", $search);
    echo $this->user_model->search_user_db($search);
}

//Models/user_model.php
public function search_user_db($search=""){
    $q = $this->db->query("SELECT * FROM user_table LIKE column1= '$search%' ");
    if($q->num_rows() > 0){
        return json_encode($q->result(), true);
    }else {
        return json_encode($q->result(), true);
    }
}

<script>
   $(document).ready(function(){
                    $("#search").keyup(function(){
                       // event.preventDefault(); // Stop form from submitting normally
                        if($("#search").val().length>0) {
                            var search_str = $(this).val();
                         //   console.log(search_str);
                            $.ajax({
                                type: "post",
                                url: "http://dashboard.decisionaid.systems/admin_user/search_user_profile/", //+ search_str
                                cache: false,
                                data:'search='+$("#search").val(),
                                success: mySearch
                            });
                        };
                    });


                    var mySearch = function(data){
                 var data = $.parseJSON(data);
                 var total_data = data.length;
                 var tabledata = $('#table-data');
                 var a = document.createElement('a');
                 var html = []; // array
                 for(var i = 0; i < total_data; i++){
                     var d = data[i];
                     html.push('<tr>');
                     html.push('<td>'+ d.total_users + '</td>');
                     html.push('<td>' + ('<a href="' + "/search_user/" + d.id +'">'+d.id+'</a>') + '</td>');
                     html.push('<td>' + d.name + '</td>');
                     html.push('<td>' + d.email + '</td>');
                     html.push('</tr>');
                 }
                 tabledata.html(html.join(""));
             }
          });
  </script>

  // Bootstrap CSS Framework

  <div class="table-responsive table-bordered">
                    <table class="table table-striped" >
                        <thead>
                        <tr>
                            <th><h4>total_user</h4></th>
                            <th><h4>ID</h4></th>
                            <th><h4>Name</h4></th>
                            <th><h4>Email</h4></th>
                        </tr>
                        </thead>
                        <tbody id="table-data">

                        <?php foreach($user-> result() as $result){
                            echo "<tr>"
                                ."<td>$result->totalStations</td>"
                                ."<td><a href='".site_url('admin_user/userStations')."/$result->id'>$us->$id</a></td>"
                                ."<td>$result->full_name</td>"
                                ."<td>$result->email</td>"
                                ."</tr>";
                        } ?>
                        </tbody>
                    </table>
                    </div>
                </div>

// Search input
<div class="container-fluid">
        <div class="row">
            <form>
                <div class="col-lg-12">
            <div class="input-group custom-search-form">
                <input type="text" id="search" name="search" class="form-control" placeholder="Search Users">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
                </div>
            </form>
        </div>
</div>
  
