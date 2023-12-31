<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>IMS Silver Sea - Event Registrar</title>
    <link rel="stylesheet" href="{{ url('vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <!-- Icons font CSS-->
    <link href="{{ url('vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ url('vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="{{ url('vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ ('vendor/datepicker/daterangepicker.css') }}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
    <style type="text/css">
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
          -webkit-appearance: none;
          margin: 0;
        }

        /* Firefox */
        input[type=number] {
          -moz-appearance: textfield;
        }

        .w-auto{
            width: auto;
        }
    </style>
</head>

<body>
    @if(Session::has('status'))
    <script type="text/javascript">
        alert('{{ $status['text'] }}');
    </script>
    {{ Session::forget('status'); }}
    @endif
    <div class="page-wrapper bg-white p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
        	<img src="{{ url('images/banner.jpg') }}" class="w-100">
            <div class="card card-1">
                <div class="card-body">
                    <h2 class="title">Online Registration</h2>
                    <form method="POST" action="/form">
                        @csrf
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="NAME" name="name" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="email" placeholder="E-MAIL (OPTIONAL)" name="email">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="number" placeholder="PHONE" name="phone" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="sex" required>
                                            <option disabled="disabled" selected="selected">GENDER</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="OCCUPATION" name="position" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="COMPANY (OPTIONAL)" name="company">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2 text-grey">
                                <h5 style="margin-top: 8px;">INTERESTS</h5>
                                <br>
                                <div class="form-check" style="margin-bottom: 15px;">
                                    <input class="w-auto form-check-input" type="checkbox" name="pos[]" value="Real Estate and Properties ">
                                    <label class="form-check-label" for="defaultCheck1">
                                        Real Estate and Properties
                                    </label>
                                </div>
                                <div class="form-check" style="margin-bottom: 15px;">
                                    <input class="w-auto form-check-input" type="checkbox" name="pos[]" value="Constructions">
                                    <label class="form-check-label" for="defaultCheck1">
                                        Constructions
                                    </label>
                                </div>
                                <div class="form-check" style="margin-bottom: 15px;">
                                    <input class="w-auto form-check-input" type="checkbox" name="pos[]" value="Renewable Energy and EV">
                                    <label class="form-check-label" for="defaultCheck1">
                                        Renewable Energy and EV
                                    </label>
                                </div>

                            </div>
                        </div>
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="{{ url('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- Vendor JS-->
    <script src="{{ url('vendor/select2/select2.min.js') }}"></script>
    <script src="{{ url('vendor/datepicker/moment.min.js') }}"></script>
    <script src="{{ url('vendor/datepicker/daterangepicker.js') }}"></script>

    <!-- Main JS-->
    <script src="{{ url('js/global.js') }}"></script>
    <script type="text/javascript">
        // Turn off the value scrolling behaviour on all fields
        document.addEventListener("wheel", function(event){
            if(document.activeElement.type === "number"){
                document.activeElement.blur();
            }
        });
    </script>
    <script type="text/javascript">
        function checkEmail() {
            var email = document.getElementById('txtEmail');
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

            if (!filter.test(email.value)) {
            alert('Please provide a valid email address');
            email.focus;
            return false;
         }
        }
    </script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
