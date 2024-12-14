<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light"
    data-menu-styles="dark" data-toggled="close">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Paiement et Transactions | {{ config('app.name') }} </title>
    <x-css-file />
</head>

<body>
    <x-switcher />
    <div class="page">
        <x-header />
        <x-aside />

        <div class="main-content app-content">
            <div class="container-fluid">
                <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                    <h1 class="page-title fw-semibold fs-18 mb-0"></h1>
                    <div class="ms-md-1 ms-0">
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboards</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Paiement et Transactions</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card custom-card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="card-title">Transactions</div>
                                <div class="m-2">
                                    <select name="" id="" class="form-control">

                                    </select>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="table2" class="table table-hover w-100">
                                        <thead>
                                            <tr>
                                                <th style="width:5px!important"><span ldr2></span></th>
                                                <th>Infirmier</th>
                                                <th>Montant</th>
                                                <th>Référence</th>
                                                <th>Description</th>
                                                <th>Date paiement</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="card custom-card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="card-title">Paiements</div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="table" class="table table-hover w-100">
                                        <thead>
                                            <tr>
                                                <th style="width:5px!important"><span ldr></span></th>
                                                <th>Montant</th>
                                                <th>Description</th>
                                                <th>Date</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <x-footer />
    </div>

    <div id="responsive-overlay"></div>

    <x-js-file />
    <x-datatable />

    <script src="{{ asset('assets/js/jquery.mask.min.js') }}"></script>
    <script>
        $('.phone').mask('0000000000');

        $(document).ready(function() {
            var table = $('#table');
            table.DataTable();
            var table2 = $('#table2');
            table2.DataTable();

            function getdata() {
                $('span[ldr]').removeClass().addClass('bx bx-spin bx-loader bx-sm');
                $.ajax({
                    'url': '  route('paiement.index') }}',
                    success: function(res) {
                        table.DataTable().destroy();
                        var html = '';
                        res.data.forEach((el, i) => {
                            var btn = el.canpay ? `
                            <button class="btn btn-danger btn-sm m-1"  value="${el.id}" mt="${el.fmontant}" bpay ><i class='bx bxs-dollar-circle'></i> Payer</button>
                            ` : '';
                            html += `<tr>
                            <td>${i+1}</td>
                            <td>${el.fmontant}</td>
                            <td>${el.description}</td>
                            <td>${el.date}</td>
                            <td>
                                <div class='d-flex justify-content-end'>
                                    ${btn}
                                </div>
                            </td>
                        </tr>
                        `;
                        });

                        table.find('tbody').html(html);

                        $('[bpay]').off('click').click(function() {
                            event.preventDefault();
                            var v = this.value;
                            var mdl = $('#mdl');
                            $('[name=paiement_id]', mdl).val(v);
                            $('span[mt]').html($(this).attr('mt'));
                            mdl.modal('show');
                        });

                        table.DataTable({
                            order: [],
                            dom: 'Bflrtip',
                            buttons: [
                                'copy', 'csv', 'excel', 'pdf', 'print'
                            ],
                            layout: {
                                topStart: 'buttons'
                            }
                        });
                    },
                    error: function(res) {

                    }
                }).always(function() {
                    $('span[ldr]').removeClass();
                })
            }
            getdata();




        });
    </script>

</body>

</html>
