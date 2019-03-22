function jQuerySetup()
{
    $("button").click(function(){
        if ($this.attr("hrefPage")!=null)
        var content=ajaxCall($this.attr("hrefPage"));
    });
}
function ajaxCall(link)
{
    $.ajax({
        type: type,
        url: link,
        data: data,
        dataType: "html",
        success: function (response) {
          return response
        }
      });
}