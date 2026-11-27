<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صفحة المستخدم</title>
    <link rel="stylesheet" href="/css/main.css?v={{ filemtime(public_path('css/main.css')) }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}?v={{ filemtime(public_path('css/style1.css')) }}" />

    <style>

        * {
            text-align: center;
            
        }

        @font-face {
            font-family: 'Bahij TheSansArabic SemiBold';
            src: url('{{ asset('fonts/Bahij_TheSansArabic-SemiBold.ttf') }}') format('truetype');
        }

        .action_container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
        }

        .icon-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            cursor: pointer;
            background: none;
            border: none;
            padding: 0;
            margin: 0;
        }

        .icon {
            transition: color 0.3s, transform 0.3s;
        }

        .trash:hover {
            color: red;
            transform: scale(1.1);
        }

        .edit:hover {
            color: rgb(230, 182, 60);
            transform: scale(1.1);
        }

        .check:hover {
            color: #4bb453;
            transform: scale(1.1);
        }

        .xmark:hover {
            color: red;
            transform: scale(1.1);
        }

        .modal {
            display: none;
            z-index: 1000;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(20, 26, 34, 0.5);
        }

        .modal-content {
            position: relative;
            background-color: var(--dl-color-theme-neutral-light);
            margin: 8% auto;
            padding: var(--dl-space-space-fourunits);
            width: 60%;
            max-height: 75%;
            overflow-y: auto;
            border-radius: var(--dl-radius-radius-cardradius);
            box-shadow: 0 10px 30px rgba(20, 26, 34, 0.2);
            text-align: right;
            direction: rtl;
        }

        .close {
            position: absolute;
            top: var(--dl-space-space-unit);
            left: var(--dl-space-space-unit);
            font-size: 28px;
            font-weight: bold;
            color: var(--dl-color-theme-neutral-dark);
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: var(--dl-color-theme-primary1);
        }

        .modal-header {
            font-size: 24px;
            color: var(--dl-color-theme-neutral-dark);
            margin-bottom: var(--dl-space-space-oneandhalfunits);
            padding-bottom: var(--dl-space-space-halfunit);
            border-bottom: 2px solid var(--dl-color-theme-secondary2);
        }

        .modal-section {
            margin-bottom: var(--dl-space-space-oneandhalfunits);
        }

        .modal-section table.table td {
            padding: var(--dl-space-space-halfunit);
        }

        .modal-section table.table td:first-child {
            font-weight: bold;
            color: var(--dl-color-theme-neutral-dark);
            width: 40%;
        }

        .modal-section table.table td:last-child {
            color: var(--dl-color-theme-primary1);
        }

        .print-button {
            font-family: 'Bahij TheSansArabic SemiBold', sans-serif;
        }

        @media print {
            .print-button {
                display: none !important;
            }
        }
    </style>
</head>

<body class="container-fluid">

    <header class="d-flex justify-content-center py-3">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a href="{{ route('home') }}" class="navbar8-action2 thq-button-outline thq-button-animated"
                    style="font-family:'Bahij TheSansArabic SemiBold'; text-decoration: none;">الصفحة الرئيسية</a>
            </li>
            <li class="nav-item" style="margin-left: 40px;">
                <a href="{{ route('form') }}" class="navbar8-action1 thq-button-filled thq-button-animated"
                    style="font-family:'Bahij TheSansArabic SemiBold'; text-decoration: none;">نموذج التسجيل</a>
            </li>
            <li class="nav-item" style="margin-left: 40px;">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="navbar8-action1 thq-button-filled thq-button-animated"
                        style="font-family:'Bahij TheSansArabic SemiBold';">تسجيل خروج</button>
                </form>
            </li>
        </ul>
    </header>

    <div id="msgbox" class="msgbox">{{ session('del') }}</div>
    <script>
        window.onload = function() {
            var msgBox = document.getElementById("msgbox");
            if (msgBox) setTimeout(() => {
                msgBox.style.display = "none";
            }, 3000);
        };

        // document.getElementById('printButton').addEventListener('click', function () {
        //     var printableContent = document.getElementById('printableArea').innerHTML;
        //     var originalContent = document.body.innerHTML;
        //     document.body.innerHTML = printableContent;
        //     window.print();
        //     document.body.innerHTML = originalContent;
        // });
        function printModalContent(modalId) {
            var modal = document.getElementById(modalId);
            if (modal) {
                var printableContent = modal.innerHTML;
                var originalContent = document.body.innerHTML;
                document.body.innerHTML = printableContent;
                window.print();
                document.body.innerHTML = originalContent;
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            var buttons = document.querySelectorAll('[id^=myBtn-]');
            var modals = document.querySelectorAll('.modal');
            var spans = document.querySelectorAll('.close');

            buttons.forEach(function(button) {
                button.onclick = function() {
                    var id = this.id.split('-')[1];
                    var modal = document.getElementById('myModal-' + id);
                    if (modal) modal.style.display = "block";
                }
            });

            spans.forEach(function(span) {
                span.onclick = function() {
                    var id = this.getAttribute('data-id');
                    var modal = document.getElementById('myModal-' + id);
                    if (modal) modal.style.display = "none";
                }
            });

            window.onclick = function(event) {
                modals.forEach(function(modal) {
                    if (event.target == modal) modal.style.display = "none";
                });
            }
        });
        document.addEventListener('DOMContentLoaded', function() {
            // Attach event listeners for each user
            @foreach ($ActiveUsers as $ActiveUser)
                var applicationStatusNeedModificatioElement = document.getElementById(
                    'applicationStatusNeedModification-'+{{ $ActiveUser->id }});
                console.log(applicationStatusNeedModificatioElement);

                // Check if the status element exists
                applicationStatusNeedModificatioElement.addEventListener("click", function() {


                    var modificationReason = document.getElementById(
                        'modificationReason-'+{{ $ActiveUser->id }});
                    // Get the unique elements for this user
                    var rejectionReason = document.getElementById(
                        'rejectionReason-'+{{ $ActiveUser->id }});
                    // Hide both by default
                    rejectionReason.style.display = 'none';
                    modificationReason.style.display = 'block';
                });

                var applicationStatusRejectElement = document.getElementById(
                    'applicationStatusReject-'+{{ $ActiveUser->id }});
                    console.log(applicationStatusRejectElement);

                // Check if the status element exists
                applicationStatusRejectElement.addEventListener("click", function() {
                    console.log("here here2");
                    var modificationReason = document.getElementById(
                        'modificationReason-'+{{ $ActiveUser->id }});
                    // Get the unique elements for this user
                    var rejectionReason = document.getElementById(
                        'rejectionReason-'+{{ $ActiveUser->id }});
                    // Hide both by default
                    rejectionReason.style.display = 'block';
                    modificationReason.style.display = 'none';
                });




            @endforeach
        });
    </script>

    <script>
        document.getElementById('printButton').addEventListener('click', function() {
            var printableContent = document.getElementById('printableArea').innerHTML;
            var originalContent = document.body.innerHTML;

            document.body.innerHTML = printableContent;

            window.print();

            document.body.innerHTML = originalContent;
        });
    </script>

    <table class="table">
        <thead>
            <tr>
                <th>الاسم</th>
                <th>رقم الهوية/الإقامة</th>
                <th>تاريخ انشاء الطلب</th>
                <th>معاينة الطلب</th>
                <th>حالة الطلب</th>
                <th>إجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ActiveUsers as $ActiveUser)
                <tr>
                    <td>{{ $ActiveUser->name }}</td>
                    <td>{{ $ActiveUser->Id_iqama }}</td>
                    <td>{{ $ActiveUser->created_at }}</td>
                    <td>
                        <button id="myBtn-{{ $ActiveUser->id }}"
                            class="navbar8-action1 thq-button-filled thq-button-animated">للتفاصيل</button>
                    </td>
                    <td>{{ $ActiveUser->applicationStatus }}</td>
                    <td style="font-family:'Bahij TheSansArabic SemiBold', sans-serif;">
                        <script src="https://kit.fontawesome.com/f9ca423d9a.js" crossorigin="anonymous"></script>



                        <a href="{{ route('form.acceptFinal', $ActiveUser->id) }}">
                            <button type="button" class="icon-container">
                                <i class="fa-solid fa-square-check icon check"></i>
                            </button>
                        </a><br>

                        <button type="button" class="icon-container"
                            id="applicationStatusNeedModification-{{ $ActiveUser->id }}">
                            <i class="fa-solid fa-pen-to-square icon edit"></i>
                        </button>
                        <br>

                        <button type="button" class="icon-container"
                            id="applicationStatusReject-{{ $ActiveUser->id }}">
                            <i class="fa-solid fa-xmark icon xmark"></i>
                        </button>
                        <br>
                        <!-- Reason for rejection -->
                        <form method="POST" action="{{ route('form.reject', $ActiveUser->id) }}">
                            @csrf
                            <div id="rejectionReason-{{ $ActiveUser->id }}" style="display: none; margin-top: 10px;">
                                <label for="reason-{{ $ActiveUser->id }}">سبب الرفض:</label>
                                <textarea name="reason" id="reason-{{ $ActiveUser->id }}" rows="4" class="form-control"
                                    placeholder="اكتب سبب الرفض هنا"></textarea>
                                <button type="submit" class="icon-container">
                                    ارسال
                                </button>
                                </a>
                            </div>
                        </form>

                        <!-- Modification required -->
                        <form method="POST" action="{{ route('form.needModification', $ActiveUser->id) }}">
                            @csrf
                            <div id="modificationReason-{{ $ActiveUser->id }}"
                                style="display: none; margin-top: 10px;">
                                <label for="modification-{{ $ActiveUser->id }}">التعديلات المطلوبة:</label>
                                <textarea name="modification" id="modification-{{ $ActiveUser->id }}" rows="4" class="form-control"
                                    placeholder="اكتب التعديلات المطلوبة هنا"></textarea>
                                <button type="submit" class="icon-container">
                                    ارسال
                                </button>
                        </form>
                        </div>
                    </td>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="button-container">
        @foreach ($ActiveUsers as $ActiveUser)
            <!-- Modal -->
            <div id="myModal-{{ $ActiveUser->id }}" class="modal">
                <div class="modal-content">
                    <span class="close" data-id="{{ $ActiveUser->id }}">&times;</span>
                    <h2 class="modal-header" style="font-family:'Bahij TheSansArabic SemiBold', sans-serif;">بيانات الطالب</h2>
                    <div class="modal-section" style="font-family:'Bahij TheSansArabic SemiBold', sans-serif;">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>الاسم</td>
                                    <td>{{ $ActiveUser->name }}</td>
                                </tr>
                                <tr>
                                    <td>الهوية/الإقامة</td>
                                    <td>{{ $ActiveUser->Id_iqama }}</td>
                                </tr>
                                <tr>
                                    <td>البريد الإلكتروني</td>
                                    <td>{{ $ActiveUser->email }}</td>
                                </tr>
                                <!-- Add more fields as necessary -->
                            </tbody>
                        </table>
                        <button id="printButton-{{ $ActiveUser->id }}" type="button"
                            class="navbar8-action1 thq-button-filled thq-button-animated print-button"
                            onclick="printModalContent('myModal-{{ $ActiveUser->id }}')"
                            style="margin-top: var(--dl-space-space-oneandhalfunits);">طباعة</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var buttons = document.querySelectorAll('[id^=myBtn-]');
            var modals = document.querySelectorAll('.modal');
            var spans = document.querySelectorAll('.close');

            buttons.forEach(function(button) {
                button.onclick = function() {
                    var id = this.id.split('-')[1];
                    var modal = document.getElementById('myModal-' + id);
                    if (modal) modal.style.display = "block";
                }
            });

            spans.forEach(function(span) {
                span.onclick = function() {
                    var id = this.getAttribute('data-id');
                    var modal = document.getElementById('myModal-' + id);
                    if (modal) modal.style.display = "none";
                }
            });

            window.onclick = function(event) {
                modals.forEach(function(modal) {
                    if (event.target == modal) modal.style.display = "none";
                });
            }
        });
    </script>

</body>

</html>
