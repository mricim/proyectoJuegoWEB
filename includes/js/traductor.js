function selecionarIdioma(tipo) {
  seleccion = document.getElementById('selectorLanguageByModalCookies').value;
  if (!seleccion) {
      alert("Seleccione un idioma");
  } else {
      createCookie('acceptCookies', tipo);
      createCookie('language', seleccion);
      $('#modalCookies').modal('hide');
      setTimeout(() => {
          traduccion();
      }, 10);
  }
}
//https://www.solvetic.com/tutoriales/article/2733-como-tener-una-pagina-web-traducida-en-varios-idiomas/
/*
window.onload = function() {
  setTimeout(() => {
    traduccion();
}, 100);
};
*/
//$(document).ready(traduccion());
function traduccion() {
  /*
  protocolWeb = ('https:' == document.location.protocol ? 'https://' : 'http://');
  var js = document.createElement("script");
  js.type = "text/javascript";
  js.src = protocolWeb + document.domain + "/includes/js/cookies.js";
  document.body.appendChild(js);
*/

  var loadLang = function (lang) {
    document.getElementsByTagName('html')[0].lang=lang;
    var processLang = function (data) {
      var arr = data.split('\n');
      for (var i in arr) {
        if (lineValid(arr[i])) {
          var obj = arr[i].split('=>');
          assignText(obj[0], obj[1]);
        }
      }
    };
    var assignText = function (key, value) {

      $('[data-lang="' + key + '"]').each(function () {
        var attr = $(this).attr('data-destine');
        if (typeof attr !== 'undefined') {
          $(this).attr(attr, value);
        } else {
          if ($(this).is("input")) {
            $(this).attr('placeholder', value)
          } else {
            //alert(value);
            $(this).html(value);
          }
        }
      });

      $('[data-lang-title="' + key + '"]').each(function () {
        $(this).attr('title', value)
      });
      $('[data-lang-data-title="' + key + '"]').each(function () {
        $(this).attr('data-original-title', value)
      });
      $('[data-lang-data-content="' + key + '"]').each(function () {
        $(this).attr('data-content', value)
      });

    };
    var lineValid = function (line) {
      return (line.trim().length > 0);
    };
    $('.loading-lang').addClass('show');
    $.ajax({
      url: '\\add/lang/' + lang + '.txt',
      error: function () {
        alert('No se cargó traducción');
      },
      success: function (data) {
        $('.loading-lang').removeClass('show');
        processLang(data);
      }
    });
  };


  if (getCookie('language') == 0) {
    var userLang = navigator.language || navigator.userLanguage;
    //alert("The language is: " + userLang);
    switch (userLang.split("-")[0]) {
      case "en": loadLang('en'); break;
      case "es": loadLang('es'); break;
      case "ca": loadLang('cat'); break;
      default: loadLang('en');break;
    }
  } else {
    loadLang(getCookie('language'));
  }

};
