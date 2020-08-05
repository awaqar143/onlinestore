     <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/assets/pages/data-table/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/bower_components/ekko-lightbox/dist/ekko-lightbox.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/bower_components/lightbox2/dist/css/lightbox.css">

<script type="text/javascript">
 $(document).ready(function(){
        $(".delete").click(function(e){ alert('as');
            $this  = $(this);
            e.preventDefault();
            var url = $(this).attr("href");
            $.get(url, function(r){
                if(r.success){
                    $this.closest("tr").remove();
                }
            })
        });
    });
$(document).ready(function(){
        $(".enable").click(function(e){ alert('as');
            $this  = $(this);
            e.preventDefault();
            var url = $(this).attr("href");
            $.get(url, function(r){
                if(r.success){
                    $this.closest("tr").remove();
                }
            })
        });
    });
$(document).ready(function(){
        $(".desable").click(function(e){ alert('as');
            $this  = $(this);
            e.preventDefault();
            var url = $(this).attr("href");
            $.get(url, function(r){
                if(r.success){
                    $this.closest("tr").remove();
                }
            })
        });
    });
</script>



            <div class="page-header">
                <div class="page-header-title">
                    <h4>List Product</h4>
                </div>
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index-2.html">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Users</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">List Users</a>
                        </li>
                    </ul>
                </div>
            </div>
           
            <!-- Page-header end -->
            <!-- Page-body start -->
            <div class="page-body">
                <!-- DOM/Jquery table start -->

                <div class="card">
                    <div class="card-block">
                        <div class="table-responsive dt-responsive">
                            <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>img</th>
                                        <th>Name</th>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($res as $res) : ?>
                                 <tr>
                                         <td>
                                            <?php if(!empty($res['image'])) { ?>
                                            <img width="30px;" src="<?php echo site_url();?>uploads/userimage/<?php echo $res['image']; ?> ">
                                            <?php }  else {?>
                                                <img width="30px;" src="<?php echo site_url();?>uploads/userimage/noimage.png ?> ">
                                                <?php }?>

                                        </td>
                                        <td><a href=""><?php echo $res['name']; ?></a></td>
                                        <td><?php echo $res['user_name']; ?></td>
                                        <td><?php echo $res['email']; ?></td>
                                         <td><?php echo $res['mobile']; ?></td>


                                     <td><?php if($res['status'] == 1) { echo 'active'; }else{ echo 'Inactive' ; } ?></td>
                                    
                                            <td>
                                                
                                                <?php if($res['status'] == 1){ ?>
                                               <a class="label label-inverse-success" href='<?php echo base_url(); ?>user/enable/<?php echo $res['id']; ?>?table=<?php echo base64_encode('product'); ?>'>UNBLOCK</a>


                                                <?php }else{ ?> 
                                                <a class="label label-inverse-danger" href='<?php echo base_url(); ?>user/disable/<?php echo $res['id']; ?>?table=<?php echo base64_encode('product'); ?>'>BLOCK</a>
                                                <?php } ?>
                                            

                                               <!--  <a class="label label-inverse-info" href='<?php echo base_url(); ?>Product/update/<?php echo $data['id']; ?>'>Edit</a>
 -->

                                                <a class="label label-inverse-danger delete" href='<?php echo base_url(); ?>user/delete/<?php echo $res['id']; ?>?table=<?php echo base64_encode('product'); ?>' onclick="return confirm('Are you sure to delete data?')?true:false;">Delete</a>
                                
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                                <!-- <div class="paginate-link">
                                    <?php //echo $this->pagination->create_links(); ?>
                                </div>  -->

                                 </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- DOM/Jquery table end -->
            </div>

  