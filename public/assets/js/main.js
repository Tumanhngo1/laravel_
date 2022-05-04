

$(document).ready(function(){
    $('.add-to-cart').click(function(event){
        event.preventDefault();
       let urlData = $(this).data('id');

    //    alert (url);
        $.ajax({
           type: 'GET',
           url: urlData,
           dataType: 'json',
           success: function(data){
            console.log(data);
            if(data.code === 200){
                alert('them sp thanh cong');
            }
            // $('.ajax-message').html('Thêm sản phẩm vào giỏ hàng thành công')
           },
           error : function(){

           }
        })
    })

    //update
    $('.update').click(function(event){
        event.preventDefault();
        var updateurl = $('.update-cart').data('url');
        // alert(updateurl);
        var id = $(this).data('id');
        var quantity = $(this).parents('tr').find('input').val();
        $.ajax({
            type: "GET",
            url: updateurl,
            data:{
                id: id,
                quantity: quantity  
            },
            success: function(data){
                location.reload(); 
               },
               error : function(){
    
               }
        })
    })
    //delete
    $('.delete').click(function(event){
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
                location.reload(); 
               },
               error : function(){
    
               }
        })
    })
})