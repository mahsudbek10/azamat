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
                    <h1>Компании</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Компании</a></li>
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
                            <h3 class="card-title">Регистрация компании</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <label for="city">Выберите Город или область</label>
                                <select name="city" id="city" class="form-control select2">
<?php $cities = R::getAll("SELECT * FROM azamat_city ORDER BY name ASC"); ?>
                                    <option value="*">Все</option>
                                    <?php foreach ($cities as $city): ?>
                                        <option value="<?= $city['id'] ?>"><?= $city['name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <label for="city">Наименование компании</label>
                                <input name="name" id="name" class="form-control">
                            </div>
                            <br>
                            <label>Частная</label>
                            <div class="icheck-success d-inline">
                                <input type="checkbox" id="gos">
                                <label for="gos">
                                </label>
                            </div><br>
                            <label>Государственная</label>
                            <div class="icheck-success d-inline">
                                <input type="checkbox" id="ch">
                                <label for="ch">
                                </label>
                            </div><br>
                            <button id="sendCompany" class="btn btn-outline-success">Регистрировать</button>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
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