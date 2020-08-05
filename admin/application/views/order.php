

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
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
                    <h4>Order</h4>
                </div>
                      <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index-2.html">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Order</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Order</a>
                        </li>
                    </ul>
                </div>
            </div>
           

          <form name="bulk_action_form" action="" method="post" onSubmit="return delete_confirm();"/> 
        
            <!-- Page-header end -->
            <!-- Page-body start -->
            <div class="page-body">
                <!-- DOM/Jquery table start -->

                <div class="card">
                    <div class="tb-buttons">
   

                    <div class="card-block">


          <!--   <div style="margin-bottom:  -50px; margin-left: 500px;" >
                 <a class="btn btn-primary" href='<?php echo base_url(); ?>Product/delete/<?php echo $data['id']; ?>?table=<?php echo base64_encode('product'); ?>' onclick="return confirm('Are you sure to delete data?')?true:false;">Excel</a>
              
  <a class="btn btn-primary" href='<?php echo base_url(); ?>Product/delete/<?php echo $data['id']; ?>?table=<?php echo base64_encode('product'); ?>' onclick="return confirm('Are you sure to delete data?')?true:false;">Print</a>
    
       

<a class="btn btn-danger" name="bulk_delete_submit">Delete</a> -->
<!-- <input type="submit" class="btn btn-danger" name="bulk_delete_submit" value="DELETE"/> -->

 </div>
    </div>
    
                   

                                              
                        <div class="table-responsive dt-responsive">

        

                   <table id="dom-jqry" class="table table-striped table-bordered nowrap">



                                <thead>
                                 
                                    <tr>
                                        <th><input type="checkbox" id="select_all" value=""/></th>     
                                        <th>Order ID</th>
                                        <th>Name</th>
                                        <th>Phone#</th>
                                        <th>G.Total</th>
                                        <th>Product</th>
                                        <th>status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php foreach($results as $result) { ?>
                                   
                                 <tr>
                                     
                                        <td align="center"><input type="checkbox" name="checked_id[]" class="checkbox" value="<?php echo $result['id']; ?>"/></td>        
                                        <td><?php echo $result['id'] ?><?php if ($result['status']=='') {?>
                                            
                                        <sup style="color: red">New</sup><?php }?></td>
                                        <td><a href=""><?php echo $result['name']; ?></a></td>
                                        <td><?php echo $result['phone']; ?></td>


                                    
                                       
                                    
                                        <td><?php echo $result['grand_total']; ?></td>

                                       <td>
                                       
                                
                                       
                                         
                                   <!--  -->
                                 <?php foreach ($result['order_items'] as  $items) { ?>
                                 
                                     
                                          
                                          <li> <?php echo $items['product_title']; ?>     (<?php echo $items['quantity']?>x <?php echo $items['sub_total']?>) </li>
                                                

                                     <?php } ?>        
                                            
                                           </td>
                                          
                                   
                                        <td>
                                                <?php if($result['status'] == ''){ ?>
                                               <a class="badge badge-warning" href='<?php echo base_url(); ?>Category/enable/<?php echo $data['id']; ?>?table=<?php echo base64_encode('product'); ?>'>Pending</a>


                                                <?php } elseif ($result['status']=='0') {
                                                    # code...
                                                ?> 
                                                <a class="badge badge-danger" href='<?php echo base_url(); ?>Category/disable/<?php echo $data['id']; ?>?table=<?php echo base64_encode('product'); ?>'>Canceled</a>
                                                

                                                 <?php  } elseif($result['status']=='1') { ?> 
                                                <a class="badge badge-info" href='<?php echo base_url(); ?>Category/disable/<?php echo $data['id']; ?>?table=<?php echo base64_encode('product'); ?>'>Shiffed</a>
                                                
                                                 <?php } else{ ?>

                                                     <a class="badge badge-success" href='<?php echo base_url(); ?>Category/disable/<?php echo $data['id']; ?>?table=<?php echo base64_encode('product'); ?>'>Delivered</a>
                                                 <?php } ?>

                                            </td>
                                            <td>
                                                <a class="label label-inverse-info" href='<?php echo base_url(); ?>order/view/<?php echo $result['id']; ?>'>View</a>

                                                <a class="label label-inverse-primary" href='<?php echo base_url(); ?>order/update/<?php echo $result['id']; ?>'>Edit</a>


                                                <!-- <a class="label label-inverse-danger delete" href='<?php echo base_url(); ?>order/delete/<?php echo $result['id']; ?>?table=<?php echo base64_encode('product'); ?>' onclick="return confirm('Are you sure to delete data?')?true:false;">Delete</a>
 -->
                                                    <a class="label label-inverse-danger delete" href='<?php echo base_url(); ?>order/delete/<?php echo $result['id']; ?>' onclick="return confirm('Are you sure to delete data?')?true:false;">Delete</a>
                                            
                                            
                                        </td>
                                    </tr>
                                

                                <!-- <div class="paginate-link">
                                    <?php //echo $this->pagination->create_links(); ?>
                                </div>  -->
                            <?php } ?>


                                 </tbody>
                            </table>
                        </form>
                        </div>
                    </div>

                </div>
                <!-- DOM/Jquery table end -->
            </div>
<script>
function delete_confirm(){
    if($('.checkbox:checked').length > 0){
        var result = confirm("Are you sure to delete selected users?");
        if(result){
            return true;
        }else{
            return false;
        }
    }else{
        alert('Select at least 1 record to delete.');
        return false;
    }
}

$(document).ready(function(){
    $('#select_all').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
            });
        }
    });
    
    $('.checkbox').on('click',function(){
        if($('.checkbox:checked').length == $('.checkbox').length){
            $('#select_all').prop('checked',true);
        }else{
            $('#select_all').prop('checked',false);
        }
    });
});
</script>