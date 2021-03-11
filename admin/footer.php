<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.0.6-pre
    </div>
    <strong>Copyright &copy; 2014-2020 <a href="https://epolice.kz">epolice.kz</a>.</strong> All rights
    reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Add Content Here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<!-- Select2 -->
<script src="../plugins/select2/js/select2.full.min.js"></script>
<!-- SweetAlert2 -->
<script src="../plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="../plugins/toastr/toastr.min.js"></script>
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- page script -->
<script>
    $(function () {
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
        $('.select2').select2();
    });
<?php if (stripos($_SERVER['REQUEST_URI'], 'index')): ?>
        $(document).ready(function () {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            // Get context with jQuery - using jQuery's .get() method.
            $('#year').on("change", function () {
                load();
            });
            $('#city').on("change", function () {
                load();
            });
            load();
            var data = [15, 22];
            function load() {
                $('#barChart').remove(); // this is my <canvas> element
                $('#donutChart').remove(); // this is my <canvas> element
                $('#bCh').append('<canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>');
                $('#dCh').append('<canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>');
                $.post("getData.php",
                        {
                            year: $('#year').val(),
                            city: $('#city').val()
                        },
                        function (datas, status) {
                            if (datas['status'] === 'success') {
                                data[0] = datas['vacancy_count'];
                                data[1] = datas['rezumes_count'];
                                var labels = ['Все'];
                                var areaChartData = {
                                    labels: labels,
                                    datasets: [
                                        {
                                            label: 'Вакансии',
                                            backgroundColor: 'rgba(60,141,188,0.9)',
                                            borderColor: 'rgba(60,141,188,0.8)',
                                            pointRadius: false,
                                            pointColor: '#3b8bba',
                                            pointStrokeColor: 'rgba(60,141,188,1)',
                                            pointHighlightFill: '#fff',
                                            pointHighlightStroke: 'rgba(60,141,188,1)',
                                            data: [data[0]]
                                        },
                                        {
                                            label: 'Резюме',
                                            backgroundColor: 'rgba(210, 214, 222, 1)',
                                            borderColor: 'rgba(210, 214, 222, 1)',
                                            pointRadius: false,
                                            pointColor: 'rgba(210, 214, 222, 1)',
                                            pointStrokeColor: '#c1c7d1',
                                            pointHighlightFill: '#fff',
                                            pointHighlightStroke: 'rgba(220,220,220,1)',
                                            data: [data[1], 0]
                                        },
                                    ]
                                }

                                var areaChartOptions = {
                                    maintainAspectRatio: false,
                                    responsive: true,
                                    legend: {
                                        display: false
                                    },
                                    scales: {
                                        xAxes: [{
                                                gridLines: {
                                                    display: false
                                                }
                                            }],
                                        yAxes: [{
                                                gridLines: {
                                                    display: false
                                                }
                                            }]
                                    }
                                };



                                //-------------
                                //- DONUT CHART -
                                //-------------
                                // Get context with jQuery - using jQuery's .get() method.
                                var donutChartCanvas = $('#donutChart').get(0).getContext('2d');
                                var donutData = {
                                    labels: [
                                        'Вакансии',
                                        'Резюме'
                                    ],
                                    datasets: [
                                        {
                                            data: data,
                                            backgroundColor: ['#f56954', '#00a65a']
                                        }
                                    ]
                                }
                                var donutOptions = {
                                    maintainAspectRatio: false,
                                    responsive: true
                                }
                                //Create pie or douhnut chart
                                // You can switch between pie and douhnut using the method below.
                                var donutChart = new Chart(donutChartCanvas, {
                                    type: 'doughnut',
                                    data: donutData,
                                    options: donutOptions
                                })

                                //-------------
                                //- BAR CHART -
                                //-------------
                                var barChartCanvas = $('#barChart').get(0).getContext('2d');
                                var barChartData = jQuery.extend(true, {}, areaChartData);
                                var temp0 = areaChartData.datasets[0];
                                var temp1 = areaChartData.datasets[1];
                                barChartData.datasets[0] = temp1;
                                barChartData.datasets[1] = temp0;

                                var barChartOptions = {
                                    responsive: true,
                                    maintainAspectRatio: false,
                                    datasetFill: false
                                }

                                var barChart = new Chart(barChartCanvas, {
                                    type: 'bar',
                                    data: barChartData,
                                    options: barChartOptions
                                })
                            }
                        });
                        Toast.fire({
                            icon: 'success',
                            title: 'Данные обновлены: город '+$('#city').val()+", "+$('#year').val()+"год"
                        });
            }




        });
<?php endif; ?>
<?php if (stripos($_SERVER['REQUEST_URI'], 'company')): ?>
        $(document).ready(function () {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            $('#sendCompany').on('click', function () {
                $.post("addCompany.php",
                        {
                            name: $('#name').val(),
                            city: $('#city').val(),
                            gos: $('#gos').prop('checked'),
                            ch: $('#ch').prop('checked')
                        },
                        function (data, status) {
                            if (data['status'] === 'success') {
                                console.log(data['status']);
                                Toast.fire({
                                    icon: 'success',
                                    title: 'Ваша Компания успешно зарегистрирована'
                                });
                                $('#name').val(''),
                                        $('#city').val('*'),
                                        $('#gos').prop('checked', false);
                                $('#ch').prop('checked', false);
                            } else if (data['status'] === 'failure') {
                                Toast.fire({
                                    icon: 'error',
                                    title: 'Ваша Компания не зарегистрирована, попробуйте снова'
                                });
                            }
                        });
            });
        });
<?php endif; ?>
<?php if (stripos($_SERVER['REQUEST_URI'], 'rezume')): ?>
        $(document).ready(function () {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            $('#send').on('click', function () {
                $.post("addRezume.php",
                        {
                            year: $('#year').val(),
                            city: $('#city').val(),
                            spec: $('#spec').val(),
                            company: $('#company').val(),
                            about: $('#about').val()
                        },
                        function (data, status) {
                            if (data['status'] === 'success') {
                                console.log(data['status']);
                                Toast.fire({
                                    icon: 'success',
                                    title: 'Ваше Резюме успешно отпрвлено'
                                });
                                $('#about').val('');
                            } else if (data['status'] === 'failure') {
                                Toast.fire({
                                    icon: 'error',
                                    title: 'Ваше Резюме отправлено, попробуйте снова'
                                });
                            }
                        });
            });
        });
<?php endif; ?>
<?php if (stripos($_SERVER['REQUEST_URI'], 'vacance')): ?>
        $(document).ready(function () {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            $('#send').on('click', function () {
                $.post("addVacance.php",
                        {
                            year: $('#year').val(),
                            city: $('#city').val(),
                            spec: $('#spec').val(),
                            company: $('#company').val(),
                            about: $('#about').val()
                        },
                        function (data, status) {
                            if (data['status'] === 'success') {
                                console.log(data['status']);
                                Toast.fire({
                                    icon: 'success',
                                    title: 'Ваше Вакансия успешно отпрвлено'
                                });
                                $('#about').val('');
                            } else if (data['status'] === 'failure') {
                                Toast.fire({
                                    icon: 'error',
                                    title: 'Ваше Вакансия отправлено, попробуйте снова'
                                });
                            }
                        });
            });
        });
<?php endif; ?>
</script>
</body>
</html>