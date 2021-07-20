$(document).ready(function() {
	window.limit = 0
	window.last_update = Date.now()
    $('.friend').click(e => {
    	Get_message(e)
    	setInterval(global_chat_db_listener, 1000)
    })
    $('.send-button').click(e => send_message())
    $('.scroll-to-old-message').click(e => get_old_message())
})

function Get_message(e){
	window.limit = 0
	receiver = $(e.target).find('.user_ref').text()
	firendname = $(e.target).find('.friend-name').text()
	user = $('.sender').val()
	$('.receiver').val(receiver)
	$('.box-name').text(firendname)
	$('.chat-box').empty()

	$.getJSON({
	  url: "http://localhost/chat/service/get_messages",
	  type: "POST",
	  data: {'id_sender': user, 'id_receiver': receiver},
	  context: document.body
	}).done(function(messages) {
		if (eval(messages)) {
			$.each(messages, (index, message) => {
				let side = (message.id_sender == receiver) ? "chat-left" : "chat-right";
			  		box(message, side)
			})
		}

	})
}

function send_message(){
		msg = $('.send-text').val()
		user = $('.sender').val()
		receiver = $('.receiver').val()
		$('.send-text').val('')
		$.getJSON({
		  url: "http://localhost/chat/service/send_messages",
		  type: "POST",
		  data: {'id_sender': user, 'id_receiver': receiver, 'message' : msg},
		  context: document.body
		}).done(function(message) { 
			console.log(message)
	  		box(message, 'chat-right')

	})
}

function global_chat_db_listener(){
	receiver = $('.receiver').val()
	user = $('.sender').val()
	var last_update = window.last_update
	var check_update = false; 
	$.getJSON({
	  url: "http://localhost/chat/service/get_messages",
	  type: "POST",
	  data: {'id_sender': user, 'id_receiver': receiver},
	  context: document.body
	}).done((messages) => {  
		if (eval(messages)) {
			$.each(messages, (index, message) => { 
				if(Date.parse(message.date) > last_update && message.id_sender == receiver){ 
					check_update = true;		
				  	box(message, 'chat-left')
				}
			})
		}
		if(check_update){
			console.log(check_update)
			window.last_update = Date.now()
		}
	}) 

}

function box(message, position){
	let datetime = new Date(message.date);
	datetime = `${datetime.getHours()}:${datetime.getMinutes()}:${datetime.getSeconds()}`;
	$('.chat-box').append(`<li class="${position}">
                            <div class="chat-avatar">
                                <img src="https://www.bootdey.com/img/Content/avatar/avatar3.png" alt="Retail Admin">
                                <div class="chat-name">${message.nom}</div>
                            </div>
                            <div class="chat-text">${message.message}</div>
                            <div class="chat-hour">${datetime} <span class="fa fa-check-circle"></span></div>
                   	     </li>`) 
}

function get_old_message(limit){
	console.log(window.limit)
	receiver = $('.receiver').val()
	console.log(receiver)
	user = $('.sender').val()
	$('.receiver').val(receiver)
	$.getJSON({
	  url: "http://localhost/chat/service/get_messages",
	  type: "POST",
	  data: {'id_sender': user, 'id_receiver': receiver, 'limite': window.limit+=5, 'offset': 5},
	  context: document.body
	}).done(function(messages) {
		if (eval(messages)) { 
			$.each(messages.reverse(), (index, message) => {
				let side = (message.id_sender == receiver) ? "chat-left" : "chat-right";
				let datetime = new Date(message.date);
				datetime = `${datetime.getHours()}:${datetime.getMinutes()}:${datetime.getSeconds()}`;
				$('.chat-box').prepend(`<li class="${side}">
			                            <div class="chat-avatar">
			                                <img src="https://www.bootdey.com/img/Content/avatar/avatar3.png" alt="Retail Admin">
			                                <div class="chat-name">${message.nom}</div>
			                            </div>
			                            <div class="chat-text">${message.message}</div>
			                            <div class="chat-hour">${datetime} <span class="fa fa-check-circle"></span></div>
			                   	     </li>`) 
			})
		}

	})
}