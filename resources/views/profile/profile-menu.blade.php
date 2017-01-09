<div class="col-sm-3">
    <ul class="nav nav-pills nav-stacked nav-email shadow mb-20">
        <li class="{{ Request::is('profile') ? 'active' : '' }}">
            <a href="/profile">
                <i class="fa fa-inbox"></i> Основная инфа
            </a>
        </li>
        <li class="{{ Request::is('profile/captcha') ? 'active' : '' }}">
            <a href="/profile/captcha"><i class="glyphicon glyphicon-pencil"></i> Личная капча</a>
        </li>
    </ul>
</div>