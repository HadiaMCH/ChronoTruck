@extends('layouts.app')

@section('content')

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="heading-page header-text">
        <section class="page-heading">
            <div class="container">
            <div class="row">
                <div class="col-lg-12">
                <div class="text-content">
                    <h2>les principales statistiques générées par le site</h2>
                </div>
                </div>
            </div>
            </div>
        </section>
    </div>

        <!-- Banner Ends Here -->

    
      <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div id="users" style="width: 900px; height: 500px;"></div>
            </div>
            <div class="col-lg-6">
                <section class="contact-us" >
                    <div class="container">
                        <div class="down-contact">
                            <div class="sidebar-item contact-information">
                                <div class="sidebar-heading">
                                <h2>les statistiques des utilisateures</h2>
                                </div>
                                <div class="content">
                                <ul>
                                    <li>
                                        <h5>Total</h5>
                                        <span>{{$clients+$transporteurs+$transporteurs_c}}</span>
                                    </li>
                                    <li>
                                        <h5>clients</h5>
                                        <span>{{$clients}}</span>
                                    </li>
                                    <li>
                                        <h5>transporteurs</h5>
                                        <span>{{$transporteurs}}</span>
                                    </li>
                                    <li>
                                        <h5>transporteurs certifiés</h5>
                                        <span>{{$transporteurs_c}}</span>
                                    </li>
                                </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
      </div>

      <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <section class="contact-us" >
                    <div class="container">
                        <div class="down-contact">
                            <div class="sidebar-item contact-information">
                                <div class="sidebar-heading">
                                <h2>les statistiques des annonces</h2>
                                </div>
                                <div class="content">
                                <ul>
                                    <li>
                                        <h5>Total</h5>
                                        <span>{{$annonces_v+$annonces_e+$annonces_t}}</span>
                                    </li>
                                    <li>
                                        <h5>Annonces en attentes</h5>
                                        <span>{{$annonces_e}}</span>
                                    </li>
                                    <li>
                                        <h5>Annonces validés</h5>
                                        <span>{{$annonces_v}}</span>
                                    </li>
                                    <li>
                                        <h5>Annonces terminés</h5>
                                        <span>{{$annonces_t}}</span>
                                    </li>
                                </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-lg-6">
                <div id="annonces" style="width: 900px; height: 500px;"></div>
            </div>
        </div>
      </div>

    <script type="text/javascript" src="assets/js/loader_charts.js"></script>
    <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
        ['utilisateurs', 'Nombre'],
        ['clients',     <?php echo $clients?>],
        ['transporteurs',      <?php echo $transporteurs?>],
        ['transporteurs certifies',  <?php echo $transporteurs_c?>]
        ]);

        var data2 = google.visualization.arrayToDataTable([
        ['annonces', 'Nombre'],
        ['en attente',     <?php echo $annonces_e?>],
        ['validé',      <?php echo $annonces_v?>],
        ['terminé',  <?php echo $annonces_t?>]
        ]);

        var options = {
        title: 'Les utilisateurs de ChronoTruck',
        is3D: true,
        };

        var options2 = {
        title: 'Les annonces de ChronoTruck',
        is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('users'));
        chart.draw(data, options);

        var chart2 = new google.visualization.PieChart(document.getElementById('annonces'));
        chart2.draw(data2, options2);
    }
    </script>
@endsection