
function fetchChats(id) {
    $.ajax({
        url: 'fetch_chats.php', 
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            $('.chat').empty(); // Clear the chat area
            data.forEach(function(chat) {
                if(chat.senderid==id)
                $('.chat').append(`<li class="d-flex justify-content-between mb-4">
                  <div class="card mask-custom w-100">
                    <div class="card-header d-flex justify-content-between p-3"
                      style="border-bottom: 1px solid rgba(255,255,255,.3);">
                      <p class="fw-bold mb-0">`+chat.username+`</p>
                      <p class="text-light small mb-0"><i class="far fa-clock"></i> `+chat.time+`</p>
                    </div>
                    <div class="card-body">
                      <p class="mb-0">
                        `+chat.chat+`
                      </p>
                    </div>
                  </div>
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-5.webp" alt="avatar"
                    class="rounded-circle d-flex align-self-start ms-3 shadow-1-strong" width="60">
                </li>`);
                if(chat.receiverid==id)
                $('.chat').append(`<li class="d-flex justify-content-between mb-4">
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp" alt="avatar"
                    class="rounded-circle d-flex align-self-start me-3 shadow-1-strong" width="60">
                  <div class="card mask-custom">
                    <div class="card-header d-flex justify-content-between p-3"
                      style="border-bottom: 1px solid rgba(255,255,255,.3);">
                      <p class="fw-bold mb-0">`+chat.username+`</p>
                      <p class="text-light small mb-0"><i class="far fa-clock"></i> `+chat.time+`</p>
                    </div>
                    <div class="card-body">
                      <p class="mb-0">
                        `+chat.chat+`
                      </p>
                    </div>
                  </div>
                </li>`);
                
            });
            $('.f1').append(`<input type="hidden" class="hidid" name="receiverid" value=`+id+` >`)
            
        },
        error: function() {
            console.error('Failed to fetch chats.');
        }
    });
}
function fetchUsers() {
    $.ajax({
        url: 'fetch_users.php',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            $('.usercard').empty(); // Clear the chat area
            data.forEach(function(user) {
                $('.usercard').append(`<li class="p-2 border-bottom user`+user.id+`" style="border-bottom: 1px solid rgba(255,255,255,.3) !important;">
                      <a href="#!" class="d-flex justify-content-between link-light">
                        <div class="d-flex flex-row">
                          <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-8.webp" alt="avatar"
                            class="rounded-circle d-flex align-self-center me-3 shadow-1-strong" width="60">
                          <div class="pt-1">
                            <p class="fw-bold mb-0">`+user.username+`</p>
                            <p class="small text-white">Hello, Are you there?</p>
                          </div>
                        </div>
                        <div class="pt-1">
                          <p class="small text-white mb-1">Just now</p>
                          <span class="badge bg-danger float-end">1</span>
                        </div>
                      </a>
                    </li>
                    <script>
                     $(document).ready(function() {
                    $('.user`+user.id+`').click( function() {
                        fetchChats(`+user.id+`);
                    });
                });</script>`);
            });
        },
        error: function() {
            console.error('Failed to fetch chats.');
        }
    });

    // $(document).ready(function() {
    //     $('.user2').on('click', function() {
    //         var userId = $(this).data('userid'); // Get user ID from data attribute
    //         fetchChats(userId); // Call fetchChats with the user ID
    //     });
    // });
}

// fetchChats();

// // Fetch chats every 5 seconds
// setInterval(fetchChats, 5000);
setInterval(fetchUsers, 2000);

// Handle chat form submission
// $('#chat-form').submit(function(event) {
//     event.preventDefault(); // Prevent the default form submission

//     // Send the chat message to the server
//     const message = $('#chat-message').val();
//     $.post('send_chat.php', { message: message }, function() {
//         $('#chat-message').val(''); // Clear the input
//         fetchChats(); // Optionally fetch chats again to show the new message
//     });
// });
