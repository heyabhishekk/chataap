<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JS (and its dependencies) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

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
            margin-left: -14px;
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

        .fa-user:before {
            content: "\f007";
            font-size: 12px;
            margin-left: -30px;
        }

        .fa-comment:before {
            content: "\f075";
            font-size: 19px;
        }

        .fa-home-alt:before,
        .fa-home-lg-alt:before,
        .fa-home:before,
        .fa-house:before {
            content: "\f015";
            margin-right: 7px;
            font-size: 21px;
        }

        .fa-users:before {
            content: "\f0c0";
            margin-right: 7px;
            font-size: 21px;
        }

        .fa-right-from-bracket:before,
        .fa-sign-out-alt:before {
            content: "\f2f5";
            margin-right: 7px;
            font-size: 21px;
        }

        .fa-trash::before {
            margin-right: 7px;
            font-size: 21px;
        }
    </style>
</head>

<body>

    <div class="header">
        <div class="container">
            <img src="images/chats.png" alt="logo" width="370px" height="114px">
            <div class="header-right">
                <a class="active" href="#home"><i class="fa-solid fa-house"></i>Home</a>

                <a data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: chartreuse">
                    <i class="fa-solid fa-users"></i> Users
                </a>
                <a href="{{ route('logout') }}" style="background-color: darkgoldenrod"><i
                        class="fa-solid fa-right-from-bracket"></i>LOGOUT</a>
                <a href="#" class="delete-account-btn" style="background-color: red"><i
                        class="fa-solid fa-trash"></i>Delete Account</a>

            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">CLICK ON CHAT<i
                            class="fa-brands fa-rocketchat"></i></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul id="searchResults">
                        @foreach ($user as $users)
                            @if ($users->id !== auth()->id())
                                <li style="list-style: none"><i class="fa-solid fa-user"></i><span
                                        class="name-small">{{ $users->name }}</span>
                                    <a href="{{ route('chats', $users->id) }}" class="link chat-link"><i
                                            class="fa-solid fa-comment"></i>Chat</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <video width="100%" height="auto" autoplay loop muted>
        <source src="video/pp.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <video width="100%" height="auto" autoplay loop muted>
        <source src="video/mm.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="card text-center">
        <div class="card-header">
            Since2023
        </div>
        <div class="card-footer text-body-secondary">
            @Copyright::Mr.Abhishek
        </div>
    </div>
    <div class="modal" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete your account?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        id="deleteCancelBtn">No</button>
                    <button type="button" class="btn btn-danger" id="deleteConfirmBtn">Yes</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/8a9c0784cc.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteAccountBtn = document.querySelector('.delete-account-btn');

            deleteAccountBtn.addEventListener('click', function(event) {
                event.preventDefault();
                const deleteConfirmationModal = new bootstrap.Modal(document.getElementById(
                    'deleteConfirmationModal'));
                deleteConfirmationModal.show();
            });

            const deleteConfirmBtn = document.getElementById('deleteConfirmBtn');
            const deleteCancelBtn = document.getElementById('deleteCancelBtn');

            deleteConfirmBtn.addEventListener('click', function() {
                window.location.href = "{{ route('account.delete') }}";
            });

            deleteCancelBtn.addEventListener('click', function() {
                const deleteConfirmationModal = new bootstrap.Modal(document.getElementById(
                    'deleteConfirmationModal'));
                deleteConfirmationModal.hide();
            });
        });
    </script>
</body>

</html>
