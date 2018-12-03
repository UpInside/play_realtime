$(function () {

    setInterval(function () {

        var commentsId = $('.comments_list_item').map(function () {
            return this.id;
        }).get();

        var lastId = Math.min.apply(null, commentsId);

        $.post('controller.php', {action: 'getComments', last: lastId}, function (data) {

            if (data.comments) {

                $.each(data.comments, function (key, value) {

                    $('.comment_list_box').prepend(
                        "<article class='comments_list_item' id='" + value.id + "'>" +
                        "     <h2>" + value.user + "</h2>" +
                        "     <p>" + value.content + "</p>" +
                        "     <p class='small'>" + value.created_at + "</p>" +
                        "</article>"
                    );

                });

            }

        }, 'json');

    }, 3000);

});