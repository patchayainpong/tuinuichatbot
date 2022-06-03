<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap-icons.css')}}">
    <script src="{{asset('assets/bootstrap/js/bootstrap.bundle.js')}}"></script>
    <script src="{{asset('assets/bootstrap/js/popper.min.js')}}"></script>
    {{-- Sweet Alert --}}
    <link rel="stylesheet" href="{{asset('assets/sweetalert2/dist/sweetalert2.min.css')}}">
    <script src="{{asset('assets/sweetalert2/dist/sweetalert2.js')}}"></script>
    <!-- Jquery 3.6.0 -->
    <script src="{{asset('assets/jquery/jquery-3.6.0.min.js')}}"></script>
    {{-- BootstrapTable --}}
    <script src="{{asset('assets/bootstrap-table-master/dist/bootstrap-table.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('assets/bootstrap-table-master/dist/bootstrap-table.css')}}">
    <link rel="stylesheet" href="{{asset('assets/bootstrap-table-master/dist/bootstrap-table.min.css')}}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NetflixMilk</title>
    <link rel = "icon" href = 
    "https://tuinui.xyz/uploads/logoweb/logotitlenew.png" 
            type = "image/x-icon">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('netflixmilk')}}">NetflixMilk</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row mt-5">
            {{-- youtube --}}
            <div class="col-lg-6 mt-3">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{route('youtube')}}" enctype="multipart/form-data">
                            @csrf
                            <H1 class="text-center" style="color:Black;font-weight:bolder">Youtube</H1>
                            <label for="staticEmail" class="col-sm-2 col-form-label">ชื่อผู้โอน</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping">ชื่อ</span>
                                <input name="name" type="text" class="form-control" placeholder="ชื่อ"
                                    aria-label="Username" aria-describedby="addon-wrapping">
                            </div>
                            <label for="staticEmail" class="col-sm-12 col-form-label"> <label for=""
                                    style="color: red">*หมายเหตุ</label>
                                (ในกรณีที่จ่ายล่วงหน้าหลายเดือนให้กรอกส่วนนี้)</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping">หมายเหตุ</span>
                                <input name="detail" type="text" class="form-control" placeholder="หมายเหตุ"
                                    aria-label="Username" aria-describedby="addon-wrapping">
                                <span class="input-group-text" id="addon-wrapping">เดือน</span>
                            </div>
                            <label for="staticEmail" class="col-sm-2 col-form-label">อัพโหลดสลิป</label>
                            <div class="input-group flex-nowrap">
                                <input name="slipimg" type="file" class="form-control imgip" aria-label="Username"
                                    aria-describedby="addon-wrapping">
                            </div>
                            <div class="text-center mt-4" style="">
                                 <img id="blah" class="showimg" src="" alt="Drag And Drop"
                                style="max-width: 300px;width:100%;height:300px;display:none;" />
                            </div>
                           
                            <div class="text-center">
                                <button class="btn btn-success mt-4">อัพโหลด</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- Netflix --}}
            <div class="col-lg-6 mt-3">
                <div class="card">
                    <div class="card-body">
                        <form class="form" method="POST" action="{{route('netflix')}}" enctype="multipart/form-data">
                            @csrf
                            <H1 class="text-center" style="color:Black;font-weight:bolder">Netflix</H1>
                            <label for="staticEmail" class="col-sm-2 col-form-label">ชื่อผู้โอน</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping">ชื่อ</span>
                                <input name="name" type="text" class="form-control" placeholder="ชื่อ"
                                    aria-label="Username" aria-describedby="addon-wrapping">
                            </div>
                            <label for="staticEmail" class="col-sm-12 col-form-label"> <label for=""
                                    style="color: red">*หมายเหตุ</label>
                                (ในกรณีที่จ่ายล่วงหน้าหลายเดือนให้กรอกส่วนนี้)</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping">หมายเหตุ</span>
                                <input name="detail" type="text" class="form-control" placeholder="หมายเหตุ"
                                    aria-label="Username" aria-describedby="addon-wrapping">
                                <span class="input-group-text" id="addon-wrapping">เดือน</span>
                            </div>
                            <label for="staticEmail" class="col-sm-2 col-form-label">อัพโหลดสลิป</label>
                            <div class="input-group flex-nowrap">
                                <input name="slipimg" type="file" class="form-control imgip" aria-label="Username"
                                    aria-describedby="addon-wrapping">
                            </div>
                            <div class="text-center mt-4" style="">
                                <img id="blah" class="showimg" src="" alt="Drag And Drop"
                               style="max-width: 300px;width:100%;height:300px;display:none;" />
                           </div>
                            <div class="text-center">
                                <button class="btn btn-success mt-4">อัพโหลด</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 mt-4">
                <div class="card">
                    <div class="card-body">
                        <table id="table" 
                        data-toggle="table" 
                        data-height="800" 
                        data-side-pagination="client" 
                        data-pagination="true" 
                        data-page-size="All" 
                        data-query-params="searchQueryParams_invsetment" 
                        data-ajax="ajaxnetflix"
                        data-search="true"
                        data-sort-class="table-active"
                        data-sortable="true"
                        >
                        
                            <thead>
                                <tr class="tr_style">
                                    <th data-field="name" class="th-2 font-table-modal "><label class="modal-header-f justify-content-center d-flex">ชื่อ</th>
                                    <th data-field="detail" class="th-2 font-table-modal "><label class="modal-header-f justify-content-center d-flex">หมายเหตุ</th>
                                    <th data-field="type" class="th-2 font-table-modal "><label class="modal-header-f justify-content-center d-flex">NF/YT</th>
                                    <th data-field="img" class="th-2 font-table-modal "><label class="modal-header-f justify-content-center d-flex">สลิป</th>
                                    <th data-field="date" class="th-2 font-table-modal " data-sortable="true"><label class="modal-header-f justify-content-center d-flex">วันที่จ่าย</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        Toast.fire({
            icon: 'success',
            title: 'Upload successfully'
        })
    </script>
    @endif
    @if ($message = Session::get('error'))
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        Toast.fire({
            icon: 'error',
            title: 'Upload Failed'
        })
    </script>
    @endif
</body>
<script>

function ajaxnetflix(params) {
        $.ajax({
                type: "get",
                url: "querynetflix",
                // data: {
                //     id: idinfo
                // },
                // datatype: 'json',
                success: function (data) { 
                    console.log(data);
			params.success({ 
			"rows": data
		})
                }
            });
    }
// ------------------------------------------------------------------------------------------------------------------------------------------
    $(document).ready(function () {
        $(document).on('change', ".imgip", function () {
            const file = this.files[0];
            var showimg = $(this).closest('.card')
            var filesize = this.files[0].size;
            var filename = $(this).val().split('\\').pop();
            var fielnamecheck = filename.split('.').pop();
            var type = ['jpg', 'png', 'gif', 'jpeg'];
            if (type.includes(fielnamecheck) != true && filesize > 3000000) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'กรุณาเลือกไฟล์ใหม่อีกครั้ง ประเภทไฟล์ไม่ถูกต้องและขนาดของไฟล์ใหญ่เกินไป',
                })
                $(this).val('');
                $(showimg).find('.showimg').hide()
            } else if (type.includes(fielnamecheck) != true) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'กรุณาเลือกไฟล์ใหม่อีกครั้ง ประเภทไฟล์ของไฟล์ไม่ถูกต้อง',
                })
                $(this).val('');
                $(showimg).find('.showimg').hide()
                
            } else if (filesize > 3000000) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'กรุณาเลือกไฟล์ใหม่อีกครั้ง ขนาดของไฟล์ใหญ่เกินไป',
                })
                $(this).val('');
                $(showimg).find('.showimg').hide()
           
            } else {
               

                $(showimg).find('.showimg').show()


                if (file) {
                    let reader = new FileReader();
                    reader.onload = function (event) {
                        console.log(event.target.result);
                        $(showimg).find('.showimg').attr('src', event.target.result);
                    }
                    reader.readAsDataURL(file);
                }

            }
        })
    })
</script>

</html>