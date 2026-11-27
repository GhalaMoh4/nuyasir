<?php
$Email = '';

if (isset($_POST['submitBtn'])) {
    $email = $_REQUEST['email'];
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <title>نموذج التسجيل - نُيسر</title>
    <link rel="stylesheet" href="/css/main.css?v={{ filemtime(public_path('css/main.css')) }}">
    <script src="/js/main.js?v={{ filemtime(public_path('js/main.js')) }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}?v={{ filemtime(public_path('css/style1.css')) }}" />
    <link rel="stylesheet" href="{{ asset('css/index.css') }}?v={{ filemtime(public_path('css/index.css')) }}" />
    <style>
        @font-face {
            font-family: 'Bahij TheSansArabic SemiBold';
            src: url('{{ asset('fonts/Bahij_TheSansArabic-SemiBold.ttf') }}') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        body.container-fluid {
            background-color: var(--dl-color-theme-secondary1);
            padding-top: 96px;
        }

        @media(max-width: 479px) {
            body.container-fluid {
                padding-top: 80px;
            }
        }

        .centered-title {
            font-family: 'Bahij TheSansArabic SemiBold', sans-serif;
            text-align: center;
        }

        #submission {
            max-width: 720px;
            width: 100%;
            margin: var(--dl-space-space-threeunits) auto;
            padding: var(--dl-space-space-fourunits);
            background-color: var(--dl-color-theme-neutral-light);
            border-radius: var(--dl-radius-radius-cardradius);
            box-shadow: 0 10px 30px rgba(20, 26, 34, 0.1);
            text-align: right;
            direction: rtl;
        }

        #submission .form-label {
            display: block;
            font-family: 'Bahij TheSansArabic SemiBold', sans-serif;
            margin-top: var(--dl-space-space-oneandhalfunits);
            margin-bottom: var(--dl-space-space-halfunit);
        }

        #submission input[type="text"],
        #submission input[type="email"],
        #submission input[type="file"],
        #submission select {
            width: 100%;
            display: block;
        }
    </style>
</head>

<body class="container-fluid">

    <header class="navbar8-container">
        <div class="navbar8-navbar-interactive">
            <img alt="University Logo" src="{{ asset('images/university-logo-placeholder.svg') }}" class="navbar8-image1" />
            <nav class="navbar8-links" style="margin-right: auto; margin-left: 0; flex: none;">
                <span class="thq-link thq-body-small">
                    <a href="{{ route('home') }}" class="nav-link" aria-current="page"
                        style="font-family:'Bahij TheSansArabic SemiBold', sans-serif; text-decoration: none;">العودة
                        للصفحة الرئيسية</a>
                </span>
            </nav>
        </div>
    </header>
    @if (session('msg'))
        <div class="alert alert-success">
            {{ session('msg') }}
        </div>
    @endif


    <div class="msgbox2">{{ session('err') }}</div>

    <!-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
        </ul>
    </div>
@endif -->

    <form action="{{ route('form.store') }}" method="POST" id="submission" enctype="multipart/form-data">
        <div id="student">
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const employedRadio = document.querySelector('input[name="Job_status"][value="employed"]');
                    const unemployedRadio = document.querySelector('input[name="Job_status"][value="unemployed"]');
                    const contractorDiv = document.getElementById("Contractor");
                    const extraInfoDiv = document.getElementById("Extra_info"); // Select the Extra_Info div


                    function toggleContractorDiv() {
                        if (employedRadio.checked) {
                            contractorDiv.style.display = "none";
                            extraInfoDiv.style.display = "block";
                        } else {
                            contractorDiv.style.display = "block";
                            extraInfoDiv.style.display = "none";
                        }
                    }

                    // Run the function on page load in case a radio button is pre-selected
                    toggleContractorDiv();

                    // Add event listeners to the radio buttons
                    employedRadio.addEventListener("change", toggleContractorDiv);
                    unemployedRadio.addEventListener("change", toggleContractorDiv);
                });

                function downloadPDF() {
                    window.location.href = "{{ url('/download-pdf') }}";
                }
            </script>
            <div id="BasicInfo">
                <div class="centered-title >">
                <h2 style="font-family:'Bahij TheSansArabic SemiBold', sans-serif;" class="centered-title">بيانات الطالب</h2>
                </div>
                @csrf
                <br>



                <br>

                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label for="name" class="form-label" style="font-family:'Bahij TheSansArabic SemiBold', sans-serif;">الاسم الرباعي</label>
                <input type="text" id="name" class="thq-input" name="name" required>
                @error('Id_iqama')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <br>



                <br>

                <label for="Id_iqama" class="form-label" style="font-family:'Bahij TheSansArabic SemiBold', sans-serif;">رقم الهوية</label>
                <input type="text" id="Id_iqama" class="thq-input" name="Id_iqama" required pattern="[0-9]*"
                    title="Please enter only numbers">
                <br>



                <br>
                @error('UID')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label for="UID" class="form-label" style="font-family:'Bahij TheSansArabic SemiBold', sans-serif;">الرقم الجامعي </label>
                <input type="text" id="UID" class="thq-input" name="UID" required pattern="[0-9]*"
                    title="Please enter only numbers">
                <br>
                <br>

                @error('PhoneNum')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label for="PhoneNum" class="form-label" style="font-family:'Bahij TheSansArabic SemiBold', sans-serif;">رقم التواصل</label>
                <input type="text" id="PhoneNum" class="thq-input" name="PhoneNum" required pattern="[0-9]*"
                    title="Please enter only numbers">
                <br>
                <br>

                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label for="email" class="form-label" style="font-family:'Bahij TheSansArabic SemiBold', sans-serif;">البريد الإلكتروني</label>
                <input type="email" id="email" class="thq-input" name="email" required>
                <br>

                <!-- <label for="password" class="form-label">كلمة المرور </label>
            <input type="password" id="password" class="thq-input" name="password" required minlength="8" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"> -->
                <br>
                @error('Rspe')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label for="Rspe" class="form-label" style="font-family:'Bahij TheSansArabic SemiBold', sans-serif;">التخصص المطلوب </label>
                <input type="text" id="Rspe" class="thq-input" name="Rspe" required>



                <br>

                <br>
                @error('CDegree')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label for="CDegree" class="form-label" style="font-family:'Bahij TheSansArabic SemiBold', sans-serif;">الدرجة العلمية الحالية </label>
                <br>
                <select id="CDegree" name="CDegree" class="thq-input">
                    <option value="Hdiploma" style="font-family:'Bahij TheSansArabic SemiBold', sans-serif;">دبلوم عالي </option>
                    <option value="Mdiploma" style="font-family:'Bahij TheSansArabic SemiBold', sans-serif;">دبلوم تطبيقي متوسط </option>
                    <option value="Bachelor" style="font-family:'Bahij TheSansArabic SemiBold', sans-serif;">بكالوريوس</option>
                    <option value="Master" style="font-family:'Bahij TheSansArabic SemiBold', sans-serif;">ماجستير</option>
                </select>
                <br>
                <br>
                @error('RDegree')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label for="RDegree" class="form-label" style="font-family:'Bahij TheSansArabic SemiBold', sans-serif;">الدرجة العلمية المطلوبة </label>
                <br>
                <select id="RDegree" name="RDegree" class="thq-input">
                    <option value="Hdiploma" style="font-family:'Bahij TheSansArabic SemiBold', sans-serif;">دبلوم عالي </option>
                    <option value="Mdiploma" style="font-family:'Bahij TheSansArabic SemiBold', sans-serif;">دبلوم تطبيقي متوسط </option>
                    <option value="Bachelor" style="font-family:'Bahij TheSansArabic SemiBold', sans-serif;">بكالوريوس</option>
                    <option value="Master" style="font-family:'Bahij TheSansArabic SemiBold', sans-serif;">ماجستير</option>
                </select>
                <br>
                <br>
                <label for="" class="form-label" style="font-family:'Bahij TheSansArabic SemiBold', sans-serif;">تحميل مستندات الجهة الممولة</label>
                <button type="button" class="navbar8-action1 thq-button-filled thq-button-animated"
                    onclick="downloadPDF()" style="font-family:'Bahij TheSansArabic SemiBold', sans-serif;">تحميل المستندات</button>
                <br>
                <br>

                @error('F_document')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label for="F_document" class="form-label" style="font-family:'Bahij TheSansArabic SemiBold', sans-serif;">إرفاق مستندات التمويل</label>
                <input type="file" id="F_document" class="thq-input" name="F_document">
                <br>
                @error('Job_status')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label for="active" class="form-label" style="font-family:'Bahij TheSansArabic SemiBold', sans-serif;">الحالة الوظيفية </label>
                <br>
                <input type="radio" id="Job_status" name="Job_status" value="employed" required>
                <label for="active" style="font-family:'Bahij TheSansArabic SemiBold', sans-serif;">موظف</label><br>
                <input type="radio" id="Job_status" name="Job_status" value="unemployed" required>
                <label for="not active" style="font-family:'Bahij TheSansArabic SemiBold', sans-serif;">غير موطف</label><br>
                <br>
                @error('status')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror


                <label for="active" class="form-label" style="font-family:'Bahij TheSansArabic SemiBold', sans-serif;">هل يوجد متعثرات مالية ؟ </label>
                <br>
                <input type="radio" id="status" name="status" value="No" required>
                <label for="active" style="font-family:'Bahij TheSansArabic SemiBold', sans-serif;">لا</label><br>
                <input type="radio" id="status" name="status" value="Yes" required>
                <label for="not active" style="font-family:'Bahij TheSansArabic SemiBold', sans-serif;">نعم</label><br>
                <br>
                {{-- @error('Id_document')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label for="Id_document" class="form-label">إرفاق الهوية</label>
                <input type="file" id="Id_document" class="thq-input" name="Id_document" required> --}}
                <br>

            </div>


            <input  class="navbar8-action1 thq-button-filled thq-button-animated"  name="submitBtn" type="submit" value="إرسال" style="font-family:'Bahij TheSansArabic SemiBold', sans-serif; width: 100%;">

    </form>

    {{-- <div class="btn">
            <form action="{{ url('/table') }}" method="GET">
                <input id="Button2" type="submit" value="User Lists">

                <label for="active" class="form-label"> </label>
            </form>
        </div> --}}


</body>

</html>
