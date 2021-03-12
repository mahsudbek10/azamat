<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once './header.php';
//require_once '../db/db.php';
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Главная</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Главная</a></li>
                        <li class="breadcrumb-item active"></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Количество вакансии и резюме за выбранный год</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <label for="year">Выберите период</label>
                                <select name="year" id="year" class="form-control select2">
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                </select>
                                <label for="city">Выберите Город или область</label>
                                <select name="city" id="city" class="form-control select2">
                                    <?php $cities = R::getAll("SELECT * FROM azamat_city ORDER BY name ASC"); ?>
                                    <option value="*">Все</option>
                                    <?php foreach ($cities as $city): ?>
                                        <option value="<?= $city['id'] ?>"><?= $city['name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>                            
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <!-- DONUT CHART -->
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Диаграмма</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body" id="dCh">
                            <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>
                <!-- /.col (LEFT) -->
                <div class="col-md-6">
                    <!-- BAR CHART -->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">График</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart" id="bCh">
                                <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>
                <!-- /.col (RIGHT) -->
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">

                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Город или область</th>
                                        <th>Вакансии</th>
                                        <th>Резюме</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $cities=R::getAll("SELECT id, name FROM azamat_city");
                                    foreach ($cities as $item):
                                        $vacancy_count = R::getAll("SELECT id FROM azamat_vacancy WHERE id_city=?",[$item['id']]);
                                        $rezume_count = R::getAll("SELECT id FROM azamat_rezume WHERE id_city=?",[$item['id']]);
                                    ?>
                                    <tr>
                                        <td><?= $item['name']; ?></td>
                                        <td><?= count($vacancy_count); ?></td>
                                        <td><?= count($rezume_count); ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Город или область</th>
                                        <th>Вакансии</th>
                                        <th>Резюме</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div  id = "map" style = "height: 450px;"></div>
                                <script>
                                    // Creating map options
                                    var mapOptions = {
                                        center: [42.31298, 69.72328],
                                        zoom: 5
                                    };

                                    // Creating a map object
                                    var map = new L.map('map', mapOptions);

                                    // Creating a Layer object
                                    var layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');

                                    // Adding layer to the map
                                    map.addLayer(layer);

                                    var marker;    
                                    <?php $cities=R::getAll("SELECT * FROM azamat_city");
                                            foreach ($cities as $item):
                                                $vacancy_count = R::getAll("SELECT id FROM azamat_vacancy WHERE id_city=?",[$item['id']]);
                                                $rezume_count = R::getAll("SELECT id FROM azamat_rezume WHERE id_city=?",[$item['id']]);
                                            ?>
                                            marker = L.marker([<?= $item['x'] ?>, <?= $item['y'] ?>]);
                                            marker.bindPopup('<b><?= $item['name'] ?></b><br><img src="<?= $item['img'] ?>" width="100px"><br>Резюме: <?= count($rezume_count); ?><br>Вакансии: <?= count($vacancy_count); ?>').openPopup();
                                            marker.addTo(map); // Adding marker to the map


                                    <?php endforeach; ?>
                                </script>
                            </div> </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<?php
require_once './footer.php';
?>