

$(document).ready(function(){

    $('.add-to-cart').click(function(event){
        event.preventDefault();
       let urlData = $(this).data('id');
    
        $.ajax({
           type: 'GET',
           url: urlData,
        //    dataType: 'html',
           success: function(data){

            $('.view-render').html(data);
            // $( "tr[data-id='"+id+"']" ).html(data);

            // console.log(data);
            // $( "#render" ).append(data);
            // location.reload(); 
            // if(data.code === 200){
                // alert('them sp thanh cong');
            // }
            // $('.ajax-message').html('Thêm sản phẩm vào giỏ hàng thành công')
           },
           error : function(){

           }
        })
    })
    
    //update
    // function TotalCart(){
    //     var total_cart = 0;
    //     $('.total').each(function(){
    //         var price = $(this).attr('total-cart');
    //         total_cart += parseFloat(price) ;
    //         var fomatTotal =  total_cart.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
    //       $('#cart_total').html("<h3>Total: "+fomatTotal+" VND </h3>");
    //     })
    // }
    // $(document).on('click', '.update', function(){
    //     // alert('hihih')
    //     var key = $(this).attr('data');
    //     var qty = $('#qty_' + key).val();
    //     if($(this).hasClass('discount')){
    //         $(this).parents('tr').find('input').val(parseInt(qty) - 1)
    //     }
    //     else if($(this).hasClass('increase')){
    //         $(this).parents('tr').find('input').val(parseInt(qty) + 1)
    //     }
        // $('.update-cart').change();
        // var input= $(this).parents('tr').find("input").val()   
        // var price = $(this).parents('tr').find("#price").attr('price');    
        // var id = $(this).data('id');
        // var total = input * price;
        // if(total <= 0){
        //     $( "tr[data-id='"+id+"']" ).remove();
        // }
    // })
    // $('.update-cart').change(function(){
    //     var input= $(this).val()          
    //     var price = $(this).parents('tr').find("#price").attr('price');               
    //     var total = input * price;      
    //     var price_cart =  $(this).parents('tr').find('.total').attr('total-cart');
    //     price_cart = input * price; 
    //     var fomat = total.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
    //     $(this).parents('tr').find('.total').html(fomat+ " VND");
    //     $(this).parents('tr').find('.total').attr('total-cart',price_cart);
    //     var qty = $(this).attr('value',input);
    //     var id = $(this).parents('tr').find('.update').data('id');
    //     if(qty <= 0){
    //         $( "tr[data-id='"+id+"']" ).remove();
    //     }
    //     TotalCart(true);
    // })
 
    $(document).on('click', '.update', function(){
        // event.preventDefault();
        var key = $(this).attr('data');
        var qty = $('#qty_' + key).val();
        if($(this).hasClass('discount')){
            $(this).parents('tr').find('input').val(parseInt(qty) - 1)
        }
        else if($(this).hasClass('increase')){
            $(this).parents('tr').find('input').val(parseInt(qty) + 1)
        }
        var updateurl = $(this).data('url');
        var id = $(this).data('id');
        var quantity = $(this).parents('tr').find('input').val();
        // alert(quantity);
        $.ajax({
            type: "GET",
            url: updateurl,
            dataType:'html',
            data:{
                id: id,
                quantity: quantity  
            },
            success: function(data){
                $('.view-render').html(data);
                // $( "tr[data-id='"+ id +"']" ).html(data);
               },
               error : function(){
    
               }
        })
    })

    
       
    //delete
    $(document).on('click', '.delete', function(){
        event.preventDefault();
        var deleteUrl = $(this).data('url');
        // alert(deleteUrl);
        var id = $(this).data('id');
        // alert(id);
        $.ajax({
            type: "GET",
            url: deleteUrl,
            data:{
                id: id,
            },
            success: function(data){
                // location.reload();
                $('.view-render').html(data); 
               },
               error : function(){
    
               }
        })
    })
 

    $( ".payment" ).click(function() {
        $( ".pay" ).toggle('slow');
      });
})