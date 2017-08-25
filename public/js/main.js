/**
 * Created by mhr on 24-Aug-17.
 */

var postId = -1;


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



