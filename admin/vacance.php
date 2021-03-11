<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once './header.php';

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Вакансии</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Вакансии</a></li>
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
                            <h3 class="card-title">Открыть Вакансию</h3>
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
                                    <?php foreach($cities as $city): ?>
                                    <option value="<?= $city['id'] ?>"><?= $city['name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <label for="company">Компания</label>
                                <select name="company" id="company" class="form-control select2">
                                    <?php $companys = R::getAll("SELECT * FROM azamat_company ORDER BY name ASC"); ?>
                                    <option value="*">Все</option>
                                    <?php foreach($companys as $company): ?>
                                    <option value="<?= $company['id'] ?>"><?= $company['name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <label for="city">Специальность</label>
                                <select name="spec" id="spec" class="form-control select2">
                                    <?php $specs = R::getAll("SELECT * FROM azamat_spec ORDER BY name ASC"); ?>
                                    <option value="*">Все</option>
                                    <?php foreach($specs as $spec): ?>
                                    <option value="<?= $spec['id'] ?>"><?= $spec['name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <label for="about">Описание</label>
                            <textarea class="form-control" id="about" rows="4"></textarea>
                            <hr>
                            <button type="button" id="send" class="btn btn-outline-success">Подать</button>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<?php
require_once './footer.php';
?>