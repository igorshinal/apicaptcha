<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>apicapcha</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('/css/profile.css') }}" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>

</head>

<!-- nav bar -->
<div class="container">
    <div class="row">
        @include('profile.profile-menu')
        <div class="col-sm-9">

            <!-- resumt -->
            <div class="panel panel-default">
                @include('profile.profile-info')
                <div class="bs-callout bs-callout-danger">
                    <h4>Summary</h4>
                    <p>
                        Lorem ipsum dolor sit amet, ea vel prima adhuc, scripta liberavisse ea quo, te vel vidit mollis complectitur. Quis verear mel ne. Munere vituperata vis cu,
                        te pri duis timeam scaevola, nam postea diceret ne. Cum ex quod aliquip mediocritatem, mei habemus persecuti mediocritatem ei.
                    </p>
                    <p>
                        Odio recteque expetenda eum ea, cu atqui maiestatis cum. Te eum nibh laoreet, case nostrud nusquam an vis.
                        Clita debitis apeirian et sit, integre iudicabit elaboraret duo ex. Nihil causae adipisci id eos.
                    </p>
                </div>
                <div class="bs-callout bs-callout-danger">
                    <h4>Research Interests</h4>
                    <p>
                        Software Engineering, Machine Learning, Image Processing,
                        Computer Vision, Artificial Neural Networks, Data Science,
                        Evolutionary Algorithms.
                    </p>
                </div>
                <div class="bs-callout bs-callout-danger">
                    <h4>Prior Experiences</h4>
                    <ul class="list-group">
                        <a class="list-group-item inactive-link" href="#">
                            <h4 class="list-group-item-heading">
                                Software Engineer at Twitter
                            </h4>
                            <p class="list-group-item-text">
                                Lorem ipsum dolor sit amet, ea vel prima adhuc, scripta liberavisse ea quo, te vel vidit mollis complectitur. Quis verear mel ne. Munere vituperata vis cu,
                                te pri duis timeam scaevola, nam postea diceret ne. Cum ex quod aliquip mediocritatem, mei habemus persecuti mediocritatem ei.
                            </p>
                        </a>
                        <a class="list-group-item inactive-link" href="#">
                            <h4 class="list-group-item-heading">Software Engineer at LinkedIn</h4>
                            <p class="list-group-item-text">
                                Lorem ipsum dolor sit amet, ea vel prima adhuc, scripta liberavisse ea quo, te vel vidit mollis complectitur.
                                Quis verear mel ne. Munere vituperata vis cu, te pri duis timeam scaevola,
                                nam postea diceret ne. Cum ex quod aliquip mediocritatem, mei habemus persecuti mediocritatem ei.
                            </p>
                            <ul>
                                <li>
                                    Lorem ipsum dolor sit amet, ea vel prima adhuc, scripta liberavisse ea quo, te vel vidit mollis complectitur.
                                    Quis verear mel ne. Munere vituperata vis cu, te pri duis timeam scaevola,
                                    nam postea diceret ne. Cum ex quod aliquip mediocritatem, mei habemus persecuti mediocritatem ei.
                                </li>
                                <li>
                                    Lorem ipsum dolor sit amet, ea vel prima adhuc, scripta liberavisse ea quo, te vel vidit mollis complectitur.
                                    Quis verear mel ne. Munere vituperata vis cu, te pri duis timeam scaevola,
                                    nam postea diceret ne. Cum ex quod aliquip mediocritatem, mei habemus persecuti mediocritatem ei.
                                </li>
                            </ul>
                            <p></p>
                        </a>
                    </ul>
                </div>
                <div class="bs-callout bs-callout-danger">
                    <h4>Key Expertise</h4>
                    <ul class="list-group">
                        <li class="list-group-item"> Lorem ipsum dolor sit amet, ea vel prima adhuc </li>
                        <li class="list-group-item"> Lorem ipsum dolor sit amet, ea vel prima adhuc</li>
                        <li class="list-group-item"> Lorem ipsum dolor sit amet, ea vel prima adhuc</li>
                        <li class="list-group-item"> Lorem ipsum dolor sit amet, ea vel prima adhuc</li>
                        <li class="list-group-item">Lorem ipsum dolor sit amet, ea vel prima adhuc</li>
                        <li class="list-group-item"> Lorem ipsum dolor sit amet, ea vel prima adhuc</li>
                    </ul>
                </div>
                <div class="bs-callout bs-callout-danger">
                    <h4>Language and Platform Skills</h4>
                    <ul class="list-group">
                        <a class="list-group-item inactive-link" href="#">
                            <div class="progress">
                                <div data-placement="top" style="width: 80%;"
                                     aria-valuemax="100" aria-valuemin="0" aria-valuenow="80" role="progressbar" class="progress-bar progress-bar-success">
                                    <span class="sr-only">80%</span>
                                    <span class="progress-type">Java/ JavaEE/ Spring Framework </span>
                                </div>
                            </div>
                            <div class="progress">
                                <div data-placement="top" style="width: 70%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="1" role="progressbar" class="progress-bar progress-bar-success">
                                    <span class="sr-only">70%</span>
                                    <span class="progress-type">PHP/ Lamp Stack</span>
                                </div>
                            </div>
                            <div class="progress">
                                <div data-placement="top" style="width: 70%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="1" role="progressbar" class="progress-bar progress-bar-success">
                                    <span class="sr-only">70%</span>
                                    <span class="progress-type">JavaScript/ NodeJS/ MEAN stack </span>
                                </div>
                            </div>
                            <div class="progress">
                                <div data-placement="top" style="width: 65%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="1" role="progressbar" class="progress-bar progress-bar-warning">
                                    <span class="sr-only">65%</span>
                                    <span class="progress-type">Python/ Numpy/ Scipy</span>
                                </div>
                            </div>
                            <div class="progress">
                                <div data-placement="top" style="width: 60%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar" class="progress-bar progress-bar-warning">
                                    <span class="sr-only">60%</span>
                                    <span class="progress-type">C</span>
                                </div>
                            </div>
                            <div class="progress">
                                <div data-placement="top" style="width: 50%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="50" role="progressbar" class="progress-bar progress-bar-warning">
                                    <span class="sr-only">50%</span>
                                    <span class="progress-type">C++</span>
                                </div>
                            </div>
                            <div class="progress">
                                <div data-placement="top" style="width: 10%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="50" role="progressbar" class="progress-bar progress-bar-danger">
                                    <span class="sr-only">10%</span>
                                    <span class="progress-type">Go</span>
                                </div>
                            </div>
                            <div class="progress-meter">
                                <div style="width: 25%;" class="meter meter-left"><span class="meter-text">I suck</span></div>
                                <div style="width: 25%;" class="meter meter-left"><span class="meter-text">I know little</span></div>
                                <div style="width: 30%;" class="meter meter-right"><span class="meter-text">I'm a guru</span></div>
                                <div style="width: 20%;" class="meter meter-right"><span class="meter-text">I''m good</span></div>
                            </div>
                        </a>
                    </ul>
                </div>
                <div class="bs-callout bs-callout-danger">
                    <h4>Education</h4>
                    <table class="table table-striped table-responsive ">
                        <thead>
                        <tr>
                            <th>Degree</th>
                            <th>Graduation Year</th>
                            <th>CGPA</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Masters in Computer Science and Engineering</td>
                            <td>2014</td>
                            <td> 3.50 </td>
                        </tr>
                        <tr>
                            <td>BSc. in Computer Science and Engineering</td>
                            <td>2011</td>
                            <td> 3.25 </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- resume -->

    </div>
</div>
</div>
</body>
</html>