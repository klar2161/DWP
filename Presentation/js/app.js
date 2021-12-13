$(document).ready(function () {
  $(".likeTypeAction").tipsy({ gravity: "s", live: true });

  $(".reaction").livequery(function () {
    var reactionsCode =
      '<span class="likeTypeAction" original-title="Like" data-reaction="1"><i class="likeIcon likeType"></i></span>' +
      '<span class="likeTypeAction" original-title="Love" data-reaction="2"><i class="loveIcon likeType"></i></span>' +
      '<span class="likeTypeAction" original-title="Haha" data-reaction="3"><i class="hahaIcon likeType"></i></span>' +
      '<span class="likeTypeAction" original-title="Wow" data-reaction="4"><i class="wowIcon likeType"></i></span>' +
      '<span class="likeTypeAction" original-title="Cool" data-reaction="5"><i class="coolIcon likeType"></i></span>' +
      '<span class="likeTypeAction" original-title="Confused" data-reaction="6"><i class="confusedIcon likeType"></i></span>' +
      '<span class="likeTypeAction" original-title="Sad" data-reaction="7"><i class="sadIcon likeType"></i></span>' +
      '<span class="likeTypeAction last" original-title="Angry" data-reaction="8"><i class="angryIcon likeType"></i></span>';

    $(this).tooltipster({
      contentAsHTML: true,
      interactive: true,
      content: $(reactionsCode),
    });
  });

  /*Reaction*/
  $("body").on("click", ".likeTypeAction", function () {
    var reactionType = $(this).attr("data-reaction");
    var reactionName = $(this).attr("original-title");
    var rel = $(this).parent().parent().attr("rel");
    var x = $(this).parent().parent().attr("id");
    var sid = x.split("reaction");
    var postID = sid[1];

    var htmlData =
      '<i class="' +
      reactionName.toLowerCase() +
      'IconSmall likeTypeSmall" ></i>' +
      reactionName;
    var dataString = "postID=" + postID + "&rid=" + reactionType;

    $.ajax({
      type: "POST",
      url: "ajaxReaction.php",
      data: dataString,
      cache: false,
      beforeSend: function () {},
      success: function (html) {
        if (parseInt(html) == 1) {
          $("#like" + postID)
            .html(htmlData)
            .removeClass("reaction")
            .removeClass("tooltipstered")
            .addClass("unLike")
            .attr("rel", "unlike");
          $("#" + x).hide();
        }
      },
    });

    return false;
  });

  $("body").on("click", ".unLike", function () {
    var reactionType = "1";
    var x = $(this).attr("id");
    var sid = x.split("like");
    var postID = sid[1];
    var dataString = "postID=" + postID + "&rid=" + reactionType;
    var htmlData = '<i class="likeIconDefault" ></i>Like</a>';
    $.ajax({
      type: "POST",
      url: "ajaxReaction.php",
      data: dataString,
      cache: false,
      beforeSend: function () {},
      success: function (html) {
        if (parseInt(html) == 2) {
          $("#like" + postID)
            .html(htmlData)
            .addClass("reaction")
            .addClass("tooltipstered")
            .removeClass("unLike");
        }
      },
    });

    return false;
  });
});
