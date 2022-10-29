
const MessageServerError = '<div class="alert alert-sm alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-warning"></i> <strong>Server Connection Error</strong> Oops Something Went Wrong! </div ></div>';
const MessageFieldRequired = '<div class="alert alert-sm alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-warning"></i> <strong>System Error!</strong> Please Enter Missing Fields! </div ></div>';
const MessagePasswordNotMatch = '<div class="alert alert-sm alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-warning"></i> <strong>System Error!</strong> Password Doest Not Match! </div ></div>.';
const ContentLoading = '<section class="content-header"><h1><i class="fa fa-refresh fa-spin fa-fw"></i> Loading Content<small>Please wait...</small> </h1> </section>';

function clearErrors() {
  // Remove all error css
  // $('form>.alert-danger').hide();
  $(".is-invalid").removeClass("is-invalid");
}

function errorFields(strings) {
  $.each(strings.split(","), function (i,word) {
    var field = $("[name='"+word+"']");
      if (!$(field).hasClass("is-invalid")) {
        $(field).addClass("is-invalid");
      }
  });
}

function requireFields(strings) {
  var errors = 0;
  $.each(strings.split(","), function (i,word) {
    var field = $("[name='"+word+"']");
    if (field.val() == "" || field.val() == null || field.val().length == 0) {
      if (!$(field).hasClass("is-invalid")) {
        $(field).addClass("is-invalid");
      }
      errors++;
    }
  });
  return (errors == 0) ? true : false;
}

$(document).on("click", '.btn-edit, .btn-view', function () {
    let ele = $(this);
    let page = ele.attr('name');
    let id = (ele.attr('value')) ? ele.attr('value') : 0;
    $("#result").html('');
    $("#content").load(base_url + 'page.php?page=' + page + '&id=' + id);
  });

$(document).on("submit", 'form', function (e) {
  e.preventDefault();
  clearErrors();
  var form_raw = this;
  var form_name = this.name;
  var type = e.originalEvent.submitter.name;
  var type_value = e.originalEvent.submitter.value;
  if (this.name == 'logout') {
    window.location.href = 'logout.php';
  }
  console.log('submitted');
  let submit_btn = $(e.originalEvent.submitter);
  let icon = submit_btn.children('i');
  let current_icon = icon.attr('class'); // current icon
  submit_btn.attr('disabled');
  icon.removeClass();
  icon.addClass('fa fa-spinner fa-pulse fa-fw');
  
  formdata = new FormData(this);
  formdata.append('form', form_name);
  formdata.append(type, type_value);

  $.ajax({
    method: "POST",
    url: base_url + "request.php",
    data: formdata,
    processData: false,
    contentType: false,
    success: function (res) {
      var result = JSON.parse(res);
      $('#result').html(result.result);
        $('.invalid-feedback').html('*'+result.message);
      if (result.status == false) {
        $('.valid-feedback').addClass('invalid-feedback').removeClass('valid-feedback');
      } else {
        $('.invalid-feedback').addClass('valid-feedback').removeClass('invalid-feedback');
      }
      if (result.refresh) {
        location.reload();
      }
      if (result.status) {
        $(form_raw).trigger('reset');
      }
      if (result.status) {
       if (form_name == 'update_user' && type_value == 'delete') {
         $( "#content" ).load( base_url+'module/page.php?page=users' );
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

function dropdown_with_default(dropdown_to_populate, table, where, id, display, value, selected = "") {
  $.ajax({
    url: base_url + 'request.php',
    type: 'POST',
    data: { form: 'get_dropdown',table: table, where: where, id: id, display: display, value: value, selected: selected },
    success: function (response) {
      $('#' + dropdown_to_populate + '').html(response);
    }
  });
}


      $('a.nav-link').click(function() {
      $('a.nav-link').removeClass('active');
        $(this).addClass('active');
      });