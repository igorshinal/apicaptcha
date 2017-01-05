<div class="panel-heading resume-heading">
    <div class="row">
        <div class="col-lg-12">
            <div class="col-xs-12 col-sm-4">
                <figure>
                    <img class="img-circle img-responsive" alt="" src="http://placehold.it/300x300">
                </figure>
            </div>
            <div class="col-xs-12 col-sm-8">
                <ul class="list-group">
                    <li class="list-group-item"><i class="glyphicon glyphicon-user"></i>  {{ Auth::user()->name }} ({{ Auth::user()->company_name }})</li>
                    <li class="list-group-item"><i class="glyphicon glyphicon-cloud"></i> {{ $country }} ({{ $lang }})</li>
                    @if (Auth::user()->phone)<li class="list-group-item"><i class="fa fa-phone"></i>  {{ Auth::user()->phone }} </li> @endif
                    <li class="list-group-item"><i class="fa fa-envelope"></i>  {{ Auth::user()->email }}</li>
                    <li class="list-group-item"><i class="glyphicon glyphicon-globe"></i>  {{ Auth::user()->website }}</li>

                </ul>
            </div>
        </div>
    </div>
</div>