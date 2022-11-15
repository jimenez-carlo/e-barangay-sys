
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
  
  
  $('li').removeClass('active');
  // console.log($('.sidebar-menu .tree>li'));
  $(this).parent().addClass('active');
  
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
  submit_btn.attr('disabled','disabled');
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
        if (form_name == 'announcement_create') {
          $("#content").load(base_url + 'page.php?page=admin/announcement/create');
        }
        if (form_name == 'announcement_edit') {
          $("#content").load(base_url + 'page.php?page=admin/announcement/edit&id='+result.id);
        }
        if (form_name == 'request_change_status') {
          $("#content").load(base_url + 'page.php?page=admin/request/edit&id='+result.id);
        }
        
        
        if (form_name == 'change_status_barangay_id') {
          $("#content").load(base_url + 'page.php?page=admin/id/edit&id='+result.id);
        }
        if (form_name == 'change_status_barangay_clearance') {
          $("#content").load(base_url + 'page.php?page=admin/barangay/edit&id='+result.id);
        }
        if (form_name == 'change_status_business_clearance') {
          $("#content").load(base_url + 'page.php?page=admin/business/edit&id='+result.id);
        }
        
        
        if (form_name == 'request_generate') {
          $("#content").load(base_url + 'page.php?page=admin/request/edit&id='+result.id);
        }
        if (form_name == 'verify_resident') {
          $("#content").load(base_url + 'page.php?page=admin/resident');
        }
        if (form_name == 'resident_update') {
          $("#content").load(base_url + 'page.php?page=admin/resident/edit&id='+result.id);
        }
        if (form_name == 'resident_register') {
          $("#content").load(base_url + 'page.php?page=admin/resident/create');
        }
        if (form_name == 'resident_request_barangay') {
          $("#content").load(base_url + 'page.php?page=resident/barangay');
        }
        if (form_name == 'resident_request_id') {
          $("#content").load(base_url + 'page.php?page=resident/id');
        }
        if (form_name == 'resident_request_business') {
          $("#content").load(base_url + 'page.php?page=resident/business');
        }
        if (form_name == 'member_update') {
          $("#content").load(base_url + 'page.php?page=admin/members/edit&id='+result.id);
        }
        if (form_name == 'member_register') {
          $("#content").load(base_url + 'page.php?page=admin/members/create');
        }
        if (form_name == 'admin_profile_update') {
          $("#content").load(base_url + 'page.php?page=admin/profile&id='+result.id);
        }
        if (form_name == 'resident_profile_update') {
          $("#content").load(base_url + 'page.php?page=resident/profile&id='+result.id);
        }
        
        
        if (form_name == 'settings_edit') {
          $("#content").load(base_url + 'page.php?page=admin/settings/edit&id='+result.id);
        }
        if (form_name == 'resident_create_request') {
          // console.log(base_url + '?page=resident/requests&id=0');
          $("#content").load(base_url + 'page.php?page=resident/requests');
        }
        
        if (form_name == 'resident_profile_update' || form_name == 'admin_profile_update' || form_name == 'resident_create_request') {
          $('img:not(#logo)').attr("src",$('#preview').attr('src'));
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


