function slider() {
    var h = window.innerHeight;
    var w = window.innerWidth;
    var w2 = w-50;
    document.getElementsByClassName("slider")[0].style.height = h + "px";
    document.getElementById("arrow").style.marginTop = h-40 + "px";
    document.getElementById("arrow").style.marginLeft = w2/2 + "px";

    document.getElementsByClassName("slider")[0].innerHTML += '<p style="color: white;">Height: ' + h + '</p>';

}
slider();

(function()
      {
      var speed = 500;
      var moving_frequency = 1;
      var links = document.getElementsByTagName('a');
      var href;
      for(var i=0; i<links.length; i++)
      {
          href = (links[i].attributes.href === undefined) ? null : links[i].attributes.href.nodeValue.toString();
          if(href !== null && href.length > 1 && href.substr(0, 1) == '#')
          {
              links[i].onclick = function()
              {
                  var element;
                  var href = this.attributes.href.nodeValue.toString();
                  if(element = document.getElementById(href.substr(1)))
                  {
                      var hop_count = speed/moving_frequency
                      var getScrollTopDocumentAtBegin = getScrollTopDocument();
                      var gap = (getScrollTopElement(element) - getScrollTopDocumentAtBegin) / hop_count;

                      for(var i = 1; i <= hop_count; i++)
                      {
                          (function()
                          {
                              var hop_top_position = gap*i;
                              setTimeout(function(){  window.scrollTo(0, hop_top_position + getScrollTopDocumentAtBegin); }, moving_frequency*i);
                          })();
                      }
                  }

                  return false;
              };
          }
      }

      var getScrollTopElement =  function (e)
      {
          var top = 0;

          while (e.offsetParent != undefined && e.offsetParent != null)
          {
              top += e.offsetTop + (e.clientTop != null ? e.clientTop : 0);
              e = e.offsetParent;
          }

          return top;
      };

      var getScrollTopDocument = function()
      {
          return document.documentElement.scrollTop + document.body.scrollTop;
      };
      })();
