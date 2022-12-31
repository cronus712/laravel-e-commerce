// add to cart 
$(document).ready(function() {

    $('.addToCartBtn').click(function(e) {
        e.preventDefault();
        var product_id = $(this).closest('.product_data').find('.prod_id').val();
        var product_quantity = $(this).closest('.product_data').find('.qty-input').val();

        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
         
        $.ajax({
            method: "POST",
            url: "/add-to-cart",
            data : {
                'product_id': product_id,
                'product_quantity' : product_quantity,
            },
            success: function(response) {
                swal(response.status);
            }
        })
      
    });
// increment quantiy button
$('.increment-btn').click(function(e) {
    e.preventDefault();

    var inc_value = $(this).closest('.product_data').find('.qty-input').val();
    var value = parseInt(inc_value, 10);
    value = isNaN(value) ? 0 : value;
    if(value < 10) {
        value++;
        $(this).closest('.product_data').find('.qty-input').val(value);
    }

});

//decrement quantity button
$('.decrement-btn').click(function(e) {
    e.preventDefault();
    var dec_value = $(this).closest('.product_data').find('.qty-input').val();
    var value = parseInt(dec_value, 10);
    value = isNaN(value) ? 0 : value;
    if(value  > 1) {
        value--;
        $(this).closest('.product_data').find('.qty-input').val(value);
    }

});

$('.delete-cart-item').click(function(e) {
    e.preventDefault();


    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

    var product_id = $(this).closest('.product_data').find('.prod_id').val();

    $.ajax({
        method: "POST",
        url: "delete-cart-item",
        data : {
            'product_id': product_id,
        },
        success: function(response) {
            swal({title: "", text: "Item deleted successfully !", type: 
            "success"}).then(function(){ 
               location.reload();
               }
            );

        }
    })
})

$('.changeQuantity').click(function(e) {
    e.preventDefault();
    var product_id = $(this).closest('.product_data').find('.prod_id').val();
    var product_quantity = $(this).closest('.product_data').find('.qty-input').val();

    var product_quantity =  parseInt($('.qty-input').val());
    var data = {
        'product_id' : product_id,
        'product_quantity' : product_quantity,
    }

    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

    $.ajax({
        method: "POST",
        url: "update-cart",
        data : data,
        success:function(response) {
            window.location.reload();
       }
    })
});


});

(function () {
    'use strict'
  
    window.addEventListener('load', function () {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation')
  
      // Loop over them and prevent submission
      Array.prototype.filter.call(forms, function (form) {
        form.addEventListener('submit', function (event) {
          if (form.checkValidity() === false) {
            event.preventDefault()
            event.stopPropagation()
          }
          form.classList.add('was-validated')
        }, false)
      })
    }, false)
  }())

  function loadcart() {
    $.ajax({
        method: "GET",
        url: "/load-cart-data",
    
        success:function(response) {
       }
    })
  }