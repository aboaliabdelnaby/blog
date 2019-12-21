$(function() {

	$('.like').on('click',function(){
           var post_id=$(this).attr('data-postid');
           var btn=$(this);
           $.ajax({
           	type:'post',
           	url:url,
           	data:{
           		post_id:post_id,
           		_token:token
           	},
           	success:function(data){
                 if(data.is_like==1){
                    btn.removeClass('btn-secondary').addClass('btn-success');
                    btn.next().removeClass('btn-danger').addClass('btn-secondary');
                    btn.find('.like_count').text(parseInt(btn.find('.like_count').text())+1);
                    if(data.change_like==1){
                        btn.next().find('.dislike_count').text(parseInt(btn.next().find('.dislike_count').text())-1);
                    }
                 }
                 else if(data.is_like==0){
                 	btn.removeClass('btn-success').addClass('btn-secondary');
                 	btn.find('.like_count').text(parseInt(btn.find('.like_count').text())-1);
                 }
           	}
           });
	});

	$('.dislike').on('click',function(){
            var like_s=$(this).attr('data-like');
           var post_id=$(this).attr('data-postid');
           var btn=$(this);
           $.ajax({
           	type:'post',
           	url:durl,
           	data:{
           		like_s:like_s,
           		post_id:post_id,
           		_token:token
           	},
           	success:function(data){
                 if(data.is_dislike==1){
                    btn.removeClass('btn-secondary').addClass('btn-danger');
                    btn.prev().removeClass('btn-success').addClass('btn-secondary');
                    btn.find('.dislike_count').text(parseInt(btn.find('.dislike_count').text())+1);
                    if(data.change_like){
                        btn.prev().find('.like_count').text(parseInt(btn.prev().find('.like_count').text())-1);
                    }
                 }
                 else if(data.is_dislike==0){
                 	btn.removeClass('btn-danger').addClass('btn-secondary');
                 	btn.find('.dislike_count').text(parseInt(btn.find('.dislike_count').text())-1);
                 }
           	}
           });
	});
});