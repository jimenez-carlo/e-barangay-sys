
const MessageServerError = '<div class="alert alert-sm alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-warning"></i> <strong>Server Connection Error</strong> Oops Something Went Wrong! </div ></div>';
const MessageFieldRequired = '<div class="alert alert-sm alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-warning"></i> <strong>System Error!</strong> Please Enter Missing Fields! </div ></div>';
const MessagePasswordNotMatch = '<div class="alert alert-sm alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-warning"></i> <strong>System Error!</strong> Password Doest Not Match! </div ></div>.';
const ContentLoading = '<section class="content-header"><h1><i class="fa fa-refresh fa-spin fa-fw"></i> Loading Content<small>Please wait...</small> </h1> </section>';

function clearErrors() {
  // Remove all error css
  $('form>.alert-danger').hide();
  $(".has-error").removeClass("has-error");
}

function errorFields(strings) {
  $.each(strings.split(","), function (i,word) {
    var field = $('[name="'+word+'"]');
      if (!$(field).parent().hasClass("has-error")) {
        $(field).parent().addClass("has-error");
      }
  });
}

function requireFields(strings) {
  var errors = 0;
  $.each(strings.split(","), function (i,word) {
    var field = $('[name="'+word+'"]');
    if (field.val() == "" || field.val() == null || field.val().length == 0) {
      if (!$(field).parent().hasClass("has-error")) {
        $(field).parent().addClass("has-error");
        errors++;
      }
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
  
  $("#result").html('');
  $("#content").html(ContentLoading);
  
  $("#content").load(base_url + 'page.php?page=' + page + '&id=' + id,
     (response, status, xhr) => {
      if (status == "error") {
        $('#result').html(MessageServerError);  
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
  
  let submit_btn = $(e.originalEvent.submitter);
  let icon = submit_btn.children('i');
  let current_icon = icon.attr('class'); // current icon
  submit_btn.attr('disabled');
  icon.removeClass();
  icon.addClass('fa fa-spinner fa-pulse fa-fw');
  
  formdata = new FormData(this);
  formdata.append('form', form_name);
  formdata.append(type, type_value);
  console.log(form_name);
  $.ajax({
    method: "POST",
    url: base_url + "request.php",
    data: formdata,
    processData: false,
    contentType: false,
    success: function (res) {
      var result = JSON.parse(res);
      $('#result').html(result.result);
      if (result.status == true) {
        $(form_raw).trigger('reset');
      }
      if (result.status == true) {
       if (form_name == 'update_user' && type_value == 'delete') {
         $( "#content" ).load( base_url+'module/page.php?page=users' );
        }
        if (form_name == 'resident_request') {
          $("#content").load(base_url + 'page.php?page=resident/requests');
       }
      }
      if (result.items != '') {
        errorFields(result.items);
      }
        submit_btn.removeAttr('disabled');
        icon.removeClass();
        icon.addClass(current_icon);
    }
  });
});




