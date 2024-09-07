/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 */
var app = {
  changeStatus: function (url, trigger, id, force_reload)
  {
    var status = 0;
    if ($('#' + trigger.id).is(":checked")) {
      status = 1;
    }
    $('.global-loader').show();
    $.ajax({
      type: "GET",
      url: baseUrl + url,
      data: {
        "id": id
      },
      success: function (res) {
        $(".global-loader").hide();
        if (force_reload)
        {
          location.reload();
        }
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        $(".global-loader").hide();
        console.log(jqXHR.responseText);
      }
    });
  },
}

