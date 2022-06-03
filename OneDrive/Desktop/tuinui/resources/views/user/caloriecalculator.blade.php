@extends('layouts.applogin')
@section('content')
<script src="https://static.line-scdn.net/liff/edge/2/sdk.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.0.0/chartjs-plugin-datalabels.min.js"
    integrity="sha512-R/QOHLpV1Ggq22vfDAWYOaMd5RopHrJNMxi8/lJu8Oihwi4Ho4BRFeiMiCefn9rasajKjnx9/fTQ/xkWnkDACg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<div class="container mt-5">
    <div class="d-flex justify-content-center">
        <div class="card" style="width:600px;">
            <div class="card-body"
                style="background-image:url({{url('assets/img/bmi.jpg')}});background-repeat: no-repeat;  background-size: 100% 100%;  height:80vh;  width: 100%">
                <div class="row">
                    <div class="col-12">
                        <h1 class="text-center">คํานวณแคลอรี่</h1>
                    </div>
                    <div class="col-12">
                        <label for="staticEmail" class="col-sm-6 col-form-label">น้ำหนัก</label>
                        <div class="input-group lg-3">
                            <input type="text" name="weight" class="form-control" placeholder="กิโลกรัม"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="staticEmail" class="col-sm-6 col-form-label">ความสูง</label>
                        <div class="input-group lg-3">
                            <input type="text" name="height" class="form-control" placeholder="เซนติเมตร"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="staticEmail" class="col-sm-6 col-form-label">อายุ</label>
                        <div class="input-group lg-3">
                            <input type="text" name="age" class="form-control" placeholder="ปี"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="staticEmail" class="col-sm-6 col-form-label">กิจกรรมการออกกำลังกาย</label>
                        <div class="input-group lg-3">
                            <select class="form-select" aria-label="Default select example">
                                <option selected value="0">ไม่ได้ออกกำลังกายเลย</option>
                                <option value="1">ออกกำลังกาย1-3ครั้ง/สัปดาห์</option>
                                <option value="2">ออกกำลังกาย3-5ครั้ง/สัปดาห์</option>
                                <option value="3">ออกกำลังกาย6-7ครั้ง/สัปดาห์</option>
                                <option value="4">ออกกำลังกายมากกว่า7ครั้ง/สัปดาห์</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="staticEmail" class="col-sm-6 col-form-label">เพศ</label>
                        <div class="form-check">
                            <input class="gender" type="radio" value="1" name="gender" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                เพศชาย
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="gender" type="radio" value="2" name="gender" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                เพศหญิง
                            </label>
                        </div>
                    </div>
                    <br><br>
                    <div class="d-flex justify-content-center mt-2">
                        <button class="btn ms-2 me-2 btn-success ">ยืนยัน</button>
                        <button class="btn ms-2 me-2 more btn-primary" style="display: none;" data-toggle="modal"
                            data-target="#exampleModal">สารอาหาร</button>
                    </div>

                </div>
                <div class="showresult mt-3 mb-3 " style="display: none;">
                    <div class="alert alert-dark" role="alert">
                        <div class="d-flex justify-content-center">
                            <h5 class="me-2">ปริมาณแคลอรี่ที่ต้องการในแต่ละวัน</h5>

                            <h5 id="calorie"></h5>
                        </div>

                    </div>
                </div>

                {{-- modal  --}}
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">ปริมาณสารอาหารที่ร่างกายต้องการในแต่ละวัน
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="text-end"><label for="" class=""
                                        style="font-size: 24px;color:red;">#หน่วยกรัม</label></div>

                                <div class="graph">

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>

                            </div>
                        </div>
                    </div>
                </div>
                {{--  --}}

            </div>
        </div>
    </div>
</div>
<script>
    var userid = []
    liff.init({
        liffId: "1656751167-zbG4gKYL"
    }, () => {
        if (liff.isLoggedIn()) {
            liff.getProfile().then(profile => {
                const userProfile = profile.userId;
                const displayName = profile.displayName;
                const statusMessage = profile.statusMessage;
                const pictureUrl = profile.pictureUrl;
                const email = liff.getDecodedIDToken().email;
                userid.push(userProfile)

            }).catch(
                err => console.error(err)
            );
        } else {
            liff.login();
   
        }
    }, err => console.error(err.code, error.message));


    $(document).ready(function () {
        $(document).on('click', ".btn-success", function () {
            var valueck = true

            $('input').each(function () {
                var val = $(this).val();
                if (val == '' || val == null) {
                    valueck = false
                    // $('.ip').addClass('alertborder');
                }
            })

            if (valueck == true) {
                var weight = $('input').eq(0).val()
                var height = $('input').eq(1).val()
                var age = $('input').eq(2).val()
                var gender = $('input[name=gender]:checked').val()
                var excercie = $('.form-select').val()

                if (gender == 1) {
                    var bmi = 66 + (13.7 * weight) + (5 * height) - (6.8 * age)
                } else {
                    var bmi = 665 + (9.6 * weight) + (1.8 * height) - (4.7 * age)
                }
                var calorie
                switch (excercie) {
                    case '0':
                        calorie = bmi * 1.2;
                        break;
                    case '1':
                        calorie = bmi * 1.375;
                        break;
                    case '2':
                        calorie = bmi * 1.55;
                        break;
                    case '3':
                        calorie = bmi * 1.7;
                        break;
                    case '4':
                        calorie = bmi * 1.9;
                        break;
                }

                var roundcal = Math.round(calorie)
                $('.showresult').show()
                var carbohydrate = Math.round((60 * roundcal) / (4 * 100))
                var protien = Math.round((10 * roundcal) / (4 * 100))
                var fat = Math.round((30 * roundcal) / (9 * 100))
                $('.graph').empty()
                $('.graph').append(
                    '<canvas id="myChart" width="250" height="250" style="background: white"></canvas>'
                )
                // chart
                Chart.register(ChartDataLabels);
                const ctx = document.getElementById('myChart').getContext('2d');
                Chart.defaults.font.size = 24;
                const myChart = new Chart(ctx, {
                    options: {
                        plugins: {
                            // Change options for ALL labels of THIS CHART
                            datalabels: {
                                color: '#010000',
                                
                            },
                        }
                    },
                    type: 'pie',
                    data: {
                        labels: ['คาร์โบไฮเดรต', 'โปรตีน', 'ไขมัน'],
                        datasets: [{
                            label: 'กรัม',
                            data: [carbohydrate, protien, fat],
                            backgroundColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                });
                // 
                $('.showresult').find('#calorie').empty().append(roundcal)
                $('.more').show();

                liff.getProfile().then(
            profile => {
                $.ajax({ //create an ajax request to display.php
                    type: "get",
                    url: "usercalorie",
                    dataType: 'json',
                    data: {
                        calorie: roundcal,
                        lineid: profile.userId,
                        carbohydrate: carbohydrate,
                        protien: protien,
                        fat: fat,
                    },
                    success: function (response) {
                        alert('wow')
                    }
                });
            })
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'มีข้อผิดพลาด',
                    text: 'กรุณากรอกข้อมูลให้ครบถ้วน',
                })
            }





        })
        $('input:eq(0), input:eq(1), input:eq(2)').keyup(function (event) {
            // format number
            function phoneFormat() {
                phone = phone.replace(/[^0-9]/g, '');
                return phone;
            }
            var phone = $(this).val();
            phone = phoneFormat(phone);
            $(this).val(phone);;
        });
    })
</script>
@endsection