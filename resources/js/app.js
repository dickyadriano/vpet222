require('./bootstrap');

// const message_in = document.getElementById("messages_in");
// const message_out = document.getElementById("messages_out");
// const username_input = document.getElementById("username");
// const message_input = document.getElementById("message_input");
// const message_form = document.getElementById("message_form");
//
// message_form.addEventListener('submit', function (e) {
//     e.preventDefault();
//
//     let has_errors = false;
//
//     if (username_input.value == ''){
//         alert("Please input a username");
//         has_errors = true;
//     }
//
//     if (message_input.value == ''){
//         alert("Please input a username");
//         has_errors = true;
//     }
//
//     if (has_errors) {
//         return;
//     }
//
//     const options = {
//         method: 'post',
//         url: '/send-message',
//         data: {
//             username: username_input.value,
//             message: message_input.value
//         }
//     }
//
//     axios(options);
// });
//
// window.Echo.channel('chat').listen('.message', (e) => {
//     console.log(e);
//     let uname = e.username;
//     if (uname != e.username) {
//         console.log('uname')
//         message_in.innerHTML += '<div class="d-flex justify-content-start mb-5">\n' +
//             '<div class="msg_cotainer">\n' +
//             '<span class="username">' + e.username + '</span>\n' +
//             e.message +
//             '<span class="msg_time">8:40 AM, Today</span>\n' +
//             '</div>\n' +
//             '</div>';
//         uname = e.username;
//     }
//     else {
//         message_in.innerHTML += '<div class="d-flex justify-content-end mb-5">\n' +
//             '<div class="msg_cotainer_send">\n' +
//             '<span class="username_send">' + e.username + '</span>\n' +
//             e.message +
//             '<span class="msg_time_send">8:40 AM, Today</span>\n' +
//             '</div>\n' +
//             '</div>';
//         uname = e.username;
//     }
//
// });
