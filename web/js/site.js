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

new Wheel({
  el: document.getElementById('wheel4'),
  data: [
    {
      text: 'Beijing',
      color: 'silver',
      fontSize: 24
    },
    {
      text: 'London',
      fontColor: '#008000'
    }, 
    'New York', 
    'Tokyo'
  ],
  theme: 'light',
  radius: 150,
  buttonWidth: 75,
  color: {
    button: '#fef5e7',
    buttonFont: '#34495e'
  },
  onSuccess(data) {
    console.log(data);
  }
});