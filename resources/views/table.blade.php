<?php

?>

<!DOCTYPE html>
<html>

<head>
    <title style="font-family:'Bahij TheSansArabic SemiBold', sans-serif; "></title>
    <link rel="stylesheet" href="/css/main.css?v={{ filemtime(public_path('css/main.css')) }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}?v={{ filemtime(public_path('css/style1.css')) }}" />
    <style>
        /* .button-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
        } */
        * {
            text-align: center;

        }

        @font-face {
            font-family: 'Bahij TheSansArabic SemiBold';
            src: url('{{ asset('fonts/Bahij_TheSansArabic-SemiBold.ttf') }}') format('truetype');
            font-weight: normal;
            font-style: normal;
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
            border: none;
            background: none;
            cursor: pointer;
            padding: 0;
            margin: 0;
            /* font: inherit; */
            color: inherit;
            text-align: center;
        }

        .icon {
            /* font-size: 20px; Adjust the size as needed */
            transition: color 0.3s, transform 0.3s;
            /* Smooth transition for color and scale */
        }

        .trash:hover {
            color: red;
            /* Change this to your desired color */
            transform: scale(1.1);
        }

        .edit:hover {
            color: rgb(230, 182, 60);
            /* Change this to your desired color */
            transform: scale(1.1);
        }

        .check:hover {
            color: #4bb453;
            /* Change this to your desired color */
            transform: scale(1.1);
        }

        .xmark:hover {
            color: red;
            /* Change this to your desired color */
            transform: scale(1.1);
        }

        .icon_label {
            /* margin-top: 8px; /* Adjust the spacing between icon and label */
            font-size: 12px;
            Adjust the label size as needed */ text-align: center;
        }

        .modal {
            display: none;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(20, 26, 34, 0.5);
            text-align: center;
            position: fixed;
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
            color: var(--dl-color-theme-neutral-dark);
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: var(--dl-color-theme-primary1);
            text-decoration: none;
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

        .modal-section table.table td:last-child,
        .modal-section table.table td a {
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


    <div class="header">


        <header class="d-flex justify-content-center py-3">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="navbar8-action2 thq-button-outline thq-button-animated"
                        aria-current="page"
                        style="font-family:'Bahij TheSansArabic SemiBold', sans-serif; text-decoration: none;">
                        الصفحة الرئيسية
                    </a>
                </li>
                <li class="nav-item" style="margin-left: 40px;">
                    <a href="{{ route('form') }}" class="navbar8-action1 thq-button-filled thq-button-animated"
                        aria-current="page"
                        style="font-family:'Bahij TheSansArabic SemiBold', sans-serif; text-decoration: none;">
                        نموذج التسجيل
                    </a>
                </li>
                <li class="nav-item" style="margin-left: 40px;">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="navbar8-action1 thq-button-filled thq-button-animated"
                            style="font-family:'Bahij TheSansArabic SemiBold', sans-serif;">
                            {{ __('تسجيل خروج') }}
                        </button>
                    </form>
                </li>
            </ul>
        </header>
    </div>

    <div id="msgbox" class="msgbox">{{ session('del') }}</div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Attach event listeners for each user
            @foreach ($ActiveUsers as $ActiveUser)
                var applicationStatusNeedModificatioElement = document.getElementById(
                    'applicationStatusNeedModification-' + {{ $ActiveUser->id }});
                console.log(applicationStatusNeedModificatioElement);

                // Check if the status element exists
                applicationStatusNeedModificatioElement.addEventListener("click", function() {


                    var modificationReason = document.getElementById(
                        'modificationReason-' + {{ $ActiveUser->id }});
                    // Get the unique elements for this user
                    var rejectionReason = document.getElementById(
                        'rejectionReason-' + {{ $ActiveUser->id }});
                    // Hide both by default
                    rejectionReason.style.display = 'none';
                    modificationReason.style.display = 'block';
                });

                var applicationStatusRejectElement = document.getElementById(
                    'applicationStatusReject-' + {{ $ActiveUser->id }});
                console.log(applicationStatusRejectElement);

                // Check if the status element exists
                applicationStatusRejectElement.addEventListener("click", function() {
                    console.log("here here2");
                    var modificationReason = document.getElementById(
                        'modificationReason-' + {{ $ActiveUser->id }});
                    // Get the unique elements for this user
                    var rejectionReason = document.getElementById(
                        'rejectionReason-' + {{ $ActiveUser->id }});
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
    {{-- <script>
        document.getElementById('applicationStatus').addEventListener('change', function() {
            var status = this.value;
            console.log(status);

            var rejectionReason = document.getElementById('rejectionReason');
            var modificationReason = document.getElementById('modificationReason');

            // Hide both by default
            rejectionReason.style.display = 'none';
            modificationReason.style.display = 'none';

            // Show the corresponding textarea based on the selected status
            if (status === 'مرفوض') {
                rejectionReason.style.display = 'block';
            } else if (status === 'بحاجة الى تعديل') {
                modificationReason.style.display = 'block';
            }
        });
    </script> --}}





    <!-- /////// -->
    <table class="table">
        <tr>
            <td style="font-family:'Bahij TheSansArabic SemiBold', sans-serif;">الاسم</td>
            <td style="font-family:'Bahij TheSansArabic SemiBold', sans-serif;">رقم الهوية/الإقامة</td>
            <td style="font-family:'Bahij TheSansArabic SemiBold', sans-serif;">تاريخ انشاء الطلب </td>
            <td style="font-family:'Bahij TheSansArabic SemiBold', sans-serif;">معاينة الطلب</td>
            <td style="font-family:'Bahij TheSansArabic SemiBold', sans-serif;">حالة الطلب</td>
            <td style="font-family:'Bahij TheSansArabic SemiBold', sans-serif;"></td>
        </tr>

        <!-- start of foreach loop ("Variable name from controller when passing the Array's value" as "New assigned variable name as to represent the value in Array") -->
        @foreach ($ActiveUsers as $ActiveUser)
            <tr style=" display: fl ">
                <td style="font-family:'Bahij TheSansArabic SemiBold', sans-serif;">{{ $ActiveUser->name }}</td>
                <td style="font-family:'Bahij TheSansArabic SemiBold', sans-serif;">{{ $ActiveUser->Id_iqama }}</td>
                <td style="font-family:'Bahij TheSansArabic SemiBold', sans-serif;">{{ $ActiveUser->created_at }}</td>
                <td style="text-align: center;">
                    <button id="myBtn-{{ $ActiveUser->id }}"
                        class="navbar8-action1 thq-button-filled thq-button-animated"
                        style="font-family:'Bahij TheSansArabic SemiBold', sans-serif;width: 50%; margin: 0 auto;">للتفاصيل
                    </button>
                </td>
                <td style="font-family:'Bahij TheSansArabic SemiBold', sans-serif;">
                    {{ $ActiveUser->applicationStatus }}
                </td>

                <td style="font-family:'Bahij TheSansArabic SemiBold', sans-serif;">
                    <script src="https://kit.fontawesome.com/f9ca423d9a.js" crossorigin="anonymous"></script>


                    <a href="{{ route('form.remove', $ActiveUser->id) }}"
                        onclick="return confirm('Are you sure you want to delete this item?');">
                        <button type="button" class="icon-container">
                            <i class="fa-solid fa-trash icon trash"></i>
                        </button>
                    </a><br>
                    <a href="{{ route('form.accept', $ActiveUser->id) }}">
                        <button type="button" class="icon-container">
                            <i class="fa-solid fa-square-check icon check"></i>
                        </button>
                    </a><br>

                    <button type="button" class="icon-container"
                        id="applicationStatusNeedModification-{{ $ActiveUser->id }}">
                        <i class="fa-solid fa-pen-to-square icon edit"></i>
                    </button>
                    <br>

                    <button type="button" class="icon-container" id="applicationStatusReject-{{ $ActiveUser->id }}">
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
                        <div id="modificationReason-{{ $ActiveUser->id }}" style="display: none; margin-top: 10px;">
                            <label for="modification-{{ $ActiveUser->id }}">التعديلات المطلوبة:</label>
                            <textarea name="modification" id="modification-{{ $ActiveUser->id }}" rows="4" class="form-control"
                                placeholder="اكتب التعديلات المطلوبة هنا"></textarea>
                            <button type="submit" class="icon-container">
                                ارسال
                            </button>
                    </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get all the buttons that open the modals
            var buttons = document.querySelectorAll('[id^=myBtn-]');
            var modals = document.querySelectorAll('.modal');
            var spans = document.querySelectorAll('.close');

            buttons.forEach(function(button) {
                button.onclick = function() {
                    var id = this.id.split('-')[1];
                    var modal = document.getElementById('myModal-' + id);
                    if (modal) {
                        console.log('Opening modal:', modal);
                        modal.style.display = "block";
                    } else {
                        console.error('Modal not found for ID:', id);
                    }
                }
            });

            spans.forEach(function(span) {
                span.onclick = function() {
                    var id = this.getAttribute('data-id');
                    var modal = document.getElementById('myModal-' + id);
                    if (modal) {
                        console.log('Closing modal:', modal);
                        modal.style.display = "none";
                    } else {
                        console.error('Modal not found for ID:', id);
                    }
                }
            });

            window.onclick = function(event) {
                modals.forEach(function(modal) {
                    if (event.target == modal) {
                        console.log('Closing modal:', modal);
                        modal.style.display = "none";
                    }
                });
            }
        });
    </script>


    <div class="button-container">
        @foreach ($ActiveUsers as $ActiveUser)
            <!-- The Modal -->
            <div id="myModal-{{ $ActiveUser->id }}" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span class="close" data-id="{{ $ActiveUser->id }}">&times;</span>
                    <h2 style="font-family:'Bahij TheSansArabic SemiBold', sans-serif;" class="modal-header">بيانات
                        الطالب</h2>
                    <div class="modal-section" style="font-family:'Bahij TheSansArabic SemiBold', sans-serif;">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>id</td>
                                    <td>{{ $ActiveUser->id }}</td>
                                </tr>
                                <tr>
                                    <td>الاسم</td>
                                    <td>{{ $ActiveUser->name }}</td>
                                </tr>
                                <tr>
                                    <td>رقم التواصل</td>
                                    <td>{{ $ActiveUser->PhoneNum }}</td>
                                </tr>
                                <tr>
                                    <td>الهوية/ الإقامة</td>
                                    <td>{{ $ActiveUser->Id_iqama }}</td>
                                </tr>
                                <tr>
                                    <td>البريد الإلكتروني</td>
                                    <td>{{ $ActiveUser->email }}</td>
                                </tr>
                                <tr>
                                    <td>الحالة الوظيفية</td>
                                    <td>{{ $ActiveUser->Job_status }}</td>
                                </tr>
                                <tr>
                                    <td>تاريخ انشاء الطلب</td>
                                    <td>{{ $ActiveUser->created_at }}</td>
                                </tr>
                                <tr>
                                    <td>رقم الطلب</td>
                                    <td>{{ $ActiveUser->applicationNum }}</td>
                                </tr>
                                <tr>
                                    <td>الرقم الجامعي</td>
                                    <td>{{ $ActiveUser->UID }}</td>
                                </tr>
                                <tr>
                                    <td>الدرجة العلمية المطلوبة</td>
                                    <td>{{ $ActiveUser->RDegree }}</td>
                                </tr>
                                <tr>
                                    <td>الدرجة العلمية الحالية</td>
                                    <td>{{ $ActiveUser->CDegree }}</td>
                                </tr>
                                <tr>
                                    <td>التخصص المطلوب</td>
                                    <td>{{ $ActiveUser->Rspe }}</td>
                                </tr>
                                <tr>
                                    <td>المستند</td>
                                    <td>
                                        @if ($ActiveUser->F_document)
                                            <a href="{{ asset('storage/' . $ActiveUser->F_document) }}" target="_blank">عرض المستند</a>
                                        @else
                                            لم يتم رفع المستند
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <button id="printButton" type="button" class="navbar8-action1 thq-button-filled thq-button-animated print-button"
                            onclick="printModalContent('myModal-{{ $ActiveUser->id }}')"
                            style="margin-top: var(--dl-space-space-oneandhalfunits);">طباعة</button>
                    </div>
                </div>
            </div>
    </div>
    @endforeach

    <script>
        function printModalContent(modalId) {
            var modalContent = document.querySelector('#' + modalId + ' .modal-content').innerHTML;
            var originalContent = document.body.innerHTML;

            document.body.innerHTML = modalContent;
            window.print();
            document.body.innerHTML = originalContent;

            // Re-bind events if necessary, such as closing the modal
        }
    </script>

</html>
