/**
 * Created by mhr on 24-Aug-17.
 */

var postId = -1;
var current_chat_user_id = -1;

$('.interaction').on('click',function(){
    console.log('asdfsdfasdf');
});

$('.post').find('.update-post').find('.edit').on('click',function(event){
    console.log('asdfsdfasdf');

    event.preventDefault();

    var realBodyTag = $(this).parent().parent().find('.post-para');
    var body = $(this).parent().parent().find('.post-para').text();

    postId =$(this).parent().parent().attr('data-postid');

    //console.log(body+ " "+postId);

    $('#update-post-body').val(body.trim());

    $('#edit-post-modal').modal();


    //var URL = '/edit';




    //console.log(postId+" "+token);



});

$('#save-button').on('click',function(e){


    var editedBody = $("#update-post-body").val();
    console.log("== "+postId+" "+token+" "+URL+" "+editedBody);



    $.ajax({
        method: 'POST',
        url :URL,

        data : {body :$("#update-post-body").val(),postId:postId,_token:token},
        success: function(result){

            console.log(result['message']+" "+result['post_id']);



            $('.post').each(function(index){


                if($(this).attr('data-postid') === result['post_id']){
                    $(this).find('.post-para').text(result['message']);

                    console.log("== "+postId);

                }

            });

        }
    });


});

$('.like-button').on('click',function(e){

    var postid =$(this).attr('data-postid');
    var url =$(this).attr('data-link');
    var userid =$(this).attr('data-userid');
    var token =$(this).attr('data-token');
    console.log(postid+" "+url+" "+userid);

    var like_field = $(this).find("#number_of_likes");

    $.ajax({
        method: 'POST',
        url :url,

        data : {userId:userid,postId:postid,_token:token},
        success: function(result){
            console.log("success"+result['likes']);

            $(like_field).text(result['likes']);
        }
        ,
        failed: function(result){
            console.log("failed");

        }

    });


});


$('.chat-name-list-element').on('click',function(e){

    var name = $(this).find('h3').text();
    var name = name.trim();

    console.log('clicked to username = '+name);
    var url =$(this).attr('data-link');
    var userid =$(this).attr('data-useridto');
    var token =$(this).attr('data-token');
    console.log(" "+url+" "+userid);

    var like_field = $(this).find("#number_of_likes");

    $('.to-user-name-title').text(name);


    current_chat_user_id = userid;

    $.ajax({
        method: 'POST',
        url :url,

        data : {userId:userid,_token:token},
        success: function(result){

            console.log("success"+result['messages']);

            var array1 = JSON.parse(result['messages']);


            $("#chat-messages-list").html("");

            for (var i in array1){

                console.log(array1[i]+"  "+_fromuserid);

                if (array1[i]['from_user_id'] ==userid ) {

                    var htmltoadd = "<div class='speech-bubble-2'><section>"+array1[i]['message']+"</section></div>";

                    $("#chat-messages-list").append(htmltoadd);

                }

                if(array1[i]['to_user_id'] ==userid){
                    var htmltoadd = "<div class='speech-bubble-1'><section>"+array1[i]['message']+"</section></div>";

                    $("#chat-messages-list").append(htmltoadd);

                }

            }

            $("#message-list-box").scrollTop(300);

            //
            //var $cont = $('#chat-messages-list');
            //$cont[0].scrollTop = $cont[0].scrollHeight;
            //
            $("#message-list-box").scrollTop(function() { return this.scrollHeight; });
            //$('.to-user-name-title').text(result['tousername']);
        }
        ,
        failed: function(result){
            console.log("failed");


            $("#message-list-boxt").scrollTop(1000);
        }

    });



});

$('#type-message-box').keyup(function(e) {

    if (e.keyCode == 13) {


        //$("#message-list-box").scrollTop(function() { return this.scrollHeight; });
        var url =$(this).attr('data-link');
        var userid =$(this).attr('data-useridfrom');
        var token =$(this).attr('data-token');
        var message = $('#type-message-box').val();


        $.ajax({
            method: 'POST',
            url :url,

            data : {fromUserId:userid,toUserId:current_chat_user_id, _token:token ,message:message},
            success: function(result){
                console.log(' == ',result['message']);

                var htmltoadd = "<div class='speech-bubble-1'><section>"+result['message']+"</section></div>";

                //$("#chat-messages-list").append(htmltoadd);
                $("#message-list-box").scrollTop(function() { return this.scrollHeight; });

            }
            ,
            failed: function(result){

            }

        });

        $(this).val('');

    }

}).focus();


$('#message-send-button').on('click',function(e){

    var url =$(this).attr('data-link');
    var userid =$(this).attr('data-useridto');
    var token =$(this).attr('data-token');
    var message = $('#type-message-box').val();


    //$.ajax({
    //    method: 'POST',
    //    url :url,
    //
    //    data : {fromUserId:userid,toUserId:current_chat_user_id, _token:token ,message:message},
    //    success: function(result){
    //        console.log(' == ',result['message']);
    //
    //        var htmltoadd = "<div class='speech-bubble-1'><section>"+result['message']+"</section></div>";
    //
    //        $("#chat-messages-list").append(htmltoadd);
    //        $("#message-list-box").scrollTop(function() { return this.scrollHeight; });
    //
    //    }
    //    ,
    //    failed: function(result){
    //
    //    }
    //
    //});

});