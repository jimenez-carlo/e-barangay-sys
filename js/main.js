
var MessageServerError = '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <h4><i class="icon fa fa-ban"></i> Oops Something Went Wrong!</h4>Server Connection Error! </div>';
var MessageFieldRequired = "<i class='fa fa-exclamation-triangle' aria-hidden='true'></i> Please Enter Missing Fields.";
var MessagePasswordNotMatch = "<i class='fa fa-exclamation-triangle' aria-hidden='true'></i> Password Does Not Match.";

function clearErrors() {
  // Remove all error css
  $('form>.alert-danger').hide();
  $(".is-invalid").removeClass("is-invalid");
}

function errorFields(strings) {
  $.each(strings.split(","), function (i,word) {
    var field = $("#" + word);
      if (!$(field).hasClass("is-invalid")) {
        $(field).addClass("is-invalid");
      }
  });
}

function requireFields(strings) {
  var errors = 0;
  $.each(strings.split(","), function (i,word) {
    var field = $("#" + word);
    if (field.val() == "" || field.val() == null || field.val().length == 0) {
      if (!$(field).hasClass("is-invalid")) {
        $(field).addClass("is-invalid");
      }
      errors++;
    }
  });
  return (errors == 0) ? true : false;
}


$(document).on("click", '.a-view', function () {  
  var page = $(this).attr('name');
  var id = $(this).attr('value');
  window.open(base_url + "?page=" + page + "&id=" + id, '_blank');
});


$(document).on("click", '.btn-edit, .btn-view', function () {
  let ele = $(this);
  let icon = ele.children('i');
  
  let current_icon = icon.attr('class'); // current icon
  
  ele.attr('disabled');
  
  icon.removeClass();
  icon.addClass('fa fa-spinner fa-pulse fa-fw');
  
  let page = ele.attr('name');
  let id = (ele.attr('value')) ? ele.attr('value') : 0;
  
  $(".result").html('');
  $("#content").load(base_url + '/page.php?page=' + page + '&id=' + id,
     (response, status, xhr) => {
      if (status == "error") {
        $('.result').html(MessageServerError);  
      }
        ele.removeAttr('disabled');
        icon.removeClass();
        icon.addClass(current_icon);
    }
  );
});

$(document).on("submit", 'form', function (e) {
  e.preventDefault();
  clearErrors();
  var form_raw = this;
  var form_name = this.name;
  var type = e.originalEvent.submitter.name;
  var type_value = e.originalEvent.submitter.value;
  if (this.name == 'logout') {
    window.location.href = base_url+'module/logout.php';
  }
  
  formdata = new FormData(this);
  console.log(form_name);
  formdata.append('form', form_name);
  formdata.append(type, type_value);

  $.ajax({
    method: "POST",
    url: base_url + "module/request.php",
    data: formdata,
    processData: false,
    contentType: false,
    success: function (res) {
      var result = JSON.parse(res);
      $('.result').html(result.result);
      if (result.status == true) {
        $(form_raw).trigger('reset');
      }
      if (result.status == true) {
       if (form_name == 'update_user' && type_value == 'delete') {
         $( "#content" ).load( base_url+'module/page.php?page=users' );
       }
       if (form_name == 'remove_from_cart' || form_name == 'update_cart' || form_name == 'checkout_cart') {
         $( "#content" ).load( base_url+'module/page.php?page=cart' );
       }
       if (form_name == 'update_transaction') {
         $( "#content" ).load( base_url+'module/page.php?page=customer_orders' );
       }
       if (form_name == 'add_product') {
         $('#preview').attr('src','images/products/default.png');
       }
       if (form_name == 'update_product' && type_value == 'delete') {
         $( "#content" ).load( base_url+'module/page.php?page=products' );
       }
       if (form_name == 'update_product' && type_value == 're_stock_list') {
         $( "#content" ).load( base_url+'module/page.php?page=inventory' );
       }
       if (form_name == 'update_product' && type_value == 're_stock') {
         $( "#content" ).load( base_url+'module/page.php?page=inventory_edit&id='+formdata.get('product_id') );
       }
      }
      if (result.items != '') {
        errorFields(result.items);
      }
    }
  });
});




