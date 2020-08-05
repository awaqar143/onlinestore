
    $(document).ready(function(){
       
 
        $("#load_more").click(function(){
            event.preventDefault();
            var lastID = $('#load_more').attr('lastID');
            if(lastID != 0){

                jQuery.ajax({
                type:'POST',
                url:"<?php echo base_url() ?>"+"Home/loadMoreData",
                data:{'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>','id':+lastID},
                beforeSend:function(){
                    $('#loader').show();
                },
                success:function(html){
                    $('#load_more').remove();
                    $('.product-list').append(html);

                }
            });
            }
        });
    });

