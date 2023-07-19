<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        .header {
            overflow: hidden;
            background-color: rgb(52 83 127);
            padding: 20px 10px;
        }

        .header a {
            float: left;
            color: black;
            text-align: center;
            padding: 12px;
            text-decoration: none;
            font-size: 18px;
            line-height: 25px;
            border-radius: 4px;
            margin-top: 8px;
        }

        .header a.logo {
            font-size: 25px;
            font-weight: bold;
        }

        .header a:hover {
            background-color: #ddd;
            color: black;
        }

        .header a.active {
            background-color: dodgerblue;
            color: white;
        }

        .header-right {
            float: right;
        }

        @media screen and (max-width: 500px) {
            .header a {
                float: none;
                display: block;
                text-align: left;
                font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif
            }

            .header-right {
                float: none;
            }
        }

        .name-small {
            font-size: 14px;
            font-weight: normal;
        }

        .name-big {
            font-size: 18px;
            font-weight: bold;
        }

        .chat-link {
            float: right;
        }

        a {
            text-decoration: none;
            color: darkgreen;
            font-family: math;
            font-weight: bolder;
        }

        #chatbox {
            height: 300px;
            overflow-y: scroll;
            padding: 10px;
            background-color: #120f12;
        }

        .chat-message {
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 10px;
            font-size: 14px;
            line-height: 1.4;
        }

        .chat-message.sent {
            background-color: #dcf8c6;
            align-self: flex-end;
            color: #4f8a10;
        }

        .chat-message.received {
            background-color: #dd7f32;
            align-self: flex-start;
            font-size: 14px;
            color: #000;
        }

        .chat-message strong {
            font-weight: bold;
        }

        .chat-input {
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            font-size: 14px;
        }

        .chat-submit {
            background-color: #128c7e;
            border: none;
            border-radius: 50%;
            padding: 10px;
            margin-left: 10px;
            color: #fff;
        }

        .chat-submit:hover {
            background-color: #0d7a68;
        }

        .he {
            text-align: center;
            font-family: fantasy;
            font-size: 50px !important;
        }

        .fa-home-alt:before,
        .fa-home-lg-alt:before,
        .fa-home:before,
        .fa-house:before {
            content: "\f015";
            margin-right: 7px;
            font-size: 21px;
        }

        .fa-right-from-bracket:before,
        .fa-sign-out-alt:before {
            content: "\f2f5";
            margin-right: 7px;
            font-size: 21px;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="container">
            <img src="{{ asset('images/chats.png') }}" alt="logo" width="370px" height="114px">
            <div class="header-right">
                <a class="active" href="{{ route('dashboard') }}"><i class="fa-solid fa-house"></i>Home</a>
                <a href="{{ route('logout') }}" style="background-color: darkgoldenrod"><i
                        class="fa-solid fa-right-from-bracket"></i>LOGOUT</a>
            </div>
        </div>
    </div>
    <div class="container">
        <h2 class="he">Chat</h2>
        <div class="card-body" id="chatbox">
            @foreach ($user->messages()->where('user_id', $user->id)->get() as $message)
                <div class="chat-message {{ $message->user_id == $user->id ? 'sent' : 'received' }}">
                    <strong>{{ $message->user->name }}</strong>: {{ $message->content }}
                </div>
            @endforeach
        </div>
    </div>
    <div class="card-footer">
        <form id="chatForm" method="POST" action="{{ route('send-message') }}">
            @csrf
            <div class="input-group">
                <input type="hidden" name="userId" value="{{ $user->id }}">
                <input type="text" class="form-control chat-input" id="content" placeholder="Type your message...">
                <div class="input-group-append">
                    <button class="btn btn-primary chat-submit" type="submit">
                        <i class="fa-solid fa-paper-plane"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="card text-center">
        <div class="card-header">
            Since2023
        </div>
        <div class="card-footer text-body-secondary">
            @Copyright::Mr.Abhishek
        </div>
    </div>
    {{-- footer --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/8a9c0784cc.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#chatForm').submit(function(e) {
            e.preventDefault();

            var content = $('#content').val();
            var userId = $('[name="userId"]').val();

            $.ajax({
                type: 'POST',
                url: '{{ route('send-message') }}',
                data: {
                    content: content,
                    userId: userId
                },
                success: function(response) {
                    $('#content').val('');
                    getMessages(userId);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });

        function getMessages(userId) {
            var chatbox = $('#chatbox');
            var scrollHeight = chatbox.prop('scrollHeight');
            var scrollTop = chatbox.scrollTop();
            var clientHeight = chatbox.prop('clientHeight');

            $.ajax({
                type: 'GET',
                url: '{{ route('get-messages') }}',
                data: {
                    userId: userId
                },
                success: function(response) {
                    var messages = '';

                    $.each(response, function(index, message) {
                        var messageClass = message.user_id == userId ? 'sent' : 'received';
                        messages += '<div class="chat-message ' + messageClass + '">' +
                            '<strong>' + message.user.name + '</strong>: ' +
                            message.content +
                            '</div>';
                    });

                    $('#chatbox').html(messages);

                    if (scrollTop === 0) {
                        chatbox.scrollTop(chatbox.prop('scrollHeight') - clientHeight);
                    } else {
                        chatbox.scrollTop(scrollTop + (chatbox.prop('scrollHeight') - scrollHeight));
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }

        $(document).ready(function() {
            var userId = '{{ $user->id }}';
            getMessages(userId);
            setInterval(function() {
                getMessages(userId);
            }, 1000);
        });
    </script>
</body>

</html>
