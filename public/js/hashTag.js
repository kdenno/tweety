$(function () {
  // match for hashtag or mention and get the rest that come after # or @
  var regex = /[#|@](\w+)$/gi;
  $(document).on("keyup", ".status", function () {
    var content = $.trim($(this).val());
    var text = content.match(regex);
    var max = 140;
    if (text) {
      var dataString = "hashtag=" + text;

      $.ajax({
        type: "POST",
        url: "http://localhost:8080/tweety/public/searchAjx/ajax/hashtag.php",
        data: dataString,
        cache: false,
        success: function (response) {
          $(".hash-box ul").html(response);
          $(".hash-box li").click(function () {
            // get clicked hashtag
            var value = $.trim($(this).find(".getValue").text());
            var oldContent = $(".status").val();
            var newContent = oldContent.replace(regex, "");
            $(".status").val(newContent + value + " ");
            $(".hash-box li").hide();
            $(".status").focus();

            // update counter
            $("#count").text(max - content.length);
          });
        },
      });
    } else {
      $(".hash-box li").hide();
    }
    // update counter
    $("#count").text(max - content.length);
    if (content.length === max) {
      $("#count").css("color", "#f00");
    } else {
      $("#count").css("color", "#000");
    }
  });
});
