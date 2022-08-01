<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        {{-- <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style> --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="/admin">Sistem Penilaian Nilai Siswa</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @if (Auth::user()->role == 1)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Data Pertanyaan
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="/admin/question/probs/A">Pertanyaan Tipe A</a></li>
                          <li><a class="dropdown-item" href="/admin/question/probs/B">Pertanyaan Tipe B</a></li>
                          <li><a class="dropdown-item" href="/admin/question/create">Buat Pertanyaan Baru</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Data Sekolah dan Guru
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="/admin/school">Sekolah</a></li>
                          <li><a class="dropdown-item" href="/admin/users">Guru</a></li>
                        </ul>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/recap">Rekap Data Evaluasi</a>
                    </li>
                    </ul>
                    <span class="navbar-text">
                        @if (Auth::check())
                        <a class="nav-link" href="/logout">
                          Logout
                        </a>
                        @endif
                    </span>
                </div>
            </div>
        </nav>
        <div>
            @yield('adminsection')
        </div>
    </body>
    <script src="//cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
    <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
    <script type="text/javascript">
        window.onload = function () {
            for (let index = 1; index <= 11; index++) {
                if (document.getElementById('question-editor-'+index)) {
                    CKEDITOR.replace('question-editor-'+index,{
                        filebrowserUploadUrl: "{{route('ckeditor.image-upload', ['_token' => csrf_token() ])}}",
                        filebrowserUploadMethod: 'form'
                    });
                }
                if(document.getElementById('answerA-editor-'+index)){
                    CKEDITOR.replace('answerA-editor-'+index,{
                        filebrowserUploadUrl: "{{route('ckeditor.image-upload', ['_token' => csrf_token() ])}}",
                        filebrowserUploadMethod: 'form'
                    });
                }
                if (document.getElementById('answerB-editor-'+index)) {
                    CKEDITOR.replace('answerB-editor-'+index,{
                        filebrowserUploadUrl: "{{route('ckeditor.image-upload', ['_token' => csrf_token() ])}}",
                        filebrowserUploadMethod: 'form'
                    });
                }
                if (document.getElementById('answerC-editor-'+index)) {
                    CKEDITOR.replace('answerC-editor-'+index,{
                        filebrowserUploadUrl: "{{route('ckeditor.image-upload', ['_token' => csrf_token() ])}}",
                        filebrowserUploadMethod: 'form'
                    });
                }
                if (document.getElementById('reasonA-editor-'+index)) {
                    CKEDITOR.replace('reasonA-editor-'+index,{
                        filebrowserUploadUrl: "{{route('ckeditor.image-upload', ['_token' => csrf_token() ])}}",
                        filebrowserUploadMethod: 'form'
                    });
                }
                if (document.getElementById('reasonB-editor-'+index)) {
                    CKEDITOR.replace('reasonB-editor-'+index,{
                        filebrowserUploadUrl: "{{route('ckeditor.image-upload', ['_token' => csrf_token() ])}}",
                        filebrowserUploadMethod: 'form'
                    });
                }
                if (document.getElementById('reasonC-editor-'+index)) {
                    CKEDITOR.replace('reasonC-editor-'+index,{
                        filebrowserUploadUrl: "{{route('ckeditor.image-upload', ['_token' => csrf_token() ])}}",
                        filebrowserUploadMethod: 'form'
                    });
                }
                if (document.getElementById('feedbackCor-editor-'+index)) {
                    CKEDITOR.replace('feedbackCor-editor-'+index,{
                        filebrowserUploadUrl: "{{route('ckeditor.image-upload', ['_token' => csrf_token() ])}}",
                        filebrowserUploadMethod: 'form'
                    });
                }
                if (document.getElementById('feedbackIncor-editor-'+index)) {
                    CKEDITOR.replace('feedbackIncor-editor-'+index,{
                        filebrowserUploadUrl: "{{route('ckeditor.image-upload', ['_token' => csrf_token() ])}}",
                        filebrowserUploadMethod: 'form'
                    });
                }
                if (document.getElementById('feedbackResCor-editor-'+index)) {
                    CKEDITOR.replace('feedbackResCor-editor-'+index,{
                        filebrowserUploadUrl: "{{route('ckeditor.image-upload', ['_token' => csrf_token() ])}}",
                        filebrowserUploadMethod: 'form'
                    });
                }
                if (document.getElementById('feedbackResIncor-editor-'+index)) {
                    CKEDITOR.replace('feedbackResIncor-editor-'+index,{
                        filebrowserUploadUrl: "{{route('ckeditor.image-upload', ['_token' => csrf_token() ])}}",
                        filebrowserUploadMethod: 'form'
                    });
                }
            }
            var totalNumberOfproblems = 11;
            for(var i=2; i<=totalNumberOfproblems; i++){
                if (document.getElementById('problem'+i)) {
                    document.getElementById('problem'+i).style.display='none';
                }
            }
        }
        // get td elements
        function getData(optionText,isSelect){
            let tr = document.getElementsByClassName("row-datas");
            var pos;
            if (isSelect == 0) {
                for (let index = 0; index < tr.length; index++) {
                    tr[index].style.display='';
                }
            }else{
                if (optionText.options[optionText.selectedIndex].text == "") {
                    for (let index = 0; index < tr.length; index++) {
                        tr[index].style.display='';
                    }
                }else{
                    for (let index = 0; index < tr.length; index++) {
                        if(optionText.options[optionText.selectedIndex].value == tr[index].children[2].dataset.class){
                            tr[index].style.display='';
    
                        }else{
                            tr[index].style.display='none';
    
                        }
                    }
                }
            }
        }
        // add kelas to the view in create school
        function addKelasElement(){
            var cc = document.getElementsByClassName("className").length;
            var form = document.getElementById("school-buttons");
            var div = document.createElement('div');
            div.setAttribute("class","mb-3");
            var FN = document.createElement("input");
            FN.setAttribute("type", "text");
            FN.setAttribute("name", cc+1);
            FN.setAttribute("placeholder", "Nama Kelas");
            FN.classList.add("form-control");
            FN.classList.add("className");
            div.appendChild(FN);
            form.before(div);
        }
        // toggle div when create a questions
        function toggleDiv(id,pagingId){
                var totalNumberOfproblems = 11;
                for(var i=1; i<=totalNumberOfproblems; i++){
                    if (document.getElementById('problem'+i)) {
                        document.getElementById('problem'+i).style.display='none';
                    }
                }
                if (document.getElementById('problem'+id)) {
                    document.getElementById('problem'+id).style.display='block';
                }
                // clear all class active
                for(var i=1; i<=totalNumberOfproblems; i++){
                    var el = document.getElementById('pageProb'+i);
                    el.classList.remove('active');
                }
                // add active to clicked 
                var element = document.getElementById(pagingId);
                element.classList.add("active");
        }
        // ajax request for school and kelas
                // json request t0 get data from backend
        function check(id){
          var objXMLHttpRequest = new XMLHttpRequest();
          objXMLHttpRequest.onreadystatechange = function() {
            if(objXMLHttpRequest.readyState === 4) {
              if(objXMLHttpRequest.status === 200) {
                    parseJsonForOption(objXMLHttpRequest.responseText);
              } else {
                    console.log('Error Code: ' +  objXMLHttpRequest.status);
                    console.log('Error Message: ' + objXMLHttpRequest.statusText);
              }
            }
          }
          objXMLHttpRequest.open('GET', '/kelas/'+id);
          objXMLHttpRequest.send();
        }
        // parse json and insert option
        function parseJsonForOption(text){
          const obj = JSON.parse(text);
          var selectEl = document.getElementById("kelasList");
          // clearOptionFromSelect(selectEl);
          clearOptionFromSelect(document.querySelectorAll(".kelasOptionDatas"));
          obj.forEach(element => {
            console.log(element.id);
            var option = document.createElement("option");
            option.setAttribute("value", element.id);
            option.setAttribute("id", "kelasOption"+element.id);
            option.classList.add("form-control");
            option.classList.add("kelasOptionDatas");
            option.text = element.name;
            selectEl.add(option);
          });
        }
        // clear selected 
        function clearOptionFromSelect(el){
          if (el.length > 0) {
            el.forEach(o => o.remove());
          }
        }
        function exportData(isTeacher){
            var el = document.getElementById("kelasList");
            // alert(el.value);
            if (isTeacher == 0) {
                // alert(0);
                window.location.href='/admin/export/'+el.value+'/'+0;
            }else{
                // alert(1);
                window.location.href='/admin/export/'+el.value+'/'+1;

            }
        }
    </script>
</html>
