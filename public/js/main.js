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
    //e.preventDefault();
    //e.stopPropagation();

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