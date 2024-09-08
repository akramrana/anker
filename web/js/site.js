/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 */
var site = {
  changelanguage: function (lang)
  {
    if ($.trim(lang) != '')
    {
      $.ajax({
        type: "GET",
        url: baseUrl + 'site/change-language',
        data: {
          'lang': lang
        },
        success: function ()
        {
          location.reload();
        },
        error: function (jqXHR, textStatus, errorThrown) {
          alert(jqXHR.responseText);
        }
      })
    }
  },
}

